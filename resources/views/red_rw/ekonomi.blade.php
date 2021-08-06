@extends('red_rw/layout',[
"InfoPage" => [
"Navbar" => '/red_rw/ekonomi'
]
])
@section('title', 'Data Level Ekonomi')

@section('container')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DATA LEVEL EKONOMI WARGA</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/">Dashboard</a></li>
                            <li><a href="#">Rekap</a></li>
                            <li class="active">Data Level Ekonomi</li>
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
                        <strong class="card-title">Tabel Level Ekonomi Warga</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Kartu Keluarga</th>
                                    <th>NIK</th>
                                    <th>Nomor RT</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Level Ekonomi</th>
                                    <th>Status Mukim</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $ekonomi as $w )
                                <tr>
                                    <td>{{$w->no_kk}}</td>
                                    <td>{{$w->no_ktp}}</td>
                                    <td>{{$w->kd_rt}}</td>
                                    <td>{{$w->nama}}</td>
                                    <td>{{$w->j_kelamin}}</td>
                                    <td>{{$w->nama_level}}</td>
                                    <td>{{$w->status_mukim}}</td>
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