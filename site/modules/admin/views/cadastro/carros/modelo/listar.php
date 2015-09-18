<div>
	<div class="crud-heading">
		<h3>Carros - Modelo</h3>
		<h4>Lista</h4>
	</div>
	<div class="crud-toolbar">
		<a href="{live}/admin/cadastro/carros/modelo/acao/adicionar">Adicionar</a>
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
		<div class="box-filtro">
			<form action="{live}/cadastro/carros/modelo/" method="GET">
				<select class="inp-form" name="id_veiculo_marca" id="tipo">
					<option value="">Selecione</option>
					<!-- BEGIN TIPO -->
					<optgroup label="{tipo}">
						<!-- BEGIN MARCA -->
					    <option value="{id_marca}" {selected_tipo}>{marca}</option>
						<!-- END MARCA -->
					</optgroup>
					<!-- END TIPO -->
				</select>
				<input type="submit" value="Pesquisar" class="btn-login btn-mod1 btn-pesquisar-cadastro" />
			</form>
		</div>
		<div id="table-content">
			Veja na listagem abaixo de Modelo de Carros<br/><br/>
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
			<tr>
				<th class="table-header-check">ID</th>
				<th class="table-header-repeat line-left minwidth-1"><span>Modelo</span></th>
				<th class="table-header-repeat line-left minwidth-1"><span>Marca</span></th>
				<th class="table-header-repeat line-left minwidth-1"><span>Status</span></th>
				<th class="table-header-options line-left"><span>Opções</span></th>
			</tr>
			<!-- BEGIN LISTAR -->
			<tr>
				<td>{id_veiculo}</td>
				<td>{veiculo}</td>
				<td>{marca}</td>
				<td>{status}</td>
				<td class="options-width">
				<a href="{live}/admin/cadastro/carros/modelo/acao/editar/id/{id_veiculo}" title="Editar" class="icon-1 info-tooltip"></a>
				<a href="{live}/admin/cadastro/carros/modelo/acao/status/id/{id_veiculo}" title="Alterar Status" class="icon-1 info-tooltip"></a>
				<a href="{live}/admin/cadastro/carros/modelo/acao/deletar/id/{id_veiculo}" title="Apagar" class="icon-2 info-tooltip"></a>
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
