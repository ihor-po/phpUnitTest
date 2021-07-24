<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testReturnsFullName()
    {
        $user = new User();

        $user->firstName = 'Ihor';
        $user->lastName = 'Po';

        $this->assertEquals('Ihor Po', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();

        $this->assertEquals('', $user->getFullName());
    }

    /**
     * @test
     */
    public function userHasFirstName()
    {
        $user = new User();

        $user->firstName = 'Ihor';

        $this->assertEquals('Ihor', $user->firstName);
    }
}