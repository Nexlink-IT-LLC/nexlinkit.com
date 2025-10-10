<?php
// Prevent direct access to this file
if (!defined('NEXLINK_BACKEND')) {
    header('HTTP/1.0 403 Forbidden');
    exit('Direct access forbidden.');
}

/**
 * Validate and sanitize form data
 * @param array $data The form data to validate
 * @return array Array with 'valid' boolean and 'errors' array
 */
function validateFormData($data) {
    $errors = [];
    
    // Check required fields
    foreach (REQUIRED_FIELDS as $field) {
        if (!isset($data[$field]) || empty(trim($data[$field]))) {
            $errors[] = "Field '$field' is required.";
        }
    }
    
    // Validate email
    if (isset($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }
    
    // Check message length
    if (isset($data['message']) && strlen($data['message']) > MAX_MESSAGE_LENGTH) {
        $errors[] = "Message exceeds maximum length of " . MAX_MESSAGE_LENGTH . " characters.";
    }
    
    return [
        'valid' => empty($errors),
        'errors' => $errors
    ];
}

/**
 * Sanitize input data
 * @param array $data The data to sanitize
 * @return array Sanitized data
 */
function sanitizeData($data) {
    $clean = [];
    foreach ($data as $key => $value) {
        if (is_string($value)) {
            $clean[$key] = htmlspecialchars(strip_tags(trim($value)), ENT_QUOTES, 'UTF-8');
        } else {
            $clean[$key] = $value;
        }
    }
    return $clean;
}

/**
 * Check if the request origin is allowed
 * @return boolean Whether the origin is allowed
 */
function isOriginAllowed() {
    if (!isset($_SERVER['HTTP_ORIGIN'])) {
        error_log('No origin header found');
        return false;
    }
    
    $origin = $_SERVER['HTTP_ORIGIN'];
    $allowed = in_array($origin, ALLOWED_ORIGINS, true);
    
    error_log('Origin check: ' . $origin . ' - ' . ($allowed ? 'allowed' : 'not allowed'));
    
    return $allowed;
}

/**
 * Format the contact email body
 * @param array $data The form data
 * @return string Formatted email body
 */
function formatEmailBody($data) {
    $body = "New Support Request\n\n";
    $body .= "Service Type: " . ($data['serviceType'] ?? 'N/A') . "\n";
    $body .= "Name: " . ($data['name'] ?? 'N/A') . "\n";
    $body .= "Email: " . ($data['email'] ?? 'N/A') . "\n";
    $body .= "Organization: " . ($data['company'] ?? 'N/A') . "\n";
    $body .= "Region: " . ($data['region'] ?? 'N/A') . "\n";
    $body .= "Platform: " . ($data['platform'] ?? 'N/A') . "\n";
    $body .= "Version Details: " . ($data['versions'] ?? 'N/A') . "\n";
    $body .= "Urgency: " . ($data['urgency'] ?? 'N/A') . "\n\n";
    $body .= "Message:\n" . ($data['message'] ?? 'N/A') . "\n";
    
    return $body;
}