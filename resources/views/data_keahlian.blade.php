@extends('layout/paan',[
'InfoPage' => [
'Navbar' => '/data_keahlian'
]])
@section('title', 'Keahlian')

@section('container')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>TABEL DATA KEAHLIAN WARGA</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/">Dashboard</a></li>
                            <li><a href="#">Data Lainnya</a></li>
                            <li class="active">Data Keahlian Warga</li>
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
                        <strong class="card-title">Tabel Data Keahlian Warga</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nomor Kartu Keluarga</th>
                                    <th>Nama</th>
                                    <th>Keahlian</th>
                                    <th>Sertifikat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $keahlian as $k )
                                <tr>
                                    <td>{{$k->no_ktp}}</td>
                                    <td>{{$k->no_kk}}</td>
                                    <td>{{$k->nama}}</td>
                                    <td>{{$k->nama_keahlian}}</td>
                                    <td>{{$k->deskripsi_sertifikat}}</td>
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