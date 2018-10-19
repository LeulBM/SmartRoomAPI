<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ShadesController extends Controller{
    public $http;

    // Create Guzzle client
    public function __construct() {
        $this->http = new Client(['base_uri' => 'http://shades.student.rit.edu:5000/gpio/',
                    'timeout' => 5,
                    'connect_timeout'=> 5]);
    }

    // Query shades for current height
    public function getCurrent() {
        try{
            $response = $this->http->get('get/current');
            $dataresponse = json_decode($response->getBody(), true);
            $toreturn = array('howOpen' => $dataresponse["data"]);
            return response()->json($toreturn, $response->getStatusCode());
        }
        // Catch any errors, typically timeouts
        catch(\Exception $e) {
            return response($e->getMessage(), 408);
        }
    }

    // Set height of shades to input value, input must be a number beteen 0 and 100, invalid input will be rejected
    public function setHeight(Request $request) {
        $inputdata = $request->json()->all();
        if(array_key_exists("howOpen",$inputdata)){
            if(is_numeric($inputdata["howOpen"])){
                if($inputdata["howOpen"] >= 0 && $inputdata["howOpen"] <= 100) {
                    try {
                        $response = $this->http->post("".$inputdata["howOpen"]);
                        if($response->getStatusCode()==200)
                            return response("Success", $response->getStatusCode());
                        else
                            return response("Shade Server error", $response->getStatusCode());
                    } catch(\Exception $e) {
                        return response($e->getMessage(), 408);
                    }
                } else {
                    return response("howOpen must be between 0 and 100", 408);
                }
            }else {
                return response("howOpen must be a number", 408);
            }
        } else {
            return response("howOpen must have some input", 408);
        }
    }
}

