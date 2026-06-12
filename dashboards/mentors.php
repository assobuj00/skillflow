<?php
session_start();
require_once '../config/database.php';

// পোস্ট রিকোয়েস্ট হ্যান্ডেল করা (Add/Update লজিক)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_action'])) {
    $id = $_POST['id'] ?? '';
    $name = $_POST['name'];
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $image = $_POST['old_image'] ?? '';

    if (!empty($_FILES['image']['name'])) {
        $image = time() . '_' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image);
    }

    if (!empty($id)) {
        $stmt = $pdo->prepare("UPDATE mentors SET name=?, title=?, description=?, image=? WHERE id=?");
        $stmt->execute([$name, $title, $desc, $image, $id]);
        $_SESSION['success_msg'] = "মেন্টর আপডেট হয়েছে!";
    } else {
        $stmt = $pdo->prepare("INSERT INTO mentors (name, title, description, image) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $title, $desc, $image]);
        $_SESSION['success_msg'] = "নতুন মেন্টর যোগ হয়েছে!";
    }
    header("Location: mentors.php");
    exit();
}

// ডিলিট লজিক
if (isset($_GET['delete'])) {
    $pdo->prepare("DELETE FROM mentors WHERE id = ?")->execute([$_GET['delete']]);
    $_SESSION['success_msg'] = "মেন্টর ডিলিট হয়েছে!";
    header("Location: mentors.php");
    exit();
}

$mentors = $pdo->query("SELECT * FROM mentors ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
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

    <main class="flex-1">
        <div class="flex justify-between mb-6">
            <h3 class="text-lg font-black"><i class="fa-solid fa-users text-cyan-600 mr-2"></i> মেন্টর ম্যানেজমেন্ট</h3>
            <button onclick="openAddModal()" class="bg-cyan-600 text-white font-bold px-5 py-2 rounded-lg text-sm">নতুন মেন্টর যুক্ত করুন</button>
        </div>
        
        <div class="bg-white p-6 rounded-2xl shadow-sm border">
            <table class="w-full text-left border-collapse text-[13px]"> <thead>
        <tr class="bg-slate-50 text-slate-700 font-bold border-b border-slate-200">
            <th class="p-3">ইমেজ</th> <th class="p-3">নাম</th>
            <th class="p-3">টাইটেল</th>
            <th class="p-3">বর্ণনা</th>
            <th class="p-3 text-center">অ্যাকশন</th>
        </tr>
    </thead>
    <tbody class="divide-y divide-slate-100 text-slate-600 font-medium">
        <?php foreach($mentors as $m): ?>
        <tr class="hover:bg-slate-50/50 transition">
            <td class="p-2"> <img src="../uploads/<?php echo $m['image']; ?>" class="w-10 h-10 rounded-full object-cover">
            </td>
            <td class="p-3 font-bold text-slate-900"><?php echo $m['name']; ?></td>
            <td class="p-3"><?php echo $m['title']; ?></td>
            <td class="p-3 truncate max-w-[180px]"><?php echo $m['description']; ?></td>
            <td class="p-3 text-center space-x-3">
                <button onclick='editMentor(<?php echo json_encode($m); ?>)' class="text-cyan-600 hover:text-cyan-700 font-bold">এডিট</button>
                <a href="?delete=<?php echo $m['id']; ?>" class="text-rose-500 hover:text-rose-600 font-bold" onclick="return confirm('নিশ্চিত?')">ডিলিট</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

        </div>
    </main>
</div>

<div id="mentorModal" class="hidden fixed inset-0 z-50 bg-black/50 flex items-center justify-center p-4">
    <form action="mentors.php" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl w-full max-w-md shadow-2xl">
        <input type="hidden" name="form_action" value="1">
        <h3 id="modalTitle" class="text-lg font-black mb-4">নতুন মেন্টর যোগ করুন</h3>
        <input type="hidden" name="id" id="mentor_id">
        <input type="hidden" name="old_image" id="old_image">
        
        <input type="text" name="name" id="name" placeholder="নাম" class="w-full mb-3 p-3 border rounded-lg" required>
        <input type="text" name="title" id="title" placeholder="টাইটেল" class="w-full mb-3 p-3 border rounded-lg" required>
        <textarea name="description" id="description" placeholder="বর্ণনা" class="w-full mb-3 p-3 border rounded-lg" required></textarea>

        <label class="text-sm font-normal text-gray-700"> প্রোফাইল <span class="text-red-500">*</span></label>
        <input type="file" name="image" class="w-full mb-4 p-2 border rounded-lg">
        <button type="submit" class="w-full bg-slate-900 text-white p-3 rounded-lg font-bold">সেভ করুন</button>
    </form>
</div>

<script>
    const modal = document.getElementById('mentorModal');
    
    function openAddModal() {
        // Form er sob field blank kore deya
        document.getElementById('mentor_id').value = '';
        document.getElementById('name').value = '';
        document.getElementById('title').value = '';
        document.getElementById('description').value = '';
        document.getElementById('old_image').value = '';
        
        document.getElementById('modalTitle').innerText = 'নতুন মেন্টর যোগ করুন';
        modal.classList.remove('hidden');
    }

    function editMentor(m) {
        document.getElementById('mentor_id').value = m.id;
        document.getElementById('name').value = m.name;
        document.getElementById('title').value = m.title;
        document.getElementById('description').value = m.description;
        document.getElementById('old_image').value = m.image;
        document.getElementById('modalTitle').innerText = 'মেন্টর আপডেট করুন';
        modal.classList.remove('hidden');
    }

    window.onclick = (e) => { 
        if (e.target == modal) modal.classList.add('hidden'); 
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(isset($_SESSION['success_msg'])): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'সফল!',
            text: '<?php echo $_SESSION['success_msg']; ?>',
            confirmButtonColor: '#0f172a'
        });
    </script>
    <?php unset($_SESSION['success_msg']); // একবার দেখানোর পর মেসেজটি মুছে ফেলা ?>
<?php endif; ?>

</body>
</html>