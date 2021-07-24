<?php

/**
 * User class
 * 
 * A user of the system
 */
class User
{
    /**
     * First name
     *
     * @var [string]
     */
    public $firstName;

    /**
     * Last name
     *
     * @var [string]
     */
    public $lastName;

    /**
     * Get the user`s full name fro their first name and last name
     *
     * @return string The user`s full name
     */
    public function getFullName(): string
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }
}