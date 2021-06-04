<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
