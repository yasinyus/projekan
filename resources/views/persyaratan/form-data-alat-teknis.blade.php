<div class="card card-flush me-5 mb-10">			
        <div class="card-body pt-5 px-20">
            <div class="table-responsive">
            <h3 class="mb-10">Formulir Data Alat/Teknis</h3>			    	
            <table class="table table-row-bordered form-table">
            <thead>
                <tr class="fw-bolder fs-6 text-center text-gray-800">
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>Jenis</th>
                    <th>Merk</th>
                    <th>Buatan</th>
                    <th>Type</th>
                    <th>Serial Number</th>
                    <th>No Sertifikat*</th>
                    <th class="min-w-75px">Foto Perangkat</th>
                    <th class="min-w-75px">Foto Serial Number</th>
                    <th class="min-w-75px">Bukti Kepemilikan Perangkat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            
            <tbody id="body-dat">
                <tr>
                    <td>1</td>
                    <td><input type="text" name="lokasi[]" class="form-control form-control-sm" placeholder="Text"/></td>
                    <td><input type="text" name="jenis[]" class="form-control form-control-sm" placeholder="Text"/></td>
                    <td><input type="text" name="merk[]" class="form-control form-control-sm" placeholder="Text"/></td>
                    <td><input type="text" name="buatan[]" class="form-control form-control-sm" placeholder="Text"/></td>
                    <td><input type="text" name="type[]" class="form-control form-control-sm" placeholder="Text"/></td>
                    <td><input type="text" name="serial-number[]" class="form-control form-control-sm" placeholder="Text"/></td>
                    <td><input type="text" name="nomor-sertifikat[]" class="form-control form-control-sm" placeholder="Text"/></td>
                    <td><input type="file" name="foto-perangkat[]" class="form-control form-control-sm w-75px" accept="application/pdf"/></td>
                    <td><input type="file" name="foto-sn[]" class="form-control form-control-sm w-75px" accept="application/pdf"></td>
                    <td><input type="file" name="foto-bukti-kepemilikan[]" class="form-control form-control-sm w-75pc" accept="application/pdf"/>
                    </td>				            
                    <td class="items-align-center">
                    <button id="dat-delete-1" class="btn btn-icon btn-danger remove w-30px h-30px" disabled>
                        <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                        <span class="svg-icon svg-icon-light svg-icon-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M21 13H3C2.4 13 2 12.6 2 12C2 11.4 2.4 11 3 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13Z" fill="black"/>
                            </svg>
                        </span>
                    </button>
                    </td>
                </tr>				        		       
            </tbody>
        </table>
        </div>
        <!--begin::Actions-->					        							        
        <div class="d-flex flex-stack pt-10">
            <!--begin::Wrapper-->
            <div class="me-2">
                <button type="button" id="tambah-dat" class="btn btn-outline btn-outline-primary">
                    TAMBAH DATA
                </button>
            </div>
            <!--end::Wrapper-->							
            <!--begin::Wrapper-->
            <div>
                <button type="button" id="simpan-dat" class="btn btn-outline btn-outline-success">
                    SIMPAN DATA
                </button>									                
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Actions-->		
    </div>										
</div>

@once
    @push('scripts')        
    <script src="{{asset('theme')}}/js/kominfo/persyaratan/form-dat.js" type="text/javascript"></script>    
    @endpush
@endonce