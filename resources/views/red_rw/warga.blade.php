@extends('red_rw/layout')
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
                                <h1>TABEL DATA WARGA</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="/">Dashboard</a></li>
                                    <li><a href="#">Data Lainnya</a></li>
                                    <li class="active">Data Warga</li>
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
                            <strong class="card-title">Tabel Data Warga</strong>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nomor Kartu Keluarga</th>
                                        <th>NIK</th>
                                        <th>Nomor RW</th>
                                        <th>Nomor RT</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status Kawin</th>
                                        <th>Status Mukim</th>
                                        <th>Golongan Darah</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $warga as $w )
                                    <tr>
                                        <td>{{$w->no_kk}}</td>
                                        <td>{{$w->no_ktp}}</td>
                                        <td>{{$w->no_rw}}</td>
                                        <td>{{$w->kd_rt}}</td>
                                        <td>{{$w->nama}}</td>
                                        <td>{{$w->j_kelamin}}</td>
                                        <td>{{$w->status_kawin}}</td>
                                        <td>{{$w->status_mukim}}</td>
                                        <td>{{$w->gol_darah}}</td>
                                        <td>{{$w->status}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nomor Kartu Keluarga</th>
                                        <th>NIK</th>
                                        <th>Nomor RW</th>
                                        <th>Nomor RT</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status Kawin</th>
                                        <th>Status Mukim</th>
                                        <th>Golongan Darah</th>
                                        <th>Status</th>
                                    </tr>
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


@section('customscript')
<script>
    $(document).ready(function () {

        // $('#bootstrap-data-table tfoot th').each( function () {
        //     var title = $(this).text();
        //     $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
        // } );
        // var table = $('#datatable').DataTable({
        //     'processing': true,
        //     'serverSide': true,

        //     'columns': [
        //         {'data': 'no_kk'},
        //         {'data': 'no_ktp'},
        //         {'data': 'no_rw'},
        //         {'data': 'no_rt'},
        //         {'data': 'nama'},
        //         {'data': 'j_kelamin'},
        //         {'data': 'status_kawin'},
        //         {'data': 'status_mukim'},
        //         {'data': 'gol_darah'},
        //         {'data': 'status'}
        //     ],
        // });

        // $('.filter-input').keyup(function() {
        //     var value = $(this).val().toLowerCase();
        //     $("#bootstrap-data-table tr").filter(function() {
        //     $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //  });
        // });

        // $('.filter-input').keyup(function() {

        // });

        // var table = $('#bootstrap-data-table').DataTable({

        // });
        //     $('#bootstrap-data-table').column( $(this).data('column') )
        //     .search( $(this).val() )
        //     .draw();
        // });

        // $('.filter-select').change(function() {
        //     table.column( $(this).data('column') )
        //     .search( $(this).val() )
        //     .draw();
        // });
    })


</script>
@endsection('customscript')

</html>