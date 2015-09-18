$(document).ready(function(){
	$('#form-duvida').submit(function(){
		for ( instance in CKEDITOR.instances )
            CKEDITOR.instances[instance].updateElement();
		
		var valido = true;
		var campos = new Array();
		$('#message-red').hide();
		
		if(!$('#titulo').val()) {
			valido = false;
			campos.push('Título da Dúvida');
		}
		
		if(!$('#id_duvida_categoria').val()) {
			valido = false;
			campos.push('Categoria');
		}
		
		if(!$('#texto').val()) {
			valido = false;
			campos.push('Texto');
		}
		
		if(!valido) {
			$('#box-erros').html('Preencha os campos: '+campos.join('\, '));
			$('#message-red').show();
			return false;
		}
	});
});