
// Class definition
var FormIzinJastel = function () {
	// Elements
	var modal;	
	var modalJastelDasEl;
	var modalJastelNapEl;
	var formJastelDas;
	var formJastelNap;
	var submitJastelDasBtn;
	var submitJastelNapBtn;


	var validations = [];
	var validationJastelDas;
	var validationJastelNap;
	var currentData = {
			namaPerusahaan : null,
			nomorNIB : null,
			pemohon : null,
			jabatan : null,
			tanggalPengajuan : null,			
			jenisPerizinan : null,
			kodeIzinBaru: null,
			kbli : null,
			jenisPenyelenggaraan : null,
			mediaTransmisi: null,
			persetujuan: false
		}
	var kodeIzinList = [];

	// Private Functions
	var submitJastelDasHandler = function () {

		submitJastelDasBtn.addEventListener('click', function (e) {
			validationJastelDas.validate().then(function (status) {

				if (status == 'Valid') {
					// Prevent default button action
					e.preventDefault();					
					// Disable button to avoid multiple click
					submitJastelDasBtn.disabled = true;

					// Show loading indication
					submitJastelDasBtn.setAttribute('data-kt-indicator', 'on');
					
					processApplication();
				} else {
					e.preventDefault();
					Swal.fire({
						text: "Anda harus mengisi kolom yang diperlukan",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "OK",
						customClass: {
							confirmButton: "btn btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});

		});
	}
	
	// Private Functions
	var submitJastelNapHandler = function () {

		submitJastelNapBtn.addEventListener('click', function (e) {
			validationJastelNap.validate().then(function (status) {

				if (status == 'Valid') {
					// Prevent default button action
					e.preventDefault();					
					// Disable button to avoid multiple click
					submitJastelNapBtn.disabled = true;

					// Show loading indication
					submitJastelNapBtn.setAttribute('data-kt-indicator', 'on');
					
					processJastelDasNap();
				} else {
					e.preventDefault();
					Swal.fire({
						text: "Anda harus mengisi kolom yang diperlukan",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "OK",
						customClass: {
							confirmButton: "btn btn-light"
						}
					}).then(function () {
						KTUtil.scrollTop();
					});
				}
			});

		});
	}

	// Init form inputs
	var initForm = function() {
		
		$(window).keydown(function(event){
		    if(event.keyCode == 13) {
		      event.preventDefault();
		      return false;
		    }
		  });
				
		initSelect2Placeholder();
		
		$('#kt_modal_izin_jasteldas').on('hidden.bs.modal', function () {
			resetForm();			
    	});
	}

	var initValidation = function () {
		// Jasteldas
		validationJastelDas = FormValidation.formValidation(
			formJastelDas,
			{
				fields: {
					jaringanTetapLbcs: {
						validators: {
							notEmpty: {
								message: 'Kolom ini diperlukan'
							}
						}
					},
					jaringanTetapSljj: {
						validators: {
							notEmpty: {
								message: 'Kolom ini diperlukan'
							}
						}
					},
					jaringanTetapSli: {
						validators: {
							notEmpty: {
								message: 'Kolom ini diperlukan'
							}
						}
					},
					jaringanBergerakSeluler: {
						validators: {
							notEmpty: {
								message: 'Kolom ini diperlukan'
							}
						}
					},
					jaringanBergerakSatelit: {
						validators: {
							notEmpty: {
								message: 'Kolom ini diperlukan'
							}
						}
					}	
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Jastelnap
		validationJastelNap = FormValidation.formValidation(
			formJastelNap,
			{
				fields: {					
					jaringanTetapTertutup: {
						validators: {
							notEmpty: {
								message: 'Kolom ini diperlukan'
							}
						}
					},
					nomorKomitmen: {
						validators: {
							notEmpty: {
								message: 'Kolom ini diperlukan'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					// Bootstrap Framework Integration
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);
		
	}

	var hide = (elem) => {
	    elem.style.display = 'none';
	}

	var show = (elem) => {
	    elem.style.display = 'block';
	}
	
	var resetForm = () => {
		$('form select').each(function( index ) {
			$(this).val(null).trigger('change');			
		});		
	}
	
	var swalOnSubmit = function (text, type) {
	    Swal.fire({
	        text: text,
	        icon: type,
	        buttonsStyling: false,
	        confirmButtonText: "Ok",
	        customClass: {
	            confirmButton: "btn btn-purple"
	        }
	    }).then(function () {
	    	if(type=="success") {
	    		modal.hide();
		    	KTTablePerizinanDalamProses.init();
	    	}	    	
	    });
	}
	
	var initData = function() {	
		currentData.namaPerusahaan = $('#namaPerusahaanText').attr("value");		
		currentData.nomorNIB = $('#nomorNIBText').attr("value");
		currentData.pemohon = $('#pemohonText').attr("value");
		currentData.jabatan = $('#jabatanText').attr("value");
	}		
	
	var initSelect2Placeholder = function () {
		$("#jaringanTetapLbcsInput").select2({
			placeholder: "Pilih jaringan tetap lokal berbasis circuit switched"
		});
		$("#jaringanTetapSljjInput").select2({
			placeholder: "Pilih jaringan tetap sambungan langsung jarak jauh"
		});
		$("#jaringanTetapSliInput").select2({
			placeholder: "Pilih jaringan tetap sambungan internasional"
		});
		$("#jaringanBergerakSelulerInput").select2({
			placeholder: "Pilih jaringan bergerak seluler"
		});
		$("#jaringanBergerakSelulerSatelit").select2({
			placeholder: "Pilih jaringan bergerak satelit"
		});
		$("#jaringanBergerakTrtInput").select2({
			placeholder: "Pilih jaringan bergerak terestrial radio trunking"
		});
		$("#jaringanTetapTertutupInput").select2({
			placeholder: "Pilih Penyelenggaraan Jaringan Tetap Tertutup"
		});
		$("#nomorKomitmenInput").select2({
			placeholder: "Pilih Nomor Komitmen Pembangunan sesuai dengan Izin JarTup yang digunakan diatas"
		});
	}
		
	
	//API Call
	var processApplication = function () {
        showLoading();
        var requestBody = {
    		 applicantId: null,
             jaringanTetapLbcs: $('#jaringanTetapLbcsInput').val(),
             jaringanTetapSljj: $('#jaringanTetapSljjInput').val(),
             jaringanTetapSli: $('#jaringanTetapSliInput').val(),
             jaringanBergerakSeluler: $('#jjaringanBergerakSelulerInput').val(),
             jaringanBergerakSatelit: $('#jaringanBergerakSatelitInput').val(),
             jaringanBergerakTrt: $('#jaringanBergerakTrtInput').val(),
        };
        
        $.ajax({
            url: "/application/jastel/submit",
            type: "post",
            contentType: "application/json",
            headers: {"X-CSRF-TOKEN": $("meta[name='_csrf']").attr("content")},
            data: JSON.stringify(requestBody),            
            success: function (data) {                
                // Hide loading indication
				submitJastelDasBtn.removeAttribute('data-kt-indicator');
				// Enable button
				submitJastelDasBtn.disabled = false;
				swalOnSubmit("Anda berhasil mengajukan perizinan.", "success");
            },
            error: function () {
            	// Hide loading indication
				submitJastelDasBtn.removeAttribute('data-kt-indicator');
				// Enable button
				submitJastelDasBtn.disabled = false;
				swalOnSubmit("Maaf, sepertinya terdapat kesalahan sistem. Silahkan coba kembali.", "error");
            }
        });
		
	}
	
	var processJastelDasNap = function () {
        showLoading();
        var requestBody = {
    		 applicantId: null,             
             jaringanTetapTertutup: $('#jaringanTetapTertutupInput').val(),
             nomorKomitmen: $('#nomorKomitmenInput').val(),
        };
        
        $.ajax({
            url: "/application/jastel/submit",
            type: "post",
            contentType: "application/json",
            headers: {"X-CSRF-TOKEN": $("meta[name='_csrf']").attr("content")},
            data: JSON.stringify(requestBody),            
            success: function (data) {                
                // Hide loading indication
				submitJastelNapBtn.removeAttribute('data-kt-indicator');
				// Enable button
				submitJastelNapBtn.disabled = false;
				swalOnSubmit("Anda berhasil mengajukan perizinan.", "success");
            },
            error: function () {
            	// Hide loading indication
            	submitJastelNapBtn.removeAttribute('data-kt-indicator');
				// Enable button
            	submitJastelNapBtn.disabled = false;
				swalOnSubmit("Maaf, sepertinya terdapat kesalahan sistem. Silahkan coba kembali.", "error");
            }
        });
		
	}
	
	return {
		// Public Functions
		init: function () {
			// Elements
			modalJastelDasEl = document.querySelector('#kt_modal_izin_jasteldas');
			modalJastelNapEl = document.querySelector('#kt_modal_izin_jastelnap');
			

			modal = new bootstrap.Modal(modalJastelDasEl);						
			
			formJastelDas = document.querySelector('#form_izin_jasteldas');
			formJastelNap = document.querySelector('#form_izin_jastelnap');
			submitJastelDasBtn = modalJastelDasEl.querySelector('#submit-jasteldas');
			submitJastelNapBtn = modalJastelNapEl.querySelector('#submit-jastelnap');
			initValidation();
			submitJastelDasHandler();
			submitJastelNapHandler();
			initForm();			
			initData();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    FormIzinJastel.init();
});