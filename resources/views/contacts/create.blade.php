@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Add new Contact</h2>
		</div>
		<div class="pull-right">
			<a href="{{ route('contacts.index') }}" class="btn btn-info">Back</a>
		</div>
	</div>
</div>

@if ($errors->any()) 
	<div class="alert aleert-danger">
		<strong>Warning!</strong> Please check all fields<br /><br />
		<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</ul>
	</div>
@endif

	<form action="{{ route('contacts.store') }}" method="POST">
		@csrf

		<div class="form-group">
			<label for="fname">First Name</label>	
			<input type="text" class="form-control" id="fname" name="first_name" placeholder="First Name" required> 	
		</div>
		<div class="form-group">
			<label for="lname">Last Name</label>	
			<input type="text" class="form-control" id="lname" name="last_name" placeholder="Last Name" required> 	
		</div>
		<div class="form-group">
			<label for="femail">Email</label>	
			<input type="email" class="form-control" name="email" id="femail" placeholder="Email" required> 	
		</div>
		<button type="submit" id="btnCreate" class="btn btn-primary">Add</button>
	</form>

@endsection
