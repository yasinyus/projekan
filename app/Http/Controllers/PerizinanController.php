<?php

namespace App\Http\Controllers;

use App\Models\JenisIzin;
use App\Models\KodeIzin;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class PerizinanController extends Controller
{
    
    public function daftar(Request $request) {
        $perizinan = new Perizinan;

        $perizinan->tanggal_kib = $request->tanggal_pengajuan;
        $perizinan->kib_id = $request->kode_izin_id;
        $perizinan->save();
    }

    public function dalamProses(Request $request) {
        $offset = $request->input('start');
        $limit = $request->input('length');
        $query = Perizinan::select('perizinan.id', 'jenis_izin.deskripsi AS jenis_izin', 
                    'kode_izin.kode AS kode_izin', 'perizinan.tanggal_kib', 'kode_izin.kbli', 
                    'kode_izin.judul_kbli AS jenis_penyelenggaraan', 'kode_izin.media_transmisi')
                ->leftJoin('kode_izin', 'kode_izin.id', '=', 'perizinan.kib_id')
                ->leftJoin('jenis_izin', 'jenis_izin.id', '=', 'kode_izin.jenis_izin_id')
                ->where(['kode_izin.jenis_izin_id' => 2]);

        $per_page = $query->offset($offset*$limit)->take($limit)->get();
        $total_records = $query->count();

        return [
            'data' => $per_page,
            'recordsTotal' => $total_records,
            'recordsFiltered' => $total_records
        ];
    }
}
