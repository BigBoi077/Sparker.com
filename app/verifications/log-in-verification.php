<?php

require_once "../functions.php";
require_once "../helpers/queries.php";
require_once "../helpers/cookies.php";

if (!isset($_SESSION['is_logged'])) {
    $username = sanitize($_POST['username']) ?? '';
    $password = sanitize($_POST['password']) ?? '';
    $rememberMe = sanitize($_POST['rememberMe']) ?? '';

    $hashPassword = getSingleUserInformation($username, "password");
    createLog($username);

    if ($rememberMe == "on") {
        createCookie('REMEMBER_ME', "$username|$hashPassword");
    }

    if (!isLogInInformationValid($username, $password, $hashPassword)) {
        $_SESSION['error'] = "Wrong Credentials";
        sleep(2);
        redirect("../../index.php");
    } else {
        $user = getAllUserRows($username);
        logInAndRedirect($user, "/Sparker.com/votes.php");
    }
}