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
                            <li><a href="#">Tampilkan Data</a></li>
                            <li class="active">Tampil Keahlian</li>
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
                        <strong class="card-title">Filter Data Keahlian</strong>
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">RT</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">RT</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Nama Keahlian</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Level Sertifikat</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">Jenis Kelamin</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col text-center">
                                    <button class='btn' onclick="cFilter()">Filter</button>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tabel Data Keahlian Warga</strong>
                    </div>                   
                    <div class="card-body">
                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No. KK</th>
                                    <th>NIK</th>
                                    <th>RT</th>
                                    <th>Nama</th>
                                    <th>Nama Panggilan</th>
                                    <th>Keahlian</th>
                                    <th>Level Sertifikat</th>
                                    <th>Deskripsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $keahlian as $k )
                                <tr>
                                    <td>{{$k->no_kk}}</td>
                                    <td>{{$k->no_ktp}}</td>
                                    {{-- <td>{{$k->no_rw}}</td> --}}
                                    <td>{{$k->kd_rt}}</td>
                                    <td>{{$k->nama}}</td>
                                    <td>{{$k->nm_panggilan}}</td>
                                    <td>{{$k->nama_keahlian}}</td>
                                    <td>{{$k->level_sertifikat}}</td>
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