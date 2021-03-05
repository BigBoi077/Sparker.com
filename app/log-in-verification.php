<?php

require_once "functions.php";
require_once "queries.php";

redirect("../sign-up.php");

if (!isset($_SESSION['is_logged'])) {
    $username = addslashes($_POST['username']) ?? '';
    $password = addslashes($_POST['password']) ?? '';


    if (userExists($username)) {
        $_SESSION['error'] = "Wrong Credentials (username invalid)";
        sleep(1);
        redirect("../index.php");
    }

    $hashPassword = getUserInformation($username, "password");

    if (!password_verify($password . PASSWORD_PEPPER, $hashPassword)) {
        $_SESSION['error'] = "Wrong Credentials (password invalid)";
        sleep(5);
        redirect("../index.php");
    } else {
        $_SESSION['is_logged'] = true;
        $_SESSION['user_id'] = getUserInformation($username, "id");
        $_SESSION['firstname'] = getUserInformation($username, "firstname");
        redirect("../votes.php");
    }
} else {
    redirect("../votes.php");
}