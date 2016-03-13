<?php

namespace Odenktools\Stoplite\Models;

use Odenktools\Stoplite\Traits\UserRolesTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Value For UserFields
 *
 * @license MIT
 */
class UserRoles extends Model
{
    use UserRolesTrait;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

	protected $primaryKey 	= 'id_user_roles';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $prefix = \Config::get('stoplite.prefix');
        $stable = \Config::get('stoplite.tables');
		$this->table = $prefix.$stable['userrole'];
    }

}