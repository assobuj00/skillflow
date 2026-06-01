<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// যদি ইউজার লগইন করা না থাকে অথবা তার রোল MENTOR না হয়
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'MENTOR') {
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
    <title>Mentor Dashboard - SOBUJ ACADEMY</title>
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
            <span class="text-sm font-bold text-gray-700 bg-amber-50 text-amber-700 border border-amber-200 px-3 py-1.5 rounded-md">👨‍🏫 মেন্টর প্যানেল</span>
            <a href="../auth/logout.php" class="text-red-500 font-bold text-sm hover:underline">লগআউট</a>
        </div>
    </div>
</header>

<div class="max-w-7xl mx-auto px-4 md:px-6 pt-[90px] pb-16 flex flex-col lg:flex-row gap-6">
    
    <aside class="w-full lg:w-[260px] shrink-0 bg-white border border-gray-200/80 rounded-xl p-5 shadow-sm h-fit">
        <div class="flex items-center gap-3 pb-5 mb-5 border-b border-gray-100">
            <div class="w-11 h-11 bg-amber-500 text-white rounded-full flex items-center justify-center font-bold text-lg shadow-sm">
                MI
            </div>
            <div class="flex flex-col">
                <h4 class="text-sm font-black text-gray-900 leading-tight">Mentor Instructor</h4>
                <span class="text-[11px] font-bold text-emerald-600 mt-0.5">Verified Teacher</span>
            </div>
        </div>
        
        <nav class="space-y-1">
            <a href="mentor-dashboard.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-amber-500/10 text-amber-600 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-chart-pie text-base"></i> ড্যাশবোর্ড ওভারভিউ
            </a>

            <a href="javascript:void(0)" onclick="openLiveModal()" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-video text-base"></i> লাইভ ক্লাস লিঙ্ক আপলোড
            </a>

            
            <a href="mentor-upload.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-circle-plus text-base"></i> ক্লাস ভিডিও আপলোড
            </a>

            <a href="mentor-upload.php#qa-section" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-comments text-base"></i> স্টুডেন্ট Q&A ফোরাম
            </a>
            <a href="#assignment-section" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-file-pen text-base"></i> অ্যাসাইনমেন্ট রিভিউ
            </a>
        </nav>
    </aside>

    <main class="flex-1 space-y-6">
        
        <!-- <?php if (isset($_SESSION['success_msg']) && !empty($_SESSION['success_msg'])): ?>
            <div id="php-success-alert" class="bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl p-4 flex items-start gap-3 shadow-xs">
                <i class="fa-solid fa-circle-check text-lg text-emerald-600 mt-0.5"></i>
                <div class="flex-1">
                    <h4 class="text-sm font-black tracking-wide"><?php echo $_SESSION['success_msg']; ?></h4>
                </div>
            </div>
        <?php endif; ?> -->

        <?php

        require_once '../config/database.php';
// ডাটাবেজ থেকে বর্তমানে লাইভ ক্লাস চেক করছি
$live_stmt = $pdo->query("SELECT * FROM live_classes WHERE is_active = 1 LIMIT 1");
$current_live = $live_stmt->fetch(PDO::FETCH_ASSOC);
?>

<?php if ($current_live): ?>
    <div class="bg-rose-50 border border-rose-200 p-4 rounded-xl flex items-center justify-between mb-6 shadow-sm">
        <div class="flex items-center gap-3">
            <div class="w-3 h-3 bg-rose-500 rounded-full animate-pulse"></div>
            <div>
                <h4 class="text-sm font-black text-rose-900">লাইভ ক্লাস চলছে: <br>Topic: <?php echo htmlspecialchars($current_live['class_topic']); ?></h4>
                <p class="text-[11px] font-bold text-rose-700">ক্লাস নম্বর: <?php echo $current_live['class_number']; ?></p>
            </div>
        </div>
        
        <form action="stop-live.php" method="POST">
            <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white px-5 py-2 rounded-lg font-bold text-sm transition">
                <i class="fa-solid fa-stop-circle mr-2"></i> ক্লাস শেষ করুন
            </button>
        </form>
    </div>
<?php else: ?>

    <!-- <div class="bg-gray-50 p-4 rounded-xl mb-6 text-gray-500 font-bold text-sm text-center border-2 border-dashed border-gray-200">
        বর্তমানে কোনো লাইভ ক্লাস চলছে না। নতুন ক্লাস শুরু করতে লিঙ্ক আপলোড করুন।
    </div> -->
<?php endif; ?>
        
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="bg-white border border-gray-200/80 p-5 rounded-xl shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center text-xl"><i class="fa-solid fa-book text-xl"></i></div>
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">আমার মোট কোর্স</span>
                    <h3 class="text-xl font-black text-gray-900 mt-0.5">০১ টি</h3>
                </div>
            </div>
            <div class="bg-white border border-gray-200/80 p-5 rounded-xl shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center text-xl"><i class="fa-solid fa-users"></i></div>
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">মোট সক্রিয় স্টুডেন্ট</span>
                    <h3 class="text-xl font-black text-gray-900 mt-0.5">১৪৮ জন</h3>
                </div>
            </div>
            <div class="bg-white border border-gray-200/80 p-5 rounded-xl shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center text-xl"><i class="fa-solid fa-envelope-open-text"></i></div>
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">নতুন প্রশ্ন (Q&A)</span>
                    <h3 class="text-xl font-black text-gray-900 mt-0.5">০৫ টি</h3>
                </div>
            </div>
        </div>

        <div id="assignment-section" class="bg-white border border-gray-200/80 rounded-xl p-6 shadow-sm space-y-4">
            <h3 class="text-lg font-black text-gray-900 tracking-wide flex items-center gap-2 border-b border-gray-100 pb-3">
                <i class="fa-solid fa-file-pen text-amber-500"></i> স্টুডেন্টদের জমা দেওয়া অ্যাসাইনমেন্টসমূহ
            </h3>
            
            <div class="space-y-4">
                <div class="p-4 border border-gray-100 rounded-xl bg-gray-50/50 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-blue-600 text-white font-bold text-sm flex items-center justify-center">AS</div>
                        <div>
                            <h5 class="text-sm font-black text-gray-900">Apon Islam Sobuj</h5>
                            <span class="text-xs font-bold text-gray-400 block">টাস্ক: মডিউল ৩ - কাস্টম স্প্ল্যাশ স্ক্রিন প্রজেক্ট (Java)</span>
                        </div>
                    </div>
                    
                    <div class="flex flex-wrap items-center gap-3 w-full md:w-auto justify-end">
                        <a href="#" class="h-[34px] px-3 border border-blue-200 bg-blue-50 hover:bg-blue-100 text-blue-600 font-bold text-xs rounded-lg flex items-center gap-1 transition">
                            <i class="fa-solid fa-circle-arrow-down"></i> সোর্স কোড ডাউনলোড
                        </a>
                        <div class="flex items-center gap-1.5">
                            <input type="number" placeholder="মার্কস (১০০)" class="w-[85px] h-[34px] px-2.5 border border-gray-200 rounded-lg text-xs font-bold text-center focus:outline-none focus:border-amber-500 bg-white">
                            <button type="button" class="h-[34px] px-4 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs rounded-lg transition cursor-pointer">সাবমিট</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200/80 rounded-xl p-6 shadow-sm space-y-4">
            <h3 class="text-lg font-black text-gray-900 tracking-wide flex items-center gap-2">
                <i class="fa-solid fa-graduation-cap text-emerald-600"></i> কোর্সে ভর্তি হওয়া শিক্ষার্থীদের তালিকা
            </h3>
            
            <div class="overflow-x-auto border border-gray-200/60 rounded-xl">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-gray-700 font-bold border-b border-gray-200 text-[13px]">
                            <th class="p-3 text-center">স্টুডেন্ট আইডি</th>
                            <th class="p-3">শিক্ষার্থীর নাম</th>
                            <th class="p-3">মোবাইল নম্বর</th>
                            <th class="p-3 text-center">কোর্স প্রোগ্রেস</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-600 font-medium text-[13px]">
                        <tr class="hover:bg-gray-50/50">
                            <td class="p-3 text-center font-bold text-gray-900">SA-202605</td>
                            <td class="p-3 font-bold text-gray-900">Apon Islam Sobuj</td>
                            <td class="p-3">01958536790</td>
                            <td class="p-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <div class="w-24 bg-gray-100 h-2 rounded-full overflow-hidden">
                                        <div class="bg-emerald-500 h-full" style="width: 45%;"></div>
                                    </div>
                                    <span class="text-xs font-bold text-emerald-600">৪৫%</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_SESSION['success_msg'])): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'স্বাগতম মেন্টর বস!',
        text: '<?php echo $_SESSION['success_msg']; ?>',
        confirmButtonColor: '#f59e0b',
        timer: 3500,
        timerProgressBar: true
    });
</script>
<?php 
    // মেসেজ দেখানো শেষে সেশন থেকে ক্লিয়ার করে দেওয়া
    unset($_SESSION['success_msg']); 
endif; 
?>

<div id="liveModal" class="hidden fixed inset-0 bg-gray-900/50 z-[999] flex items-center justify-center p-4">
    <div class="bg-white p-6 rounded-2xl w-full max-w-md shadow-2xl">
        <h3 class="text-xl font-black text-gray-900 mb-5">লাইভ ক্লাসের তথ্য দিন</h3>
        <form action="process-live.php" method="POST" class="space-y-4">
            <input type="number" name="class_number" placeholder="ক্লাস নম্বর" required class="w-full h-[48px] px-4 bg-gray-50 border border-gray-200 rounded-xl outline-none" require>
            <input type="text" name="class_topic" placeholder="আজকের ক্লাসের টপিক" required class="w-full h-[48px] px-4 bg-gray-50 border border-gray-200 rounded-xl outline-none" require>
            <input type="url" name="meet_link" placeholder="Google Meet/Zoom Link" required class="w-full h-[48px] px-4 bg-gray-50 border border-gray-200 rounded-xl outline-none"require>
            
            <div class="flex gap-3 mt-6">
                <button type="submit" class="flex-1 h-[48px] bg-amber-500 text-white font-bold rounded-xl">আপলোড করুন</button>
                <button type="button" onclick="document.getElementById('liveModal').classList.add('hidden')" class="px-6 h-[48px] bg-gray-100 text-gray-600 font-bold rounded-xl">বাতিল</button>
            </div>
        </form>
    </div>
</div>

<script>
    // sidebar theke button-e click korle modal khulbe
    function openLiveModal() {
        document.getElementById('liveModal').classList.remove('hidden');
    }
</script>

</body>
</html>