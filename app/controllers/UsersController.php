<?php

class UsersController extends \BaseController {

	public function home()
	{
        $gps = Data::all();
        foreach($gps as $dato)
            $coordinates[]=array($dato->latitude,$dato->longitude);
        $devices = Device::join('users_devices','devices.id','=','users_devices.devices_id')->where('users_devices.users_id',Auth::user()->id)->get();
        return View::make('users.home')->with(compact('coordinates','devices'));
	}
    public function create(){
        return View::make('app.users.new');
    }
    public function settings(){
        return View::make('users.settings');
    }

}
