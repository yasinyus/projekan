"use strict";

// Class definition
var FormIzinJartel = function () {
	// Elements
	var modal;	
	var modalEl;

	var stepperEl;
	var form;
	var submitBtn;
	var nextBtn;

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
			kodeIzinBaruText: null,
			kbli : null,
			jenisPenyelenggaraan : null,
			mediaTransmisi: null,
			persetujuan: false
		}
	var kodeIzinList = [];
	var jenisPerizinan;

	// Private Functions
	var initStepper = function () {
		stepper = new KTStepper(stepperEl);

		// Stepper change event(handle hiding submit button for the last step)
		stepper.on('kt.stepper.changed', function(stepper) {
			if (stepper.getCurrentStepIndex() == 4) {		
				show(submitBtn);
				hide(nextBtn);
			} else {
				hide(submitBtn);
				show(nextBtn);
			}
			// if (stepper.getCurrentStepIndex() == 3) {
			// 	hide(modalEl.querySelector("#formTitle"));		
			// } else {
			// 	show(modalEl.querySelector("#formTitle"));
			// }
		});

		// Validation before going to next page
		stepper.on('kt.stepper.next', function (stepper) {
			// Validate form before change stepper step
			var currentStep = stepper.getCurrentStepIndex();
			var validator = validations[currentStep - 1]; 			
			if (validator) {
				validator.validate().then(function (status) {
					if (status == 'Valid') {
						console.log(status)
						nextStepFillData();
						if(currentStep == 1) {
							if((currentData.kbli =='61200' || currentData.kbli == '61100') && currentData.kodeIzinBaruText == '59000000051') {
								stepper.goTo(2);
							} else if(currentData.kbli =='61924') {			
								stepper.goTo(3);																			
							} else {
								stepper.goTo(4);
							}
						} else if(currentStep == 2 || currentStep == 3){							
							stepper.goTo(4);
						}
					} else {
						console.log('INVALID');
					}
				});
			} else {
				stepper.goNext();
				KTUtil.scrollTop();
			}
		});

		// Prev event
		stepper.on('kt.stepper.previous', function (stepper) {
			if(stepper.getCurrentStepIndex() == 4) {
				if((currentData.kbli =='61200' || currentData.kbli == '61100') && currentData.kodeIzinBaruText == '59000000051') {
					stepper.goTo(2);
				} else if(currentData.kbli=='61924') {			
					stepper.goTo(3);
				} else{
					stepper.goTo(1);
				}
			} else if(stepper.getCurrentStepIndex() == 3 || stepper.getCurrentStepIndex() == 2){
				stepper.goTo(1);
			} else {
				stepper.goPrevious();
			}
			KTUtil.scrollTop();
		});

		submitBtn.addEventListener('click', function (e) {
			// Validate form before change stepper step	
				var validator = validations[3]; // get validator for last form
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
				
		$('#kt_modal_izin_jartel').on('hidden.bs.modal', function () {
			resetForm();
    	});
		
		$("#jenisPerizinanInput").select2({
			placeholder: "Pilih Izin Jaringan / Jasa"
		});
		
		$("#jenisPerizinanInput").on("change", function(e) {
			jenisPerizinan = $("#jenisPerizinanInput option:selected").val();
			$("#kodeIzinBaruInput").val(null).trigger("change");
			$("#kbliInput").val('');
			$("#jenisPenyelenggaraanInput").val('');
			$("#mediaTransmisiInput").val('');
		});
		
		$("#kodeIzinBaruInput").select2({
			placeholder: "Kode Izin Baru",
			ajax: {
		        url:  function() {
		        	return "/master/kode-izin/" + $("#jenisPerizinanInput option:selected").val();
		        },
		        dataType: 'json',
		        type: "get",
		        headers: {"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")},
		        data: function (params) {
		            return {
		            	term: params.term
		            };
		        },
		        processResults: function (data) {
		            return {
		                results: $.map(data, function (item) {
		                	kodeIzinList[item.id] = {										
										kbli: item.kbli,
										kode: item.kode,
				                        jenisPenyelenggaraan: item.judul_kbli,
				                        mediaTransmisi: item.media_transmisi
			                        }
		                    return {
		                        text: item.kode,
		                        id: item.id,
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

		// Step 2 JASTELDAS
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
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

		// Step 3 NAP
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
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


		// Step 4
		validations.push(FormValidation.formValidation(
			form,
			{
				fields: {
					checkboxAgreementSetuju : {
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
		stepper.goTo(1);
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
	    		document.querySelector('#kt_stepper_form_jartel').reset();	    		
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
		currentData.kodeIzinBaruText = kodeIzinList[currentData.kodeIzinBaru].kode;
		currentData.kbli = $('#kbliInput').val();
		currentData.jenisPenyelenggaraan = $('#jenisPenyelenggaraanInput').val();		
		$('#tanggalPengajuanText2').text(currentData.tanggalPengajuan);
		$('#jenisPerizinanText2').text(currentData.jenisPerizinan);
		$('#kodeIzkodeIzinBaruText2').text(currentData.kodeIzinBaruText);
		$('#kbliText2').text(currentData.kbli);
		$('#jenisPenyelenggaraanText2').text(currentData.jenisPenyelenggaraan);	
	}
	
	var showModalSummary = function () {
		$("#jenisPenyelenggaraanSummary").html(currentData.jenisPenyelenggaraan);
		$("#mediaTransmisiSummary").html(currentData.mediaTransmisi);		
		$("#kodeIzinBaruSummary").html(currentData.kodeIzinBaruText);
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
             tanggal_pengajuan: $('#tanggalPengajuanInput').val(),             
			 kode_izin_id: $('#kodeIzinBaruInput').val()
        };
        
        $.ajax({
            url: "/perizinan/daftar",
            type: "post",
            contentType: "application/json",
            headers: {"X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")},
            data: JSON.stringify(requestBody),            
            success: function (data) {                
                // Hide loading indication
				submitBtn.removeAttribute('data-kt-indicator');
				// Enable button
				submitBtn.disabled = false;
				document.querySelector('#kt_stepper_form_jartel').reset();	    		
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
			modalEl = document.querySelector('#kt_modal_izin_jartel');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			stepperEl = document.querySelector('#kt_stepper_izin_jartel');
			form = document.querySelector('#kt_stepper_form_jartel');
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
    FormIzinJartel.init();
});