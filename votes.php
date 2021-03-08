<?php

require_once "app/functions.php";

if ($_SESSION['is_admin']) {
    redirect("admin-panel.php");
    exit();
}
if (!$_SESSION['is_logged']) {
    redirect('index.php');
    exit();
}
?>
<!doctype html>
<html lang="en">
<head>
    <?php include_once "app/components/meta.php"; ?>
</head>
<body>
<div class="container mt-4 mb-4">
    <?php include_once "app/components/header.php"; ?>
    <div class="columns is-centered">
        <div class="column is-four-fifths">
            <h1 class="title is-4">Hi <?php echo $_SESSION['firstname']; ?>, here are today's top polls</h1>
        </div>
        <div class="column">
            <a href="app/helpers/logout.php" class="is-pulled-right button form-button">Logout</a>
        </div>
    </div>
    <?php include_once "app/creators/generate-votes.php" ?>
</div>
<?php include_once "app/components/footer.php"; ?>
</body>
</html>
