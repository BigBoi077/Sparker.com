<?php

function getUserQuery($username): string
{
    return "SELECT * 
            FROM account 
            WHERE username = '$username'";
}

function getPollInsertQuery($title, $description): string
{
    return "INSERT INTO poll (title, description) VALUES ('$title', '$description');";
}

function getOptionInsertQuery($value, $pollId): string
{
    return "INSERT INTO option (description, id_poll) VALUES ('$value', '$pollId')";
}