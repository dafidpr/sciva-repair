<html lang="en">
<head>


    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('tmp/assets/images/favicon.ico')}}">

    <!-- plugin css -->
    <link href="{{asset('tmp/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">

    <!-- Bootstrap Css -->
    <link href="{{asset('tmp/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{asset('tmp/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{asset('tmp/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">

    {{-- sweet alert --}}
    <link href="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">


            <!-- DataTables -->
            <link href="{{asset('tmp/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('tmp/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

            <!-- Responsive datatable examples -->
            <link href="{{asset('tmp/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
            <!-- Responsive datatable examples -->
            <link href="{{asset('tmp/assets/libs/chart.js/Chart.min.css')}}" rel="stylesheet" type="text/css">

</head>


<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                       <!-- LOGO -->
                 <div class="navbar-brand-box">
                    <a href="" class="logo logo-dark mt-4">
                        <span class="logo-sm">
                            <img src="{{asset('tmp/assets/images/logo-sm.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('tmp/assets/images/logo-dark.png')}}" alt="" height="20">
                        </span>
                    </a>

                    <a href="" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset('tmp/assets/images/logo-sm.png')}}" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset('tmp/assets/images/logo-light.png')}}" alt="" height="20">
                        </span>
                    </a>
                </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>

                </div>


                <div class="d-flex">

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{asset('tmp/assets/images/users/avatar-7.jpg')}}" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1">James</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            {{-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a> --}}
                            <a class="dropdown-item d-block" href="/admin/admin/ubahpassword"><span class="badge badge-success float-end">11</span><i class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i> Ubah Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="#"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                        </div>

                    </div>

                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu mm-active">

            <div data-simplebar="init" class="h-100 mm-show">
                <div class="simplebar-wrapper" style="margin: 0px;">
                    <div class="simplebar-height-auto-observer-wrapper">
                        <div class="simplebar-height-auto-observer"></div>
                    </div>
                    <div class="simplebar-mask">
                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                            <div class="simplebar-content-wrapper" style="height: auto; overflow: hidden;">
                                <div class="simplebar-content" style="padding: 0px;">


                <div class="user-sidebar text-center">
                    <div class="dropdown">
                        <div class="user-img">
                            <img src="{{asset('tmp/assets/images/users/avatar-7.jpg')}}" alt="" class="rounded-circle">
                            <span class="avatar-online bg-success"></span>
                        </div>
                        <div class="user-info">
                            <h5 class="mt-3 font-size-16 text-white">James Raphael</h5>
                            <span class="font-size-13 text-white-50">Administrator</span>
                        </div>
                    </div>
                </div>



                <!--- Sidemenu -->
                <div id="sidebar-menu" class="mm-active">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled mm-show" id="side-menu">
                        <li class="menu-title">Menu</li>

                        <li class="">
                            <a href="/admin/dashboard" class="waves-effect">
                                <i class="dripicons-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="/admin/servis" class=" waves-effect">
                                <i class="fas fa-hammer"></i>
                                <span>Servis</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-cart"></i>
                                <span>Transaksi</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="/admin/entry_penjualan">Enty Penjualan</a></li>
                                <li><a href="/admin/daftar_penjualan">Daftar Penjualan</a></li>
                                <li><a href="/admin/entry_pembelian">Entry Pembelian</a></li>
                                <li><a href="/admin/daftar_pembelian">Daftar Pembelian</a></li>
                                <li><a href="/admin/hutang">Hutang</a></li>
                                <li><a href="/admin/piutang">Piutang</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-desktop"></i>
                                <span>Data Master</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="/admin/barang">Data Barang</a></li>
                                <li><a href="/admin/jasa">Data Jasa</a></li>
                                <li><a href="/admin/supplier">Data Supplier</a></li>
                                <li><a href="/admin/pelanggan">Data Pelanggan</a></li>
                                <li><a href="/admin/karyawan">Data Karyawan</a></li>
                                <li><a href="/admin/stokopname">Stok Opname</a></li>
                                <li><a href="/admin/stok_in_out">Stok In/Out</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-money-bill-alt"></i>
                                <span>Keuangan</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="/admin/kas">Kas</a></li>
                                <li><a href="/admin/ppn">PPN</a></li>
                                <li><a href="/admin/bank">Bank</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-file-alt"></i>
                                <span>Laporan</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="/admin/lap_jurnalharian">Jurnal harian</a></li>
                                <li><a href="/admin/lap_penjualan">Penjualan</a></li>
                                <li><a href="/admin/lap_pembelian">Pembelian</a></li>
                                <li><a href="/admin/lap_stokopname">Stok Opname</a></li>
                                <li><a href="/admin/lap_stok_in_out">Stok In/Out</a></li>
                                <li><a href="/admin/lap_kas">Kas</a></li>
                                <li><a href="/admin/lap_kasbank">Kas Bank</a></li>
                                <li><a href="/admin/lap_hutangpiutang">Hutang Piutang</a></li>
                                <li><a href="/admin/lap_labarugi">Laba Rugi</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="/admin/grafik" class=" waves-effect">
                                <i class="far fa-chart-bar"></i>
                                <span>Grafik</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-tools"></i>
                                <span>Tools</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="/admin/generatebarcode">Generate Barcode</a></li>
                                <li><a href="/admin/backupdata">Backup Data</a></li>
                                <li><a href="/admin/del_dataservis">Hapus Servis</a></li>
                                <li><a href="/admin/del_transaksi">Hapus Transaksi</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/admin/komisi" class=" waves-effect">
                                <i class="dripicons-flag"></i>
                                <span>Komisi Karyawan</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-toggles"></i>
                                <span>Setting</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                <li><a href="/admin/footer_nota">Footer Nota</a></li>
                                <li><a href="/admin/format_sms">Format SMS</a></li>
                                <li><a href="/admin/format_WA">Format WA</a></li>
                                <li><a href="/admin/bataspengambilan">Batas Ambil Servis</a></li>
                                <li><a href="/admin/profil">Profil Toko</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- Sidebar -->
            </div></div></div></div><div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: hidden;"><div class="simplebar-scrollbar" style="height: 354px; transform: translate3d(0px, 0px, 0px); display: none;"></div></div></div>
        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">

                <!-- start page title -->
                <div class="page-title-box">
                    <div class="container-fluid">
                     <div class="row align-items-center">
                         <div class="col-sm-6">
                             <div class="page-title">
                                 <h4>@yield('title')</h4>
                                     <ol class="breadcrumb m-0">
                                         <li class="breadcrumb-item"><a href="javascript: void(0);">@yield('title')</a></li>
                                         <li class="breadcrumb-item active">@yield('title')</li>
                                     </ol>
                             </div>
                         </div>
                     </div>
                    </div>
                 </div>
                 <!-- end page title -->


                <div class="container-fluid">

                    <div class="page-content-wrapper">
                        @yield('content')
                    </section>


                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Morvin.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar="init" class="h-100"><div class="simplebar-wrapper" style="margin: 0px;"><div class="simplebar-height-auto-observer-wrapper"><div class="simplebar-height-auto-observer"></div></div><div class="simplebar-mask"><div class="simplebar-offset" style="right: -17px; bottom: 0px;"><div class="simplebar-content-wrapper" style="height: 100%; overflow: hidden scroll;"><div class="simplebar-content" style="padding: 0px;">
            <div class="rightbar-title d-flex align-items-center px-3 py-4">

                <h5 class="m-0 me-2">Settings</h5>

                <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
            </div>

            <!-- Settings -->
            <hr class="mt-0">
            <h6 class="text-center mb-0">Choose Layouts</h6>

        </div></div></div></div><div class="simplebar-placeholder" style="width: auto; height: 850px;"></div></div><div class="simplebar-track simplebar-horizontal" style="visibility: hidden;"><div class="simplebar-scrollbar" style="transform: translate3d(0px, 0px, 0px); display: none;"></div></div><div class="simplebar-track simplebar-vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="height: 395px; transform: translate3d(0px, 0px, 0px); display: block;"></div></div></div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{asset('tmp/assets/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/node-waves/waves.min.js')}}"></script>

    {{-- <script src="{{asset('tmp/assets/js/pages/dashboard.init.js')}}"></script> --}}

    {{-- datatables --}}
    <script src="{{asset('tmp/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('tmp/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('tmp/dataTables/dashboard_admin.js')}}"></script>

    <script src="{{asset('tmp/assets/libs/chart.js/Chart.min.js')}}"></script>

    <script src="{{asset('tmp/chart/dashboard_admin.js')}}"></script>


    <script src="{{asset('tmp/assets/js/app.js')}}"></script>



<svg id="SvgjsSvg1294" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1295"></defs><polyline id="SvgjsPolyline1296" points="0,0"></polyline><path id="SvgjsPath1297" d="M-1 80L-1 80C-1 80 29.11111111111111 80 29.11111111111111 80C29.11111111111111 80 58.22222222222222 80 58.22222222222222 80C58.22222222222222 80 87.33333333333333 80 87.33333333333333 80C87.33333333333333 80 116.44444444444444 80 116.44444444444444 80C116.44444444444444 80 145.55555555555554 80 145.55555555555554 80C145.55555555555554 80 174.66666666666666 80 174.66666666666666 80C174.66666666666666 80 203.77777777777777 80 203.77777777777777 80C203.77777777777777 80 232.88888888888889 80 232.88888888888889 80C232.88888888888889 80 262 80 262 80C262 80 262 80 262 80 "></path></svg></body></html>
