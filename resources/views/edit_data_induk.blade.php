@extends('layout/paan',[
'InfoPage' => [
'Navbar' => '/transaksi'
]])
@section('title', 'Form Edit Anggota')

@section('container')
<div class="content">
    <div class="animated fadeIn">
        @if(Session::has('post_update'))
        <span>{{Session::get('post_update')}}</span>
        @endif
        <form method="post" action="{{route('updatedi.post')}}">
            @csrf
            <input type="hidden" name="id" value="{{$post->kd_induk}}">

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
                                    <div class="col-12 col-md-9"><input type="text" id="kd_induk" name="kodeinduk" placeholder="Kode Induk" class="form-control" required value="{{$post->kd_induk}}" readonly></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nomor Kartu Keluarga</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="no_kk" name="nomorkk" placeholder="Nomor Kartu Keluarga" class="form-control" required value="{{$post->no_kk}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nama Lengkap</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="nmlkp" name="namalengkap" placeholder="Nama Lengkap" class="form-control" required value="{{$post->nama}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nama Panggilan</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="nmpgl" name="namapanggilan" placeholder="Nama Panggilan" class="form-control" required value="{{$post->nm_panggilan}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Status Hubungan Kartu Keluarga</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="hubungan" id="hubungan" class="form-control" value="{{$post->status_hub_kk}}">
                                            <option value="Kepala Keluarga">Kepala Keluarga</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Orang Tua">Orang Tua</option>
                                            <option value="Menantu">Menantu</option>
                                            <option value="Cucu">Cucu</option>
                                            <option value="Lain-lain">Lain-lain</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Tempat Lahir</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir" class="form-control" required value="{{$post->tmp_lahir}}"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Tanggal Lahir</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="date" name="date" placeholder="Tanggal Lahir" class="form-control" required value="{{$post->tgl_lahir}}"></div>
                                </div>



                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Jenis Kelamin</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="jeniskelamin" id="jeniskelamin" class="form-control" value="{{$post->j_kelamin}}">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Kode Agama</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="kodeagama" id="kodeagama" class="form-control" value="{{$post->kd_agama}}">
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
                                        <select name="kodependidikan" id="kodependidikan" class="form-control" value="{{$post->kd_pendidikan}}">
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
                                        <select name="kodepekerjaan" id="kodepekerjaan" class="form-control" value="{{$post->kd_pekerjaan}}">
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
                                        <select name="statuskawin" id="statuskawin" class="form-control" value="{{$post->status_kawin}}">
                                            <option value="0">Belum Kawin</option>
                                            <option value="1">Kawin</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Status Mukim</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="statusmukim" name="statusmukim" placeholder="Keterangan Mukim" class="form-control" required value="{{$post->status_mukim}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Keterangan Mukim</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="keteranganmukim" name="keteranganmukim" placeholder="Keterangan Mukim" class="form-control" required value="{{$post->keterangan_mukim}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Level Ekonomi</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="levelekonomi" id="levelekonomi" class="form-control" value="{{$post->kd_level_ekonomi}}">
                                            <option value="0">0 - Default</option>
                                            <option value="1">1 - Menengah Kebawah</option>
                                            <option value="2">2 - Menengah</option>
                                            <option value="3">3 - Menengah Keatas</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Golongan Darah</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="golongandarah" name="golongandarah" placeholder="Golongan Darah" class="form-control" required value="{{$post->gol_darah}}"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Latin</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="bacalatin" id="bacalatin" class="form-control" value="{{$post->is_latin}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Hijaiyah</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="bacahijaiyah" id="bacahijaiyah" class="form-control" value="{{$post->is_hijaiyah}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Iqra</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="bacaiqra" id="bacaiqra" class="form-control" value="{{$post->is_iqra}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Al-Qur'an</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="bacaquran" id="bacaquran" class="form-control" value="{{$post->is_quran}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Sholat 5 Waktu</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="sholat" id="sholat" class="form-control" value="{{$post->is_5waktu}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Sholat Berjamaah</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="sholatjamaah" id="sholatjamaah" class="form-control" value="{{$post->is_jamaah}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Zakat Fitrah</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="zakatfitrah" id="zakatfitrah" class="form-control" value="{{$post->is_zakat_fitrah}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Zakat Mal</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="zakatmal" id="zakatmal" class="form-control" value="{{$post->is_zakat_mal}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Kurban</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="kurban" id="kurban" class="form-control" value="{{$post->is_qurban}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Haji</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="haji" id="haji" class="form-control" value="{{$post->is_haji}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Umrah</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="umrah" id="umrah" class="form-control" value="{{$post->is_umrah}}">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Kode RT</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="kodert" id="kodert" class="form-control" value="{{$post->kd_rt}}">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="13">13</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nomor KTP</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="nomorktp" name="nomorktp" placeholder="Nomor KTP" class="form-control" required value="{{$post->no_ktp}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Status</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="status" name="status" placeholder="Status" class="form-control" required value="{{$post->status}}"></div>
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
@endsection