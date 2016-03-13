<?php

use Illuminate\Database\Seeder;

class StopliteSeeder extends Seeder
{
	public function run()
	{
		$prefix = Config::get('stoplite.prefix', '');
		
		$tablename = Config::get('stoplite.tables', '');
		
		$domains_odenktools = DB::table($prefix . $tablename['domains'])->insertGetId([
			'domain_name'			=> 'http://odenktools.com',
			'code_domain_name' 		=> 'odenktools.com',
			'is_active' 			=> 1,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'updated_at' 			=> date('Y-m-d H:i:s'),
			'deleted_at' 			=> null
		]);

		$usergroup_personal = DB::table($prefix . $tablename['user_group_fields'])->insertGetId([
			'group_name'			=> 'Personal',
			'group_description' 	=> 'Personal group for user',
			'group_order' 			=> 1,
			'is_active' 			=> 1,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'updated_at' 			=> date('Y-m-d H:i:s')
		]);

		// -- START FIELD TYPES --//
		$type_string = DB::table($prefix . $tablename['field_types'])->insertGetId([
			'field_name'			=> 'String',
			'code_field_types'		=> 'string',
			'field_description' 	=> 'String Value(Max length is 32 chars)',
			'field_size' 			=> 32,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'updated_at' 			=> date('Y-m-d H:i:s')
		]);

		$type_text = DB::table($prefix . $tablename['field_types'])->insertGetId([
			'field_name'			=> 'Text',
			'code_field_types'		=> 'text',
			'field_description' 	=> 'Long String Value(Max length is 2048 chars)',
			'field_size' 			=> 2048,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'updated_at' 			=> date('Y-m-d H:i:s')
		]);

		DB::table($prefix . $tablename['field_types'])->insertGetId([
			'field_name'			=> 'Number',
			'code_field_types'		=> 'number',
			'field_description' 	=> 'Free style number',
			'field_size' 			=> 10,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'updated_at' 			=> date('Y-m-d H:i:s')
		]);

		DB::table($prefix . $tablename['field_types'])->insertGetId([
			'field_name'			=> 'SingleSelectList',
			'code_field_types'		=> 'singleselectlist',
			'field_description' 	=> 'Single select from list of values',
			'field_size' 			=> 0,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'updated_at' 			=> date('Y-m-d H:i:s')
		]);

		DB::table($prefix . $tablename['field_types'])->insertGetId([
			'field_name'			=> 'MultiSelectList',
			'code_field_types'		=> 'multiselectlist',
			'field_description' 	=> 'Multiple select from list of values',
			'field_size' 			=> 0,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'updated_at' 			=> date('Y-m-d H:i:s')
		]);

		DB::table($prefix . $tablename['field_types'])->insertGetId([
			'field_name'			=> 'Checkbox',
			'code_field_types'		=> 'checkbox',
			'field_description' 	=> 'Checkbox',
			'field_size' 			=> 0,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'updated_at' 			=> date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['field_types'])->insertGetId([
			'field_name'			=> 'RadioBoxGroup',
			'code_field_types'		=> 'radioboxgroup',
			'field_description' 	=> 'Radio box group',
			'field_size' 			=> 0,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'updated_at' 			=> date('Y-m-d H:i:s')
		]);
		
		$type_combobox = DB::table($prefix . $tablename['field_types'])->insertGetId([
			'field_name'			=> 'ComboBox',
			'code_field_types'		=> 'combobox',
			'field_description' 	=> 'ComboBox',
			'field_size' 			=> 0,
			'created_at' 			=> date('Y-m-d H:i:s'),
			'updated_at' 			=> date('Y-m-d H:i:s')
		]);
		// -- END FIELD TYPES --//
		
		
		// -- START ROLE --//
		$role_admin = DB::table($prefix . $tablename['role'])->insertGetId([
			'role_name' 		=> Config::get('stoplite.super_admin'),
			'code_role'			=> 'superadmin',
			'role_description' 	=> 'SuperAdmin Role, can manage everythings',
			'is_active' 		=> 1,
			'is_purchaseable' 	=> 0,
			'amount' 			=> 0,
			'price' 			=> 0,
			'time_left' 		=> 0,
			'quantity' 			=> 0,
			'period' 			=> 'D',
			'is_builtin' 		=> 1,
			'backcolor' 		=> 'c32113',
			'forecolor' 		=> 'white',
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s')
		]);
		
		$role_member = DB::table($prefix . $tablename['role'])->insertGetId([
			'role_name' 		=> 'member',
			'code_role'			=> 'member',
			'role_description' 	=> 'User is member',
			'is_active' 		=> 1,
			'is_purchaseable' 	=> 1,
			'amount' 			=> 10,
			'price' 			=> 10,
			'time_left' 		=> 1,
			'quantity' 			=> 10,
			'period' 			=> 'M',
			'is_builtin' 		=> 1,
			'backcolor' 		=> '00c12e',
			'forecolor' 		=> 'white',
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s')
		]);
		
		$role_freetrial = DB::table($prefix . $tablename['role'])->insertGetId([
			'role_name' 		=> 'free trial',
			'code_role'			=> 'free_trial',
			'role_description' 	=> 'Free Trial is for...',
			'is_active' 		=> 1,
			'is_purchaseable' 	=> 1,
			'amount' 			=> 10,
			'price' 			=> 10,
			'time_left' 		=> 7,
			'quantity' 			=> 10,
			'period' 			=> 'D',
			'is_builtin' 		=> 0,
			'backcolor' 		=> '00c12e',
			'forecolor' 		=> 'white',
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s')
		]);
		
		$role_bronze = DB::table($prefix . $tablename['role'])->insertGetId([
			'role_name' 		=> 'Bronze Package',
			'code_role'			=> 'bronze_package',
			'role_description' 	=> 'Bronze package is for...',
			'is_active' 		=> 1,
			'is_purchaseable' 	=> 1,
			'amount' 			=> 50,
			'price' 			=> 50,
			'time_left' 		=> 1,
			'quantity' 			=> 5,
			'period' 			=> 'M',
			'is_builtin' 		=> 0,
			'backcolor' 		=> 'cc6633.',
			'forecolor' 		=> 'white',
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s')
		]);
		
		$role_silver = DB::table($prefix . $tablename['role'])->insertGetId([
			'role_name' 		=> 'Silver Package',
			'code_role'			=> 'silver_package',
			'role_description' 	=> 'Silver package is for...',
			'is_active' 		=> 1,
			'is_purchaseable' 	=> 1,
			'amount' 			=> 100,
			'price' 			=> 100,
			'time_left' 		=> 3,
			'quantity' 			=> 5,
			'period' 			=> 'M',
			'is_builtin' 		=> 0,
			'backcolor' 		=> 'c0c0c0',
			'forecolor' 		=> 'white',
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s')
		]);
		
		$role_gold = DB::table($prefix . $tablename['role'])->insertGetId([
			'role_name' 		=> 'Gold Package',
			'code_role'			=> 'gold_package',
			'role_description' 	=> 'Gold package is for...',
			'is_active' 		=> 1,
			'is_purchaseable' 	=> 1,
			'amount' 			=> 100,
			'price' 			=> 100,
			'time_left' 		=> 3,
			'quantity' 			=> 5,
			'period' 			=> 'M',
			'is_builtin' 		=> 0,
			'backcolor' 		=> 'cfb53b',
			'forecolor' 		=> 'white',
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s')
		]);
		
		// -- END ROLE --//
		
		//-- START USER --//
		$user_admin = DB::table($prefix . $tablename['user'])->insertGetId([
            'username' 		=> 'admin',
            'user_mail' 	=> 'admin@example.com',
            'email' 		=> 'admin@example.com',
            'password' 		=> '$2y$10$B77TiIMLObUS6L2mExjhKuW4tU.G6WrkZd8d9ZdltknmnLVRIZDBe', //'admin123456',
			'is_builtin' 	=> 1,
            'verified' 		=> 1,
            'is_active' 	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		$user_member = DB::table($prefix . $tablename['user'])->insertGetId([
            'username' 		=> 'member',
            'user_mail' 	=> 'member@example.com',
            'email' 		=> 'member@example.com',
            'password' 		=> '$2y$10$ISRcd1y3.RHf3D3zFUinheMbc.M6i/9Hvq4LGP5TPAXcdsM25xrqW', //'member123456',
			'is_builtin' 	=> 1,
            'verified' 		=> 1,
            'is_active' 	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		$user_free = DB::table($prefix . $tablename['user'])->insertGetId([
            'username' 		=> 'freemember',
            'user_mail' 	=> 'freemember@example.com',
            'email' 		=> 'freemember@example.com',
            'password' 		=> '$2y$10$ISRcd1y3.RHf3D3zFUinheMbc.M6i/9Hvq4LGP5TPAXcdsM25xrqW', //'member123456',
			'is_builtin' 	=> 1,
            'verified' 		=> 1,
            'is_active' 	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		$user_bronze = DB::table($prefix . $tablename['user'])->insertGetId([
            'username' 		=> 'bronze',
            'user_mail' 	=> 'bronze@example.com',
            'email' 		=> 'bronze@example.com',
            'password' 		=> '$2y$10$ISRcd1y3.RHf3D3zFUinheMbc.M6i/9Hvq4LGP5TPAXcdsM25xrqW', //'member123456',
			'is_builtin' 	=> 1,
            'verified' 		=> 1,
            'is_active' 	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		$user_silver = DB::table($prefix . $tablename['user'])->insertGetId([
            'username' 		=> 'silver',
            'user_mail' 	=> 'silver@example.com',
            'email' 		=> 'silver@example.com',
            'password' 		=> '$2y$10$ISRcd1y3.RHf3D3zFUinheMbc.M6i/9Hvq4LGP5TPAXcdsM25xrqW', //'member123456',
			'is_builtin' 	=> 1,
            'verified' 		=> 1,
            'is_active' 	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		$user_gold = DB::table($prefix . $tablename['user'])->insertGetId([
            'username' 		=> 'gold',
            'user_mail' 	=> 'gold@example.com',
            'email' 		=> 'gold@example.com',
            'password' 		=> '$2y$10$ISRcd1y3.RHf3D3zFUinheMbc.M6i/9Hvq4LGP5TPAXcdsM25xrqW', //'member123456',
			'is_builtin' 	=> 1,
            'verified' 		=> 1,
            'is_active' 	=> 1,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		//-- END USER --//
		
		//-- START PERMISSION --//
		
		$can_create_user = DB::table($prefix . $tablename['permissions'])->insert([
			'perm_name' 		=> 'Create User',
			'code_perm' 		=> 'create-user',
			'perm_description' 	=> 'Anyone who can create users',
			'is_active' 		=> 1,
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s'),			
		]);
		
		$can_edit_user = DB::table($prefix . $tablename['permissions'])->insert([
			'perm_name' 		=> 'Edit User',
			'code_perm' 		=> 'edit-user',
			'perm_description' 	=> 'Anyone who can edit users',
			'is_active' 		=> 1,
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s'),			
		]);
		
		$can_remove_user = DB::table($prefix . $tablename['permissions'])->insert([
			'perm_name' 		=> 'Delete User',
			'code_perm' 		=> 'delete-user',
			'perm_description' 	=> 'Anyone who can delete users',
			'is_active' 		=> 1,
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s'),			
		]);
		
		//-- END PERMISSION --//
		
		//-- START ATTACH USER ROLE --/
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' 		=> $user_admin,
			'roles_id' 		=> $role_admin,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' 		=> $user_member,
			'roles_id' 		=> $role_member,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' 		=> $user_free,
			'roles_id' 		=> $role_freetrial,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' 		=> $user_bronze,
			'roles_id' 		=> $role_bronze,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id'		=> $user_silver,
			'roles_id'		=> $role_silver,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' 		=> $user_gold,
			'roles_id' 		=> $role_gold,
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s')
		]);

		//-- END ATTACH USER ROLE --/
		
		DB::table($prefix . $tablename['permission_roles'])->insert([
			'permission_id' 	=> $can_create_user,
			'roles_id' 			=> $role_admin,
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['permission_roles'])->insert([
			'permission_id' 	=> $can_edit_user,
			'roles_id' 			=> $role_admin,
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['permission_roles'])->insert([
			'permission_id' 	=> $can_remove_user,
			'roles_id' 			=> $role_admin,
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s')
		]);
		
		//-- START CUSTOM FIELDS --//
		$user_fields_passport = DB::table($prefix . $tablename['user_fields'])->insertGetId([
			'field_type_id' 	=> $type_string,
			'group_field_id' 	=> $usergroup_personal,
			'field_name' 		=> 'Passport number',
			'field_comment' 	=> null,
			'possible_values' 	=> null,
			'text_select_value' => null,
			'must_unique' 		=> 1,
			'is_mandatory' 		=> 1,
			'field_order' 		=> 1,
			'sort_values' 		=> 1,
			'is_active' 		=> 1,
			'show_in_signup' 	=> 1,
			'admin_use_only' 	=> 0,
			'vertical_layout' 	=> 0,
			'is_encrypted' 		=> 0,
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s'),
			'deleted_at' 		=> null
		]);

		$user_fields_gender = DB::table($prefix . $tablename['user_fields'])->insertGetId([
			'field_type_id' 	=> $type_combobox,
			'group_field_id' 	=> $usergroup_personal,
			'field_name' 		=> 'Gender',
			'field_comment'		=> 'Please select your gender',
			'possible_values' 	=> 'Male; Female',
			'text_select_value' => 'Please select your gender',
			'must_unique' 		=> 0,
			'is_mandatory' 		=> 0,
			'field_order' 		=> 1,
			'sort_values' 		=> 1,
			'is_active' 		=> 1,
			'show_in_signup' 	=> 1,
			'admin_use_only' 	=> 0,
			'vertical_layout' 	=> 0,
			'is_encrypted' 		=> 0,
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s'),
			'deleted_at' 		=> null
		]);
		
		$user_fields_biodata = DB::table($prefix . $tablename['user_fields'])->insertGetId([
			'field_type_id' 	=> $type_text,
			'group_field_id' 	=> $usergroup_personal,
			'field_name' 		=> 'Bio Data',
			'field_comment'		=> null,
			'possible_values' 	=> null,
			'text_select_value' => null,
			'must_unique' 		=> 0,
			'is_mandatory' 		=> 0,
			'field_order' 		=> 1,
			'sort_values' 		=> 1,
			'is_active' 		=> 1,
			'show_in_signup' 	=> 0,
			'admin_use_only' 	=> 0,
			'vertical_layout' 	=> 0,
			'is_encrypted' 		=> 0,
			'created_at' 		=> date('Y-m-d H:i:s'),
			'updated_at' 		=> date('Y-m-d H:i:s'),
			'deleted_at' 		=> null
		]);
		
		//-- END CUSTOM FIELDS --//
		
		
		//-- START CUSTOM FIELDS VALUE --//
		
		DB::table($prefix . $tablename['user_profile_fields'])->insert([
			'user_id' 		=> $user_admin,
			'userfield_id' 	=> $user_fields_passport,
			'field_value' 	=> 'BD0201201',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'deleted_at' 	=> null
		]);
		
		DB::table($prefix . $tablename['user_profile_fields'])->insert([
			'user_id' 		=> $user_admin,
			'userfield_id' 	=> $user_fields_gender,
			'field_value' 	=> 'male',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'deleted_at' 	=> null
		]);
		
		DB::table($prefix . $tablename['user_profile_fields'])->insert([
			'user_id' 		=> $user_admin,
			'userfield_id' 	=> $user_fields_biodata,
			'field_value' 	=> 'The show must go on!',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'deleted_at' 	=> null
		]);
		
		DB::table($prefix . $tablename['user_profile_fields'])->insert([
			'user_id' 		=> $user_member,
			'userfield_id' 	=> $user_fields_passport,
			'field_value' 	=> 'BD0201202',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'deleted_at' 	=> null
		]);
		
		DB::table($prefix . $tablename['user_profile_fields'])->insert([
			'user_id' 		=> $user_free,
			'userfield_id' 	=> $user_fields_passport,
			'field_value' 	=> 'BD0201203',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'deleted_at' 	=> null
		]);
		
		DB::table($prefix . $tablename['user_profile_fields'])->insert([
			'user_id' 		=> $user_bronze,
			'userfield_id' 	=> $user_fields_passport,
			'field_value' 	=> 'BD0201204',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'deleted_at' 	=> null
		]);
		
		DB::table($prefix . $tablename['user_profile_fields'])->insert([
			'user_id' 		=> $user_silver,
			'userfield_id' 	=> $user_fields_passport,
			'field_value' 	=> 'BD0201205',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'deleted_at' 	=> null
		]);
		
		DB::table($prefix . $tablename['user_profile_fields'])->insert([
			'user_id' 		=> $user_gold,
			'userfield_id' 	=> $user_fields_passport,
			'field_value' 	=> 'BD0201206',
			'created_at' 	=> date('Y-m-d H:i:s'),
			'updated_at' 	=> date('Y-m-d H:i:s'),
			'deleted_at' 	=> null
		]);
		
		//-- END CUSTOM FIELDS VALUE --//
		
		$this->command->info('StopLite tables are seeded!');
	}
}