<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Psy\Command\WhereamiCommand;

class KTController extends Controller
{

    public function home()
    {
        return view('/kt/home', ['data' => $this->RemajaCounter()]);
    }

    public function laki()
    {
        $data_induk = DB::table('datainduk')
            ->where('j_kelamin', '=', 'Laki-laki')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->get();

        return view('/kt/laki', ['data_induk' => $data_induk]);
    }

    public function perempuan()
    {
        $data_induk = DB::table('datainduk')
            ->where('j_kelamin', '=', 'Perempuan')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->get();

        return view('/kt/perempuan', ['data_induk' => $data_induk]);
    }

    public function warga()
    {
        $data_induk = DB::table('datainduk')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->get();

        return view('/kt/warga', ['data_induk' => $data_induk]);
    }
    public function karangtaruna()
    {
        $data_induk = DB::table('datainduk')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->get();

        return view('/kt/karangtaruna', ['data_induk' => $data_induk]);
    }

    public function keahlian()
    {

        $data_induk =  DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->get();


        return view('/kt/keahlian', ['data_induk' => $data_induk]);
    }


    //detail
    public function detail()
    {
        $data_induk = DB::table('datainduk')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->where('datainduk.kd_rt', '=', 1)
            ->get();
        return view('/kt/detail', ['data_induk' => $data_induk]);
    }

    public function detail2()
    {
        $data_induk = DB::table('datainduk')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->where('datainduk.kd_rt', '=', 2)
            ->get();
        return view('/kt/detail', ['data_induk' => $data_induk]);
    }

    public function detail13()
    {
        $data_induk = DB::table('datainduk')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->where('datainduk.kd_rt', '=', 13)
            ->get();
        return view('/kt/detail', ['data_induk' => $data_induk]);
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

    public function RemajaCounter()
    {
        $counter = [];
        $counter['Remaja'] = [];
        $counter['Remaja']['Total'] = $data_induk = DB::table('datainduk')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->count();
        $counter['Remaja']['Laki'] = $data_induk = DB::table('datainduk')
            ->where('j_kelamin', '=', 'Laki-laki')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->count();
        $counter['Remaja']['Perempuan'] = $data_induk = DB::table('datainduk')
            ->where('j_kelamin', '=', 'Perempuan')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->count();
        $counter['Remaja']['Keahlian'] = DB::table('data_keahlian_warga')
            ->leftJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->leftJoin('md_keahlian', 'md_keahlian.kd_keahlian', '=', 'data_keahlian_warga.kd_keahlian')
            ->where('tgl_lahir', '>=', Carbon::now()->subYear(25)->toDateString())
            ->count();
        return $counter;
    }
}
