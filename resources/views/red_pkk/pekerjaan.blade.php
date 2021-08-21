@extends('red_pkk/layout',[
"InfoPage" => [
"Navbar" => '/red_pkk/pekerjaan'
]
])
@section('title', 'Data Pekerjaan Warga Perempuan')

@section('container')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DATA PEKERJAAN WARGA PEREMPUAN</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/">Dashboard</a></li>
                            <li><a href="#">Data Lainnya</a></li>
                            <li class="active">Data Pekerjaan Warga Perempuan</li>
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
                        <strong class="card-title">Filter Data Pekerjaan</strong>
                    </div>
                    <div class="card-body">
                        <div id="cFilter" class='container-fluid flex-row flex-nowrap'>
                            <div class="row">
                                <div class="col-sm-6" hidden>
                                    <div class="form-group">
                                        <label class="control-label">Nomor KK</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-6" hidden>
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
                                        <label class="col-sm-4 text-right">RT</label>
                                            <select class="select form-control col-sm-4"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-6" hidden>
                                    <div class="form-group">
                                        <label class="control-label">Nama Panggilan</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group row">
                                        <label class="col-sm-5 text-right">Pekerjaan</label>
                                            <select class="select form-control col-sm-6"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group row">
                                        <label class="col-sm-6 text-right">Level Ekonomi</label>
                                            <select class="select form-control col-sm-5"></select>
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
                        <strong class="card-title">Tabel Pekerjaan Warga Perempuan</strong>
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
                                    <th>Pekerjaan</th>
                                    <th>Level Ekonomi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $pkj as $p )
                                <tr>
                                    <td>{{$p->no_kk}}</td>
                                    <td>{{$p->no_ktp}}</td>
                                    <td>{{$p->no_rw}}</td>
                                    <td>{{$p->no_rt}}</td>
                                    <td>{{$p->nama}}</td>
                                    <td>{{$p->nm_panggilan}}</td>
                                    <td>{{$p->nama_pekerjaan}}</td>
                                    <td>{{$p->nama_level}}</td>

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
@endsection