@extends('layout.template')

@section('content')

<div class="d-flex flex-column flex-root">
    <!--begin::List Widget 9-->
    <div class="text-left mb-5">
        <h2 class="text-left mb-3">
            Layanan Izin Jaringan Telekomunikasi
        </h2>
    </div>
        
    <!--begin::Card Informasi & Status Permohonan-->
    <div class="card card-flush me-5 mb-10">
        <div class="card-body pt-5 px-20">
            <h3>Informasi & Status Permohonan</h3>			    	
            <div class="form-group row">
                <label  class="col-3 col-form-label">Nama Perusahaan</label>
                <div class="col-9">
                <span>:</span>
                <label class="col-form-label fw-bold" 
                    id= "namaPerusahaanText" th:value="${applicationInfo.namaPerusahaan}" 										   		
                    th:text="${applicationInfo.namaPerusahaan}">
                </label>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-3 col-form-label">Nomor NIB</label>
                <div class="col-9">
                        <span>:</span>										    
                <label class="col-form-label fw-bold" 
                    id= "nomorNIBText" th:value="${applicationInfo.nomorNIB}"
                    th:text="${applicationInfo.nomorNIB}"></label>
            </div>
            </div>									   
                <div class="form-group row">
                <label  class="col-3 col-form-label">Nomor KIB</label>
                <div class="col-9">
                <span>:</span>
                <label  class="col-form-label fw-bold"
                    id="pemohonText" th:value="${applicationInfo.nomorKIB}"
                    th:text="${applicationInfo.nomorKIB}"></label>
                </div>
            </div>									   					
            <div class="form-group row">
                <label  class="col-3 col-form-label">Tgl. Pengajuan</label>
                <div class="col-9">
                <span>:</span>
                <label  class="col-form-label fw-bold"
                    id="tanggalPengajuanText" th:value="${#dates.format(applicationInfo.tanggalPengajuan, 'dd-MM-yyyy')}"
                    th:text="${#dates.format(applicationInfo.tanggalPengajuan, 'dd-MM-yyyy')}"></label>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-3 col-form-label">Jenis Perizinan</label>
                <div class="col-9">
                <span>:</span>
                <label  class="col-form-label fw-bold"
                    id="jenisPerizinanText" th:value="${applicationInfo.jenisPerizinan}"
                    th:text="${applicationInfo.jenisPerizinan}"></label>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-3 col-form-label">Kode KBLI</label>
                <div class="col-9">
                <span>:</span>
                <label  class="col-form-label fw-bold"
                    id="kbliText" th:value="${applicationInfo.kbli}"
                    th:text="${applicationInfo.kbli}"></label>
                </div>
            </div>
            <div class="form-group row">
                <label  class="col-3 col-form-label">Jenis Layanan</label>
                <div class="col-9">
                <span>:</span>
                <label  class="col-form-label fw-bold"
                    id="jenisLayananText" th:value="${applicationInfo.jenisLayanan}"
                    th:text="${applicationInfo.jenisLayanan}"></label>
                </div>										    										    
            </div>
            <div class="form-group row">
                <label  class="col-3 col-form-label">Jenis Layanan</label>
                <div class="col-9">
                <span>:</span>
                <label  class="col-form-label fw-bold"
                    id="jenisLayananText" th:value="${applicationInfo.mediaTransmisi}"
                    th:text="${applicationInfo.mediaTransmisi}"></label>
                </div>										    										    
            </div>
            <div class="form-group row">
                <label  class="col-3 col-form-label">No. Permohonan</label>
                <div class="col-9">
                <span>:</span>
                <label  class="col-form-label fw-bold"
                    id="nomorPermohonanText" th:value="${applicationInfo.nomorPermohonan}"
                    th:text="${applicationInfo.nomorPermohonan}"></label>
                </div>										    										    
            </div>						
        </div>										
    </div>
    <!--end::Card Informasi & Status Permohonan-->
    
    <!-- begin::Penyelenggaraan Jaringan Tetap Tertutup -->
    @include('persyaratan.form-kplt-jartup-terestrial')
    
    @include('persyaratan.form-kplt-jartup-skkl')		
    
    @include('persyaratan.form-kplt-jartup-microwave')
    
    @include('persyaratan.form-kplt-jartup-satelit')

    @include('persyaratan.form-kplt-jartup-vsat')
    <!--end::Penyelenggaraan Jaringan Tetap Tertutup -->
    
    <!--begin::Penyelenggaraan Jaringan Tetap Lokal Berbasis Packet Switched -->
    @include('persyaratan.form-kplt-jartap-lbps')
    <!--end::Penyelenggaraan Jaringan Tetap Lokal Berbasis Packet Switched -->
    
    <!--begin::Penyelenggaraan Jaringan Bergerak Terestrial Radio Trunking -->
    @include('persyaratan.form-kplt-pjb-trt')
    <!--end::Penyelenggaraan Jaringan Bergerak Terestrial Radio Trunking-->
    
    <!--begin::Penyelenggaraan Jaringan Bergerak Satelit -->
    @include('persyaratan.form-kplt-pjb-satelit')
    <!--end::Penyelenggaraan Jaringan Bergerak Satelit-->
    
        
    <!--begin::Komitmen Kinerja Layanan -->
    @include('persyaratan.form-komitmen-kinerja')
    <!--end::Komitmen Kinerja Layanan-->
    
    <!--begin::Formulir Data Alat/Teknis-->
    @include('persyaratan.form-data-alat-teknis')
    <!--end::Formulir Data Alat/Teknis-->		
    
    <!--begin::Document Upload-->
    @include('persyaratan.form-dokumen-nbh')
    <!--end::Document Upload-->

    <!--begin::Document Upload Badan Hukum-->
	@include('persyaratan.form-dokumen-bh')
	<!--end::Document Upload Badan Hukum-->

</div>
	
	
	
	
	
	<!--begin::Modal Confirmation-->	
	@include('persyaratan.modal-konfirmasi')
	<!--end::Modal Confirmation-->									

    <!--begin::Modal - Summary -->
    @include('persyaratan.modal-summary')
    <!--end::Modal - Summary -->		

@endsection

@once
    @push('scripts')    
    <script src="{{asset('theme')}}/js/kominfo/persyaratan/form-persyaratan.js" type="text/javascript"></script>		
    @endpush
@endonce
