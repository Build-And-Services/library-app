<?php
$title = 'Edit Data Pengunjung';
ob_start();
?>
<div class="bg-white p-5 rounded-md divide-y">
    <div class="my-4 flex justify-between items-center">
        <h1 class="text-xl font-medium">Edit Data Pengunjung</h1>
        <a href="/pustakawans">
            <button class="w-32 bg-cyan-500 text-white py-2 rounded-lg block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Kembali</button>
        </a>
    </div>
    <form action="/pengunjung/update/<?php echo $pustakawan->id; ?>" method="POST" class="mx-auto py-5">
        <input type="hidden" name="_method" value="UPDATE">
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm text-gray-600">Username</label>
            <input type="text" id="name" name="name" value="<?= $pustakawan->name; ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
        </div>
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm text-gray-600">Email</label>
            <input type="text" id="name" name="email" value="<?= $pustakawan->email; ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
        </div>
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm text-gray-600">Telepon</label>
            <input type="text" id="name" name="telepon" value="<?= $pustakawan->telepon; ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
        </div>
        <button type="submit" class="w-32 bg-blue-500 text-white py-2 rounded-lg block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mt-4 mb-6">Update</button>
    </form>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../../layouts/authenticated.php';

?>