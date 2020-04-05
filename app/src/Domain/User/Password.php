<?php


namespace App\Domain\User;


class Password
{
    /**
     * @var string
     */
    private $password;
    private $key = '@b@c@t3';
    private $algo = 'ripemd160';

    public function __construct($password){
        $this->password = $password;
    }

    public function encrypt() : string {
        return hash_hmac($this->algo, $this->password, $this->key);
    }

}