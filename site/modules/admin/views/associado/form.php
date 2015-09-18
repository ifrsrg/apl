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
				<input type="text" name="nome" value="{nome}" required label="Nome" valido="{valido}" maxlength='200' class="inp-form" />
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Categoria:</th>
			<td>
				<select required name="id_categoria" label="Categoria">
					<option value="">Selecione uma Categoria</option>
					<!-- BEGIN CATEGORIA -->
						<option {selected} value="{value}">
							{label}
						</option>
					<!-- END CATEGORIA -->
				</select>
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
			<th valign="top">Descrição</th>
			<td>
				<textarea  editor label="Descrição" name="descricao" id="descricao">
				{descricao}
				</textarea>
			</td>
			<td></td>
		</tr>
		
		
		<tr>
			<th valign="top">Projetos</th>
			<td>
				<textarea editor label="Projetos" name="projetos" id="projetos">
				{projetos}
				</textarea>
			</td>
			<td></td>
		</tr>
		
		<tr>
			<th valign="top">Endereço</th>
			<td>
				<textarea  editor label="Endereço" name="endereco" id="endereco">
				{endereco}
				</textarea>
			</td>
			<td></td>
		</tr>
		
		<tr>
			<th valign="top">Nome do Contato:</th>
			<td>
				<input type="text" name="contato" value="{contato}"  label="Nome do Contato" valido="{valido}" maxlength='150' class="inp-form" />
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Telefone do contato:</th>
			<td>
				<input type="telefone" name="contato_telefone" value="{contato_telefone}"  label="Telefone do Contato" valido="{valido}" maxlength='18' class="inp-form" />
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email do contato:</th>
			<td>
				<input email name="contato_email" value="{contato_email}"  label="Email do Contato" valido="{valido}" maxlength='255' class="inp-form" />
			</td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Coordenadas:</th>
			<td>
				<mapselector name="coordenadas" value="{coordenadas}">
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