<?php

require_once "./functions.php";
require_once "./helpers/queries.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    sanitize($_POST["option"]);
    $content = explode("-", $_POST["option"]);

    $optionValue = $content[0];
    $pollId = $content[1];
    $optionId = $content[2];
    $userId = $content[3];

    $pollOption = getNbrVotesForOption($pollId, $optionId, $optionValue);

    updateNbrVotesOption($optionId, $pollOption['nbrVotes'] + 1);
    insertUserPoll($userId, $pollId);
    $pollId--;
}
redirect("../votes.php#$pollId");