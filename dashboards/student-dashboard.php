<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ... সেশন চেক কোড ...
require_once '../config/database.php'; // এখানে তোমার ডাটাবেজ কানেকশন ফাইলের সঠিক পাথ দাও


// যদি ইউজার লগইন করা না থাকে অথবা তার রোল STUDENT না হয়
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'STUDENT') {
    $_SESSION['error_msg'] = "অনুগ্রহ করে প্রথমে লগইন করুন।";
    header("Location: ../login.php");
    exit();
}

// ব্যাক বাটন প্রোটেকশন হেডার
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>

<?php 
// ১. ফাইলের একদম শুরুতে সেশন স্টার্ট নিশ্চিত করা
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Hind Siliguri', 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] text-gray-800 select-none">

<header class="w-full fixed top-0 left-0 z-50 bg-white border-b border-gray-100 shadow-[0_5px_30px_rgba(0,0,0,0.16)]">
    <div class="max-w-7xl mx-auto h-[64px] px-6 flex justify-between items-center">
        <a href="../index.html" class="flex items-center gap-2 shrink-0">
            <img src="../assets/images/image.png" alt="Logo" class="w-9 h-9 object-contain">
            <div class="flex flex-col leading-none ml-0.5">
                <span class="text-gray-900 text-lg font-black tracking-wide">SOBUJ</span>
                <span class="text-[9px] font-bold text-gray-400 tracking-[0.25em] mt-0.5">ACADEMY</span>
            </div>
        </a>
        <div class="flex items-center gap-4">
            <span class="text-sm font-bold text-gray-700 bg-gray-100 px-3 py-1.5 rounded-md">🎓 স্টুডেন্ট প্যানেল</span>
            <a href="../auth/logout.php" class="text-red-500 font-bold text-sm hover:underline">লগআউট</a>
        </div>
    </div>
</header>

<div class="max-w-7xl mx-auto px-4 md:px-6 pt-[90px] pb-16 flex flex-col lg:flex-row gap-6">
    
    <aside class="w-full lg:w-[260px] shrink-0 bg-white border border-gray-200/80 rounded-xl p-5 shadow-sm h-fit">
        <div class="flex items-center gap-3 pb-5 mb-5 border-b border-gray-100">
            <div class="w-11 h-11 bg-[#e91e63] text-white rounded-full flex items-center justify-center font-bold text-lg shadow-sm">
                AI
            </div>
            <div class="flex flex-col">
                <h4 class="text-sm font-black text-gray-900 leading-tight">Apon Islam Sobuj</h4>
                <span class="text-[11px] font-bold text-gray-400 mt-0.5">ID: SA-202605</span>
            </div>
        </div>
        
        <nav class="space-y-1">
            <a href="student-dashboard.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-[#e91e63]/10 text-[#e91e63] hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-gauge-high text-base"></i> আমার ড্যাশবোর্ড
            </a>
            
            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-[#e91e63]/10 text-[#e91e63] hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-video text-base"></i> জয়েন লাইভ ক্লাস
            </a>
            
            <a href="student-courses.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-[#e91e63]/10 text-[#e91e63] hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-book-open text-base"></i> এনরোলড কোর্সসমূহ
            </a>
            
            <a href="student-notice.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-[#e91e63]/10 text-[#e91e63] hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-bullhorn text-base"></i> নোটিশ বোর্ড
            </a>
            
            <a href="student-profile.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-[#e91e63]/10 text-[#e91e63] hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-user-gear text-base"></i> প্রোফাইল সেটিংস
            </a>
        </nav>
    </aside>

    <main class="flex-1 space-y-6">

    <?php
$live = $pdo->query("SELECT * FROM live_classes WHERE is_active = 1 LIMIT 1")->fetch();
if ($live):
?>
<div class="mb-6 p-6 bg-white border-2 border-rose-500 rounded-2xl shadow-sm flex items-center justify-between animate-pulse">
    <div>
        <span class="text-[10px] font-black text-rose-500 uppercase">🔴 বর্তমানে লাইভ</span>
        <h3 class="text-xl font-black text-gray-900">ক্লাস নং: <?php echo $live['class_number']; ?> - <?php echo $live['class_topic']; ?></h3>
    </div>
    <a href="<?php echo $live['meet_link']; ?>" target="_blank" class="bg-rose-600 text-white font-bold px-6 py-3 rounded-xl">জয়েন করুন</a>
</div>
<?php endif; ?>
        
        
        <div class="bg-amber-50 border border-amber-200 text-amber-900 rounded-xl p-4 flex items-start gap-3 shadow-xs">
            <i class="fa-solid fa-bullhorn text-lg text-amber-600 mt-0.5 animate-bounce"></i>
            <div class="flex-1">
                <h4 class="text-sm font-black tracking-wide">জরুরী নোটিশ: আজ রাত ৯:০০ টায় রেস্ট এপিআই (REST API) এর ওপর লাইভ প্রজেক্ট ক্লাস হবে।</h4>
                <p class="text-xs font-bold text-amber-700/80 mt-0.5">সবাইকে পিসিতে Android Studio রেডি রাখার জন্য অনুরোধ করা হলো। <a href="#" class="underline text-[#e91e63] ml-1">লাইভ ক্লাসে জয়েন করুন</a></p>
            </div>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white border border-gray-200/80 p-5 rounded-xl shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center text-xl"><i class="fa-solid fa-graduation-cap"></i></div>
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">চলতি কোর্স</span>
                    <h3 class="text-xl font-black text-gray-900 mt-0.5">০২ টি</h3>
                </div>
            </div>
            <div class="bg-white border border-gray-200/80 p-5 rounded-xl shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center text-xl"><i class="fa-solid fa-circle-check"></i></div>
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">সম্পূর্ণ কোর্স</span>
                    <h3 class="text-xl font-black text-gray-900 mt-0.5">০১ টি</h3>
                </div>
            </div>
            <div class="bg-white border border-gray-200/80 p-5 rounded-xl shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-50 text-purple-600 rounded-xl flex items-center justify-center text-xl"><i class="fa-solid fa-clock-history"></i></div>
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">অ্যাসাইনমেন্ট বাকি</span>
                    <h3 class="text-xl font-black text-gray-900 mt-0.5">০৩ টি</h3>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200/80 rounded-xl p-6 shadow-sm space-y-4">
            <h3 class="text-lg font-black text-gray-900 tracking-wide border-b border-gray-100 pb-3">আমার চলমান কোর্সসমূহ</h3>
            
            <div class="flex flex-col md:flex-row items-center gap-5 p-4 border border-gray-100 rounded-xl hover:shadow-md transition duration-200">
                <div class="w-full md:w-36 h-24 bg-slate-900 rounded-lg shrink-0 flex flex-col items-center justify-center text-slate-500 font-bold text-xs gap-1">
                    <i class="fa-solid fa-code text-2xl text-[#e91e63]"></i>
                    <span>ANDROID APP</span>
                </div>
                <div class="flex-1 w-full space-y-2">
                    <span class="bg-[#e91e63]/10 text-[#e91e63] font-bold text-[11px] px-2 py-0.5 rounded">Premium Course</span>
                    <h4 class="text-base font-bold text-gray-900 leading-snug">Android App Development with Java & Modern Server APIs</h4>
                    
                    <div class="w-full bg-gray-100 h-2 rounded-full overflow-hidden mt-2">
                        <div class="bg-[#e91e63] h-full rounded-full" style="width: 45%;"></div>
                    </div>
                    <div class="flex justify-between items-center text-xs font-bold text-gray-500">
                        <span>মডিউল শেষ: ৪৫%</span>
                        <span>১৮/৪০ টি ক্লাস সম্পন্ন</span>
                    </div>
                </div>
                <div class="shrink-0 w-full md:w-auto pt-2 md:pt-0">
                    <a href="student-classroom.php" class="w-full md:w-auto h-[38px] px-5 bg-[#e91e63] text-white font-bold rounded-lg text-sm flex items-center justify-center shadow-sm hover:opacity-90 transition">
                        ক্লাস শুরু করুন <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_SESSION['success_msg'])): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'স্বাগতম!',
        text: '<?php echo $_SESSION['success_msg']; ?>',
        confirmButtonColor: '#e91e63',
        timer: 3500,
        timerProgressBar: true
    });
</script>
<?php 
    // মেসেজ দেখানো শেষে সেশন থেকে ক্লিয়ার করে দেওয়া
    unset($_SESSION['success_msg']); 
endif; 
?>

<script>
    setInterval(function(){
        // প্রতি ১ মিনিট পর পর পেজটি রিলোড হবে যাতে নতুন স্ট্যাটাস আপডেট পায়
        location.reload();
    }, 60000); 
</script>

</body>
</html>