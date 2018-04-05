<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ShadesController extends Controller{
	public $http;

	// Create Guzzle client
	public function __construct() {
		$this->http = new Client(['base_uri' => 'https://agrpi.csh.rit.edu:5000/gpio/',
					'timeout' => 5,
					'connect_timeout'=> 5]);
	}

	// Query shades for current height
	public function getCurrent() {
		try{
			$response = $this->http->get('get/current');
			return response()->json(json_decode($response->getBody()),$response->getStatusCode());
		} 
		// Catch any errors, typically timeouts
		catch(\Exception $e) {
			die($e->getMessage());
		}
	}

	// Set height of shades to input value, input must be a number beteen 0 and 100, invalid input will be rejected
	public function setHeight(Request $request) {
		$this->validate($request, [
			'howOpen' => 'required|numeric|min:0|max:100'
		]);
		try {
		$response = $this->http->post($request->howOpen);
		} catch(\Exception $e) {
			die($e->getMessage());
		}
		return response()->json(json_decode($response->getBody()),$response->getStatusCode());
	}
}

