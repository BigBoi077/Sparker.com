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
    return validateCookie($_COOKIE['REMEMBER_ME']);
}