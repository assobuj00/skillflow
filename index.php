<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillFlow IT Institute</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
<body class="bg-gray-50 text-gray-800 font-sans">

<!-- header include -->
<?php include 'header.php'; ?>

    <section class="bg-gradient-to-r from-blue-900 to-indigo-900 text-white py-20 px-4">
        <div class="container mx-auto grid md:grid-cols-2 gap-10 items-center">
            <div class="space-y-6">
                <span class="bg-blue-500/20 text-blue-300 px-4 py-1.5 rounded-full text-sm font-semibold tracking-wide">স্মার্ট ক্যারিয়ার গড়ুন</span>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">
                    দক্ষতা অর্জনের মাধ্যমে নিজেকে যোগ্য হিসেবে গড়ে তুলুন
                </h1>
                <p class="text-gray-300 text-lg">
                    আমাদের স্পেশাল আইটি কোর্সগুলোর মাধ্যমে আপনার পেশাদার এবং ব্যক্তিগত বিকাশের এক নতুন দিগন্ত উন্মোচন করুন।
                </p>
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="#" class="bg-emerald-500 hover:bg-emerald-600 text-white px-6 py-3 rounded-lg font-bold shadow-lg transition">আমাদের কোর্সসমূহ</a>
                    <a href="#" class="bg-white/10 hover:bg-white/20 text-white px-6 py-3 rounded-lg font-bold border border-white/20 transition">ফ্রি সেমিনার</a>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="w-full max-w-md aspect-video bg-gray-800/50 rounded-2xl border border-white/10 flex items-center justify-center backdrop-blur-sm shadow-2xl">
                    <i class="fa-solid fa-play-circle text-6xl text-emerald-400 cursor-pointer hover:scale-110 transition"></i>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900">আমাদের জনপ্রিয় কোর্সসমূহ</h2>
            <p class="text-gray-500">সময়োপযোগী এবং প্রজেক্ট ভিত্তিক কারিকুলাম দিয়ে সাজানো আমাদের বিশেষ কোর্সসমূহ।</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
    <?php
    // ডেটাবেজ থেকে কোর্সগুলো নিয়ে আসা
    require_once 'config/database.php';
    $stmt = $pdo->query("SELECT * FROM courses ORDER BY id DESC");
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($courses) > 0) {
        foreach ($courses as $c) {
            // থাম্বনেইল ইমেজ পাথ চেক করা
            $imagePath = !empty($c['thumbnail']) ? 'uploads/' . $c['thumbnail'] : 'assets/images/default.jpg';
            ?>
            <div class="bg-white rounded-xl overflow-hidden shadow-[0_3px_10px_rgb(0,0,0,0.08)] hover:shadow-[0_8px_30px_rgb(0,0,0,0.12)] border border-gray-100 transition-all duration-300 group flex flex-col justify-between">

            <!--  Each Courses div -->
              <a href="courses/course-details.php?id=<?php echo $c['id']; ?>" class="block">
                <div>
                    <div class="aspect-video w-full bg-slate-900 relative overflow-hidden">
                        <img src="<?php echo $imagePath; ?>" alt="Course" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4 flex justify-between items-start gap-3">
                        <div class="space-y-2">
                            <h3 class="font-bold text-gray-800 text-sm md:text-base leading-snug group-hover:text-[#e91e63] transition-colors duration-200">
                                <?php echo htmlspecialchars($c['title']); ?>
                            </h3>
                            <p class="text-[#e91e63] font-bold text-sm">টাকা <?php echo number_format($c['price']); ?></p>
                            <p class="text-gray-500 text-[11px] font-bold">ডিউরেশন: <?php echo $c['duration']; ?></p>
                        </div>
                        <div class="text-gray-400 group-hover:text-[#e91e63] transition-colors duration-200 pt-1">
                            <i class="fa-solid fa-arrow-up-right-from-square text-sm"></i>
                        </div>
                    </div>
                </div>
                </a>
            <!--  Each Courses div -->
            </div>
            <?php
        }
    } else {
        echo "<p class='text-center col-span-3 text-gray-500'>বর্তমানে কোনো কোর্স নেই।</p>";
    }
    ?>
</div>

        <div class="text-center mt-12">
            <a href="#" class="inline-block border border-gray-300 text-gray-700 font-semibold px-6 py-2.5 rounded-md hover:bg-[#e91e63] hover:text-white hover:border-[#e91e63] transition-all duration-300 text-sm shadow-sm">
                View More
            </a>
        </div>

    </div>
</section>

<section class="py-16 bg-[#fdfaf2]">
    <div class="container mx-auto px-4 max-w-6xl">
        
        <div class="text-left mb-12 space-y-2">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 tracking-wide">
                আমাদের বিশেষ সেবা সমূহ
            </h2>
            <p class="text-gray-600 text-sm md:text-base font-medium">
                আমাদের কোর্সগুলোতে জয়েন করে আপনার পেশাদার এবং ব্যক্তিগত বিকাশে গভীর উন্নতির অভিজ্ঞতা নিন।
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <div class="bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-amber-100/50 hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-pink-50 rounded-xl flex items-center justify-center text-[#e91e63] text-xl mb-4">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">২৪/৭ সাপোর্ট</h3>
                <p class="text-gray-500 text-sm leading-relaxed">কোর্স চলাকালীন বা কোর্স শেষে যেকোনো সমস্যায় আমাদের টিম থেকে পাবেন সার্বক্ষণিক গাইডলাইন।</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-amber-100/50 hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-pink-50 rounded-xl flex items-center justify-center text-[#e91e63] text-xl mb-4">
                    <i class="fa-solid fa-chalkboard-user"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">লাইভ মেন্টরিং</h3>
                <p class="text-gray-500 text-sm leading-relaxed">সরাসরি ইন্ডাস্ট্রি এক্সপার্ট মেন্টরদের সাথে রিয়েল-টাইম প্রজেক্ট ভিত্তিক কাজ করার সুযোগ।</p>
            </div>

            <div class="bg-white p-6 rounded-2xl shadow-[0_4px_20px_rgba(0,0,0,0.03)] border border-amber-100/50 hover:-translate-y-1 transition-all duration-300">
                <div class="w-12 h-12 bg-pink-50 rounded-xl flex items-center justify-center text-[#e91e63] text-xl mb-4">
                    <i class="fa-solid fa-briefcase"></i>
                </div>
                <h3 class="font-bold text-gray-900 text-lg mb-2">জব প্লেসমেন্ট</h3>
                <p class="text-gray-500 text-sm leading-relaxed">সফলভাবে কোর্স সম্পন্নকারী শিক্ষার্থীদের জন্য রয়েছে বিভিন্ন স্বনামধন্য আইটি সংস্থায় ইন্টার্নশিপ ও জবের সুযোগ।</p>
            </div>

        </div>

    </div>
</section>

    <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-6xl">
        
        <div class="text-center mb-12 space-y-2">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-950">মাইলফলক</h2>
            <p class="text-gray-500 text-sm md:text-base font-medium">আমাদের উল্লেখযোগ্য সাফল্যের এক ঝলক</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            
            <div class="w-full h-[320px] md:h-[380px] rounded-2xl overflow-hidden shadow-sm bg-gray-200">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=800&q=80" 
                     alt="Learning at SOBUJ Academy" 
                     class="w-full h-full object-cover">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                
                <div class="bg-[#e6fbf3] p-8 rounded-2xl flex flex-col justify-center min-h-[140px] shadow-[0_2px_12px_rgba(230,251,243,0.3)] border border-[#d2f7e7]">
                    <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">১০০০০ +</h3>
                    <p class="text-gray-600 text-xs md:text-sm font-semibold mt-2">সর্বমোট এনরোলমেন্ট</p>
                </div>

                <div class="bg-[#fde8e9] p-8 rounded-2xl flex flex-col justify-center min-h-[140px] shadow-[0_2px_12px_rgba(253,232,233,0.3)] border border-[#fbcdd0]">
                    <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">১০০০ +</h3>
                    <p class="text-gray-600 text-xs md:text-sm font-semibold mt-2">সফল শিক্ষার্থী</p>
                </div>

                <div class="bg-[#eef2ff] p-8 rounded-2xl flex flex-col justify-center min-h-[140px] shadow-[0_2px_12px_rgba(238,242,255,0.3)] border border-[#e0e7ff]">
                    <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">৩৫০ +</h3>
                    <p class="text-gray-600 text-xs md:text-sm font-semibold mt-2">ইন্ডাস্ট্রি এক্সপার্টস</p>
                </div>

                <div class="bg-[#fffbeb] p-8 rounded-2xl flex flex-col justify-center min-h-[140px] shadow-[0_2px_12px_rgba(255,251,235,0.3)] border border-[#fef3c7]">
                    <h3 class="text-3xl font-extrabold text-gray-900 tracking-tight">৯০%</h3>
                    <p class="text-gray-600 text-xs md:text-sm font-semibold mt-2">সাকসেসফুল রেশিও</p>
                </div>

            </div>

        </div>

    </div>
</section>

<section class="py-16 bg-[#fdfaf2]">
    <div class="container mx-auto px-4 max-w-6xl">
        
        <div class="text-center mb-12 space-y-2">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-950">
                সাফল্যের গল্প
            </h2>
            <p class="text-gray-600 text-xs md:text-sm font-medium">
                আমাদের দৃঢ়প্রতিজ্ঞ শিক্ষার্থীদের সফলতার গল্প শুনুন ওদের কাছ থেকেই এবং অনুপ্রাণিত হোন।
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
            
            <div class="relative bg-gray-900 rounded-2xl overflow-hidden aspect-video shadow-lg group cursor-pointer">
                <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80" 
                     alt="Success Story 1" 
                     class="w-full h-full object-cover opacity-85 group-hover:scale-105 transition-transform duration-500">
                
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors duration-300"></div>

                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-16 h-16 bg-[#ef4444] text-white rounded-full flex items-center justify-center shadow-md shadow-red-500/30 group-hover:bg-red-600 group-hover:scale-110 transition-all duration-300">
                        <i class="fa-solid fa-play text-xl ml-1"></i>
                    </div>
                </div>

                <div class="absolute top-4 left-4 text-white font-bold tracking-wide text-xs opacity-75 flex items-center gap-1">
                    <i class="fa-solid fa-graduation-cap text-[#ef4444]"></i> SOBUJ Academy
                </div>
            </div>

            <div class="relative bg-gray-900 rounded-2xl overflow-hidden aspect-video shadow-lg group cursor-pointer">
                <img src="https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?auto=format&fit=crop&w=800&q=80" 
                     alt="Success Story 2" 
                     class="w-full h-full object-cover opacity-85 group-hover:scale-105 transition-transform duration-500">
                
                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors duration-300"></div>

                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-16 h-16 bg-[#ef4444] text-white rounded-full flex items-center justify-center shadow-md shadow-red-500/30 group-hover:bg-red-600 group-hover:scale-110 transition-all duration-300">
                        <i class="fa-solid fa-play text-xl ml-1"></i>
                    </div>
                </div>

                <div class="absolute top-4 left-4 text-white font-bold tracking-wide text-xs opacity-75 flex items-center gap-1">
                    <i class="fa-solid fa-graduation-cap text-[#ef4444]"></i> SOBUJ Academy
                </div>
            </div>

        </div>

    </div>
</section>

<section class="py-16 bg-[#f4f6f8]">
    <div class="container mx-auto px-4 max-w-6xl">
        
        <div class="text-left mb-12 space-y-2">
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-950 tracking-wide">
                ইভেন্ট এবং কার্যকলাপ
            </h2>
            <p class="text-gray-600 text-sm md:text-base font-medium">
                আমাদের ফটো গ্যালারিতে দেখে আসুন আমাদের ইভেন্টস ও অর্জন সমূহ
            </p>
        </div>
    </div>
</section>

<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-6xl">
        
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-extrabold text-gray-950 tracking-wide">
                আমাদের মেন্টরগণ
            </h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 max-w-5xl mx-auto justify-center">
            
            <div class="bg-white rounded-2xl p-6 text-center shadow-[0_4px_25px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-1.5 transition-all duration-300 group">
                <div class="w-32 h-32 mx-auto rounded-full p-1 bg-gradient-to-tr from-cyan-400 to-blue-500 shadow-inner overflow-hidden mb-4">
                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=400&q=80" 
                         alt="Mentor" class="w-full h-full object-cover rounded-full bg-white">
                </div>
                <h3 class="font-bold text-gray-900 text-base mb-1 group-hover:text-[#e91e63] transition-colors duration-200">
                    Mohammad Sourav Ahammed
                </h3>
                <p class="text-gray-400 text-xs font-medium">English Expert</p>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow-[0_4px_25px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-1.5 transition-all duration-300 group">
                <div class="w-32 h-32 mx-auto rounded-full p-1 bg-gradient-to-tr from-cyan-400 to-blue-500 shadow-inner overflow-hidden mb-4">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&q=80" 
                         alt="Mentor" class="w-full h-full object-cover rounded-full bg-white">
                </div>
                <h3 class="font-bold text-gray-900 text-base mb-1 group-hover:text-[#e91e63] transition-colors duration-200">
                    Al Mohammad Al Amin Soyon
                </h3>
                <p class="text-gray-400 text-xs font-medium">Lead Mentor</p>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow-[0_4px_25px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-1.5 transition-all duration-300 group">
                <div class="w-32 h-32 mx-auto rounded-full p-1 bg-gradient-to-tr from-cyan-400 to-blue-500 shadow-inner overflow-hidden mb-4">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=400&q=80" 
                         alt="Mentor" class="w-full h-full object-cover rounded-full bg-white">
                </div>
                <h3 class="font-bold text-gray-900 text-base mb-1 group-hover:text-[#e91e63] transition-colors duration-200">
                    Mahedi Hasan Shuvo
                </h3>
                <p class="text-gray-400 text-xs font-medium">Digital Marketing Expert</p>
            </div>

            <div class="bg-white rounded-2xl p-6 text-center shadow-[0_4px_25px_rgba(0,0,0,0.05)] border border-gray-100 hover:-translate-y-1.5 transition-all duration-300 group">
                <div class="w-32 h-32 mx-auto rounded-full p-1 bg-gradient-to-tr from-cyan-400 to-blue-500 shadow-inner overflow-hidden mb-4">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=400&q=80" 
                         alt="Mentor" class="w-full h-full object-cover rounded-full bg-white">
                </div>
                <h3 class="font-bold text-gray-900 text-base mb-1 group-hover:text-[#e91e63] transition-colors duration-200">
                    Md. Masud Rana
                </h3>
                <p class="text-gray-400 text-xs font-medium">Freelancer | Entrepreneur</p>
            </div>

        </div>

        <div class="mt-16 bg-white border border-gray-100 shadow-[0_4px_20px_rgba(0,0,0,0.03)] rounded-full px-6 py-3 max-w-3xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-4 text-center sm:text-left">
            <p class="text-gray-700 font-bold text-xs md:text-sm">
                প্রশিক্ষকের অপেক্ষায় হাজার হাজার শিক্ষার্থী। এখন শেখানো শুরু করুন এবং উপার্জন শুরু করুন!
            </p>
            <a href="#" class="bg-[#e91e63] text-white font-bold text-xs px-5 py-2.5 rounded-full hover:bg-red-600 transition shadow-sm shrink-0 whitespace-nowrap">
                প্রশিক্ষক হতে চান
            </a>
        </div>

    </div>
</section>

<section class="py-16 bg-[#fdfaf2]">
    <div class="container mx-auto px-4 max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            
            <div class="space-y-6 max-w-lg">
                <div class="space-y-3">
                    <h2 class="text-2xl md:text-3xl font-extrabold text-gray-950 tracking-wide">
                        ফ্রি সেমিনারের সময়সূচী
                    </h2>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed font-medium">
                        কোন কোর্সে ভর্তি হবেন, সেই কোর্সে কাজের সুযোগ কেমন, সে বিষয়ে বিস্তারিত জানতে জয়েন করুন আমাদের ফ্রি সেমিনারে
                    </p>
                </div>

                <div class="bg-[#e0f2fe] border border-blue-100 rounded-xl px-5 py-4 shadow-[0_2px_10px_rgba(224,242,254,0.4)] flex items-center">
                    <p class="text-[#0369a1] font-semibold text-sm tracking-wide md:text-base">
                        No seminars available at the moment.
                    </p>
                </div>
            </div>

            <div class="w-full h-[300px] md:h-[360px] rounded-3xl overflow-hidden shadow-md bg-gray-200">
                <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&w=800&q=80" 
                     alt="Free Seminar at SOBUJ Academy" 
                     class="w-full h-full object-cover">
            </div>

        </div>
    </div>
</section>

<section class="pt-16 pb-8 bg-[#fdfaf2]">
    <div class="container mx-auto px-4 max-w-6xl text-center space-y-2">
        <h2 class="text-2xl md:text-3xl font-extrabold text-gray-950 tracking-wide">
            শিক্ষার্থীরা যা বলেছেন
        </h2>
        <p class="text-gray-600 text-xs md:text-sm font-medium">
            আমাদের শিক্ষার্থীদের কাছ থেকে শুনুন সবুজ একাডেমি সম্পর্কে তাদের অভিজ্ঞতা।
        </p>
    </div>
</section>

<section class="pb-16 bg-white">
    <div class="container mx-auto px-4 max-w-5xl mt-6">
        
        <div class="relative border-2 border-[#e91e63] rounded-2xl px-6 py-8 md:py-10">
            
            <div class="absolute -top-4 left-6 bg-white px-4 flex items-center gap-2 select-none">
                <span class="w-2 h-2 bg-[#e91e63] rounded-full inline-block animate-pulse"></span>
                <span class="font-black text-gray-950 text-base md:text-lg tracking-wider">
                    Collaboration with
                </span>
                <span class="w-2 h-2 bg-[#e91e63] rounded-full inline-block animate-pulse"></span>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6 items-center justify-items-center opacity-75 group">
                
                <!-- <div class="h-10 flex items-center justify-center grayscale hover:grayscale-0 transition-all duration-300">
                    <span class="text-gray-400 font-bold tracking-widest text-sm sm:text-base">COMPANY 1</span>
                </div>

                <div class="h-10 flex items-center justify-center grayscale hover:grayscale-0 transition-all duration-300">
                    <span class="text-gray-400 font-bold tracking-widest text-sm sm:text-base">COMPANY 2</span>
                </div>

                <div class="h-10 flex items-center justify-center grayscale hover:grayscale-0 transition-all duration-300">
                    <span class="text-gray-400 font-bold tracking-widest text-sm sm:text-base">COMPANY 3</span>
                </div>

                <div class="h-10 flex items-center justify-center grayscale hover:grayscale-0 transition-all duration-300">
                    <span class="text-gray-400 font-bold tracking-widest text-sm sm:text-base">COMPANY 4</span>
                </div>

                <div class="h-10 flex items-center justify-center grayscale hover:grayscale-0 transition-all duration-300 col-span-2 sm:col-span-1">
                    <span class="text-gray-400 font-bold tracking-widest text-sm sm:text-base">COMPANY 5</span>
                </div> -->

            </div>

        </div>

    </div>
</section>

<section class="py-12 bg-[#f4f6f8]">
    <div class="container mx-auto px-4 max-w-5xl">
        
        <div class="bg-[#e91e63] rounded-2xl p-6 md:p-8 lg:p-10 shadow-md flex flex-col md:flex-row justify-between items-center gap-6 text-center md:text-left transition-all duration-300">
            
            <div class="text-white space-y-2">
                <h2 class="text-xl md:text-2xl lg:text-3xl font-bold tracking-wide">
                    আমাদের কোর্স সম্পর্কে বিস্তারিত জানতে আমাদের কল করুন
                </h2>
                <p class="text-white/80 text-sm md:text-base font-medium">
                    সকাল ৯ টা থেকে রাত ৮ টা পর্যন্ত
                </p>
            </div>

            <div class="shrink-0">
                <a href="tel:01958536790" class="inline-flex items-center justify-center bg-[#00bcd4] text-white font-bold text-base md:text-lg px-8 py-3.5 rounded-xl shadow-lg shadow-cyan-500/20 hover:bg-[#00acc1] hover:scale-105 transition-all duration-300 tracking-wider whitespace-nowrap">
                    01958-536790
                </a>
            </div>

        </div>

    </div>
</section>

<!-- footer include -->
<?php include 'footer.php'; ?>

</body>
</html>