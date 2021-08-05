<!DOCTYPE html>
<html class="no-js" lang="">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="{{asset('assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />

    {{-- ===================select2===================== --}}
    <link rel="stylesheet" href="{{asset('assets/css/lib/select2/select2.min.css')}}">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"> -->

    
</head>

<body>

    <!-- loading -->
    <div id='loader-wrapper'>
        <div id="loader"></div>
    </div>

    <!-- New Sidebar -->
    <div>
        <div class="page-wrapper chiller-theme toggled">
            <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
                <i class="fas fa-bars"></i>
            </a>
            <nav id="sidebar" class="sidebar-wrapper">
                <div class="sidebar-content">
                    <!-- <div class="sidebar-brand">
                        <a href="#">pro sidebar</a>
                        <div id="close-sidebar">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="sidebar-header">
                        <div class="user-pic">
                            <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg" alt="User picture">
                        </div>
                        <div class="user-info">
                            <span class="user-name">Jhon
                                <strong>Smith</strong>
                            </span>
                            <span class="user-role">Administrator</span>
                            <span class="user-status">
                                <i class="fa fa-circle"></i>
                                <span>Online</span>
                            </span>
                        </div>
                    </div> -->
                    <!-- sidebar-header  -->
                    <div class="sidebar-search">
                        <div>
                            <div class="input-group">
                                <input type="text" class="form-control search-menu" placeholder="Search...">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- sidebar-search  -->
                    <div class="sidebar-menu">
                        <ul>
                            <li class="header-menu justify-content-start">
                                <span>General</span>
                            </li>
                            <li class="{{ '/home'    == $InfoPage['Navbar'] ? 'active' : ''}}">
                                <a href="{{ url ('/home')}}">
                                    <i class="fa fa-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-user-edit"></i>
                                    <span>Data Jamaah</span>
                                    {{-- <span class="badge badge-pill badge-warning">New</span> --}}
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li class="{{ '/transaksi'    == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/transaksi')}}">Data Kartu Keluarga</a>
                                        </li>
                                        
                                        <li class="{{ '/data_induk' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/data_induk')}}">Data Induk
                                                <span class="badge badge-pill badge-success"></span>
                                            </a>
                                        </li>
                                        <li class="{{ '/keahlian' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/keahlian')}}">Data Keahlian</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-database"></i>
                                    <span>Tampilkan Data</span>
                                    <span class="badge badge-pill badge-danger"></span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li class="{{ '/data_kk'    == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/data_kk')}}">Tampil KK</a>
                                        </li>
                                        <li class="{{ '/datainduk' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/datainduk')}}">Tampil Warga</a>
                                        </li>
                                        <li class="{{ '/ibadah' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/ibadah')}}">Tampil Ibadah</a>
                                        </li>
                                        <li class="{{ '/data_keahlian' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/data_keahlian')}}">Tampil Keahlian</a>
                                        </li>
                                        <li class="{{ '/golongan_darah' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/golongan_darah')}}">Tampil Golongan Darah</a>
                                        </li>
                                        <li class="{{ '/pekerjaan' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/pekerjaan')}}">Tampil Pekerjaan</a>
                                        </li>
                                        <li class="{{ '/pendidikan' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/pendidikan')}}">Tampil Pendidikan</a>
                                        </li>
                                        <li class="{{ '/baca' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/baca')}}">Tampil Kemampuan Baca</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="sidebar-dropdown">
                                <a href="#">
                                    <i class="fa fa-briefcase"></i>
                                    <span>Data Master</span>
                                </a>
                                <div class="sidebar-submenu">
                                    <ul>
                                        <li class="{{ '/md_agama' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/md_agama')}}">Data Master Agama</a>
                                        </li>
                                        <li class="{{ '/md_rumah' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/md_rumah')}}">Data Master Rumah</a>
                                        </li>
                                        <li class="{{ '/md_rw' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/md_rw')}}">Data Master RW</a>
                                        </li>
                                        <li class="{{ '/md_rt' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/md_rt')}}">Data Master RT</a>
                                        </li>
                                        <li class="{{ '/md_pekerjaan' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/md_pekerjaan')}}">Data Master Pekerjaan</a>
                                        </li>
                                        <li class="{{ '/md_pendidikan' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/md_pendidikan')}}">Data Master Pendidikan</a>
                                        </li>
                                        <li class="{{ '/md_ekonomi' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/md_ekonomi')}}">Data Master Ekonomi</a>
                                        </li>
                                        <li class="{{ '/md_keahlian' == $InfoPage['Navbar'] ? 'active' : ''}}">
                                            <a href="{{ url ('/md_keahlian')}}">Data Master Keahlian</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><img src="{{url('img/mosque.png')}}" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="{{url('img/mosque.png')}}" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">

                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{url('img/user.png')}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{url('logout')}}"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#Header-->

        <!-- Content-->
        @yield('container')
        <!-- /#Content-->

        <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->

    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    {{-- <script src="{{asset('assets/js/init/weather-init.js')}}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>


    <script src="{{asset('assets/js/init/fullcalendar-init.js')}}"></script>

    <script src="{{asset('assets/js/lib/data-table/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
    <script src="{{asset('assets/js/init/datatables-init.js')}}"></script>

    <!--Local Stuff-->
    {{-- ===================select2===================== --}}
    <script src="{{asset('assets/js/lib/select2/select2.min.js')}}"></script>

    @yield('customscript')

</body>

</html>