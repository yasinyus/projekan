@extends('layout.template')

@section('container')
<div class="card">
    <div class="card-header" style="background-color: #600A88 !important;">
        <div class="card-title fs-3 fw-bolder text-light">IDENTITAS PENANGGUNG JAWAB</div>
    </div>
    <form id="kt_project_settings_form" class="form" action="{{ action('Sendemail@konfirmasi_telsusnbh') }}" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="card-body p-9">
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Nama Penanggung Jawab</label>
                <input class="form-control form-control-lg form-control" type="text" placeholder="Masukan Nama Lengkap" name="name" required autocomplete="off" />
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Email Penanggung Jawab</label>
                <input class="form-control form-control-lg form-control-solid"  readonly type="email" placeholder="Masukan Alamat Email" name="email" required autocomplete="off" />
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Nomor KTP Penanggung Jawab</label>
                        <input class="form-control form-control-lg form-control"  type="text" placeholder="Masukan No. KTP Penanggung Jawab" name="nik" autocomplete="off" />
                        <div class="text-muted">KTP Pemohon adalah KTP penerima kuasa untuk mengurus izin. Jika pemohon adalah Direktur Perusahaan, maka KTP pemohon adalah KTP Direktur.</div>
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">No Telepon / HP Penanggung Jawab</label>
                        <input class="form-control form-control-lg form-control"  type="text" placeholder="Masukan No. Telepon Penanggung Jawab" name="phone" autocomplete="off" />
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Nama Jalan</label>
                        <input class="form-control form-control-lg form-control" type="text" placeholder="" name="street" autocomplete="off" />
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Provinsi</label>
                        <input class="form-control form-control-lg form-control"  type="text" placeholder="" name="provinsi" autocomplete="off" />
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kota/Kabupaten</label>
                        <input class="form-control form-control-lg form-control"  type="text" placeholder="" name="city" autocomplete="off" />
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kecamatan</label>
                        <input class="form-control form-control-lg form-control"  type="text" placeholder="" name="kecamatan" autocomplete="off" />
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kelurahan/Desa</label>
                        <input class="form-control form-control-lg form-control"  type="text" placeholder="" name="desa" autocomplete="off" />
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kode Pos</label>
                        <input class="form-control form-control-lg form-control"  type="text" placeholder="" name="postalcode" autocomplete="off" />
                </div>
            </div>
            <div class="fv-row mb-4">
                <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Kembali</button>
            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Submit</button>
        </div>
    </form>
</div>
@endsection