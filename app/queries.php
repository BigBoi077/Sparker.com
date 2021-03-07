<?php

function getUserQuery($username): string
{
    return "SELECT * 
            FROM account 
            WHERE username = '$username'";
}

function getAllUserRows($username): ?array
{
    $db = buildDatabase();
    $result = $db->query(getUserQuery($username));
    $rows = $db->fetch($result);
    $db->close();
    return $rows;
}

function isLogInInformationValid($username, $password, $hashPassword): bool
{
    return password_verify($password . PASSWORD_PEPPER, $hashPassword) ||
        userExists($username);
}

function userExists(string $username): bool
{
    $db = buildDatabase();
    $result = $db->query(getUserQuery($username));
    $rows = $db->fetch($result);
    $db->close();
    return !is_null($rows);
}

function getSingleUserInformation($username, $columns): string
{
    $db = buildDatabase();
    $result = $db->query(getUserQuery($username));
    $rows = $db->fetch($result);
    $db->close();
    if (is_null($rows)) {
        return "";
    }
    return $rows[$columns];
}
