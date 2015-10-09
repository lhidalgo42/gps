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
	}

}