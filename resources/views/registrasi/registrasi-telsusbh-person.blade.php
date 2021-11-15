@extends('layout.template')

@section('container')
<div class="card">
    <div class="card-header" style="background-color: #600A88 !important;">
        <div class="card-title fs-3 fw-bolder text-light">IDENTITAS PENANGGUNG JAWAB</div>
    </div>
    <form id="kt_project_settings_form" class="form" action="registrasi-telsusbh-perusahaan/" method="post">
        <div class="card-body p-9">
            <div class="fv-row mb-7">
                <label class="form-check-label">
                    Kriteria Penanggung Jawab:
                </label>
            </div>
            <div class="fv-row mb-7">
                <input class="form-check-input" type="radio" value="" id="kriteria1" name="kriteria"/>
                <label class="form-check-label" for="kriteria1">
                    Anda Seorang Direktur/Pimpinan Instansi dan Perusahaan anda merupakan Instansi Pemerintah
                </label>
            </div>
            <div class="fv-row mb-7">
                <input class="form-check-input" type="radio" value="" id="kriteria2" name="kriteria"/>
                <label class="form-check-label" for="kriteria2">
                    Anda Seorang Direktur/Pimpinan Instansi dan Perusahaan anda <b>bukan</b> merupakan Instansi Pemerintah
                </label>
            </div>
            <div class="fv-row mb-7">
                <input class="form-check-input" type="radio" value="" id="kriteria3" name="kriteria"/>
                <label class="form-check-label" for="kriteria3">
                    Anda <b>bukan</b> Seorang Direktur/Pimpinan Instansi dan Perusahaan anda merupakan Instansi Pemerintah
                </label>
            </div>
            <div class="fv-row mb-7">
                <input class="form-check-input" type="radio" value="" id="kriteria4" name="kriteria"/>
                <label class="form-check-label" for="kriteria4">
                    Anda <b>bukan</b> Seorang Direktur/Pimpinan Instansi dan Perusahaan <b>bukan</b> bukan merupakan Instansi Pemerintah
                </label>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Nama Penanggung Jawab</label>
                <input class="form-control form-control-lg form-control" type="text" placeholder="Masukan Nama Lengkap" name="name" autocomplete="off" />
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Email Penanggung Jawab</label>
                <input class="form-control form-control-lg form-control-solid" readonly type="email" placeholder="Masukan Alamat Email" name="email" autocomplete="off" />
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
                        <input class="form-control form-control-lg form-control" type="text" placeholder="Masukan Alamat Nama Jalan Penanggung Jawab" name="street" autocomplete="off" />
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
            <div class="fv-row mb-4">
                <div class="g-recaptcha" data-sitekey="6LfFNQkdAAAAAFXLESoqX4MXCtrQiB23mIxGq9SJ"></div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Kembali</button>
            {{-- <button type="submit" class="btn btn-primary" id="kt_project_settings_submit">Submit</button> --}}
            <a href="registrasi-telsusbh-perusahaan" class="btn btn-primary" id="kt_project_settings_submit">Submit</a>
        </div>
    </form>
</div>
@endsection