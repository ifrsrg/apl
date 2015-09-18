$(document).ready(function(){
	$('input[name="email"]').blur(function(){
		email = $(this);
		$.ajax({
			type: 'POST',
			url: live+'/admin/cliente/acao/email',
			data: {
				email: email.val(),
				id_cliente: $('input[name="id"]').val()
			},
			beforeSend: function(){
				if(!email.attr('valido'))
					return false;
				
				if(!email.val()) {
					$('.email-valido').hide();
					$('.email-invalido').show();
					email.attr('valido', '0');
					return false;
				}
				
				email.attr('disabled', 'disabled');
				email.attr('valido', '');
				$('.email-valido').hide();
				$('.email-invalido').hide();
				$('#email-loader').show();
			}, 
			success: function(data){
				if(data==1) {
					$('.email-valido').show();
					email.attr('valido', '1');
				} else {
					$('.email-invalido').show();
					email.attr('valido', '0')
				}

			},
			error: function(){
				alert('Não foi possível validar o email informado. Por favor, tente novamente.');
				
				email.attr('valido', 0)
			},
			complete: function(){
				$('#email-loader').hide();
				email.removeAttr('disabled');
			}
		});
	});
	
	$('#form-cliente').submit(function(){
		email = $('input[name="email"]');
		$('#message-red').hide();
		valido = true;
		campos = new Array();
		
		if(!email.attr('valido')) {
			alert('Aguarde a validação do email.');
			return false;
		}
		
		if(!email.val() || email.attr('valido') != 1) {
			valido = false;
			campos.push('Email');
		}
		
		if(!valido) {
			$('#box-erros').html('Preencha os campos: '+campos.join(', '));
			$('#message-red').show();
			email.focus();
		}
		
		return valido;
	});
	
	
	$('#form-parceiro').submit(function(){
		var valido = true;
		var campos = new Array();
		
		$('#message-red').hide();
		
		if(!$('select[name="id_segmento"]').val() && !$('input[name="id_segmento"]').val()) {
			valido = false;
			campos.push('Segmento');
		}
		
		if(!valido) {
			$('#box-erros').html('Preencha os campos: '+campos.join(', '));
			$('#message-red').show();
			return false;
		}
	});
	
});