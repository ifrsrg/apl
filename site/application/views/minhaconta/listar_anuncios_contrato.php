<script type="text/javascript" src="{live}/media/front/js/minhaconta/anunciosOnline.js"></script>

<div class="pagination f-left">
	<ul>
		<!--
		<li class="filtro-table-minha-conta">
			<select class="select-style-filtrar-minha-conta" name="filtrar">
				<option value="Contrato">Contrato</option>
			</select>
		</li>
		-->
		<li class="filtro-table-minha-conta">
			<select class="select-style-filtrar-minha-conta" name="filtrar">
				<option value="ALL" {filtro_selected_ALL}>Todos</option>
				<option value="1" {filtro_selected_1}>Ativos</option>
				<option value="0" {filtro_selected_0}>Inativos</option>
				<option value="EXP" {filtro_selected_EXP}>Expirados</option>
			</select>
		</li>
		<li class="td-filtrar">Filtrar</li>
		<li class="td-acoes recadastrar" style="visibility: hidden">
			<a href="javascript:void(0);" alt="Recadastrar" title="Recadastrar">
				<img src="{live}/media/front/img/bt-recadastrar.png" alt="Recadastrar" title="Recadastrar">
			</a>
		</li>
		<li class="td-acoes excluir">
			<a href="javascript:void(0);" alt="Excluir" title="Excluir">
				<img src="{live}/media/front/img/bt-excluir.png" alt="Excluir" title="Excluir">
			</a>
		</li>
		<li class="td-acoes desativar">
			<a href="javascript:void(0);" alt="Desativar" title="Desativar">
				<img src="{live}/media/front/img/bt-desativar.png" alt="Desativar" title="Desativar">
			</a>
		</li>
		<li class="td-acoes ativar">
			<a href="javascript:void(0);" alt="Ativar" title="Ativar">
				<img src="{live}/media/front/img/bt-ativar.png" alt="Ativar" title="Ativar">
			</a>
		</li>
		<li class="td-acoes">Ações</li>
	</ul>
	<br class="clear" />
</div>

{paginacao}

<table cellpadding="0" cellspacing="0" class="table-default-mod">
	<thead>
		<tr>
			<th width="4%" class="first">
				<ul>
					<li class="checkbox checkbox-todos"><input type="checkbox" /></li>
				</ul>
			</th>
			<th width="15%" class="{ordem_status} {active_status}">
				<a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="status">Status</a>
			</th>
			<th width="36%" class="{ordem_anuncio} {active_anuncio}">
				<a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="anuncio">Anúncio</a>
			</th>

			<!-- BEGIN FIELD_PLACA -->
			<th width="11%" class="{ordem_placa} {active_placa}">
				<a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="placa">Placa</a>
			</th>
			<!-- END FIELD_PLACA -->

			<th width="19%" class="{ordem_data} {active_data}">
				<a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="data">Data de Publicação</a>
			</th>
			<th width="15%" class="last {ordem_visualizacoes} {active_visualizacoes}">
				<a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="visualizacoes">Visualizações</a>
			</th>
		</tr>
	</thead>
	<tbody>
		<!-- BEGIN ANUNCIO -->
		<tr {classe_odd}>
			<input type="hidden" name="id_anuncio" value="{id_anuncio}" />
			<td class="options"><ul><li class="checkbox"><input type="checkbox" name="product" value="1" /></li></ul></td>
			<td><a href="javascript:void(0);" class="lista-status lista-status-{classe_status}" alt="{status}" title="{status}">&nbsp;</a><span class="txt-status">{status}</span></td>
			<td class="active td-anuncio"><a href="{live}/{link}">{anuncio}</a></td>
			<!-- BEGIN PLACA -->
			<td>{placa}</td>
			<!-- END PLACA  -->
			<td>{data}</td>
			<td class="td-centralizada last">{visualizacoes}</td>
		</tr>
		<!-- END ANUNCIO -->
	</tbody>
</table>

<!-- BEGIN SEM_RESULTADO -->
<br>
<h2>Sem anúncios a exibir.</h2>
<!-- END SEM_RESULTADO -->
