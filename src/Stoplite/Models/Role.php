<?php

namespace Odenktools\Stoplite\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Odenktools\Stoplite\Traits\RoleTrait;
use Illuminate\Database\Eloquent\Model;
use Odenktools\Stoplite\Contracts\RoleRepository as OdkRoleRepository;

/**
 * @todo
 * @license MIT
 */
class Role extends Model
{
	//use SoftDeletes;

    use RoleTrait;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'odk_role';

	protected $primaryKey = 'id_role';

	/**
     * The attributes that aren't mass assignable.
	 * 
     * @var array
     */
    protected $guarded = ['amount', 'price'];
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'role_name',
		'role_description',
		'is_active',
		'is_purchaseable',
		'amount',
		'price',
		'time_left',
		'quantity',
		'period',
		'is_builtin',
		'backcolor',
		'forecolor'
	];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

	public function createRole($roleName)
	{
		throw new \InvalidArgumentException('create role not implementing.');
	}
	
}