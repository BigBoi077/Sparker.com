<?php


class User
{
    public $username;
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $ssn;
    public $phoneNumber;
    public $address;
    public $gender;

    public function printContent() {
        foreach ($this as $key => $value) {
            print "$key => $value\n";
        }
    }
}