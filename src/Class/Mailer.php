<?php

/**
 * Mailer
 * 
 * Send message
 */
class Mailer
{
    /**
     * Send message
     *
     * @param string $email The email address
     * @param string $message The message
     * 
     * @return void
     */
    public function sendMessage(string $email, string $message)
    {
        sleep(3);

        echo "send '$message' to '$email'";

        return true;
    }
}