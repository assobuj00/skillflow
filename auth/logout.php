<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 🌟 সেশনের সব ডাটা খালি করা
$_SESSION = array();

// সেশন কুকি ডিলিট করা
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// সেশন পুরোপুরি ধ্বংস করা
session_destroy();

// 🌟 ব্রাউজার ক্যাশ ধ্বংস করার জন্য হেডার সেট (যাতে ব্যাক বাটন কাজ না করে)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// লগইন পেজে রিডাইরেক্ট
header("Location: ../login.php");
exit();