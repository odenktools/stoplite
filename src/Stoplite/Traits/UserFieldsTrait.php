<?php

namespace Odenktools\Stoplite\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * $this-> adalah Class yang menunjukan kelas dibawah yang menggunakan Trait ini
 */
trait UserFieldsTrait
{
	/**
	 * Get the fieldtypes that owns the userfields.
	 * <code>
	 * $userfields = \Odenktools\Stoplite\Models\UserFields::find(1);
	 * echo $userfields->fieldtypes->field_name;
	 * </code>
	 *
     */
    public function fieldtypes()
    {
		//						'\Odenktools\Stoplite\Models\FieldTypes', 'foreign_key', 'key_from_primary_model');
        return $this->belongsTo('\Odenktools\Stoplite\Models\FieldTypes', 'field_type_id', 'id_field_type');
    }
	
	/**
	 * Get the groupfields that owns the userfields.
	 *
	 * <code>
	 * $userfields = \Odenktools\Stoplite\Models\UserFields::find(1);
	 * echo $userfields->groupfields->group_name;
	 * </code>
	 *
     */
    public function groupfields()
    {
		//						'\Odenktools\Stoplite\Models\UserGroupFields', 'foreign_key', 'key_from_primary_model');
        return $this->belongsTo('\Odenktools\Stoplite\Models\UserGroupFields', 'group_field_id', 'id_group_field');
    }
}