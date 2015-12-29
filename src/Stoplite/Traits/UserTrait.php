<?php

namespace Odenktools\Stoplite\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * $this-> adalah class yang menggunakan Trait
 */
trait UserTrait
{
    /**
     * Get the name that should be shown on the entity's invoices.
     *
     * @return string
     */
    public function getEmailName()
    {
        return $this->email;
    }
	
	/**
	 * $user = new \App\Models\User;
	 * echo $user->fromTrait();
	 */
	public function fromTrait()
	{
		return 'fromTrait';
	}
	
    /**
     * @return boolean
     */
    public function isVerified()
    {
        return $this->verified;
    }
	
    /**
     * @param UserContract $user
     * @return boolean
     */
    public function isActivated()
    {
        return $this->is_active;
    }
}