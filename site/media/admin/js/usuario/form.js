$(document).ready(function(){
	$('input[name="email"]').blur(function(){
		email = $(this);
		$.ajax({
			type: 'POST',
			url: live+'/admin/usuario/acao/email',
			data: {
				email: email.val(),
				id_usuario: $('input[name="id"]').val()
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
	
	
	$('#form-usuario').submit(function(){
		var valido = true;
		var campos = new Array();
		var msg = new Array();
		
		$('input[required-field],textarea[required-field],select[required-field]')
				.each(function() {
					$this = $(this);
					if (!$this.val()) {
						valido = false;
						campos.push($this.attr('label') || $this.attr('name'));
					}
				});

		$('input[email]').each(
				function() {
					$this = $(this);
					if ($this.val()) {
						if (!email_regex.test($this.val())) {
							valido = false;
							msg
									.push(($this.attr('label') || $this
											.attr('name'))
											+ " contém um email inválido.");
						}
					}
				});

		if($('input[name="email"]').attr('valido') == '' || $('input[name="email"]').attr('valido') == null) {
			alert('Aguarde a validação do email.');
			return false;
		}
				
		if(!$('input[name="id"]').val() || $('input[name="senha"]').val()){
			
			if(!$('input[name="senha"]').val() && !$('input[name="id"]').val() ) {
				valido = false;
				msg.push('Senha é obrigatória no cadastro');
			} else if(!$('input[name="senha"]').val() || $('input[name="senha"]').val() != $('input[name="senha-conf"]').val()) {
				valido = false;
				msg.push('Senhas não conferem');			
			}
		}
		
		email = $('input[name="email"]');
		if(!email.val() || email.attr('valido') != 1) {
			valido = false;
			msg.push('Email inválido');
		}
		
		if(!valido) {
			var txt = '';
			
			if(campos.length)
				txt += 'Preenchha os campos: '+campos.join(', ')+'<br/>';
				
			if(msg.length)
				txt += msg.join(' | ');
			
			$('#box-erros').html(txt);
			$('#message-red').show();
		}
			
		return valido;
	});
})