<?php

namespace Odenktools\Stoplite\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * $this-> adalah class yang menggunakan Trait
 */
trait RoleTrait
{
	public function getRoleName()
	{
		return $this->role_name;
	}
	
	public function createRole($roleName)
	{
		throw new \InvalidArgumentException('create role not implementing.');
	}
}