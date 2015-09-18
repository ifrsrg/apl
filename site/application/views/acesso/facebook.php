<html>
<head>
	<title>Redirecionando...	Aguarde !</title>
	
</head>
<body>
Redirecionando...	Aguarde !
<script type="text/javascript">
		var msg = '{msg}';
		var urlChamada = '{urlChamada}';
		var urlRetorno = '{urlRetorno}';
		if(msg!=''){
			alert(msg);
		}
		if(urlChamada!=''){
			location.href = urlChamada;
		}
		if(urlRetorno!=''){
			opener.location.href = urlRetorno;
			window.close();
		}

</script>
</body>
</html>

	 