@extends('layout/paan')
@section('title', 'Form')

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
                                <h1>TABEL GOLONGAN DARAH WARGA</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="/">Dashboard</a></li>
                                    <li><a href="#">Data Lainnya</a></li>
                                    <li class="active">Data Golongan Darah</li>
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
                            <strong class="card-title">Tabel Golongan Darah Warga</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Kode RT</th>
                                        <th>Nomor Rumah</th>
                                        <th>Nama</th>
                                        <th>Golongan Darah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $gdarah as $gd )
                                    <tr>
                                        <td>{{$gd->kd_rt}}</td>
                                        <td>{{$gd->no_rumah}}</td>
                                        <td>{{$gd->nama}}</td>
                                        <td>{{$gd->gol_darah}}</td>
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