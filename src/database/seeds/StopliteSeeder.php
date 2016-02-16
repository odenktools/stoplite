<?php

use Illuminate\Database\Seeder;

class StopliteSeeder extends Seeder
{
	public function run()
	{
		$prefix = Config::get('stoplite.prefix', '');
		
		$tablename = Config::get('stoplite.tables', '');

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
		
		$can_create_user = DB::table($prefix . $tablename['permissions'])->insert([
			'perm_name' => 'Create User',
			'code_perm' => 'create-user',
			'perm_description' => 'Anyone who can create users',
			'is_active' 	=> 1,
		]);
		
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' => $user_admin,
			'roles_id' => $role_admin,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' => $user_member,
			'roles_id' => $role_member,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' => $user_free,
			'roles_id' => $role_freetrial,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' => $user_bronze,
			'roles_id' => $role_bronze,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' => $user_silver,
			'roles_id' => $role_silver,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
		
		DB::table($prefix . $tablename['userrole'])->insert([
			'user_id' => $user_gold,
			'roles_id' => $role_gold,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);

		DB::table($prefix . $tablename['permission_roles'])->insert([
			'permission_id' => $can_create_user,
			'roles_id' => $role_admin,
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		]);
		
		$this->command->info('StopLite tables are seeded!');
	}
}