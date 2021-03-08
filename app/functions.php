<?php

define('PASSWORD_PEPPER', 'm7yLxDiCgVlteqFdz7tHMpavoifD6Cnt5RJSeozCPWg=');

require_once "classes/Database.php";

session_start();

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

function sanitize(string $string): string
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
