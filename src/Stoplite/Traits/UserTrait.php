<?php

namespace Odenktools\Stoplite\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * $this-> adalah Class yang menunjukan kelas dibawah yang menggunakan Trait ini
 */
trait UserTrait
{
    /**
     * @todo
     *
     * <code>
     * $roles = \Odenktools\Stoplite\Models\User::find(1)->roles;
     * echo json_encode($roles);
     * </code>
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('\Odenktools\Stoplite\Models\Role', 'odk_user_roles', 'user_id', 'roles_id')
            ->withTimestamps();
    }
	
	/**
	 * Checking User has one or more role??
	 */
    public function hasRole()
    {
        $data = $this->roles->first();

        if ($data === NULL) return false;

        return true;
    }
	
    /**
     * Check role is purchaseable?
     *
     * <code>
     * $purchased = \Ngakost\TitanWall\Models\User::purchaseable()->get();
     * echo $purchased
     * </code>
     * @param $id_user
     * @return bool
     */
    public function isPurchaseable()
    {
		$data = $this->roles->first();
		
        if ($data->is_purchaseable == 1) {
            return true;
        } else {
            return false;
        }
    }

    /**
	 * @todo Refactor using Carbon
	 *
     * Calculate Role Expired
	 *
     * @param $id_user
     * @return bool|string
     */
    public function calculateDays()
    {
        $now = date('Y-m-d H:i:s');

		$row = $this->roles->first();

        if ($row) {
            switch ($row->period) {
				//By Days
                case "D":
                    $diff = $row->time_left;
                    break;
                //By Weeks
				case "W":
                    $diff = $row->time_left * 7;
                    break;
				//By Month
                case "M":
                    $diff = $row->time_left * 30;
                    break;
				//By Years
                case "Y":
                    $diff = $row->time_left * 365;
                    break;
            }

            $expire = date("Y-m-d H:i:s", strtotime($now . +$diff . " day"));
			
        } else {

            $expire = "0000-00-00 00:00:00";
        }

        return $expire;
    }
	
    /**
     * [NEW FEATURE]
     *
     *
     *
     * @param $user_id
     * @return int
     */
    public function isExpired($user_id)
    {
		$data = \DB::table($this->getTable())
			->select('expire_date')->where($this->getKeyName(), $user_id)
			->whereRaw('TO_DAYS(`expire_date`) > TO_DAYS(NOW())')
			->first();

        if ($data) {
            return false;
        } else {
            return true;
        }

    }	
	
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