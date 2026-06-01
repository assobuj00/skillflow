<?php
require_once '../config/database.php';
session_start();

// শুধুমাত্র লাইভ ক্লাসগুলোকে ইন-অ্যাক্টিভ করা
$pdo->query("UPDATE live_classes SET is_active = 0 WHERE is_active = 1");

$_SESSION['success_msg'] = "লাইভ ক্লাস সফলভাবে শেষ করা হয়েছে!";
header("Location: mentor-dashboard.php");
exit();
?>