<?php
// ডাটাবেজ এবং গ্লোবাল সিকিউরিটি গার্ড কানেক্ট করা
require_once '../config/database.php';
require_once '../includes/security.php';

// ১. সিকিউরিটি গেটওয়ে: শুধুমাত্র লগইন করা ADMIN ছাড়া বাকি সবার জন্য অ্যাক্সেস ডিনাইড
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'ADMIN') {
    http_response_code(403);
    exit("Unauthorized admin request.");
}

// ২. মেথড চেক
enforce_post_method();

// ৩. ব্ল্যাংক ডাটা প্রোটেকশন: কোনো ফিল্ড ফাঁকা থাকলে আবার এডমিন ড্যাশবোর্ডে ব্যাক করাবে
validate_required_fields(['name', 'email', 'mobile', 'password'], '../dashboards/admin-dashboard.php');

// ৪. ইনপুট ডাটা ক্লিন করা (XSS প্রোটেকশন)
$name     = sanitize_input($_POST['name']);
$email    = sanitize_input($_POST['email']);
$mobile   = sanitize_input($_POST['mobile']);
$password = sanitize_input($_POST['password']);

// ৫. ইমেইল ফরম্যাট চেক
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_msg'] = "ত্রুটি: মেন্টর ইমেইল এড্রেসটির ফরম্যাট সঠিক নয়!";
    header("Location: ../dashboards/admin-dashboard.php");
    exit();
}

try {
    // ৬. ডুপ্লিকেট ইমেইল চেক (একই ইমেইলে একাধিক ইউজার যেন না হয়)
    $check_stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
    $check_stmt->execute(['email' => $email]);
    
    if ($check_stmt->fetch()) {
        $_SESSION['error_msg'] = "ত্রুটি: এই ইমেইল দিয়ে অলরেডি সিস্টেমে ইউজার বা মেন্টর অ্যাকাউন্ট আছে!";
        header("Location: ../dashboards/admin-dashboard.php");
        exit();
    }

    // ৭. পাসওয়ার্ড সিকিউরলি হ্যাশ করা (BCRYPT অ্যালগরিদম)
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // ৮. ডাটাবেজে মেন্টর রোল (`role = 'MENTOR'`) সেট করে ডেটা ইনসার্ট করা
    $insert_stmt = $pdo->prepare("INSERT INTO users (name, email, mobile, password, role, status) VALUES (:name, :email, :mobile, :password, 'MENTOR', 'ACTIVE')");
    $insert_stmt->execute([
        'name'     => $name,
        'email'    => $email,
        'mobile'   => $mobile,
        'password' => $hashed_password
    ]);

    // সফল হলে মেসেজ সেট করে ড্যাশবোর্ডে ব্যাক করানো
    $_SESSION['success_msg'] = "অভিনন্দন! নতুন মেন্টর অ্যাকাউন্টটি সফলভাবে তৈরি করা হয়েছে।";
    header("Location: ../dashboards/admin-dashboard.php");
    exit();

} catch (\PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error_msg'] = "সিস্টেম এরর! মেন্টর অ্যাকাউন্ট তৈরি করা যায়নি।";
    header("Location: ../dashboards/admin-dashboard.php");
    exit();
}