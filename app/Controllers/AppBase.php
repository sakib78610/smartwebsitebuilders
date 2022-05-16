<?php 

namespace App\Controllers;

use App\Controllers\BaseController;

class AppBase extends BaseController{

	protected $data;

    function __construct(){}

    protected function layout(){
		return view('index', $this->data);
    }

    protected function get_slug($title){
		return preg_replace('/-+/', '-', strtolower(preg_replace(array('#[\\s-]+#', '#[^A-Za-z0-9\. -]+#'),array('-', ''),urldecode($title))));
	}	
}