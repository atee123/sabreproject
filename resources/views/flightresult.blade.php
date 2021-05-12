@extends('layout')

@section('title', 'flight result')

@section('content')

<div class="container-sm" >

	<h1 style="text-align: center;"> Flight Results </h1>


		<table class="table table-striped table-hover">


			<thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">First</th>
			      <th scope="col">Last</th>
			      <th scope="col">Handle</th>
			    </tr>
			</thead>
			<tbody>

				@if(isset($response->FareInfo) && count($response->FareInfo) > 0)

					@foreach ( $response->FareInfo as $flightK => $flightV)
				    <tr>
				      <th scope="row">{{ $flightK }} </th>
				      <td> {{ $flightV->ShopDateTime }} </td>
				      <td>Otto</td>
				      <td>@mdo</td>
				    </tr>
					@endforeach
				@else

					<tr>
				      <td> Record Not Found </td>
				    </tr>

				@endif
			</tbody>


		</table>



</div>

@endsection