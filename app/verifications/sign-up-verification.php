<?php

require_once "../functions.php";
require_once "../helpers/queries.php";
require_once "user-verification.php";
require_once "../helpers/getter.php";
require_once "../classes/User.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new User();
    getUserContent($user);
    if (isUserValid($user)) {
        registerUser($user);
        redirect("../votes.php");
    }
    redirect("../sign-up.php");
}
