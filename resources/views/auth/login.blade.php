<html lang="en"><head>


    <meta charset="utf-8">
    <title>Login page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <?php
    $company = \App\Models\Company_profile::find(1);
    ?>
    <link rel="shortcut icon" href="{{asset('tmp/asset/images')}}/{{$company->logo}}">

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
                                        <a href="#" class="img-circle">
                                            <img src="{{asset('tmp/asset/images')}}/{{$company->logo}}" style="border-radius: 20%;"  width="100px" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-4">SCIVA REPAIR CENTER</h5>

                                        @if (session('berhasil'))
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                                            </button>
                                            <strong>Selamat</strong> {{session('berhasil')}}.
                                        </div>
                                        @endif
                                        @if (session('gagal'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">

                                            </button>
                                            <strong>Maaf</strong> {{session('gagal')}}.
                                        </div>
                                        @endif

                                        <p class="text-muted">Silahkan anda login.</p>
                                    </div>


                                    <form class="form-horizontal mt-4 pt-2" action="/login/input" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username">Username/Telephone</label>
                                            <input type="text" value="{{old('username')}}" class="form-control" name="username" placeholder="Enter username/Telephone">
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Enter password">
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
                            <p>©2021-<script>document.write(new Date().getFullYear())</script> Creadev. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</p>
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
