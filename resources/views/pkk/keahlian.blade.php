@extends('layout/pkk')
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
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="home">Dashboard</a></li>
                                    <li><a href="#">Data Warga</a></li>
                                    <li><a href="#">Data Keahlian Warga Perempuan</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="card">
                            
                            <div class="card-body">
                                <h2><strong>Detail Keahlian Warga Perempuan</strong></h2>
                                <hr> <br>
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="data-memasak-tab" data-toggle="tab" href="#data-memasak" role="tab" aria-controls="data-anak" aria-selected="true">MEMASAK</a>
                                            <a class="nav-item nav-link" id="data-menjahit-tab" data-toggle="tab" href="#data-menjahit" role="tab" aria-controls="data-menjahit" aria-selected="false">MENJAHIT</a>
                                            <a class="nav-item nav-link" id="data-prakarya-tab" data-toggle="tab" href="#data-prakarya" role="tab" aria-controls="data-prakarya" aria-selected="false">PRAKARYA</a>
                                            <a class="nav-item nav-link" id="data-tani-tab" data-toggle="tab" href="#data-tani" role="tab" aria-controls="data-tani" aria-selected="false">TANI/BERKEBUN</a>
                                        </div>
                                    </nav>
                                    
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="data-memasak" role="tabpanel" aria-labelledby="data-memasak-tab">
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nomor Kartu Keluarga</th>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Pekerjaan</th>
                                                            <th>Level Ekonomi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {{-- @foreach( $rt1 as $p )
                                                        <tr>
                                                            <td>{{$p->no_kk}}</td>
                                                            <td>{{$p->no_ktp}}</td>
                                                            <td>{{$p->nama}}</td>
                                                            <td>{{$p->nama_pekerjaan}}</td>
                                                            <td>{{$p->nama_level}}</td>
                                                        </tr>
                                                        @endforeach --}}
                
                                                    </tbody>
                                                </table>   
                           
                                            
                                        </div>



                                        <div class="tab-pane fade" id="data-menjahit" role="tabpanel" aria-labelledby="data-menjahit-tab">
                                            <table id="bootstrap-data-table2" class="table table-striped table-bordered">
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
                                                    {{-- @foreach( $join as $k )
                                                    <tr>
                                                        <td>{{$k->no_ktp}}</td>
                                                        <td>{{$k->no_kk}}</td>
                                                        <td>{{$k->nama}}</td>
                                                        <td>{{$k->nama_keahlian}}</td>
                                                        <td>{{$k->deskripsi_sertifikat}}</td>
                                                    </tr>
                                                    @endforeach --}}
                
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        <div class="tab-pane fade" id="data-prakarya" role="tabpanel" aria-labelledby="data-prakarya-tab">
                                            <table id="bootstrap-data-table3" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nomor Kartu Keluarga</th>
                                                        <th>Nama Kepala Keluarga</th>
                                                   
                                                        <th>Level Ekonomi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach( $lv as $p )
                                                    <tr>
                                                        <td>{{$p->no_kk}}</td>
                                                        <td>{{$p->nm_kk}}</td>
                                                        <td>{{$p->nama_level}}</td>
                                                     
                                                    </tr>
                                                    @endforeach --}}
            
                                                </tbody>
                                            </table>   

                                        </div>


                                        <div class="tab-pane fade" id="data-tani" role="tabpanel" aria-labelledby="data-tani-tab">
                                            
                                            <table id="bootstrap-data-table4" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nomor Kartu Keluarga</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Golongan Darah</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @foreach( $gd as $gd )
                                                    <tr>
                                                        <td>{{$gd->no_kk}}</td>
                                                        <td>{{$gd->no_ktp}}</td>
                                                        <td>{{$gd->nama}}</td>
                                                        <td>{{$gd->gol_darah}}</td>
                                                    </tr>
                                                    @endforeach --}}
                
                                                </tbody>
                                            </table>   

                                        </div>

                                  


                                </div>

                                    
                            </div> 
                        </div>
                            
                      
                
                            
                        
                             

                        
                    </div>

                    
                </div>




            </div>

            
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