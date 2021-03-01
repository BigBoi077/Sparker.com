<?php

if (isset($_SESSION["error"])) {
    ?>
    <div class="alert alert-danger"><?= $_SESSION['error'] ?></div>
    <?php
    unset($_SESSION['error']);
}

function addError($message) {
    $_SESSION['error'] .= $message . "\n";
}