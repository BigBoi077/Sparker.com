<?php

require_once "../functions.php";
require_once "../helpers/queries.php";

if (!isset($_SESSION['is_logged'])) {
    $username = addslashes($_POST['username']) ?? '';
    $password = addslashes($_POST['password']) ?? '';

    $hashPassword = getSingleUserInformation($username, "password");
    createLog($username);

    if (!isLogInInformationValid($username, $password, $hashPassword)) {
        $_SESSION['error'] = "Wrong Credentials";
        sleep(2);
        redirect("../../index.php");
    } else {
        $user = getAllUserRows($username);
        logInAndRedirect($user, "/Sparker.com/votes.php");
    }
}