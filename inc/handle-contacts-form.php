<?php
defined('ABSPATH') || exit;

add_action('wp_ajax_send_contacts_form', 'handle_contacts_form');
add_action('wp_ajax_nopriv_send_contacts_form', 'handle_contacts_form');

function handle_contacts_form() {
    check_ajax_referer('eride_nonce', 'nonce', false);

    if (!isset($_POST['action']) || $_POST['action'] !== 'send_contacts_form') {
        wp_send_json_error(['message' => 'Security check failed.']);
        wp_die();
    }
    
    $to      = 'info@eridetech.africa';
    $subject = 'New Submission: Contact Form';
    
    $fullName   = sanitize_text_field($_POST['full-name'] ?? '');
    $lastName   = sanitize_text_field($_POST['last-name'] ?? '');
    $email      = sanitize_email($_POST['email'] ?? '');
    $phone      = sanitize_text_field($_POST['phone'] ?? '');
    $message    = sanitize_textarea_field($_POST['message'] ?? '');

    $body = "
    <h2>New Website Contact Message</h2>
    <p><b>First Name:</b> {$fullName}</p>
    <p><b>Last Name:</b> {$lastName}</p>
    <p><b>Email Address:</b> {$email}</p>
    <p><b>Phone Number:</b> {$phone}</p>
    <p><b>Message Details:</b><br>" . nl2br($message) . "</p>
    ";

    add_filter('wp_mail_content_type', function() { return 'text/html'; });
    
    $headers = [
        'Reply-To: ' . $fullName . ' ' . $lastName . ' <' . $email . '>'
    ];

    $mail_sent = wp_mail($to, $subject, $body, $headers);

    remove_filter('wp_mail_content_type', function() { return 'text/html'; });

    if ($mail_sent) {
        wp_send_json_success(['message' => 'Your message was submitted successfully.']);
    } else {
        wp_send_json_error(['message' => 'Mail delivery failed on server. Please check SMTP configuration.']);
    }

    wp_die();
}