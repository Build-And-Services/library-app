<?php
$title = 'Pustakawan';
ob_start();
?>

<p>Hallo</p>

<?php
$content = ob_get_clean();
include __DIR__ . '/../../layouts/authenticated.php';

?>