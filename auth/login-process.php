<?php
// ডাটাবেজ এবং গ্লোবাল সিকিউরিটি গার্ড কানেক্ট করা
require_once '../config/database.php';
require_once '../includes/security.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

enforce_post_method();
validate_required_fields(['mobile', 'password'], '../login.php');

// 🌟 ডিলব্রেকার ফিক্স: কোনো sanitize_input ফাংশন ছাড়া সরাসরি ইনপুট রিসিভ করা
$mobile   = isset($_POST['mobile']) ? trim($_POST['mobile']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : ''; 

try {
    // মোবাইল নম্বর থেকে শুধু সংখ্যাগুলো ছেঁকে নেওয়া (যেন স্পেস/ড্যাশ সব সাফ হয়ে যায়)
    $clean_mobile = preg_replace('/[^0-9]/', '', $mobile); 
    
    // ডাটাবেজ থেকে নিখুঁতভাবে ইউজার খোঁজা
    $stmt = $pdo->prepare("SELECT * FROM users WHERE REPLACE(TRIM(mobile), ' ', '') = :mobile LIMIT 1");
    $stmt->execute(['mobile' => $clean_mobile]);
    $user = $stmt->fetch();

    // ডাইনামিক পাসওয়ার্ড ভেরিফিকেশন (সবার জন্য সেম স্ট্যান্ডার্ড)
    if ($user && password_verify($password, trim($user['password']))) {
        
        if ($user['status'] === 'BLOCKED') {
            $_SESSION['old_mobile'] = $mobile;
            $_SESSION['error_msg'] = "দুঃখিত! আপনার অ্যাকাউন্টটি বর্তমানে স্থগিত বা ব্লক করা আছে।";
            header("Location: ../login.php");
            exit();
        }

        // লগইন সফল: ওল্ড সেশন ক্লিয়ার
        unset($_SESSION['old_mobile']);

        // সেশন ডাটা সেট করা
        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['success_msg'] = "আপনি সফলভাবে লগইন করেছেন! ড্যাশবোর্ডে স্বাগতম।";

        // রোল অনুযায়ী ড্যাশবোর্ডে রিডাইরেক্ট করা
        if ($user['role'] === 'ADMIN') {
            header("Location: ../dashboards/admin-dashboard.php");
            exit();
        } else if ($user['role'] === 'MENTOR') {
            header("Location: ../dashboards/mentor-dashboard.php");
            exit();
        } else {
            header("Location: ../dashboards/student-dashboard.php");
            exit();
        }

    } else {
        // কোনো ম্যাচ না হলে স্ট্যান্ডার্ড সিকিউর এরর
        $_SESSION['old_mobile'] = $mobile;
        $_SESSION['error_msg'] = "ভুল মোবাইল নম্বর অথবা পাসওয়ার্ড দেওয়া হয়েছে!";
        header("Location: ../login.php");
        exit();
    }

} catch (\PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['old_mobile'] = $mobile;
    $_SESSION['error_msg'] = "লগইন প্রসেস সাময়িকভাবে ব্যর্থ হয়েছে। আবার চেষ্টা করুন।";
    header("Location: ../login.php");
    exit();
}