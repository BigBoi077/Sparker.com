<!doctype html>
<html lang="en">
<head>
    <?php include_once "app/components/meta.php"; ?>
</head>
<body>
<div class="container mt-4 mb-4">
    <?php
    include_once "app/components/header.php";
    if (unauthorizedAccess()) {
        redirect("./index.php");
    }
    ?>
    <div class="columns d-flex justify-content-center" id="graph-container">
        <?php include_once "app/creators/graphs-creation.php"?>
    </div>
</div>
<?php include_once "app/components/footer.php"; ?>
</body>
</html>
