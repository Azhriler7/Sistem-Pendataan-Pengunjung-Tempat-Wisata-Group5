@extends('admin.dashboard')

@section('konten')

<h2>Daftar Pengunjung</h2>

<div class="table-responsive">
    <table id="pengunjungTable" class="table table-striped table-bordered">
        <thead class="thead-dark">
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
                        <a href="{{ route('pengunjung.edit', $pengunjung->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pengunjung.destroy', $pengunjung->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">Tidak ada data pengunjung.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Tambahkan CSS dan JS DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#pengunjungTable').DataTable({
            dom: 'lBfrtip',
            buttons: ['excel', 'csv', 'pdf'],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                paginate: {
                    first: "Awal",
                    last: "Akhir",
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });
</script>

@endsection