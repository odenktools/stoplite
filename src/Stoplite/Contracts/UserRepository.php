<?php

namespace Odenktools\Stoplite\Contracts;

interface UserRepository
{
	/**
	 * Finds a user by the given user ID.
	 *
	 * @param  mixed  $id
	 */
	public function findById($id);

    /**
     * Get the unique identifier for the user.
     *
     * @return string
     */
    public function getId();

    /**
     * @todo
     *
     * @return string
     */
    public function getUsername();

    /**
     * Get the unique identifier for the user.
     *
     * @return string
     */
    public function getEmail();

    /**
     * @todo
     *
     * @return string
     */
    public function getIsBuiltin();

    /**
     * @todo
	 *
     * @return boolean
     */
    public function getIsActive();

    /**
     * @todo
     *
     * @return boolean
     */
    public function getIsVerified();

    /**
     * @todo
     *
     * @return string
     */
    public function getTimeZone();

	/**
	 * @todo
	 *
	 * @param  mixed
	 */
    public function addRole($roleName);

	/**
	 * @todo
	 *
	 * @param  mixed
	 */
    public function addPermission($permissionName, array $options = []);
}