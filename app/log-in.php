<?php

require_once "functions.php";

if (!isset($_SESSION['is_logged'])) {
    $username = addslashes($_POST['username']) ?? '';
    $password = addslashes($_POST['password']) ?? '';
    $db = buildDatabase();

    // $saltPepperPassword = password_hash('PASSWORD HERE' . PASSWORD_PEPPER, PASSWORD_DEFAULT);

    $result = $db->query("SELECT * 
                        FROM authentication 
                        WHERE username = '$username'");
    $rows = $db->fetch($result);
    $db->close();

    if (is_null($rows)) {
        $_SESSION['error'] = "Wrong Credentials (username invalid)";
        sleep(1);
        redirect("../index.php");
    }

    $hashPassword = $rows['password'];

    if (!password_verify($password . PASSWORD_PEPPER, $hashPassword)) {
        $_SESSION['error'] = "Wrong Credentials (password invalid)";
        sleep(1);
        redirect("../index.php");
    } else {
        $_SESSION['is_logged'] = true;
        $_SESSION['user_id'] = $rows['authentication_id'];
        $_SESSION['firstname'] = $rows['firstname'];
    }
}