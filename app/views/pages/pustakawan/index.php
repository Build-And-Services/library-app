<?php
$title = 'Pustakawan';
ob_start();
?>

<div class="container">
    <div class="bg-white px-5 py-4 rounded-md divide-y">
        <!-- header -->
        <div class="flex justify-between items-center py-4">
            <h1 class="text-xl font-medium">List Pustakawan</h1>
            <a href="/register" class="px-4 py-2 bg-indigo-700 rounded inline-block text-white font-medium">Add new pustakawan</a>
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
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Telepon
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <!-- <?php
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
                                  <span class="px-4 text-xs py-2 bg-green-700 rounded-full text-white font-medium">
                                  <?= $book->status; ?>

                                  </span>
                              </td>
                          </tr>
                      <?php
                    }
                    ?> -->
                </tbody>
            </table>

            
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
include __DIR__ . '/../../layouts/authenticated.php';

?>