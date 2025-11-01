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
function validateFormData($data, $formType = 'contact') {
    // Determine which fields are required based on form type
    $requiredFields = $formType === 'support' ? SUPPORT_FORM_FIELDS : CONTACT_FORM_FIELDS;

    // Check for required fields
    foreach ($requiredFields as $field) {
        if (!isset($data[$field]) || empty($data[$field])) {
            return [false, "Missing required field: {$field}"];
        }
    }

    // Validate email format
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        return [false, 'Invalid email format'];
    }

    // Check message length
    if (strlen($data['message']) > MAX_MESSAGE_LENGTH) {
        return [false, 'Message exceeds maximum length'];
    }

    // Additional validation for support form
    // if ($formType === 'support') {
    //     if (!in_array($data['urgency'], ['low', 'medium', 'high', 'critical'])) {
    //         return [false, 'Invalid urgency level'];
    //     }
    //     if (!in_array($data['platform'], ['nextcloud', 'nginx', 'other'])) {
    //         return [false, 'Invalid platform selection'];
    //     }
    // }

    return [true, 'Validation successful'];
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
    // $body = "Support Request:\n\n";
    $body .= "Service Type: " . ($data['serviceType'] ?? 'N/A') . "\n";
    $body .= "Name: " . ($data['name'] ?? 'N/A') . "\n";
    $body .= "Email: " . ($data['email'] ?? 'N/A') . "\n";
    $body .= "Organization: " . ($data['company'] ?? 'N/A') . "\n";
    $body .= "Region: " . ($data['region'] ?? 'N/A') . "\n";
    $body .= "Platform: " . ($data['platform'] ?? 'N/A') . "\n";
    $body .= "Version Details: " . ($data['versions'] ?? 'N/A') . "\n";
    $body .= "Urgency: " . ($data['urgency'] ?? 'N/A') . "\n\n";
    $body .= ($data['message'] ?? 'N/A') . "\n";
    
    return $body;
}