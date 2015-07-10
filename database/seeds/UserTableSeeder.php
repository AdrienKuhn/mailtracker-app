<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		DB::table('users')->delete();

		User::create([	'name' => 'Foo Bar',
						'email' => 'foo@bar.com',
						'password' => Hash::make('password')
					]);
	}

}