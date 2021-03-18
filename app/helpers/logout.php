<?php

require_once "../functions.php";
require_once "cookies.php";

session_destroy();
deleteCookie("REMEMBER_ME");
redirect("/Sparker.com/index.php");
