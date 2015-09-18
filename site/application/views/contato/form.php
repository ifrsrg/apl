<script type="text/javascript" src="{live}/media/front/js/contato/form.js"></script>
	<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="{live}/media/front/css/ie7.css" />
	<![endif]-->	
<div>
        <div class="limite">
            <br class="clear" />
            <div id="main">
				<div class="coluna-conteudo-interna pageContato">
					<h2 class="tit-contato">CONTATO</h2>
					
					

					<div class="box-contato cadastro-completo">
						<div class="contato">
							<form action="{live}/contato/acao/enviar" method="post" id="form-contato">
								<div class="field-mod w620 last">
									<span class="title-element boldless">Assunto:<span class="txt-campo-obrigatorio-mod">Todos os campos são obrigatórios</span></span>
									<span class="field"><input id="assunto" type="text" name="assunto" value="{assunto}" /></span>
									<div id="assunto-erro" class="box-aviso-input remove-espaco-ie">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">Campo Obrigatório</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
								</div>
								<div class="field-mod w620 last">
									<span class="title-element boldless">Nome: </span>
									<span class="field"><input id="nome" type="text" name="nome" value="{nome}" /></span>
									<div id="nome-erro" class="box-aviso-input remove-espaco-ie">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">Campo Obrigatório</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
								</div>
								
								<div class="field-mod w300">
									<span class="title-element">E-mail:</span>
									<span class="field"><input id="email" type="text" name="email" value="{email}" /></span>
									<div class="box-aviso-input remove-espaco-ie" id="email-erro">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">E-mail já esta cadastrado</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
								</div>
								
								<div class="col-dir last">
										<span class="title-element boldless">Telefone:</span>
										<div class="field-mod ddd height-41">
											<span class="field"><input type="text" name="ddd" id="ddd" value="{ddd}" /></span>
											<div id="ddd-erro" class="box-aviso-input remove-espaco-ie">
												&nbsp;
											</div>
											<br class="clear" />
										</div>
										<div class="field-mod nro last height-41">
											<span class="field"><input type="text" name="telefone" id="tel" value="{tel}" /></span>
											<div id="telefone-erro" class="box-aviso-input remove-espaco-ie">
												<div class="lateral-direita-aviso-input">&nbsp;</div>
												<div class="aviso-input">Campo Obrigatório</div>
												<div class="lateral-esquerda-aviso-input">&nbsp;</div>
											</div>
											<br class="clear" />
										</div>
										<br class="clear" />
										<p class="txt-input floatless">Cód. área &nbsp;&nbsp;&nbsp;&nbsp; Número</p>	
								</div>
								<br class="clear" />
								<div class="field-mod w620 last">
									<span class="title-element">Mensagem:</span>
									
									<textarea name="mensagem" class="textarea-620"></textarea>
									
									<div class="box-aviso-input remove-espaco-ie" id="email-erro">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">E-mail já esta cadastrado</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
								</div>
								
								
								<input type="image" class="bt-enviar-contato" src="{live}/media/front/img/classificados/bt-enviar.jpg"  />
							</form>
						</div>
					</div>
				

					<div class="text-contato">
						<div>
							<h4><strong>ANÚNCIOS - Comercial ABC Classificados</strong></h4>
							<p><strong>Horário de Atendimento:</strong> <br />De segunda a sexta, das 7h45 às 18h30 e sábado das 8h30 às 11h</p>
							<p><strong>Fone:</strong> (51) 3553.2000</p>
							<p style="margin-bottom:16px"><strong>E-mail:</strong> <a href="mailto:anuncie@abcclassificados.com.br">anuncie@abcclassificados.com.br</a></p>
						</div>
						<div>
							<h4><strong>CADASTRO - Atendimento ABC Classificados</strong></h4>
							<p><strong>Horário de Atendimento:</strong> <br />De segunda a sexta, das 8h às 11h30 e das 13h às 18h</p>
							<p><strong>Fone:</strong> (51) 3553.2000</p>
							<p style="margin-bottom:16px"><strong>E-mail:</strong> <a href="mailto:cadastro@abcclassificados.com.br">cadastro@abcclassificados.com.br</a></p>
						</div>
						<div>
							<h4><strong>PUBLICIDADE - Publicidade no ABC Classificados (banners)</strong></h4>
							<p><strong>Horário de Atendimento:</strong> <br />De segunda a sexta, das 8h às 11h30 e das 13h às 18h</p>
							<p><strong>Fone:</strong> (51) 3594.0492</p>
							<p ><strong>E-mail:</strong> <a href="mailto:comercial.web@gruposinos.com.br">comercial.web@gruposinos.com.br</a></p>
						</div>
					</div>





				</div>
				<br class="clear" />
			</div>
        </div>
        <input type="hidden" name="status" value="{status}"/>
     </div>