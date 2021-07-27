@extends('layout/paan',[
'InfoPage' => [
'Navbar' => '/transaksi'
]])
@section('title', 'Form Ubah Data')

@section('container')
<style>
    ::placeholder {
        font-size: 0.8rem;
    }

    .font-08 {
        font-size: 0.8rem !important;
    }

    select,
    input {
        font-size: 0.8rem !important;
    }
</style>

<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-8s">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="home">Dashboard</a></li>
                            <li><a href="{{ url('/transaksi') }}">Data Kartu Keluarga</a></li>
                            <li><a href="#">Edit Kartu Keluarga</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="animated fadeIn">
        @if(Session::has('post_updatedkk'))
        <span>{{Session::get('post_updatedkk')}}</span>
        @endif
        <form method="post" action="{{route('updatedkk.post')}}">
            @csrf
            <input type="hidden" name="id" value="{{$edit->no_kk}}">
            <div class="row">


                <div class="col-lg-12">
                    <div class="card">
                        {{-- <div class="card-header">
                                    Input <strong>Data Kartu Keluarga</strong>
                                </div> --}}
                        <div class="card-body card-block">
                            <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <h2><strong>Edit Data Kartu Keluarga</strong></h2>
                                <hr> <br>
                                <div class="row justify-content-md-center">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col col-md-12"><label for="text-input" class=" form-control-label"><strong>Nomor Kartu Keluarga</strong></label></div>
                                            <div class="col-12 col-md-6"><input type="text" id="text-input" name="nomorkk" placeholder="Nomor Kartu Keluarga" class="form-control" value="{{$edit->no_kk}}"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Nomor RT</strong></label></div>
                                            <div class="col-12 col-md-6">
                                                <select name="nort" id="select" class="form-control">
                                                    {{-- <option value="{{$edit->no_rt}}">{{$edit->no_rt}}</option> --}}
                                                    <option value="1"{{ '1'    == $edit->no_rt ? 'selected' : ''}}>RT 1</option>
                                                    <option value="2"{{ '2'    == $edit->no_rt ? 'selected' : ''}}>RT 2</option>
                                                    <option value="13"{{ '13'    == $edit->no_rt ? 'selected' : ''}}>RT 13</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Nomor RW</strong></label></div>
                                            <div class="col-12 col-md-6">
                                                <select name="norw" id="select" class="form-control" value="{{$edit->no_rw}}">
                                                    <option value="1">RW 1</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nama Kepala Keluarga</strong></label></div>
                                            <div class="col-12 col-md-6"><input type="text" id="text-input" name="namakk" placeholder="Nama Kepala Keluarga" class="form-control" value="{{$edit->nm_kk}}"></div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Kode Rumah</strong></label></div>
                                            <div class="col-12 col-md-6"><input type="text" id="text-input" name="koderumah" placeholder="Kode Rumah" class="form-control" value="{{$edit->kd_rumah}}"></div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Level Ekonomi</strong></label></div>
                                            <div class="col-12 col-md-6">
                                                <select name="levelekonomi" id="select" class="form-control" aria-valuemax="{{$edit->kd_level_ekonomi}}">
                                                    <option value="0">0 - Default</option>
                                                    <option value="1">1 - Menengah</option>
                                                    <option value="2">2 - Menengah Keatas</option>
                                                    <option value="3">3 - Menengah Kebawah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Keterangan</strong></label></div>
                                            <div class="col-12 col-md-6"><input type="text" id="text-input" name="keterangan" placeholder="Keterangan" class="form-control" value="{{$edit->keterangan}}"></div>
                                        </div>

                                    </div>
                                    <div class="col-lg-2 col-sm-12">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
    </div>
</div><!-- .content -->
@endsection