<?php
/**
 * Contact Form API Endpoint
 * Handles form submissions for Nexlink IT website
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Accept');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method not allowed']);
    exit();
}

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validate JSON
if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
    exit();
}

// Required fields validation
$requiredFields = ['name', 'email', 'message', 'region', 'platform'];
$missingFields = [];

foreach ($requiredFields as $field) {
    if (!isset($data[$field]) || trim($data[$field]) === '') {
        $missingFields[] = $field;
    }
}

if (!empty($missingFields)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error' => 'Missing required fields: ' . implode(', ', $missingFields)
    ]);
    exit();
}

// Email validation
if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid email address']);
    exit();
}

// Sanitize input data
$firstName = htmlspecialchars(trim($data['firstName']));
$lastName = htmlspecialchars(trim($data['lastName']));
$email = htmlspecialchars(trim($data['email']));
$company = isset($data['company']) ? htmlspecialchars(trim($data['company'])) : '';
$phone = isset($data['phone']) ? htmlspecialchars(trim($data['phone'])) : '';
$serviceType = isset($data['serviceType']) ? htmlspecialchars(trim($data['serviceType'])) : 'General Inquiry';
$message = htmlspecialchars(trim($data['message']));
$formType = isset($data['formType']) ? htmlspecialchars(trim($data['formType'])) : 'support';
$visitorId = isset($data['visitorId']) ? htmlspecialchars(trim($data['visitorId'])) : '';

// Email configuration
$to = 'daniel@nexlink.cloud';  // Your email address
$subject = 'New Contact Form Submission - ' . $serviceType;

// Build email body
$emailBody = "New contact form submission received:\n\n";
$emailBody .= "Name: {$firstName} {$lastName}\n";
$emailBody .= "Email: {$email}\n";

if (!empty($company)) {
    $emailBody .= "Company: {$company}\n";
}

if (!empty($phone)) {
    $emailBody .= "Phone: {$phone}\n";
}

$emailBody .= "Service Type: {$serviceType}\n";
$emailBody .= "Form Type: {$formType}\n";
$emailBody .= "\nMessage:\n{$message}\n\n";

// Technical details
$emailBody .= "---\nTechnical Details:\n";
$emailBody .= "Visitor ID: {$visitorId}\n";
$emailBody .= "Timestamp: " . (isset($data['timestamp']) ? $data['timestamp'] : date('c')) . "\n";
$emailBody .= "User Agent: " . (isset($data['userAgent']) ? $data['userAgent'] : $_SERVER['HTTP_USER_AGENT']) . "\n";
$emailBody .= "Referrer: " . (isset($data['referrer']) ? $data['referrer'] : $_SERVER['HTTP_REFERER']) . "\n";
$emailBody .= "IP Address: " . $_SERVER['REMOTE_ADDR'] . "\n";

// Email headers
$headers = [
    'From: ' . $email,
    'Reply-To: ' . $email,
    'Return-Path: ' . $email,
    'X-Mailer: PHP/' . phpversion(),
    'Content-Type: text/plain; charset=UTF-8'
];

// Try to send email
$mailSent = mail($to, $subject, $emailBody, implode("\r\n", $headers));

if ($mailSent) {
    // Log successful submission (optional)
    error_log("Contact form submitted successfully from: {$email}");
    
    // Return success response
    echo json_encode([
        'success' => true,
        'message' => 'Your message has been sent successfully. We will get back to you soon!'
    ]);
} else {
    // Log error
    error_log("Failed to send contact form email from: {$email}");
    
    // Return error response
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Failed to send email. Please try again later or contact us directly at daniel@nexlink.cloud'
    ]);
}
?>
