<?php

function getWithUsername($username) {
    return "SELECT * 
            FROM account 
            WHERE username = '$username'";
}