<?php

define('PASSWORD_PEPPER', getenv("PASSWORD_PEPPER"));

require_once "classes/Database.php";
require_once "helpers/log.php";
require_once "helpers/cookies.php";

session_start();
filterForm();

function buildDatabase(): Database
{
    $db = new Database();
    $db->connect("localhost", "etudiant", "Etudiant1", "sparker");
    return $db;
}

function redirect(string $file)
{
    http_response_code(302);
    header("Location: $file");
    exit;
}

function filterForm()
{
    filterFormContent($_POST);
    filterFormContent($_GET);
}

function sanitize($string)
{
    return strip_tags(addslashes($string));
}

function logInAndRedirect($user, $location)
{
    $_SESSION['is_logged'] = true;
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['lastname'] = $user['lastname'];
    $_SESSION['is_admin'] = $user['isAdmin'];
    redirect($location);
}

function refillField(string $fieldName)
{
    if (isset($_SESSION[$fieldName])) {
        echo $_SESSION[$fieldName];
    }
}

function unauthorizedAccess(): bool
{
    return !$_SESSION['is_admin'] || !$_SESSION['is_logged'];
}

function createLog(string $username)
{
    insertNewLogInfo($username);
}

function filterFormContent($array)
{
    foreach ($array as $value) {
        if (is_string($value)) {
            sanitize($value);
        } else {
            filterFormContent($value);
        }
    }
}

function verifyRememberMeCookie()
{
    if (isset($_COOKIE['REMEMBER_ME'])) {
        if (isValidRememberMeCookie()) {
            $user = getAllUserRowsById($_SESSION['user_id']);
            logInAndRedirect($user, "/Sparker.com/votes.php");
        }
    }
}