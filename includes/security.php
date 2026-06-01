<?php
if (session_status() === PHP_SESSION_NONE) {
    // জাভাস্ক্রিপ্ট দিয়ে সেশন কুকি চুরি রোধে সিকিউরিটি অন
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    session_start();
}

// সেশন হাইজ্যাকিং রুখতে প্রতি ৩০ মিনিটে সেশন আইডি পরিবর্তন
if (!isset($_SESSION['last_regeneration'])) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
} else if (time() - $_SESSION['last_regeneration'] > 1800) {
    session_regenerate_id(true);
    $_SESSION['last_regeneration'] = time();
}

// ইনপুট ক্লিন করার ফাংশন (XSS Protection)
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)), ENT_QUOTES, 'UTF-8');
}

// 🚫 ব্ল্যাংক বা ফাঁকা ডাটা ডাটাবেজে ঢোকা বন্ধ করার কোর গার্ড
function validate_required_fields($fields_array, $redirect_url) {
    foreach ($fields_array as $field) {
        if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
            $_SESSION['error_msg'] = "ত্রুটি: কোনো ফিল্ড ফাঁকা (Blank) রাখা যাবে না!";
            header("Location: " . $redirect_url);
            exit();
        }
    }
}

// ডিরেক্ট URL পোস্ট রিকোয়েস্ট ব্লকার
function enforce_post_method() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        exit("Direct access strictly prohibited.");
    }
}