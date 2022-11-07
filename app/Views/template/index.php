<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/dist/output.css" rel="stylesheet">
</head>

<body>
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