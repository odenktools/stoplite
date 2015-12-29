<?php

namespace Odenktools\Stoplite;

use Illuminate\Support\ServiceProvider;
use Odenktools\Stoplite\Contracts\UserRepository;

class StopliteServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
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
            $hash 	= $app['hash'];

			$provider = new \Odenktools\Stoplite\StopliteUserProvider($hash, $userModel);
			
			return new \Odenktools\Stoplite\Guard($provider, $app['session.store']);
        });
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->singleton('Odenktools\Stoplite\Contracts\UserRepository', function ($app) {
            return $app['stoplite.user'];
        });		
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return ['stoplite', 'stoplite.user'];
	}

	/**
	 * package views files
	 * php artisan vendor:publish --provider="Odenktools\Stoplite\StopliteServiceProvider" --tag="views"
	 * @return void
	 */
	private function publishViewFolder()
	{
		$this->publishes([
		__DIR__ . '/../resources/views' => base_path('resources/views/vendor/odenktools'),
		], 'views');
	}
	
}
