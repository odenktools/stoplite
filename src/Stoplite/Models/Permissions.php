<?php

namespace Odenktools\Stoplite\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Odenktools\Stoplite\Traits\PermissionsTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @todo
 *
 * @license MIT
 */
class Permissions extends Model
{
	//use SoftDeletes;

    use PermissionsTrait;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

	/**
	 * Primary Key
	 *
	 * @var string
	 */
	protected $primaryKey = 'id_permission';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'perm_name',
		'code_perm',
		'perm_description',
		'is_active',
	];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $prefix = \Config::get('stoplite.prefix');
        $stable = \Config::get('stoplite.tables');
		$this->table = $prefix.$stable['permissions'];
    }

}