<?php

function getUsernameRegex(): string
{
    return "/^[A-Za-z][A-Za-z0-9]{5,31}$/";
}

function getNamesRegex(): string
{
    return "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u";
}

function getPasswordRegex(): string
{
    return "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,40}$";
}

function getSsnRegex(): string
{
    return "^(?!666|000|9\\d{2})\\d{3}-(?!00)\\d{2}-(?!0{4})\\d{4}$";
}

function getPhoneNumberRegex(): string
{
    return "/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/";
}

function getAddressRegex(): string
{
    return "/[A-Za-z0-9\-\\,.]+/";
}