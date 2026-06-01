<?php
require_once '../config/database.php';
$id = $_GET['id'] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM courses WHERE id = ?");
$stmt->execute([$id]);
$course = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$course) { die("কোর্সটি পাওয়া যায়নি!"); }
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $course['title']; ?> - SkillFlow IT</title>
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
<body class="bg-slate-50">

<!-- header include -->
<?php include '../header.php'; ?>

    <main class="max-w-6xl mx-auto mt-6 mb-16 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-6">
                <h1 class="text-3xl md:text-4xl font-black text-slate-900 leading-tight"><?php echo $course['title']; ?></h1>
                <p class="text-slate-600 font-medium">এই কোর্সটি আপনাকে প্রফেশনাল স্কিল অর্জনে সাহায্য করবে।</p>
                <p class="text-slate-600 font-bold">কোর্সের মডিউল:</p>
                
                <div class="bg-white p-3 rounded-2xl shadow-sm border border-slate-100">
                    <img src="../uploads/<?php echo $course['module']; ?>" class="w-full rounded-xl" alt="Course Module">
                </div>
            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24 bg-white p-6 rounded-2xl shadow-lg border border-slate-100">
                    <img src="../uploads/<?php echo $course['thumbnail']; ?>" class="w-full h-56 object-cover rounded-xl mb-6">
                    
                    <div class="mb-6">
                        <span class="text-slate-400 text-xs font-bold uppercase tracking-widest">কোর্স ফি</span>
                        <h2 class="text-4xl font-black text-rose-600">৳ <?php echo number_format($course['price']); ?></h2>
                    </div>

                    <a href="purchase.php?id=<?php echo $course['id']; ?>" 
                       class="block text-center w-full bg-slate-900 text-white py-4 rounded-xl font-black text-lg transition-all duration-300 hover:bg-rose-600 hover:scale-[1.02]">
                       ব্যাচে ভর্তি হন
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- footer include -->
    <?php include '../footer.php'; ?>

</body>
</html>