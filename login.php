<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ইউজার যদি অলরেডি লগইন করা থাকে, তবে রোল অনুযায়ী ড্যাশবোর্ডে রিডাইরেক্ট হবে
if (isset($_SESSION['user_id']) && isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] === 'ADMIN') {
        header("Location: dashboards/admin-dashboard.php");
        exit();
    } else if ($_SESSION['user_role'] === 'MENTOR') {
        header("Location: dashboards/mentor-dashboard.php");
        exit();
    } else {
        header("Location: dashboards/student-dashboard.php");
        exit();
    }
}
?>

<?php 
if (session_status() === PHP_SESSION_NONE) { 
    session_start(); 
} 
// ওল্ড মোবাইল নম্বর সেশনে থাকলে ভেরিয়েবলে নেওয়া, না থাকলে খালি রাখা
$old_mobile = $_SESSION['old_mobile'] ?? '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillFlow IT - Login</title>
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
<body class="bg-[#fcfcfc] text-gray-800 select-none">

<!-- header include -->
<?php include 'header.php'; ?>

<main class="min-h-[calc(100vh-114px)] pt-[114px] flex items-center justify-center px-4 py-16 bg-[#fcfcfc]">
    <div class="w-full max-w-[500px] bg-[#fcfcfc] p-2 md:p-6">
        
        <h2 class="text-center text-2xl md:text-3xl font-extrabold text-gray-950 mb-10 tracking-wide">
            লগইন করুন
        </h2>

        <?php if (isset($_SESSION['error_msg'])): ?>
            <div class="mb-6 p-4 bg-rose-50 text-rose-600 border border-rose-100 rounded-[4px] text-sm font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?php echo $_SESSION['error_msg']; unset($_SESSION['error_msg']); ?></span>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success_msg'])): ?>
            <div class="mb-6 p-4 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-[4px] text-sm font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                <span><?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']); ?></span>
            </div>
        <?php endif; ?>

        <form action="auth/login-process.php" method="POST" class="space-y-6">
            
            <div class="space-y-2">
                <label class="block text-sm md:text-[15px] font-bold text-gray-900">
                    আপনার মোবাইল <span class="text-red-500">*</span>
                </label>
                <input type="tel" name="mobile" placeholder="মোবাইল নম্বর দিন" required
                       value="<?php echo htmlspecialchars($old_mobile); ?>"
                       class="w-full h-[46px] px-4 bg-[#edf3ff] border border-gray-200 rounded-[4px] text-gray-900 text-sm md:text-[15px] tracking-wide focus:outline-none focus:border-blue-400 focus:bg-white transition-all" style="font-family: 'Inter', sans-serif;">
            </div>

            <div class="space-y-2">
                <label class="block text-sm md:text-[15px] font-bold text-gray-900">
                    পাসওয়ার্ড দিন <span class="text-red-500">*</span>
                </label>
                <input type="password" name="password" placeholder="••••••••" required
                       class="w-full h-[46px] px-4 bg-[#edf3ff] border border-gray-200 rounded-[4px] text-gray-900 text-sm md:text-[15px] tracking-wide focus:outline-none focus:border-blue-400 focus:bg-white transition-all" style="font-family: 'Inter', sans-serif;">
            </div>

            <div class="flex items-center justify-between pt-2">
                <button type="submit" class="w-[110px] h-[36px] border border-[#1e90ff] text-[#1e90ff] font-bold rounded-full text-sm hover:bg-[#1e90ff] hover:text-white transition-all duration-300 shadow-sm cursor-pointer">
                    লগইন
                </button>
                <a href="#" class="text-[#0d47a1] font-bold text-sm md:text-[15px] hover:underline transition-all">
                    Forget your password?
                </a>
            </div>

            <div class="relative flex py-4 items-center">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="flex-shrink mx-4 text-gray-400 text-xs font-bold tracking-wider">OR</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>

            <div class="flex items-center justify-between pt-2">
                <span class="text-[#0d47a1] font-bold text-sm md:text-[15px]">
                    একটিও অ্যাকাউন্ট নেই?
                </span>
                <a href="register.php" class="w-[110px] h-[36px] flex items-center justify-center border border-[#1e90ff] text-[#1e90ff] font-bold rounded-full text-sm hover:bg-[#1e90ff] hover:text-white transition-all duration-300 shadow-sm">
                    রেজিস্টার
                </a>
            </div>

        </form>
    </div>
</main>

<!-- footer include -->
<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    <?php if (isset($_SESSION['reg_success_msg'])): ?>
        Swal.fire({
            icon: 'success',
            title: 'স্বাগতম!',
            html: '<?php echo $_SESSION["reg_success_msg"]; ?>',
            confirmButtonColor: '#1e90ff',
            confirmButtonText: 'OK',
            customClass: {
                title: 'font-bold',
                confirmButton: 'px-8'
            }
        });
        <?php unset($_SESSION['reg_success_msg']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success_msg'])): ?>
        Swal.fire({
            icon: 'success',
            title: 'স্বাগতম!',
            html: '<?php echo $_SESSION["success_msg"]; ?>',
            confirmButtonColor: '#1e90ff',
            confirmButtonText: 'OK'
        });
        <?php unset($_SESSION['success_msg']); ?>
    <?php endif; ?>
</script>

</body>
</html>
<?php 
// পেজ একবার লোড হয়ে ওল্ড ডাটা প্রিন্ট করার পর সেশন রিমুভ করে দেওয়া হলো
unset($_SESSION['old_mobile']); 
?>