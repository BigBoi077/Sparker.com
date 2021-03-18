<?php

require_once "queries.php";

function createCookie($name, $value)
{
    setcookie($name, $value, time() + 3600 * 24 * 365, '/');
}

function deleteCookie($name)
{
    setcookie($name, '', time() - 1, '/');
}

function isValidRememberMeCookie(): bool
{
    $user = explode('|', $_COOKIE['REMEMBER_ME']);
    $username = $user[0];
    $saltPepperPassword = $user[1];
    if (empty($username) || empty($saltPepperPassword)) {
        return false;
    }
    return validateUser($username, $saltPepperPassword);
}