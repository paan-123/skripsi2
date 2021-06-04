@extends('layout/paan')
@section('title', 'Form')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">


    </aside><!-- /#left-panel -->


    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <div class="content">
            <div class="animated fadeIn">
                @if(Session::has('post_add')) 
                <span>{{Session::get('post_add')}}</span>
                @endif
                <form method="post" action="{{route('savedi.post')}}">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    Form Input <strong>Data Induk</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Kode Induk</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="kodeinduk" placeholder="Kode Induk" class="form-control"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nomor Kartu Keluarga</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="nomorkk" placeholder="Nomor Kartu Keluarga" class="form-control" required></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nama Lengkap</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="namalengkap" placeholder="Nama Lengkap" class="form-control" required></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nama Panggilan</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="namapanggilan" placeholder="Nama Panggilan" class="form-control" required></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Status Hubungan Kartu Keluarga</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="hubungan" id="select" class="form-control">
                                                    <option value="Ayah/Kepala Keluarga">Ayah/Kepala Keluargra</option>
                                                    <option value="Istri/Ibu">Istri/Ibu</option>
                                                    <option value="Saudara Laki-laki/Perempuan">Saudara Laki-laki/Perempuan</option>
                                                    <option value="Suami/Istri">Suami/Istri</option>
                                                    <option value="Anak">Anak</option>
                                                    <option value="Saudara Lainnya">Saudara Lain(Paman, Bibi, Sepupu, Keponakan, dll)</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Tempat Lahir</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="tempatlahir" placeholder="Tempat Lahir" class="form-control" required></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Tanggal Lahir</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="date" id="date" name="date" placeholder="Tempat Lahir" class="form-control" required></div>
                                        </div>



                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Jenis Kelamin</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="jeniskelamin" id="select" class="form-control">
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Kode Agama</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="kodeagama" id="kodeagama" class="form-control">
                                                    <option value="0">0 - Default</option>
                                                    <option value="1">1 - Muslim</option>
                                                    <option value="2">2 - Protestan</option>
                                                    <option value="3">3 - Katolik</option>
                                                    <option value="4">4 - Hindu</option>
                                                    <option value="5">5 - Budha</option>
                                                    <option value="6">6 - Konghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Kode Pendidikan</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="kodependidikan" id="select" class="form-control">
                                                    <option value="0">0 - Default</option>
                                                    <option value="1">1 - Sekolah Dasar</option>
                                                    <option value="2">2 - SLTP/Sederajat</option>
                                                    <option value="3">3 - SLTA/Sederajat</option>
                                                    <option value="4">4 - S1</option>
                                                    <option value="5">5 - S2</option>
                                                    <option value="6">6 - S3</option>
                                                    <option value="7">7 - Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Kode Pekerjaan</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="kodepekerjaan" id="select" class="form-control">
                                                    <option value="0">0 - Default</option>
                                                    <option value="1">1 - TNI/Polri</option>
                                                    <option value="1">2 - Pegawai Negeri Sipil</option>
                                                    <option value="1">3 - Pegawai BUMN</option>
                                                    <option value="1">4 - Guru/Dosen</option>
                                                    <option value="1">5 - Karyawan Swasta</option>
                                                    <option value="1">6 - Pelajar Mahasiswa</option>
                                                    <option value="1">7 - Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Status Kawin</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="statuskawin" id="select" class="form-control">
                                                    <option value="0">Belum Kawin</option>
                                                    <option value="1">Kawin</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Status Mukim</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="statusmukim" placeholder="Keterangan Mukim" class="form-control" required></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Keterangan Mukim</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="keteranganmukim" placeholder="Keterangan Mukim" class="form-control" required></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Level Ekonomi</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="levelekonomi" id="select" class="form-control">
                                                    <option value="0">0 - Default</option>
                                                    <option value="1">1 - Menengah Kebawah</option>
                                                    <option value="2">2 - Menengah</option>
                                                    <option value="3">3 - Menengah Keatas</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Golongan Darah</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="golongandarah" placeholder="Golongan Darah" class="form-control" required></div>
                                        </div>

                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Latin</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="bacalatin" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Hijaiyah</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="bacahijaiyah" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Iqra</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="bacaiqra" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Al-Qur'an</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="bacaquran" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Sholat 5 Waktu</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="sholat" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Sholat Berjamaah</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="sholatjamaah" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Zakat Fitrah</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="zakatfitrah" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Zakat Mal</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="zakatmal" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Kurban</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="kurban" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Haji</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="haji" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Umrah</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="umrah" id="select" class="form-control">
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Kode RT</strong></label></div>
                                            <div class="col-12 col-md-9">
                                                <select name="kodert" id="select" class="form-control">
                                                    <option value="0">0</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nomor KTP</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="nomorktp" placeholder="Nomor KTP" class="form-control" required></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Status</strong></label></div>
                                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="status" placeholder="Status" class="form-control" required></div>
                                        </div>


                                        <input type="submit" value="Submit">
                                    </form>
                                </div>
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