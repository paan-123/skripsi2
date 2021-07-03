<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Array_;

class RwController extends Controller
{
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



        return view('/rw/home', [
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
        return view('/rw/warga', ['warga' => $warga]);
    }

    public function datakk()
    {
        $kk = DB::table('data_kk')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'data_kk.kd_level_ekonomi')
            ->get();
        return view('/rw/datakk', ['kk' => $kk]);
    }

    public function ekonomi()
    {
        $ekonomi = DB::table('datainduk')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->get();
        return view('/rw/ekonomi', ['ekonomi' => $ekonomi]);
    }


    public function pekerjaan()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_pekerjaan', 'md_pekerjaan.kd_pekerjaan', '=', 'datainduk.kd_pekerjaan')
            ->leftJoin('md_level_ekonomi', 'md_level_ekonomi.kd_level_ekonomi', '=', 'datainduk.kd_level_ekonomi')
            ->get();
        return view('/rw/pekerjaan', ['pekerjaan' => $join]);
    }

    public function pendidikan()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_pendidikan', 'md_pendidikan.kd_pendidikan', '=', 'datainduk.kd_pendidikan')
            ->get();
        return view('/rw/pendidikan', ['pendidikan' => $join]);
    }

    public function agama()
    {
        $join = DB::table('datainduk')
            ->leftJoin('md_agama', 'md_agama.kd_agama', '=', 'datainduk.kd_agama')
            ->get();
        return view('/rw/agama', ['agama' => $join]);
    }

    public function usia()
    {
        return view('/rw/usia');
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


    #Method helper
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
}
