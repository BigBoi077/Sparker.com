<?php

require_once "sql.php";

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

function getAllPolls(Database $db): array
{
    $result = $db->query(getAllPollsQuery());
    $rows = $db->fetchAll($result);
    if (is_null($rows)) {
        return [];
    }
    return $rows;
}


function getAccordingOptionsForPoll(Database $db, string $pollId): array
{
    $result = $db->query(getAccordingOptionsForPollQuery($pollId));
    $rows = $db->fetchAll($result);
    if (is_null($rows)) {
        return [];
    }
    return $rows;
}

function userVotedPoll(Database $db, string $userId, string $pollId): bool
{
    $result = $db->query(getUserVotedPollsQuery($userId, $pollId));
    $rows = $db->fetch($result);
    if (is_null($rows)) {
        return false;
    }
    return true;
}

function registerUser(User $user)
{
    // $saltPepperPassword = password_hash('PASSWORD HERE' . PASSWORD_PEPPER, PASSWORD_DEFAULT);
    $user->password = password_hash(getPostContent('password') . PASSWORD_PEPPER, PASSWORD_DEFAULT);
    $db = buildDatabase();
    $db->insert(getUserInsert($user));
    $db->close();
}

function getNbrVotesForOption($pollId, $optionId, $optionValue): array
{
    $db = buildDatabase();
    $result = $db->query(getNbrVotesOptionQuery($pollId, $optionId, $optionValue));
    $rows = $db->fetch($result);
    $db->close();
    if (is_null($rows)) {
        return [];
    }
    return $rows;
}

function updateNbrVotesOption($optionId, $nbrVotes)
{
    $db = buildDatabase();
    $db->update(getIncrementOptionVoteQuery($optionId, $nbrVotes));
    $db->close();
}

function insertUserPoll($userId, $pollId)
{
    $db = buildDatabase();
    $db->update(getUserPollInsertQuery($userId, $pollId));
    $db->close();
}

function getNbrPolls()
{
    $db = buildDatabase();
    $result = $db->query(getNbrPollsQuery());
    $rows = $db->fetch($result);
    $db->close();
    if (is_null($rows)) {
        return 0;
    }
    return $rows['nbrPolls'];
}
