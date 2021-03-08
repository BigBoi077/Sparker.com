<?php

require_once "../classes/Database.php";
require_once "../helpers/queries.php";
require_once "../components/errors.php";
require_once "../helpers/regex.php";

function isUserValid($user): bool
{
    return areNamesValid($user)
        && isUsernameValid($user)
        && isEmailValid($user)
        && isPasswordValid($user)
        && isSocialSecurityNumberValid($user)
        && isPhoneNumberValid($user)
        && isAddressValid($user)
        && isGenderValid($user);
}

function isGenderValid($user): bool
{
    $gender = $user->gender;
    if (!strcmp ("Male", $gender) &&
        !strcmp ("Female", $gender) &&
        !strcmp ("Apache_Helicopter", $gender)) {
        addError("The chosen gender is invalid");
        return false;
    }
    return true;
}

function isAddressValid($user): bool
{
    if(doesntMatchRegex(getAddressRegex(), $user->address)) {
        addError("Address is invalid");
        return false;
    }
    return true;
}

function isPhoneNumberValid($user): bool
{
    if (doesntMatchRegex(getPhoneNumberRegex(), $user->phoneNumber)) {
        addError("Phone number is not valid. Try adding seperators ?");
        return false;
    }
    return true;
}

function isSocialSecurityNumberValid($user): bool
{
    return true; // TODO : remove this on launch
    if (doesntMatchRegex(getSsnRegex(), $user->ssn)) {
        addError("Social security number must be 9 characters long");
        return false;
    }
    return true;
}

function isPasswordValid($user): bool
{
    return true; // TODO : remove this on launch
    if (doesntMatchRegex(getPasswordRegex(), $user->password)) {
        addError("Password must contain a capital letter, a lower case letter, 
                  a number, a special character and be minimum 8 characters long");
        return false;
    }
    return true;
}

function isUsernameValid($user): bool
{
    $db = buildDatabase();
    $result = $db->query(getUserQuery($user->username));
    $rows = $db->fetch($result);
    $db->close();
    if (!is_null($rows)) {
        addError("This username is already taken");
        return false;
    }
    if (doesntMatchRegex(getUsernameRegex(), $user->username)) {
        addError("Username does not respect our patter");
        return false;
    }

    return true;
}

function isEmailValid($user): bool
{
    if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
        addError("Email format is invalid");
        return false;
    }
    return true;
}

function areNamesValid($user): bool
{
    if (areNamesOk($user)) {
        addError("Name fields are invalid");
        return false;
    }
    return true;
}

function areNamesOk($user): bool
{
    $regex = getNamesRegex();
    return doesntMatchRegex($regex, $user->firstname) && doesntMatchRegex($regex, $user->lastname);
}

function doesntMatchRegex($regex, $string): bool
{
    return !preg_match($regex, $string);
}