<?php

namespace Odenktools\Stoplite;

use Illuminate\Auth\Guard as AuthGuard;
use Illuminate\Contracts\Auth\Guard as GuardContract;

/**
 * @todo
 * @license MIT
 */
class Guard extends AuthGuard implements GuardContract
{
	
	protected function userInstance()
	{
		return $this->provider;
	}
	
    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  array $credentials
     * @param  bool $remember
     * @param  bool $login
     * @return bool
     */
    public function attempt(array $credentials = [], $remember = false, $login = true)
    {
        $this->fireAttemptEvent($credentials, $remember, $login);

        $this->lastAttempted = $user = $this->userInstance()->retrieveByCredentials($credentials);
		
		/* --------------------------------------
		echo $user->getEmailName() . '<br/>';
		$user->attachRole('edan');
		*/
		
        if (!$this->hasValidCredentials($user, $credentials))
		{

            return false;
			
        } else {

			/* $user is userModels */
            if (!$user->isVerified($user))
			{
                return false;
            }
			
            if (!$user->isActivated($user))
			{
                return false;
            }
			
			return true;
        }

        if ($login) {
            $this->login($user, $remember);
        }
		
        return false;
    }
	
}