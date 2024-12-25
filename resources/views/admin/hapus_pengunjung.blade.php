@extends('layouts.admin.dashboard')

@section('konten')

<h2>Daftar Pengunjung</h2>
<p>Pilih data yang ingin dihapus, lalu klik tombol "Hapus Data Terpilih".</p>

<!-- Notifikasi Sukses -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Tabel Data Pengunjung -->
<form method="POST" action="{{ route('pengunjung.bulkDelete') }}">
    @csrf
    @method('DELETE')

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" id="selectAll"> <!-- Checkbox untuk pilih semua -->
                    </th>
                    <th>Nama Pengunjung</th>
                    <th>Umur</th>
                    <th>Asal</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Kunjungan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengunjungs as $pengunjung)
                    <tr>
                        <td>
                            <input type="checkbox" name="ids[]" value="{{ $pengunjung->id }}">
                        </td>
                        <td>{{ $pengunjung->nama_pengunjung }}</td>
                        <td>{{ $pengunjung->umur }}</td>
                        <td>{{ $pengunjung->asal }}</td>
                        <td>{{ $pengunjung->tgl_lahir }}</td>
                        <td>{{ $pengunjung->jenis_kelamin }}</td>
                        <td>{{ $pengunjung->tgl_kunjungan }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data pengunjung.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="form-group mt-3">
        <button type="submit" class="btn btn-danger" 
            onclick="return confirm('Apakah Anda yakin ingin menghapus data terpilih?')">Hapus Data Terpilih</button>
    </div>
</form>

<!-- Pagination -->
{{ $pengunjungs->links() }}

<!-- JavaScript untuk Pilih Semua -->
<script>
    document.getElementById('selectAll').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('input[name="ids[]"]');
        for (const checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    });
</script>

@endsection