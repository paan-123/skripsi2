@extends('layout/paan')
@section('title', 'Form')

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">


    </aside><!-- /#left-panel -->


    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <div class="content">
            <div class="animated fadeIn">
                @if(Session::has('post_updatedkk'))
                <span>{{Session::get('post_updatedkk')}}</span>
                @endif
                <form method="post" action="{{route('updatedkk.post')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{$post->no_kk}}">
                    <div class="row">


                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    Form Input <strong>Data Kartu Keluarga</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nomor Kartu Keluarga</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="nomorkk" placeholder="Nomor Kartu Keluarga" class="form-control" value="{{$post->no_kk}}"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Nomor RT</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="nort" id="select" class="form-control" value="{{$post->no_rt}}">
                                                    <option value="0">Default</option>
                                                    <option value="1">RT 1</option>
                                                    <option value="2">RT 2</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Nomor RW</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="norw" id="select" class="form-control" value="{{$post->no_rw}}">
                                                    <option value="1">RW 1</option>
                                                    <option value="2">RW 2</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nama Kepala Keluarga</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="namakk" placeholder="Nama Kepala Keluarga" class="form-control" value="{{$post->nm_kk}}"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Kode Rumah</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="koderumah" placeholder="Kode Rumah" class="form-control" value="{{$post->kd_rumah}}"></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Level Ekonomi</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="levelekonomi" id="select" class="form-control" value="{{$post->kd_level_ekonomi}}">
                                                    <option value=" 0">0 - Default</option>
                                                    <option value="1">1 - Menengah</option>
                                                    <option value="2">2 - Menengah Keatas</option>
                                                    <option value="3">3 - Menengah Kebawah</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Keterangan</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="keterangan" placeholder="Keterangan" class="form-control" value="{{$post->keterangan}}"></div>
                                        </div>
                                        <input type="submit" name="submit" id="">
                                    </form>
                                </div>
                                <!-- <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                
                            </div> -->
                            </div>

                        </div>



                    </div>

                </form>
            </div><!-- .animated -->
        </div><!-- .content -->

        <div class="clearfix"></div>



    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <!-- Scripts -->

</body>

</html>