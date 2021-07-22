@extends('layout/pkk',[
"InfoPage" => [
"Navbar" => '/pkk/keahlian'
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

        <div class="row"></div>


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
                                <th>Nomor RT</th>
                                <th>Nama</th>
                                <th>Pekerjaan</th>
                                <th>Keahlian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $data_induk as $p )
                            <tr>
                                <td>{{$p->no_kk}}</td>
                                <td>{{$p->no_ktp}}</td>
                                <td>{{$p->kd_rt}}</td>
                                <td>{{$p->nama}}</td>
                                <td>{{$p->nama_pekerjaan}}</td>
                                <td>{{$p->nama_pekerjaan}}</td>

                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <th>Nomor Kartu Keluarga</th>
                            <th>NIK</th>
                            <th>Nomor RT</th>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div><!-- .animated -->
</div><!-- .content -->
@endsection