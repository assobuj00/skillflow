<?php
session_start();
require_once '../config/database.php';
// এখানে তোমার সিকিউরিটি চেক বসাবে (যেমন: role == ADMIN)

$courses = $pdo->query("SELECT * FROM courses ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Management - SkillFlow IT</title>
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
    
<!-- sidebar include -->
    <?php include 'includes/sidebar.php'; ?>

    <main class="flex-1 space-y-6">
        <div class="flex justify-between items-center">
            <h3 class="text-lg font-black text-slate-900"><i class="fa-solid fa-layer-group text-cyan-600 mr-2"></i> কোর্স ম্যানেজমেন্ট</h3>
            <button onclick="openAddModal()" class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold px-5 py-2.5 rounded-lg text-sm transition cursor-pointer shadow-lg">
                <i class="fa-solid fa-plus mr-1"></i> নতুন কোর্স যুক্ত করুন
            </button>
        </div>

        <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-sm">
                    <thead>
                        <tr class="bg-slate-50 text-slate-700 font-bold border-b border-slate-200 text-[13px]">
                            <th class="p-3">ছবি</th><th class="p-3">নাম</th><th class="p-3">দাম</th><th class="p-3">কোড</th><th class="p-3 text-center">অ্যাকশন</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-slate-600 font-medium text-[13px]">
                        <?php foreach($courses as $c): ?>
                        <tr class="hover:bg-slate-50/50">
                            <td class="p-3"><img src="../uploads/<?php echo $c['thumbnail']; ?>" class="w-16 h-10 object-cover rounded"></td>
                            <td class="p-3 font-bold text-slate-900"><?php echo $c['title']; ?></td>
                            <td class="p-3">৳ <?php echo $c['price']; ?></td>
                            <td class="p-3"><?php echo $c['course_code']; ?></td>
                            <td class="p-3 text-center space-x-2">
                                <button onclick='editCourse(<?php echo json_encode($c); ?>)' class="text-cyan-600 hover:text-cyan-700 font-bold">এডিট</button>
                                <a href="process-course.php?delete=<?php echo $c['id']; ?>" class="text-rose-500 hover:text-rose-600 font-bold" onclick="return confirm('নিশ্চিত?')">ডিলিট</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<div id="courseModal" class="hidden fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
    <form action="process-course.php" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl w-full max-w-md shadow-2xl">
        <h3 id="modalTitle" class="text-lg font-black mb-4">নতুন কোর্স যোগ করুন</h3>
        <input type="hidden" name="course_id" id="course_id">
        <input type="hidden" name="old_thumbnail" id="old_thumbnail">
        <input type="hidden" name="old-module" id="old_module">
        
        <!-- <label class="text-sm font-normal text-gray-700"> কোর্সের নাম <span class="text-red-500">*</span></label> -->
        <input type="text" name="title" id="title" placeholder="কোর্সের নাম" class="w-full mb-3 p-3 border border-slate-200 rounded-lg text-sm" required>
        
        <!-- <label class="text-sm font-normal text-gray-700"> দাম (টাকা) <span class="text-red-500">*</span></label> -->
        <input type="number" name="price" id="price" placeholder="দাম (টাকা)" class="w-full mb-3 p-3 border border-slate-200 rounded-lg text-sm" required>

        <!-- <label class="text-sm font-normal text-gray-700"> কোর্স কোড <span class="text-red-500">*</span></label> -->
        <input type="text" name="code" id="code" placeholder="কোর্স কোড" class="w-full mb-3 p-3 border border-slate-200 rounded-lg text-sm" required>

        <label class="text-sm font-normal text-gray-700"> কোর্সের থাম্বনেইল <span class="text-red-500">*</span></label>
        <input type="file" name="thumbnail" class="w-full mb-3 p-2 border border-slate-200 rounded-lg text-sm">

        <label class="text-sm font-normal text-gray-700"> কোর্সের মডিউল <span class="text-red-500">*</span></label>
        <input type="file" name="module" class="w-full mb-3 p-2 border border-slate-200 rounded-lg text-sm">
        
        <button type="submit" class="w-full bg-slate-900 text-white p-3 rounded-lg font-bold text-sm cursor-pointer hover:bg-slate-800">সেভ করুন</button>
    </form>
</div>

<script>
    const modal = document.getElementById('courseModal');
    function openAddModal() {
        document.getElementById('course_id').value = '';
        document.getElementById('modalTitle').innerText = 'নতুন কোর্স যোগ করুন';
        modal.classList.remove('hidden');
    }
    function editCourse(c) {
        document.getElementById('course_id').value = c.id;
        document.getElementById('title').value = c.title;
        document.getElementById('price').value = c.price;
        document.getElementById('code').value = c.course_code;
        document.getElementById('old_thumbnail').value = c.thumbnail;
        document.getElementById('old_module').value = c.module;
        document.getElementById('modalTitle').innerText = 'কোর্স আপডেট করুন';
        modal.classList.remove('hidden');
    }
    window.onclick = (e) => { if (e.target == modal) modal.classList.add('hidden'); }
</script>

<?php if(isset($_SESSION['success_msg'])): ?>
<script>
    Swal.fire({ icon: 'success', title: 'সফল!', text: '<?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']); ?>', confirmButtonColor: '#0f172a' });
</script>
<?php endif; ?>
</body>
</html>