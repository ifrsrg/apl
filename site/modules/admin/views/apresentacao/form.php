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
			<th valign="top">T&iacute;tulo:</th>
			<td>
				<input type="text" name="titulo" value="{titulo}" required label="T&iacute;tulo" valido="{valido}" maxlength='100' class="inp-form" />
			</td>
			<td></td>
		</tr>

		<tr>
			<th valign="top">Título Formatado:</th>
			<td>
				<textarea editor required label="Título Formatado" name="titulo_formatado">
					{titulo_formatado}
				</textarea>
			</td>
			<td></td>
		</tr>

		<tr>
			<th valign="top">Subtítulo:</th>
			<td>
				<textarea editor label="Subtítulo" name="subtitulo">
					{subtitulo}
				</textarea>
			</td>
			<td></td>
		</tr>

		<tr>
			<th valign="top">Texto:</th>
			<td>
				<textarea editor required label="Texto" name="texto">
					{texto}
				</textarea>
			</td>
			<td></td>
		</tr>
		
		<tr>
			<th valign="top">Imagem:</th>
			<td>
				<imageupload
				required
				label="Imagem"
				id="imagem"
				name="imagem" 
				value='{imagem}'/>
			</td>
			<td></td>
		</tr>
		
		
		<tr>
			<th valign="top">Destaque:</th>
			<td>
				<input type="radio" name="destaque" value='1' {destaque_checked1}/> Sim<br/>
				<input type="radio" name="destaque" value='0' {destaque_checked2}/> Não
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