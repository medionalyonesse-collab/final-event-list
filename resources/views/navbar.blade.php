<nav class="col-md-3 col-lg-2 bg-white p-3 position-sticky top-0 vh-100 overflow-y-auto shadow-sm border-end">
    <div class="pt-3 d-flex flex-column h-100">
        <div>
            {{-- Brand Logo --}}
            <div class="d-flex align-items-center mb-4 px-2">
                <span class="fs-4 fw-bold text-dark">ADMIN<span class="text-primary">PANEL</span></span>
            </div>
            
            <ul class="nav flex-column gap-1">
                <li class="nav-item">
                    {{-- Active state: bg-primary text-white; Inactive: text-dark --}}
                    <a class="nav-link {{ Route::is('dashboard') ? 'bg-primary text-white' : 'text-dark hover-bg-light' }} rounded-2 px-3 py-2 d-flex align-items-center gap-2" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('users.index') ? 'bg-primary text-white' : 'text-dark hover-bg-light' }} rounded-2 px-3 py-2 d-flex align-items-center gap-2" href="{{ route('users.index') }}">
                        <i class="bi bi-people"></i> User Management
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('event') ? 'bg-primary text-white' : 'text-dark hover-bg-light' }} rounded-2 px-3 py-2 d-flex align-items-center gap-2" href="{{ route('menu.index') }}">
                        <i class="bi bi-calendar-event"></i> Event List
                    </a>
                </li>
            </ul>
        </div>
        
        <div class="mt-auto pt-4">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('profile.edit') ? 'bg-primary text-white' : 'text-dark hover-bg-light' }} rounded-2 px-3 py-2 d-flex align-items-center gap-2" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person-circle"></i> User Profile
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- Magdagdag ng kaunting CSS sa iyong style file para sa hover effect --}}
<style>
    .hover-bg-light:hover {
        background-color: #f8f9fa;
        color: #0d6efd !important;
    }
</style>