<?php

namespace Odenktools\Stoplite\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Odenktools\Stoplite\Traits\UserFieldsTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @todo
 *
 * field_type_id : foreign odk_field_types
 * group_field_id : foreign odk_user_group_fields
 *
 * @license MIT
 */
class UserFields extends Model
{
	use SoftDeletes;

    use UserFieldsTrait;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

	protected $primaryKey 	= 'id_user_field';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'field_name',
		'field_comment',
		'possible_values',
		'is_active',
		'show_in_signup',
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
		$this->table = $prefix.$stable['user_fields'];
    }
}