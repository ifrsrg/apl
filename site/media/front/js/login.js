function esqueciSenha(button) {

	var email = $("[name='email']").val(),
	senha = $("[name='senha']").val();

	$.ajax({
			url: __live+"/autenticar/acao/esqueciminhasenha",
			type: "POST",
			data: {email:email},
			success: function(data) {
				var result = data.split("|");
				alert(result[1]);
			}
		});

	return false;
}

function login(button) {

	var email = $("[name='email']").val(),
	senha = $("[name='senha']").val();

	$.ajax({
			url: __live+"/autenticar/acao/autenticar",
			type: "POST",
			data: {email:email,senha:senha},
			success: function(data) {
				if(data != "1") {
					alert(data);
				} else {
					window.location.reload();
				}
			}
		});

	return false;
}

function paginaRestrita(button) {
	var moveto = $(button).val();
	if(moveto == 'admin') {
		window.location = __live+"/admin";
	} else if(moveto != "0") {
		$(button).val("0");
		$(".anchorPlaceholder").attr('href', "#"+moveto);
		$(".anchorPlaceholder").click();
	}
	return false;
}

function deslogar(button) {
	$.ajax({
			url: __live+"/autenticar/acao/deslogar",
			type: "POST",
			success: function(data) {
				window.location.reload();
			}
	});
	return false;
}
