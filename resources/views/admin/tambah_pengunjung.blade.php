@extends('layouts.admin.dashboard')

@section('konten')

<h2>{{ $judulHalaman }}</h2>
<p>{{ $introText }}</p>

<form method="POST" action="{{ route('pengunjung.store') }}" enctype="multipart/form-data">
    @csrf <!-- Token untuk mencegah CSRF -->

    <div class="form-group">
        <label class="font-weight-bold">Nama Pengunjung</label>
        <input 
            type="text" 
            name="nama_pengunjung" 
            value="{{ old('nama_pengunjung') }}" 
            class="form-control @error('nama_pengunjung') is-invalid @enderror"
        />
        @error('nama_pengunjung')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label class="font-weight-bold">Umur</label>
        <textarea 
            class="form-control @error('umur') is-invalid @enderror" 
            name="umur" 
            rows="5"
        >{{ old('umur') }}</textarea>
        @error('umur')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label class="font-weight-bold">Asal</label>
        <input 
            type="text" 
            name="asal" 
            value="{{ old('asal') }}" 
            class="form-control @error('asal') is-invalid @enderror"
        />
        @error('asal')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label class="font-weight-bold">Tanggal Lahir</label>
        <input 
            type="date" 
            name="tgl_lahir" 
            value="{{ old('tgl_lahir') }}" 
            class="form-control @error('tgl_lahir') is-invalid @enderror"
        />
        @error('tgl_lahir')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label class="font-weight-bold">Jenis Kelamin</label>
        <div>
            <label class="mr-3">
                <input 
                    type="radio" 
                    name="jenis_kelamin" 
                    value="Laki-laki" 
                    {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}
                /> Laki-laki
            </label>
            <label>
                <input 
                    type="radio" 
                    name="jenis_kelamin" 
                    value="Perempuan" 
                    {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}
                /> Perempuan
            </label>
        </div>
        @error('jenis_kelamin')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label class="font-weight-bold">Kewarganegaraan</label>
        <select name="kewarganegaraan" class="form-control @error('kewarganegaraan') is-invalid @enderror">
            <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>WNI</option>
            <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>WNA</option>
        </select>
        @error('kewarganegaraan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label class="font-weight-bold">Tanggal Kunjungan</label>
        <input 
            type="datetime-local" 
            name="tgl_kunjungan" 
            value="{{ old('tgl_kunjungan') }}" 
            class="form-control @error('tgl_kunjungan') is-invalid @enderror"
        />
        @error('tgl_kunjungan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <a href="{{ url()->previous() }}" class="btn btn-warning btn-sm font-weight-bold">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan Data</button>
    </div>
</form>

@endsection