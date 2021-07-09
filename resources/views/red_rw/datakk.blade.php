@extends('red_rw/layout')
@section('title', 'Data Kartu Keluarga')

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
                                <h1>TABEL DATA KARTU KELUARGA</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="/">Dashboard</a></li>
                                    <li><a href="#">Data Warga</a></li>
                                    <li class="active">Data KK</li>
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
                            <strong class="card-title">Tabel Data Kartu Keluarga</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nomor Kartu Keluarga</th>
                                        <th>Nama Kepala Keluarga</th>
                                        <th>Nomor RW</th>
                                        <th>Nomor RT</th>
                                        <th>Kode Rumah</th>
                                        <th>Level Ekonomi</th>
                                        {{-- <th>Keterangan</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kk as $dkk)
                                    <tr>

                                        <td>{{$dkk->no_kk}}</td>
                                        <td>{{$dkk->nm_kk}}</td>
                                        <td>{{$dkk->no_rw}}</td>
                                        <td>{{$dkk->no_rt}}</td>
                                        <td>{{$dkk->kd_rumah}}</td>
                                        <td>{{$dkk->nama_level}}</td>
                                        {{-- <td>{{$dkk->keterangan}}</td> --}}
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <th>Nomor Kartu Keluarga</th>
                                        <th>Nama Kepala Keluarga</th>
                                        <th>Nomor RW</th>
                                        <th>Nomor RT</th>
                                        <th>Kode Rumah</th>
                                        <th>Level Ekonomi</th>
                                </tfoot>
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