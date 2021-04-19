<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('judul')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="icon" href="{{ asset('images/gambar.png')}}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css')}}">


    <link rel="stylesheet" href="{{ asset('css/style.css')}}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{'/home'}}"><img src="/images/gambar.png" height="50px;" width="50px;" alt="Logo"></a>
                <p>Universitas Pendidikan Indonesia</p>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{'/home'}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    
                    @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'mini_admin')
                        <h3 class="menu-title">Fitur Barang</h3><!-- /.menu-title -->

                            @if(auth()->user()->role == 'super_admin')
                                <li>
                                    <a href="/data-barang"> <i class="menu-icon fa fa-briefcase"></i>Data Barang</a>
                                </li>
                            @endif
                            @if(auth()->user()->role == 'mini_admin')
                                <li>
                                    <a href="/data-prodi/{{ Auth::user()->status }}"> <i class="menu-icon fa fa-briefcase"></i>Data Barang Prodi</a>
                                </li>
                            @endif

                            @if(auth()->user()->role == 'super_admin')
                                <li>
                                    <a href="/add-barang"> <i class="menu-icon fa fa-plus-square"></i>Tambah Data Barang</a>
                                </li>
                            @endif

                            @if(auth()->user()->role == 'super_admin')
                                <li class="menu-item-has-children dropdown">
                                    <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-sort-amount-desc"></i>Jenis Barang</a>
                                    <ul class="sub-menu children dropdown-menu">
                                        <li><i class="fa fa-table"></i><a href="/jenis-barang/{{'Elektronik'}}">Elektronik</a></li>
                                        <li><i class="fa fa-table"></i><a href="/jenis-barang/{{'Non-Elektronik'}}">Non-Elektronik</a></li>
                                    </ul>
                                </li>
                            @endif

                            @if(auth()->user()->role == 'super_admin')
                            <li class="menu-item-has-children dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Kondisi Barang</a>
                                <ul class="sub-menu children dropdown-menu">
                                    <li><i class="fa fa-table"></i><a href="/kondisi-barang/{{'Baik'}}">Baik</a></li>
                                    <li><i class="fa fa-table"></i><a href="/kondisi-barang/{{'Sedang'}}">Rusak Sedang</a></li>
                                    <li><i class="fa fa-table"></i><a href="/kondisi-barang/{{'Berat'}}">Rusak Berat</a></li>
                                </ul>
                            </li>
                            @endif

                            <h3 class="menu-title">Fitur Lainya</h3><!-- /.menu-title -->

                            @if(auth()->user()->role == 'super_admin')
                                <li>
                                    <a href="/data-toko"><i class="menu-icon fa fa-truck"></i>Data Toko</a>
                                </li>
                            @endif

                            @if(auth()->user()->role == 'super_admin' OR 'mini_admin')
                                <li>
                                    <a href="/last-data"><i class="menu-icon fa fa-trash-o"></i>Pemusnahan Barang</a>
                                </li>
                            @endif

                            @if(auth()->user()->role == 'super_admin')
                                <li>
                                    <a href="{{'/add-admin'}}"><i class="menu-icon fa fa-group (alias)"></i>Tambah Akun Admin</a>
                                </li>
                            @endif

                            @if(auth()->user()->role == 'super_admin' OR 'mini_admin')
                                <li>
                                    <a href="/export-data"><i class="menu-icon fa fa-folder-open"></i>Export Data Barang</a>
                                </li>
                            @endif

                    @endif

                    @if(auth()->user()->role == 'admin_pegawai')
                        <li>
                            <a href="{{'/add-dataPegawai'}}"><i class="menu-icon fa fa-user "></i>Tambah Data Pegawai</a>
                        </li>
                        <li>
                            <a href="{{'/add-akun/adminKepegawaian'}}"><i class="menu-icon fa fa-group (alias)"></i>Tambah Akun Admin</a>
                        </li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
                <div class="col-sm-7">
                 @if(auth()->user()->role == 'super_admin' || auth()->user()->role == 'mini_admin')
                    <p style="font-size:20px;">Aplikasi Inventaris Barang <i class="fa fa-archive"></i></p>
                 @endif

                 @if(auth()->user()->role == 'admin_pegawai')
                    <p style="font-size:20px;">Aplikasi Data Kepegawaian <i class="fa fa-user"></i></p>
                 @endif
                    
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="/images/{{ Auth::user()->gambar }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="/profile/{{Auth::user()->id}}"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>@yield('judul')</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">@yield('judul')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        </div>
                            <div class="content"> 
                            <!-- bagian content -->
                            @yield('content')
                            </div>
                    </div>
                </div>
            </div>
        </div> <!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    @yield('javascript')
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('js/dashboard.js')}}"></script>
    <script src="{{ asset('js/widgets.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.min.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
