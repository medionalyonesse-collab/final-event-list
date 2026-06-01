@extends('layout.user_template')

@section('content')
<div class="pt-4 pb-2 mb-4">
    <h1 class="h3 fw-bold text-dark mb-1">System Overview</h1>
    <p class="text-muted small">Welcome back! Here is the latest update on your platform.</p>
</div>

<div class="row g-4 mb-4">
    <div class="col-12 col-md-6">
        <div class="card border-0 shadow-sm rounded-3 py-3 px-4 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-2">Number of Users</h6>
                    <h2 class="fw-bold m-0 text-dark">{{ number_format($totalUsers) }}</h2>
                </div>
                <div class="bg-light p-3 rounded-3 border">
                    <i class="bi bi-people-fill text-secondary fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-6">
        <div class="card border-0 shadow-sm rounded-3 py-3 px-4 bg-white">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h6 class="text-muted small fw-bold text-uppercase mb-2">Total Menu Records</h6>
                    <h2 class="fw-bold m-0 text-dark">{{ number_format($totalMenus) }}</h2>
                </div>
                <div class="bg-light p-3 rounded-3 border">
                    <i class="bi bi-journal-text text-secondary fs-4"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <div class="col-12 col-lg-7">
        <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100">
            <h6 class="fw-bold text-dark mb-4">User Registration Growth</h6>
            <div style="height: 300px;">
                <canvas id="growthChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-5">
        <div class="card border-0 shadow-sm rounded-3 p-4 bg-white h-100">
            <h6 class="fw-bold text-dark mb-4">Orders Summary Breakdown</h6>
            <div style="height: 300px;">
                <canvas id="breakdownChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // 1. Growth Line Chart
        const growthCtx = document.getElementById('growthChart').getContext('2d');
        new Chart(growthCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Active Users',
                    data: [2000, 4500, 6000, 8500, 10000, {{ $totalUsers }}],
                    fill: true,
                    backgroundColor: 'rgba(13, 110, 253, 0.05)',
                    borderColor: '#0d6efd',
                    tension: 0.3,
                    borderWidth: 3,
                    pointRadius: 4,
                    pointBackgroundColor: '#0d6efd'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false } },
                scales: {
                    y: { beginAtZero: true, grid: { drawBorder: false, color: '#f0f0f0' } },
                    x: { grid: { display: false } }
                }
            }
        });

        // 2. Breakdown Doughnut Chart
        const breakdownCtx = document.getElementById('breakdownChart').getContext('2d');
        new Chart(breakdownCtx, {
            type: 'doughnut',
            data: {
                labels: ['Active Orders', 'Cancelled'],
                datasets: [{
                    data: [{{ $activeOrders }}, {{ $cancelledOrders }}],
                    backgroundColor: ['#0d6efd', '#dc3545'],
                    hoverOffset: 4,
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: { padding: 20, usePointStyle: true }
                    }
                },
                cutout: '70%'
            }
        });
    });
</script>

<style>
    /* Light Theme Adjustment */
    body {
        background-color: #f4f7f6; /* Soft gray background para lumutang ang white cards */
    }
    .card {
        transition: transform 0.2s ease;
    }
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endsection