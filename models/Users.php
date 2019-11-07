<?php


class Users
{
    public $Nif;
    public $Name;
    public $LastName;
    public $Phone;
    public $Address;
    public $Postal ;
    public $Province;
    public $Location;
    public $Nick;
    public $Email;
    public $PassW;
    public $RpassW;

    function insertUser($newNif, $newEmail, $newRpassW, $newPassW, $newNick, $newName, $newLastName, $newPhone, $newAddress,$newPostal,$newProvince,$newLocation){

        $this->Nif = $newNif;
        $this->Name = $newName;
        $this->LastName= $newLastName;
        $this->Phone= $newPhone;
        $this->Address= $newAddress;
        $this->Postal= $newPostal ;
        $this->Province= $newProvince;
        $this->Location=$newLocation;
        $this->Nick=$newNick;
        $this->Email=$newEmail;
        $this->PassW= $newPassW;
        $this->RpassW=$newRpassW;

        $sql = "INSERT INTO users (nifUser, name, lastName, phone, address, postal, location, province, nick, email, password) VALUES ('$newNif', '$newName', '$newLastName', '$newPhone', '$newAddress', '$newPostal', '$newLocation', '$newProvince', '$newNick', '$newEmail', '$newPassW'";
        $tool = new Tools();
        $result = $tool->insertData($sql);
        return $result;
    }

    function login($user, $password){
        $sql = "SElECT * FROM users where nick='.$user.' and password='.$password.'";
        $tool = new Tools();
        $result = $tool->insertData($sql);
        return $result;
    }



}
