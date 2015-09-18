<script type="text/javascript" src="{live}/media/js/modernizr.js"></script>
<script type="text/javascript" src="{live}/media/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{live}/media/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="{live}/media/js/field_ext.js"></script>

<div>
	<div class="crud-heading">
		<h3>{titulo_pagina}</h3>
		<h4>Adicionar / Editar</h4>
	</div>
	<div class="crud-toolbar">
		&nbsp;
	</div>
	<div class="clear"></div>
</div>

<form action="{live}/admin/{url_path}/acao/salvar" method="post" accept="multipart/form-data" id="form-texto-sistema">
	<input type="hidden" name="id" value="{id}" />

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
			<th valign="top">Nome:</th>
			<td>
				<input type="text" name="nome" value="{nome}" required label="Nome" valido="{valido}" maxlength='100' class="inp-form" />
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Marca:</th>
			<td>
				<imageupload
				required
				label="Marca"
				id="marca"
				name="marca" 
				value='{marca}'/>
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Texto</th>
			<td>
				<textarea  editor label="Texto" name="texto" id="texto">
				{texto}
				</textarea>
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Texto da Chamada:</th>
			<td>
				<input type="text" name="texto_lista" value="{texto_lista}"  label="Texto da Chamada" valido="{valido}" maxlength='90' class="inp-form" />
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Data de Início:</th>
			<td>
				<input type="date-input" name="data_inicio" value="{data_inicio}"  label="Data de Início" valido="{valido}" maxlength='20' class="inp-form" />
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Data de Término:</th>
			<td>
				<input type="date-input" name="data_termino" value="{data_termino}"  label="Data de Término" valido="{valido}" maxlength='20' class="inp-form" />
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Status:</th>
			<td>
				<input type="text" name="status" value="{status}"  label="Status" valido="{valido}" maxlength='150' class="inp-form" />
			</td>
			<td></td>
		</tr>
		
		<tr>
			<th valign="top">Logomarca do Executor:</th>
			<td>
				<imageupload
				label="Logomarca do Executor"
				id="executor_marca"
				name="executor_marca" 
				value='{executor_marca}'/>
			</td>
			<td></td>
		</tr>
		
		<tr>
			<th valign="top">Logomarca do Financiador:</th>
			<td>
				<imageupload
				label="Logomarca do Financiador"
				id="financiador_marca"
				name="financiador_marca" 
				value='{financiador_marca}'/>
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Arquivo Público:</th>
			<td>
				<fileupload
				label="Arquivo"
				id="arquivo"
				name="arquivo" 
				value='{arquivo}'/>
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Arquivo Restrito:</th>
			<td>
				<fileupload
				label="Arquivo Restrito"
				id="arquivo_restrito"
				name="arquivo_restrito" 
				value='{arquivo_restrito}'/>
			</td>
			<td></td>
		</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="submit" value="Enviar" class="btn-form" id="bt-submit"/>
			<img src="{live}/media/admin/images/shared/loader.gif" style="display: none;" id="loader" width="29" height="29"/>
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