<?php
require_once 'config/database.php'; 

// 🌟 নতুন এডমিনের তথ্যগুলো জাস্ট এইখানে চেঞ্জ করবে
$name     = 'New Admin Name';      // এডমিনের নাম
$email    = 'newadmin@gmail.com';   // এডমিনের ইমেইল
$mobile   = '01XXXXXXXXX';         // এডমিনের মোবাইল নম্বর (যেটা দিয়ে লগইন করবে)
$password = 'your_password_here';  // এডমিনের পাসওয়ার্ড

// সার্ভারের নিজস্ব ডিফল্ট অ্যালগরিদমে ফ্রেশ হ্যাশ তৈরি
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    // মোবাইল নম্বর অলরেডি আছে কিনা চেক করে ডিলিট করা (সেফটি চেক)
    $pdo->query("DELETE FROM users WHERE mobile = '$mobile'");

    // ডাটাবেজে ইনসার্ট
    $stmt = $pdo->prepare("INSERT INTO users (name, email, mobile, password, role, status) VALUES (:name, :email, :mobile, :password, :role, :status)");
    
    $stmt->execute([
        'name'     => $name,
        'email'    => $email,
        'mobile'   => $mobile,
        'password' => $hashed_password,
        'role'     => 'ADMIN', // রোল এডমিন সেট করা হলো
        'status'   => 'ACTIVE'
    ]);

    echo "<h2>✔ নতুন এডমিন অ্যাকাউন্ট সফলভাবে তৈরি হয়েছে!</h2>";
    echo "মোবাইল: " . $mobile . "<br>";
    echo "পাসওয়ার্ড: " . $password . "<br>";

} catch (\PDOException $e) {
    echo "❌ এরর: " . $e->getMessage();
}