<?php
define('PASSWORD_PEPPER', 'm7yLxDiCgVlteqFdz7tHMpavoifD6Cnt5RJSeozCPWg=');

require_once "Database.php";

session_start();

function buildDatabase(): Database
{
    $db = new Database();
    $db->connect("localhost", "etudiant", "Etudiant1", "shop");
    return $db;
}

function redirect(string $file)
{
    http_response_code(302);
    header("Location: $file");
    exit;
}