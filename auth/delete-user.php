<?php
require_once '../config/database.php';
require_once '../includes/security.php';

// ১. এডমিন অথরাইজেশন লক
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'ADMIN') {
    http_response_code(403);
    exit("Unauthorized admin request.");
}

enforce_post_method();
validate_required_fields(['user_id'], '../dashboards/admin-dashboard.php');

$target_user_id = sanitize_input($_POST['user_id']);

// সুপার এডমিন নিজের অ্যাকাউন্ট যেন নিজে ভুল করে ডিলিট না করে বসে, সেই প্রোটেকশন
if ($target_user_id == $_SESSION['user_id']) {
    $_SESSION['error_msg'] = "ত্রুটি: আপনি নিজের সুপার এডমিন অ্যাকাউন্ট ডিলিট করতে পারবেন না!";
    header("Location: ../dashboards/admin-dashboard.php");
    exit();
}

try {
    // ২. নির্দিষ্ট ইউজারকে ডাটাবেজ থেকে মুছে ফেলা
    $delete_stmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $delete_stmt->execute(['id' => $target_user_id]);

    $_SESSION['success_msg'] = "ইউজার/মেন্টর অ্যাকাউন্টটি সফলভাবে সিস্টেম থেকে মুছে ফেলা হয়েছে।";
    header("Location: ../dashboards/admin-dashboard.php");
    exit();

} catch (\PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error_msg'] = "ডাটাবেজ ডিপেনডেন্সি ত্রুটি! অ্যাকাউন্টটি ডিলিট করা সম্ভব হয়নি।";
    header("Location: ../dashboards/admin-dashboard.php");
    exit();
}