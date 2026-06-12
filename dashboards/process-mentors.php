<?php
require_once '../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    
    // ছবি ম্যানেজমেন্ট
    $image = $_POST['old_image']; // ডিফল্টভাবে পুরনো ছবি
    if (!empty($_FILES['image']['name'])) {
        $image = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image);
    }

    if (!empty($id)) {
        // আপডেট কুয়েরি: নিশ্চিত করুন এখানে কলামের নামগুলো ডাটাবেসের সাথে হুবহু মিলছে
        $stmt = $pdo->prepare("UPDATE mentors SET name=?, title=?, description=?, image=? WHERE id=?");
        $stmt->execute([$name, $title, $desc, $image, $id]);
        $_SESSION['success_msg'] = "মেন্টর আপডেট হয়েছে!";
    } else {
        // নতুন ইনসার্ট কুয়েরি
        $stmt = $pdo->prepare("INSERT INTO mentors (name, title, description, image) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $title, $desc, $image]);
        $_SESSION['success_msg'] = "নতুন মেন্টর যোগ হয়েছে!";
    }
    header("Location: mentors.php");
    exit();
}
?>