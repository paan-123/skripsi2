@extends('red_kt/layout',[
"InfoPage" => [
"Navbar" => '/red_kt/warga'
]
])
@section('title', 'Data Pemuda')

@section('container')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>DATA PEMUDA</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="/">Dashboard</a></li>
                            <li><a href="#">Data Warga</a></li>
                            <li class="active">Warga Pemuda</li>
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
                        <strong class="card-title">Filter Data Pemuda</strong>
                    </div>
                    <div class="card-body">
                        <div id="cFilter" class='container-fluid flex-row flex-nowrap'>
                            <div class="row">
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">Nomor KK</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">NIK</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                                <div class="col-sm-3" hidden>
                                    <div class="form-group">
                                        <label class="control-label">RW</label>
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

                                <div class="col-sm-3" >
                                    <div class="form-group">
                                        <label class="control-label">Usia Min.</label>
                                        <select class='select form-control excludedFromCustomFilter'>
                                            <option></option>
                                            @for($i = 16; $i < 30; $i++)
                                            <option value="{{ $i }}"> {{$i}} </option>
                                            @endfor()
                                        </select>
                                        {{-- <input class="input form-control col-sm-4 text-left"></input> --}}
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group row">
                                        <label class="col-sm-4 ">Usia Maks.</label>
                                        <select class='select form-control excludedFromCustomFilter'>
                                            <option></option>
                                            @for($i = 16; $i < 30; $i++)
                                            <option value="{{ $i }}"> {{$i}} </option>
                                            @endfor()
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Status Kawin</label>
                                        <select class="select form-control"></select>
                                    </div>
                                </div>
                               
                                <div class="col-sm-2 text-center">
                                    <button class='btn btn-primary' style="font-size: 12px" onclick="cFilterKarangtaruna()">Filter</button>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>


             <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Tabel Pemuda</strong>
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
                                    <th>Usia</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status Kawin</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $data_induk as $w )
                                <tr>
                                    <td>{{$w->no_kk}}</td>
                                    <td>{{$w->no_ktp}}</td>
                                    <td>{{$w->no_rw}}</td>
                                    <td>{{$w->no_rt}}</td>
                                    <td>{{$w->nm_panggilan}}</td>
                                    <td>{{$w->usia}}</td>
                                    <td>{{$w->j_kelamin}}</td>
                                    <td>{{$w->status_kawin}}</td>

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
@section('customscript')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // tab = $('#bootstrap-data-table').DataTable()
        // // tab.column(6).visible(false)
        // tab.columns.adjust();
        // // tab.column(0).search("^" + '[]' + "$", true, false).draw()
        // // tab.column(5).search(false).draw()




        // var DateFilterFunction = (function (oSettings, aData, iDataIndex) {
        //     var dateStart = 7
        //     var dateEnd = 8

        //     console.log('Start')
        //     console.log(aData)
        //     var evalDate = aData[5]

        //     if ((isNaN(dateStart) && isNaN(dateEnd)) ||
        //         (isNaN(dateStart) && evalDate <= dateEnd) ||
        //         (dateStart <= evalDate && isNaN(dateEnd)) ||
        //         (dateStart <= evalDate && evalDate <= dateEnd)) {
        //         return true;
        //     }
        //     return false;
        // });


        // start_date = 7
        // end_date = 8
        // $.fn.dataTableExt.afnFiltering.push(DateFilterFunction);
        // tab.draw();
        /* Custom filtering function which will search data in column four between two values */
        $.fn.dataTable.ext.search.push(
            function (settings, data, dataIndex) {
                // var min = parseInt($('#min').val(), 10);
                // var max = parseInt($('#max').val(), 10);
                // var age = parseFloat(data[3]) || 0; // use data for the age column

                var currentState = false
                
                var no_kk = $($('#cFilter').find('select')[0]).val()
                var no_ktp = $($('#cFilter').find('select')[1]).val()
                var no_rw = $($('#cFilter').find('select')[2]).val()
                var no_rt = $($('#cFilter').find('select')[3]).val()
                var nm_panggilan = $($('#cFilter').find('select')[4]).val()
                var usia = $($('#cFilter').find('select')[5]).val()
                var j_kelamin = $($('#cFilter').find('select')[6]).val()
                var status_kawin = $($('#cFilter').find('select')[7]).val()

                var min = $($('#cFilter').find('select')[5]).val()
                var max = $($('#cFilter').find('select')[6]).val()

                if(!isNotNull(min) && !isNotNull(max) && !isNotNull(status_kawin)){
                    return true;
                }

                //not set
                //not found
                //founded
                var gotusia = null
                if(isNotNull(min) && isNotNull(max)){
                    if(data[5] >= min && data[5] <= max){
                        gotusia = true
                    }else{
                        gotusia = false
                    }
                }else if(isNotNull(min)){
                    if(data[5] >= min){
                        gotusia = true
                    }else{
                        gotusia = false
                    }
                }else if(isNotNull(max)){
                    if(data[5] <= max){
                        gotusia = true
                    }else{
                        gotusia = false
                    }
                }

                var gotstatus_kawin = null
                if(isNotNull(status_kawin)){
                    if(data[7] === status_kawin){
                        gotstatus_kawin = true
                    }else{
                        gotstatus_kawin = false
                    }
                }
                // debugger
                
                if (gotusia === false || gotstatus_kawin === false){
                    return false
                } else if(gotusia && gotstatus_kawin === null){
                    return gotusia
                } else if(gotstatus_kawin && gotusia === null){
                    return gotstatus_kawin
                } else if(gotusia && gotstatus_kawin){
                    return true
                }else{
                    return false
                }
            }
        );

        function isNotNull(input){
            let result = true
            if(input === ''){
                result = false
            }else if(input === undefined){
                result = false
            }else if(input === null){
                result = false
            }
            return result
        }



        // $(document).ready(function () {
        //     var table = $('#example').DataTable();

        //     // Event listener to the two range filtering inputs to redraw on input
        //     $('#min, #max').keyup(function () {
        //         table.draw();
        //     });
        // });
    })

    function cFilterKarangtaruna() {
        try {
            // tab = $('#bootstrap-data-table').DataTable()

            // $('#cFilter').find('select').each(function (i, e) {
            //     if ($(e).val() !== '') {
            //         tab.column(i).search("^" + $(e).val() + "$", true, false).draw()
            //     } else {
            //         tab.column(i).search($(e).val(), true, false).draw()
            //     }
            // })

            tab = $('#bootstrap-data-table').DataTable()
            tab.draw();
        } catch (er) {

        }
    }

</script>
@endsection
