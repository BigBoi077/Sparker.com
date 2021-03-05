<!doctype html>
<html lang="en">
<head>
    <?php include_once "app/meta.php"; ?>
</head>
<body>
<div class="container mt-4 mb-4">
    <?php include_once "app/header.php"; ?>
    <div class="columns is-centered">
        <div class="column d-flex">
            <h1 class="title is-2 justify-content-start">Hi <?php echo $_SESSION['firstname']; ?>, here are today's top polls</h1>
        </div>
        <div class="column d-flex">
            <a href="app/logout.php" class="button justify-content-end form-button">Logout</a>
        </div>
    </div>
</div>
<?php include_once "app/footer.php"; ?>
</body>
</html><?php
