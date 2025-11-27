@extends('layouts.app')

@section('content')
	<h3 class="mb-3">Edit Student</h3>
	<form method="post" action="{{ route('students.update', $student) }}" class="card card-body">
		@csrf
		@method('PUT')
		@include('students._form', ['student' => $student])
	</form>
@endsection


