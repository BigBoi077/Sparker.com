<?php

function getUserQuery($username): string
{
    return "SELECT * 
            FROM account 
            WHERE username = '$username'";
}

function getUserByIdQuery($id): string
{
    return "SELECT * 
            FROM account 
            WHERE id = '$id'";
}

function getUserInsert(User $user):string
{
    return "INSERT INTO account (username, firstname, lastname, email, password, ssn, phoneNumber, address, gender, isAdmin)
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
    return "INSERT INTO pollOption (description, id_poll) 
            VALUES ('$value', '$pollId')";
}

function getAllPollsQuery(): string
{
    return "SELECT id, title, description 
            FROM poll";
}

function getAccordingOptionsForPollQuery($pollId): string
{
    return "SELECT id, description, id_poll, nbrVotes
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

function getNbrVotesOptionQuery($pollId, $optionId, $optionValue): string
{
    return "SELECT nbrVotes
            FROM pollOption
            WHERE description = '$optionValue' 
            AND id = '$optionId'
            AND id_poll = '$pollId'";
}

function getIncrementOptionVoteQuery($optionId, $nbrVotes): string
{
    return "UPDATE pollOption 
            SET nbrVotes = '$nbrVotes'
            WHERE id = '$optionId'";
}

function getUserPollInsertQuery($userId, $pollId): string
{
    return "INSERT INTO accountVote (id_account, id_poll)
            VALUES ('$userId', '$pollId')";
}

function getNbrPollsQuery(): string
{
    return "SELECT COUNT(id) as nbrPolls
            FROM poll";
}

function getInsertLogQuery(string $content): string
{
    return "INSERT INTO log (content)
            VALUE ('$content')";
}

function getTokenInsertQuery($idUser, $token): string
{
    return "INSERT INTO token (id_user, cookieValue)
            VALUES ('$idUser', '$token')";
}

function getCookieQuery($cookie): string
{
    return "SELECT *
            FROM token
            WHERE '$cookie' = cookieValue";
}

function getTokenDeleteQuery($userId): string
{
    return "DELETE FROM token 
            WHERE id_user = '$userId'";
}

function getAllPollIdsQuery(): string
{
    return "SELECT id FROM poll";
}

function getTitleForPollQuery($pollId)
{
    return "SELECT title
            FROM poll
            WHERE id = '$pollId'";
}