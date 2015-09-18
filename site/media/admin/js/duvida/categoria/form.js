$(document).ready(function(){
	$('#form-duvida-categoria').submit(function(){
		var valido = true;
		var msg = '';
		$('#message-red').hide();
		
		if(!$('#duvida-categoria').val()) {
			valido = false;
			msg += 'Preencha o nome da categoria';
		}
		
		if(!valido) {
			$('#box-erros').html(msg);
			$('#message-red').show();
			return false;
		}
	});
});