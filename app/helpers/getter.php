<?php

use JetBrains\PhpStorm\Pure;

require_once "../functions.php";

#[Pure] function getPostContent(string $name): string
{
    return sanitize($_POST[$name]) ?? '';
}

function getUserContent($user) {
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
