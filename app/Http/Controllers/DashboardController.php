<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisIzin;
use App\Models\KodeIzin;
use DB;


class DashboardController extends Controller
{
    public function index() {
        $data = [
            'jenisPerizinan' => JenisIzin::all(),
            'tanggalPengajuan' => date("d-m-Y")
        ];
        return view('dashboard', $data);
    }

    public function kodeIzin($jenisIzin) {
        return KodeIzin::find(["jenis_izin_id" => $jenisIzin]);
    }
    
}
