<?php

namespace Odenktools\Stoplite\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Odenktools\Stoplite\Traits\UserTrait;
use Odenktools\Stoplite\Contracts\UserRepository;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, UserRepository
{
    use Authenticatable, CanResetPassword, UserTrait;

	protected $primaryKey = 'id_user';
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'odk_users';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'user_mail',
        'email',
        'password',
        'is_active',
        'verified'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'salt', 'remember_token'];
	
	public function attachRole($roleName)
	{
		throw new \InvalidArgumentException('attachRole belum di implementasikan.');
	}
	
	public function attachPermission($permissionName, array $options = [])
	{
		throw new \InvalidArgumentException('attachPermission belum di implementasikan.');
	}
	
	/**
	 * Returns the user's password (hashed).
	 *
	 * @return string
	 */
	public function getPassword()
	{
		return $this->password;
	}

    /**
     * Set Hash Password after user create
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \Hash::make($password);
    }
}
