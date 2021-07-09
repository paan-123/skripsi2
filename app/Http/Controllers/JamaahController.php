<?php

namespace App\Http\Controllers;

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

    public function datakk()
    {
        $data_kk = DB::table('data_kk')->get();
        return view('data_kk', ['data_kk' => $data_kk]);
    }


    public function mdrumah()
    {
        $md_rumah = DB::table('md_rumah')->get();
        return view('md_rumah', ['md_rumah' => $md_rumah]);
    }

    public function mdrw()
    {
        $md_rw = DB::table('md_rw')->get();
        return view('md_rw', ['md_rw' => $md_rw]);
    }

    public function mdrt()
    {
        $md_rt = DB::table('md_rt')->get();
        return view('md_rt', ['md_rt' => $md_rt]);
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
        $join = DB::table('data_kk')
            ->leftJoin('datainduk', 'datainduk.no_kk', '=', 'data_kk.no_kk')
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
            ->get();
        return view('data_keahlian', ['keahlian' => $join]);
    }

    public function joingd() ///GOLONGAN DARAH///
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_rumah', 'md_rumah.kd_rt', '=', 'datainduk.kd_rt')
            ->get();
        return view('golongan_darah', ['gdarah' => $join]);
    }

    public function joinpk() ///PEKERJAAN///
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_pekerjaan', 'md_pekerjaan.kd_pekerjaan', '=', 'datainduk.kd_pekerjaan')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->get();
        return view('pekerjaan', ['pkj' => $join]);
    }

    public function joinpd() ///PENDIDIKAN///
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_pendidikan', 'md_pendidikan.kd_pendidikan', '=', 'datainduk.kd_pendidikan')
            ->get();
        return view('pendidikan', ['pd' => $join]);
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
        if ($age <= 12) :
            return 'Anak-anak';
        elseif ($age <= 25) :
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
        $kk = DB::table('data_kk')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'data_kk.kd_level_ekonomi')
            ->get();
        return view('/red_rw/datakk', ['kk' => $kk]);
    }

    public function ekonomi()
    {
        $ekonomi = DB::table('datainduk')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->get();
        return view('/red_rw/ekonomi', ['ekonomi' => $ekonomi]);
    }

    public function pekerjaan()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_pekerjaan', 'md_pekerjaan.kd_pekerjaan', '=', 'datainduk.kd_pekerjaan')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->get();
        return view('/red_rw/pekerjaan', ['pekerjaan' => $join]);
    }

    public function pendidikan()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_pendidikan', 'md_pendidikan.kd_pendidikan', '=', 'datainduk.kd_pendidikan')
            ->get();
        return view('/red_rw/pendidikan', ['pendidikan' => $join]);
    }

    public function agama()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_agama', 'md_agama.kd_agama', '=', 'datainduk.kd_agama')
            ->get();
        return view('/rw/agama', ['agama' => $join]);
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
