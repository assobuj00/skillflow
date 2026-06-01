<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// যদি ইউজার লগইন করা না থাকে অথবা তার রোল ADMIN না হয়
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'ADMIN') {
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
require_once '../config/database.php';
require_once '../includes/security.php';

// 👑 সিকিউরিটি গেটওয়ে: শুধুমাত্র ADMIN ছাড়া বাকি সবার জন্য অ্যাক্সেস ব্লক
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'ADMIN') {
    header("Location: ../login.html");
    exit();
}

try {
    // ১. মোট শিক্ষার্থীর সংখ্যা গণনা (রোল = STUDENT)
    $stmt_students = $pdo->prepare("SELECT COUNT(id) as total FROM users WHERE role = 'STUDENT'");
    $stmt_students->execute();
    $total_students = $stmt_students->fetch()['total'];

    // ২. মোট মেন্টরের সংখ্যা গণনা (রোল = MENTOR)
    $stmt_mentors = $pdo->prepare("SELECT COUNT(id) as total FROM users WHERE role = 'MENTOR'");
    $stmt_mentors->execute();
    $total_mentors = $stmt_mentors->fetch()['total'];

    // ৩. ডাটাবেজ থেকে মেন্টরদের রিয়েল তালিকা নিয়ে আসা
    $stmt_mentor_list = $pdo->prepare("SELECT id, name, email, status FROM users WHERE role = 'MENTOR' ORDER BY id DESC");
    $stmt_mentor_list->execute();
    $mentors = $stmt_mentor_list->fetchAll();

    // ৪. ডাটাবেজ থেকে স্টুডেন্টদের রিয়েল তালিকা নিয়ে আসা
    $stmt_student_list = $pdo->prepare("SELECT id, name, email, mobile, status FROM users WHERE role = 'STUDENT' ORDER BY id DESC");
    $stmt_student_list->execute();
    $students = $stmt_student_list->fetchAll();

} catch (\PDOException $e) {
    error_log($e->getMessage());
    die("Error fetching dashboard statistics securely.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillFlow IT - Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Hind+Siliguri:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Hind Siliguri', 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#fcfcfc] text-gray-800 select-none relative">

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
        
        <?php if (isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])): ?>
            <div class="bg-red-50 text-red-600 border border-red-200 text-xs font-bold p-4 rounded-[4px]">
                <?php echo $_SESSION['error_msg']; unset($_SESSION['error_msg']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success_msg']) && !empty($_SESSION['success_msg'])): ?>
            <div class="bg-emerald-50 text-emerald-600 border border-emerald-200 text-xs font-bold p-4 rounded-[4px]">
                <?php echo $_SESSION['success_msg']; ?>
            </div>
        <?php endif; ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white border border-gray-200 p-5 rounded-[4px] shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-cyan-50 text-cyan-600 rounded-[4px] flex items-center justify-center text-xl"><i class="fa-solid fa-user-graduate"></i></div>
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">মোট ছাত্র (Students)</span>
                    <h3 class="text-xl font-black text-gray-900 mt-0.5"><?php echo $total_students; ?> জন</h3>
                </div>
            </div>
            <div class="bg-white border border-gray-200 p-5 rounded-[4px] shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-[4px] flex items-center justify-center text-xl"><i class="fa-solid fa-chalkboard-user"></i></div>
                <div>
                    <span class="block text-xs font-bold text-gray-400 uppercase tracking-wider">মোট শিক্ষক (Mentors)</span>
                    <h3 class="text-xl font-black text-gray-900 mt-0.5"><?php echo $total_mentors; ?> জন</h3>
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-200 rounded-[4px] p-6 shadow-sm space-y-6">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-gray-100 pb-4">
                <h3 class="text-base font-black text-gray-900 tracking-wide flex items-center gap-2">
                    <i class="fa-solid fa-users-gear text-[#e91e63]"></i> ইউজার, মেন্টর ও স্টুডেন্ট কন্ট্রোল সেন্টার
                </h3>
                <button type="button" onclick="document.getElementById('mentorModal').classList.remove('hidden')" class="h-9 px-4 bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs rounded-[4px] flex items-center gap-1.5 transition shadow-sm cursor-pointer">
                    <i class="fa-solid fa-user-plus"></i> নতুন মেন্টর যুক্ত করুন
                </button>
            </div>

            <div class="space-y-3">
                <h4 class="text-xs font-black text-gray-400 uppercase tracking-wider flex items-center gap-1"><i class="fa-solid fa-chalkboard-user text-amber-500"></i> মেন্টর ও ইন্সট্রাক্টর লিস্ট</h4>
                <div class="overflow-x-auto border border-gray-200 rounded-[4px]">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-slate-50 text-gray-700 font-bold border-b border-gray-200 text-[13px]">
                                <th class="p-3">মেন্টরের নাম ও ইমেইল</th>
                                <th class="p-3 text-center">স্ট্যাটাস</th>
                                <th class="p-3 text-center">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-600 text-[13px]">
                            <?php if(empty($mentors)): ?>
                                <tr><td colspan="3" class="p-4 text-center text-gray-400 font-bold">কোনো মেন্টর পাওয়া যায়নি!</td></tr>
                            <?php else: ?>
                                <?php foreach($mentors as $mentor): ?>
                                <tr class="hover:bg-slate-50/50">
                                    <td class="p-3">
                                        <span class="font-bold text-gray-900 block"><?php echo sanitize_input($mentor['name']); ?></span>
                                        <span class="text-xs text-gray-400"><?php echo sanitize_input($mentor['email']); ?></span>
                                    </td>
                                    <td class="p-3 text-center">
                                        <span class="bg-emerald-100 text-emerald-800 font-bold text-[11px] px-2 py-0.5 rounded-[4px]"><?php echo $mentor['status']; ?></span>
                                    </td>
                                    <td class="p-3 text-center">
                                        <form action="../auth/delete-user.php" method="POST" onsubmit="return confirm('আপনি কি নিশ্চিতভাবে এই মেন্টর অ্যাকাউন্টটি মুছে ফেলতে চান?');" class="inline">
                                            <input type="hidden" name="user_id" value="<?php echo $mentor['id']; ?>">
                                            <button type="submit" class="w-7 h-7 bg-rose-50 text-rose-600 hover:bg-rose-100 rounded-[4px] flex items-center justify-center mx-auto transition cursor-pointer"><i class="fa-solid fa-trash-can text-xs"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="space-y-3 pt-2">
                <h4 class="text-xs font-black text-gray-400 uppercase tracking-wider flex items-center gap-1"><i class="fa-solid fa-user-graduate text-cyan-500"></i> রেজিস্টার্ড স্টুডেন্ট লিস্ট</h4>
                <div class="overflow-x-auto border border-gray-200 rounded-[4px]">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="bg-slate-50 text-gray-700 font-bold border-b border-gray-200 text-[13px]">
                                <th class="p-3">স্টুডেন্ট নাম ও মোবাইল</th>
                                <th class="p-3">ইমেইল</th>
                                <th class="p-3 text-center">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-600 text-[13px]">
                            <?php if(empty($students)): ?>
                                <tr><td colspan="3" class="p-4 text-center text-gray-400 font-bold">কোনো স্টুডেন্ট পাওয়া যায়নি!</td></tr>
                            <?php else: ?>
                                <?php foreach($students as $student): ?>
                                <tr class="hover:bg-slate-50/50">
                                    <td class="p-3">
                                        <span class="font-bold text-gray-900 block"><?php echo sanitize_input($student['name']); ?></span>
                                        <span class="text-xs font-bold text-cyan-600"><?php echo sanitize_input($student['mobile']); ?></span>
                                    </td>
                                    <td class="p-3"><?php echo sanitize_input($student['email']); ?></td>
                                    <td class="p-3 text-center">
                                        <form action="../auth/delete-user.php" method="POST" onsubmit="return confirm('আপনি কি নিশ্চিতভাবে এই শিক্ষার্থীকে রিমুভ করতে চান?');" class="inline">
                                            <input type="hidden" name="user_id" value="<?php echo $student['id']; ?>">
                                            <button type="submit" class="w-7 h-7 bg-rose-50 text-rose-600 hover:bg-rose-100 rounded-[4px] flex items-center justify-center mx-auto transition cursor-pointer"><i class="fa-solid fa-trash-can text-xs"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </main>
</div>

<div id="mentorModal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-xs flex items-center justify-center p-4">
    <div class="bg-white rounded-[4px] border border-gray-200 w-full max-w-md p-6 shadow-2xl space-y-4">
        <div class="flex items-center justify-between border-b border-gray-100 pb-3">
            <h4 class="text-sm font-black text-gray-900"><i class="fa-solid fa-chalkboard-user text-amber-500 mr-1"></i> নতুন মেন্টর প্রোফাইল তৈরি করুন</h4>
            <button onclick="document.getElementById('mentorModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 text-lg cursor-pointer"><i class="fa-solid fa-xmark"></i></button>
        </div>
        <form action="../auth/add-mentor-process.php" method="POST" class="space-y-4">
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-gray-600">মেন্টরের সম্পূর্ণ নাম *</label>
                <input type="text" name="name" required placeholder="মেন্টরের নাম লিখুন" class="w-full h-[40px] px-3 border border-gray-200 rounded-[4px] text-sm focus:outline-none focus:border-amber-500">
            </div>
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-gray-600">অফিশিয়াল ইমেইল এড্রেস *</label>
                <input type="email" name="email" required placeholder="mentor@sobujacademy.com" class="w-full h-[40px] px-3 border border-gray-200 rounded-[4px] text-sm focus:outline-none focus:border-amber-500">
            </div>
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-gray-600">মোবাইল নম্বর *</label>
                <input type="tel" name="mobile" required placeholder="01XXXXXXXXX" class="w-full h-[40px] px-3 border border-gray-200 rounded-[4px] text-sm focus:outline-none focus:border-amber-500">
            </div>
            <div class="space-y-1.5">
                <label class="text-xs font-bold text-gray-600">লগইন পাসওয়ার্ড নির্ধারণ করুন *</label>
                <input type="password" name="password" required placeholder="••••••••" class="w-full h-[40px] px-3 border border-gray-200 rounded-[4px] text-sm focus:outline-none focus:border-amber-500">
            </div>
            <button type="submit" class="w-full h-[40px] bg-amber-500 hover:bg-amber-600 text-white font-bold text-xs rounded-[4px] transition tracking-wide cursor-pointer">অ্যাকাউন্ট তৈরি নিশ্চিত করুন</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_SESSION['success_msg'])): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'স্বাগতম এডমিন বস!',
        text: '<?php echo $_SESSION['success_msg']; ?>',
        confirmButtonColor: '#0f172a', /* ওনার থিমের ডার্ক ব্লু/slate-900 কালার */
        timer: 3500,
        timerProgressBar: true
    });
</script>
<?php 
    // অ্যালার্ট ট্রিগার করার পর সেশন মেসেজটি একদম শেষে রিমুভ করা হলো
    unset($_SESSION['success_msg']); 
endif; 
?>

</body>
</html>