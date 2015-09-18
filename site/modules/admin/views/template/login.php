<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Login - Painel de Administração - APL do Polo Naval</title>
<link rel="stylesheet" href="{live}/media/admin/css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="{live}/media/admin/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="{live}/media/admin/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="{live}/media/admin/js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(document).pngFix( );
	$("#esqueci-senha").click(function(){
		var form = $("#form-login");
		form.attr("action",$(this).attr("href"));
		form.submit();
		return false;
	});
});
</script>
</head>
<body id="login-bg"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	<div id="logo-login">
		<h1>APL do Polo Naval</h1>
		<h2>Painel de Administração</h2>		
	</div>
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">	
	{content}		
	</div>
 	<!--  end loginbox -->

</div>
<!-- End: login-holder -->
</body>
</html>