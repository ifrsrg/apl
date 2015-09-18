<div>
	<div class="crud-heading">
		<h3>{titulo_pagina}</h3>
		<h4>Lista</h4>
	</div>
	<div class="crud-toolbar">
		<a href="{live}/admin/{url_path}/acao/adicionar">Adicionar</a>
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
		
		
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
			<tr>
				<!-- BEGIN HEADER -->
				<th class="{table_header_class}">{table_header_name}</th>
				<!-- END HEADER -->	
				<th class="table-header-options line-left"><span>Op&ccedil;&otilde;es</span></th>
			</tr>
			<!-- BEGIN LISTAR -->
			<tr>
				<!-- BEGIN BODY -->
				<td>{table_field}</td>
				<!-- END BODY -->
				<td><img src="{icone}" title="{nome}" alt="{nome}"></td>
				<td>{acesso_privado}</td>
				<td class="options-width">
					<a href="{live}/admin/{url_path}/acao/editar/id/{id}" title="Editar" class="icon-1 info-tooltip"></a>
					<a {hide} href="{live}/admin/{url_path}/acao/deletar/id/{id}"  {onclick}  title="Apagar" class="icon-2 info-tooltip"></a>
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
		