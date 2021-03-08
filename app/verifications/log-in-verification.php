<?php

require_once "../functions.php";
require_once "../helpers/queries.php";

if (!isset($_SESSION['is_logged'])) {
    $username = addslashes($_POST['username']) ?? '';
    $password = addslashes($_POST['password']) ?? '';

    $hashPassword = getSingleUserInformation($username, "password");

    if (!isLogInInformationValid($username, $password, $hashPassword)) {
        $_SESSION['error'] = "Wrong Credentials";
        sleep(2);
        redirect("../index.php");
    } else {
        $user = getAllUserRows($username);
        $_SESSION['is_logged'] = true;
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['is_admin'] = $user['isAdmin'];
        redirect("/Sparker.com/votes.php");
    }
}