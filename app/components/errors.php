<?php

if (isset($_SESSION["error"])) {
    if (!empty($_SESSION["error"])) {
        ?>
        <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
        <?php
        unset($_SESSION['error']);
    }
} else {
    $_SESSION["error"] = "";
}

function addError($message) {
    echo $message;
    $_SESSION['error'] .= $message . "\n";
}