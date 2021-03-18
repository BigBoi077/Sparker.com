<?php

require_once "queries.php";

function insertNewLogInfo(string $username)
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $time = $_SERVER['REQUEST_TIME'];
    $method = $_SERVER['REQUEST_METHOD'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $port = $_SERVER['SERVER_PORT'];
    $protocol = $_SERVER['SERVER_PROTOCOL'];
    $content = "[ip : $ip / time : $time / username : $username / user-agent : $userAgent / method : $method / port : $port / protocol : $protocol]";
    insertLog($content);
}