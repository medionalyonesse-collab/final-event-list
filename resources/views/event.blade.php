@extends('layout.user_template')

@section('content')
<main class="col-md-9 col-lg-10 px-md-4 py-4">
    <div class="d-flex justify-content-between align-items-center pb-3 mb-4">
        <div>
            <h1 class="h3 fw-bold text-dark m-0">Event List</h1>
            <p class="text-muted small">Monitor schedules, update log parameters, and organize active corporate events.</p>
        </div>
        <button class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#addEventModal">
            <i class="bi bi-plus-lg"></i> Add New Event
        </button>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="table-responsive">
            <table class="table align-middle m-0">
                <thead class="table-light text-muted small text-uppercase">
                    <tr>
                        <th class="ps-4">Event Title</th>
                        <th>Category</th>
                        <th>Date & Time</th>
                        <th>Location</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                    <tr>
                        <td class="ps-4 fw-bold text-dark">{{ $event->title }}</td>
                        <td>
                            <span class="badge bg-light text-dark">
                                {{ $event->category }}
                            </span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($event->date_time)->format('M d, Y • h:i A') }}</td>
                        <td>{{ $event->location }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-secondary me-1" onclick="openEditModal({{ json_encode($event) }})">Edit</button>
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete this event?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center py-4 text-muted">No events found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<div class="modal fade" id="addEventModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('events.store') }}" method="POST" class="modal-content border-0 shadow">
            @csrf
            <div class="modal-header border-0"><h5 class="fw-bold">Add New Event</h5></div>
            <div class="modal-body p-4">
                <input type="text" name="title" class="form-control mb-3" placeholder="Event Title" required>
                <input type="text" name="category" class="form-control mb-3" placeholder="Category" required>
                <input type="datetime-local" name="date_time" class="form-control mb-3" required>
                <input type="text" name="location" class="form-control mb-3" placeholder="Location" required>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Save Event</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editEventModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editEventForm" method="POST" class="modal-content border-0 shadow">
            @csrf @method('PUT')
            <div class="modal-header border-0"><h5 class="fw-bold">Edit Event</h5></div>
            <div class="modal-body p-4">
                <input type="text" name="title" id="edit_title" class="form-control mb-3" required>
                <input type="text" name="category" id="edit_category" class="form-control mb-3" required>
                <input type="datetime-local" name="date_time" id="edit_date" class="form-control mb-3" required>
                <input type="text" name="location" id="edit_location" class="form-control mb-3" required>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update Event</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModal(event) {
        document.getElementById('edit_title').value = event.title;
        document.getElementById('edit_category').value = event.category;
        // Slice para makuha ang format na yyyy-mm-ddThh:mm (kailangan para sa datetime-local)
        document.getElementById('edit_date').value = event.date_time.slice(0, 16);
        document.getElementById('edit_location').value = event.location;
        
        // Gamitin ang tamang route para sa update
        document.getElementById('editEventForm').action = `/events/${event.id}`;
        new bootstrap.Modal(document.getElementById('editEventModal')).show();
    }
</script>
@endsection