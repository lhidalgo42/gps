<?php

class UserdeviceTableSeeder extends Seeder {

	public function run()
	{
		Userdevice::create([
			'users_id' => '1',
			'devices_id' => '1'
		]);
		Userdevice::create([
			'users_id' => '2',
			'devices_id' => '1'
		]);
		foreach(range(2, 6) as $index) {
			Userdevice::create([
				'users_id' => '1',
				'devices_id' => $index
			]);
			Userdevice::create([
				'users_id' => '2',
				'devices_id' => $index
			]);
		}

	}

}
