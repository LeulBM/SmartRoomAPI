<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TrashController extends Controller {
	public $html;

	public function __construct() {
		$this->http = new Client(['base_uri' => 'https://csh.rit.edu',
					'timeout' => 5,
					'connect_timeout' => 5]);
	}

	public function temp(){
		return response('Nothing here yet, Waiting on project updates from Trev',200);
	}
}
