@extends('layouts.app')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="card-body chartContainer">
                        <canvas id="myChart" style="width: 400px;"></canvas>

                        <script>
                            const ctx = document.getElementById('myChart');
                            const myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: {!! json_encode($labels) !!},
                                    datasets: [{
                                        label: 'Moisture Level (%)',
                                        data: {!! json_encode($data) !!},
                                        borderColor: 'rgba(75, 192, 192, 1)',
                                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                        borderWidth: 2,
                                        fill: true,
                                        tension: 0.4
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            title: {
                                                display: true,
                                                text: 'Moisture Level (%)'
                                            }
                                        },
                                        x: {
                                            title: {
                                                display: true,
                                                text: 'Time'
                                            }
                                        }
                                    }
                                }
                            });

                            function fetchDashData() {
                                fetch('/chart-data')
                                    .then(response => response.json())
                                    .then(data => {
                                        myChart.data.labels = data.labels;
                                        myChart.data.datasets[0].data = data.data;
                                        myChart.update();
                                    })
                                    .catch(error => console.error('Error fetching chart data:', error));
                            }

                            setInterval(fetchDashData, 5000);
                        </script>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
