
// Class definition
var FormIzinTelsus = function () {
	// Elements
	var modal;	
	var modalEl;

	var stepperEl;
	var form;
	var submitBtn;
	var nextBtn;
	var type;

	// Variables
	var stepper;
	var validations = [];
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
	var initStepper = function () {
		stepper = new KTStepper(stepperEl);

		// Stepper change event(handle hiding submit button for the last step)
		stepper.on('kt.stepper.changed', function(stepper) {
			if (stepper.getCurrentStepIndex() == 3) {		
				show(submitBtn);
				hide(nextBtn);
			} else {
				hide(submitBtn);
				show(nextBtn);
			}
			if (stepper.getCurrentStepIndex() == 3) {
				hide(modalEl.querySelector("#formTitle"));		
			} else {
				show(modalEl.querySelector("#formTitle"));
			}
		});

		// Validation before going to next page
		stepper.on('kt.stepper.next', function (stepper) {
			// Validate form before change stepper step
			var validator = validations[stepper.getCurrentStepIndex() - 1]; 
			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						stepper.goNext();
						nextStepFillData();
					} else {									
					}
				});
			} else {
				stepper.goNext();
				KTUtil.scrollTop();
			}
		});

		// Prev event
		stepper.on('kt.stepper.previous', function (stepper) {
			stepper.goPrevious();
			KTUtil.scrollTop();
		});

		submitBtn.addEventListener('click', function (e) {
			// Validate form before change stepper step	
				var validator = validations[2]; // get validator for last form
				validator.validate().then(function (status) {

				if (status == 'Valid') {
					// Prevent default button action
					e.preventDefault();					
					// Disable button to avoid multiple click
					submitBtn.disabled = true;

					// Show loading indication
					submitBtn.setAttribute('data-kt-indicator', 'on');
					
					processApplication();
				} else {
					e.preventDefault();
					Swal.fire({
						text: "Anda harus memilih setuju",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "OK",
						customClass: {
							confirmButton: "btn btn-purple"
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
				
		$('#kt_modal_izin_telsus').on('hidden.bs.modal', function () {
			resetForm();
    	});
		
		$("#jenisPerizinanInput").select2({
			placeholder: "Pilih Izin Jaringan / Jasa"
		});
		
		$("#kodeIzinBaruInput").select2({
			placeholder: "Kode Izin Baru",
			ajax: {
		        url: "/master/kode-izin",
		        dataType: 'json',
		        type: "get",
		        headers: {"X-CSRF-TOKEN": $("meta[name='_csrf']").attr("content")},
		        data: function (params) {
		            return {
		            	term: params.term
		            };
		        },
		        processResults: function (data) {
		            return {
		                results: $.map(data.data, function (item) {
		                	kodeIzinList[item.kode] = { 
			                			kbli: item.kbli,
				                        jenisPenyelenggaraan: item.jenisPenyelenggaraan,
				                        mediaTransmisi: item.mediaTransmisi
			                        }
		                    return {
		                        text: item.kode,
		                        id: item.kode,
		                        value: item.kode		                   
		                    }
		                })
		            };
		        }
		    }
		});
		
		$('#kodeIzinBaruInput').on("change", function(e) {
			var value = $("#kodeIzinBaruInput option:selected").val();		     
			var valueData = kodeIzinList[value];
			if(valueData) {
				$('#kbliInput').val(valueData.kbli);
				$('#jenisPenyelenggaraanInput').val(valueData.jenisPenyelenggaraan);
				$('#mediaTransmisiInput').val(valueData.mediaTransmisi);
			}			
		});
	}

	var initValidation = function () {
		// Step 1
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					jenisPerizinan: {
						validators: {
							notEmpty: {
								message: 'Jenis Perizinan harus diisi'
							}
						}
					},
					kodeIzinBaru: {
						validators: {
							notEmpty: {
								message: 'Kode Izin Baru harus diisi'
							}
						}
					},
					kbli: {
						validators: {
							notEmpty: {
								message: 'KBLI harus diisi'
							}
						}
					},
					jenisPenyelenggaraan: {
						validators: {
							notEmpty: {
								message: 'Jenis Penyelenggaraan harus diisi'
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
		));

		// Step 2
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					mediaTransmisi: {
						validators: {
							notEmpty: {
								message: 'Media Transmisi harus diisi'
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
		));

		// Step 3
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					checkboxAgreement : {
						validators: {
							notEmpty: {
								message: '<div class="hidden"></div>'
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
		));
		
	}

	var hide = (elem) => {
	    elem.style.display = 'none';
	}

	var show = (elem) => {
	    elem.style.display = 'block';
	}
	
	var resetForm = () => {
		$("#jenisPerizinanInput").val(null).trigger("change");
		$("#kodeIzinBaruInput").val(null).trigger("change");
		form.reset();
	}
	
	var swalOnSubmit = function (text, type) {
	    Swal.fire({
	        text: text,	        
	        buttonsStyling: false,
	        confirmButtonText: "Ok",	      
	        customClass: {
	            confirmButton: "btn btn-purple"
	        }
	    }).then(function () {
	    	if(type=="success") {
	    		document.querySelector('#kt_stepper_form_telsus').reset();	    		
		    	modal.hide();	    	
		    	stepper.goFirst();
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
	
	var nextStepFillData = function () {
		currentData.tanggalPengajuan = $('#tanggalPengajuanInput').val();
		currentData.jenisPerizinan = $('#jenisPerizinanInput option:selected').text();
		currentData.kodeIzinBaru = $('#kodeIzinBaruInput').val();
		currentData.kbli = $('#kbliInput').val();
		currentData.jenisPenyelenggaraan = $('#jenisPenyelenggaraanInput').val();		
		$('#tanggalPengajuanText2').text(currentData.tanggalPengajuan);
		$('#jenisPerizinanText2').text(currentData.jenisPerizinan);
		$('#kodeIzinBaruText2').text(currentData.kodeIzinBaru);
		$('#kbliText2').text(currentData.kbli);
		$('#jenisPenyelenggaraanText2').text(currentData.jenisPenyelenggaraan);	
	}
	
	var showModalSummary = function () {
		$("#jenisPenyelenggaraanSummary").html(currentData.jenisPenyelenggaraan);
		$("#mediaTransmisiSummary").html(currentData.mediaTransmisi);		
		$("#kodeIzinBaruSummary").html(currentData.kodeIzinBaru);
		$("#namaPerusahaanSummary").html(currentData.namaPerusahaan);
		$("#nibSummary").html(currentData.nomorNIB);
		$("#kbliSummary").html(currentData.kbli);
		let [d,M,y] = currentData.tanggalPengajuan.split(/[-]/);
		let date = new Date(y, M-1, d);
		let options = { year: 'numeric', month: 'long', day: 'numeric' };
		$("#tanggalPengajuanSummary").html(date.toLocaleDateString("id-ID", options));
		$("#kt_modal_sumary").modal('show');
	}

	//API Call
	var processApplication = function () {
        currentData.mediaTransmisi = $('#mediaTransmisiInput').val(); 
        var requestBody = {
    		 username: null,
             tanggalPengajuan: $('#tanggalPengajuanInput').val(),
             jenisPerizinan: $('#jenisPerizinanInput').val(),
             kbli: $('#kbliInput').val(),
             jenisPenyelenggaraan: $('#jenisPenyelenggaraanInput').val(),
             mediaTransmisi: $('#mediaTransmisiInput').val(),
             type: type
        };
        
        $.ajax({
            url: "/application/telsus/submit",
            type: "post",
            contentType: "application/json",
            headers: {"X-CSRF-TOKEN": $("meta[name='_csrf']").attr("content")},
            data: JSON.stringify(requestBody),            
            success: function (data) {
                // Hide loading indication
				submitBtn.removeAttribute('data-kt-indicator');
				// Enable button
				submitBtn.disabled = false;
				document.querySelector('#kt_stepper_form_telsus').reset();	    		
		    	modal.hide();	    	
		    	stepper.goFirst();		    	
				showModalSummary();
				KTTablePerizinanDalamProses.init();
            },
            error: function () {
            	// Hide loading indication
				submitBtn.removeAttribute('data-kt-indicator');
				// Enable button
				submitBtn.disabled = false;
				swalOnSubmit("Maaf, sepertinya terdapat kesalahan sistem. Silahkan coba kembali.");
            }
        });		
	}
	
	return {
		// Public Functions
		init: function () {
			// Elements
			type = $("#telsus-type").text();			
			modalEl = document.querySelector('#kt_modal_izin_telsus');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			stepperEl = document.querySelector('#kt_stepper_izin_telsus');
			form = document.querySelector('#kt_stepper_form_telsus');
			nextBtn = stepperEl.querySelector('#nextStep');
			submitBtn = stepperEl.querySelector('#submitPermohonan');
			initStepper();
			initForm();
			initValidation();
			initData();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    FormIzinTelsus.init();
});