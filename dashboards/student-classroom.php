<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom - SOBUJ ACADEMY</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hind+Siliguri:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Hind Siliguri', 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#0f172a] text-slate-100 select-none"> <header class="w-full fixed top-0 left-0 z-50 bg-[#1e293b] border-b border-slate-700/50 shadow-lg h-[64px] px-4 md:px-6 flex justify-between items-center">
    <div class="flex items-center gap-4">
        <a href="student-dashboard.php" class="text-slate-400 hover:text-white transition-colors">
            <i class="fa-solid fa-arrow-left text-lg"></i>
        </a>
        <h1 class="text-sm md:text-base font-bold tracking-wide truncate max-w-[250px] md:max-w-xl">
            Android App Development - মডিউল ৩: API Integration
        </h1>
    </div>
    <div class="flex items-center gap-3">
        <span class="hidden sm:inline-block text-xs font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 px-2.5 py-1 rounded">Batch 01</span>
        <a href="../auth/logout.php" class="text-xs font-bold bg-slate-800 hover:bg-slate-700 border border-slate-700 px-3 py-2 rounded-lg text-slate-300 transition">লগআউট</a>
    </div>
</header>

<div class="w-full pt-[64px] min-h-screen flex flex-col lg:flex-row">
    
    <main class="flex-1 bg-[#0f172a] p-4 md:p-6 space-y-4">
        
        <div class="w-full aspect-video bg-black rounded-xl overflow-hidden shadow-2xl border border-slate-800 relative">
            <iframe class="w-full h-full" 
                    src="https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0&modestbranding=1&showinfo=0" 
                    title="YouTube video player" 
                    frameborder="0" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                    allowfullscreen>
            </iframe>
        </div>

        <div class="bg-[#1e293b] border border-slate-800 rounded-xl p-5 space-y-2 shadow-sm">
            <div class="flex flex-wrap items-center gap-2">
                <span class="bg-[#e91e63] text-white text-[11px] font-bold px-2 py-0.5 rounded">চলমান ক্লাস</span>
                <span class="text-xs text-slate-400 font-medium"><i class="fa-solid fa-clock mr-1"></i> সময়কাল: ২৫ মিনিট</span>
            </div>
            <h2 class="text-lg md:text-xl font-black text-white">৩.২ - হাউ টু ইমপ্লিমেন্ট স্প্ল্যাশ স্ক্রিন এপিআই ইন অ্যান্ড্রয়েড (Java)</h2>
            <p class="text-sm text-slate-400 font-medium pt-1">এই ক্লাসে আমরা দেখবো কীভাবে আধুনিক অ্যান্ড্রয়েড ডেভেলপমেন্টে কাস্টম স্প্ল্যাশ স্ক্রিন এপিআই থিম লেভেলে হ্যান্ডেল করতে হয়।</p>
        </div>

        <div class="bg-[#1e293b] border border-slate-800 rounded-xl overflow-hidden shadow-sm">
            <div class="flex border-b border-slate-800 bg-[#151f32]">
                <button class="px-5 py-3 text-sm font-bold border-b-2 border-[#e91e63] text-white flex items-center gap-2">
                    <i class="fa-solid fa-folder-open text-[#e91e63]"></i> ক্লাস রিসোর্স ও সোর্স কোড
                </button>
                <button class="px-5 py-3 text-sm font-bold text-slate-400 hover:text-white transition flex items-center gap-2">
                    <i class="fa-solid fa-comments"></i> প্রশ্ন ও উত্তর (Q&A Forum)
                </button>
            </div>
            
            <div class="p-5 space-y-3">
                <p class="text-xs font-bold text-slate-400">এই ক্লাসের সাথে সম্পর্কিত প্রয়োজনীয় ফাইলসমূহ নিচ থেকে ডাউনলোড করে নিন:</p>
                
                <div class="flex flex-wrap items-center justify-between gap-3 p-3 bg-[#0f172a]/60 border border-slate-800 rounded-lg">
                    <div class="flex items-center gap-3">
                        <i class="fa-solid fa-file-zipper text-2xl text-amber-500"></i>
                        <div>
                            <h5 class="text-sm font-bold text-white leading-none">Splash_Screen_API_Source_Code.zip</h5>
                            <span class="text-[11px] font-medium text-slate-400">ফাইল সাইজ: ৪.৫ মেগাবাইট</span>
                        </div>
                    </div>
                    <a href="#" class="h-[32px] px-4 bg-slate-800 hover:bg-slate-700 text-slate-200 font-bold text-xs rounded-md flex items-center gap-1.5 transition">
                        <i class="fa-solid fa-circle-arrow-down"></i> ডাউনলোড করুন
                    </a>
                </div>
            </div>
        </div>

    </main>

    <aside class="w-full lg:w-[380px] shrink-0 bg-[#1e293b] border-t lg:border-t-0 lg:border-l border-slate-800 flex flex-col h-auto lg:h-[calc(100vh-64px)] lg:sticky lg:top-[64px]">
        
        <div class="p-4 border-b border-slate-800 bg-[#1e293b] shrink-0">
            <h3 class="font-black text-sm uppercase tracking-wider text-slate-400 flex items-center gap-2">
                <i class="fa-solid fa-list-ol text-[#e91e63]"></i> কোর্সের কারিকুলাম ও ভিডিওসমূহ
            </h3>
        </div>

        <div class="flex-1 overflow-y-auto divide-y divide-slate-800/60 custom-scrollbar">
            
            <div class="p-4 flex gap-3 hover:bg-slate-800/40 cursor-pointer transition">
                <div class="text-emerald-500 pt-0.5"><i class="fa-solid fa-circle-check text-base"></i></div>
                <div class="flex-1 space-y-1">
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wide">ক্লাস ৩.১</h4>
                    <p class="text-sm font-semibold text-slate-300 leading-snug">ইন্ট্রোডাকশন টু সার্ভার সাইড এপিআই অ্যান্ড জেসন ডাটা</p>
                </div>
            </div>

            <div class="p-4 flex gap-3 bg-[#e91e63]/10 border-l-4 border-[#e91e63] cursor-pointer transition">
                <div class="text-[#e91e63] pt-0.5"><i class="fa-solid fa-circle-play text-base animate-pulse"></i></div>
                <div class="flex-1 space-y-1">
                    <h4 class="text-xs font-bold text-[#e91e63] uppercase tracking-wide">ক্লাস ৩.২ (চলছে)</h4>
                    <p class="text-sm font-bold text-white leading-snug">হাউ টু ইমপ্লিমেন্ট স্প্ল্যাশ স্ক্রিন এপিআই ইন অ্যান্ড্রয়েড (Java)</p>
                </div>
            </div>

            <div class="p-4 flex gap-3 hover:bg-slate-800/40 cursor-pointer transition opacity-60">
                <div class="text-slate-500 pt-0.5"><i class="fa-solid fa-lock text-sm"></i></div>
                <div class="flex-1 space-y-1">
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wide">ক্লাস ৩.৩</h4>
                    <p class="text-sm font-semibold text-slate-300 leading-snug">কানেক্টিং অ্যান্ড্রয়েড অ্যাপ উইথ রেস্ট এপিআই ইউজিং ভলি লাইব্রেরি</p>
                </div>
            </div>

        </div>
    </aside>

</div>

</body>
</html>