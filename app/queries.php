<?php

function getUser($username): string
{
    return "SELECT * 
            FROM account 
            WHERE username = '$username'";
}

function userExists(string $username): bool
{
    $db = buildDatabase();
    $result = $db->query(getUser($username));
    $rows = $db->fetch($result);
    $db->close();
    return !is_null($rows);
}

function getUserInformation($username, $columns): string
{
    $db = buildDatabase();
    $result = $db->query(getUser($username));
    $rows = $db->fetch($result);
    $db->close();
    return $rows[$columns];
}
