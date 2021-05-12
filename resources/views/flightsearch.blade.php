@extends('layout')

@section('title', 'Flight Search')

@section('content')

<div class="container-sm" >
	<h1 class="text-center">Search Flight</h1>


	<form method="POST" action="/">
	 	
	 	{{ csrf_field() }}
	 	<div class="row">

		  	<div class="col">
		  		
		  		<label for="exampleInputEmail1" class="form-label">From </label>
		    	<input type="text" class="form-control" id="fromInput" aria-describedby="emailHelp">

		  	</div>
		    
		  	<div class="col">
		  		<label for="exampleInputEmail1" class="form-label"> To </label>
			    <input type="text" class="form-control" id="toInput" aria-describedby="emailHelp">
			    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
		  	</div>

		  	<div class="col">
		  		<label for="exampleInputEmail1" class="form-label"> Departure Date </label>
			    <input type="date" class="form-control" id="departureDate" aria-describedby="emailHelp">
			    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
		  	</div>

		  	<div class="col">
		  		<label for="exampleInputEmail1" class="form-label"> Return Date </label>
			    <input type="date" class="form-control" id="returnDate" aria-describedby="emailHelp">
			    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
		  	</div>
			    
		</div>
		  
		<div class="col" style="text-align: center; margin-top: 20px;">
			<button type="submit" class="btn btn-primary">Flight</button>	
		</div>
		  
	</form>

</div>

@endsection