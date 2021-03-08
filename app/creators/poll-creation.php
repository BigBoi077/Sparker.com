<?php

require_once "../functions.php";
require_once "../helpers/sql.php";
require_once "../verifications/poll-verification.php";

if ($_REQUEST == $_POST) {
    $db = buildDatabase();
    if (fieldsAreValid()) {
        if (registerPoll($db) === TRUE) {
            $pollId = $db->getLastId();
            registerOptions($db, $pollId);
        }
        $db->close();
        redirect("../index.php");
    } else {
        $_SESSION['error'] = "All fields must be filled out";
        $db->close();
        redirect("../create-poll.php");
    }
}

function registerPoll($db): bool
{
    if ($db->insert(getPollInsertQuery($_POST['title'], $_POST['description']))) {
        return TRUE;
    }
    return FALSE;
}

function registerOptions($db, $pollId)
{
    foreach($_POST['options'] as $value) {
        $db->insert(getOptionInsertQuery($value, $pollId));
    }
}