@extends('layout')

@section('title', 'Home')

@section('content')

<div class="container-sm" >
	<h1 class="text-center"> Flight Search </h1>


	<form method="POST" >
	<!-- <form method="POST" action="/flightresult" > -->
	 	
	 	{{ csrf_field() }}

	 	<div class="row">

		  	<div class="col">
		  		
		  		<label for="exampleInputEmail1" class="form-label">From </label>
		    	<input type="text" name="from" class="form-control" id="fromInput" aria-describedby="emailHelp">

		  	</div>
		    
		  	<div class="col">
		  		<label for="exampleInputEmail1" class="form-label"> To </label>
			    <input type="text" name="to" class="form-control" id="toInput" aria-describedby="emailHelp">
			    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
		  	</div>

		  	<div class="col">
		  		<label for="exampleInputEmail1" class="form-label"> Departure Date </label>
			    <input type="date" name="departure" class="form-control" id="departureDate" aria-describedby="emailHelp">
			    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
		  	</div>

		  	<div class="col">
		  		<label for="exampleInputEmail1" class="form-label"> Return Date </label>
			    <input type="date" name="return" class="form-control" id="returnDate" aria-describedby="emailHelp">
			    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
		  	</div>
			    
		</div>
		  
		<div class="col" style="text-align: center; margin-top: 20px;">
			<button type="submit" class="btn btn-primary">Flight</button>	
		</div>
		  
	</form>

</div>

@if(isset($response) && !empty($response))

<div class="container-sm" >

	<h1 style="text-align: center;"> Flight Results </h1>


		<table class="table table-striped table-hover">


			<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col"> Origin Location </th>
			      <th scope="col"> Destination Location </th>
			      <th scope="col"> Departure Date </th>
			      <th scope="col"> Arrival Date </th>
			      <th scope="col"> Fare </th>
			      <th scope="col"> Currency </th>
			      <th scope="col"> Status </th>

			    </tr>
			</thead>
			<tbody>

				@if(isset($response->PricedItineraries) && count($response->PricedItineraries) > 0)


 					@foreach( $response->PricedItineraries as $flightKey => $flightVal)

 						<tr> 

 							<th scope="row"> {{ $flightKey }} </th>
 							

 							<td> {{ $flightVal->AirItinerary->OriginDestinationOptions->OriginDestinationOption[0]->FlightSegment[0]->DepartureAirport->LocationCode }} </td>

 							<td> {{ $flightVal->AirItinerary->OriginDestinationOptions->OriginDestinationOption[0]->FlightSegment[0]->ArrivalAirport->LocationCode }} </td>

 							<td> {{ $flightVal->AirItinerary->OriginDestinationOptions->OriginDestinationOption[0]->FlightSegment[0]->DepartureDateTime }} </td>

 							<td> {{ $flightVal->AirItinerary->OriginDestinationOptions->OriginDestinationOption[0]->FlightSegment[0]->ArrivalDateTime }} </td>

 							<td> {{ $flightVal->AirItineraryPricingInfo->ItinTotalFare->TotalFare->Amount }} </td>
 							
 							<td> {{ $flightVal->AirItineraryPricingInfo->ItinTotalFare->TotalFare->CurrencyCode }} </td>

 							<td> <button class="btn btn-success"> Book </button></td>
 						</tr>

 					@endforeach
 				@else

 					<tr>
 						<td> Record Nor Fount </td>
 					</tr>

 				@endif

 				
 				</tbody>


		</table>

</div>
@endif

@endsection