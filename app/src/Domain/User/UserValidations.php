<?php


namespace App\Domain\User;


class UserValidations implements UserService
{

    function validate(User $user, Password $password) : bool
    {
        return ($user->getPassword() == $password->encrypt());
    }
}