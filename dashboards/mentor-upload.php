<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Class - SOBUJ ACADEMY</title>
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
            <a href="mentor-dashboard.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-chart-pie text-base"></i> ড্যাশবোর্ড ওভারভিউ
            </a>
            <a href="mentor-upload.php" class="flex items-center gap-3 px-4 py-2.5 rounded-lg bg-amber-500/10 text-amber-600 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-circle-plus text-base"></i> ক্লাস ভিডিও আপলোড
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-comments text-base"></i> স্টুডেন্ট Q&A ফোরাম
            </a>
            <a href="#" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-gray-600 hover:bg-gray-50 hover:text-gray-900 font-bold text-[15px] transition-all">
                <i class="fa-solid fa-file-pen text-base"></i> অ্যাসাইনমেন্ট রিভিউ
            </a>
        </nav>
    </aside>

    <main class="flex-1 space-y-6">
        <div class="bg-white border border-gray-200/80 rounded-xl p-6 shadow-sm">
            <h3 class="text-lg font-black text-gray-900 tracking-wide border-b border-gray-100 pb-3 mb-6">
                <i class="fa-solid fa-cloud-arrow-up text-amber-500 mr-1"></i> নতুন রেকর্ডেড ক্লাস ভিডিও আপলোড করুন
            </h3>
            
            <form class="space-y-5">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="text-sm font-bold text-gray-700">কোর্সটি নির্বাচন করুন <span class="text-red-500">*</span></label>
                        <select class="w-full h-[44px] px-4 border border-gray-200 rounded-lg bg-white focus:outline-none focus:border-amber-500 text-[14px] font-bold text-gray-700">
                            <option value="1">Android App Development with Java & Server APIs</option>
                        </select>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-sm font-bold text-gray-700">মডিউল / অধ্যায় <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="উদা: মডিউল ৩: API Integration" class="w-full h-[44px] px-4 border border-gray-200 rounded-lg focus:outline-none focus:border-amber-500 text-[14px]">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="text-sm font-bold text-gray-700">ক্লাস নম্বর (সিরিয়াল) <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="উদা: ক্লাস ৩.২" class="w-full h-[44px] px-4 border border-gray-200 rounded-lg focus:outline-none focus:border-amber-500 text-[14px]">
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-sm font-bold text-gray-700">ক্লাসের মূল শিরোনাম (Title) <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="উদা: হাউ টু ইমপ্লিমেন্ট স্প্ল্যাশ স্ক্রিন এপিআই" class="w-full h-[44px] px-4 border border-gray-200 rounded-lg focus:outline-none focus:border-amber-500 text-[14px]">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="text-sm font-bold text-gray-700">ইউটিউব ভিডিও এম্বেড লিংক (YouTube Embed URL) <span class="text-red-500">*</span></label>
                        <input type="url" placeholder="উদা: https://www.youtube.com/embed/dQw4w9WgXcQ" class="w-full h-[44px] px-4 border border-gray-200 rounded-lg focus:outline-none focus:border-amber-500 text-[14px]">
                        <span class="text-[11px] font-bold text-gray-400 block mt-0.5"><i class="fa-solid fa-circle-info text-amber-500"></i> অবশ্যই ইউটিউব ভিডিওর Embed লিংকটি ব্যবহার করবেন।</span>
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-sm font-bold text-gray-700">রিসোর্স বা সোর্স কোড ডাউনলোড লিংক (ঐচ্ছিক)</label>
                        <input type="url" placeholder="গুগল ড্রাইভ বা জিপ ফাইলের লিংক" class="w-full h-[44px] px-4 border border-gray-200 rounded-lg focus:outline-none focus:border-amber-500 text-[14px]">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="text-sm font-bold text-gray-700">ক্লাসের বিবরণ বা বর্ণনা (Short Description)</label>
                    <textarea rows="3" placeholder="এই ক্লাসে স্টুডেন্টরা কী কী শিখতে পারবে তার সংক্ষিপ্ত বিবরণ..." class="w-full p-4 border border-gray-200 rounded-lg focus:outline-none focus:border-amber-500 text-[14px] resize-none"></textarea>
                </div>

                <div class="pt-2 flex justify-end">
                    <button type="submit" class="h-[44px] px-8 bg-amber-500 hover:bg-amber-600 text-white font-bold rounded-lg text-sm shadow-sm transition cursor-pointer">
                        <i class="fa-solid fa-circle-check mr-1"></i> ক্লাসটি সফলভাবে পাবলিশ করুন
                    </button>
                </div>
            </form>
        </div>

        <div class="mt-8 border-t border-gray-100 pt-6 space-y-4">
                <h4 class="text-base font-black text-gray-900 tracking-wide flex items-center gap-2">
                    <i class="fa-solid fa-photo-film text-amber-500"></i> বর্তমানে আপলোড করা ক্লাসসমূহের তালিকা
                </h4>
                
                <div class="overflow-x-auto border border-gray-200/60 rounded-xl">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-gray-50 text-gray-700 font-bold border-b border-gray-200 text-[13px]">
                                <th class="p-3 text-center">সিরিয়াল</th>
                                <th class="p-3">মডিউল ও ক্লাসের নাম</th>
                                <th class="p-3">ইউটিউব লিংক</th>
                                <th class="p-3 text-center">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-600 font-medium text-[13px]">
                            <tr class="hover:bg-gray-50/50">
                                <td class="p-3 text-center font-bold text-gray-900">৩.১</td>
                                <td class="p-3">
                                    <span class="block text-[11px] font-bold text-amber-600 uppercase">মডিউল ৩: API Integration</span>
                                    <span class="font-bold text-gray-900">ইন্ট্রোডাকশন টু সার্ভার সাইড এপিআই অ্যান্ড জেসন ডাটা</span>
                                </td>
                                <td class="p-3 text-blue-500 truncate max-w-[150px]">/embed/dQw4w9WgXcQ</td>
                                <td class="p-3 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" class="w-7 h-7 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded flex items-center justify-center transition cursor-pointer" title="এডিট করুন"><i class="fa-solid fa-pen-to-square text-xs"></i></button>
                                        <button type="button" class="w-7 h-7 bg-red-50 text-red-600 hover:bg-red-100 rounded flex items-center justify-center transition cursor-pointer" title="ডিলিট করুন"><i class="fa-solid fa-trash-can text-xs"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50/50">
                                <td class="p-3 text-center font-bold text-gray-900">৩.২</td>
                                <td class="p-3">
                                    <span class="block text-[11px] font-bold text-amber-600 uppercase">Mমডিউল ৩: API Integration</span>
                                    <span class="font-bold text-gray-900">হাউ টু ইমপ্লিমেন্ট স্প্ল্যাশ স্ক্রিন এপিআই ইন অ্যান্ড্রয়েড</span>
                                </td>
                                <td class="p-3 text-blue-500 truncate max-w-[150px]">/embed/dQw4w9WgXcQ</td>
                                <td class="p-3 text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <button type="button" class="w-7 h-7 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded flex items-center justify-center transition cursor-pointer"><i class="fa-solid fa-pen-to-square text-xs"></i></button>
                                        <button type="button" class="w-7 h-7 bg-red-50 text-red-600 hover:bg-red-100 rounded flex items-center justify-center transition cursor-pointer"><i class="fa-solid fa-trash-can text-xs"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8 border-t border-gray-100 pt-6 space-y-4">
                <h4 class="text-base font-black text-gray-900 tracking-wide flex items-center gap-2">
                    <i class="fa-solid fa-comments text-emerald-600"></i> স্টুডেন্টদের নতুন প্রশ্নসমূহ (Q&A Support)
                </h4>
                
                <div class="p-4 border border-gray-100 rounded-xl bg-slate-50/50 space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-8 h-8 rounded-full bg-amber-500 text-white font-bold text-xs flex items-center justify-center">AS</span>
                            <div>
                                <h5 class="text-xs font-black text-gray-900">Apon Islam Sobuj <span class="font-normal text-gray-400">(Student ID: 2026)</span></h5>
                                <span class="text-[10px] font-bold text-gray-400 block">ক্লাস ৩.২ এর নিচে প্রশ্ন করেছেন</span>
                            </div>
                        </div>
                        <span class="text-[10px] font-bold bg-rose-50 text-rose-600 px-2 py-0.5 rounded">Unanswered</span>
                    </div>
                    <p class="text-xs font-bold text-gray-700 bg-white p-3 border border-gray-100 rounded-lg">
                        "ভাইয়া, স্প্ল্যাশ স্ক্রিন রান করার পর অ্যাপ ক্র্যাশ করছে। `AndroidManifest.xml` এ থিম অ্যাড করেছি, তাও সমস্যা দেখাচ্ছে। একটু সমাধান বলবেন?"
                    </p>
                    <div class="flex gap-2">
                        <input type="text" placeholder="স্টুডেন্টের প্রশ্নের উত্তর এখানে লিখুন..." class="flex-1 h-[36px] px-3 border border-gray-200 rounded-lg text-xs focus:outline-none focus:border-amber-500 bg-white">
                        <button type="button" class="h-[36px] px-4 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs rounded-lg transition cursor-pointer">রিপ্লাই পাঠান</button>
                    </div>
                </div>
            </div>
            
    </main>

</div>

</body>
</html>