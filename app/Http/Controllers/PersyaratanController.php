<?php

namespace App\Http\Controllers;

use App\Models\JenisIzin;
use App\Models\KodeIzin;
use App\Models\Perizinan;
use Illuminate\Http\Request;

class PersyaratanController extends Controller
{
    public function persyaratan($perizinan_id) {
        $data = [
            'perizinan' => Perizinan::find($perizinan_id),
            'tanggalPengajuan' => date("d-m-Y")
        ];
        return view('persyaratan', $data);
    }
}
