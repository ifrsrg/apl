<script type="text/javascript" src="{live}/media/js/modernizr.js"></script>
<script type="text/javascript" src="{live}/media/admin/js/usuario/form.js"></script>

<div>
	<div class="crud-heading">
		<h3>Usuários</h3>
		<h4>Adicionar / Editar</h4>
	</div>
	<div class="crud-toolbar">
		&nbsp;
	</div>
	<div class="clear"></div>
</div>

<form action="{live}/admin/usuario/acao/salvar" method="post" accept="multipart/form-data" id="form-usuario">
	<input type="hidden" name="id" value="{id_usuario}" />

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
			<td><input type="text" required name="nome" value="{nome}" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Email:</th>
			<td>
				<input type="email" required name="email" value="{email}" valido="{valido}" class="inp-form" />
			</td>
			<td>
				<img src="{live}/media/admin/images/shared/loader.gif" width="24" height="24" id="email-loader" style="display:none;" />
				<div class="email-valido" style="display:none;">
					Válido
				</div>
				<div class="email-invalido" style="display:none;">
					Inválido
				</div>
			</td>
		</tr>
		<tr>
			<th valign="top">Senha:</th>
			<td><input type="password" name="senha" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Confirmação de Senha:</th>
			<td><input type="password" name="senha-conf" class="inp-form" /></td>
			<td></td>
		</tr>
		<tr>
			<th valign="top">Tipo:</th>
			<td>
				<input type="radio" name="admin" value="1" {checked1}/> Administrador <br/>
				<input type="radio" name="admin" value="0" {checked2}/> Acesso Normal
			</td>
			<td>
			</td>
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