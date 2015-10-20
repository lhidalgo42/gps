<?php


class DatatypeTableSeeder extends Seeder {

	public function run()
	{
		Datatype::create([
			'name' => 'tracker',
			'description' => 'Posicion en el Mapa.'
		]);
		Datatype::create([
			'name' => 'acc off',
			'description' => 'Contacto del Auto, Apagado.'
		]);
		Datatype::create([
			'name' => 'acc on',
			'description' => 'Contacto del Auto, Encendido.'
		]);
		Datatype::create([
			'name' => 'lt',
			'description' => 'Alarma Puesta.'
		]);
		Datatype::create([
			'name' => 'mt',
			'description' => 'Alarma Desactivada.'
		]);
		Datatype::create([
			'name' => 'jt',
			'description' => 'Suministro de Combustible Cortado.'
		]);
		Datatype::create([
			'name' => 'kt',
			'description' => 'Suministro de Combustible Restablecido.'
		]);
	}

}