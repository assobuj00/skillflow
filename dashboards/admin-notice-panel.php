<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course & Notice Management - SkillFlow IT</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Hind Siliguri', 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f1f5f9] text-slate-800 select-none">

<header class="w-full fixed top-0 left-0 z-50 bg-slate-900 border-b border-slate-800 shadow-lg h-[64px] px-6 flex justify-between items-center">
    <div class="flex items-center gap-2 shrink-0">
        <img src="../assets/images/image.png" alt="Logo" class="w-9 h-9 object-contain brightness-110">
        <div class="flex flex-col leading-none ml-0.5">
            <span class="text-white text-lg font-black tracking-wide">SkillFlow</span>
            <span class="text-[9px] font-bold text-cyan-400 tracking-[0.25em] mt-0.5">IT Institute</span>
        </div>
    </div>
    <div class="flex items-center gap-4">
        <span class="text-xs font-bold text-cyan-400 bg-cyan-500/10 border border-cyan-500/20 px-3 py-1.5 rounded-md">👑 সুপার এডমিন</span>
        <a href="../auth/logout.php" class="text-rose-400 font-bold text-sm hover:text-rose-300 transition">লগআউট</a>
    </div>
</header>

<div class="w-full max-w-[1600px] mx-auto px-4 md:px-6 pt-[85px] pb-16 flex flex-col lg:flex-row gap-6">
    
    <?php include 'includes/sidebar.php'; ?>

    <main class="flex-1 space-y-6">

    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm space-y-5">
                <h3 class="text-base font-black text-slate-900 tracking-wide flex items-center gap-2 border-b border-slate-100 pb-3">
                    <i class="fa-solid fa-bullhorn text-rose-500"></i> গ্লোবাল একাডেমি নোটিশ বোর্ড (Notice Push)
                </h3>
                
                <form class="space-y-4">
                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-600">নোটিশের ধরন (Notice Type) *</label>
                        <select class="w-full h-[42px] px-4 border border-slate-200 rounded-lg bg-white focus:outline-none focus:border-cyan-500 text-sm font-bold text-slate-700">
                            <option value="urgent">🔴 অত্যন্ত জরুরী নোটিশ</option>
                            <option value="general">🔵 সাধারণ নোটিশ</option>
                            <option value="holiday">🟢 ছুটির ঘোষণা বা অন্যান্য</option>
                        </select>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-600">নোটিশের মূল হেডিং / টাইটেল *</label>
                        <input type="text" placeholder="উদা: সার্ভার আপগ্রেড বা পরীক্ষার সিলেবাস..." class="w-full h-[42px] px-4 border border-slate-200 rounded-lg focus:outline-none focus:border-cyan-500 text-sm">
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-xs font-bold text-slate-600">বিস্তারিত নোটিশ কন্টেন্ট (Notice Details) *</label>
                        <textarea rows="4" placeholder="স্টুডেন্টদের উদ্দেশ্যে আপনার বিস্তারিত বার্তাটি এখানে টাইপ করুন..." class="w-full p-4 border border-slate-200 rounded-lg focus:outline-none focus:border-cyan-500 text-sm resize-none"></textarea>
                    </div>

                    <button type="submit" class="w-full h-[42px] bg-slate-900 hover:bg-slate-800 text-white font-black rounded-lg text-xs tracking-wide transition shadow-sm cursor-pointer">
                        <i class="fa-solid fa-paper-plane mr-1"></i> সকল স্টুডেন্টের প্যানেলে পুশ করুন
                    </button>
                </form>
            </div>

            </main>

</div>

</body>
</html>