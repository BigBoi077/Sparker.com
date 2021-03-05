<?php

require_once "functions.php";
require_once "queries.php";

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
        sleep(2);
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