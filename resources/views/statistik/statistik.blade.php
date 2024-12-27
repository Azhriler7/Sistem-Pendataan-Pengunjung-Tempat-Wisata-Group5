@extends('dashboard')

@section('title', 'Statistik Pengunjung - Sistem Pendataan Pengunjung')

@section('main-content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Statistik Data Pengunjung</h1>
</div>

<div class="row">
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
            <a class="dropdown-item" href="#" onclick="downloadChart('myAreaChart', 'pengunjung-bulanan.png')">
              <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>Download PNG
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="chart-area" style="height: 300px;">
          <canvas id="myAreaChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-6 col-lg-6">
    <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Pengunjung Tahunan</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="yearlyDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="yearlyDropdown">
            <div class="dropdown-header">Export Options:</div>
            <a class="dropdown-item" href="#" onclick="downloadChart('myBarChart', 'pengunjung-tahunan.png')">
              <i class="fas fa-download fa-sm fa-fw mr-2 text-gray-400"></i>Download PNG
            </a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="chart-bar" style="height: 300px;">
          <canvas id="myBarChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Utility function for chart download (placeholder, needs implementation)
    window.downloadChart = function(chartId, filename) {
      // Implement chart image capture and download logic here
      const canvas = document.getElementById(chartId);
      html2canvas(canvas).
    };

    // Common chart options
    const commonOptions = {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'top',
          labels: {
            usePointStyle: true,
            padding: 20
          }
        },
        tooltip: {
          mode: 'index',
          intersect: false,
          backgroundColor: 'rgba(255, 255, 255, 0.9)',
          titleColor: '#6e707e',
          bodyColor: '#6e707e',
          borderColor: '#dddfeb',
          borderWidth: 1,
          padding: 15,
          displayColors: false
        }
      }
    };

    // Monthly Visitors Chart
    const ctxArea = document.getElementById('myAreaChart').getContext('2d');
    const monthlyData = @json($dataBulanan); 
    const monthLabels = @json($bulan); 

    new Chart(ctxArea, {
      type: 'line',
      data: {
        labels: monthLabels,
        datasets: [{
          label: 'Jumlah Pengunjung',
          data: monthlyData,
          fill: true,
          backgroundColor: 'rgba(78, 115, 223, 0.1)',
          borderColor: 'rgba(78, 115, 223, 1)',
          borderWidth: 2,
          pointRadius: 3,
          pointBackgroundColor: 'rgba(78, 115, 223, 1)',
          pointBorderColor: '#fff',
          pointHoverRadius: 5,
          pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
          pointHoverBorderColor: '#fff',
          tension: 0.4
        }]
      },
      options: {
        ...commonOptions,
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              drawBorder: false
            },
            ticks: {
              callback: function(value) {
                return value.toLocaleString('id-ID');
              }
            }
          },
          x: {
            grid: {
              display: false
            }
          }
        }
      }
    });

    // Yearly Visitors Chart
    const ctxBar = document.getElementById('myBarChart').getContext('2d');
    const yearlyData = @json($dataTahunan); 
    const yearLabels = @json($tahun); 

    new Chart(ctxBar, {
      type: 'bar',
      data: {
        labels: yearLabels,
        datasets: [{
          label: 'Jumlah Pengunjung',
          data: yearlyData,
          backgroundColor: 'rgba(54, 185, 204, 0.8)',
          borderColor: 'rgba(54, 185, 204, 1)',
          borderWidth: 1,
          borderRadius: 5,
          barThickness: 30,
          maxBarThickness: 40
        }]
      },
      options: {
        ...commonOptions,
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              drawBorder: false
            },
            ticks: {
              callback: function(value) {
                return value.toLocaleString('id-ID');
              }
            }
          },
          x: {
            grid: {
              display: false
            }
          }
        }
      }
    });
  });
</script>
@endpush