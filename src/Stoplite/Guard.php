<?php

namespace Odenktools\Stoplite;

use Illuminate\Auth\Guard as AuthGuard;
use Illuminate\Contracts\Auth\Guard as GuardContract;
use Odenktools\Stoplite\Messages;

/**
 * @todo
 * @license MIT
 */
class Guard extends AuthGuard implements GuardContract
{
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

        $this->lastAttempted = $user = $this->provider->retrieveByCredentials($credentials);
		
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
			
			//Checking User has one or more role?? if not goto h*ll!
            if ($user->hasRole())
			{
				// Check Role Is Purchaseable
				$isPurchase = $user->isPurchaseable();

				//Yes, role is purchaseable
				if ($isPurchase)
				{
					//Trigger first time login, if not skip this
					//Note : "expire_date" is a user field
                    if ($user->expire_date === NULL)
					{
                        $calc = $user->calculateDays($user->getAuthIdentifier());
                        $user->expire_date = $calc;
                        $user->save();
                    }

                    if ($user->isExpired($user->getAuthIdentifier()))
					{
						return false;
                    }

					//return true;
				}
				
			} else {

				throw new \RuntimeException('User not has any roles, please setup user roles.');
			}
        }

        if ($login) {
            $this->login($user, $remember);
        }

        return Messages::SUCCESS;
    }
	
}