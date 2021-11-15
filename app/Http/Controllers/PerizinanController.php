<?php

namespace App\Http\Controllers;

use App\Models\JenisIzin;
use App\Models\KodeIzin;
use App\Models\Perizinan;
use Illuminate\Http\Request;
use DB;

class PerizinanController extends Controller
{
    
    public function daftar(Request $request) {
        $perizinan = new Perizinan;

        $perizinan->tanggal_kib = $request->tanggal_pengajuan;
        $perizinan->kib_id = $request->kode_izin_id;
        $perizinan->reference_id = $request->referensi_nomor_izin;
        $perizinan->save();
    }

    public function dalamProses(Request $request) {        
        $offset = $request->input('start');
        $limit = $request->input('length');
        $query = Perizinan::select('perizinan.id', 'jenis_izin.deskripsi AS jenis_izin', 
                    'kode_izin.kode AS kode_izin', 'perizinan.tanggal_kib', 'kode_izin.kbli', 
                    'kode_izin.judul_kbli AS jenis_penyelenggaraan', 'kode_izin.media_transmisi')
                ->leftJoin('kode_izin', 'kode_izin.id', '=', 'perizinan.kib_id')
                ->leftJoin('jenis_izin', 'jenis_izin.id', '=', 'kode_izin.jenis_izin_id');                
                //where status <> 'SKLO'
        $total_records = $query->count();
        $per_page = $query->orderBy('updated_at', 'DESC')->skip($offset)->take($limit)->get();        
        return [
            'data' => $per_page,
            'recordsTotal' => $total_records,
            'recordsFiltered' => $total_records
        ];
    }

    public function getPerizinanAktifByKibId(Request $request, $kib_id) {
        return Perizinan::select('id', 'nomor_izin')
            ->where(['kib_id' => $kib_id]) 
            //todo where userId = $userId &status = active & tanggal_izin >= 5 thn
            ->get();
    }    
}
