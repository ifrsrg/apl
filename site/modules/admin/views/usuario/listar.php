<div>
	<div class="crud-heading">
		<h3>Usuários</h3>
		<h4>Lista</h4>
	</div>
	<div class="crud-toolbar">
		<a href="{live}/admin/usuario/acao/adicionar">Adicionar</a>
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

	<div class="crud-filtro">
	<form action="{action}" method="GET"><!-- start id-form -->
	<table border="0" cellpadding="0" cellspacing="0" id="id-form">
		<tr>
			<td colspan="4">Utilize os campos abaixo para aplicar filtros de pesquisa na lista de usuários cadastrados para acesso ao gerenciador.</td>
		</tr>
		<tr>
			<td><label>Nome</label><input type="text" name="nome" value="{filtro_nome}" class="inp-form" /></td>
			<td valign="top"><input type="submit" value="Pesquisar"
				class="btn-login" /></td>
			<td></td>
		</tr>
	</table>
	<!-- end id-form  --></form>
	</div>

<div id="table-content">

	<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
	<tr>
		<th class="table-header-check">ID</th>			
		<th class="table-header-repeat line-left minwidth-1"><span>Nome</span></th>
		<th class="table-header-repeat line-left minwidth-1"><span>Email</span></th>
		<th class="table-header-repeat line-left minwidth-1"><span>É Admin</span></th>
		<th class="table-header-options line-left"><span>Opções</span></th>
	</tr>
	<!-- BEGIN LISTAR -->
	<tr>
		<td>{id_usuario}</td>
		<td>{nome}</td>
		<td>{email}</td>
		<td>{admin}</td>
		<td class="options-width">
			<a href="{live}/admin/usuario/acao/editar/id/{id_usuario}" title="Editar" class="icon-1 info-tooltip"></a>
			<a href="{live}/admin/usuario/acao/remover/id/{id_usuario}" title="Remover" class="icon-2 info-tooltip"></a>
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



