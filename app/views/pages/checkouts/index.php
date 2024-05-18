<?php
$title = 'Checkouts';
ob_start();
?>

<div class="container">
    <div class="bg-white px-5 py-4 rounded-md divide-y">
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
        <!-- header -->
        <div class="flex justify-between items-center py-4">
            <h1 class="text-xl font-medium">List checkouts</h1>
            <a href="/checkouts/create" class="px-4 py-2 bg-indigo-700 rounded inline-block text-white font-medium">Add
                new checkout</a>
        </div>

        <!-- table -->
        <div class="relative overflow-x-auto py-5" id="content-pagination">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded overflow-hidden"
                id="table-pagination">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No.
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Book Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Member
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Pustakawan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Taken Date
                        </th>
                        <th>
                            Return Date
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($checkouts as $key => $checkout) {
                        ?>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?= $key + 1; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $checkout->book_title; ?>
                            </td>
                            <td class="px-6 py-4">
                                <p class="w-52 line-clamp-3">
                                    <?= $checkout->member; ?>
                                </p>
                            </td>
                            <td class="px-6 py-4">
                                <?= $checkout->pustakawan; ?>

                            </td>
                            <td class="px-6 py-4">
                                <?= $checkout->taken_date; ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php 
                                    if ($checkout->return_date) {
                                        echo $checkout->return_date;
                                    }else{
                                ?>
                                    <form action="/checkouts/return/<?= $checkout->detail_id ?>" method="post">
                                        <button class="px-4 py-2 text-white bg-yellow-500 font-medium rounded">retrun</button>
                                    </form>
                                <?php
                                    }
                                ?>
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
include __DIR__ . '/../../layouts/authenticated.php';
?>