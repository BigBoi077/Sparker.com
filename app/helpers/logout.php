<?php

require_once "../functions.php";
require_once "cookies.php";
require_once "queries.php";

deleteCookie("REMEMBER_ME");
removeTokenFromDatabase();
session_destroy();
redirect("/Sparker.com/index.php");
