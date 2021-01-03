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
			<input type="text" class="form-control" id="first_name" placeholder="First Name" value="{{ $contact->first_name }}"> 	
		</div>
		<div class="form-group">
			<label for="last_name">Last Name</label>	
			<input type="text" class="form-control" id="last_name" placeholder="Last Name" value="{{ $contact->last_name }}"> 	
		</div>
		<div class="form-group">
			<label for="email">Email</label>	
			<input type="email" class="form-control" id="email" placeholder="Email" value="{{ $contact->email }}"> 	
		</div>
		<div class="form-group">
			<label for="vid">Vid</label>	
			<input type="text" class="form-control" id="vid" placeholder="Vid" value="{{ $contact->vid }}"> 	
		</div>
		<div class="form-group">
			<label for="cdate">Creation Date</label>	
			<input type="text" class="form-control" id="cdate" value="{{ $contact->created_at }}"> 	
		</div>
		<div class="form-group">
			<label for="udate">Update Date</label>	
			<input type="text" class="form-control" id="udate" value="{{ $contact->updated_at }}"> 	
		</div>
	</form>

@endsection
