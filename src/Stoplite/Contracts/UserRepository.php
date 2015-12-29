<?php

namespace Odenktools\Stoplite\Contracts;

interface UserRepository
{
    public function attachRole($roleName);
    
    public function attachPermission($permissionName, array $options = []);
}