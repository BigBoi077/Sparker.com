<?php

use JetBrains\PhpStorm\Pure;

require_once  "Database.php";
require_once "queries.php";
require_once "errors.php";

function isUserValid($user): bool
{
    return isUsernameValid($user)
        && areNamesValid($user)
        && isEmailValid($user)
        && isPasswordValid($user)
        && isSocialSecurityNumberValid($user);

    //TODO: finir les vérifications pour register le user
}

function isSocialSecurityNumberValid($user)
{
    if (!strlen($user->ssn) == 9) {
        addError("Social security number must be 9 characters long");
    }
}

function isPasswordValid($user): bool
{
    if ($user->password == "" || strlen($user->password) < 10) {
        addError("Password must be at least 10 characters long");
        return false;
    }
    return true;
}

function isUsernameValid($user)
{
    $db = buildDatabase();
    $result = $db->query(getWithUsername($user->username));
    $rows = $db->fetch($result);
    $db->close();
    if (!is_null($rows)) {
        addError("This username is already taken");
    }
}

function isEmailValid($user): bool
{
    if (!isEmailOk($user->email)) {
        addError("Email must contain '@' and '.' ");
        return false;
    }
    return true;
}

#[Pure] function isEmailOK($email): bool
{
    return str_contains($email, "@") && str_contains($email, ".");
}

function areNamesValid($user)
{
    if (!areNamesOk($user)) {
        addError("Name fields must not be empty");
        return false;
    }
    return true;
}

function areNamesOk($user): bool
{
    return $user->firstname == "" || $user->lastname == "";
}