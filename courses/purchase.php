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
    <title>পেমেন্ট করুন - SkillFlow IT</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
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
<body class="bg-gray-100">

    <?php include '../header.php'; ?>

    <div class="max-w-md mx-auto my-16 bg-white p-8 rounded-2xl shadow-sm border border-slate-100">
        <h2 class="text-2xl font-black mb-6 text-slate-900">পেমেন্ট কমপ্লিট করুন</h2>
        <div class="bg-slate-50 p-4 rounded-xl mb-6">
            <p class="text-sm text-slate-600">আপনি ভর্তি হচ্ছেন:</p>
            <p class="font-bold text-lg text-slate-900 mb-2"><?php echo $course['title']; ?></p>
            <p class="text-rose-600 font-black text-xl">মোট পেমেন্ট: ৳ <?php echo number_format($course['price']); ?></p>
        </div>
        
        <form action="submit-purchase.php" method="POST" class="space-y-4">
            <input type="hidden" name="course_id" value="<?php echo $course['id']; ?>">
            <input type="text" name="name" placeholder="আপনার সম্পূর্ণ নাম" class="w-full p-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-cyan-500 outline-none" required>
            <input type="text" name="phone" placeholder="ফোন নম্বর" class="w-full p-3 border border-slate-200 rounded-xl focus:ring-2 focus:ring-cyan-500 outline-none" required>
            <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white p-4 rounded-xl font-black transition-all">
                অর্ডার কনফার্ম করুন
            </button>
        </form>
    </div>

    <?php include '../footer.php'; ?>
</body>
</html>