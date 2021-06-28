@extends('layout/rolerw')
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
                                    <li><a href="#">Transaksi</a></li>
                                    <li><a href="#">Input Data Kartu Keluarga</a></li>
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
                                <h2><strong>Detail Warga RT 1</strong></h2>
                                <hr> <br>
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="data-laki-tab" data-toggle="tab" href="#data-laki" role="tab" aria-controls="data-laki" aria-selected="true">LAKI-LAKI</a>
                                            <a class="nav-item nav-link" id="data-perempuan-tab" data-toggle="tab" href="#data-perempuan" role="tab" aria-controls="data-perempuan" aria-selected="false">PEREMPUAN</a>
                                        </div>
                                    </nav>
                                    
                                        <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="data-laki" role="tabpanel" aria-labelledby="data-laki-tab">
                                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Nomor Kartu Keluarga</th>
                                                            <th>NIK</th>
                                                            <th>Nama</th>
                                                            <th>Kode RT</th>
                                                            {{-- <th>Level Ekonomi</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach( $lk as $lk )
                                                        <tr>
                                                            <td>{{$lk->no_kk}}</td>
                                                            <td>{{$lk->no_ktp}}</td>
                                                            <td>{{$lk->nama}}</td>
                                                            <td>{{$lk->kd_rt}}</td>
                                                            
                                                        </tr>
                                                        @endforeach
                
                                                    </tbody>
                                                </table>   
                           
                                            
                                        </div>



                                        <div class="tab-pane fade" id="data-perempuan" role="tabpanel" aria-labelledby="data-perempuan-tab">
                                            <table id="bootstrap-data-table2" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Nomor Kartu Keluarga</th>
                                                        <th>NIK</th>
                                                        <th>Nama</th>
                                                        <th>Kode RT</th>
                                                        {{-- <th>Sertifikat</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach( $pr as $pr )
                                                    <tr>
                                                        <td>{{$pr->no_kk}}</td>
                                                        <td>{{$pr->no_ktp}}</td>
                                                        <td>{{$pr->nama}}</td>
                                                        <td>{{$pr->kd_rt}}</td>
                                                        
                                                    </tr>
                                                    @endforeach
                
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