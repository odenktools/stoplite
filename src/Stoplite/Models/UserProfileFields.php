<?php

namespace Odenktools\Stoplite\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Odenktools\Stoplite\Traits\UserProfileFieldsTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Value For UserFields
 *
 * @license MIT
 */
class UserProfileFields extends Model
{
	use SoftDeletes;
	
    use UserProfileFieldsTrait;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table 		= 'odk_user_profile_fields';

	protected $primaryKey 	= 'id_profile';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'field_value'
	];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

}