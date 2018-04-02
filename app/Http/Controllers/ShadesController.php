<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ShadesController extends Controller{
	public $http;

	public function __construct() {
		$this->http = new Client(['base_uri' => 'https://agrpi.csh.rit.edu:5000/gpio/']);
	}

	public function getCurrent() {
		$response = $this->http->get('get/current');
		return response()->json(json_decode($response->getBody()),$response->getStatusCode());
	}

	public function setHeight(Request $request) {
		$this->validate($request, [
			'howOpen' => 'required|numeric|min:0|max:100'
		]);
		$url = $request->howOpen.'/';
		$response = $this->http->post($request->howOpen);
		return response()->json(json_decode($response->getBody()),$response->getStatusCode());
	}
}

