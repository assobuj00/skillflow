<?php
// আমাদের কনফিগ ও সিকিউরিটি ফাইল কানেক্ট করা
require_once '../config/database.php';
require_once '../includes/security.php';

// ১. সিকিউরিটি চেক: রিকোয়েস্ট অবশ্যই POST মেথডে হতে হবে
enforce_post_method();

// ২. ব্ল্যাংক ডাটা প্রোটেকশন
validate_required_fields(['name', 'email', 'mobile', 'password', 'confirm_password'], '../register.php');

// ৩. ইনপুট ডেটা সানিতাইজ বা ক্লিন করা
$name             = sanitize_input($_POST['name']);
$email            = sanitize_input($_POST['email']);
$mobile           = sanitize_input($_POST['mobile']);
$password         = sanitize_input($_POST['password']);
$confirm_password = sanitize_input($_POST['confirm_password']);

// 💡 ভুল হলে ডাটা যেন মুছে না যায়, তাই ইনপুট ডাটা সেশনে ব্যাকআপ রাখা
if (session_status() === PHP_SESSION_NONE) { session_start(); }
$_SESSION['old_input'] = [
    'name'   => $name,
    'email'  => $email,
    'mobile' => $mobile
];

// ৪. ইমেইল ফরম্যাট ভ্যালিডেশন
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error_msg'] = "ত্রুটি: ইমেইল এড্রেসটির ফরম্যাট সঠিক নয়!";
    header("Location: ../register.php");
    exit();
}

// ৫. মোবাইল নম্বর ১১ ডিজিট ভ্যালিডেশন
if (!preg_match('/^01[3-9]\d{8}$/', $mobile)) {
    $_SESSION['error_msg'] = "ত্রুটি: মোবাইল নম্বরটি বৈধ নয়! সঠিক ১১ ডিজিটের মোবাইল নম্বর দিন।";
    header("Location: ../register.php");
    exit();
}

// ৬. পাসওয়ার্ড মিনিমাম ৪ ডিজিট ভ্যালিডেশন
if (strlen($password) < 4) {
    $_SESSION['error_msg'] = "ত্রুটি: পাসওয়ার্ড ন্যূনতম 4 ডিজিটের বা তার বেশি হতে হবে!";
    header("Location: ../register.php");
    exit();
}

// 🔐 ৬.৫. পাসওয়ার্ড ম্যাচিং চেক
if ($password !== $confirm_password) {
    $_SESSION['error_msg'] = "ত্রুটি: দুটি ফিল্ডের পাসওয়ার্ড মিলছে না! পুনরায় চেক করুন।";
    header("Location: ../register.php");
    exit();
}

try {
    // ৭. ডুপ্লিকেট ইমেইল চেক
    $email_check = $pdo->prepare("SELECT id FROM users WHERE email = :email LIMIT 1");
    $email_check->execute(['email' => $email]);
    if ($email_check->fetch()) {
        $_SESSION['error_msg'] = "ত্রুটি: এই ইমেইল দিয়ে অলরেডি অ্যাকাউন্ট তৈরি করা আছে!";
        header("Location: ../register.php");
        exit();
    }

    // ৮. ডুপ্লিকেট মোবাইল নম্বর চেক
    $mobile_check = $pdo->prepare("SELECT id FROM users WHERE mobile = :mobile LIMIT 1");
    $mobile_check->execute(['mobile' => $mobile]);
    if ($mobile_check->fetch()) {
        $_SESSION['error_msg'] = "ত্রুটি: এই মোবাইল নম্বরটি দিয়ে অলরেডি একটি অ্যাকাউন্ট রেজিস্টার্ড আছে!";
        header("Location: ../register.php");
        exit();
    }

    // ৯. পাসওয়ার্ড হ্যাশ করা
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // ১০. ডাটাবেজে ডাটা ইনসার্ট করা
    $insert_stmt = $pdo->prepare("INSERT INTO users (name, email, mobile, password, role, status) VALUES (:name, :email, :mobile, :password, 'STUDENT', 'ACTIVE')");
    $insert_stmt->execute([
        'name'     => $name,
        'email'    => $email,
        'mobile'   => $mobile,
        'password' => $hashed_password
    ]);

    // সফল হলে ওল্ড ইনপুট সেশন ক্লিন করে দেওয়া
    unset($_SESSION['old_input']);

    // 🌟 রেজিস্ট্রেশন সাকসেস পপআপের জন্য এই লাইনটি বসাও
    $_SESSION['reg_success_msg'] = "আপনার রেজিস্ট্রেশন সফল হয়েছে!<br>এখন লগইন করুন।";
    header("Location: ../login.php");
    exit();

} catch (\PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error_msg'] = "সিস্টেম ক্র্যাশ! ডাটাবেজে ইনফরমেশন পাঠানো সম্ভব হয়নি।";
    header("Location: ../register.php");
    exit();
}