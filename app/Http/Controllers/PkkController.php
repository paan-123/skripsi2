<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PkkController extends Controller
{
    public function home()
    {

        return view('/pkk/home');
    }

    public function warga()
    {
        $pk = DB::table('datainduk')
            ->where('datainduk.j_kelamin', '=', 'Perempuan')
            ->get();
        return view(
            '/pkk/warga',
            ['pk' => $pk]
        );
    }

    public function pkk()
    {
        return view('/pkk/pkk');
    }

    public function kwt()
    {
        return view('/pkk/kwt');
    }

    public function pekerjaan()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_pekerjaan', 'md_pekerjaan.kd_pekerjaan', '=', 'datainduk.kd_pekerjaan')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->where('datainduk.j_kelamin', '=', "Perempuan")
            ->get();
        return view('/pkk/pekerjaan', ['pkj' => $join]);
    }

    public function keahlian()
    {
        return view('/pkk/keahlian');
    }

    public function detail()
    {
        $join = DB::table('datainduk')
            ->leftJoin('data_kk', 'data_kk.no_kk', '=', 'datainduk.no_kk')
            ->where('datainduk.j_kelamin', '=', "Perempuan")
            ->where('datainduk.kd_rt', '=', 1)
            ->get();
        return view('/pkk/detail', ['detail' => $join]);
    }

    public function detail2()
    {
        $join = DB::table('datainduk')
            ->leftJoin('data_kk', 'data_kk.no_kk', '=', 'datainduk.no_kk')
            ->where('datainduk.j_kelamin', '=', "Perempuan")
            ->where('datainduk.kd_rt', '=', 2)
            ->get();
        return view('/pkk/detail2', ['detail2' => $join]);
    }

    public function detail13()
    {
        $join = DB::table('datainduk')
            ->leftJoin('data_kk', 'data_kk.no_kk', '=', 'datainduk.no_kk')
            ->where('datainduk.j_kelamin', '=', "Perempuan")
            ->where('datainduk.kd_rt', '=', 13)
            ->get();
        return view('/pkk/detail13', ['detail13' => $join]);
    }
}
