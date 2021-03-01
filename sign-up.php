<!doctype html>
<html lang="en">
<head>
    <?php
        include_once "app/shared/meta.php";
        print_r($_POST);
    ?>
</head>
<body>
    <div class="container mt-4 mb-4">
        <?php
            include_once "app/shared/header.php";
            include_once "app/shared/sign-up-form.php";
        ?>
    </div>
    <script type="module" src="./javascripts/app.js"></script>
    <?php include_once "app/shared/footer.php" ?>
</body>
</html>