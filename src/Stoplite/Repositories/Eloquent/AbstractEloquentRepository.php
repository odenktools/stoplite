<?php

namespace Odenktools\Stoplite\Repositories\Eloquent;
 
use Illuminate\Contracts\Foundation\Application;
 
use Odenktools\Stoplite\Repositories\Eloquent\BaseRepoInterface;
 
use Illuminate\Database\Eloquent\Model;

/**
 * Class AbstractEloquentRepository
 *
 * @package Odenktools\Stoplite\Repositories\Eloquent
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
}
