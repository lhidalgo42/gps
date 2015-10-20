<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DeviceTableSeeder extends Seeder {

	public function run()
	{
		Device::create([
			'imei' => '359710048662044',
			'name' => 'Auto Luchenzo',
			'plate' => 'CCRT57',
			'status_id' => 1
		]);

		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
			Device::create([
				'imei' => $faker->numerify('###############'),
				'name' => $faker->name,
				'plate' => $faker->bothify('????##'),
				'status_id' => round(rand(1,4))
			]);
		}
	}

}