<?php
require_once '../config/database.php'; // Tomar db connection file
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class_num = $_POST['class_number'];
    $topic = $_POST['class_topic'];
    $link = $_POST['meet_link'];

    // Purono live class gula update kore inactive kore dao
    $pdo->query("UPDATE live_classes SET is_active = 0");

    // Notun live class insert koro
    $stmt = $pdo->prepare("INSERT INTO live_classes (class_number, class_topic, meet_link, is_active, created_at) VALUES (?, ?, ?, 1, NOW())");
    $stmt->execute([$class_num, $topic, $link]);

    $_SESSION['success_msg'] = "লাইভ ক্লাস সফলভাবে আপলোড হয়েছে!";
    header("Location: mentor-dashboard.php");
    exit();
}
?>