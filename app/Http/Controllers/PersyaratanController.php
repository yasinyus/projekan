<?php

namespace App\Http\Controllers;

use App\Models\JenisIzin;
use App\Models\KodeIzin;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    public function persyaratan($perizinan_id) {        
        $perizinan = Perizinan::select(
                            'perizinan.id', 
                            'jenis_izin.deskripsi AS jenis_izin', 
                            'kode_izin.kode AS kode_izin', 
                            'perizinan.tanggal_kib', 
                            'kode_izin.kbli', 
                            'kode_izin.judul_kbli AS jenis_penyelenggaraan', 
                            'kode_izin.media_transmisi',
                            'perizinan.badan_hukum',
                            'perizinan.status')
            ->leftJoin('kode_izin', 'kode_izin.id', '=', 'perizinan.kib_id')
            ->leftJoin('jenis_izin', 'jenis_izin.id', '=', 'kode_izin.jenis_izin_id')
            ->where(['perizinan.id' => $perizinan_id])->first();
            $data = [
                'perizinan' => $perizinan,
                'tanggalPengajuan' => date("d-m-Y")
            ];
        return view('persyaratan', $data);
    }
}
