<script type="text/javascript" src="{live}/media/js/modernizr.js"></script>
<script type="text/javascript" src="{live}/media/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{live}/media/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="{live}/media/js/field_ext.js"></script>
<script type="text/javascript" src="{live}/media/js/newsletter.js"></script>

	<input type="hidden" id="corpo" value="{corpo}" />
	
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
			<td>
				<input type="button" value="Visualizar" class="btn-form" onclick="showNewsFromElement('corpo');" />
			</td>
		</tr>
		
				<tr>
			<th valign="top">Envios:</th>
		</tr>

		<tr>
			<td>
				<div class="selection-container">
				<table class="selection-list">
						<tr>
							<th>
								Destinatário
							</th>
							<th>
								Email
							</th>
							<th>
								Envio Sucedido
							</th>
						</tr>
						<!-- BEGIN ENVIO -->
						<tr>
							<td>
								{usuario_nome}
							</td>
							<td>
								{usuario_email}
							</td>
							<td>
								{sucesso}
							</td>
						</tr>
						<!-- END ENVIO -->
					</table>
					</div>
			</td>
			<td></td>
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