@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
<h3>Zoe CRM</h3>
	</div>
</div>

@if ($message = Session::get('success')) 
	<div class="alert aleert-success">
		<p>{{ $message }}</p>
	</div>
@endif

	<div class=""><a href="{{ route('contacts') }}">Contacts</a></div>



@endsection
