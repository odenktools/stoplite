<?php

return [

	'cms_route' 	=> true,
	
	'cms_auth'		=> true,
	
	'identified_by' 	=> ['username', 'email'],

	'default_role' 		=> 'trial',
	
	'super_admin'		=> 'admin',
	
	'hasher'			=> 'bcrypt',
	
	// DB prefix for tables
	'prefix' => 'odk_',
	
	// Table Usage (prefix will be automatic generated on the fly)
	'tables' => [

		'user' 					=> 'users',
		'user_fields' 			=> 'user_fields',
		'userrole'				=> 'user_roles',
		'role' 					=> 'role',
		'role_profile_fields' 	=> 'role_profilefields',
		'permissions' 			=> 'permissions',
		'permission_roles' 		=> 'permission_roles',
		'field_types'			=> 'field_types',
		'user_group_fields'		=> 'user_group_fields',
		'domains'				=> 'domains',
		'domain_profilefields'	=> 'domain_profilefields',
		'user_profile_fields'	=> 'user_profile_fields',
		
	]

];
