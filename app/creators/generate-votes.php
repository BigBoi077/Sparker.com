<?php

require_once "app/functions.php";
require_once "app/helpers/queries.php";

$db = buildDatabase();
$polls = getAllPolls($db);
// $votedPolls = getVotedPostByUser($db, $_SESSION['user_id'], $pollId);

echo $_SESSION['is_admin'];

$db->close();
?>
