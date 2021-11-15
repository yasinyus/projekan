@extends('layout.template')

@section('container')
<div class="card">
    <div class="card-header" style="background-color: #600A88 !important;">
        <div class="card-title fs-3 fw-bolder text-light">PENDAFTARAN - DATA PERUSAHAAN</div>
    </div>
    <form id="kt_project_settings_form" class="form" action="{{ url('registrasi-jarjastel-pemohon') }}" method="post">
        @csrf <!-- {{ csrf_field() }} -->
        <div class="card-body p-9">
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">NIB<em style="color: red">*</em></label>
                        <input class="form-control form-control-lg form-control-solid" value="123" readonly type="text" placeholder="" id="nib" name="nib" autocomplete="off" required/>
                        <div class="text-muted">NIB adalah Nomor Izin berusaha yang diperolah dari oss.go.id</div>
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Dokumen NIB<em style="color: red">*</em></label>
                        <input class="form-control form-control-lg form-control" type="file" placeholder="" id="nib_file" name="nib_file" autocomplete="off" accept="application/pdf" required/>
                        <div class="text-muted">format dokumen PDF dan maksimal 5Mb</div>
                </div>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Nama Perusahaan/Instansi Pemerintah<em style="color: red">*</em></label>
                <input class="form-control form-control-lg form-control" type="text" placeholder="" id="nama_perusahaan" name="nama_perusahaan" autocomplete="off" />
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Jenis Perusahaan</label>
                        <select name="jenis_perusahaan" id="jenis_perusahaan" class="form-control form-control-lg form-control">
                            <option value="Perseorangan">Perseorangan</option>
                            <option value="CV">CV (Persekutuan Komanditer)</option>
                            <option value="PT">PT (Persekutuan Terbatas)</option>
                            <option value="Koperasi">Koperasi</option>
                            <option value="Firma">Firma</option>
                            <option value="Persero">Persero</option>
                        </select>
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Jenis Penanaman Modal</label>
                        <select name="penanaman_modal" id="penanaman_modal" class="form-control form-control-lg form-control">
                            <option value="Perusahaan Negara">Perusahaan Negara</option>
                            <option value="Perusahaan Swasta">Perusahaan Swasta</option>
                        </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Nama Jalan<em style="color: red">*</em></label>
                        <input class="form-control form-control-lg form-control" type="text" placeholder="" id="street" name="street" autocomplete="off" required/>
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Provinsi<em style="color: red">*</em></label>
                        <select class="form-select" data-control="select2" id="provinsi" name="provinsi" data-placeholder="Pilih Provinsi" required>
                            <option></option>
                            @foreach ($provinsi as $data)
                                <option value="{{ $data->prov_id }}">{{ $data->prov_name }}</option>
                            @endforeach
                        </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kota/Kabupaten<em style="color: red">*</em></label>
                        <select class="form-select" data-control="select2" id="kota" name="kota" data-placeholder="Pilih Kota" required>
                            <option></option>
                        </select>
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kecamatan<em style="color: red">*</em></label>
                        <select class="form-select" data-control="select2" id="kecamatan" name="kecamatan" data-placeholder="Pilih Kecamatan" required>
                            <option></option>
                        </select>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kelurahan/Desa<em style="color: red">*</em></label>
                        <select class="form-select" data-control="select2" id="desa" name="desa" data-placeholder="Pilih Kelurahan/Desa" required>
                            <option></option>
                        </select>
                </div>
                <div class="col-xl-6 fv-row">
                        <label class="form-label fw-bolder text-dark fs-6">Kode Pos<em style="color: red">*</em></label>
                        <select class="form-select" data-control="select2" id="kodepos" name="kodepos" data-placeholder="Pilih Kode Pos" required>
                            <option></option>
                        </select>
                </div>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">No Telepon Perusahaan/Instansi Pemerintah<em style="color: red">*</em></label>
                <input class="form-control form-control-lg form-control" type="text" id="npwp" name="phone" autocomplete="off" required/>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">NPWP Perusahaan/Instansi Pemerintah<em style="color: red">*</em></label>
                <input class="form-control form-control-lg form-control" type="file" id="npwp" name="npwp" autocomplete="off" accept="application/pdf"/>
                <div class="text-muted">Pastikan Anda telah memasukkan NPWP dengan benar. NPWP perusahaan akan dicek validitasnya dengan database Ditjen Pajak. Apabila NPWP perusahaan Anda tidak valid, maka Anda tidak dapat mengajukan permohonan</div>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Surat Keterangan Domisili Perusahaan/Instansi Pemerintah<em style="color: red">*</em></label>
                <input class="form-control form-control-lg form-control" type="file" id="domisili" name="domisili"autocomplete="off" accept="application/pdf"/>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Surat Kuasa Perusahaan/Instansi Pemerintah<em style="color: red">*</em></label>
                <input class="form-control form-control-lg form-control" type="file" id="surat_kuasa" name="surat_kuasa" autocomplete="off" accept="application/pdf"/>
            </div>
            <div class="fv-row mb-7">
                <label class="form-label fw-bolder text-dark fs-6">Dasar Hukum Pembentukan Perusahaan/Instansi pemerintah<em style="color: red">*</em></label>
                <input class="form-control form-control-lg form-control" type="file" id="dasar_hukum" name="dasar_hukum" autocomplete="off" accept="application/pdf"/>
            </div>
            <div class="fv-row mb-7">
                <div class="text-muted">Dengan ini saya menyatakan : Informasi dan dokumen yang dilampirkan adalah benar sesuai dengan dokumen asli. Apabila informasi dan dokumen yang dilampirkan tidak benar dan tidak sesuai dengan dokumen asli, maka saya bersedia dikenakan sanksi berupa masuk ke dalam daftar hitam (blacklist) hingga sanksi yang diatur dalam peraturan perundang-undangan.</div>
            </div>
            <div class="fv-row mb-7">
                <label class="form-check form-check-custom form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" disabled id="ceksyarat" name="toc" value="1" />
                    <span class="form-check-label fw-bold text-gray-700 fs-6">Dengan membubuhkan cek list, saya telah membaca dan menyetujui ketentuan di atas.</span>
                </label>
            </div>
            <div class="fv-row mb-4">
                <div class="g-recaptcha" data-sitekey="6LfFNQkdAAAAAFXLESoqX4MXCtrQiB23mIxGq9SJ"></div>
            </div>
        </div>
        <div class="card-footer d-flex justify-content-end py-6 px-9">
            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Kembali</button>
            {{-- <button type="submit" class="btn btn-secondary" disabled id="kt_registrasi_perusahaan_submit">Submit</button> --}}
            {{-- <a href="registrasi-jarjastel-pemohon" class="btn btn-primary" id="kt_registrasi_perusahaan_submit">Submit</a> --}}
            <button type="submit" class="btn btn-primary" id="kt_registrasi_perusahaan_submit">Submit</button>
        </div>
    </form>
</div>
@push('scripts')
<script>
    $('#ceksyarat').change(function () {
        // alert('changed');
        if ($('#ceksyarat').is(':checked')) {
            $("#kt_registrasi_perusahaan_submit").removeAttr("disabled");
            $('#kt_registrasi_perusahaan_submit').removeClass('btn-secondary');
            $('#kt_registrasi_perusahaan_submit').addClass('btn-primary');
        }else{
            $('#kt_registrasi_perusahaan_submit').prop('disabled', true);
            $('#kt_registrasi_perusahaan_submit').removeClass('btn-primary');
            $('#kt_registrasi_perusahaan_submit').addClass('btn-secondary');

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

    $("#kt_registrasi_perusahaan_submit").click(function(){
        if($("#nib").val()=="" || $("#nib_file").val()=="" || $("#nama_perusahaan").val()==""){
            event.preventDefault();
            swal("Peringatan!", "Mohon isi semua data!", "warning");
        }else if(grecaptcha.getResponse()==""){
            event.preventDefault();
            swal("Peringatan!", "Mohon isi Captcha!", "warning");
        }else{
            // event.preventDefault();
            // window.location.href = 'registrasi-jarjastel-person';
        }
    });

    $('#provinsi').on("change", function(){
        var id = $(this).val();
        // alert(id);
        $('#kota').find('option').not(':first').remove(); 
        $.ajax({
            url: '{{ url('getKota') }}/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){
                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){
                    for(var i=0; i<len; i++){

                        var id = response['data'][i].city_id;
                        var name = response['data'][i].city_name;

                        var option = "<option value='"+id+"'>"+name+"</option>"; 
                        $("#kota").select2("destroy");
                        $('#kecamatan').empty().trigger("change");
                        $('#desa').empty().trigger("change");
                        $('#kodepos').empty().trigger("change");
                        $("#kota").append(option); 
                        $("#kota").select2();
                    }
                }
            }
        });
    });

    $('#kota').on("change", function(){
        var id = $(this).val();
        $('#kecamatan').find('option').not(':first').remove(); 
        $.ajax({
            url: '{{ url('getKecamatan') }}/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){
                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){
                    for(var i=0; i<len; i++){

                        var id = response['data'][i].dis_id;
                        var name = response['data'][i].dis_name;

                        var option = "<option value='"+id+"'>"+name+"</option>";                 
                        $("#kecamatan").select2("destroy");
                        $('#desa').empty().trigger("change");
                        $('#kodepos').empty().trigger("change");

                        $("#kecamatan").append(option); 
                        $("#kecamatan").select2();
                    }
                }
            }
        });
    });

    $('#kecamatan').on("change", function(){
        var id = $(this).val();
        $('#desa').find('option').not(':first').remove(); 
        $.ajax({
            url: '{{ url('getDesa') }}/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){
                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){
                    for(var i=0; i<len; i++){

                        var id = response['data'][i].subdis_id;
                        var name = response['data'][i].subdis_name;

                        var option = "<option value='"+id+"'>"+name+"</option>";                 
                        $("#desa").select2("destroy");
                        $('#kodepos').empty().trigger("change");

                        $("#desa").append(option); 
                        $("#desa").select2();
                    }
                }
            }
        });
    });

    $('#desa').on("change", function(){
        var id = $(this).val();
        $('#kodepos').find('option').not(':first').remove(); 
        $.ajax({
            url: '{{ url('getKodepos') }}/'+id,
            type: 'get',
            dataType: 'json',
            success: function(response){
                var len = 0;
                if(response['data'] != null){
                    len = response['data'].length;
                }

                if(len > 0){
                    for(var i=0; i<len; i++){

                        var id = response['data'][i].postal_id;
                        var name = response['data'][i].postal_code;

                        var option = "<option value='"+id+"'>"+name+"</option>";                 
                        $("#kodepos").select2("destroy");
                        $("#kodepos").append(option); 
                        $("#kodepos").select2();
                    }
                }
            }
        });
    });
</script>
@endpush

@endsection