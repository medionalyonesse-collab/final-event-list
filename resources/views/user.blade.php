@extends('layout.user_template')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold text-dark">Users Management</h1>
        <p class="text-muted small">Manage system administrators and staff accounts.</p>
    </div>
    <button class="btn btn-primary fw-bold d-flex align-items-center gap-2 shadow-sm" data-bs-toggle="modal" data-bs-target="#addUserModal">
        <i class="bi bi-person-plus-fill"></i> Add New User
    </button>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow-sm rounded-3 overflow-hidden">
    <div class="table-responsive">
        <table class="table table-hover align-middle m-0">
            <thead class="table-light text-dark fw-bold">
                <tr>
                    <th class="ps-4">Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th class="text-center pe-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td class="ps-4 fw-medium">{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td class="text-center pe-4">
                        <div class="d-flex justify-content-center gap-2">
                            <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->id }}">
                                <i class="bi bi-pencil-square"></i> Edit
                            </button>
                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-muted">No users found in the system.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@foreach($users as $user)
<div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white border-0 rounded-4 shadow">
            <div class="modal-header border-secondary border-opacity-25">
                <h5 class="modal-title fw-bold text-info">Edit User Information</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @csrf @method('PUT')
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small opacity-75">Full Name</label>
                        <input type="text" name="name" class="form-control bg-secondary bg-opacity-10 text-white border-secondary" value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small opacity-75">Email Address</label>
                        <input type="email" name="email" class="form-control bg-secondary bg-opacity-10 text-white border-secondary" value="{{ $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small opacity-75">Phone Number</label>
                        <input type="tel" name="phone" class="form-control bg-secondary bg-opacity-10 text-white border-secondary" value="{{ $user->phone }}" required>
                    </div>
                </div>
                <div class="modal-footer border-secondary border-opacity-25">
                    <button type="button" class="btn btn-outline-secondary text-white" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info fw-bold text-dark">Update Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white border-0 rounded-4 shadow">
            <div class="modal-header border-secondary border-opacity-25">
                <h5 class="modal-title fw-bold text-danger">Delete User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <i class="bi bi-trash3 text-danger display-4 mb-3 d-block"></i>
                <p>Are you sure you want to delete <strong>{{ $user->name }}</strong>?</p>
            </div>
            <div class="modal-footer border-secondary border-opacity-25 justify-content-center">
                <button type="button" class="btn btn-outline-secondary text-white" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-white border-0 rounded-4 shadow">
            <div class="modal-header border-secondary border-opacity-25">
                <h5 class="modal-title fw-bold text-primary">Add New User</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('users.store') }}" method="POST"> 
                @csrf
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label small opacity-75">Full Name</label>
                        <input type="text" name="name" class="form-control bg-secondary bg-opacity-10 text-white border-secondary" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small opacity-75">Email Address</label>
                        <input type="email" name="email" class="form-control bg-secondary bg-opacity-10 text-white border-secondary" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small opacity-75">Phone Number</label>
                        <input type="tel" name="phone" class="form-control bg-secondary bg-opacity-10 text-white border-secondary" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label small opacity-75">Password</label>
                        <input type="password" name="password" class="form-control bg-secondary bg-opacity-10 text-white border-secondary" required>
                    </div>
                </div>
                <div class="modal-footer border-secondary border-opacity-25">
                    <button type="button" class="btn btn-outline-secondary text-white" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary fw-bold">Save User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection