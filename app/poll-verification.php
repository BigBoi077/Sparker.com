<?php

function fieldsAreValid(): bool
{
    foreach($_POST['options'] as $value) {
        if ($value == "") {
            return false;
        }
    }
    return true;
}