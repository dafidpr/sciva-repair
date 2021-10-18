<html lang="en"><head>


    <meta charset="utf-8">
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('tmp/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('tmp/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('tmp/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">


</head>


<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">

                <div class="home-btn"><a href="/" class="text-white router-link-active"><i class="fas fa-home h2"></i></a></div>


                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <a href="index.html">
                                            <img src="{{asset('tmp/assets/images/logo-dark.png')}}" height="22" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-4">SCIVA REPAIR CENTER</h5>
                                        <p class="text-muted">Silahkan anda login.</p>
                                    </div>


                                    <form class="form-horizontal mt-4 pt-2" action="/dashboard">

                                        <div class="mb-3">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" placeholder="Enter username">
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                        </div>

                                        <div>
                                            <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
                                        </div>

                                        {{-- <div class="mt-4 text-center">
                                            <a href="/" class="text-muted"><i class="mdi mdi-lock me-1"></i> Kembali ke Homepage</a>
                                        </div> --}}


                                    </form>


                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p><a href="/" class="fw-bold text-white"> Kembali ke Homepage</a> </p>
                            <p>© <script>document.write(new Date().getFullYear())</script>2021 Morvin. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('tmp/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('tmp/assets/js/app.js')}}"></script>



</body></html>
