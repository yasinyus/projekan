
// Class definition
var FormDat = function () {
	// Elements		
	var formDat;
	var tambahDatBtn;
	var simpanDatBtn;
	var tbodyDat;
	var lokasi = [];
	var jenis = [];
	var merk = [];
	var buatan = [];
	var type = [];
	var serialNumber = [];
	var nomorSertifikat = [];
	var fotoPerangkat = [];
	var fotoSN = [];
	var fotoKempemilikan = [];
	var number = 1;
	
	
	//method
	var initForm = () => {
		
		$("#simpan-dat").click(function() {			
			$("input[name=lokasi\\[\\]]").each(function() {
			   taskArray.push($(this).val());
			});		  
		});
		
		$("#tambah-dat").click(function() {
			number++;
			$("#body-dat").append(addNewRow(number));
			$("#dat-delete-"+(number-1)).attr("disabled", "disabled");
			console.log($("#dat-delete-"+(number-1)));
		});
		
		$("#body-dat").on('click','.remove',function(){
	        $(this).parent().parent().remove();
	        number --;
	        $("#dat-delete-"+(number)).removeAttr("disabled");
	    });
		
	}
	
	var addNewRow = (number) => {
		var datRow = `
			<tr>
	            <td>`+ number +`</td>
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
	            <button id="dat-delete-`+ (number) + `" class="btn btn-icon btn-danger remove w-30px h-30px">
					<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
					<span class="svg-icon svg-icon-light svg-icon-3">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M21 13H3C2.4 13 2 12.6 2 12C2 11.4 2.4 11 3 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13Z" fill="black"/>
						</svg>
					</span>
				</button>
				</td>
	        </tr>	
		`;
		return datRow;
	}
	
	
	return {
		// Public Functions
		init: function () {
			formDat = document.querySelector("#form-dat");
			tambahDatBtn = document.querySelector("#tambah-dat");			
			simpanDatBtn = document.querySelector("#simpan-dat");
			tbodyDat = $("body-dat");			
			initForm();	
		}
	};
}();

//On document ready
KTUtil.onDOMContentLoaded(function() {
    FormDat.init();
});