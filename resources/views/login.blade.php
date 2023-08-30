<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="soft/assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="soft/assets/img/favicon.png">
    <title>
        Sistem Informasi Manajamen Gereja HKI Resort Mangsang
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="soft/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="soft/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="soft/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="soft/assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
    <style>
        body {
            background-image:url({{url('asset/dist/img/1686994.jpg')}});
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Ini mengunci gambar agar tidak bergeser saat di-scroll */
          }
      </style>
</head>

<body class="d-flex align-items-center justify-content-center" style="min-height: 100vh; font-family: open-sans">
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-4">
                <div class="card-body">
                    <h3 class="text-center font-weight-bolder" style="font-family: JetBrains Mono;">Login</h3>
                    <form role="form" method="post" action="/proses_login">
                        @csrf
                        <div class="form-group">
                            <label for="" style="font-size: 15px">Email</label>
                            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" name="email" placeholder="Masukkan Email">
                            @error('email')
                                <small class=text-danger>Email Wajib Diisi</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" style="font-size: 15px">Password</label>
                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" name="password" placeholder="Masukkan Password">
                            @error('password')
                                <small class="text-danger">Password Wajib Diisi</small>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-block form-control"
                                style="background: linear-gradient(to top, #81a6df, #e4e2f3);">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
        <div class="container">


        </div>
        @include('sweetalert::alert')

    </footer>
    <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <!--   Core JS Files   -->
    <script src="soft/assets/js/core/popper.min.js"></script>
    <script src="soft/assets/js/core/bootstrap.min.js"></script>
    <script src="soft/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="soft/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="soft/assets/js/soft-ui-dashboard.min.js?v=1.0.7"></script>
</body>

</html>
