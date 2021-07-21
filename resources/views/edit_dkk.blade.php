@extends('layout/paan')
@section('title', 'Form')
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

<body>
    <aside id="left-panel" class="left-panel"></aside>
    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-8s">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="home">Dashboard</a></li>
                                    <li><a href="#">Data Kartu Keluarga</a></li>
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
                    <input type="hidden" name="id" value="{{$post->no_kk}}"> 
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
                                                    <div class="col-12 col-md-6"><input type="text" id="text-input" name="nomorkk" placeholder="Nomor Kartu Keluarga" class="form-control" value="{{$post->no_kk}}"></div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Nomor RT</strong></label></div>
                                                    <div class="col-12 col-md-6">
                                                        <select name="nort" id="select" class="form-control" value="{{$post->no_rt}}">
                                                            <option value="0">Default</option>
                                                            <option value="1">RT 1</option>
                                                            <option value="2">RT 2</option>
                                                            <option value="2">RT 13</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Nomor RW</strong></label></div>
                                                    <div class="col-12 col-md-6">
                                                        <select name="norw" id="select" class="form-control" value="{{$post->no_rw}}">
                                                            <option value="1">RW 1</option>

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nama Kepala Keluarga</strong></label></div>
                                                    <div class="col-12 col-md-6"><input type="text" id="text-input" name="namakk" placeholder="Nama Kepala Keluarga" class="form-control" value="{{$post->nm_kk}}"></div>
                                                </div>

                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Kode Rumah</strong></label></div>
                                                    <div class="col-12 col-md-6"><input type="text" id="text-input" name="koderumah" placeholder="Kode Rumah" class="form-control" value="{{$post->kd_rumah}}"></div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Level Ekonomi</strong></label></div>
                                                    <div class="col-12 col-md-6">
                                                        <select name="levelekonomi" id="select" class="form-control" aria-valuemax="{{$post->kd_level_ekonomi}}">
                                                            <option value="0">0 - Default</option>
                                                            <option value="1">1 - Menengah</option>
                                                            <option value="2">2 - Menengah Keatas</option>
                                                            <option value="3">3 - Menengah Kebawah</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Keterangan</strong></label></div>
                                                    <div class="col-12 col-md-6"><input type="text" id="text-input" name="keterangan" placeholder="Keterangan" class="form-control" value="{{$post->keterangan}}"></div>
                                                </div>
                                                
                                            </div>
                                                <div class="col-lg-2 col-sm-12">
                                                    <button type="submit" name ="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            
                                        </div>
                                        
                                    </form>

                                </div>
                                
                            </div>



                        </div>



                    </div>

                </form>
            </div><!-- .animated -->
        </div>

        <div class="content">

            <div class="row">




            </div>

            

        <div class="clearfix"></div>




    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->
    @section('container')


    <div class="clearfix"></div>

</body>
@endsection('container')

</html>