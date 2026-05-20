<?php
defined('ABSPATH') || exit;

add_action('wp_ajax_send_partnership_form', 'handle_partnership_form');
add_action('wp_ajax_nopriv_send_partnership_form', 'handle_partnership_form');

function handle_partnership_form() {
    check_ajax_referer('eride_nonce', 'nonce', false);

    if (!isset($_POST['action']) || $_POST['action'] !== 'send_partnership_form') {
        wp_send_json_error(['message' => 'Security check failed.']);
        wp_die();
    }

    $to      = 'info@eridetech.africa';
    $subject = 'New Submission: Partnership Contact Form';
    
    $name       = sanitize_text_field($_POST['name'] ?? '');
    $company    = sanitize_text_field($_POST['company-name'] ?? '');
    $position   = sanitize_text_field($_POST['position-title'] ?? '');
    $email      = sanitize_email($_POST['email'] ?? '');
    $phone      = sanitize_text_field($_POST['phone'] ?? '');
    $focus_area = sanitize_text_field($_POST['investment-focus-area'] ?? 'Not specified');
    $engagement = sanitize_text_field($_POST['preferred-engagement'] ?? 'Not specified');
    $message    = sanitize_textarea_field($_POST['message'] ?? '');

    $body = "
    <h2>New Partnership Enquiry</h2>
    <p><b>Full Name:</b> {$name}</p>
    <p><b>Company / Fund Name:</b> {$company}</p>
    <p><b>Position Title:</b> {$position}</p>
    <p><b>Email Address:</b> {$email}</p>
    <p><b>Phone Number:</b> {$phone}</p>
    <p><b>Investment Focus Area:</b> {$focus_area}</p>
    <p><b>Preferred Engagement:</b> {$engagement}</p>
    <p><b>Enquiry Details:</b><br>" . nl2br($message) . "</p>
    ";

    add_filter('wp_mail_content_type', function() { return 'text/html'; });

    $mail_sent = wp_mail($to, $subject, $body);

    remove_filter('wp_mail_content_type', function() { return 'text/html'; });

    if ($mail_sent) {
        wp_send_json_success(['message' => 'Enquiry submitted successfully.']);
    } else {
        wp_send_json_error(['message' => 'Server block: mail function is disabled.']);
    }

    wp_die();
}