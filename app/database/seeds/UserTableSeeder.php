<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
			'email' => 'enzo.9214@gmail.com',
			'password' => '3582606.',
			'name' => 'Luchenzo Scilla'
		]);
		User::create([
			'email' => 'leontuna@gmail.com',
			'password' => '4380.UoY',
			'name' => 'Leonardo Hidalgo'
		]);
	}

}