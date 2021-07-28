@extends('layout/paan',[
'InfoPage' => [
'Navbar' => '/edit_data_induk'
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
            <input type="hidden" name="id" value="{{$edit->kd_induk}}">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <h2><strong>Edit Data Warga</strong></h2>
                                <hr> <br>
                                <div class="row form-group" hidden>
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Kode Induk</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="kd_induk" name="kodeinduk" placeholder="Kode Induk" class="form-control" required value="{{$edit->kd_induk}}" readonly></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>NIK</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="nomorktp" name="nomorktp" placeholder="Nomor KTP" class="form-control" required value="{{$edit->no_ktp}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nomor Kartu Keluarga</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="no_kk" name="nomorkk" placeholder="Nomor Kartu Keluarga" class="form-control" required value="{{$edit->no_kk}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Nama Lengkap</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="nmlkp" name="namalengkap" placeholder="Nama Lengkap" class="form-control" required value="{{$edit->nama}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Panggilan</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="nmpgl" name="namapanggilan" placeholder="Nama Panggilan" class="form-control" required value="{{$edit->nm_panggilan}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Status Hubungan</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="hubungan" id="hubungan" class="form-control" value="">
                                            <option value="Kepala Keluarga"{{ 'Kepala Keluarga'    == $edit->status_hub_kk ? 'selected' : ''}}>Kepala Keluarga</option>
                                            <option value="Istri"{{ 'Istri'    == $edit->status_hub_kk ? 'selected' : ''}}>Istri</option>
                                            <option value="Anak"{{ 'Anak'    == $edit->status_hub_kk ? 'selected' : ''}}>Anak</option>
                                            <option value="Orang Tua"{{ 'Orang Tua'    == $edit->status_hub_kk ? 'selected' : ''}}>Orang Tua</option>
                                            <option value="Menantu"{{ 'Menantu'    == $edit->status_hub_kk ? 'selected' : ''}}>Menantu</option>
                                            <option value="Cucu"{{ 'Cucu'    == $edit->status_hub_kk ? 'selected' : ''}}>Cucu</option>
                                            <option value="Lain-lain"{{ 'Lain-lain'    == $edit->status_hub_kk ? 'selected' : ''}}>Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Tempat Lahir</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="tempatlahir" name="tempatlahir" placeholder="Tempat Lahir" class="form-control" required value="{{$edit->tmp_lahir}}"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Tanggal Lahir</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="date" id="date" name="date" placeholder="Tanggal Lahir" class="form-control" required value="{{$edit->tgl_lahir}}"></div>
                                </div>



                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Jenis Kelamin</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                                            <option value="Laki-laki"{{ 'Laki-laki'    == $edit->j_kelamin ? 'selected' : ''}}>Laki-laki</option>
                                            <option value="Perempuan"{{ 'Perempuan'    == $edit->j_kelamin ? 'selected' : ''}}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Agama</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="kodeagama" id="kodeagama" class="form-control">
                                            <option value="0"{{ '0'    == $edit->kd_agama ? 'selected' : ''}}>Default</option>
                                            <option value="1"{{ '1'    == $edit->kd_agama ? 'selected' : ''}}>Islam</option>
                                            <option value="2"{{ '2'    == $edit->kd_agama ? 'selected' : ''}}>Kristen</option>
                                            <option value="3"{{ '3'    == $edit->kd_agama ? 'selected' : ''}}>Katolik</option>
                                            <option value="4"{{ '4'    == $edit->kd_agama ? 'selected' : ''}}>Hindu</option>
                                            <option value="5"{{ '5'    == $edit->kd_agama ? 'selected' : ''}}>Budha</option>
                                            <option value="6"{{ '6'    == $edit->kd_agama ? 'selected' : ''}}>Konghucu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Pendidikan</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="kodependidikan" id="kodependidikan" class="form-control">
                                            <option value="0"{{ '0'    == $edit->kd_pendidikan ? 'selected' : ''}}>Default</option>
                                            <option value="1"{{ '1'    == $edit->kd_pendidikan ? 'selected' : ''}}>Akademi/Diploma II/Sarjana Muda</option>
                                            <option value="2"{{ '2'    == $edit->kd_pendidikan ? 'selected' : ''}}>Akademi/Diploma III/Sarjana Muda</option>
                                            <option value="3"{{ '3'    == $edit->kd_pendidikan ? 'selected' : ''}}>Belum Tamat SD/Sederajat</option>
                                            <option value="4"{{ '4'    == $edit->kd_pendidikan ? 'selected' : ''}}>Diploma IV/Strata I</option>
                                            <option value="5"{{ '5'    == $edit->kd_pendidikan ? 'selected' : ''}}>SLTA/Sederajat</option>
                                            <option value="6"{{ '6'    == $edit->kd_pendidikan ? 'selected' : ''}}>SLTP/Sederajat</option>
                                            <option value="7"{{ '7'    == $edit->kd_pendidikan ? 'selected' : ''}}>Strata II</option>
                                            <option value="8"{{ '8'    == $edit->kd_pendidikan ? 'selected' : ''}}>Tamat SD/Sederajat</option>
                                            <option value="9"{{ '9'    == $edit->kd_pendidikan ? 'selected' : ''}}>Tidak/Belum Sekolah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Pekerjaan</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="kodepekerjaan" id="kodepekerjaan" class="form-control">
                                            <option value="0"{{ '0'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Default</option>
                                            <option value="1"{{ '1'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Arsitek</option>
                                            <option value="2"{{ '2'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Belum/Tidak Bekerja</option>
                                            <option value="3"{{ '3'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Buruh Harian Lepas</option>
                                            <option value="4"{{ '4'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Buruh Tani/Perkebunan</option>
                                            <option value="5"{{ '5'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Guru/Dosen</option>
                                            <option value="6"{{ '6'    == $edit->kd_pekerjaan ? 'selected' : ''}}>IRT</option>
                                            <option value="7"{{ '7'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Karyawan BUMN</option>
                                            <option value="8"{{ '8'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Karyawan Swasta</option>
                                            <option value="9"{{ '9'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Pelajar/Mahasiswa</option>
                                            <option value="10"{{ '10'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Pensiunan</option>
                                            <option value="11"{{ '11'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Perdagangan</option>
                                            <option value="12"{{ '12'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Pegawai Negeri Sipil</option>
                                            <option value="13"{{ '13'    == $edit->kd_pekerjaan ? 'selected' : ''}}>POLRI</option>
                                            <option value="14"{{ '14'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Seniman</option>
                                            <option value="15"{{ '15'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Sopir</option>
                                            <option value="16"{{ '16'    == $edit->kd_pekerjaan ? 'selected' : ''}}>TNI</option>
                                            <option value="17"{{ '17'    == $edit->kd_pekerjaan ? 'selected' : ''}}>Wiraswasta</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Status Kawin</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="statuskawin" id="statuskawin" class="form-control">
                                            <option value="Belum Kawin"{{ 'Belum Kawin'    == $edit->status_kawin ? 'selected' : ''}}>Belum Kawin</option>
                                            <option value="Kawin"{{ 'Kawin'    == $edit->status_kawin ? 'selected' : ''}}>Kawin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Status Mukim</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="statusmukim" name="statusmukim" placeholder="Keterangan Mukim" class="form-control" required value="{{$edit->status_mukim}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Keterangan Mukim</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="keteranganmukim" name="keteranganmukim" placeholder="Keterangan Mukim" class="form-control" required value="{{$edit->keterangan_mukim}}"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Level Ekonomi</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="levelekonomi" id="levelekonomi" class="form-control">
                                            <option value="0"{{ '0'    == $edit->kd_level_ekonomi ? 'selected' : ''}}>Default</option>
                                            <option value="1"{{ '1'    == $edit->kd_level_ekonomi ? 'selected' : ''}}>Menengah Kebawah</option>
                                            <option value="2"{{ '2'    == $edit->kd_level_ekonomi ? 'selected' : ''}}>Menengah</option>
                                            <option value="3"{{ '3'    == $edit->kd_level_ekonomi ? 'selected' : ''}}>Menengah Keatas</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Golongan Darah</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="golongandarah" name="golongandarah" placeholder="Golongan Darah" class="form-control" required value="{{$edit->gol_darah}}"></div>
                                </div>

                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Latin</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="bacalatin" id="bacalatin" class="form-control">
                                            <option value="Ya"{{ 'Ya'    == $edit->is_latin ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_latin ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Hijaiyah</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="bacahijaiyah" id="bacahijaiyah" class="form-control">
                                            <option value="Ya"{{ 'Ya'    == $edit->is_hijaiyah ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_hijaiyah ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Iqra</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="bacaiqra" id="bacaiqra" class="form-control">
                                            <option value="Ya"{{ 'Ya'    == $edit->is_iqra ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_iqra ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Baca Al-Qur'an</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="bacaquran" id="bacaquran" class="form-control">
                                            <option value="Ya"{{ 'Ya'    == $edit->is_quran ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_quran? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Sholat 5 Waktu</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="sholat" id="sholat" class="form-control">
                                            <<option value="Ya"{{ 'Ya'    == $edit->is_5waktu ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_5waktu ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Sholat Berjamaah</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="sholatjamaah" id="sholatjamaah" class="form-control">
                                            <option value="Ya"{{ 'Ya'    == $edit->is_jamaah ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_jamaah ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Zakat Fitrah</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="zakatfitrah" id="zakatfitrah" class="form-control">
                                            <option value="Ya"{{ 'Ya'    == $edit->is_zakat_fitrah ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_zakat_fitrah ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Zakat Mal</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="zakatmal" id="zakatmal" class="form-control">
                                            <<option value="Ya"{{ 'Ya'    == $edit->is_zakat_mal ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_zakat_mal ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Kurban</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="kurban" id="kurban" class="form-control">
                                            <option value="Ya"{{ 'Ya'    == $edit->is_qurban ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_qurban ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Haji</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="haji" id="haji" class="form-control">
                                            <option value="Ya"{{ 'Ya'    == $edit->is_haji ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_haji ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Umrah</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="umrah" id="umrah" class="form-control">
                                            <option value="Ya"{{ 'Ya'    == $edit->is_umrah ? 'selected' : ''}}>Ya</option>
                                            <option value="Tidak"{{ 'Tidak'    == $edit->is_umrah ? 'selected' : ''}}>Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label"><strong>Kode RT</strong></label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="kodert" id="kodert" class="form-control" value="{{$edit->kd_rt}}">
                                            <option value="0"{{ '0'    == $edit->kd_rt ? 'selected' : ''}}>0</option>
                                            <option value="1"{{ '0'    == $edit->kd_rt ? 'selected' : ''}}>1</option>
                                            <option value="2"{{ '0'    == $edit->kd_rt ? 'selected' : ''}}>2</option>
                                            <option value="13"{{ '0'    == $edit->kd_rt ? 'selected' : ''}}>13</option>

                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label"><strong>Status</strong></label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="status" name="status" placeholder="Status" class="form-control" required value="{{$edit->status}}"></div>
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