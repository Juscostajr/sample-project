<?php
declare(strict_types=1);

namespace Tests\Domain\User;

use App\Domain\User\Password;
use App\Domain\User\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function userProvider()
    {
        return [
            [1, 'bill.gates', 'Bill', 'Gates' , '123'],
            [2, 'steve.jobs', 'Steve', 'Jobs', '321'],
            [3, 'mark.zuckerberg', 'Mark', 'Zuckerberg', '456'],
            [4, 'evan.spiegel', 'Evan', 'Spiegel', '389'],
            [5, 'jack.dorsey', 'Jack', 'Dorsey', '233'],
        ];
    }

    /**
     * @dataProvider userProvider
     * @param $id
     * @param $username
     * @param $firstName
     * @param $lastName
     * @param $password
     */
    public function testGetters($id, $username, $firstName, $lastName, $password)
    {
        $password = new Password($password);
        $user = new User($id, $username, $firstName, $lastName, $password);

        $this->assertEquals($id, $user->getId());
        $this->assertEquals($username, $user->getUsername());
        $this->assertEquals($firstName, $user->getFirstName());
        $this->assertEquals($lastName, $user->getLastName());
        $this->assertEquals($password->encrypt(), $user->getPassword());
    }

}
