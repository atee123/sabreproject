<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlightController extends Controller
{
    //
    public function index(){

    	// echo "working";
    	return view('flightsearch');
    }

    public function store(){

        echo "store information";
        // echo alert("store method call now.");
        echo "<script>";
        echo "alert('hello');";
        echo "</script>";
        return view('flightsearch');
    }

   //  private function createAccessToken()
   //  {
   //      $token = Http::withHeaders([
   //              'Content-Type' => 'application/x-www-form-urlencoded',
   //              'Authorization' => 'Basic VmpFNmEyRXdhalp0Wm5WNGVIbDJNRFkyZGpwRVJWWkRSVTVVUlZJNlJWaFU6UW1GdlN6UlNaVEk9',
   //              'grant_type' => 'client_credentials'
   //          ])->post('https://api-crt.cert.havail.sabre.com/v2/auth/token', [
   //      ]);
   //      $myfile = fopen("token.txt", "w");
   //      fwrite($myfile, $token['access_token']);
   //  }

   //  public function store(Request $request)
   //  {
   //      // echo fopen("token.txt", "r");die;
   //      /*$tokenFile = fopen("token.txt", "r") or die("Unable to open file!");
   //      $tokenDetails=  fgets($tokenFile);

   //      if (empty($tokenDetails) || $tokenDetails['exptime'] < $cur) {

   //          $this->createAccessToken();
   //          $tokenFile = fopen("token.txt", "r") or die("Unable to open file!");
   //          $tokenDetails=  fgets($tokenFile);
   //      }
   //      // $token = $tokenDetails["token"]*/

   //      $tokenFile = fopen("token.txt", "r") or die("Unable to open file!");
   //      $token=  fgets($tokenFile);

   //  	$field = (object) [
   //          "OTA_AirLowFareSearchRQ" => (object) [
   //  			"OriginDestinationInformation" => [
   //  	   			(object) [
   //  					"DepartureDateTime" => "2021-10-18T00:00:00",
   //  					"OriginLocation"=> (object) [
   //  						"LocationCode"=> "JFK"
   //  					],
   //  					"DestinationLocation"=>(object) [
   //  						"LocationCode"=> "LHR"
   //  					],
   //  					"RPH"=> "1"
   //  				],
   //  				[
   //  					"DepartureDateTime"=> "2021-10-28T00:00:00",
   //  					"OriginLocation" => (object) [
   //  						"LocationCode"=> "LHR"
   //  					],
   //  					"DestinationLocation"=>(object) [
   //  						"LocationCode"=> "JFK"
   //  					],
   //  					"RPH"=> "2"
   //  				]
   //  			],
   //  			"POS"=> (object) [
   //  				"Source"=> [
   //  					(object)[
   //  						"PseudoCityCode"=> "F9GE",
   //  						"RequestorID"=> (object) [
   //  							"CompanyName"=> (object) [
   //  								"Code"=> "TN"
   //  							],
   //  							"ID"=> "1",
   //  							"Type"=> "1"
   //  						]
   //  					]
   //  				]
   //  			],
   //  			"TPA_Extensions"=>(object) [
   //  				"IntelliSellTransaction"=>(object) [
   //  					"RequestType"=> (object) [
   //  				 	"Name"=> "50ITINS"
   //  				 ]
   //  				]
   //  			],
			// 	"TravelerInfoSummary"=>(object) [
			// 		"AirTravelerAvail"=> [
			// 			(object) [
			// 				"PassengerTypeQuantity"=> [
			// 					[
			// 						"Code"=> "ADT",
			// 						"Quantity"=> 1
			// 					]
			// 				]
			// 			]
			// 		]
			// 	],
   //  				"Version"=> "2"
   //  			]
   //  		];
   //  	$content = json_encode($field);

   //      $client = new \GuzzleHttp\Client();
   //      $response = $client->request('POST', 'https://api-crt.cert.havail.sabre.com/v2/offers/shop',[
   //          'headers' => [
   //              'Authorization' => 'Bearer '.$token,
   //              'Accept' => 'application/json',
   //          ],
   //          "body" => $content
   //      ]);

   //      $response = $response->getBody()->getContents();
   //      $response = json_decode($response);
   //      // dd($response);

   //      echo "<pre>";
   //      print_r($response);
   //      echo "</pre>";die;

   //  	return view('addbooking');
   //  }

   //  public function bearerToken()
  	// {
   //     $header = $this->header('Authorization', '');
   //     if (Str::startsWith($header, 'Bearer ')) {
   //         return Str::substr($header, 7);
   //     }
  	// }
}
