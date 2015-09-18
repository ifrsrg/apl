<div>
	<div class="crud-heading">
		<h3>Alagamento</h3>
		<h4>Lista</h4>
	</div>
	<div class="crud-toolbar">
		<a href="{live}/admin/exemplo/acao/adicionar">Adicionar</a>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>

<table border="0" width="100%" cellpadding="0" cellspacing="0" id="content-table">
<tr>
	<th rowspan="3" class="sized"><img src="{live}/media/admin/images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
	<th class="topleft"></th>
	<td id="tbl-border-top">&nbsp;</td>
	<th class="topright"></th>
	<th rowspan="3" class="sized"><img src="{live}/media/admin/images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
</tr>
<tr>
	<td id="tbl-border-left"></td>
	<td>
	<!--  start content-table-inner ...................................................................... START -->
	<div id="content-table-inner">

		<div id="table-content">
		
			<!--  start message-yellow -->
			<div id="message-yellow">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="yellow-left">You have a new message. <a href="">Go to Inbox.</a></td>
				<td class="yellow-right"><a class="close-yellow"><img src="{live}/media/admin/images/table/icon_close_yellow.gif"   alt="" /></a></td>
			</tr>
			</table>
			</div>
			<!--  end message-yellow -->
			
			<!--  start message-red -->
			<div id="message-red">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="red-left">Error. <a href="">Please try again.</a></td>
				<td class="red-right"><a class="close-red"><img src="{live}/media/admin/images/table/icon_close_red.gif"   alt="" /></a></td>
			</tr>
			</table>
			</div>
			<!--  end message-red -->
			
			<!--  start message-blue -->
			<div id="message-blue">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="blue-left">Welcome back. <a href="">View my account.</a> </td>
				<td class="blue-right"><a class="close-blue"><img src="{live}/media/admin/images/table/icon_close_blue.gif"   alt="" /></a></td>
			</tr>
			</table>
			</div>
			<!--  end message-blue -->
		
			<!--  start message-green -->
			<div id="message-green">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="green-left">Product added sucessfully. <a href="">Add new one.</a></td>
				<td class="green-right"><a class="close-green"><img src="{live}/media/admin/images/table/icon_close_green.gif"   alt="" /></a></td>
			</tr>
			</table>
			</div>
			<!--  end message-green -->
		
		
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
			<tr>
				<th class="table-header-check">ID</th>			
				<th class="table-header-repeat line-left minwidth-1"><span>Categoria</span></th>
				<th class="table-header-options line-left"><span>Opções</span></th>
			</tr>
			<!-- BEGIN LISTAR -->
			<tr>
				<td>{id_materia_categoria}</td>
				<td>{materia_categoria}</td>
				<td class="options-width">
				<a href="{live}/admin/exemplo/acao/editar/id/{id_materia_categoria}" title="Editar" class="icon-1 info-tooltip"></a>
				<a href="{live}/admin/exemplo/acao/deletar/id/{id_materia_categoria}" title="Apagar" class="icon-2 info-tooltip"></a>
				</td>
			</tr>
			<!-- END LISTAR -->
			</table> 
		</div>
		
{paginacao}

		
		<div class="clear"></div>
	 
	</div>
	<!--  end content-table-inner ............................................END  -->
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
		