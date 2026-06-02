<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WICK - Admin Dashboard</title>
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

    <!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WICK - Admin Dashboard</title>
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

```
<div class="container-fluid">
    <div class="row">
        
        @include('navbar') 

        {{-- Ito ang main container ng iyong content --}}
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4" style="background-color: #f8f9fa; min-height: 100vh;">
            @yield('content')
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- SUCCESS TOAST -->
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100;">
    @if(session('success'))
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body fw-bold">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>

                <button type="button"
                        class="btn-close btn-close-white me-2 m-auto"
                        data-bs-dismiss="toast"
                        aria-label="Close">
                </button>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var toastEl = document.getElementById('successToast');

                var toast = new bootstrap.Toast(toastEl, {
                    delay: 3000,
                    autohide: true
                });

                toast.show();
            });
        </script>
    @endif
</div>
```

</body>
</html>

    
</body>
</html>