<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? "$title - Library App" : 'Library App' ?></title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main>
        <?= $content ?>
    </main>
</body>

</html>