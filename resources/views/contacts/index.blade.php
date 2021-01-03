@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<a href="{{ route('contacts.create') }}" class="btn btn-primary" >Add new Contact</a>
		</div>
		<div class="pull-right">
			<a href="{{ route('fetchApi') }}" class="btn btn-warning" >Update Contacts from HubSpot</a>
		</div>
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
@foreach ($contacts as $contact)
		<tr>
			<th scope="row">{{ $contact->id }}</th>
			<td>{{ $contact->first_name }}</th>
			<td>{{ $contact->last_name }}</th>
			<td>{{ $contact->email }}</th>
			<td>{{ $contact->created_at }}</th>
			<td>
				<form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
					<a class="btn btn-info" href="{{ route('contacts.show',$contact->id) }}">Detail</a>
					<a class="btn btn-primary" href="{{ route('contacts.edit',$contact->id) }}">Edit</a>

					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Delete Contact</button>
				</form>
			</td>
		</tr>
@endforeach
	</tbody>
</table>

{{ $contacts->links() }}


@endsection
