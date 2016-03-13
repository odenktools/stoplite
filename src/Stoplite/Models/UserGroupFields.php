<?php

namespace Odenktools\Stoplite\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Odenktools\Stoplite\Traits\UserGroupFieldsTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @todo
 * @license MIT
 */
class UserGroupFields extends Model
{
    use UserGroupFieldsTrait;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

	protected $primaryKey = 'id_group_field';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'group_name',
		'group_description',
		'group_order',
		'is_active',
		'admin_use_only'
	];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $prefix = \Config::get('stoplite.prefix');
        $stable = \Config::get('stoplite.tables');
		$this->table = $prefix.$stable['user_group_fields'];
    }

}