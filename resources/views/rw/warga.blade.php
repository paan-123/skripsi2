@extends('layout/rolerw',[
"InfoPage" => [
"Navbar" => '/rw/warga'
]
])
@section('title', 'Dashboard')

@section('container')
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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Filter Data Warga</strong>
                    </div>
                    <div class="card-body">
                        <div id="cFilter" class='container-fluid flex-row flex-nowrap'>
                            <div class="row">
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">No. Kartu Keluarga</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">NIK</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group row">
                                        <label class="col-sm-4 text-right">RW</label>
                                        <select class="select form-control col-sm-4 text-left"></select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group row">
                                        <label class="col-sm-4 text-right" >RT</label>
                                        <select class="select form-control col-sm-4"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">Nama Panggilan</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">TTL</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group row">
                                        <label class="col-sm-5 text-right">Jenis Kelamin</label>
                                            <select class="select form-control col-sm-5"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">Status Hubungan</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group row">
                                        <label class="col-sm-4 text-right">Status Mukim</label>
                                        <select class="select form-control col-sm-5"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">Status</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-2 text-center">
                                    <button class='btn btn-primary' style="font-size: 12px" onclick="cFilter()">Filter</button>
                                </div>
                            </div>
                            </div>

                    </div>
                </div>
            </div>
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
                                    <th>RW</th>
                                    <th>RT</th>
                                    <th>Nama</th>
                                    <th>Panggilan</th>
                                    <th>TTL</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status Hubungan</th>
                                    <th>Status Mukim</th>
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
                                    <td>{{$w->nm_panggilan}}</td>
                                    <td>{{$w->tmp_lahir}}, {{$w->tgl_lahir}}</td>
                                    <td>{{$w->j_kelamin}}</td>
                                    <td>{{$w->status_hub_kk}}</td>
                                    <td>{{$w->status_mukim}}</td>
                                    <td>{{$w->status}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                            
                        </table>


                    </div>
                </div>
            </div>


        </div><!-- .animated -->
    </div><!-- .content -->
</div>
@endsection

@section('customscript')
<script>
    //$(document).ready(function() {

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
</script>
@endsection