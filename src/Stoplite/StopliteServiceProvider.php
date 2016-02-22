<?php

namespace Odenktools\Stoplite;

use Illuminate\Support\ServiceProvider;
use Odenktools\Stoplite\Contracts\UserRepository;

use Odenktools\Stoplite\Hashing\BcryptHasher;
use Odenktools\Stoplite\Hashing\Sha256Hasher;

class StopliteServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;
	
	/**
	 * Publishing Configuration file to main laravel app
	 *
	 * package config files
	 * php artisan vendor:publish --provider="Odenktools\Stoplite\StopliteServiceProvider" --tag="config"
	 * @return void
	 */
	private function publishConfig()
	{
        $this->publishes([
		__DIR__ . '/../config/stoplite.php' => config_path ('stoplite.php')
        ], 'config');
	}
	
	/**
	 * Publishing views files
	 * php artisan vendor:publish --provider="Odenktools\Stoplite\StopliteServiceProvider" --tag="views"
	 * @return void
	 */
	private function publishViewFolder()
	{
		$this->publishes([
		__DIR__ . '/../resources/views' => base_path('resources/views/vendor/odenktools'),
		], 'views');
	}
	
    /**
     * Publishing migration file to main laravel app
	 * 
	 * <code>
	 * php artisan vendor:publish --provider="Odenktools\Stoplite\StopliteServiceProvider" --tag="migrations"
	 * php artisan migrate
	 * </code>
     * 
     * @return void
     */
    private function publishMigrations()
    {
        $this->publishes([
		    __DIR__. '/../database/migrations' => base_path ('database/migrations'),
        ], 'migrations');
    }
	
    /**
     * Publishing seeds file to main laravel app
	 * 
	 * <code>
	 * php artisan vendor:publish --provider="Odenktools\Stoplite\StopliteServiceProvider" --tag="seeds"
	 * php artisan db:seed
	 * php artisan db:seed --class=StopliteSeeder
	 * </code>
	 *
     * @return void
     */
	 
	private function publishSeeder()
	{
        $this->publishes([
            __DIR__.'/../database/seeds/' => base_path ('database/seeds')
        ], 'seeds');		
	}

	/**
	 * Register the hasher used by Stoplite.
	 *
	 * @return void
	 */
	protected function registerHasher()
	{
		$this->app['stoplite.hasher'] = $this->app->share(function($app)
		{
			//$hasher = $app['config']->get('stoplite.hasher');
			
			$hasher = \Config::get('odenktools.stoplite.hasher');

			switch ($hasher)
			{
				case 'bcrypt':
					return new BcryptHasher;
					break;

				case 'sha256':
					return new Sha256Hasher;
					break;
					
				default :
					return new BcryptHasher;
					break;
			}

			throw new \InvalidArgumentException("Invalid hasher [$hasher] chosen for Stoplite.");
		});
	}
	
	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->publishConfig();
		
		$this->publishMigrations();
		
		$this->publishSeeder();
		
		$this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'stoplite');

		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'stoplite');
		
		$this->publishViewFolder();
		
		/**
		 * enable auth drivers on /config/auth.php
		 *
		 * 'driver' => 'stoplite',
		 */
		$this->app['auth']->extend('stoplite', function ($app)
        {
            $userModel 	= $app->config['auth.model'];
            //$hash 	= $app['hash'];
			$hash 		= $app['stoplite.hasher'];
			
			/*
			if (method_exists($userModel, 'setPasswordAttribute'))
			{
				echo 'setAttemptLimit';
			}else{
				echo 'not exist setAttemptLimit';
			}
			*/

			$this->app['stoplite.user'] = $this->app->share(function($apps)
			{
				$hash 		= $apps['stoplite.hasher'];
				$userModel 	= $apps->config['auth.model'];
				return new \Odenktools\Stoplite\StopliteUserProvider($hash, $userModel);
			});
		
			//$provider = new \Odenktools\Stoplite\StopliteUserProvider($hash, $userModel);
			//return new \Odenktools\Stoplite\Guard($provider, $app['session.store']);
			
			return new \Odenktools\Stoplite\Guard($this->app['stoplite.user'], $app['session.store']);
			$provider = new \Odenktools\Stoplite\StopliteUserProvider($hash, $userModel);

        });
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		
		$this->mergeConfigFrom(
			__DIR__.'/../config/stoplite.php', 'stoplite'
		);
		
		$this->registerHasher();
		$this->registerStoplite();
		
		/*
        $this->app->singleton('Odenktools\Stoplite\Contracts\UserRepository', function ($app) {
            return $app['stoplite.user'];
        });
		*/

	}
	
    /**
     * Register the application bindings.
     *
     * @return void
     */
    private function registerStoplite()
    {
		
        $this->app->singleton('stoplite', function ($app) {
            //return new \Odenktools\Stoplite\Stoplite($app);
			return new \Odenktools\Stoplite\Stoplite($app, $app['stoplite.user']);
        });

    }
	
	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['stoplite', 'stoplite.user', 'stoplite.hasher'];
	}
	
}
