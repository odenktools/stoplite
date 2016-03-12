<?php

namespace Odenktools\Stoplite\Contracts;

/**
 * Interface RoleRepository.
 */
interface RoleRepository
{
    /**
     * Create a new role with the given name.
     *
     */
    public function create($roleName);
}
