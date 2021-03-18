
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
    <div class="columns is-centered">
        <div class="column">
            <h1 class="title is-4">With great power comes great responsibility.</h1>
            <h1 class="title is-4">So what will you choose today ?</h1>
        </div>
    </div>
    <br>
    <div class="columns mb-6">
        <div class="column">
            <form action="create-poll.php" class="d-flex justify-content-center">
                <button class="button form-button">Make a poll</button>
            </form>
        </div>
        <div class="column">
            <form action="graphs.php" class="d-flex justify-content-center">
                <button class="button form-button">See graphs</button>
            </form>
        </div>
        <div class="column">
            <form action="app/switch-off-admin.php" class="d-flex justify-content-center">
                <button class="button form-button">Go vote</button>
            </form>
        </div>
    </div>
</div>
<?php include_once "app/components/footer.php"; ?>
</body>
</html>
