<?php

class UsersController extends \BaseController {

	public function home()
	{
        $gps = Data::all();
        foreach($gps as $dato)
            $coordinates[]=array($dato->latitude,$dato->longitude);
        return View::make('users.home')->with(compact('coordinates'));
	}
    public function create(){
        return View::make('app.users.new');
    }

}
