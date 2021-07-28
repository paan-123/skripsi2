<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        return view('home');
    }

    public function form_datakk()
    {
        return view('form_datakk');
    }
    public function form_datainduk()
    {
        return view('form_datainduk');
    }

    public function table()
    {
        return view('table');
    }
    public function data_induk()
    {
        return view('data_induk');
    }
    public function data_kk()
    {
        return view('data_kk');
    }
    public function data_keahlian()
    {
        return view('data_keahlian');
    }
    public function golongan_darah()
    {
        return view('golongan_darah');
    }
    public function pekerjaan()
    {
        return view('pekerjaan');
    }
    public function pendidikan()
    {
        return view('pendidikan');
    }

    public function formdatakk()
    {
        return view('form_kk');
    }

    public function formkeahlian()
    {
        $join = DB::table('data_keahlian_warga')
            ->rightJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->get();
        return view('form_keahlian', ['join' => $join]);
    }
    public function editkeahlian()
    {
        $join = DB::table('data_keahlian_warga')
            ->rightJoin('datainduk', 'datainduk.kd_induk', '=', 'data_keahlian_warga.kd_induk')
            ->get();
        return view('edit_keahlian/{kd_induk}', ['join' => $join]);
    }

    public function transaksi()
    {
        $data = DB::table('data_induk')
            ->leftJoin('data_kk', 'data_kk.no_kk', '=', 'data_induk.no_kk')
            ->get();


        return view('transaksi', compact('data'));
    }
}
