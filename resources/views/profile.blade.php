<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

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
                    <a id="backButton" href="dashboard" class="btn btn-link rounded-circle mr-3 d-flex align-items-center" style="position: absolute; top: 0; left: 0; margin: 10px;">
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
                                <p>John Doe</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="registerLabel">Email</label>
                            <div class="data-box">
                                <p>johndoe@gmail.com</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="registerLabel">Waktu Akun Dibuat</label>
                            <div class="data-box">
                                <p>2024-12-25 14:30:00</p>
                            </div>
                        </div>
                    </div>
                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

            </div>
            <!-- End of Main Content -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>