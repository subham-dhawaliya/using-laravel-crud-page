@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Admin Dashboard - All Users</h3>
        <div>
            <span class="badge bg-primary me-2">Welcome, {{ $user->name }}!</span>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Logout</button>
            </form>
        </div>
    </div>

    <form method="get" class="row g-2 mb-3">
        <div class="col-auto">
            <input type="text" name="q" class="form-control" value="{{ request('q') }}" placeholder="Search name/email">
        </div>
        <div class="col-auto">
            <button class="btn btn-outline-primary">Search</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Admin</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            @if($u->is_admin)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>{{ $u->created_at->format('M d, Y') }}</td>
                        <td class="d-flex gap-2">
                            <button class="btn btn-sm btn-outline-info" onclick="showUserModal({{ $u->id }}, '{{ $u->name }}', '{{ $u->email }}', '{{ $u->is_admin ? 'Yes' : 'No' }}', '{{ $u->created_at->format('M d, Y H:i') }}')">View</button>
                            @if($u->email !== 'skgdhawaliya@gmail.com')
                                <form method="post" action="{{ route('users.destroy', $u) }}" onsubmit="return confirm('Are you sure you want to delete this user?')" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="text-center mt-3">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- User Details Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-4"><strong>ID:</strong></div>
                    <div class="col-sm-8" id="modal-user-id"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4"><strong>Name:</strong></div>
                    <div class="col-sm-8" id="modal-user-name"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4"><strong>Email:</strong></div>
                    <div class="col-sm-8" id="modal-user-email"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4"><strong>Admin:</strong></div>
                    <div class="col-sm-8" id="modal-user-admin"></div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4"><strong>Joined:</strong></div>
                    <div class="col-sm-8" id="modal-user-joined"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
function showUserModal(id, name, email, isAdmin, joinedDate) {
    document.getElementById('modal-user-id').textContent = id;
    document.getElementById('modal-user-name').textContent = name;
    document.getElementById('modal-user-email').textContent = email;
    document.getElementById('modal-user-admin').innerHTML = isAdmin === 'Yes' ?
        '<span class="badge bg-success">Yes</span>' :
        '<span class="badge bg-secondary">No</span>';
    document.getElementById('modal-user-joined').textContent = joinedDate;

    // Show the modal
    const modal = new bootstrap.Modal(document.getElementById('userModal'));
    modal.show();
}
</script>
@endsection