@extends('dashboard')

@section('title', 'Profile - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>

<<<<<<< HEAD
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
=======
    <title>Profile</title>

    <!-- Custom fonts for this template -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">

</head>

<body id="bg-gradient-primary">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <a id="backButton" href="{{ route('dashboard') }}" class="btn btn-link rounded-circle mr-3 d-flex align-items-center" style="position: absolute; top: 0; left: 0; margin: 10px;">
                     <i class="fa fa-arrow-left" aria-hidden="true" style="margin-right: 5px;"></i>
                    Back
                </a>

                </nav>
                <!-- End of Topbar -->

                <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="p-5">
                    <div class="text-center">
                        <!-- Circular Image -->
                        <h1 class="h4 text-gray-900 mb-4">Profile</h1>
                    </div>
                    <div class="user-data">
                        <div class="form-group">
                            <label class="registerLabel">Nama</label>
                            <div class="data-box">
                                <p>{{ $admin->nama_lengkap ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="registerLabel">Email</label>
                            <div class="data-box">
                                <p>{{ $admin->gmail ?? 'N/A' }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="registerLabel">Waktu Akun Dibuat</label>
                            <div class="data-box">
                                <p>{{ $admin->tanggal_akun_dibuat ?? 'N/A' }}</p>
                            </div>
>>>>>>> 34ee5374112fe1f42bc7ec654277aff8f05252cc
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection