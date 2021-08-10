<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    private $user;

    protected function setUp()
    {
        $mailer = $this->createMock(Mailer::class);
        $mailer
            ->expects($this->any())
            ->method('sendMessage')
            ->with($this->equalTo('info@test.info'), $this->equalTo('Test Text!'))
            ->willReturn(true);

        $this->user = new User($mailer);
    }

    public function testReturnsFullName()
    {
        $this->user->setFirstName('Ihor');
        $this->user->setLastName('Po');

        $this->assertEquals('Ihor Po', $this->user->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $this->assertEquals('', $this->user->getFullName());
    }

    /**
     * @test
     */
    public function userHasFirstName()
    {
        $this->user->setFirstName('Ihor');

        $this->assertEquals('Ihor', $this->user->getFirstName());
    }

    public function testNotificationIsSent()
    {
        $this->user->setEmail('info@test.info');

        $this->assertTrue($this->user->notify('Test Text!'));
    }

    public function testCannotNotifyUserWithEmptyMessage()
    {
        $mailer = $this->getMockBuilder(Mailer::class)
                    ->setMethods(null)
                    ->getMock();
        
        $user = new User($mailer);
        $user->setEmail('info@test.info');

        $this->expectException(Exception::class);

        $user->notify('');
    }
}