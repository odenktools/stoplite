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
			$user->attachRole('relax');
		*/
		
        if (!$this->hasValidCredentials($user, $credentials))
		{

            return false;
			
        } else {

			/* $user is userModels */
            if (!$user->isVerified())
			{
                return false;
            }
			
            if (!$user->isActivated())
			{
                return false;
            }
			
            if ($user->hasRole())
			{
				$isPurchase = $user->isPurchaseable();

				if ($isPurchase)
				{
                    if ($user->expire_date === NULL)
					{
                        $calc = $user->calculateDays($user->getAuthIdentifier());
                        $user->expire_date = $calc;
                        $user->save();
                    }

                    if ($user->isExpired($user->getAuthIdentifier()))
					{
						return false;
						
                    } else {

                        return true;
                    }

				}
				
			} else {

				throw new \RuntimeException('User not has any roles, please setup user roles.');
			}
			
			return true;
        }

        if ($login) {
            $this->login($user, $remember);
        }
		
        return false;
    }
	
}