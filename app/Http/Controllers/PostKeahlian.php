<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostKeahlian extends Controller
{
    public function addPostKeahlian()
    {
        return view('add-post-keahlian');
    }
    public function savePostKeahlian(Request $request)
    {
        DB::table('data_keahlian_warga')->insert([

            'kd_induk' => $request->nomorkk,
            'kd_keahlian' => $request->nort,
            'is_sertifikat' => $request->nort,
            'deskripsi_sertifikat' => $request->namakk,
            'level_sertifikat' => $request->koderumah,
            'keterangan' => $request->keterangan,

        ]);
        return redirect('/keahlian');
        // return back()->with('post_add_dkk', 'Data berhasil ditambahkan');
    }

    public function editPost($kd_induk)
    {
        $post = DB::table('data_keahlian_warga')->where('kd_induk', $kd_induk)->first();
        return view('edit_keahlian', compact('post'));
    }


    public function updatePost(Request $request)
    {


        DB::table('data_keahlian_warga')->where('kd_induk', $request->id)->update(

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
