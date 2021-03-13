<!doctype html>
<html lang="en">
<head>
    <?php include_once "app/components/meta.php"; ?>
</head>
<body>
<div class="container mt-4 mb-4">
    <?php include_once "app/components/header.php"; ?>

    <div class="columns d-flex justify-content-center   " id="graph-container">
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="module" src="javascripts/graphs.js"></script>
<?php include_once "app/components/footer.php"; ?>
</body>
</html>
