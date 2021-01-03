@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2>View Contact</h2>
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
			<label for="first_name">First Name</label>	
			<input type="text" class="form-control" name="fname" id="first_name" placeholder="First Name" value="{{ $contact->first_name }}"> 	
		</div>
		<div class="form-group">
			<label for="last_name">Last Name</label>	
			<input type="text" class="form-control" name="lname" id="last_name" placeholder="Last Name" value="{{ $contact->last_name }}"> 	
		</div>
		<div class="form-group">
			<label for="email">Email</label>	
			<input type="email" class="form-control" name="femail" id="email" placeholder="Email" value="{{ $contact->email }}"> 	
		</div>
	</form>

@endsection
