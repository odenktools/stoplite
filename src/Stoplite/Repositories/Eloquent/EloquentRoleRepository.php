<?php

namespace Odenktools\Stoplite\Repositories\Eloquent;
 
use Illuminate\Contracts\Foundation\Application;
 
use Odenktools\Stoplite\Contracts\RoleRepository;
use Odenktools\Stoplite\Models\Role;
 
/**
 * Class EloquentRoleRepository
 *
 * Ini Class Encapsulasi agar model dapat dipanggil dari luar package
 * Note : Tambahkan fungsi disini...
 *
 * @package Odenktools\Kampus\Repositories\Eloquent
 */
class EloquentRoleRepository extends AbstractEloquentRepository implements RoleRepository
{
    /**
     * @param Application $app
     * @param Role $model
     */
    public function __construct(Application $app, Role $model)
    {
        parent::__construct($app, $model);
    }
 
    /**
     * Testing Code, Silahkan tambahkan code dibawah kedalam controller anda
     *
     * <code>
     * \Kampus::getMahasiswaModel()->create('testing@demo.com');
     * </code>
     *
     * @param $data
     */
    public function createRole($roleName)
    {
        return $this->model->createRole($roleName);
    }
 
}
