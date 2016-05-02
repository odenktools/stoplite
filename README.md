# Stoplite
==========
Laravel 5.1 Auth

#How To Install

To install stoplite, add the following lines in your composer.json file:

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

Create Some Dummy Data
	
	php artisan vendor:publish --provider="Odenktools\Stoplite\StopliteServiceProvider"
	composer dumpautoload
	php artisan migrate
	php artisan db:seed --class=StopliteSeeder

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

User Entity Relashionships

	- odk_users 				: main user table
	- odk_user_fields			: user custom field [foreign : field_type_id(odk_field_types), group_field_id(odk_user_group_fields)]
	- odk_user_profile_fields 	: values for table user_fields [foreign : userid(odk_users), userfield_id(odk_user_fields)]
	- odk_user_group_fields		: user custom field type for table user_fields

#Documentation

Onprogress

#Project References

[Verify](https://github.com/Toddish/Verify)

[Entrust](https://github.com/Zizaco/entrust)