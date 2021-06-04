<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RwController extends Controller
{
    public function home()
    {
        return view('/rw/home');
    }


    public function warga()
    {
        return view('/rw/warga');
    }

    public function datakk()
    {
        return view('/rw/datakk');
    }

    public function detail()
    {
        $rt1 = DB::table('datainduk')
            ->leftJoin('md_pekerjaan', 'md_pekerjaan.kd_pekerjaan', '=', 'datainduk.kd_pekerjaan')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->where('datainduk.kd_rt', 1)
            ->get();

        $join =  DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            ->where('datainduk.kd_rt', 1)
            ->get();


        $lv = DB::table('data_kk')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'data_kk.kd_level_ekonomi')
            ->where('data_kk.no_rt', 1)
            ->get();



        $gd = DB::table('datainduk')
            ->where('datainduk.kd_rt', 1)
            ->get();


        $sh = DB::table('datainduk')
            ->where('datainduk.kd_rt', 1)
            ->get();


        return view('/rw/detail', [
            'rt1' => $rt1,
            'join' => $join,
            'lv' => $lv,
            'gd' => $gd,
            'sh' => $sh,
        ]);
    }








    public function detail2()
    {

        $rt2 = DB::table('datainduk')
            ->leftJoin('md_pekerjaan', 'md_pekerjaan.kd_pekerjaan', '=', 'datainduk.kd_pekerjaan')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->where('datainduk.kd_rt', 2)
            ->get();

        $join =  DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            ->where('datainduk.kd_rt', 2)
            ->get();


        $lv = DB::table('data_kk')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'data_kk.kd_level_ekonomi')
            ->where('data_kk.no_rt', 2)
            ->get();



        $gd = DB::table('datainduk')
            ->where('datainduk.kd_rt', 2)
            ->get();


        $sh = DB::table('datainduk')
            ->where('datainduk.kd_rt', 2)
            ->get();


        return view('/rw/detail2', [
            'rt2' => $rt2,
            'join' => $join,
            'lv' => $lv,
            'gd' => $gd,
            'sh' => $sh,
        ]);
    }

    public function detail13()
    {
        $rt13 = DB::table('datainduk')
            ->leftJoin('md_pekerjaan', 'md_pekerjaan.kd_pekerjaan', '=', 'datainduk.kd_pekerjaan')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->where('datainduk.kd_rt', 13)
            ->get();

        $join =  DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            ->where('datainduk.kd_rt', 13)
            ->get();


        $lv = DB::table('data_kk')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'data_kk.kd_level_ekonomi')
            ->where('data_kk.no_rt', 13)
            ->get();



        $gd = DB::table('datainduk')
            ->where('datainduk.kd_rt', 13)
            ->get();


        $sh = DB::table('datainduk')
            ->where('datainduk.kd_rt', 13)
            ->get();


        return view('/rw/detail13', [
            'rt13' => $rt13,
            'join' => $join,
            'lv' => $lv,
            'gd' => $gd,
            'sh' => $sh,
        ]);
    }
}
