<?php

namespace Nizzac\Projects\Classes\Contracts;

interface HasApiTokens
{
    public function token();

    public function tokenCan(string $ability);

    public function createToken(string $name, array $abilities);

    public function currentAccessToken();

    public function withAccessToken();
}