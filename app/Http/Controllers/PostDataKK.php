<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataKKModel;
use Symfony\Component\VarDumper\Cloner\Data;

class PostDataKK extends Controller
{
    public function addPostDKK()
    {
        return view('add-post-dkk');
    }
    public function savePostDKK(Request $request)
    {
        DB::table('data_kk')->insert([

            'no_kk' => $request->nomorkk,
            'no_rt' => $request->nort,
            'no_rw' => $request->norw,
            'nm_kk' => $request->namakk,
            'kd_rumah' => $request->koderumah,
            'kd_level_ekonomi' => $request->levelekonomi,
            'keterangan' => $request->keterangan,

        ]);

        return back()->with('post_add_dkk', 'Data berhasil ditambahkan');
    }

    public function tambahAnggota(Request $no_kk)
    {
        // dd($no_kk);
        return view('tambah-anggota');
    }



    public function transaksi_datainduk($no_kk)
    {
        // $data_induk = DB::table('datainduk')->get();
        $data_induk = DB::table('datainduk')->where('no_kk', $no_kk)->get();
        return view('transaksi_datainduk', compact('data_induk'));
    }


    public function saveTambahAnggota(Request $request)
    {
        // dd($request->post());
        DB::table('datainduk')->insert([

            // 'kd_induk'          => $request->kodeinduk,
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


        return back()->with('post_add_dkk', 'Data berhasil ditambahkan');
    }





    public function editPost($no_kk)
    {
        $post = DB::table('data_kk')->where('no_kk', $no_kk)->first();
        return view('edit_dkk', compact('post'));
    }


    public function updatePost(Request $request)
    {


        DB::table('data_kk')->where('no_kk', $request->id)->update(

            [
                'no_kk' => $request->nomorkk,
                'no_rt' => $request->nort,
                'no_rw' => $request->norw,
                'nm_kk' => $request->namakk,
                'kd_rumah' => $request->koderumah,
                'kd_level_ekonomi' => $request->levelekonomi,
                'keterangan' => $request->keterangan,
            ]

        );
        $post = DB::table('data_kk')->where('no_kk', $request->nomorkk)->first();
        return view('edit_dkk', compact('post'))->with('post_updatedkk', 'Data Updated');
        // dd($request->post());
        // return ba()->with('post_updatedkk', 'Data Berhasil Dirubah');
    }

    public function deletePost($no_kk)
    {
        DB::table('data_kk')->where('no_kk', $no_kk)->delete();
        return back()->with('post_delete', 'Post Berhasil Dihapus');
    }


    public function tampilTransaksi($no_kk)
    {
        $tampil = DB::table('datainduk')
            ->select('nama', 'no_kk', 'status_hub_kk', 'j_kelamin', 'tmp_lahir', 'tgl_lahir', 'kd_agama', 'kd_pendidikan', 'kd_pekerjaan')
            ->where('no_kk', $no_kk)
            ->get();
        return json_encode($tampil);
    }
}
