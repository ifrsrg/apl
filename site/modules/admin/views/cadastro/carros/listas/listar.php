<script>
    $(document).ready(function(){
        $('#combo_seleciona_campo').change(function(){
            window.location.href = "{live}/admin/cadastro/carros/listas?campo="+$(this).val();
        });
    });
    
</script>    
<div>
	<div class="crud-heading">
		<h3>Carros - Listas</h3>
                <h4>Listagem dos Valores Opcionais</h4>
	</div>
	<div class="crud-toolbar">
		<a href="{live}/admin/cadastro/carros/listas/acao/adicionar">Adicionar</a>
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
			Listagem dos Valores Opcionais dos campos do tipo Lista e CheckBox <br/><br />
                        
                        <select id="combo_seleciona_campo">
                            <option value="">Selecione o Campo a ser Editado</option>
                            <!-- BEGIN CAMPOS -->
                            <option value="{campo_id}" {selected}>{campo}</option>
                            <!-- END CAMPOS -->
                        </select>
                        <br/><br />
			<table border="0" width="100%" cellpadding="0" cellspacing="0" id="product-table">
			<tr>
				<th class="table-header-check">ID</th>			
				<th class="table-header-repeat line-left minwidth-1"><span>Valor Opcional</span></th>
				<th class="table-header-repeat line-left minwidth-1"><span>Tipo de Veículo</span></th>
				<th class="table-header-repeat line-left minwidth-1"><span>Status</span></th>
				<th class="table-header-options line-left"><span>Opções</span></th>
			</tr>
			<!-- BEGIN LISTAR -->
			<tr>
				<td>{id_veiculo_campos_option}</td>
				<td>{veiculo_campos_option}</td>
				<td>{veiculo_tipo}</td>
				<td>{status}</td>
				<td class="options-width">
				<a href="{live}/admin/cadastro/carros/listas/acao/editar/id/{id_veiculo_campos_option}" title="Editar" class="icon-1 info-tooltip"></a>
				<!--a href="{live}/admin/cadastro/carros/listas/acao/status/id/{id_veiculo_campos_option}" title="Alterar Status" class="icon-1 info-tooltip"></a-->
				<a href="{live}/admin/cadastro/carros/listas/acao/deletar/id/{id_veiculo_campos_option}" title="Apagar" class="icon-2 info-tooltip"></a>
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
		