$(document).ready(function(){
	
	$('#form-alagamento').submit(function(){
		var valido = true;
		var campos = new Array();
		var msg = new Array();
		$('#message-red').hide();

		if(!$('input[name="horario"]').val()) {
			valido = false;
			campos.push('Hor&aacute;rio');
		}
		if(!$('input[name="local"]').val()) {
			valido = false;
			campos.push('Local');
		}
		if(!$('input[name="sentido"]').val()) {
			valido = false;
			campos.push('Sentido');
		}
		if(!$('input[name="referencia"]').val()) {
			valido = false;
			campos.push('Refer&ecirc;ncia');
		}
		
		if(!valido) {
			var txt = '';
			
			if(campos.length)
				txt += 'Preencha os campos: '+campos.join(', ')+'<br/>';
				
			if(msg.length)
				txt += msg.join(' | ');
			
			$('#box-erros').html(txt);
			$('#message-red').show();
		}
			
		return valido;
	});
})