<?php
$title = 'Welcome';
ob_start();
?>

<div class="min-h-screen flex items-center justify-center px-4">
    <div class="max-w-md w-full p-6 bg-white rounded-lg shadow-lg">
        <?php if (!empty($_SESSION['error'])): ?>
            <div role="alert">
                <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                    Error
                </div>
                <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                    <p><?php echo $_SESSION['error']; ?></p>
                </div>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <?php if (!empty($_SESSION['success'])): ?>
            <div role="alert">
                <div class="bg-green-500 text-white font-bold rounded-t px-4 py-2">
                    Success
                </div>
                <div class="border border-t-0 border-green-400 rounded-b bg-green-100 px-4 py-3 text-green-700">
                    <p><?php echo $_SESSION['success']; ?></p>
                </div>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>
        <h1 class="text-2xl font-semibold mt-8 mb-4 text-center">Welcome To !</h1>
        <div class=" flex justify-center">
            <img src="<?php echo BASE_URL; ?>/images/logo.png" class="w-[250px] mb-4"  alt="">
        </div>
        <form action="/login" method="POST">
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required autofocus>
            </div>
            <div class="mb-6">
                <label for="password" class="block mb-2 text-sm text-gray-600">Password</label>
                <input type="password" id="password" name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required>
            </div>
            <button type="submit"
                class="w-32 bg-cyan-500 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mt-4 mb-6">Login</button>
            <p class="text-xs text-gray-600 text-center mt-5">Don't have account, <a class="text-blue-500" href="/register">Register here !</a> </p>
        </form>
        <p class="text-xs text-gray-600 text-center mt-10">&copy; 2024 Library App - PWEB</p>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'layouts/guest.php';
?>