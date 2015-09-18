<div>
	<div class="crud-heading">
		<h3>Emprego - Ramos de Atuação</h3>
		<h4>Lista</h4>
	</div>
	<div class="crud-toolbar">
		<a href="{live}/admin/cadastro/empregos/ramo-atuacao/acao/adicionar">Adicionar</a>
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
			Veja na listagem abaixo ramos de atuação.<br/><br/>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
			<tr>
				<th class="table-header-check">ID</th>			
				<th class="table-header-repeat line-left minwidth-1"><span>Categoria</span></th>
				<th class="table-header-repeat line-left minwidth-1"><span>Status</span></th>
				<th class="table-header-options line-left"><span>Opções</span></th>
			</tr>
			<!-- BEGIN LISTAR -->
			<tr>
				<td>{id_area_atuacao}</td>
				<td>{area_atuacao}</td>
				<td>{status}</td>
				<td class="options-width">
				<a href="{live}/admin/cadastro/empregos/ramo-atuacao/acao/editar/id/{id_area_atuacao}" title="Editar" class="icon-1 info-tooltip"></a>
				<a href="{live}/admin/cadastro/empregos/ramo-atuacao/acao/status/id/{id_area_atuacao}" title="Alterar Status" class="icon-1 info-tooltip"></a>
				<a href="{live}/admin/cadastro/empregos/ramo-atuacao/acao/deletar/id/{id_area_atuacao}" title="Apagar" class="icon-2 info-tooltip"></a>
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
		