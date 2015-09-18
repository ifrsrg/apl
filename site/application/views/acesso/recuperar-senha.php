<script type="text/javascript" src="{live}/media/front/js/acesso/recuperar-senha.js"></script>

<div class="limite">
	<br class="clear" />
	<div id="main">
		<div class="limite-usuario-comum">
			<div class="usuario-comum">
				<h2>RECUPERAR <strong>SENHA</strong></h2>
				<div class="box-recuperar-senha">
					<form method="post" action="{live}/acesso/acao/recuperar-senha">
						<div class="field-mod w300 last">
							<input type="hidden" name="submit" value="1" />
							<span class="title-element">E-mail:</span>
							<span class="field{classinput}"><input id="email" type="text" name="email" value="{email}" /></span>
							<div class="box-aviso-input" id="email-erro" {boxerro}>
								<div class="lateral-direita-aviso-input">&nbsp;</div>
								<div class="aviso-input">{mensagem}</div>
								<div class="lateral-esquerda-aviso-input">&nbsp;</div>
							</div>
						</div>
						<br class="clear" />
						<input id="enviar" type="image" src="{live}/media/front/img/bt-enviar.png" class="botao" />
					</form>
				</div>
			</div>
			<div class="box-quero-me-cadastrar">
				<p>Caso não lembre seu e-mail, ou não tenha mais acesso ao e-mail utilizado, entre em contato com SAC através do fone (51) 3553.2000 ou e-mail sac@abcclassificados.com.br</p>
				<span>Não tenho conta,</span>
				<a href="{live}/cadastro/" class="bt-cadastrar">
					<img src="{live}/media/front/img/bt-quero-cadastrar.png" />
				</a>
			</div>
			<br class="clear" />
		</div>
		
		<br class="clear" />
		<br class="clear" />
		<br class="clear" />
		<br class="clear" />
		<br class="clear" />
		<br class="clear" />
		<br class="clear" />
		<br class="clear" />
		<br class="clear" />
	</div>
</div>