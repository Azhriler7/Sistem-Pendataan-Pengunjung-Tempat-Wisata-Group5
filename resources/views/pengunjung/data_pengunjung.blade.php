@extends('dashboard')

@section('title', 'Data Pengunjung - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Daftar Pengunjung</h1>
    <a href="{{ route('pengunjung.create') }}" class="btn btn-primary">Tambah Pengunjung</a>
</div>

<!-- Data Table -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table id="pengunjungTable" class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Usia</th>
                        <th>Asal</th>
                        <th>Kewarganegaraan</th>
                        <th>Tanggal Berkunjung</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pengunjungs as $key => $pengunjung)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $pengunjung->nama }}</td>
                            <td>{{ $pengunjung->usia }}</td>
                            <td>{{ $pengunjung->asal }}</td>
                            <td>{{ $pengunjung->kewarganegaraan }}</td>
                            <td>{{ $pengunjung->tanggal_berkunjung }}</td>
                            <td>
                                <a href="{{ route('pengunjung.edit', $pengunjung->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pengunjung.destroy', $pengunjung->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada data pengunjung</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection