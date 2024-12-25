@extends('admin.dashboard')

@section('konten')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Statistik Data Pengunjung</h1>

    <div class="row">
        <!-- Chart Pengunjung Bulanan -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengunjung Bulanan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Pengunjung Tahunan -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Pengunjung Tahunan</h6>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan Library Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Data untuk Chart Area (Pengunjung Bulanan)
        const ctxArea = document.getElementById('myAreaChart').getContext('2d');
        const myAreaChart = new Chart(ctxArea, {
            type: 'line',
            data: {
                labels: {!! json_encode($bulan) !!}, // Data label (bulan)
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: {!! json_encode($dataBulanan) !!}, // Data pengunjung bulanan
                    backgroundColor: 'rgba(78, 115, 223, 0.05)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        // Data untuk Chart Bar (Pengunjung Tahunan)
        const ctxBar = document.getElementById('myBarChart').getContext('2d');
        const myBarChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: {!! json_encode($tahun) !!}, // Data label (tahun)
                datasets: [{
                    label: 'Jumlah Pengunjung',
                    data: {!! json_encode($dataTahunan) !!}, // Data pengunjung tahunan
                    backgroundColor: 'rgba(54, 185, 204, 0.5)',
                    borderColor: 'rgba(54, 185, 204, 1)',
                    borderWidth: 2,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    });
</script>

@endsection