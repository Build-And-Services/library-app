<?php
$title = 'Checkouts';
ob_start();
?>

<?php $data['checkouts'][0] ?>

<?php
$content = ob_get_clean();
include __DIR__ . '/../../layouts/authenticated.php';
?>