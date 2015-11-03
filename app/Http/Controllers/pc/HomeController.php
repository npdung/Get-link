<?php

namespace App\Http\Controllers\pc;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function index(){
		return view('pc.home.index');
	}
}
