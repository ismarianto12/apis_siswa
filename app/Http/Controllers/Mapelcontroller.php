<?php

namespace App\Http\Controllers;

use App\Http\Traits\Oaweb;
use App\Models\Mapel;
use Illuminate\Http\Request;

class Mapelcontroller extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function index()
    {
        try {
            $data = Mapel::get();
            return response()->json($data);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        try {

            $data = Mapel::where('id', $id)->get();
            if ($data->count() > 0) {
                return response()->json([
                    'data' => $data,
                ]);
            } else {
                return abort(404);
            }
        } catch (\Throwable $th) {
        }
    }



    public function store()
    {

        try {
            $Mapel = new Mapel;
            // $Mapel->id_pegawai = $this->request->id_pegawai;
            $Mapel->kode = $this->request->kode;
            $Mapel->mapel = $this->request->mapel;
            $Mapel->kkm = $this->request->kkm;
            $Mapel->kurikulum = $this->request->kurikulum;
            $Mapel->save();
            return response()->json([
                'status' => 'ok',
                'msg' => 'data berhasil di simpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update($id)
    {
        try {
            $Mapel = Mapel::find($id);
            $Mapel->nama =  $this->request->nama;
            $Mapel->nisn =  $this->request->nisn;
            $Mapel->jk =  $this->request->jk;
            $Mapel->alamat =  $this->request->alamat;
            $Mapel->ttl =  $this->request->ttl;
            $Mapel->kelas =  $this->request->kelas;
            $Mapel->tahun_masuk =  $this->request->tahun_masuk;
            $Mapel->nama_ibu =  $this->request->nama_ibu;
            $Mapel->nama_ayah =  $this->request->nama_ayah;
            $Mapel->save();
            return response()->json([
                'status' => 'ok',
                'msg' => 'data berhasil di simpan'
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }


    public function delete($id)
    {
        try {
            $Mapel = Mapel::find($id);
            $Mapel->delete();
            return response()->json([
                'status' => 'ok',
                'msg' => 'data berhasil di hapus'
            ]);
        } catch (\Throwable $th) {
        }
    }


    //
}
