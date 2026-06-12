<?php
// Database file er jonno
require_once($_SERVER['DOCUMENT_ROOT'] . '/skillflow/config/database.php');
$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM mentors WHERE id = ?");
$stmt->execute([$id]);
$mentor = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$mentor) { die("মেন্টর পাওয়া যায়নি!"); }
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title><?php echo $mentor['name']; ?> - Mentor Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $mentor['name']; ?> - Mentor Details</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
    /* পুরো সাইটের জন্য প্রফেশনাল ফন্ট সেটআপ */
    body {
        font-family: 'Hind Siliguri', 'Inter', sans-serif;

        /* হেডার ফিক্সড হওয়ার কারণে বডিকে ১১৪ পিক্সেল নিচে নামানো হলো */
        padding-top: 114px;
    }

</style>

</head>
<body class="bg-gray-50">

<!-- header include -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/skillflow/header.php'); ?>

<div class="max-w-6xl mx-auto px-6 py-16 flex flex-col md:flex-row gap-12 items-start">
    <div class="w-full md:w-1/3">
        <div class="relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-1000"></div>
            <img src="../uploads/<?php echo $mentor['image']; ?>" class="relative w-full aspect-square object-cover rounded-full border-4 border-white shadow-xl">
        </div>
    </div>

    <div class="w-full md:w-2/3">
    <h1 class="text-2xl md:text-3xl font-black text-slate-900"><?php echo $mentor['name']; ?></h1>
    
    <p class="text-xs md:text-sm text-cyan-700 font-semibold mt-0.5 tracking-tight"><?php echo $mentor['title']; ?></p>
    
    <div class="my-3 border-b border-slate-200"></div>
    
    <h2 class="text-sm font-bold text-slate-800 mb-1.5 uppercase tracking-wider">About <?php echo $mentor['name']; ?></h2>
    
    <div class="max-h-[250px] overflow-y-auto pr-2 scrollbar-thin">
        <p class="text-slate-600 leading-relaxed text-[11px] md:text-xs text-justify">
            <?php echo nl2br($mentor['description']); ?>
        </p>
    </div>
</div>
</div>

<!-- footer include -->
    <?php include($_SERVER['DOCUMENT_ROOT'] . '/skillflow/footer.php'); ?>
</body>
</html>