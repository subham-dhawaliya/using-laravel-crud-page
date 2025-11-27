@extends('layouts.app')

@section('content')
	<h3 class="mb-3">Create Student</h3>
	<form method="post" action="{{ route('students.store') }}" class="card card-body">
		@csrf
		@include('students._form')
	</form>
@endsection


