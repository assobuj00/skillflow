<?php
// কেউ যদি সরাসরি ব্রাউজারে config/database.php লিখে ঢোকার চেষ্টা করে, তাকে ব্লক করবে
if (count(get_included_files()) == 1) {
    header("HTTP/1.1 403 Forbidden");
    exit("Direct access denied.");
}

$host = 'localhost';
$db   = 'skillflow_db'; // তোমার ডাটাবেজের নাম
$user = 'root'; 
$pass = '';     
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false, // ইমুলেশন ফলস করে রিয়েল প্রিপেয়ার্ড স্টেটমেন্ট অন করা হলো
];

try {
     $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
     error_log($e->getMessage());
     die("Database connection failed securely.");
}