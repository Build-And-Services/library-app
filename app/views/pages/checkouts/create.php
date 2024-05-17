<?php
$title = 'Create Checkout';
ob_start();
?>

<div class="container bg-white p-8">
    <h2 class="font-bold text-center text-xl">Add New Checkout</h2>
    <form action="/checkouts/store" method="POST">
        <div class="mb-6">
            <label for="user" class="block mb-2 text-sm text-gray-600">Member name</label>
            <select id="user" name="user"
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500" required>
                <option selected disabled>Choose member</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user->id ?>"><?= $user->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-6" id="book_container">
            <div class="book-container w-full flex gap-2 items-end mb-2">
                <div class="w-full item-container">
                    <label for="book" class="block mb-2 text-sm text-gray-600">Book title</label>
                    <select id="book" name="book[]"
                        class="book-item w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500"
                        required>
                        <option>Choose book</option>
                        <?php foreach ($books as $book): ?>
                            <option value="<?= $book->id ?>"><?= $book->title ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="button" class="w-6 h-6 mb-0.5 add-item">
                    <svg viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink"
                        xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <title>plus-circle</title>
                            <desc>Created with Sketch Beta.</desc>
                            <defs> </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"
                                sketch:type="MSPage">
                                <g id="Icon-Set" sketch:type="MSLayerGroup"
                                    transform="translate(-464.000000, -1087.000000)" fill="#000000">
                                    <path
                                        d="M480,1117 C472.268,1117 466,1110.73 466,1103 C466,1095.27 472.268,1089 480,1089 C487.732,1089 494,1095.27 494,1103 C494,1110.73 487.732,1117 480,1117 L480,1117 Z M480,1087 C471.163,1087 464,1094.16 464,1103 C464,1111.84 471.163,1119 480,1119 C488.837,1119 496,1111.84 496,1103 C496,1094.16 488.837,1087 480,1087 L480,1087 Z M486,1102 L481,1102 L481,1097 C481,1096.45 480.553,1096 480,1096 C479.447,1096 479,1096.45 479,1097 L479,1102 L474,1102 C473.447,1102 473,1102.45 473,1103 C473,1103.55 473.447,1104 474,1104 L479,1104 L479,1109 C479,1109.55 479.447,1110 480,1110 C480.553,1110 481,1109.55 481,1109 L481,1104 L486,1104 C486.553,1104 487,1103.55 487,1103 C487,1102.45 486.553,1102 486,1102 L486,1102 Z"
                                        id="plus-circle" sketch:type="MSShapeGroup"> </path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </button>
            </div>
        </div>
        <button type="submit"
            class="w-32 bg-cyan-500 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mt-4 mb-6">Submit</button>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#user').select2();
        $('#book').select2();
    });
</script>

<script>
    $(document).ready(function () {
        const $bookContainer = $('.book-container');
        const $itemContainer = $('.item-container');
        const $addItemBtn = $('.add-item');

        function addGejala() {
            const $newItem = $itemContainer.clone();
            $newItem.find('select').val('');

            $bookContainer.append($newItem);
        }

        $addItemBtn.on('click', addGejala)
    });
</script>



<?php
$content = ob_get_clean();
include __DIR__ . '/../../layouts/authenticated.php';
?>