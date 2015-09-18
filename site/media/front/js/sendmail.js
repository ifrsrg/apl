function sendmail(button) {
	$(button).after("<span class='aguarde'><br/>Enviando...</span>");
	$(button).hide();
	var validar = true;
	
	var data = {
			nome:$("form#form-contato [name='nome']").val(),
			email:$("form#form-contato [name='email']").val(),
			telefone:$("form#form-contato [name='telefone']").val(),
			assunto:$("form#form-contato [name='assunto']").val(),
			mensagem:$("form#form-contato [name='mensagem']").val()
		};
	
	if(!data.nome)
	{
		alert("Nome é um campo obrigatório");
		validar = false;
	} else
	if(!data.email)
	{
		alert("Email é um campo obrigatório");
		validar = false;
	} else
	if(!data.telefone)
	{
		alert("Telefone é um campo obrigatório");
		validar = false;
	} else
	if(!data.assunto)
	{
		alert("Assunto é um campo obrigatório");
		validar = false;
	} else
	if(!data.mensagem)
	{
		alert("Mensagem é um campo obrigatório");
		validar = false;
	} else
	if (!email_regex.test(data.email)) {
		alert('O Campo de Email deve conter um endereço de email válido.');
		validar = false;
	}
	
	if(validar){
		$.ajax({
			url: __live+"/contato/acao/enviar",
			data: data,
			type:"POST",
			success: function(data) {
				var msg = data.split("|")[1];
				alert(msg);
				$('.aguarde').remove();
				$(button).show();
				
				$('form#form-contato ').resetForm();
			},
			error: function() {
				$('.aguarde').remove();
				$(button).show();
			}
		});
	} else {
		$('.aguarde').remove();
		$(button).show();
	}
	return false;
}