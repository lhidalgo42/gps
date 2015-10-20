<?php


class StatusTableSeeder extends Seeder {

	public function run()
	{
		Status::create([
			'name' => 'Check',
			'description' => 'Dispositivo en espera de aprovación.',
			'className' => 'panel-primary',
			'cssBorder' => '#204d74',
			'cssColor' => '#337ab7'
		]);
		Status::create([
			'name' => 'Activo',
			'description' => 'Dispositivo Funcionando sin problemas.',
			'className' => 'panel-green',
			'cssBorder' => '4cae4c',
			'cssColor' => '#5cb85c'
		]);
		Status::create([
			'name' => 'Alerta',
			'description' => 'Alerta en caso de inconveniente.',
			'className' => 'panel-yellow',
			'cssBorder' => '#eea236',
			'cssColor' => '#f0ad4e'
		]);
		Status::create([
			'name' => 'Robado',
			'description' => 'Dispositivo Robado.',
			'className' => 'panel-red',
			'cssBorder' => '#d43f3a',
			'cssColor' => '#d9534f'
		]);
	}

}