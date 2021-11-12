@extends('layout.template')

@section('container')
<div class="card">
    <div class="card-header" style="background-color: #600A88 !important;">
        <div class="card-title fs-3 fw-bolder text-light">PENDAFTARAN - DATA PERUSAHAAN</div>
    </div>
    <form id="kt_project_settings_form" class="form" method="post">
        <div class="card-body p-9">
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">NIB</label>
                        <input class="form-control form-control-lg form-control-solid" readonly type="text" placeholder="" name="street" autocomplete="off" />
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Dokumen NIB</label>
                        <input class="form-control form-control-lg form-control" type="file" placeholder="" name="provinsi" autocomplete="off" />
                </div>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Nama Perusahaan/Instansi Pemerintah</label>
                <input class="form-control form-control-lg form-control" type="text" placeholder="" name="name" autocomplete="off" />
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Jenis Perusahaan</label>
                        <input class="form-control form-control-lg form-control" type="text" placeholder="" name="nik" autocomplete="off" />
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Jenis Penanaman Modal</label>
                        <input class="form-control form-control-lg form-control" type="text" placeholder="" name="phone" autocomplete="off" />
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Nama Jalan</label>
                        <input class="form-control form-control-lg form-control"  type="text" placeholder="" name="street" autocomplete="off" />
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Provinsi</label>
                        <input class="form-control form-control-lg form-control" readonly type="text" placeholder="" name="provinsi" autocomplete="off" />
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kota/Kabupaten</label>
                        <input class="form-control form-control-lg form-control" readonly type="text" placeholder="" name="city" autocomplete="off" />
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kecamatan</label>
                        <input class="form-control form-control-lg form-control" readonly type="text" placeholder="" name="kecamatan" autocomplete="off" />
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kelurahan/Desa</label>
                        <input class="form-control form-control-lg form-control" readonly type="text" placeholder="" name="desa" autocomplete="off" />
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kode Pos</label>
                        <input class="form-control form-control-lg form-control" readonly type="text" placeholder="" name="postalcode" autocomplete="off" />
                </div>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">No Telepon Perusahaan/Instansi Pemerintah</label>
                <input class="form-control form-control-lg form-control" type="text" name="name" autocomplete="off" />
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">NPWP Perusahaan/Instansi Pemerintah</label>
                <input class="form-control form-control-lg form-control" type="file" name="name" autocomplete="off" />
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Surat Keterangan Domisili Perusahaan/Instansi Pemerintah*</label>
                <input class="form-control form-control-lg form-control" type="file" name="name" autocomplete="off" />
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Surat Kuasa Perusahaan/Instansi Pemerintah*</label>
                <input class="form-control form-control-lg form-control" type="file" name="name" autocomplete="off" />
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Dasar Hukum Pembentukan Perusahaan/Instansi pemerintah*</label>
                <input class="form-control form-control-lg form-control" type="file" name="name" autocomplete="off" />
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bold text-gray fs-6">Dengan ini saya menyatakan : Informasi dan dokumen yang dilampirkan adalah benar sesuai dengan dokumen asli. Apabila informasi dan dokumen yang dilampirkan tidak benar dan tidak sesuai dengan dokumen asli, maka saya bersedia dikenakan sanksi berupa masuk ke dalam daftar hitam (blacklist) sebagai pendaftar user sipppdihati.pelayananprimaditjenppi.go.id hingga sanksi yang diatur dalam peraturan perundang-undangan.</label>
            </div>
            <div class="fv-row mb-7">
                <label class="form-check form-check-custom form-check-solid form-check-inline">
                    <input class="form-check-input" type="checkbox" name="toc" value="1" />
                    <span class="form-check-label fw-bold text-gray-700 fs-6">Dengan membubuhkan cek list, saya telah membaca dan menyetujui ketentuan di atas.</span>
                </label>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Kembali</button>
            <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Submit</button>
        </div>
    </form>
</div>
@endsection