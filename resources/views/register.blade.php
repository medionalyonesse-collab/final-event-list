@extends('layout.main')

@section('content')
<div class="d-flex align-items-center justify-content-center py-5" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-5">
                
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                    <div class="card-body">
                        
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-primary">Create an Account</h2>
                            <p class="text-muted small">Please fill in this form to create an account.</p>
                        </div>

                        @if(session('success'))
                            <div class="alert alert-success border-0 bg-success-subtle text-success small rounded-3 mb-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="/register" method="POST">
                            @csrf 
                            
                            <div class="mb-3">
                                <label for="name" class="form-label small fw-semibold text-secondary">Full Name</label>
                                <input type="text" class="form-control form-control-lg bg-light border-0 shadow-none @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label small fw-semibold text-secondary">Email Address</label>
                                <input type="email" class="form-control form-control-lg bg-light border-0 shadow-none @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label small fw-semibold text-secondary">Phone Number</label>
                                <input type="tel" class="form-control form-control-lg bg-light border-0 shadow-none @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                                @error('phone') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            

                            <div class="mb-3">
                                <label for="password" class="form-label small fw-semibold text-secondary">Password</label>
                                <input type="password" class="form-control form-control-lg bg-light border-0 shadow-none @error('password') is-invalid @enderror" id="password" name="password" required>
                                @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label small fw-semibold text-secondary">Confirm Password</label>
                                <input type="password" class="form-control form-control-lg bg-light border-0 shadow-none" id="password_confirmation" name="password_confirmation" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3 fw-bold rounded-3">
                                SIGN UP
                            </button>
                        </form> 
                        
                        <div class="text-center mt-4">
                            <span class="small text-muted">Already have an account?</span>
                            <a href="{{ route('login') }}" class="text-primary small text-decoration-none fw-bold ms-1">Log in</a>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection