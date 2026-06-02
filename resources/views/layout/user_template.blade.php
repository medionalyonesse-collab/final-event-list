<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1e21 !important;
            color: #ffffff;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .sidebar-panel {
            position: sticky;
            top: 0;
            height: 100vh;
            z-index: 1000;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            
            @include('navbar') 

            {{-- Main content --}}
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4" style="background-color: #f8f9fa; min-height: 100vh;">
                @yield('content')
            </main>

        </div>
    </div>

    <!-- Toast Container (Naka-fixed sa gitna-itaas) -->
    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3" style="z-index: 1100; margin-top: 20px;">
        
        <!-- Success Toast -->
        @if(session('success'))
            <div id="successToast" class="toast align-items-center text-white bg-success border-0 shadow" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body fw-bold d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2 fs-5"></i> {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <!-- Error Toast -->
        @if($errors->any())
            <div id="errorToast" class="toast align-items-center text-white bg-danger border-0 shadow mt-2" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="d-flex">
                    <div class="toast-body fw-bold d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i> {{ $errors->first() }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // I-initialize ang lahat ng toasts sa page
            var toastElList = [].slice.call(document.querySelectorAll('.toast'));
            var toastList = toastElList.map(function (toastEl) {
                return new bootstrap.Toast(toastEl, { delay: 4000 });
            });
            toastList.forEach(toast => toast.show());
        });
    </script>
    
</body>
</html>