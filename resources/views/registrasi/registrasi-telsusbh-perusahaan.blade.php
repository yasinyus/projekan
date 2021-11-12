@extends('layout.template')

@section('container')
<div class="card">
    <div class="card-header" style="background-color: #600A88 !important;">
        <div class="card-title fs-3 fw-bolder text-light">PENDAFTARAN - DATA PERUSAHAAN</div>
    </div>
    <form id="kt_project_settings_form" class="form" action="registrasi-jarjastel-pemohon/" method="post">
        <div class="card-body p-9">
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">NIB</label>
                        <input class="form-control form-control-lg form-control-solid" readonly type="text" placeholder="" name="street" autocomplete="off" />
                        <div class="text-muted">NIB adalah Nomor Izin berusaha yang diperolah dari oss.go.id</div>
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Dokumen NIB</label>
                        <input class="form-control form-control-lg form-control" type="file" placeholder="" name="provinsi" autocomplete="off" accept="application/pdf"/>
                        <div class="text-muted">format dokumen PDF dan maksimal 5Mb</div>
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
                <input class="form-control form-control-lg form-control" type="file" id="npwp" name="npwp" autocomplete="off" accept="application/pdf"/>
                <div class="text-muted">Pastikan Anda telah memasukkan NPWP dengan benar. NPWP perusahaan akan dicek validitasnya dengan database Ditjen Pajak. Apabila NPWP perusahaan Anda tidak valid, maka Anda tidak dapat mengajukan permohonan</div>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Surat Keterangan Domisili Perusahaan/Instansi Pemerintah*</label>
                <input class="form-control form-control-lg form-control" type="file" id="domisili" name="domisili"autocomplete="off" accept="application/pdf"/>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Surat Kuasa Perusahaan/Instansi Pemerintah*</label>
                <input class="form-control form-control-lg form-control" type="file" id="surat_kuasa" name="surat_kuasa" autocomplete="off" accept="application/pdf"/>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Dasar Hukum Pembentukan Perusahaan/Instansi pemerintah*</label>
                <input class="form-control form-control-lg form-control" type="file" id="dasar_hukum" name="dasar_hukum" autocomplete="off" accept="application/pdf"/>
            </div>
            <div class="fv-row mb-7">
                <div class="text-muted">Dengan ini saya menyatakan : Informasi dan dokumen yang dilampirkan adalah benar sesuai dengan dokumen asli. Apabila informasi dan dokumen yang dilampirkan tidak benar dan tidak sesuai dengan dokumen asli, maka saya bersedia dikenakan sanksi berupa masuk ke dalam daftar hitam (blacklist) hingga sanksi yang diatur dalam peraturan perundang-undangan.</div>
            </div>
            <div class="fv-row mb-7">
                <label class="form-check form-check-custom form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="ceksyarat" name="toc" value="1" />
                    <span class="form-check-label fw-bold text-gray-700 fs-6">Dengan membubuhkan cek list, saya telah membaca dan menyetujui ketentuan di atas.</span>
                </label>
            </div>
            <div class="fv-row mb-4">
                <div class="g-recaptcha" data-sitekey="6LfFNQkdAAAAAFXLESoqX4MXCtrQiB23mIxGq9SJ"></div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Kembali</button>
            <button type="submit" class="btn btn-secondary" disabled id="kt_registrasi_submit">Submit</button>
        </div>
    </form>
</div>

<script>
    $('#ceksyarat').change(function () {
        // alert('changed');
        if ($('#ceksyarat').is(':checked')) {
            $("#kt_registrasi_submit").removeAttr("disabled");
            $('#kt_registrasi_submit').removeClass('btn-secondary');
            $('#kt_registrasi_submit').addClass('btn-primary');
        }else{
            $('#kt_registrasi_submit').prop('disabled', true);
            $('#kt_registrasi_submit').removeClass('btn-primary');
            $('#kt_registrasi_submit').addClass('btn-secondary');

        }
    });

    function cek_mandatory(){
        var domisili = document.getElementById("domisili").files.length;
        var surat_kuasa = document.getElementById("surat_kuasa").files.length;
        var dasar_hukum = document.getElementById("dasar_hukum").files.length;
        // console.log(domisili);
        if (domisili==0 || surat_kuasa==0 || dasar_hukum==0) {
            $('#ceksyarat').prop('disabled', true);
        }else{
            $("#ceksyarat").removeAttr("disabled");
        }
    }

    $('#domisili').change(function () {
        cek_mandatory();
    });

    $('#surat_kuasa').change(function () {
        cek_mandatory();
    });

    $('#dasar_hukum').change(function () {
        cek_mandatory();
    });
        
</script>
@endsection