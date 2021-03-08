<?php include_once "app/log-in-redirect.php"?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "app/components/meta.php"; ?>
</head>
<body>
    <div class="container mt-4 mb-4">
        <?php
            include_once "app/components/header.php";
            include_once "app/components/errors.php";
            include_once "app/components/sign-up-form.php";
        ?>
    </div>
    <script type="module" src="./javascripts/sign-up.js"></script>
    <?php include_once "app/components/footer.php" ?>
</body>
</html>