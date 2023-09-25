<?php

namespace Unspun\Projects\Classes\Traits;

trait HasApiTokens
{
    public function token()
    {
        return $this->access_token;
    }

    public function tokenCan(string $ability)
    {

    }

    public function createToken(string $name, array $abilities)
    {

    }

    public function currentAccessToken()
    {

    }

    public function withAccessToken()
    {

    }
}