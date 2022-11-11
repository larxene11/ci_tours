<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/dist/output.css" rel="stylesheet">
    <script src="https://unpkg.com/flowbite@1.4.4/dist/flowbite.js"></script>
</head>

<body class="container mx-auto min-[1020px]:px-40">
    <!-- Header -->
    <header>
        <?= $this->include('template/header'); ?>
    </header>

    <!-- main content -->
    <?= $this->renderSection('content'); ?>

    <!-- footer -->
    <?= $this->include('template/footer'); ?>

</body>

</html>