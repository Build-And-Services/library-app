<?php
$title = 'Register';
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
        <h1 class="text-2xl font-semibold mt-8 mb-4 text-center">Please Register !</h1>
        <div class=" flex justify-center">
            <img src="<?php echo BASE_URL; ?>/images/logo.png" class="w-[250px] mb-4"  alt="">
        </div>
        <form action="/register" method="POST">
            <div class="mb-6">
                <label for="name" class="block mb-2 text-sm text-gray-600">Username</label>
                <input type="text" id="name" name="name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required autofocus>
            </div>
            <div class="mb-6">
                <label for="role" class="block mb-2 text-sm text-gray-600">Role</label>
                <select id="role" name="role" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
                    <option>Select Role</option>
                    <option value="PENGUNJUNG">PENGUNJUNG</option>
                    <option value="PUSTAKAWAN">PUSTAKAWAN</option>
                </select>
            </div>
            <div class="mb-6">
                <label for="email" class="block mb-2 text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                    required autofocus>
            </div>
            <div class="mb-6">
                <label for="telepon" class="block mb-2 text-sm text-gray-600">Phone Number</label>
                <input type="text" id="telepon" name="telepon"
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
                class="w-32 bg-cyan-500 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mt-4 mb-6">Register</button>
            <p class="text-xs text-gray-600 text-center mt-5">Already have account, <a class="text-blue-500" href="/">Please login !</a> </p>
        </form>
        <p class="text-xs text-gray-600 text-center mt-10">&copy; 2024 Library App - PWEB</p>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'layouts/guest.php';
?>