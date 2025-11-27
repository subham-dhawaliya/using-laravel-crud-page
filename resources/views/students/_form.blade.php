@php($isEdit = isset($student))
<div class="mb-3">
	<label class="form-label">Username</label>
	<input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $student->username ?? '') }}">
	@error('username')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
	<label class="form-label">Email</label>
	<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $student->email ?? '') }}">
	@error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
	<label class="form-label">Age</label>
	<input type="number" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $student->age ?? '') }}" min="0">
	@error('age')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
	<label class="form-label">Course</label>
	<input type="text" name="course" class="form-control @error('course') is-invalid @enderror" value="{{ old('course', $student->course ?? '') }}">
	@error('course')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="mb-3">
	<label class="form-label">Batch</label>
	<input type="text" name="batch" class="form-control @error('batch') is-invalid @enderror" value="{{ old('batch', $student->batch ?? '') }}">
	@error('batch')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>
<div class="d-flex gap-2">
	<button type="submit" class="btn btn-primary">{{ $isEdit ? 'Update' : 'Create' }}</button>
	<a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
</div>


