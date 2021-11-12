@extends('layout.template-login')

@section('container')
<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
    <div class="mb-5 text-center">
        <h3 class="text-dark mb-3">Selamat Datang Di Portal Perizinan Telekomunikasi<br>DIREKTORAT JENDERAL PENYELENGGARAAN POS DAN INFORMATIKA</h3>
    </div>
    <div class="card w-lg-500px">
        <div class="card-header text-center" style="background-color: #600A88 !important;">
            <div class="card-title fs-3 fw-bolder text-light text-center">REGISTRASI TELEKOMUNIKASI KHUSUS</div>
        </div>
        <div class="card-body p-9">
            <form class="form w-100" id="kt_sign_up_form" action="{{ action('Sendemail@send_telsusnbh') }}" method="post">
                @csrf <!-- {{ csrf_field() }} -->
                    <div class="mb-5 text-center w-100">
                        <div class="text-gray-400 fw-bold fs-4">Sudah punya akun?
                            <a href="login-telsusnbh" class="link-primary fw-bolder">Masuk</a></div>
                    </div>
                <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Kriteria Penyelenggaraan</label>
                    <select class="form-control form-control-lg form-control" placeholder="Pilih Perseorangan/Dinas Khusus/Ins.Pemerintah" name="" id="" required />
                        <option value="">--Pilih Perseorangan/Dinas Khusus/Ins.Pemerintah--</option>
                        <option value="Perseorangan">Perseorangan</option>
                        <option value="Dinas Khusus">Dinas Khusus</option>
                        <option value="Instansi Pemerintah">Instansi Pemerintah</option>
                    </select>
                </div>
                <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">NIB</label>
                    <input class="form-control form-control-lg form-control" type="text" placeholder="Masukan Nomor NIB" name="nib" autocomplete="off" required/>
                </div>
                <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Nama Penanggung Jawab</label>
                    <input class="form-control form-control-lg form-control" type="text" placeholder="Masukan Nama Lengkap" name="name" autocomplete="off" required/>
                </div>
                <div class="fv-row mb-7">
                    <label class="form-label fw-bolder text-dark fs-6">Alamat Email</label>
                    <input class="form-control form-control-lg form-control" type="email" placeholder="Masukan Alamat Email" name="email" autocomplete="off" required/>
                </div>
                <div class="mb-10 fv-row" data-kt-password-meter="true">
                    <div class="mb-1">
                        <label class="form-label fw-bolder text-dark fs-6">Password</label>
                        <div class="position-relative mb-3">
                            <input class="form-control form-control-lg form-control" type="password" placeholder="Masukan Password Anda" name="password" autocomplete="off" required/>
                        </div>
                </div>
                <div class="fv-row mb-5">
                    <label class="form-label fw-bolder text-dark fs-6">Konfirmasi Password</label>
                    <input class="form-control form-control-lg form-control" type="password" placeholder="Masukan Konfirmasi Password" name="confirm-password" autocomplete="off" required/>
                </div>
                <div class="fv-row mb-5">
                    <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                </div>
                <div class="text-center">
                    <button type="submit" id="kt_sign_up_submit" class="btn btn-lg bg-purple w-100">
                        <span class="indicator-label">Daftar</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection