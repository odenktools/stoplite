<?php

namespace Odenktools\Stoplite\Repositories\Eloquent;
 
use Illuminate\Contracts\Foundation\Application;
 
use Odenktools\Stoplite\Repositories\BaseRepoInterface;
 
/**
 * Class AbstractEloquentRepository
 *
 * @package Odenktools\Kampus\Repositories\Eloquent
 */
abstract class AbstractEloquentRepository implements BaseRepoInterface
{
    /**
     * @var Application
     */
    protected $app;
 
    /**
     * @var Model|\Illuminate\Database\Eloquent\Builder
     */
    protected $model;
 
    /**
     * @param Application $app
     * @param Model $model
     */
    public function __construct(Application $app, Model $model)
    {
        $this->app = $app;
        $this->model = $model;
    }
 
    /**
     * Returns all from the current model.
     *
     * @return static
     */
    public function selectAll()
    {
        return $this->model->selectAll();
    }
}
