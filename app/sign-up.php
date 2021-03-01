<?php

require_once "functions.php";
require_once "queries.php";
require_once "user-verification.php";
require_once "User.php";

if (!isset($_SESSION['is_logged'])) {
    $user = new User();
    getUserContent($user);
    if (isUserValid($user)) {
        registerUser($user);
    }
}