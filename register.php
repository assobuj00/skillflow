<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillFlow IT - Register</title>
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
            রেজিস্ট্রেশন করুন
        </h2>

        <?php 
        if (session_status() === PHP_SESSION_NONE) { session_start(); }
        
        // ওল্ড ইনপুট ডাটা রিসিভ করে ভ্যারিয়েবলে রাখা
        $old_name  = isset($_SESSION['old_input']['name']) ? $_SESSION['old_input']['name'] : '';
        $old_email = isset($_SESSION['old_input']['email']) ? $_SESSION['old_input']['email'] : '';
        $old_mobile = isset($_SESSION['old_input']['mobile']) ? $_SESSION['old_input']['mobile'] : '';
        
        // একবার ভ্যারিয়েবলে সেট হয়ে গেলে সেশন ডাটা মুছে ফেলা (যেন পেজ রিফ্রেশ দিলে আবার ফাঁকা হয়ে যায়)
        unset($_SESSION['old_input']);

        if (isset($_SESSION['error_msg'])): 
        ?>
            <div class="mb-6 p-4 bg-rose-50 text-rose-600 border border-rose-100 rounded-[4px] text-sm font-bold flex items-center gap-2">
                <i class="fa-solid fa-circle-exclamation"></i>
                <span><?php echo $_SESSION['error_msg']; unset($_SESSION['error_msg']); ?></span>
            </div>
        <?php endif; ?>

        <form action="auth/registration-process.php" method="POST" class="space-y-6">
            
            <div class="space-y-2">
                <label class="block text-sm md:text-[15px] font-bold text-gray-900">
                    আপনার নাম <span class="text-red-500">*</span>
                </label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($old_name); ?>" placeholder="আপনার সম্পূর্ণ নাম লিখুন" required
                       class="w-full h-[46px] px-4 bg-[#edf3ff] border border-gray-200 rounded-[4px] text-gray-900 text-sm md:text-[15px] tracking-wide focus:outline-none focus:border-blue-400 focus:bg-white transition-all">
            </div>

            <div class="space-y-2">
                <label class="block text-sm md:text-[15px] font-bold text-gray-900">
                    ইমেইল এড্রেস <span class="text-red-500">*</span> <span class="text-xs font-normal text-gray-400">(সঠিক ফরম্যাট মেইনটেইন করুন)</span>
                </label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($old_email); ?>" placeholder="ইমেইল এড্রেস লিখুন" required
                       class="w-full h-[46px] px-4 bg-[#edf3ff] border border-gray-200 rounded-[4px] text-gray-900 text-sm md:text-[15px] tracking-wide focus:outline-none focus:border-blue-400 focus:bg-white transition-all" style="font-family: 'Inter', sans-serif;">
            </div>

            <div class="space-y-2">
                <label class="block text-sm md:text-[15px] font-bold text-gray-900">
                    আপনার মোবাইল <span class="text-red-500">*</span> <span class="text-xs font-normal text-gray-400">(১১ ডিজিটের হবে)</span>
                </label>
                <input type="tel" name="mobile" value="<?php echo htmlspecialchars($old_mobile); ?>" placeholder="মোবাইল নম্বর লিখুন" required
                       class="w-full h-[46px] px-4 bg-[#edf3ff] border border-gray-200 rounded-[4px] text-gray-900 text-sm md:text-[15px] tracking-wide focus:outline-none focus:border-blue-400 focus:bg-white transition-all" style="font-family: 'Inter', sans-serif;">
            </div>

            <div class="space-y-2">
                <label class="block text-sm md:text-[15px] font-bold text-gray-900">
                    পাসওয়ার্ড তৈরি করুন <span class="text-red-500">*</span> <span class="text-xs font-normal text-gray-400">(ন্যূনতম ৪ ডিজিট)</span>
                </label>
                <input type="password" name="password" placeholder="••••••••" required
                       class="w-full h-[46px] px-4 bg-[#edf3ff] border border-gray-200 rounded-[4px] text-gray-900 text-sm md:text-[15px] tracking-wide focus:outline-none focus:border-blue-400 focus:bg-white transition-all" style="font-family: 'Inter', sans-serif;">
            </div>

            <div class="space-y-2">
                <label class="block text-sm md:text-[15px] font-bold text-gray-900">
                    পাসওয়ার্ড নিশ্চিত করুন <span class="text-red-500">*</span> <span class="text-xs font-normal text-gray-400">(পুনরায় টাইপ করুন)</span>
                </label>
                <input type="password" name="confirm_password" placeholder="••••••••" required
                       class="w-full h-[46px] px-4 bg-[#edf3ff] border border-gray-200 rounded-[4px] text-gray-900 text-sm md:text-[15px] tracking-wide focus:outline-none focus:border-blue-400 focus:bg-white transition-all" style="font-family: 'Inter', sans-serif;">
            </div>

            <div class="pt-2">
                <button type="submit" class="w-[150px] h-[38px] border border-[#e91e63] text-[#e91e63] font-bold rounded-full text-sm hover:bg-[#e91e63] hover:text-white transition-all duration-300 shadow-sm cursor-pointer">
                    রেজিস্ট্রেশন করুন
                </button>
            </div>

            <div class="relative flex py-4 items-center">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="flex-shrink mx-4 text-gray-400 text-xs font-bold tracking-wider">OR</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>

            <div class="flex items-center justify-between pt-2">
                <span class="text-[#0d47a1] font-bold text-sm md:text-[15px]">
                    অলরেডি অ্যাকাউন্ট আছে?
                </span>
                <a href="login.php" class="w-[110px] h-[36px] flex items-center justify-center border border-[#e91e63] text-[#e91e63] font-bold rounded-full text-sm hover:bg-[#e91e63] hover:text-white transition-all duration-300 shadow-sm">
                    লগইন করুন
                </a>
            </div>

        </form>
    </div>
</main>

<!-- footer include -->
<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_SESSION['success_msg'])): ?>
<script>
    Swal.fire({
        icon: 'success',
        title: 'সফল হয়েছে!',
        text: '<?php echo $_SESSION['success_msg']; ?>',
        confirmButtonColor: '#e91e63',
        timer: 4000,
        timerProgressBar: true
    });
</script>
<?php 
    unset($_SESSION['success_msg']); 
endif; 
?>

</body>
</html>