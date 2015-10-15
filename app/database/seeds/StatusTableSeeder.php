<?php


class StatusTableSeeder extends Seeder {

	public function run()
	{
		Status::create([
			'name' => 'Activo',
			'description' => 'Dispositivo Activo y Funcionando.',
			'className' => 'panel-primary'
		]);
		Status::create([
			'name' => 'Positivo',
			'description' => 'Dispositivo Funcionando sin problemas.',
			'className' => 'panel-green'
		]);
		Status::create([
			'name' => 'Alerta',
			'description' => 'Alerta en caso de inconveniente.',
			'className' => 'panel-yellow'
		]);
		Status::create([
			'name' => 'Robado',
			'description' => 'Dispositivo Robado.',
			'className' => 'panel-red'
		]);
	}

}