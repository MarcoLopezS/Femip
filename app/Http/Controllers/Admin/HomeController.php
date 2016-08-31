<?php namespace Femip\Http\Controllers\Admin;

use Femip\Http\Controllers\Controller;

class HomeController extends Controller{


    public function index()
    {
    	return view('admin.home');
    }

} 