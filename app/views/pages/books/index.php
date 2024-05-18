<?php
$title = 'Products';
ob_start();
?>

<div class="container">
    <div class="bg-white px-5 py-4 rounded-md divide-y">
        <?php if (!empty($_SESSION['error'])) : ?>
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
        <?php if (!empty($_SESSION['success'])) : ?>
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
        <!-- header -->
        <div class="flex justify-between items-center py-4">
            <h1 class="text-xl font-medium">List book</h1>
            <input type="search" name="search" id="search" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-[60%] p-2.5" />
            <a href="/books/add" class="px-4 py-2 bg-indigo-700 rounded inline-block text-white font-medium">Add new book</a>
        </div>

        <!-- table -->
        <div class="relative overflow-x-auto py-5" id="content-pagination">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded overflow-hidden" id="table-pagination">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Thumbnail
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Author
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Publisher
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($books as $key => $book) {
                    ?>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?= $key + 1; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $book->title; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php
                                if (isset($book->thumbnail)) {
                                ?>

                                    <img src="<?= $book->thumbnail; ?>" alt="thumbnail">
                                <?php
                                }
                                ?>
                            </td>
                            <td class="px-6 py-4">
                                <p class="w-52 line-clamp-3">
                                    <?= $book->description; ?>
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <?= $book->author; ?>

                            </td>
                            <td class="px-6 py-4">
                                <?= $book->publisher; ?>

                            </td>
                            <td class="px-6 py-4">
                                <span class="px-4 text-center text-xs py-2 bg-<?= $book->status == 'AVAILABLE' ? 'green' : 'yellow' ?>-700 rounded-full text-white font-medium">
                                    <?= $book->status == 'AVAILABLE' ? 'AVAILABLE' : 'UNAVAILABLE'; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="/books/<?= $book->id; ?>" class="px-2 py-1 bg-yellow-600 rounded text-white font-medium">Edit</a>
                                <a href="/books-delete/<?= $book->id; ?>" class="px-2 py-1 bg-red-600 rounded text-white font-medium">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>


        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
?>

<?php
include __DIR__ . '/../../layouts/authenticated.php';
?>