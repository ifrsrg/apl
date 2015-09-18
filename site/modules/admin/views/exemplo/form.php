<div>
	<div class="crud-heading">
		<h3>CRUD Exemplo</h3>
		<h4>Adicionar / Editar</h4>
	</div>
	<div class="crud-toolbar">
		&nbsp;
	</div>
	<div class="clear"></div>
</div>

<form action="{live}/admin/materiacategoria/acao/salvar" method="post" accept="multipart/form-data" id="form-materia-categoria">
	<input type="hidden" name="id" value="{id_materia_categoria}" />
	
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
	
	<table border="0" width="100%" cellpadding="0" cellspacing="0">
	<tr valign="top">
	<td>
		<!-- start id-form -->
		<table border="0" cellpadding="0" cellspacing="0"  id="id-form">
		<tr>
			<th valign="top">Combo:</th>
			<td>
				<select name="id_segmento" value="{id_segmento}" class="inp-form">
					<option value="">Selecione</option>
					<!-- BEGIN SEGMENTO -->
					<option value="{id_segmento}" {selected}>{segmento}</option>
					<!-- END SEGMENTO -->
				</select>
			</td>
			<td>
				<div id="segmento-dica">
					<div class="bubble-left"></div>
					<div class="bubble-inner">Selecione o segmento da categoria a ser cadastrada</div>
					<div class="bubble-right"></div>			
				</div>
				<div id="segmento-erro" style="display:none;">
					<div class="error-left"></div>
					<div class="error-inner">Selecione o segmento da categoria a ser cadastrada</div>
				</div>
			</td>
		</tr>
		<tr>
			<th valign="top">Input:</th>
			<td><input type="text" name="materia_categoria" value="{materia_categoria}" class="inp-form" /></td>
			<td>
				<div id="nome-dica">
					<div class="bubble-left"></div>
					<div class="bubble-inner">Digite o nome da categoria a ser cadastrada</div>
					<div class="bubble-right"></div>			
				</div>
				<div id="nome-erro" style="display:none;">
					<div class="error-left"></div>
					<div class="error-inner">Digite o nome da categoria a ser cadastrada</div>
				</div>
			</td>
		</tr>
		<tr>
			<th valign="top">Texto:</th>
			<td><textarea rows="" cols="" class="form-textarea" name="texto">{texto}</textarea></td>
			<td></td>		
		</tr>
		<tr>
			<th valign="top">Texto com Editor:</th>
			<td colspan="2">
			<textarea rows="" cols="" class="form-textarea" id="ck-editor" name="texto">{texto}</textarea>
			<script>
				CKEDITOR.replace("ck-editor");
			</script>
			</td>
		</tr>
		<tr>
			<th valign="top">Radio:</th>
			<td>
				<ul class="radio-group">
					<li><input type="radio" name="status" value="1" id="status-1" />
						<label for="status-1">Opção 1</label></li>
					<li><input type="radio" name="status" value="2" id="status-2" />
						<label for="status-2">Opção 2</label></li>
				</ul>
			</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<th valign="top">Checks:</th>
			<td>
				<ul class="radio-group">
					<li><input type="checkbox" name="check" value="1" id="check-1" />
						<label for="check-1">Opção 1</label></li>
					<li><input type="checkbox" name="check" value="2" id="check-2" />
						<label for="check-2">Opção 2</label></li>
				</ul>
			</td>
			<td>&nbsp;</td>
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