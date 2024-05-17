<?php
$title = 'Products';
ob_start();
?>

<div class="container">
    <div class="bg-white px-5 py-4 rounded-md divide-y">
        <!-- header -->
        <div class="flex justify-between items-center py-4">
            <h1 class="text-xl font-medium">Add book</h1>
        </div>
        <form class="w-full mx-auto py-5" method="post" action="/books/store" enctype="multipart/form-data">
            <div class="mb-5">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title Book</label>
                <input type="text" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Panji Petualang" required />
            </div>
            <div class="mb-5">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Decription Book</label>
                <input type="text" name="description" id="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Panji Petualang" required />
            </div>
            <div class="mb-5">
                <label for="author" class="block mb-2 text-sm font-medium text-gray-900">Author Book</label>
                <input type="text" name="author" id="author" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Panji Petualang" required />
            </div>
            <div class="mb-5">
                <label for="publisher" class="block mb-2 text-sm font-medium text-gray-900">Publisher Book</label>
                <input type="text" name="publisher" id="publisher" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Panji Petualang" required />
            </div>
            <div class="mb-5">
                <label for="published_at" class="block mb-2 text-sm font-medium text-gray-900">Date Publisher</label>
                <input type="datetime-local" name="published_at" id="published_at" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Panji Petualang" required />
            </div>
            <div class="mb-5">
                <label for="thumbnail" class="block mb-2 text-sm font-medium text-gray-900">Thumbnail Book</label>
                <input type="file" name="thumbnail" id="thumbnail" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Book</button>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
?>

<?php
include __DIR__ . '/../../layouts/authenticated.php';
?>