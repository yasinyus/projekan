<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Mail;
use App\Rules\GoogleRecaptcha;
use App\Models\Users_account;
use App\Models\Provinsi;
use Hash;
use App\Models\Perusahaan;
use App\Models\JenisPerusahaan;
use App\Models\JenisPenanamanModal;

class PerusahaanController extends Controller
{
    public function jarjastel()
    {
        $provinsi = Provinsi::select("*")->get();
        $jenis_perusahaan = JenisPerusahaan::select("*")->get();
        $jenis_penanaman_modal = JenisPenanamanModal::select("*")->get();
        return view('registrasi/registrasi-jarjastel-perusahaan',['provinsi' => $provinsi, 'jenis_perusahaan' => $jenis_perusahaan, 'jenis_penanaman_modal' => $jenis_penanaman_modal]);
    }
    
    public function prosesPerusahaan(Request $request)
    {
        $request->validate([
            'nib' => 'required|unique:perusahaan|max:255',
            'nib_file' => 'required|file|mimes:pdf|max:5120',
            'nama_perusahaan' => 'required|max:255',
            'jenis_perusahaan' => 'required',
            'penanaman_modal' => 'required', 'street' => 'required|max:255',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
            'desa' => 'required',
            'kodepos' => 'required',
            'phone' => 'required|max:15',
            'npwp' => 'required|file|mimes:pdf|max:5120',
            'domisili' => 'required|file|mimes:pdf|max:5120',
            'surat_kuasa' => 'required|file|mimes:pdf|max:5120',
            'dasar_hukum' => 'required|file|mimes:pdf|max:5120',         
            // 'g-recaptcha-response' => ['required', new GoogleRecaptcha]
        ], [
            'unique' => ':attribute sudah digunakan',
            'required' => 'Field :attribute tidak boleh kosong',
            'regex' => ':attribute wajib memiliki kombinasi angka & huruf',
            'min' => ':attribute minimal memiliki 8 digit',
        ]);
        $file_nib = $request->file('nib_file');
		$nama_file_nib = time()."_".$file_nib->getClientOriginalName();
		$tujuan_upload = 'documents';
		$file_nib->move($tujuan_upload,$file_nib);

        $file_npwp = $request->file('npwp');
		$nama_file_npwp = time()."_".$file_npwp->getClientOriginalName();
		$tujuan_upload = 'documents';
		$file_npwp->move($tujuan_upload,$file_npwp);

        $file_domisili = $request->file('domisili');
		$nama_file_domisili = time()."_".$file_domisili->getClientOriginalName();
		$tujuan_upload = 'documents';
		$file_domisili->move($tujuan_upload,$file_domisili);

        $file_surat_kuasa= $request->file('surat_kuasa');
		$nama_file_surat_kuasa = time()."_".$file_surat_kuasa->getClientOriginalName();
		$tujuan_upload = 'documents';
		$file_surat_kuasa->move($tujuan_upload,$file_surat_kuasa);

        $file_dasar_hukum= $request->file('dasar_hukum');
		$nama_file_dasar_hukum = time()."_".$file_dasar_hukum->getClientOriginalName();
		$tujuan_upload = 'documents';
		$file_dasar_hukum->move($tujuan_upload,$file_dasar_hukum);

        $Perusahaan  = new Perusahaan();
        $Perusahaan->users_accounts_id = auth()->user()->id;
        $Perusahaan->nib = $request->nib;
        $Perusahaan->nib_file = $nama_file_nib;
        $Perusahaan->nama = $request->nama_perusahaan;
        $Perusahaan->jenis_perusahaan = $request->jenis_perusahaan;
        $Perusahaan->jenis_penanaman_modal = $request->penanaman_modal;
        $Perusahaan->street = $request->street;
        $Perusahaan->provinsi = $request->provinsi;
        $Perusahaan->kota = $request->kota;
        $Perusahaan->kecamatan = $request->kecamatan;
        $Perusahaan->desa = $request->desa;
        $Perusahaan->kodepos = $request->kodepos;
        $Perusahaan->phone = $request->phone;
        $Perusahaan->npwp = $nama_file_nib;
        $Perusahaan->domisili = $nama_file_domisili;
        $Perusahaan->surat_kuasa = $nama_file_surat_kuasa;
        $Perusahaan->dasar_hukum = $nama_file_dasar_hukum;
        $Perusahaan->save();
        return redirect('/registrasi-jarjastel-pemohon');
        // dd($PenanggungJawab);
        // $Users->password = bcrypt($request->password);
        // $Users->is_verifikasi = "0";
        // $Users->save();
        // $token = md5(strtotime('now'));
        // $Users_verification_code = new Users_verification_code();
        // $Users_verification_code->users_accounts_id = $Users->id;
        // $Users_verification_code->token_verification = $token;
        // $Users_verification_code->is_used = "0";
        // $Users_verification_code->save();
        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'link_verifikasi' => url('verifikasi/' . $token),
        // ];            
        // $this->send($data);
        // \Mail::to($request->email)->send(new \App\Mail\MailVerifikasi($data));
        // return redirect('/registrasi-sukses');
    }

    public function registrasiSukses()
    {
        return view('registrasi.registrasi-sukses');
    }


}
