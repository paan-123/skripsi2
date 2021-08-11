<?php

namespace App\Http\Controllers;

use App\Models\Data_kk;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
// use App\Models\KeahlianJamaah;

class JamaahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datainduk()
    {
        $data_induk = DB::table('datainduk')->get();
        return view('data_induk', compact('data_induk'));
    }


    public function data_induk()
    {
        $datainduk = DB::table('datainduk')
            ->join('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->select(
                'datainduk.no_kk',
                'datainduk.no_ktp',
                'md_rt.no_rw',
                'md_rt.no_rt',
                'datainduk.nama',
                'datainduk.nm_panggilan',
                'datainduk.tmp_lahir',
                'datainduk.tgl_lahir',
                'datainduk.j_kelamin',
                'datainduk.status_hub_kk',
                'datainduk.status_mukim',
                'datainduk.status'
            )
            ->get();
        // dd($datainduk);
        return view('datainduk', compact('datainduk'));
    }

    public function datakk()
    {
        $data_kk = Data_kk::Join('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'data_kk.kd_level_ekonomi')
            ->select('data_kk.no_kk', 'data_kk.nm_kk', 'data_kk.no_rw', 'data_kk.no_rt', 'data_kk.kd_rumah', 'md_level_ekonomi.nama_level', 'data_kk.keterangan')
            ->get();
        return view('data_kk', ['data_kk' => $data_kk]);
    }


    public function mdrumah()
    {
        $md_rumah = DB::table('md_rumah')->get();
        return view('/md/md_rumah/md_rumah', ['md_rumah' => $md_rumah]);
    }

    public function mdrw()
    {
        $md_rw = DB::table('md_rw')->get();
        return view('/md/md_rw/md_rw', ['md_rw' => $md_rw]);
    }

    public function mdrt()
    {
        $md_rt = DB::table('md_rt')->get();
        return view('/md/md_rt/md_rt', ['md_rt' => $md_rt]);
    }

    public function mdagama()
    {
        $md_agama = DB::table('md_agama')->get();
        return view('/md/md_agama/md_agama', ['md_agama' => $md_agama]);
    }

    public function mdpekerjaan()
    {
        $md_pekerjaan = DB::table('md_pekerjaan')->get();
        return view('/md/md_pekerjaan/md_pekerjaan', ['md_pekerjaan' => $md_pekerjaan]);
    }

    public function mdpendidikan()
    {
        $md_pendidikan = DB::table('md_pendidikan')->get();
        return view('/md/md_pendidikan/md_pendidikan', ['md_pendidikan' => $md_pendidikan]);
    }

    public function mdkeahlian()
    {
        $md_keahlian = DB::table('md_keahlian')->get();
        return view('/md/md_keahlian/md_keahlian', ['md_keahlian' => $md_keahlian]);
    }


    public function join()
    {
        $join = DB::table('md_rt')
            ->join('md_rumah', 'md_rt.kd_rt', '=', 'md_rumah.kd_rumah')
            ->select('md_rt.no_rw', 'md_rt.no_rt', 'md_rumah.no_rumah', 'md_rumah.nama_kk', 'md_rumah.jml_penghuni')
            ->get();

        return view('table', ['join' => $join]);
    }

    public function joindkdi()
    {
        $join = Data_kk::leftJoin('datainduk', 'datainduk.no_kk', '=', 'data_kk.no_kk')
            ->select('data_kk.no_kk', 'data_kk.no_rt', 'data_kk.no_rw', 'data_kk.nm_kk', 'data_kk.keterangan')
            ->distinct()
            ->get();
        return view('transaksi', ['dkdi' => $join]);
    }

    public function joinkj() ///KEAHLIAN JAMAAH///
    {
        $join =  DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            // ->leftJoin('md_rt', 'datainduk.kd_rt', '=', 'md_rt.kd_rt')
            ->select(
                'datainduk.no_kk',
                'datainduk.no_ktp',
                'datainduk.kd_rt',
                // 'md_rt.no_rw',
                'datainduk.nama',
                'datainduk.nm_panggilan',
                'md_keahlian.nama_keahlian',
                'data_keahlian_warga.level_sertifikat',
                'data_keahlian_warga.deskripsi_sertifikat'
            )
            ->get();

        return view('data_keahlian', ['keahlian' => $join]);
    }

    public function joingd() ///GOLONGAN DARAH///
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->leftJoin('md_rumah', 'md_rumah.kd_rt', '=', 'datainduk.kd_rt')
            ->select('md_rt.no_rw', 'md_rt.no_rt', 'md_rumah.no_rumah', 'datainduk.nama', 'datainduk.nm_panggilan', 'datainduk.gol_darah')
            ->get();
        return view('golongan_darah', ['gdarah' => $join]);
    }

    public function joinpk() ///PEKERJAAN///
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_pekerjaan', 'md_pekerjaan.kd_pekerjaan', '=', 'datainduk.kd_pekerjaan')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->get();
        return view('pekerjaan', ['pkj' => $join]);
    }

    public function keahlian()
    {
        $keahlian =  DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            // ->leftJoin('md_rt', 'datainduk.kd_rt', '=', 'md_rt.kd_rt')
            ->select(

                'data_keahlian_warga.id',
                'data_keahlian_warga.kd_keahlian',
                'datainduk.kd_induk',
                'datainduk.no_kk',
                'datainduk.no_ktp',
                'datainduk.kd_rt',
                // 'md_rt.no_rw',
                'datainduk.nama',
                'datainduk.nm_panggilan',
                'md_keahlian.nama_keahlian',
                'data_keahlian_warga.is_sertifikat',
                'data_keahlian_warga.level_sertifikat',
                'data_keahlian_warga.deskripsi_sertifikat'
            )
            ->get();
        return view('/keahlian', ['keahlian' => $keahlian]);
    }

    public function ibadah()
    {
        $ibadah = DB::table('datainduk')
            ->leftjoin('md_agama', 'md_agama.kd_agama', '=', 'datainduk.kd_agama')
            ->leftjoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->get();
        return view('ibadah', ['ibadah' => $ibadah]);
    }

    public function joinpd() ///PENDIDIKAN///
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_pendidikan', 'md_pendidikan.kd_pendidikan', '=', 'datainduk.kd_pendidikan')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->get();
        return view('pendidikan', ['pd' => $join]);
    }
    public function baca() ///PENDIDIKAN///
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_pendidikan', 'md_pendidikan.kd_pendidikan', '=', 'datainduk.kd_pendidikan')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->get();
        // $join = '';
        return view('baca', ['pd' => $join]);
    }

    public function transaksi_datakk()
    {
        $data_kk = DB::table('data_kk')->get();
        return view('transaksi', ['data_kk' => $data_kk]);
    }



    public function cariTransaksi(Request $request)
    {
        if (empty($request->post())) {
            $data = DB::table('datainduk')
                ->leftJoin('data_kk', 'data_kk.no_kk', '=', 'datainduk.no_kk')
                ->get();
        } else {
            $data = DB::table('datainduk')
                ->leftJoin('data_kk', 'data_kk.no_kk', '=', 'datainduk.no_kk')
                ->where('data_kk.no_kk', $request->nomorkk)
                ->orwhere('data_kk.no_rt', $request->nomorrt)
                ->orwhere('data_kk.no_rw', $request->nomorrw)
                ->get();
        }
        return view('transaksi', compact('data'));
    }

    public function editTransaksi(Request $request)
    {
        if (empty($request->kd_induk)) {
            $data = DB::table('datainduk')
                ->leftJoin('data_kk', 'data_kk.no_kk', '=', 'datainduk.no_kk')
                ->get();
            $data_induk = [];
        } else {
            $data = DB::table('datainduk')
                ->leftJoin('data_kk', 'data_kk.no_kk', '=', 'datainduk.no_kk')
                ->get();
            $data_induk = DB::table('datainduk')
                ->leftJoin('data_kk', 'data_kk.no_kk', '=', 'datainduk.no_kk')
                ->where('kd_induk', $request->kd_induk)
                ->get();
        }

        return view('transaksi', compact('data', 'data_induk'));
    }


    public function simpanEditTransaksi()
    {
        //untuk nyimpen
    }


    public function updateIndukTransaksi(Request $request)
    {
        DB::table('datainduk')->where('kd_induk', $request->kodeinduk)->update([
            'kd_induk'          => $request->kodeinduk,
            'no_kk'             => $request->nomorkk,
            'nama'              => $request->namalengkap,
            'nm_panggilan'      => $request->namapanggilan,
            'status_hub_kk'     => $request->hubungan,
            'tmp_lahir'         => $request->tempatlahir,
            'tgl_lahir'         => $request->date,
            'j_kelamin'         => $request->jeniskelamin,
            'kd_agama'          => $request->kodeagama,
            'kd_pendidikan'     => $request->kodependidikan,
            'kd_pekerjaan'      => $request->kodepekerjaan,
            'status_kawin'      => $request->statuskawin,
            'status_mukim'      => $request->statusmukim,
            'keterangan_mukim'  => $request->keteranganmukim,
            'kd_level_ekonomi'  => $request->levelekonomi,
            'gol_darah'         => $request->golongandarah,
            'is_latin'          => $request->bacalatin,
            'is_hijaiyah'       => $request->bacahijaiyah,
            'is_iqra'           => $request->bacaiqra,
            'is_quran'          => $request->bacaquran,
            'is_5waktu'         => $request->sholat,
            'is_jamaah'         => $request->sholatjamaah,
            'is_zakat_fitrah'   => $request->zakatfitrah,
            'is_zakat_mal'      => $request->zakatmal,
            'is_qurban'         => $request->kurban,
            'is_haji'           => $request->haji,
            'is_umrah'          => $request->umrah,
            'kd_rt'             => $request->kodert,
            'no_ktp'            => $request->nomorktp,
            'status'            => $request->status,
        ]);

        $data = DB::table('datainduk')
            ->leftJoin('data_kk', 'data_kk.no_kk', '=', 'datainduk.no_kk')
            ->get();


        return view('transaksi', compact('data'));
    }



    public function birthCounter($dt)
    {
        $dt_born = Carbon::parse($dt);
        $dt_now = Carbon::now();
        $dt_age = $dt_born->diffInYears($dt_now);
        return $dt_age;
    }

    public function ageCategory($age)
    {
        if ($age <= 16) :
            return 'Anak-anak';
        elseif ($age <= 30) :
            return 'Remaja';
        elseif ($age <= 55) :
            return 'Dewasa';
        else :
            return 'Manula';
        endif;
    }
    //=========================================RED RW=======================================//
    public function home()
    {
        $counter = [];
        $counter['age'] = [];
        $counter['age']['Anak-anak'] = 0;
        $counter['age']['Remaja'] = 0;
        $counter['age']['Dewasa'] = 0;
        $counter['age']['Manula'] = 0;
        $counter['total'] = 0;


        $data_kk = DB::table('data_kk')
            ->count();


        $laki = DB::table('datainduk')
            ->where('datainduk.j_kelamin', '=', 'Laki-laki')
            ->count();

        $perempuan = DB::table('datainduk')
            ->where('datainduk.j_kelamin', '=', 'Perempuan')
            ->count();

        $rumah = DB::table('md_rumah')
            ->count();

        $data = DB::table('datainduk')
            ->select('tgl_lahir')
            ->get();


        foreach ($data as $row) {
            $ageCategory = $this->ageCategory($this->birthCounter($row->tgl_lahir));
            if ($ageCategory == 'Anak-anak') {
                // array_push($counter['age']['Anak-anak'], $row->tgl_lahir);
                $counter['age']['Anak-anak']++;
            } elseif ($ageCategory == 'Remaja') {
                $counter['age']['Remaja']++;
            } elseif ($ageCategory == 'Dewasa') {
                $counter['age']['Dewasa']++;
            } elseif ($ageCategory == 'Manula') {
                $counter['age']['Manula']++;
            }

            $counter['total']++;
        }



        return view('/red_rw/home', [
            "counter" => $counter,
            "data_kk" => $data_kk,
            "laki" => $laki,
            "perempuan" => $perempuan,
            "rumah" => $rumah,

        ]);
    }

    public function warga()
    {
        $warga = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->get();
        return view('/red_rw/warga', ['warga' => $warga]);
    }

    public function data_kk()
    {
        $kk = Data_kk::Join('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'data_kk.kd_level_ekonomi')
            ->select('data_kk.no_kk', 'data_kk.nm_kk', 'data_kk.no_rw', 'data_kk.no_rt', 'data_kk.kd_rumah', 'md_level_ekonomi.nama_level', 'data_kk.keterangan')
            ->get();
        return view('/red_rw/datakk', ['kk' => $kk]);
    }

    public function ekonomi()
    {
        $ekonomi = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->get();
        return view('/red_rw/ekonomi', ['ekonomi' => $ekonomi]);
    }

    public function pekerjaan()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->leftJoin('md_pekerjaan', 'md_pekerjaan.kd_pekerjaan', '=', 'datainduk.kd_pekerjaan')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->get();
        return view('/red_rw/pekerjaan', ['pekerjaan' => $join]);
    }

    public function pendidikan()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->leftJoin('md_pendidikan', 'md_pendidikan.kd_pendidikan', '=', 'datainduk.kd_pendidikan')
            ->get();
        return view('/red_rw/pendidikan', ['pendidikan' => $join]);
    }

    public function agama()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->leftJoin('md_agama', 'md_agama.kd_agama', '=', 'datainduk.kd_agama')
            ->get();
        return view('/red_rw/agama', ['agama' => $join]);
    }

    public function rwkeahlian()
    {
        $keahlian =  DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            // ->leftJoin('md_rt', 'datainduk.kd_rt', '=', 'md_rt.kd_rt')
            ->select(

                'data_keahlian_warga.id',
                'data_keahlian_warga.kd_keahlian',
                'datainduk.kd_induk',
                'datainduk.no_kk',
                'datainduk.no_ktp',
                'datainduk.kd_rt',
                // 'md_rt.no_rw',
                'datainduk.nama',
                'datainduk.nm_panggilan',
                'md_keahlian.nama_keahlian',
                'data_keahlian_warga.is_sertifikat',
                'data_keahlian_warga.level_sertifikat',
                'data_keahlian_warga.deskripsi_sertifikat'
            )
            ->get();
        return view('/red_rw/keahlian', ['keahlian' => $keahlian]);
    }


    public function goldarah()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->leftJoin('md_rumah', 'md_rumah.kd_rt', '=', 'datainduk.kd_rt')
            ->select('md_rt.no_rw', 'md_rt.no_rt', 'md_rumah.no_rumah', 'datainduk.nama', 'datainduk.nm_panggilan', 'datainduk.gol_darah')
            ->get();
        return view('/red_rw/gol_darah', ['gdarah' => $join]);
    }
    //===============================================================================================================//
    //==============================================RED PKK==========================================================//
    public function homepkk()
    {

        return view('/red_pkk/home');
    }

    public function wargapkk()
    {
        $pk = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->where('datainduk.j_kelamin', '=', 'Perempuan')
            ->get();
        return view(
            '/red_pkk/warga',
            ['pk' => $pk]
        );
    }

    public function pekerjaanpkk()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->leftJoin('md_pekerjaan', 'md_pekerjaan.kd_pekerjaan', '=', 'datainduk.kd_pekerjaan')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->where('datainduk.j_kelamin', '=', "Perempuan")
            ->get();
        return view('/red_pkk/pekerjaan', ['pkj' => $join]);
    }

    public function keahlianpkk()
    {
        $data_induk =  DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            ->where('datainduk.j_kelamin', '=', "Perempuan")
            ->get();


        return view('/red_pkk/keahlian', ['data_induk' => $data_induk]);
    }
    //==================================================================================================================//
    //==============================================RED KARANG TARUNA===================================================//
    public function RemajaCounter()
    {
        $counter = [];
        $counter['Remaja'] = [];
        $counter['Remaja']['Total'] = $data_induk = DB::table('datainduk')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(30)->toDateString())
            ->count();
        $counter['Remaja']['Laki'] = $data_induk = DB::table('datainduk')
            ->where('j_kelamin', '=', 'Laki-laki')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(30)->toDateString())
            ->count();
        $counter['Remaja']['Perempuan'] = $data_induk = DB::table('datainduk')
            ->where('j_kelamin', '=', 'Perempuan')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(30)->toDateString())
            ->count();
        $counter['Remaja']['KT'] = $data_induk = DB::table('datainduk')
            ->where('is_kt', '=', 'Ya')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(30)->toDateString())
            ->count();
        $counter['Remaja']['Keahlian'] = DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(30)->toDateString())
            ->count();
        return $counter;
    }

    public function homekt()
    {
        return view('/red_kt/home', ['data' => $this->RemajaCounter()]);
    }

    public function wargakt()
    {
        // dd(Carbon::now()->subYear(30)->toDateString()); //1991
        // dd(Carbon::now()->subYear(16)->toDateString()); //2005

        $data_induk = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(30)->toDateString())
            ->where('tgl_lahir', '<=', Carbon::now()->subYear(16)->toDateString())
            ->get();

        $data_induk = $data_induk->map(function ($row) {
            $kalkulasi = Carbon::parse($row->tgl_lahir)->age;
            $row->usia = $kalkulasi;
            return $row;
        });
        // dd($data_induk);
        return view('/red_kt/warga', ['data_induk' => $data_induk]);
    }


    public function laki()
    {
        $data_induk = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->where('j_kelamin', '=', 'Laki-laki')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(30)->toDateString())
            ->where('tgl_lahir', '<=', Carbon::now()->subYear(16)->toDateString())
            ->get();

        return view('/red_kt/laki', ['data_induk' => $data_induk]);
    }

    public function perempuan()
    {
        $data_induk = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->where('j_kelamin', '=', 'Perempuan')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(30)->toDateString())
            ->where('tgl_lahir', '<=', Carbon::now()->subYear(16)->toDateString())
            ->get();

        return view('/red_kt/perempuan', ['data_induk' => $data_induk]);
    }
    public function anggotakt()
    {
        $data_induk = DB::table('datainduk')
            ->leftJoin('md_rt', 'md_rt.kd_rt', '=', 'datainduk.kd_rt')
            ->where('is_kt', '=', 'Ya')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(30)->toDateString())
            ->where('tgl_lahir', '<=', Carbon::now()->subYear(16)->toDateString())
            ->get();

        return view('/red_kt/karangtaruna', ['data_induk' => $data_induk]);
    }




    public function keahliankt()
    {

        $data_induk =  DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(30)->toDateString())
            ->where('tgl_lahir', '<=', Carbon::now()->subYear(16)->toDateString())
            ->get();


        return view('/red_kt/keahlian', ['data_induk' => $data_induk]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
