<script type="text/javascript" src="{live}/media/js/modernizr.js"></script>
<script type="text/javascript" src="{live}/media/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{live}/media/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="{live}/media/js/field_ext.js"></script>
<script type="text/javascript" src="{live}/media/js/newsletter.js"></script>

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
			<th valign="top">Notícias:</th>
		</tr>
		<tr>
			<td valign="top">
				Filtro:<br/>
				<input data-input="noticias" type="text" class="filtro"/>
			</td>
		</tr>
		<tr>
			<td>
				<div class="selection-container">
					<table class="selection-list">
						<!-- BEGIN NOTICIA -->
						<tr>
							<td  class="checkbox">
								<input name="noticias[]" filtro="noticias" {noticia_atributos} value="{noticia_id}" type="checkbox" />
							</td>
							<td class="imagem">
							 	<img src="{noticia_imagem}" />
							</td>
							<td>
								{noticia_titulo}
							</td>
						</tr>
						<!-- END NOTICIA -->
					</table>
				</div><br/>
				<a href="#" class="select-all" data-input="noticias">Marcar Visíveis</a> | <a href="#" class="unselect-all" data-input="noticias">Desmarcar Visíveis</a>
			</td>
			<td></td>
			<td></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
		</tr>
		
		<tr>
			<th valign="top">Eventos:</th>
		</tr>
		
		<tr>
			<td valign="top">
				Filtro:<br/>
				<input data-input="eventos" type="text" class="filtro"/>
			</td>
		</tr>

		<tr>
			<td>
				<div class="selection-container">
					<table class="selection-list">
						<!-- BEGIN EVENTO -->
						<tr>
							<td class="checkbox">
								<input name="eventos[]" filtro="eventos" {evento_atributos}  value="{evento_id}" type="checkbox" />
							</td>
							<td class="imagem">
								<img src="{evento_imagem}" /> 
							</td>
							<td>
								{evento_nome}
							</td>
						</tr>
						<!-- END EVENTO -->
					</table>
				</div><br/>
				<a href="#" class="select-all" data-input="eventos">Marcar Visíveis</a> | <a href="#" class="unselect-all" data-input="eventos">Desmarcar Visíveis</a>
			</td>
			<td></td>
			<td></td>
		</tr>
		
		<tr>
			<td>&nbsp;</td>
		</tr>

		
		
		<tr>
			<th valign="top">Destinatários:</th>
		</tr>
		
		<tr>
			<td valign="top">
				Filtro:<br/>
				<input data-input="usuarios" type="text" class="filtro"/>
			</td>
		</tr>

		<tr>
			<td>
				<div class="selection-container">
				<table class="selection-list">
						<!-- BEGIN USUARIO -->
						<tr>
							<td class="checkbox">
								<input name="usuarios[]" filtro="usuarios" {usuario_atributos}  value="{usuario_id}" type="checkbox" />
							</td>
							<td>
								{usuario_nome} : {usuario_email}
							</td>
						</tr>
						<!-- END USUARIO -->
					</table>
				</div><br/>
				<a href="#" class="select-all" data-input="usuarios">Marcar Visíveis</a> | <a href="#" class="unselect-all" data-input="usuarios">Desmarcar Visíveis</a>
			</td>
			<td></td>
			<td></td>
		</tr>
		
		<tr>
			<th valign="top">Associados:</th>
		</tr>
		
		<tr>
			<td valign="top">
				Filtro:<br/>
				<input data-input="associados" type="text" class="filtro"/>
			</td>
		</tr>

		<tr>
			<td>
				<div class="selection-container">
				<table class="selection-list">
						<!-- BEGIN ASSOCIADOS -->
						<tr>
							<td class="checkbox">
								<input name="associados[]" filtro="associados" {associado_atributos}  value="{associado_id}" type="checkbox" />
							</td>
							<td>
								{associado_nome} : {associado_email}
							</td>
						</tr>
						<!-- END ASSOCIADOS -->
					</table>
				</div><br/>
				<a href="#" class="select-all" data-input="associados">Marcar Visíveis</a> | <a href="#" class="unselect-all" data-input="associados">Desmarcar Visíveis</a>
			</td>
			<td></td>
			<td></td>
		</tr>
		
		<tr>
			<th valign="top">Fornecedor:</th>
		</tr>
		
		<tr>
			<td valign="top">
				Filtro:<br/>
				<input data-input="fornecedores" type="text" class="filtro"/>
			</td>
		</tr>

		<tr>
			<td>
				<div class="selection-container">
				<table class="selection-list">
						<!-- BEGIN FORNECEDORES -->
						<tr>
							<td class="checkbox">
								<input name="fornecedores[]" filtro="fornecedores" {fornecedor_atributos}  value="{fornecedor_id}" type="checkbox" />
							</td>
							<td>
								{fornecedor_nome} : {fornecedor_email}
							</td>
						</tr>
						<!-- END FORNECEDORES -->
					</table>
				</div><br/>
				<a href="#" class="select-all" data-input="fornecedores">Marcar Visíveis</a> | <a href="#" class="unselect-all" data-input="fornecedores">Desmarcar Visíveis</a>
			</td>
			<td></td>
			<td></td>
		</tr>
		
		<!-- BEGIN EMAIL_HOLDERS -->
			<tr>
				<th valign="top">{nome_categoria}:</th>
			</tr>
			
			<tr>
				<td valign="top">
					Filtro:<br/>
					<input data-input="{nome_categoria}-custom" type="text" class="filtro"/>
				</td>
			</tr>
	
			<tr>
				<td>
					<div class="selection-container">
					<table class="selection-list">
							<!-- BEGIN EMAIL -->
							<tr>
								<td class="checkbox">
									<input name="emails[]" filtro="{nome_categoria}-custom" {email_atributos}  value="{email_id}" type="checkbox" />
								</td>
								<td>
									{email_nome} : {email_email}
								</td>
							</tr>
							<!-- END EMAIL -->
						</table>
					</div><br/>
					<a href="#" class="select-all" data-input="{nome_categoria}-custom">Marcar Visíveis</a> | <a href="#" class="unselect-all" data-input="{nome_categoria}-custom">Desmarcar Visíveis</a>
				</td>
				<td></td>
				<td></td>
			</tr>
		<!-- END EMAIL_HOLDERS -->
		
		<tr>
			<td>&nbsp;</td>
		</tr>
			<td>
				<input type="button" value="Visualizar" class="btn-form" onclick="showNews('{live}/admin/newsletter/acao/visualizar/');" />
			</td>
		</tr>
	<tr>
		<th>&nbsp;</th>
		<td valign="top">
			<input type="button" value="Enviar" class="btn-form" id="bt-submit" onclick="salvarNewsletter(); return false;"/>
			
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

<div class="loader-container" style="display:none;">
				<div class="loader-bar" >
					&nbsp;
				</div>
			</div>
			<div class="loader-counter" style="display:none;">
				(<span class="envios">x</span>/<span class="total">x</span>) emails enviados
			</div>
			
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