@extends('layout.template')

@section('container')
<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
    <div class="mb-5 text-center">
        <h3 class="text-dark mb-3">Selamat Datang Di Portal Perizinan Telekomunikasi<br>DIREKTORAT JENDERAL PENYELENGGARAAN POS DAN INFORMATIKA</h3>
    </div>
    <div class="card w-lg-500px">
        <div class="card-header text-center" style="background-color: #600A88 !important;">
            <div class="card-title fs-3 fw-bolder text-light text-center">LOGIN JARINGAN/JASA TEKOMUNIKASI</div>
        </div>
        <div class="card-body p-9">
            {{-- <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto"> --}}
                <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
                    <div class="text-center mb-10">
                        {{-- <h3 class="text-dark mb-3">LOGIN JARINGAN/JASA TEKOMUNIKASI</h3> --}}
                        <div class="text-gray-400 fw-bold fs-4">Belum punya akun?
                        <a href="registrasi-jarjastel" class="link-primary fw-bolder">Daftar</a></div>
                    </div>
                    <div class="fv-row mb-5">
                        <label class="form-label fs-6 fw-bolder text-dark">Alamat Email</label>
                        <input class="form-control form-control-lg form-control" type="email" placeholder="Masukan Alamat Email" name="email" autocomplete="off" />
                    </div>
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <div class="mb-1">
                            <label class="form-label fw-bolder text-dark fs-6">Password</label>
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control" type="password" placeholder="Masukan Password Anda" name="password" autocomplete="off" />
                            </div>
                    </div>
                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check form-check-inline">
                            <span class="form-check-label fw-bold text-gray-700 fs-6">Lupa Password?
                            <a href="forget-password/" class="ms-1 link-primary">Klik Disini</a>.</span>
                        </label>
                    </div>
                    <div class="text-center">
                        <button type="button" id="kt_sign_up_submit" class="btn btn-lg bg-purple w-100">
                            <span class="indicator-label">Masuk</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection