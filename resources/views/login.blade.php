@extends('layout.main')

@section('content')
<div class="d-flex align-items-center justify-content-center py-5" style="min-height: 100vh; background-color: #f8f9fa;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-4">
                
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">
                    <div class="card-body">
                        
                        <div class="text-center mb-4">
                            <h2 class="fw-bold text-primary">Log In</h2>
                            <p class="text-muted small">Please enter your details to sign in.</p>
                        </div>

                        <form action="/login" method="POST">
                            @csrf 
                            
                            <div class="mb-3">
                                <label for="email" class="form-label small fw-semibold text-secondary">Email Address</label>
                                <input type="email" class="form-control form-control-lg bg-light border-0 shadow-none @error('email') is-invalid @enderror" id="email" name="email" required>
                                @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <label for="password" class="form-label small fw-semibold text-secondary mb-0">Password</label>
                                </div>
                                <input type="password" class="form-control form-control-lg bg-light border-0 shadow-none" id="password" name="password" required>
                            </div>

                            
                            <button type="submit" class="btn btn-primary btn-lg w-100 py-3 fw-bold rounded-3">
                                LOG IN
                            </button>
                        </form>

                        <div class="text-center mt-4">
                            <span class="small text-muted">Don't have an account?</span>
                            <a href="{{ route('register') }}" class="text-primary small text-decoration-none fw-bold ms-1">Sign up</a>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection