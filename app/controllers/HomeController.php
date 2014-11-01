<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome() {
		return View::make('hello');
	}

	public function index() {
		return View::make('home.index');
	}

	public function testpdf() {
		// $parameterr = array();
  //       $parameter['param'] = "Hello World!!";
 
		$data['logo'] = 'assets/img/logo.png';

        $pdf = PDF::loadView('print.test');
        return $pdf->setPaper('a4')->setOrientation('portrait')->download('test.pdf', $data); //this code is used for the name pdf		

		

  //       return View::make('print.test', $data);
	}


}
