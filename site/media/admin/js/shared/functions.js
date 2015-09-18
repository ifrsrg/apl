$(document).ready(function(){

	$(".campoDatePicker").datePicker({
		clickInput:true, 
		startDate:'01/01/2000',
		createButton:false
	});
        if($(".campoDatePicker").val()==''){
            $(".campoDatePicker").val(new Date().asString()).trigger('change');
        }

	$(".campoDatePicker").mask('99/99/9999', '_');
	
	$('.icon-2').click(function(e) {
		if(typeof $(this).attr('onclick') === 'undefined' || $(this).attr('onclick') == null) {
			if(!confirm('Confirma a exclusão do registro?\\nNão será possível recupera-lo?','Exclusão')) {
				e.preventDefault();
			}
		}
	});
});