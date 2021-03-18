<?php

require_once "../functions.php";
require_once "../helpers/queries.php";
require_once "../helpers/cookies.php";
require_once "../helpers/string.php";

if (!isset($_SESSION['is_logged'])) {
    $username = sanitize($_POST['username']) ?? '';
    $password = sanitize($_POST['password']) ?? '';

    $hashPassword = getSingleUserInformation($username, "password");
    createLog($username);

    if (!isLogInInformationValid($username, $password, $hashPassword)) {
        $_SESSION['error'] = "Wrong Credentials";
        sleep(2);
        redirect("../../index.php");
    } else {
        $user = getAllUserRows($username);

        if (isset($_POST['rememberMe'])) {
            $token = generateRandomString(64);
            createCookie('REMEMBER_ME', $token);
            createToken($user['id'], $token);
        }

        logInAndRedirect($user, "/Sparker.com/votes.php");
    }
}