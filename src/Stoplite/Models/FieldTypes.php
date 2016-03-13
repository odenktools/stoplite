<?php

namespace Odenktools\Stoplite\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Odenktools\Stoplite\Traits\FieldTypesTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @todo
 * @license MIT
 */
class FieldTypes extends Model
{
	//use SoftDeletes;

    use FieldTypesTrait;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table;

	protected $primaryKey = 'id_field_type';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'field_name',
		'field_description',
		'field_size',
	];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        $prefix = \Config::get('stoplite.prefix');
        $stable = \Config::get('stoplite.tables');
		$this->table = $prefix.$stable['field_types'];
    }

}