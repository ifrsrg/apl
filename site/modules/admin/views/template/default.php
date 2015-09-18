<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Painel de Administração - APL do Polo Naval</title>
<link rel="stylesheet" href="{live}/media/admin/css/screen.css" type="text/css" media="screen" title="default" />

<link rel="stylesheet" href="{live}/media/admin/css/datePicker.css" type="text/css" media="screen" title="default" />
<link rel="stylesheet" href="{live}/media/admin/css/fieldDatePicker.css" type="text/css" media="screen" title="default" />

<script>
	var __live = "{live}";
</script>

<script src="{live}/media/admin/js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
<script src="{live}/media/admin/js/jquery/jquery.priceFormat.1.7.js" type="text/javascript"></script>
<script src="{live}/media/admin/js/jquery/jquery.maskedinput-1.3.min.js" type="text/javascript"></script>

<script src="{live}/media/ckeditor/ckeditor.js" type="text/javascript"></script>
<!--  checkbox styling script -->
<script src="{live}/media/admin/js/jquery/ui.core.js" type="text/javascript"></script>
<script src="{live}/media/admin/js/jquery/jquery.bind.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="{live}/media/admin/js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- Tooltips -->
<script src="{live}/media/admin/js/jquery/jquery.tooltip.js" type="text/javascript"></script>
<script src="{live}/media/admin/js/jquery/jquery.dimensions.js" type="text/javascript"></script>

<!-- datepicker -->
<script type="text/javascript" src="{live}/media/admin/js/jquery/date.js"></script>
<script type="text/javascript" src="{live}/media/admin/js/jquery/jquery.datePicker.js"></script>

<script type="text/javascript" src="{live}/media/admin/js/shared/functions.js"></script>


<script type="text/javascript">
$(function() {
	$('a.info-tooltip ').tooltip({
		track: true,
		delay: 0,
		fixPNG: true,
		showURL: false,
		showBody: " - ",
		top: -35,
		left: 5
	});
});

var live = "{live}";
</script>

<body>

<!-- Start: page-top-outer -->
<div id="page-top-outer">

<!-- Start: page-top -->
<div id="page-top">
	<div id="nome-sistema">
		<h1>APL do Polo Naval</h1>
		<h2>Painel de Administração</h2>
	</div>
</div>
<!-- End: page-top -->

</div>
<!-- End: page-top-outer -->

<div class="clear">&nbsp;</div>

<!--  start nav-outer-repeat................... START -->
<div class="nav-outer-repeat">
<!--  start nav-outer -->
<div class="nav-outer">

		<!-- start: nav-right -->
		<div id="nav-right">
			<div class="nav-divider">&nbsp;</div>
			<div class="showhide-account"><a href="{live}/admin/usuario/acao/editar/id/{id_usuario_logado}" class="control"><img src="{live}/media/admin/images/shared/nav/nav_myaccount.gif" width="93" height="14" alt="" />Meu Perfil</a></div>
			<div class="nav-divider">&nbsp;</div>
			<a href="{live}/admin/login/acao/deslogar" class="control" id="logout"><img src="{live}/media/admin/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" />Sair</a>
			<div class="clear">&nbsp;</div>
		</div>
		<!-- end: nav-right -->

		<!--  start: nav -->
		<div class="nav">
		<div class="table">

		<!-- BEGIN MENU_N1 -->
		<ul class="{class_ativo_n1}">
			<li>
				<a href="{live}/{link_n1}"><b>{titulo_n1}</b></a>
				<!-- BEGIN MENU_N2 -->
				<div class="select_sub {classe_ativo_div}">
					<ul class="sub">
						<!-- BEGIN MENU_N2_ITEM -->
						<li {classe_ativo_li}><a href="{live}/{link_n2}">{titulo_n2}</a></li>
						<!-- END MENU_N2_ITEM -->
					</ul>
				</div>
				<!-- END MENU_N2 -->
			</li>
		</ul>
		<div class="nav-divider">&nbsp;</div>
		<!-- END MENU_N1 -->

		<div class="clear"></div>
		</div>
		<div class="clear"></div>
		</div>
		<!--  start nav -->

</div>
<div class="clear"></div>
<!--  start nav-outer -->
</div>
<!--  start nav-outer-repeat................... END -->

 <div class="clear"></div>

<!-- start content-outer -->
<div id="content-outer">
<!-- start: content -->
<div id="content">
 {content}
</div>
<!--  end: content-table-inner  -->
</td>
<td id="tbl-border-right"></td>
</tr>
<tr>
	<th class="sized bottomleft"></th>
	<td id="tbl-border-bottom">&nbsp;</td>
	<th class="sized bottomright"></th>
</tr>
</table>

<div class="clear">&nbsp;</div>

</div>
<!--  end: content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end: content-outer -->



<div class="clear">&nbsp;</div>


</body>
</html>
