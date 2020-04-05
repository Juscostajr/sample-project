<?php
declare(strict_types=1);

namespace App\Domain\User;

interface UserService
{
    function validate(User $user, Password $password) : bool;
}
