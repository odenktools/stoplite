<?php

namespace Odenktools\Stoplite\Contracts;

use Odenktools\Stoplite\Repositories\Eloquent\BaseRepoInterface;

/**
 * Interface RoleRepository.
 */
interface RoleRepository extends BaseRepoInterface
{
    /**
     * Create a new role with the given name.
     *
     */
    public function createRole($roleName);
}
