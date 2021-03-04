<?php


class User
{
    public string $username = "";
    public string $firstname = "";
    public string $lastname = "";
    public string $email = "";
    public string $password = "";
    public string $ssn = "";
    public string $phoneNumber = "";
    public string $address = "";
    public string $gender = "";

    public function printContent() {
        foreach ($this as $key => $value) {
            print "$key => $value\n";
        }
    }
}