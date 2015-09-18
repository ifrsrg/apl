<script type="text/javascript" src="{live}/media/admin/js/cadastro/carros/modelo/form.js"></script>

<div>
	<div class="crud-heading">
		<h3>Carros - Modelo</h3>
		<h4>Adicionar / Editar</h4>
	</div>
	<div class="crud-toolbar">
		&nbsp;
	</div>
	<div class="clear"></div>
</div>

<form action="{live}/admin/cadastro/carros/modelo/acao/salvar" method="post" accept="multipart/form-data" id="form-modelo">
	<input type="hidden" name="id_veiculo" value="{id_veiculo}" />

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
	<td valign="top">
	<!--  start content-table-inner -->
	<div id="content-table-inner">
	<div id="message-red" style="display:none;">
			<table border="0" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td class="red-left" id="box-erros"></td>
				<td class="red-right"><a class="close-red"><img src="{live}/media/admin/images/table/icon_close_red.gif"   alt="" /></a></td>
			</tr>
			</table>
			</div>
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Tipo:</th>
			<td>
				<select class="inp-form" name="id_veiculo_tipo" id="tipo">
					<option value="">Selecione</option>
					<!-- BEGIN TIPO -->
					<option value="{id_tipo}">{tipo}</option>
					<!-- END TIPO -->
				</select>
				
				<!-- BEGIN TIPO_SELECTED -->
				<script>
					$(document).ready(function() {
						$("#tipo").val({selected_tipo});
						$("#tipo").change();
					});
				</script>
				<!-- END TIPO_SELECTED -->
			</td>
			<td>
			</td>
		</tr>
                <tr>
			<th valign="top">Marca:</th>
			<td>
			    <input type="hidden" id="marca-selected" value="{selected_marca}" />
				<select class="inp-form" name="id_veiculo_marca" id="marca">
					<option value="">Selecione Primeiro o Tipo</option>
				</select>
				</td>
			<td>
			</td>
		</tr>
		<tr>
			<th valign="top">Modelo:</th>
			<td><input type="text" name="veiculo" value="{veiculo}" id="veiculo" class="inp-form" /></td>
			<td>
			</td>
		</tr>
		<tr>
			<th valign="top">Status:</th>
			<td>
				<input type="radio" name="status" value="1" {checked1}/> Ativo <br/>
				<input type="radio" name="status" value="2" {checked2}/> Inativo
			</td>
			<td>
			</td>
		</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="Enviar" class="btn-form" />
		</td>
		<td></td>
	</tr>
	</table>
	<!-- end id-form  -->

	</td>
	<td>
</td>
</tr>
<tr>
<td><img src="{live}/media/admin/images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
<td></td>
</tr>
</table>

<div class="clear"></div>

</div>
<!--  end content-table-inner  -->
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

</form>