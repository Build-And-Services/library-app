<?php
$title = 'Data Pengunjung';
ob_start();
?>

<div class="container">
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
    <div class="bg-white px-5 py-4 rounded-md divide-y">
        <!-- header -->
        <div class="flex justify-between items-center py-4">
            <h1 class="text-xl font-medium">Data Pengunjung</h1>
            <a href="" class="px-4 py-2 bg-indigo-700 rounded inline-block text-white font-medium">Register Pengunjung</a>
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
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telepon
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        foreach($getDataPengunjung as $key => $item) {
                    ?>
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                <?= $key+1; ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $item->name; ?>
                            </td>
                            <td class="px-6 py-4">
                                <p class="w-52 line-clamp-3">
                                    <?= $item->email; ?>
                                </p>
                            </td>
                            <td class="px-6 py-4">
                            <?= $item->telepon; ?>

                            </td>
                            <td class="px-6 py-4">
                                <div class="flex">
                                    <a href="/pengunjung/edit/<?php echo $item->id; ?>">
                                        <button class="text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-yellow-600 dark:hover:bg-yellow-700 focus:outline-none dark:focus:ring-yellow-800">Edit</button>
                                    </a>
                                    <a href="/pengunjung/delete/<?php echo $item->id; ?>">
                                        <button class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">Delete</button>
                                    </a>
                                </div>
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