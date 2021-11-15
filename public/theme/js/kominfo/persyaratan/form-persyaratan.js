
// Class definition
var FormPersyaratan = function () {
	// Elements		
	var formDat;
	var submitButton;
	var cancelButton;
	var saveAllDataButton;
	var goToDashboardButton;
	
	//method
	var initForm = () => {
		goToDashboardButton.addEventListener('click', function (e) {
            e.preventDefault();
            window.location.href= window.location.origin + "/dashboard";
        })
		
	}
	
	var handleSubmit = () => {
		submitButton.addEventListener('click', function (e) {
            e.preventDefault();
            //Pop Up Modal Confirm                        
            $("#kt_modal_confirmation").modal('show');
        })
	}
	
	var handleCancel = () => {		
		cancelButton.addEventListener('click', function (e) {
            e.preventDefault();            
            //Popup
            Swal.fire({
            	title: 'Apakah Anda yakin?',
    	        text: "Data yang Anda isi akan hilang!",
    	        icon: 'warning',
    	        buttonsStyling: false,    	        
    	        showCancelButton: true,    	            	           	        
    	        confirmButtonText: 'Ya, saya yakin!',
    	        cancelButtonText: 'Kembali',
    	        customClass: {
    	            confirmButton: "btn btn-purple",
    	            cancelButton: "btn btn-secondary"
    	        }
    	    }).then((result) => {
	    	  if (result.isConfirmed) {
	    		  window.location.href= window.location.origin + "/dashboard";
    		  }
    		});
        })
	}
		
	var handleSaveAllData = () => {
		console.log(saveAllDataButton);
		saveAllDataButton.addEventListener('click', function (e) {
            e.preventDefault();
            if ($('#checkbox-agreement').is(':checked')) {
            	//API
            	$("#kt_modal_confirmation").modal('hide');
            	$("#kt_modal_summary").modal('show');
            } else {
            	Swal.fire({
					text: "Anda harus memilih setuju",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "OK",
					customClass: {
						confirmButton: "btn btn-purple"
					}
				}).then(function () {					
				});
            }
        })
	}
	
	
	return {
		// Public Functions
		init: function () {			
			submitButton = document.querySelector('#submit-document');			
			cancelButton = document.querySelector('#cancel-submision');
			saveAllDataButton = document.querySelector('#save-all-data');
			goToDashboardButton = document.querySelector('#go-to-dashboard');
			initForm();
			handleSubmit();
			handleCancel();
			handleSaveAllData();
		}
	};
}();

//On document ready
KTUtil.onDOMContentLoaded(function() {
	FormPersyaratan.init();
});