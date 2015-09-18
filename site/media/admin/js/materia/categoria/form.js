$(document).ready(function(){	
	$('#form-materia-categoria').submit(function(){
		var valido = true;
		var campos = new Array();
		
		$('#message-red').hide();
		
		if(!$('#materia_categoria').val()) {
			campos.push('Nome da Categoria');
			valido = false;
		}

		if(!$('#id_segmento').val()) {
			campos.push('Segmento');
			valido = false;
		}
		
		if(!valido) {
			$('#box-erros').html('Preencha os campos: '+campos.join(', '));
			$('#message-red').show();
			return false;
		}
		
		return true;
	})
})