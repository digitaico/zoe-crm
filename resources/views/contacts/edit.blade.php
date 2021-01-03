@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>Edit Contact</h2>
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

	<form action="{{ route('contacts.update',$contact->id) }}" method="POST">
		@csrf
		@method('PUT')

		<div class="form-group">
			<label for="fname">First Name</label>	
			<input type="text" class="form-control" id="fname" name="first_name" placeholder="First Name" required value="{{ $contact->first_name }}"> 	
		</div>
		<div class="form-group">
			<label for="lname">Last Name</label>	
			<input type="text" class="form-control" id="lname" name="last_name" placeholder="Last Name" required value="{{ $contact->last_name }}"> 	
		</div>
		<div class="form-group">
			<label for="femail">Email</label>	
			<input type="email" class="form-control" id="femail" name="email" placeholder="Email" required value="{{ $contact->email }}"> 	
		</div>
		<button type="submit" id="btnCreate" class="btn btn-primary">Update</button>
	</form>

@endsection
