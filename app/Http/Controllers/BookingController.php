<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Flight;
use App\Models\Booking;
use Illuminate\Pagination\Paginator;

class BookingController extends Controller
{
    //
    public function index(){

    	// echo "working";
    	// return view('');
    }

    public function addbook(Request $request)
    {
        $response = null;
        
        if (request()->isMethod('post')) {
            # code...
            // echo "working";
            $tokenFile = fopen("token.txt", "r") or die("Unable to open file!");
            $token=  fgets($tokenFile);

            $response = Http::get('https://api-crt.cert.havail.sabre.com/v1/shop/flights', [
            'Authorization' => 'Bearer '.$token,
            'Content-Type' => 'application/json',
            'origin' => $request->from,
            'destination' => $request->to,
            'departuredate' => $request->departure,
            'returndate' => $request->return

        ]);

        

            // $response = $response->getBody()->getContents();
            $response = $response->getBody();
            // $response = json_encode($response);

            $response = json_decode($response);

            // dd($response->PricedItineraries[0]->AirItinerary->OriginDestinationOptions->OriginDestinationOption[0]->FlightSegment[0]->DepartureAirport->LocationCode);

            // $response = $response->PricedItineraries[0]->AirItinerary->OriginDestinationOptions->OriginDestinationOption[0]->FlightSegment[0];

            // echo "<pre>";
            // print_r($response);
            // echo "</pre>";
            // die();

            // foreach ($response as $valueK => $valueV) {
              
            //   // echo "$value <br>";
            //     echo $valueK[];

            // }
            // die();
            // echo "<pre>";
            // print_r($response->FareInfo);
            // echo "</pre>";die;
            // $flightInfo = $response->FareInfo;
            // return view('flightresult', compact('response'));
        }

        return view('addbooking', compact('response'));
    }

    private function createAccessToken()
    {
        $token = Http::withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Basic VmpFNmEyRXdhalp0Wm5WNGVIbDJNRFkyZGpwRVJWWkRSVTVVUlZJNlJWaFU6UW1GdlN6UlNaVEk9',
                'grant_type' => 'client_credentials'
            ])->post('https://api-crt.cert.havail.sabre.com/v2/auth/token', [
        ]);
        $myfile = fopen("token.txt", "w");
        fwrite($myfile, $token['access_token']);
    }

    public function store(Request $request)
    {
        // echo "working store";
        // echo fopen("token.txt", "r");die;
        /*$tokenFile = fopen("token.txt", "r") or die("Unable to open file!");
        $tokenDetails=  fgets($tokenFile);

        if (empty($tokenDetails) || $tokenDetails['exptime'] < $cur) {

            $this->createAccessToken();
            $tokenFile = fopen("token.txt", "r") or die("Unable to open file!");
            $tokenDetails=  fgets($tokenFile);
        }
        // $token = $tokenDetails["token"]*/

        // $this->createAccessToken();
        $tokenFile = fopen("token.txt", "r") or die("Unable to open file!");
        $token=  fgets($tokenFile);

        // $timeNumber = 134501;
        // $DateTime time = DateTime.ParseExact(timeNumber.ToString().PadLeft(6, '0'), "HHmmss", null);

    	$field = (object) [
            "OTA_AirLowFareSearchRQ" => (object) [
    			"OriginDestinationInformation" => [
    	   			(object) [
    					"DepartureDateTime" => "2021-10-18T00:00:00",
    					"OriginLocation"=> (object) [
    						"LocationCode"=> "JFK"
    					],
    					"DestinationLocation"=>(object) [
    						"LocationCode"=> "LHR"
    					],
    					"RPH"=> "1"
    				],
    				[
    					"DepartureDateTime"=> "2021-10-28T00:00:00",
    					"OriginLocation" => (object) [
    						"LocationCode"=> "LHR"
    					],
    					"DestinationLocation"=>(object) [
    						"LocationCode"=> "JFK"
    					],
    					"RPH"=> "2"
    				]
    			],
    			"POS"=> (object) [
    				"Source"=> [
    					(object)[
    						"PseudoCityCode"=> "F9GE",
    						"RequestorID"=> (object) [
    							"CompanyName"=> (object) [
    								"Code"=> "TN"
    							],
    							"ID"=> "1",
    							"Type"=> "1"
    						]
    					]
    				]
    			],
    			"TPA_Extensions"=>(object) [
    				"IntelliSellTransaction"=>(object) [
    					"RequestType"=> (object) [
    				 	"Name"=> "50ITINS"
    				 ]
    				]
    			],
				"TravelerInfoSummary"=>(object) [
					"AirTravelerAvail"=> [
						(object) [
							"PassengerTypeQuantity"=> [
								[
									"Code"=> "ADT",
									"Quantity"=> 1
								]
							]
						]
					]
				],
    				"Version"=> "2"
    			]
    		];
    	$content = json_encode($field);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api-crt.cert.havail.sabre.com/v2/offers/shop',[
            'headers' => [
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
            ],
            "body" => $content
        ]);

        $response = $response->getBody()->getContents();
        $response = json_decode($response);
        // dd($response);

        echo "<pre>";
        print_r($response);
        echo "</pre>";die;

    	return view('addbooking');
    }

    public function bearerToken()
  	{
       $header = $this->header('Authorization', '');
       if (Str::startsWith($header, 'Bearer ')) {
           return Str::substr($header, 7);
       }
  	}

    public function getFlight(Request $request)
    {

        // $flight = new Flight();
        $booking = new Booking();

        $origin = $booking->from = request('from');
        $destination = $booking->to = request('to');
        $departure = $booking->departure = request('departure');
        $return = $booking->return = request('return');
        // dd($booking);

        $tokenFile = fopen("token.txt", "r") or die("Unable to open file!");
        $token=  fgets($tokenFile);

        // $response = Http::get('https://api-crt.cert.havail.sabre.com/v1/shop/flights', [
        //     'Authorization' => 'Bearer '.$token,
        //     'Content-Type' => 'application/json',
        //     'origin' => $origin,
        //     'destination' => $destination,
        //     'departuredate' => $departure,
        //     'returndate' => $return

        // ]);

        $response = Http::get('https://api-crt.cert.havail.sabre.com/v1/historical/shop/flights/fares', [
            'Authorization' => 'Bearer '.$token,
            'Content-Type' => 'application/json',
            'origin' => $origin,
            'destination' => $destination,
            'departuredate' => $departure,
            'returndate' => $return

        ]);

        

        // $response = $response->getBody()->getContents();
        $response = $response->getBody();
        // $response = json_encode($response);

        $response = json_decode($response);
        // dd($response);
        // echo "<pre>";
        // print_r($response->FareInfo);
        // echo "</pre>";die;
        // $flightInfo = $response->FareInfo;
        return view('flightresult', compact('response'));
    }
}
