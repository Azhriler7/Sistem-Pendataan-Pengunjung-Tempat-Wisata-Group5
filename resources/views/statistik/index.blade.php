@extends('dashboard')

@section('title', 'Statistik Pengunjung - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Statistik Data Pengunjung</h1>
</div>

<div class="row">
    <!-- Daily Visitors Chart -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pengunjung Harian</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dailyDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dailyDropdown">
                        <div class="dropdown-header">Export Options:</div>
                        <a class="dropdown-item" href="#" onclick="downloadChart('dailyChart', 'pengunjung-harian.png')">
                            <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>Download PNG
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area" style="height: 300px;">
                    <canvas id="dailyChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Monthly Visitors Chart -->
    <div class="col-xl-6 col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Pengunjung Bulanan</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="monthlyDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="monthlyDropdown">
                        <div class="dropdown-header">Export Options:</div>
                        <a class="dropdown-item" href="#" onclick="downloadChart('monthlyChart', 'pengunjung-bulanan.png')">
                            <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>Download PNG
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="chart-area" style="height: 300px;">
                    <canvas id="monthlyChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hidden elements to store chart data -->
<div id="tanggal-data" style="display: none;">{!! json_encode($pengunjungPerHari->pluck('tanggal')) !!}</div>
<div id="jumlah-data" style="display: none;">{!! json_encode($pengunjungPerHari->pluck('jumlah')) !!}</div>
<div id="bulan-data" style="display: none;">{!! json_encode($pengunjungPerBulan->pluck('bulan')) !!}</div>
<div id="jumlah-bulan-data" style="display: none;">{!! json_encode($pengunjungPerBulan->pluck('jumlah')) !!}</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('js/chart.js') }}"></script>
@endsection