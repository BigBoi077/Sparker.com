<?php

function getPostContent($name): string
{
    return addslashes($_POST[$name]) ?? '';
}

function getUserContent($user) {
    $user->username = getPostContent('username');
    $user->password = password_hash(getPostContent('password') . PASSWORD_PEPPER, PASSWORD_DEFAULT);
    $user->firstname = getPostContent('firstname');
    $user->lastname = getPostContent('lastname');
    $user->email = getPostContent('email');
    $user->password = getPostContent('password');
    $user->ssn = getPostContent('ssn');
    $user->phoneNumber = getPostContent('phoneNumber');
    $user->address = getPostContent('address');
    $user->gender = getPostContent('gender');
    $user->printContent();
}
