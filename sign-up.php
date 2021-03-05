<?php include_once "app/log-in-redirect.php"?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "app/meta.php"; ?>
</head>
<body>
    <div class="container mt-4 mb-4">
        <?php
            include_once "app/header.php";
            include_once "app/errors.php";
            include_once "app/sign-up-form.php";
        ?>
    </div>
    <script type="module" src="./javascripts/app.js"></script>
    <?php include_once "app/footer.php" ?>
</body>
</html>