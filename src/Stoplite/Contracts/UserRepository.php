<?php

namespace Odenktools\Stoplite\Contracts;

interface UserRepository
{
    public function attachRole($roleName);
    
    public function attachPermission($permissionName, array $options = []);
	
	/**
	 * Finds a user by the given user ID.
	 *
	 * @param  mixed  $id
	 */
	public function findById($id);
}