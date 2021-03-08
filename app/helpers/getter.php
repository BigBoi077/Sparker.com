<?php

require_once "../functions.php";

function getPostContent(string $name): string
{
    return sanitize($_POST[$name]) ?? '';
}

function getUserContent(User $user) {
    putInformationInUser($user);
    putInformationInSession($user);
}

function putInformationInSession(User $user)
{
    $_SESSION['username'] = getPostContent('username');
    $_SESSION['password'] = getPostContent('password');
    $_SESSION['firstname'] = getPostContent('firstname');
    $_SESSION['lastname'] = getPostContent('lastname');
    $_SESSION['email'] = getPostContent('email');
    $_SESSION['password'] = getPostContent('password');
    $_SESSION['ssn'] = getPostContent('ssn');
    $_SESSION['phone-number'] = getPostContent('phone-number');
    $_SESSION['address'] = getPostContent('address');
    $_SESSION['gender'] = getPostContent('gender');
}

function putInformationInUser(User $user)
{
    $user->username = getPostContent('username');
    $user->password = getPostContent('password');
    $user->firstname = getPostContent('firstname');
    $user->lastname = getPostContent('lastname');
    $user->email = getPostContent('email');
    $user->password = getPostContent('password');
    $user->ssn = getPostContent('ssn');
    $user->phoneNumber = getPostContent('phone-number');
    $user->address = getPostContent('address');
    $user->gender = getPostContent('gender');
}
