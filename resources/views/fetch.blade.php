@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
<h3>Fetch Contacts from HubSpot</h3>
	</div>
</div>

@if ($message = Session::get('success')) 
	<div class="alert aleert-success">
		<p>{{ $message }}</p>
	</div>
@endif

<table class="table table-stripped table-bordered">
	<thead>
		<tr>
			<th scope="col">Id</th>
			<th scope="col">First Name</th>
			<th scope="col">Last Name</th>
			<th scope="col">Email</th>
			<th scope="col">Creation Date</th>
			<th scope="col">Management</th>
		</tr>
	</thead>
	<tbody>
	</tbody>
</table>



@endsection
