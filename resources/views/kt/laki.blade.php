@extends('layout/kt',[
"InfoPage" => [
"Navbar" => '/kt/laki'
]
])
@section('title', 'Data Pemuda Laki-laki')

@section('container')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DATA PEMUDA LAKI-LAKI</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/">Dashboard</a></li>
                            <li><a href="#">Data Lainnya</a></li>
                            <li class="active">Data Pemuda Laki-laki</li>
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
                        <strong class="card-title">Tabel Pemuda Laki-laki</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor Kartu Keluarga</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Nomor RT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_induk as $p )
                                <tr>
                                    <td>{{$p->no_kk}}</td>
                                    <td>{{$p->no_ktp}}</td>
                                    <td>{{$p->nama}}</td>
                                    <td>{{$p->kd_rt}}</td>

                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <th>Nomor Kartu Keluarga</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Nomor RT</th>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>


        </div><!-- .animated -->
    </div><!-- .content -->

    <div class="clearfix"></div>

</div>
@endsection