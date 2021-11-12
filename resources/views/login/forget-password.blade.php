@extends('layout.template')

@section('container')
<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
    <div class="card w-lg-500px">
        <div class="card-header text-center" style="background-color: #600A88 !important;">
            <div class="card-title fs-3 fw-bolder text-light text-center">Reset Password</div>
        </div>
        <div class="card-body p-9">
            {{-- <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto"> --}}
                <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="#">
                    <div class="fv-row mb-5">
                        <label class="form-label fs-6 fw-bolder text-dark">Alamat Email</label>
                        <input class="form-control form-control-lg form-control" type="email" placeholder="Masukan Alamat Email" name="email" autocomplete="off" />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6">NIB</label>
                        <input class="form-control form-control-lg form-control" type="text" placeholder="Masukan Nomor NIB" name="nib" autocomplete="off" />
                    </div>
                    <div class="text-center">
                        <button type="button" id="kt_sign_up_submit" class="btn btn-lg bg-purple w-100">
                            <span class="indicator-label">Submit</span>
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