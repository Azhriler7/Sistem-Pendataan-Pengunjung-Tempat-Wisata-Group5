@extends('dashboard')

@section('title', 'Edit Pengunjung - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pengunjung Wisata</h1>
</div>

<!-- Intro Text -->
<div class="card shadow mb-4">
    <div class="card-body">
        <p class="mb-0">Berikut adalah data pengunjung wisata di tempat ini.</p>
    </div>
</div>

<!-- Edit Form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('data-pengunjung.update', $detailPengunjung->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Nama Pengunjung</label>
                        <input type="text" name="nama_pengunjung" value="{{ old('nama_pengunjung', $detailPengunjung->nama_pengunjung) }}" class="form-control @error('nama_pengunjung') is-invalid @enderror"/>
                        @error('nama_pengunjung')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Umur</label>
                        <input type="text" name="umur" value="{{ old('umur', $detailPengunjung->umur) }}" class="form-control @error('umur') is-invalid @enderror"/>
                        @error('umur')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Asal</label>
                        <input type="text" name="asal" value="{{ old('asal', $detailPengunjung->asal) }}" class="form-control @error('asal') is-invalid @enderror"/>
                        @error('asal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" value="{{ old('tgl_lahir', $detailPengunjung->tgl_lahir) }}" class="form-control @error('tgl_lahir') is-invalid @enderror"/>
                        @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                            <option value="Laki-laki" {{ old('jenis_kelamin', $detailPengunjung->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $detailPengunjung->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Kewarganegaraan</label>
                        <select name="kewarganegaraan" class="form-control @error('kewarganegaraan') is-invalid @enderror">
                            <option value="Indonesia" {{ old('kewarganegaraan', $detailPengunjung->kewarganegaraan) == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
                            <option value="Asing" {{ old('kewarganegaraan', $detailPengunjung->kewarganegaraan) == 'Asing' ? 'selected' : '' }}>Asing</option>
                        </select>
                        @error('kewarganegaraan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Tanggal Kunjungan</label>
                        <input type="date" name="tgl_kunjungan" value="{{ old('tgl_kunjungan', $detailPengunjung->tgl_kunjungan) }}" class="form-control @error('tgl_kunjungan') is-invalid @enderror"/>
                        @error('tgl_kunjungan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-group text-right mb-0">
                <a href="{{ url()->previous() }}" class="btn btn-warning">
                    <i class="fas fa-arrow-left mr-1"></i> Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save mr-1"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection