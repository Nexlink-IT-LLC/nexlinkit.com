<?php
define('NEXLINK_BACKEND', true);

require_once 'config.php';
require_once 'utils.php';
require_once 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Enable error logging for debugging
// error_log('Request Origin: ' . ($_SERVER['HTTP_ORIGIN'] ?? 'none'));

// Set JSON response type
header('Content-Type: application/json');

// Handle CORS
$origin = $_SERVER['HTTP_ORIGIN'] ?? '';
// error_log('Checking origin: ' . $origin);
// error_log('Allowed origins: ' . implode(', ', ALLOWED_ORIGINS));

if (in_array($origin, ALLOWED_ORIGINS, true)) {
    // error_log('Origin is allowed: ' . $origin);
    header('Access-Control-Allow-Origin: ' . $origin);
    header('Access-Control-Allow-Methods: POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Access-Control-Max-Age: 3600');
    header('Vary: Origin');
} else {
    error_log('Origin not allowed: ' . $origin);
    http_response_code(403);
    echo json_encode(['error' => 'Origin not allowed']);
    exit();
}

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit();
}

// Check origin
if (!isOriginAllowed()) {
    http_response_code(403);
    echo json_encode(['error' => 'Origin not allowed']);
    exit();
}

// Test SMTP connection first
try {
    $test = new PHPMailer(true);
    $test->SMTPDebug = 3; // Even more verbose debugging
    $test->Debugoutput = function($str, $level) {
        // error_log("SMTP Test [$level]: $str");
    };
    $test->isSMTP();
    $test->Host = SMTP_HOST;
    $test->SMTPAuth = true;
    $test->Username = SMTP_USERNAME;
    $test->Password = SMTP_PASSWORD;
    $test->SMTPSecure = 'ssl';
    $test->Port = SMTP_PORT;
    $test->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => false
        )
    );
    
    // Try to connect only
    if (!$test->smtpConnect()) {
        throw new Exception("SMTP connection failed");
    }
    // error_log("SMTP connection test successful");
    $test->smtpClose();
} catch (Exception $e) {
    error_log("SMTP connection test failed: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'error' => 'SMTP connection failed',
        'detail' => $e->getMessage(),
        'debug' => true
    ]);
    exit();
}

// Determine form type from request
$formType = isset($_POST['formType']) ? $_POST['formType'] : 'contact';

// Get and validate the form data
list($isValid, $message) = validateFormData($_POST, $formType);
if (!$isValid) {
    http_response_code(400);
    echo json_encode(['error' => $message]);
    exit;
}

// Sanitize data
$data = sanitizeData($_POST);

// Prepare email subject and message based on form type
if ($formType === 'support') {
    $subject = "New Support Request: {$data['serviceType']} ({$data['urgency']})";
    $message = "Support Request Details:\n\n";
    $message .= "Name: {$data['name']}\n";
    $message .= "Email: {$data['email']}\n";
    $message .= "Service Type: {$data['serviceType']}\n";
    $message .= "Platform: {$data['platform']}\n";
    $message .= "Region: {$data['region']}\n";
    $message .= "Urgency: {$data['urgency']}\n\n";
    $message .= "Message:\n{$data['message']}";
} else {
    $subject = "New Contact Form Submission: {$data['serviceType']}";
    $message = "Contact Form Details:\n\n";
    $message .= "Name: {$data['firstName']} {$data['lastName']}\n";
    $message .= "Email: {$data['email']}\n";
    $message .= "Service Type: {$data['serviceType']}\n";
    $message .= "Urgency: {$data['urgency']}\n\n";
    $message .= "Message:\n{$data['message']}";
}

// Set up email headers
$headers = [
    'MIME-Version: 1.0',
    'Content-type: text/plain; charset=UTF-8',
    'From: ' . SMTP_FROM_NAME . ' <' . SMTP_FROM_EMAIL . '>',
    'Reply-To: ' . $data['email'],
    'X-Mailer: PHP/' . phpversion()
];

try {
    // Initialize PHPMailer with debug output
    $mail = new PHPMailer(true);
    
    // Enable debug output
    // $mail->SMTPDebug = 2; // 2 = client and server messages
    // $mail->Debugoutput = function($str, $level) {
    //     error_log("PHPMailer Debug [$level]: $str");
    // };
    
    // Server settings
    $mail->isSMTP();
    $mail->Host = SMTP_HOST;
    $mail->SMTPAuth = true;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = SMTP_PORT;
    $mail->Timeout = 30; // Timeout in seconds
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    
    // Recipients
    $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
    $mail->addAddress(CONTACT_EMAIL);
    $mail->addReplyTo($data['email'], $data['name']);
    
    // Content
    $mail->isHTML(false);
    $mail->Subject = $subject;
    $mail->Body = $message;
    
    // Send email
    $mail->send();
    
    // Return success response
    http_response_code(200);
    echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
    
} catch (Exception $e) {
    // Log detailed error information
    error_log("Contact form error: " . $e->getMessage());
    error_log("Error trace: " . $e->getTraceAsString());
    
    if ($e instanceof PHPMailer\PHPMailer\Exception) {
        error_log("PHPMailer specific error code: " . $e->getCode());
    }
    
    // Return detailed error response
    http_response_code(500);
    echo json_encode([
        'error' => 'Failed to send message',
        'detail' => $e->getMessage(),
        'debug' => true
    ]);
}