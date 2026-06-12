<?php
require_once '../config/database.php';
session_start();

// Delete
if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM courses WHERE id = ?")->execute([$_GET['delete']]);
    $_SESSION['success_msg'] = "কোর্সটি ডিলিট হয়েছে!";
    header("Location: admin-courses.php");
}

// Add/Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['course_id'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $code = $_POST['code'];
    
    // File upload
    $img = $_POST['old_thumbnail'];
    $moduleImg = $_POST['old_module'];
    if (!empty($_FILES['thumbnail']['name'])) {
        $img = time() . '_' . $_FILES['thumbnail']['name'];
        $moduleImg = time() . '_' . $_FILES['module']['name'];
        move_uploaded_file($_FILES['thumbnail']['tmp_name'], '../uploads/' . $img);
        move_uploaded_file($_FILES['module']['tmp_name'], '../uploads/' . $moduleImg);
    }

    if (!empty($id)) {
        $stmt = $pdo->prepare("UPDATE courses SET title=?, price=?, thumbnail=?, module=?, course_code=? WHERE id=?");
        $stmt->execute([$title, $price, $img, $moduleImg, $code, $id]);
        $_SESSION['success_msg'] = "কোর্সটি আপডেট হয়েছে!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO courses (title, price, thumbnail, module, course_code) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$title, $price, $img, $moduleImg, $code]);
        $_SESSION['success_msg'] = "নতুন কোর্স যোগ হয়েছে!";
    }
    header("Location: admin-courses.php");
}