<div class="bloco-formulario formulario">

<form action="#" method="post" id="form-proposta" class="form-anuncio">

	<input type="hidden" value="{id_anuncio}" name="id_anuncio" id="id_anuncio" />

	<div class="title">
		<h3>Enviar <strong>Proposta</strong></h3>
		<br class="clear">
	</div>
	<div class="field-mod">
		<span class="title-element">Nome: <span class="txt-obrigatorio">*</span></span>
		<span class="field">
			<input class="cantos" type="text" value="{nome_logado}" name="nome" id="nome">
			<div class="box-aviso-input" id="nome-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">Campo Obrigatório</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>
		</span>
	</div>

	<div class="field-mod w47 mr35">
		<span class="title-element">E-mail: <span class="txt-obrigatorio">*</span></span>
		<span class="field">
			<input class="cantos" type="text" value="{email_logado}" name="email" id="email">
			<div class="box-aviso-input" id="email-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">Campo Obrigatório</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>
		</span>
	</div>

	<div class="field-mod w47">
		<span class="title-element">Telefone:</span>
		<span class="field">
			<input class="cantos" type="text" value="" name="telefone" id="telefone">
		</span>
	</div>

	<div class="field-mod">
		<span class="title-element">Mensagem:</span>
		<textarea id="mensagem" class="textarea cantos" name="mensagem"></textarea>
		<div id="msg-erro" class="box-aviso-input">
			<div class="lateral-direita-aviso-input">&nbsp;</div>
			<div class="aviso-input">Campo Obrigatório</div>
			<div class="lateral-esquerda-aviso-input">&nbsp;</div>
		</div>
	</div>

	<input type="image" src="{live}/media/front/img/classificados/bt-enviar.jpg" class="bt-enviar-proposta fr">
	</form>
</div>