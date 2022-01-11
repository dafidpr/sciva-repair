<html lang="en">
<head>


    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin &amp; Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <?php
    $company = \App\Models\Company_profile::where('id', 1)->first();
    // dd($company->logo);
    ?>
    <link rel="shortcut icon" href="{{asset('tmp/asset/images')}}/{{$company->logo}}">

    <link href="{{asset('tmp/assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('tmp/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet">
    <!-- plugin css -->
    <link href="{{asset('tmp/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">

    <div id="dark">

        <!-- Bootstrap Css -->
        <link href="{{asset('tmp/assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
        <!-- App Css-->
        <link href="{{asset('tmp/assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
    </div>
    <!-- Icons Css -->
    <link href="{{asset('tmp/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">

    {{-- sweet alert --}}
    <link href="{{asset('tmp/assets/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css">


            <!-- DataTables -->
            <link href="{{asset('tmp/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
            <link href="{{asset('tmp/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">

            <!-- Responsive datatable examples -->
            <link href="{{asset('tmp/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css">
            <!-- Responsive datatable examples -->
            <link href="{{asset('tmp/assets/libs/chart.js/Chart.min.css')}}" rel="stylesheet" type="text/css">
            {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" /> --}}

            <style type="text/css">
                .preloader {
                  position: fixed;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  z-index: 9999;
                  background-color: #fff;
                }
                .preloader .loading {
                  position: absolute;
                  left: 50%;
                  top: 50%;
                  transform: translate(-50%,-50%);
                  font: 14px arial;
                }
            </style>

</head>


<body>

    {{-- pre-load --}}
    <div class="preloader" style="background-color: #202039;">
        <div class="loading">
            <div class="loadingio-spinner-gear-xv93dvjgkml"><div class="ldio-a1o5dj6l1qi">
                <div><div></div><div></div><div></div><div></div><div></div><div></div></div>
                </div></div>
                <style type="text/css">
                @keyframes ldio-a1o5dj6l1qi {
                    0% { transform: rotate(0deg) }
                   50% { transform: rotate(22.5deg) }
                  100% { transform: rotate(45deg) }
                }
                .ldio-a1o5dj6l1qi > div {
                  transform-origin: 100px 100px;
                  animation: ldio-a1o5dj6l1qi 0.2s infinite linear;
                }
                .ldio-a1o5dj6l1qi > div div {
                    position: absolute;
                    width: 22px;
                    height: 152px;
                    background: #fafafa;
                    left: 100px;
                    top: 100px;
                    transform: translate(-50%,-50%);
                }
                .ldio-a1o5dj6l1qi > div div:nth-child(1) {
                    width: 120px;
                    height: 120px;
                    border-radius: 50%;
                }
                .ldio-a1o5dj6l1qi > div div:nth-child(6) {
                    width: 80px;
                    height: 80px;
                    background: #ffffff;
                    border-radius: 50%;
                }.ldio-a1o5dj6l1qi > div div:nth-child(3) {
                  transform: translate(-50%,-50%) rotate(45deg)
                }.ldio-a1o5dj6l1qi > div div:nth-child(4) {
                  transform: translate(-50%,-50%) rotate(90deg)
                }.ldio-a1o5dj6l1qi > div div:nth-child(5) {
                  transform: translate(-50%,-50%) rotate(135deg)
                }
                .loadingio-spinner-gear-xv93dvjgkml {
                  width: 200px;
                  height: 200px;
                  display: inline-block;
                  overflow: hidden;
                  background: none;
                }
                .ldio-a1o5dj6l1qi {
                  width: 100%;
                  height: 100%;
                  position: relative;
                  transform: translateZ(0) scale(1);
                  backface-visibility: hidden;
                  transform-origin: 0 0; /* see note above */
                }
                .ldio-a1o5dj6l1qi div { box-sizing: content-box; }
                /* generated by https://loading.io/ */
                </style>
        </div>
    </div>
    {{-- End pre load --}}





      <!-- Begin page -->
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                       <!-- LOGO -->
                 <div class="navbar-brand-box">
                    <a href="" class="logo logo-dark mt-4">
                        <span class="logo-sm">
                            <h4>SCIVA</h4>
                        </span>
                        <span class="logo-lg">
                            <H4>SCIVA REPAIRE</H4>
                        </span>
                    </a>

                    <a href="" class="logo logo-light mt-4">
                        <span class="logo-sm">
                            <h4>SCIVA</h4>
                        </span>
                        <span class="logo-lg">
                            <h4>SCIVA REPAIRE</h4>
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
                            <img class="rounded-circle header-profile-user" src="{{asset('tmp/assets/images/users/img.jpg')}}" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1" style="text-transform: capitalize;">{{Auth::guard('web')->user()->name}}</span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            {{-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a> --}}
                            <a class="dropdown-item d-block" href="/admin/ubahpassword"><span class="badge badge-success float-end">11</span><i class="mdi mdi-cog-outline font-size-16 align-middle me-1"></i> Ubah Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="/logout"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                        </div>

                        <div class="dropdown d-inline-block" id="btn-dark-mode">
                            {{-- <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                                <i class="mdi mdi-cog-outline font-size-20"></i>
                            </button> --}}
                            <button class="btn btn-sm-success" onclick="dark_mode(true)"><i class="fas fa-moon"></i></button>
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
                            <img src="{{asset('tmp/assets/images/users/img.jpg')}}" alt="" class="rounded-circle">
                            <span class="avatar-online bg-success"></span>
                        </div>
                        <div class="user-info">
                            <h5 class="mt-3 font-size-16 text-white" style="text-transform: capitalize;">{{Auth::guard('web')->user()->name}}</h5>
                            <span class="font-size-13 text-white-50" style="text-transform: capitalize;">{{Auth::guard('web')->user()->username}}</span>
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

                        @can('read-services')
                        <li>
                            <a href="/admin/servis" class=" waves-effect">
                                <i class="fas fa-hammer"></i>
                                <span>Servis</span>
                            </a>
                        </li>
                        @endcan

                        @canany(['create-sales', 'read-sales', 'create-purchases', 'read-purchases', 'read-debt', 'read-receivable'])
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-cart"></i>
                                <span>Transaksi</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                @can('create-sales')
                                <li><a href="/admin/entry_penjualan">Enty Penjualan</a></li>
                                @endcan
                                @can('read-sales')
                                <li><a href="/admin/daftar_penjualan">Daftar Penjualan</a></li>
                                @endcan
                                @can('create-purchases')
                                <li><a href="/admin/entry_pembelian">Entry Pembelian</a></li>
                                @endcan
                                @can('read-purchases')
                                <li><a href="/admin/daftar_pembelian">Daftar Pembelian</a></li>
                                @endcan
                                @can('read-debt')
                                <li><a href="/admin/hutang">Hutang</a></li>
                                @endcan
                                @can('read-receivable')
                                <li><a href="/admin/piutang">Piutang</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany
                        @canany(['read-products', 'read-repaire', 'read-suppliers', 'read-customers', 'read-users', 'read-opnames', 'read-stocks'])
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-desktop"></i>
                                <span>Data Master</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                @can('read-products')
                                <li><a href="/admin/barang">Data Barang</a></li>
                                @endcan
                                @can('read-repaire')
                                <li><a href="/admin/jasa">Data Jasa</a></li>
                                @endcan
                                @can('read-suppliers')
                                <li><a href="/admin/supplier">Data Supplier</a></li>
                                @endcan
                                @can('read-customers')
                                <li><a href="/admin/pelanggan">Data Pelanggan</a></li>
                                @endcan
                                @can('read-users')
                                <li><a href="/admin/karyawan">Data Karyawan</a></li>
                                @endcan
                                @can('read-opnames')
                                <li><a href="/admin/stockopname">Stok Opname</a></li>
                                @endcan
                                @can('read-stocks')
                                <li><a href="/admin/stock_in_out">Stok In/Out</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany
                        @canany(['read-cash', 'read-ppn'])
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-money-bill-alt"></i>
                                <span>Keuangan</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                @can('read-cash')
                                <li><a href="/admin/kas">Kas</a></li>
                                @endcan
                                @can('read-ppn')
                                <li><a href="/admin/ppn">PPN</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany
                        @canany(['report-daily-journal', 'report-sales', 'report-purchases', 'report-opnames', 'report-stock-in-out', 'report-cash', 'report-debts-receivables', 'report-profit'])
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-file-alt"></i>
                                <span>Laporan</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                @can('report-daily-journal')
                                <li><a href="/admin/lap_jurnalharian">Jurnal harian</a></li>
                                @endcan
                                @can('report-sales')
                                <li><a href="/admin/lap_penjualan">Penjualan</a></li>
                                @endcan
                                @can('report-purchases')
                                <li><a href="/admin/lap_pembelian">Pembelian</a></li>
                                @endcan
                                @can('report-opnames')
                                <li><a href="/admin/lap_stokopname">Stok Opname</a></li>
                                @endcan
                                @can('report-stock-in-out')
                                <li><a href="/admin/lap_stok_in_out">Stok In/Out</a></li>
                                @endcan
                                @can('report-cash')
                                <li><a href="/admin/lap_kas">Kas</a></li>
                                @endcan
                                @can('report-debts-receivables')
                                <li><a href="/admin/lap_hutangpiutang">Hutang Piutang</a></li>
                                @endcan
                                @can('report-profit')
                                <li><a href="/admin/lap_labarugi">Laba Rugi</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

                        <li>
                            @can('read-grafik')
                            <a href="/admin/grafik" class=" waves-effect">
                                <i class="far fa-chart-bar"></i>
                                <span>Grafik</span>
                            </a>
                            @endcan
                        </li>
                        @canany(['generate-barcode-tools', 'backup-tools', 'delete-servis-tools', 'delete-transaction-tools'])
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="fas fa-tools"></i>
                                <span>Tools</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                @can('generate-barcode-tools')
                                <li><a href="/admin/generatebarcode">Generate Barcode</a></li>
                                @endcan
                                @can('backup-tools')
                                <li><a href="/admin/backupdata">Backup Data</a></li>
                                @endcan
                                @can('delete-servis-tools')
                                <li><a href="/admin/del_dataservis">Hapus Servis</a></li>
                                @endcan
                                @can('delete-transaction-tools')
                                <li><a href="/admin/del_transaksi">Hapus Transaksi</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany
                        <li>
                            @can('commission-users')
                            <a href="/admin/komisi" class=" waves-effect">
                                <i class="dripicons-flag"></i>
                                <span>Komisi Karyawan</span>
                            </a>
                            @endcan
                        </li>
                        @canany(['footerNota-settings', 'formatWA-settings', 'formatSMS-settings', 'daylimit-settings', 'profile-settings'])
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="dripicons-toggles"></i>
                                <span>Setting</span>
                            </a>
                            <ul class="sub-menu mm-collapse" aria-expanded="false">
                                @can('footerNota-settings')
                                <li><a href="/admin/footer_nota">Footer Nota</a></li>
                                @endcan
                                @can('formatWA-settings')
                                <li><a href="/admin/format_sms">Format SMS</a></li>
                                @endcan
                                @can('formatSMS-settings')
                                <li><a href="/admin/format_WA">Format WA</a></li>
                                @endcan
                                @can('daylimit-settings')
                                <li><a href="/admin/bataspengambilan">Batas Ambil Servis</a></li>
                                @endcan
                                @can('profile-settings')
                                <li><a href="/admin/profil">Profil Toko</a></li>
                                @endcan
                            </ul>
                        </li>
                        @endcanany

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
                            <script>document.write(new Date().getFullYear())</script> © Creadev.
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

    <script src="{{asset('tmp/assets/libs/select2/js/select2.min.js')}}"></script>

    <script src="{{asset('tmp/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>

    <script src="{{asset('tmp/javascript/service.js')}}"></script>
    <script src="{{asset('tmp/javascript/entryPenjualan.js')}}"></script>
    <script src="{{asset('tmp/javascript/dark.js')}}"></script>
    <script src="{{asset('tmp/javascript/pre-load.js')}}"></script>
        <!-- init js -->
        {{-- <script src="{{asset('tmp/assets/js/pages/ecommerce-add-product.init.js')}}"></script> --}}
    {{-- //service --}}



    <script src="{{asset('tmp/assets/js/app.js')}}"></script>



<svg id="SvgjsSvg1294" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1295"></defs><polyline id="SvgjsPolyline1296" points="0,0"></polyline><path id="SvgjsPath1297" d="M-1 80L-1 80C-1 80 29.11111111111111 80 29.11111111111111 80C29.11111111111111 80 58.22222222222222 80 58.22222222222222 80C58.22222222222222 80 87.33333333333333 80 87.33333333333333 80C87.33333333333333 80 116.44444444444444 80 116.44444444444444 80C116.44444444444444 80 145.55555555555554 80 145.55555555555554 80C145.55555555555554 80 174.66666666666666 80 174.66666666666666 80C174.66666666666666 80 203.77777777777777 80 203.77777777777777 80C203.77777777777777 80 232.88888888888889 80 232.88888888888889 80C232.88888888888889 80 262 80 262 80C262 80 262 80 262 80 "></path></svg></body></html>
