<?php
// sidebar.php এর শুরুতে এই লাইনটি দিন
require_once __DIR__ . '/../../includes/security.php'; 
?>

<aside class="w-full lg:w-[270px] shrink-0 bg-slate-900 border border-slate-800 rounded-2xl p-5 shadow-xl h-fit text-slate-300">
        <div class="flex items-center gap-3 pb-5 mb-5 border-b border-slate-800">
            <div class="w-11 h-11 bg-cyan-500 text-slate-950 rounded-full flex items-center justify-center font-black text-base shadow-lg">ADM</div>
            <div class="flex flex-col">
                <h4 class="text-sm font-black text-white leading-tight"><?php echo sanitize_input($_SESSION['user_name']); ?></h4>
                <span class="text-[10px] font-bold text-cyan-400 mt-0.5 uppercase tracking-wider">Main Owner</span>
            </div>
        </div>
        
        <nav class="space-y-1">

        <?php $page = basename($_SERVER['PHP_SELF']); ?>

            <a href="admin-dashboard.php" class="<?php echo ($page == 'admin-dashboard.php') ? 'bg-[#e91e63] text-white' : 'text-slate-400 hover:bg-slate-800'; ?> flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-bold text-[15px] transition-all">
                <i class="fa-solid fa-chart-line text-base"></i> ওভারভিউ ও রেভিনিউ
            </a>
            <a href="admin-notice-panel.php" class="<?php echo ($page == 'admin-notice-panel.php') ? 'bg-[#e91e63] text-white' : 'text-slate-400 hover:bg-slate-800'; ?> flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-bold text-[15px] transition-all">
                <i class="fa-solid fa-bell text-base"></i> নোটিশ ম্যানেজমেন্ট
            </a>
            <a href="admin-courses.php" class="<?php echo ($page == 'admin-courses.php') ? 'bg-[#e91e63] text-white' : 'text-slate-400 hover:bg-slate-800'; ?> flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-bold text-[15px] transition-all">
                <i class="fa-solid fa-layer-group text-base"></i> কোর্সসমূহ
            </a>
            <a href="admin-dashboard.php" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-bold text-[15px] transition-all">
                <i class="fa-solid fa-money-bill-transfer text-base"></i> পেমেন্ট রিকোয়েস্টসমূহ
            </a>
            <a href="admin-dashboard.php" class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-400 hover:bg-slate-800 hover:text-white font-bold text-[15px] transition-all">
                <i class="fa-solid fa-users-gear text-base"></i> ইউজার অ্যান্ড মেন্টর কন্ট্রোল
            </a>
        </nav>
    </aside>