<!doctype html>
<html lang="en">
<head>
    <?php include_once "app/meta.php"; ?>
</head>
<body>
<div class="container mt-4 mb-4">
    <?php include_once "app/header.php"; ?>
    <div class="columns is-centered">
        <h1 class="title is-2">Hi <?php echo $_SESSION['firstname']; ?>, here are today's top polls</h1>
    </div>
</div>
<?php include_once "app/footer.php"; ?>
</body>
</html><?php