<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Courses - SOBUJ ACADEMY</title>
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
            <h3 class="text-lg font-black text-gray-900 tracking-wide border-b border-gray-100 pb-3 mb-6">আমার কেনা কোর্সসমূহ</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition flex flex-col">
                    <div class="w-full h-40 bg-slate-900 flex items-center justify-center text-slate-500 font-bold text-sm">
                        <i class="fa-solid fa-code text-3xl mb-2 text-[#e91e63]"></i>
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between space-y-3">
                        <div>
                            <span class="bg-emerald-500/10 text-emerald-600 font-bold text-[10px] px-2 py-0.5 rounded uppercase">Active</span>
                            <h4 class="text-base font-bold text-gray-900 mt-1">Android App Development with Java & Server APIs</h4>
                        </div>
                        <a href="student-classroom.php" class="w-full h-[38px] bg-[#e91e63] text-white font-bold rounded-lg text-sm flex items-center justify-center shadow-sm hover:opacity-90 transition">
                            ক্লাসরুমে প্রবেশ করুন
                        </a>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition flex flex-col opacity-70">
                    <div class="w-full h-40 bg-slate-800 flex items-center justify-center text-slate-500 font-bold text-sm">
                        <i class="fa-solid fa-globe text-3xl mb-2 text-blue-500"></i>
                    </div>
                    <div class="p-4 flex-1 flex flex-col justify-between space-y-3">
                        <div>
                            <span class="bg-gray-100 text-gray-600 font-bold text-[10px] px-2 py-0.5 rounded uppercase">Completed</span>
                            <h4 class="text-base font-bold text-gray-900 mt-1">Full Stack Web Development - HTML, CSS & PHP</h4>
                        </div>
                        <a href="#" class="w-full h-[38px] bg-gray-800 text-white font-bold rounded-lg text-sm flex items-center justify-center shadow-sm hover:bg-gray-700 transition">
                            ভিডিওগুলো দেখুন
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

</div>

</body>
</html>