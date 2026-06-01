<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings - SOBUJ ACADEMY</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Hind Siliguri', 'Inter', sans-serif; }</style>
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
            <a href="../auth/logout.php" class="text-red-500 font-bold text-sm hover:underline">লগআউট</a>
        </div>
    </div>
</header>

<div class="max-w-7xl mx-auto px-4 md:px-6 pt-[90px] pb-16 flex flex-col lg:flex-row gap-6">
    
    <aside class="w-full lg:w-[260px] shrink-0 bg-white border border-gray-200/80 rounded-xl p-5 shadow-sm h-fit">
        <nav class="space-y-1">
    <a href="student-dashboard.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-[#e91e63]/10 text-[#e91e63] hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
        <i class="fa-solid fa-gauge-high text-base"></i> আমার ড্যাশবোর্ড
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
        <div class="bg-white border border-gray-200/80 rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-black text-gray-900 tracking-wide border-b border-gray-100 pb-3 mb-6">প্রোফাইল সেটিংস</h3>
            
            <form class="space-y-5 max-w-xl">
                <div class="space-y-1.5">
                    <label class="text-sm font-bold text-gray-700">আপনার সম্পূর্ণ নাম</label>
                    <input type="text" value="Apon Islam Sobuj" class="w-full h-[42px] px-4 border border-gray-200 rounded-lg focus:outline-none focus:border-[#e91e63] text-[15px]">
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-bold text-gray-400">মোবাইল নম্বর (পরিবর্তনযোগ্য নয়)</label>
                    <input type="text" value="01958536790" readonly class="w-full h-[42px] px-4 border border-gray-100 bg-gray-50 text-gray-400 rounded-lg text-[15px] cursor-not-allowed">
                </div>

                <div class="border-t border-gray-100 pt-4 mt-6">
                    <h4 class="font-bold text-gray-900 text-sm mb-4"><i class="fa-solid fa-key mr-1 text-[#e91e63]"></i> পাসওয়ার্ড পরিবর্তন করুন</h4>
                    
                    <div class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="text-xs font-bold text-gray-600">নতুন পাসওয়ার্ড</label>
                            <input type="password" placeholder="••••••••" class="w-full h-[42px] px-4 border border-gray-200 rounded-lg focus:outline-none focus:border-[#e91e63] text-[15px]">
                        </div>
                    </div>
                </div>

                <div class="pt-2">
                    <button type="submit" class="h-[42px] px-6 bg-[#e91e63] text-white font-bold rounded-lg text-sm shadow-sm hover:opacity-90 transition cursor-pointer">
                        তথ্য আপডেট করুন
                    </button>
                </div>
            </form>
        </div>
    </main>

</div>

</body>
</html>