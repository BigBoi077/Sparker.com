<?php

require_once "app/functions.php";

if (isset($_SESSION['is_logged'])) {
    redirect("/Sparker.com/votes.php");
}
