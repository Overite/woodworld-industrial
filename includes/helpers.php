<?php
// Small helpers: output escaping, CSRF token, contact form handling.

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function clean_line(string $value, int $max): string
{
    $value = preg_replace('/[\r\n\t]+/', ' ', $value) ?? '';
    return mb_substr(trim($value), 0, $max);
}

/**
 * Handles the contact form. Returns an array with 'ok' (bool),
 * 'message' (string) and 'old' (submitted values) or null when
 * nothing was submitted.
 */
function handle_contact(array $cfg): ?array
{
    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST' || ($_POST['form'] ?? '') !== 'contact') {
        return null;
    }

    $old = [
        'name'    => clean_line((string)($_POST['name'] ?? ''), 80),
        'email'   => clean_line((string)($_POST['email'] ?? ''), 120),
        'phone'   => clean_line((string)($_POST['phone'] ?? ''), 40),
        'topic'   => clean_line((string)($_POST['topic'] ?? ''), 60),
        'message' => mb_substr(trim((string)($_POST['message'] ?? '')), 0, 3000),
    ];

    // Bots fill the hidden field. Pretend it worked.
    if (!empty($_POST['website'])) {
        return ['ok' => true, 'message' => 'Thank you. We will be in touch soon.', 'old' => []];
    }

    $token = (string)($_POST['csrf'] ?? '');
    if ($token === '' || !hash_equals($_SESSION['csrf'] ?? '', $token)) {
        return ['ok' => false, 'message' => 'Your session expired. Please try again.', 'old' => $old];
    }

    if ($old['name'] === '' || $old['message'] === '') {
        return ['ok' => false, 'message' => 'Please enter your name and a message.', 'old' => $old];
    }
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        return ['ok' => false, 'message' => 'Please enter a valid email address.', 'old' => $old];
    }

    // One message every 30 seconds per visitor.
    $last = (int)($_SESSION['last_sent'] ?? 0);
    if (time() - $last < 30) {
        return ['ok' => false, 'message' => 'Please wait a moment before sending another message.', 'old' => $old];
    }

    $to = (string)($cfg['to_email'] ?? '');
    if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
        error_log('Contact form: to_email is not set in includes/config.php');
        return ['ok' => false, 'message' => 'Messages cannot be sent right now. Please call or email us instead.', 'old' => $old];
    }

    $subject = 'Website enquiry: ' . ($old['topic'] !== '' ? $old['topic'] : 'General');
    $body = "Name: {$old['name']}\nEmail: {$old['email']}\nPhone: {$old['phone']}\nTopic: {$old['topic']}\n\n{$old['message']}\n";
    $headers = [
        'From'         => $cfg['from_email'],
        'Reply-To'     => $old['email'],
        'Content-Type' => 'text/plain; charset=UTF-8',
    ];

    $sent = mail($to, $subject, $body, $headers);
    if (!$sent) {
        error_log('Contact form: mail() failed');
        return ['ok' => false, 'message' => 'Your message could not be sent. Please call or email us instead.', 'old' => $old];
    }

    $_SESSION['last_sent'] = time();
    return ['ok' => true, 'message' => 'Thank you. We will be in touch soon.', 'old' => []];
}
