<?php

namespace Odenktools\Stoplite\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Odenktools\Stoplite\Traits\DomainTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @todo
 * @license MIT
 */
class Domains extends Model
{
	//use SoftDeletes;

    use DomainTrait;
	
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'odk_domains';

	protected $primaryKey = 'id_domain';
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'domain_name',
		'code_domain_name',
		'is_active',
	];

    /**
     * @param array $attributes
     */
    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }

}