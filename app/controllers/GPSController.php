<?php

class GPSController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /gps
	 *
	 * @return Response
	 */
	public function index()
	{
		$gps = Data::all();
        foreach($gps as $dato)
            $coordinates[]=array($dato->latitude,$dato->longitude);


        return $coordinates;
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /gps/create
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = Input::get('data');
		//$data = "imei:359710048662044,tracker,151007233119,,F,023118.000,A,3329.9717,S,07033.7211,W,14.47,278.06;";


		######################### Parametrizando ###################

		$data = explode(',',$data);
		$data[0] = substr($data[0],5);
		$data[12] = substr($data[12],0,-1);
		$lat = substr($data[7],0,2) + substr($data[7],2)/60;
		if($data[8] == 'S')
			$lat = $lat*(-1);
		$lon = substr($data[9],0,3) + substr($data[9],3)/60;
		if($data[10] == 'W')
			$lon = $lon*(-1);
		$data[7] = (floor($lat*10000000000)/10000000000);
		$data[9] = (floor($lon*10000000000)/10000000000);
		############################## Envio a Database ###########################
		/*$array = array(
			'imei' =>$data[0],
			'datatype' => $data[1],
			'timestamp' => $data[2],
			'vacio' => $data[3] ,
			'signal' =>$data[4] ,
			'utc' =>$data[5],
			'validity' =>$data[6],
			'latitude' => $data[7],
			'hemisphere' => $data[8],
			'longitude' => $data[9],
			'meridian' => $data[10],
			'speed' => $data[11],
			'course' => $data[12]
			);
		*/
		$datatype = Datatype::where('name','LIKE',$data[1])->get()->first();
		$device = Device::where('imei','LIKE',$data[0])->get()->first();

		##################### Update device ip #########################33
		$device->tcpName = Input::get('name');
		$device->save();
		###################### GET last ubicacion ####################
		$track = Data::where('devices_id',$device->id)->orderBy('id', 'DESC')->take(1)->get()->first();

		##################### Calcula la distancia #####################

		if($track) {
			$distance = sqrt(pow(($track->latitude - $data[7]),2) + pow(($track->longitude - $data[9]),2));
			if ($distance > 0) {
				$gps = new Data();
				$gps->devices_id = $device->id;
				$gps->datatypes_id = $datatype->id;
				$gps->signal = $data[4];
				$gps->validity = $data[6];
				$gps->latitude = $data[7];
				$gps->longitude = $data[9];
				$gps->speed = $data[11];
				$gps->course = $data[12];
				$gps->save();
			}
		}
		else{
			$gps = new Data();
			$gps->devices_id = $device->id;
			$gps->datatypes_id = $datatype->id;
			$gps->signal = $data[4];
			$gps->validity = $data[6];
			$gps->latitude = $data[7];
			$gps->longitude = $data[9];
			$gps->speed = $data[11];
			$gps->course = $data[12];
			$gps->save();
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /gps
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /gps/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /gps/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /gps/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /gps/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}