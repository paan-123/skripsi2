@extends('red_rw/layout',[
"InfoPage" => [
"Navbar" => '/red_rw/agama'
]
])
@section('title', 'Data Ibadah Warga')

@section('container')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DATA IBADAH WARGA</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/">Dashboard</a></li>
                            <li><a href="#">Menu</a></li>
                            <li class="active">Data Ibadah</li>
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
                        <strong class="card-title">Tabel Ibadah Warga</strong>
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
                                    <th>Agama</th>
                                    <th>5 Waktu</th>
                                    <th>Berjamaah</th>
                                    <th>Zakat Fitrah</th>
                                    <th>Zakat Mal</th>
                                    <th>Kurban</th>
                                    <th>Haji</th>
                                    <th>Umrah</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $agama as $w )
                                <tr>
                                    <td>{{$w->no_kk}}</td>
                                    <td>{{$w->no_ktp}}</td>
                                    <td>{{$w->no_rw}}</td>
                                    <td>{{$w->no_rt}}</td>
                                    <td>{{$w->nama}}</td>
                                    <td>{{$w->nama_agama}}</td>
                                    <td>{{$w->is_5waktu}}</td>
                                    <td>{{$w->is_jamaah}}</td>
                                    <td>{{$w->is_zakat_fitrah}}</td>
                                    <td>{{$w->is_zakat_mal}}</td>
                                    <td>{{$w->is_qurban}}</td>
                                    <td>{{$w->is_haji}}</td>
                                    <td>{{$w->is_umrah}}</td>
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