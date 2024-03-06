@extends ('layouts.layout')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">
    <div class="row g-3">
        <div class="col-xl-4 col-sm-8 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                                <i class="bi bi-people-fill text-success fs-1 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h2>10</h2>
                                <span class="fs-3">Employees</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-8 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                                <i class="bi bi-person-fill-dash text-warning fs-1 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h2>0</h2>
                                <span class="fs-3">Offboarding</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-8 col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex justify-content-between">
                            <div class="align-self-center">
                                <i class="bi bi-person-fill-x text-danger fs-1 float-left"></i>
                            </div>
                            <div class="media-body text-right">
                                <h2>0</h2>
                                <span class="fs-3">Terminated</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-5">
    <!-- Bar Chart Card -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body d-flex justify-content-center align-content-center">
                <canvas id="barChart" width="400" height="300"></canvas>
            </div>
        </div>
    </div>

    <!-- Donut Chart Card -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-body d-flex justify-content-center align-content-center">
                <canvas id="donutChart" width="400" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Bar Chart
    var ctxBar = document.getElementById('barChart').getContext('2d');
    var barChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4'],
            datasets: [{
                label: 'Bar Chart Example',
                data: [10, 20, 30, 40],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: false // Disable automatic resizing
        }
    });

    // Donut Chart
    var ctxDonut = document.getElementById('donutChart').getContext('2d');
    var donutChart = new Chart(ctxDonut, {
        type: 'doughnut',
        data: {
            labels: ['Label 1', 'Label 2', 'Label 3'],
            datasets: [{
                data: [30, 40, 30],
                backgroundColor: ['rgba(255, 99, 132, 0.8)', 'rgba(54, 162, 235, 0.8)', 'rgba(255, 205, 86, 0.8)'],
                hoverOffset: 4
            }]
        },
        options: {
            responsive: false // Disable automatic resizing
        }
    });
</script>
@endpush


@endsection