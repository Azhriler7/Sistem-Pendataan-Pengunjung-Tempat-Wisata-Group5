@extends('dashboard')

@section('title', 'Profile - Sistem Pendataan Pengunjung')

@section('main-content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
</div>

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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection