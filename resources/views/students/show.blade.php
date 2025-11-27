@extends('layouts.app')

@section('content')
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h3 class="mb-0">Student #{{ $student->id }}</h3>
		<div class="d-flex gap-2">
			<a class="btn btn-secondary" href="{{ route('students.index') }}">Back</a>
			<a class="btn btn-primary" href="{{ route('students.edit', $student) }}">Edit</a>
		</div>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="row mb-2">
				<div class="col-sm-3 fw-semibold">Username</div>
				<div class="col-sm-9">{{ $student->username }}</div>
			</div>
			<div class="row mb-2">
				<div class="col-sm-3 fw-semibold">Email</div>
				<div class="col-sm-9">{{ $student->email }}</div>
			</div>
			<div class="row mb-2">
				<div class="col-sm-3 fw-semibold">Age</div>
				<div class="col-sm-9">{{ $student->age ?? '-' }}</div>
			</div>
			<div class="row mb-2">
				<div class="col-sm-3 fw-semibold">Course</div>
				<div class="col-sm-9">{{ $student->course }}</div>
			</div>
			<div class="row mb-2">
				<div class="col-sm-3 fw-semibold">Batch</div>
				<div class="col-sm-9">{{ $student->batch ?? '-' }}</div>
			</div>
		</div>
	</div>
@endsection


