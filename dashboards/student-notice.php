<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board - SOBUJ ACADEMY</title>
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
        <nav class="space-y-1">
            <a href="student-dashboard.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-gauge-high text-base"></i> আমার ড্যাশবোর্ড
            </a>
            <a href="student-courses.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-book-open text-base"></i> এনরোলড কোর্সসমূহ
            </a>
            <a href="student-notice.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-[#e91e63]/10 text-[#e91e63] font-bold text-[15px] transition-all">
                <i class="fa-solid fa-bullhorn text-base"></i> নোটিশ বোর্ড
            </a>
            <a href="student-profile.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-user-gear text-base"></i> প্রোফাইল সেটিংস
            </a>
        </nav>
    </aside>

    <main class="flex-1 space-y-6">
        <div class="bg-white border border-gray-200/80 rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-black text-gray-900 tracking-wide border-b border-gray-100 pb-3 mb-6">
                <i class="fa-solid fa-clipboard-list text-[#e91e63] mr-1"></i> একাডেমী নোটিশ বোর্ড
            </h3>
            
            <div class="space-y-4">
                
                <div class="p-5 border border-gray-100 rounded-xl bg-gray-50/50 hover:border-gray-200 transition duration-200 space-y-3">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <span class="bg-rose-100 text-rose-700 font-bold text-xs px-2.5 py-1 rounded-md flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-600 animate-pulse"></span> অত্যন্ত জরুরী
                        </span>
                        <span class="text-xs font-bold text-gray-400"><i class="fa-solid fa-calendar-days mr-1"></i> ২৩ মে, ২০২৬</span>
                    </div>
                    <h4 class="text-base font-black text-gray-900 leading-snug">মডিউল ৩ এর ওপর মেগা কুইজ পরীক্ষা ও অ্যাসাইনমেন্ট সাবমিশন গাইডলাইন</h4>
                    <p class="text-sm text-gray-600 font-medium leading-relaxed">
                        আগামী ২৫ মে রাত ৮:০০ টায় আমাদের Android App Development কোর্সের ৩ নম্বর মডিউলের ওপর একটি লাইভ কুইজ পরীক্ষা অনুষ্ঠিত হবে। কুইজের পাশাপাশি আপনাদের কাস্টম স্প্ল্যাশ স্ক্রিন প্রজেক্টের সোর্স কোডটি জিপ (Zip) ফাইল করে ড্যাশবোর্ডে আপলোড করতে হবে। কুইজের মার্কস ফাইনাল সার্টিফিকেটে যুক্ত করা হবে।
                    </p>
                    <div class="text-xs font-bold text-gray-400 border-t border-gray-100/70 pt-2 flex items-center gap-1">
                        <i class="fa-solid fa-user-tie text-[#e91e63]"></i> পোস্ট করেছেন: মেন্টর প্যানেল
                    </div>
                </div>

                <div class="p-5 border border-gray-100 rounded-xl bg-gray-50/50 hover:border-gray-200 transition duration-200 space-y-3">
                    <div class="flex flex-wrap items-center justify-between gap-2">
                        <span class="bg-blue-100 text-blue-700 font-bold text-xs px-2.5 py-1 rounded-md">সাধারণ নোটিশ</span>
                        <span class="text-xs font-bold text-gray-400"><i class="fa-solid fa-calendar-days mr-1"></i> ১৮ মে, ২০২৬</span>
                    </div>
                    <h4 class="text-base font-bold text-gray-900 leading-snug">সার্ভার মেইনটেইন্যান্সের জন্য আগামী কাল সকাল ৪:০০ টা থেকে ৬:০০ টা পর্যন্ত সাইট বন্ধ থাকবে</h4>
                    <p class="text-sm text-gray-600 font-medium leading-relaxed">
                        প্রিয় শিক্ষার্থীবৃন্দ, আমাদের LMS সার্ভার আপগ্রেড এবং সিকিউরিটি প্যাচ আপডেটের জন্য আগামীকাল ভোরে ২ ঘণ্টার জন্য সাময়িকভাবে প্ল্যাটফর্মের অ্যাক্সেস বন্ধ থাকবে। সাময়িক অসুবিধার জন্য আমরা আন্তরিকভাবে দুঃখিত।
                    </p>
                    <div class="text-xs font-bold text-gray-400 border-t border-gray-100/70 pt-2 flex items-center gap-1">
                        <i class="fa-solid fa-user-crown text-amber-500"></i> পোস্ট করেছেন: সুপার এডমিন
                    </div>
                </div>

            </div>
        </div>
    </main>

</div>

</body>
</html>