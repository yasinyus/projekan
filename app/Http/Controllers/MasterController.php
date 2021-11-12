<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KodeIzin;
use DB;

class MasterController extends Controller
{
    public function getKodeIzin(Request $request, $jenisIzin) {
        $term = $request->input('term');
        if(empty($term)) {            
            return KodeIzin::where(['jenis_izin_id' => $jenisIzin])->get();
        }else{
            return KodeIzin::where([['jenis_izin_id', '=', $jenisIzin]])
                ->whereRaw('(lower(kode) like (?) or lower(nama_izin) like (?))',["%{$term}%", "%{$term}%"])
                ->get();
        }
        
    }
}
