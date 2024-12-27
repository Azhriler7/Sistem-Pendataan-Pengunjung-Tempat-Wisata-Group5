@extends('dashboard')

@section('title', 'Data Pengunjung - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pengunjung</h1>
</div>

<!-- Filters -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="filterKewarganegaraan" class="font-weight-bold">Filter Kewarganegaraan</label>
                <select id="filterKewarganegaraan" class="form-control">
                    <option value="">Semua</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Asing">Asing</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="filterJenisKelamin" class="font-weight-bold">Filter Jenis Kelamin</label>
                <select id="filterJenisKelamin" class="form-control">
                    <option value="">Semua</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- Data Table -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="pengunjungTable" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pengunjung</th>
                        <th>Umur</th>
                        <th>Asal</th>
                        <th>Tanggal Lahir</th>
                        <th>Jenis Kelamin</th>
                        <th>Kewarganegaraan</th>
                        <th>Tanggal Kunjungan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
    @forelse ($pengunjungData as $key => $pengunjung)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $pengunjung->nama_pengunjung }}</td>
            <td>{{ $pengunjung->umur }}</td>
            <td>{{ $pengunjung->asal }}</td>
            <td>{{ $pengunjung->tgl_lahir }}</td>
            <td>{{ $pengunjung->jenis_kelamin }}</td>
            <td>{{ $pengunjung->kewarganegaraan }}</td>
            <td>{{ $pengunjung->tgl_kunjungan }}</td>
            <td>
                <a href="{{ route('pengunjung.edit', $pengunjung->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('data-pengunjung.destroy', $pengunjung->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="9">No data available</td>
        </tr>
    @endforelse
</tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('styles')
<!-- Custom styles for DataTables -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap4.min.css" rel="stylesheet">
@endpush

@push('scripts')
<!-- DataTables Core -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<!-- DataTables Export Buttons -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

<script>
$(document).ready(function() {
    var table = $('#pengunjungTable').DataTable({
        dom: '<"d-flex justify-content-between align-items-center mb-4"Bf>rt<"d-flex justify-content-between align-items-center"lip>',
        buttons: [
            {
                extend: 'excel',
                className: 'btn btn-success btn-sm',
                text: '<i class="fas fa-file-excel"></i> Excel'
            },
            {
                extend: 'csv',
                className: 'btn btn-info btn-sm',
                text: '<i class="fas fa-file-csv"></i> CSV'
            },
            {
                extend: 'pdf',
                className: 'btn btn-danger btn-sm',
                text: '<i class="fas fa-file-pdf"></i> PDF'
            }
        ],
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
            paginate: {
                first: "Awal",
                last: "Akhir",
                next: "Berikutnya",
                previous: "Sebelumnya"
            },
            emptyTable: "Tidak ada data pengunjung."
        },
        pageLength: 10,
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Semua"]]
    });

    $('#filterKewarganegaraan').on('change', function() {
        table.column(6).search(this.value).draw();
    });

    $('#filterJenisKelamin').on('change', function() {
        table.column(5).search(this.value).draw();
    });
});
</script>
@endpush