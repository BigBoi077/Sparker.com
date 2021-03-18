<?php

require_once "../functions.php";
require_once "../helpers/queries.php";
require_once "../helpers/getter.php";
require_once "../classes/User.php";
require_once "../helpers/queries.php";
require_once "user-verification.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();
    getUserContent($user);
    if (isUserValid($user)) {
        registerUser($user);
        $user = getAllUserRows($user->username);
        logInAndRedirect($user, "/Sparker.com/votes.php");
    }
    sleep(2);
    redirect("/Sparker.com/sign-up.php");
}
