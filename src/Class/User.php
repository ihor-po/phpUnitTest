<?php

use PHPUnit\Framework\Assert;

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
     * @var string
     */
    private $firstName;

    /**
     * Last name
     *
     * @var string
     */
    private $lastName;

    /**
     * Email address
     *
     * @var string
     */
    private $email;

    /**
     * Mailer object
     *
     * @var Mailer $mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function setFirstName(string $firstName)
    {
        Assert::assertNotEmpty($firstName);

        $this->firstName = $firstName;
    }
    
    public function setLastName(string $lastName)
    {
        Assert::assertNotEmpty($lastName);

        $this->lastName = $lastName;
    }

    public function setEmail(string $email)
    {
        Assert::assertNotEmpty($email);

        $this->email = $email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Get the user`s full name fro their first name and last name
     *
     * @return string The user`s full name
     */
    public function getFullName(): string
    {
        return trim($this->firstName . ' ' . $this->lastName);
    }

    /**
     * Send the user a message
     * 
     * @param string $message The message
     * 
     * @return boolean True if sent^ false otherwise
     */
    public function notify(string $message)
    {
        return $this->mailer->sendMessage($this->email, $message);
    }
}