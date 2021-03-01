<?php

function getWithUsername($username) {
    return "SELECT * 
            FROM authentication 
            WHERE username = '$username'";
}