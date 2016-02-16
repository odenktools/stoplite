# Stoplite
==========
Laravel 5.1 Auth

#How To Install

To install titanwall, add the following lines in your composer.json file:

	"require-dev": {
		"odenktools/stoplite": "dev-master"
	}

Save, then run it from your console

	composer update --dev

#Setup

After updating composer, add the service provider to the `providers` array in `config/app.php`

	Odenktools\Stoplite\StopliteServiceProvider::class,

Also add the aliases to the `aliases` array in `config/app.php`

	'Stoplite'      => Odenktools\Stoplite\Facades\Stoplite::class,

#Publish

You can also publish the views, assets, public folder

	php artisan vendor:publish --provider="Odenktools\Stoplite\StopliteServiceProvider"

Or using tag

	php artisan vendor:publish --provider="Odenktools\Stoplite\StopliteServiceProvider" --tag="config"

#Migration

	php artisan vendor:publish --provider="Odenktools\Stoplite\StopliteServiceProvider" --tag="migrations"
	php artisan migrate

#Seeding

	php artisan vendor:publish --provider="Odenktools\Stoplite\StopliteServiceProvider" --tag="seeds"
	composer dumpautoload
	php artisan db:seed --class=StopliteSeeder

#Note

This is Alpha release, please do not install/usage this package for your development

#Documentation

Onprogress

#Project References

-[Verify](https://github.com/Toddish/Verify)

-[Entrust](https://github.com/Zizaco/entrust)