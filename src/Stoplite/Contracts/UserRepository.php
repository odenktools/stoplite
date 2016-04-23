<?php

namespace Odenktools\Stoplite\Contracts;

interface UserRepository
{
    public function addRole($roleName);
    
    public function addPermission($permissionName, array $options = []);
	
	/**
	 * Finds a user by the given user ID.
	 *
	 * @param  mixed  $id
	 */
	public function findById($id);
}