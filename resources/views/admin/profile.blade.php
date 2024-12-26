@extends('layouts.admin')

@section('title', 'Profile - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>

<!-- Profile Content -->
<div class="row justify-content-center">
    <div class="col-xl-8 col-lg-10">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="text-center mb-4">
                    <img class="img-profile rounded-circle mb-3" src="{{ asset('img/undraw_profile.svg') }}" alt="Profile Picture" style="width: 150px; height: 150px;">
                </div>
                <div class="user-data px-4">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label font-weight-bold">Nama</label>
                        <div class="col-sm-9">
                            <div class="form-control-plaintext">John Doe</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label font-weight-bold">Email</label>
                        <div class="col-sm-9">
                            <div class="form-control-plaintext">johndoe@gmail.com</div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label font-weight-bold">Waktu Akun Dibuat</label>
                        <div class="col-sm-9">
                            <div class="form-control-plaintext">2024-12-25 14:30:00</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection