@extends('layouts.app')

@section('content')
	<div class="d-flex justify-content-between align-items-center mb-3">
		<h3 class="mb-0">Students</h3>
		<a href="{{ route('students.create') }}" class="btn btn-primary">New Student</a>
	</div>

	<form method="get" class="row g-2 mb-3">
		<div class="col-auto">
			<input type="text" name="q" class="form-control" value="{{ request('q') }}" placeholder="Search username/email">
		</div>
		<div class="col-auto">
			<button class="btn btn-outline-primary">Search</button>
		</div>
	</form>

	<div class="table-responsive">
		<table class="table table-striped table-hover align-middle">
			<thead>
				<tr>
					<th>Id</th>	
					<th>Username</th>
					<th>Email</th>
					<th>Age</th>
					<th>Course</th>
					<th>Batch</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@forelse($students as $index=> $student)
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $student->username }}</td>
						<td>{{ $student->email }}</td>
						<td>{{ $student->age ?? '-' }}</td>
						<td>{{ $student->course }}</td>
						<td>{{ $student->batch ?? '-' }}</td>
						<td class="d-flex gap-2">
							<a class="btn btn-sm btn-outline-info" href="{{ route('students.show', $student) }}">View</a>
							<a class="btn btn-sm btn-outline-secondary" href="{{ route('students.edit', $student) }}">Edit</a>
							<form method="post" action="{{ route('students.destroy', $student) }}" onsubmit="return confirm('Delete this student?')">
								@csrf
								@method('DELETE')
								<button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
							</form>
						</td>
					</tr>
				@empty
					<tr>
						<td colspan="7" class="text-center">No records found.</td>
					</tr>
				@endforelse
			</tbody>
		</table>
	</div>

		<p class="text-center mt-3 mb-3">
	</p>
<div class = "text-center">
{{ $students->links('pagination::bootstrap-5') }}
</div>




	
@endsection


