<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class DoorController extends Controller {
	public $html;

	public function __construct() {
		$this->http = new Client(['base_uri' => 'https://csh.rit.edu',
					'timeout' => 5,
					'connect_timeout' => 5]);
	}

	public function temp(){
		return response('nothing here yet, waiting on project updates',200);
	}
