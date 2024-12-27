@extends('dashboard')

@section('title', 'Tambah Pengunjung - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Pengunjung</h1>
</div>

<!-- Registration Form -->
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{ route('pengunjung.store') }}">
            @csrf

            <div class="form-group">
                <label class="font-weight-bold">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}" 
                    class="form-control @error('nama') is-invalid @enderror"/>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Usia</label>
                <input type="number" name="usia" value="{{ old('usia') }}"
                    class="form-control @error('usia') is-invalid @enderror"/>
                @error('usia')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Asal</label>
                <input type="text" name="asal" value="{{ old('asal') }}"
                    class="form-control @error('asal') is-invalid @enderror"/>
                @error('asal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan') }}"
                    class="form-control @error('kewarganegaraan') is-invalid @enderror"/>
                @error('kewarganegaraan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Tanggal Berkunjung</label>
                <input type="date" name="tanggal_berkunjung" value="{{ old('tanggal_berkunjung') }}"
                    class="form-control @error('tanggal_berkunjung') is-invalid @enderror"/>
                @error('tanggal_berkunjung')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection