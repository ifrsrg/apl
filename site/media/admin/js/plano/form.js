$(document).ready(function(){
	
	$('input[name="valor"]').money();

	$('input[name="tipo_plano"]').change(function(){
		if($('input[name="tipo_plano"]:checked').val() == 'I')
			$('.campos-tipo').attr('disabled', 'disabled');
		else
			$('.campos-tipo').removeAttr('disabled');
	});
	
	$('#form-plano').submit(function(){
		var valido = true;
		var campos = new Array();
		$('#message-red').hide();
		
		if(!$('select[name="id_segmento"]').val()) {
			valido = false;
			campos.push('Segmento');
		}
		
		if(!$('input[name="descricao"]').val()) {
			valido = false;
			campos.push('Nome do Plano');
		}
		
		if(!$('input[name="num_dias"]').val()) {
			valido = false;
			campos.push('Número de Dias');
		}
		
		if($('input[name="tipo_plano"]:checked').val() == 'O') {
			if(!$('input[name="num_fotos"]').val()) {
				valido = false;
				campos.push('Número de Fotos');
			}
			
			if(!$('input[name="num_videos"]').val()) {
				valido = false;
				campos.push('Número de Vídeos');
			}
		}
		
		if(!$('input[name="valor"]').val()) {
			valido = false;
			campos.push('Valor');
		}
		
		if(!valido) {
			$('#box-erros').html('Preencha os campos: '+campos.join(', '));
			$('#message-red').show();
			return false;
		}
	});
	
});