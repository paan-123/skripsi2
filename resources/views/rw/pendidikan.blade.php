@extends('layout/rolerw')
@section('title', 'Warga')

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">


    </aside><!-- /#left-panel -->


    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->

        <!-- Header-->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>DATA PENDIDIKAN WARGA</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="/">Dashboard</a></li>
                                    <li><a href="#">Rekap</a></li>
                                    <li class="active">Data Pendidikan Warga</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="animated fadeIn">




                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Tabel Pendidikan Warga</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nomor Kartu Keluarga</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Jenjang Pendidikan</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $pendidikan as $w )
                                    <tr>
                                        <td>{{$w->no_kk}}</td>
                                        <td>{{$w->no_ktp}}</td>
                                        <td>{{$w->nama}}</td>
                                        <td>{{$w->nama_jenjang}}</td>
                                        <td>{{$w->keterangan}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                            <table>



                            </table>
                        </div>
                    </div>
                </div>


            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>



    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    @section('container')
</body>
@endsection('container')

</html>