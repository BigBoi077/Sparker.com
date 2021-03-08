<?php

function getUserQuery($username): string
{
    return "SELECT * 
            FROM account 
            WHERE username = '$username'";
}

function getUserInsert(User $user):string
{
    return "INSERT INTO account (username, fisrtname, lastname, email, password, ssn, phoneNumber, address, gender, isAdmin)
            VALUES ('$user->username', '$user->firstname', '$user->lastname', '$user->email',
                    '$user->password', '$user->ssn', '$user->phoneNumber', '$user->address', '$user->gender', 0)";
}

function getPollInsertQuery($title, $description): string
{
    return "INSERT INTO poll (title, description) 
            VALUES ('$title', '$description');";
}

function getOptionInsertQuery($value, $pollId): string
{
    return "INSERT INTO option (description, id_poll) 
            VALUES ('$value', '$pollId')";
}

function getAllPollsQuery(): string
{
    return "SELECT id, title, description 
            FROM poll";
}

function getAccordingOptionsForPollQuery($pollId): string
{
    return "SELECT id, description, id_poll
            FROM pollOption 
            WHERE id_poll = '$pollId'";
}

function getUserVotedPollsQuery($userId, $pollId): string
{
    return "SELECT id_poll 
            FROM accountVote 
            WHERE  '$userId' = id_account 
            AND '$pollId' = id_poll";
}