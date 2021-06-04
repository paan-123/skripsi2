@extends('layout/paan')
@section('title', 'Master Data Rumah ')

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">

    </aside><!-- /#left-panel -->

    <div id="right-panel" class="right-panel">



        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>TABEL MD RUMAH</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="/">Dashboard</a></li>
                                    <li><a href="#">Master Data</a></li>
                                    <li class="active">MD Rumah</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Tabel MD Rumah</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Rumah</th>
                                            <th>Nomor Rumah</th>
                                            <th>Kode RT</th>
                                            <th>Jumlah KK</th>
                                            <th>Jumlah Penghuni</th>
                                            <th>Nama KK</th>
                                            <th>Keterangan</th>
                                            <th>Status Kontrakan</th>
                                            <th>Status</th>
                                            <th>Latitude</th>
                                            <th>Longitude</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($md_rumah as $mdrum)
                                        <tr>
                                            <td>{{$mdrum->kd_rumah}}</td>
                                            <td>{{$mdrum->no_rumah}}</td>
                                            <td>{{$mdrum->kd_rt}}</td>
                                            <td>{{$mdrum->jml_kk}}</td>
                                            <td>{{$mdrum->jml_penghuni}}</td>
                                            <td>{{$mdrum->nm_kk}}</td>
                                            <td>{{$mdrum->keterangan}}</td>
                                            <td>{{$mdrum->is_kontrakan}}</td>
                                            <td>{{$mdrum->status}}</td>
                                            <td>{{$mdrum->latitude}}</td>
                                            <td>{{$mdrum->longitude}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    @section('container')


    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

    <div class="clearfix"></div>

</body>
@endsection('container')

</html>