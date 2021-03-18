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

function getAllUserRowsById($id): ?array
{
    $db = buildDatabase();
    $result = $db->query(getUserByIdQuery($id));
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
    $db->insert(getUserPollInsertQuery($userId, $pollId));
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

function insertLog(string $content)
{
    $db = buildDatabase();
    $db->insert(getInsertLogQuery($content));
    $db->close();
}

function validateCookie($cookie): bool
{
    $db = buildDatabase();
    $result = $db->query(getCookieQuery($cookie));
    $rows = $db->fetch($result);
    $db->close();
    if (is_null($rows)) {
        return false;
    }
    $_SESSION['user_id'] = $rows['id_user'];
    echo $rows['id_user'];
    return true;
}

function createToken($idUser, $token)
{
    $db = buildDatabase();
    $db->insert(getTokenInsertQuery($idUser, $token));
    $db->close();
}

function removeTokenFromDatabase()
{
    $db = buildDatabase();
    $db->delete(getTokenDeleteQuery($_SESSION['user_id']));
    $db->close();
}

function getAllPollIds(): array
{
    $db = buildDatabase();
    $result = $db->query(getAllPollIdsQuery());
    $rows = $db->fetchAll($result);
    $db->close();
    if (is_null($rows)) {
        return [];
    }
    return $rows;
}

function getAccordingTitleForPoll($database, $pollId)
{
    $result = $database->query(getTitleForPollQuery($pollId));
    $rows = $database->fetch($result);
    if (is_null($rows)) {
        return 0;
    }
    return $rows['title'];
}