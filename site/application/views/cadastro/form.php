<script type="text/javascript" src="{live}/media/front/js/cep.js"></script>
<script type="text/javascript" src="{live}/media/front/js/cadastro/form.js"></script>
<script type="text/javascript" src="{live}/media/front/js/acesso/facebook.js"></script>
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="{live}/media/front/css/ie7.css" />
<![endif]-->		
<div id="conteudo{background}">
        <div class="limite">
            <br class="clear" />
            <div id="main">
            	<!-- BEGIN AREA_FACEBOOK -->
				<div class="coluna-marca-interna">
					<h1 title="abc Carros"><a href="{live}" title="abc Carros"><img src="{live}/media/front/img/classificados/abc-classificados-mod.png" alt="abc Classificados" title="abc Classificados" width="182" height="127" /></a></h1>
				</div>
				<div class="coluna-conteudo-interna-mod3">
					<h2 class="tit-cadastrar">CADASTRAR</h2>
					<div class="box-cadastro-face">
						<div class="lateral-esquerda-cadastro-face">&nbsp;</div>
						<div class="box-cadastro-face-mg">
							<a href="{live}/cadastro/acao/facebook" class="bt-cadastrar-pelo-facebook facebook" alt="Cadastre-se pelo Facebook" title="Cadastre-se pelo Facebook"><img src="{live}/media/front/img/bt-cadastre-se-pelo-facebook.png" alt="Cadastre-se pelo Facebook" title="Cadastre-se pelo Facebook" /></a>
							<p class="txt-cadastrar-facebook">É necessário completar o cadastro<br />para anunciar</p>
						</div>
						<div class="lateral-direita-cadastro-face">&nbsp;</div>
						<br class="clear" />
					</div>
					<div class="bt-ou">
						<img src="{live}/media/front/img/bt-ou.jpg" alt="OU" alt="OU" />
					</div>	
				</div>
				<br class="clear" />
				<!-- END AREA_FACEBOOK -->
				<h2 class="tit-cadastro-completo">{tit_cadastro}</h2>
				<div class="cadastro-completo">
					<div id="form-cadastro-usuario-comum">
							<!-- BEGIN TIPO_PESSOA -->
							<div class="title w620">
								<h3>TIPO DE <strong>PESSOA</strong></h3>
								<br class="clear" />
							</div>
							<label id="radio-pessoa-fisica" class="radio-cadastro radio radio-space on">
								<input type="radio" name="tipo_pessoa" value="pessoa_fisica" class="radio-pessoa radio-pessoa-fisica" {checked_pf}/>
								<span>Pessoa Física</span>
							</label>
							<label id="radio-pessoa-juridica" class="radio-cadastro radio radio-space">
								<input type="radio" name="tipo_pessoa" value="pessoa_juridica" class="radio-pessoa radio-pessoa-juridica" {checked_pj}/>
								<span>Pessoa Jurídica</span>
							</label>
							<br class="clear" />
							<!-- END TIPO_PESSOA -->
							<form class="cadastro-pessoa-fisica" method="POST" action="{live}/cadastro/acao/salvarPF">
								<div class="title w620">
									<h3>Dados de <strong>acesso</strong></h3>
									<span class="text">Todos os campos são obrigatórios</span>
									<br class="clear" />
								</div>
								<div class="field-mod w300">
									<span class="title-element">CPF:</span>
									<span class="field"><input type="text" id="cpf" name="cpf" value="{cpf}" /></span>
									<div id="cpf-erro" class="box-aviso-input remove-espaco-ie">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">CPF Inválido</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
									<p class="txt-input">Digíte somente números</p>	
								</div>
								
								<div class="field-mod w300 last">
									<span class="title-element">E-mail:</span>
									<span class="field"><input id="email" type="text" name="email" value="{email}" /></span>
									<div class="box-aviso-input remove-espaco-ie" id="email-erro">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">E-mail já esta cadastrado</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
								</div>
								<br class="clear" />
								<!-- BEGIN CAMPO_SENHA -->
								<div class="field-mod w300">
									<span class="title-element">Senha:</span>
									<span class="field"><input type="password" name="senha" id="senha" value="" /></span>
									<p class="txt-input floatless">Senha de 6 a 12 caracteres</p>	
								</div>
								<div class="field-mod w300 last">
									<span class="title-element">Repetir Senha:</span>
									<span class="field"><input type="password" id="senha2" name="senha_repetir" value="" /></span>
									<div class="box-aviso-input remove-espaco-ie" id="senha-erro">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">As senhas não conferem</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
								</div>
								<!-- END CAMPO_SENHA -->
								<br class="clear" />
								<div class="title w620">
									<h3>Dados <strong>pessoais</strong></h3>
									<span class="text">( <span class="txt-obrigatorio">*</span> ) campos obrigatórios</span>
									<br class="clear" />
								</div>
								<div class="field-mod w620 last">
									<span class="title-element boldless">Nome Completo <span class="txt-obrigatorio">*</span></span>
									<span class="field"><input id="nome" type="text" name="nome" value="{nome}" /></span>
									<div id="nome-erro" class="box-aviso-input remove-espaco-ie">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">Campo Obrigatório</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
								</div>
								<div class="field-mod w300">
									<span class="title-element boldless">CEP <span class="txt-obrigatorio">*</span></span>
									<span class="field">
										<input type="text" id="cep" name="cep" class="busca-cep" value="{cep}" />
										<a href="javascript:void(0);" alt="Busca CEP" class="bt-busca-cep" title="Busca CEP"><img class="bt-busca-cep" src="{live}/media/front/img/bt-lupa.jpg" alt="Busca CEP" title="Busca CEP"></a>
									</span>
									<div class="box-aviso-input" id="cep-erro">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">Campo Obrigatório</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
									<p class="txt-input">Digíte somente números</p>	
								</div>
								<br class="clear" />
								<div class="field-mod w460">
									<span class="title-element boldless">Endereço <span class="txt-obrigatorio">*</span></span>
									<span class="field"><input type="text" id="endereco" name="endereco" value="{endereco}" /></span>
									<div class="box-aviso-input remove-espaco-ie" id="endereco-erro">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">Campo Obrigatório</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
								</div>
								<div class="field-mod w140 last">
									<span class="title-element boldless">Número <span class="txt-obrigatorio">*</span></span>
									<span class="field"><input type="text" id="num" name="numero" value="{numero}" /></span>
									<div class="box-aviso-input remove-espaco-ie width-100" id="num-erro">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">Campo Obrigatório</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>	
								</div>
								<br class="clear" />
								<div class="field-mod w200">
									<span class="title-element boldless">Complemento</span>
									<span class="field"><input type="text" name="complemento" value="{complemento}" /></span>
								</div>
								<div class="field-mod w160" id="estado">
									<span class="title-element boldless">Estado (UF) <span class="txt-obrigatorio">*</span></span>
									<select name="uf_pf" id="estado-1" >
										<option value="">Selecione</option>
										<!-- BEGIN ESTADO -->
										<option value="{id_estado}" {selected_estado}>{estado}</option>
										<!-- END ESTADO -->
									</select>
									<div class="box-aviso-input" id="estado-erro">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">Campo Obrigatório</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
								</div>
								<div class="field-mod w240 last" id="cidade">
									<span class="title-element boldless">Cidade <span class="txt-obrigatorio">*</span></span>
									<select name="cidade_pf" id="cidade-1">
										<option value="">Selecione</option>
										<!-- BEGIN CIDADE -->
										<option value="{id_cidade}" {selected_cidade}>{cidade}</option>
										<!-- END CIDADE -->
									</select>
									<div class="box-aviso-input" id="cidade-erro">
										<div class="lateral-direita-aviso-input">&nbsp;</div>
										<div class="aviso-input">Campo Obrigatório</div>
										<div class="lateral-esquerda-aviso-input">&nbsp;</div>
									</div>
								</div>
								<br class="clr" />
								<div class="blocow620 w620 pad-bot-20">
									<div class="field-mod w300">
										<span class="title-element boldless">Bairro: <span class="txt-obrigatorio">*</span></span>
										<span class="field"><input type="text" name="bairro" id="bairro" value="{bairro}" /></span>
									</div>
									<div class="col-dir">
										<span class="title-element boldless">Telefone de Contato <span class="txt-obrigatorio">*</span></span>
										<div class="field-mod ddd height-41">
											<span class="field"><input type="text" name="ddd1" id="ddd-1" value="{ddd1}" /></span>
											<br class="clear" />
										</div>
										<div class="field-mod nro last height-41">
											<span class="field"><input type="text" name="telefone1" id="tel-1" value="{tel1}" /></span>
											<br class="clear" />
										</div>
										<br class="clear" />
										<p class="txt-input floatless">Cód. área &nbsp;&nbsp;&nbsp;&nbsp; Número</p>	
									</div>
									<br class="clear" />
								</div>
								<div class="blocow620 w620">
									<div class="col-esq">
										<span class="title-element boldless">Telefone 2:</span>
										<div class="field-mod ddd height-41">
											<span class="field"><input type="text" name="ddd2" value="{ddd2}" id="ddd-2" /></span>
											<br class="clear" />
										</div>
										<div class="field-mod nro last height-41">
											<span class="field"><input type="text" name="telefone2" value="{tel2}" id="tel-2" /></span>
											<br class="clear" />
										</div>
									</div>
									<div class="col-dir">
										<span class="title-element boldless">Telefone 3:</span>
										<div class="field-mod ddd height-41">
											<span class="field"><input type="text" name="ddd3" value="{ddd3}" id="ddd-3" /></span>
											<br class="clear" />
										</div>
										<div class="field-mod nro last height-41">
											<span class="field"><input type="text" name="telefone3" value="{tel3}" id="tel-3" /></span>
											<br class="clear" />
										</div>
									</div>
									<br class="clear" />
								</div>
								<br class="clr" />
							</form>
							<form class="cadastro-pessoa-juridica" method="POST" action="{live}/cadastro/acao/salvarPJ">
								<div class="title w620">
								<h3>Dados de <strong>acesso</strong></h3>
								<span class="text">Todos os campos são obrigatórios</span>
								<br class="clear" />
							</div>
							<div class="field-mod w300">
								<span class="title-element">CNPJ:</span>
								<span class="field"><input type="text" id="cnpj" name="cnpj" value="{cnpj}" /></span>
								<div class="box-aviso-input remove-espaco-ie" id="cnpj-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">CNPJ Inválido</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>
								<p class="txt-input">Digíte somente números</p>	
							</div>
							
							<div class="field-mod w300 last">
								<span class="title-element">E-mail:</span>
								<span class="field"><input type="text" name="email" id="email-mod" value="{email}" /></span>
								<div class="box-aviso-input remove-espaco-ie" id="email-mod-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">E-mail já esta cadastrado</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>
							</div>
							<br class="clear" />
							<!-- BEGIN CAMPO_SENHA2 -->
							<div class="field-mod w300">
								<span class="title-element">Senha:</span>
								<span class="field"><input type="password" id="senha-mod" name="senha" value="" /></span>
								<p class="txt-input floatless">Senha de 6 a 12 caracteres</p>	
							</div>
							<div class="field-mod w300 last">
								<span class="title-element">Repetir Senha:</span>
								<span class="field"><input type="password" id="senha-mod2" name="senha_repetir" value="" /></span>
								<div class="box-aviso-input remove-espaco-ie" id="senha-mod-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">As senhas não conferem</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>
							</div>
							<!-- END CAMPO_SENHA2 -->
							<br class="clear" />
							<div class="title w620">
								<h3>Dados da <strong>empresa</strong></h3>
								<span class="text">( <span class="txt-obrigatorio">*</span> ) campos obrigatórios</span>
								<br class="clear" />
							</div>
							<div class="field-mod w300">
								<span class="title-element boldless">Nome Fantasia <span class="txt-obrigatorio">*</span></span>
								<span class="field"><input type="text" id="nome-fantasia" name="nome_fantasia" value="{nome_fantasia}" /></span>
								<div class="box-aviso-input remove-espaco-ie" id="nome-fantasia-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">Campo Obrigatório</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>
							</div>
							<div class="field-mod w300 last">
								<span class="title-element boldless">Razão Social <span class="txt-obrigatorio">*</span></span>
								<span class="field">
									<input type="text" id="razao-social" name="razao_social" value="{razao_social}" />
								</span>
								<div class="box-aviso-input remove-espaco-ie"  id="razao-social-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">Campo Obrigatório</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>
								<p class="txt-input">Digíte somente números</p>	
							</div>
							<br class="clear" />
							<div class="field-mod w300">
								<span class="title-element boldless">IE <span class="txt-obrigatorio">*</span></span>
								<span class="field"><input type="text" id="ie" name="ie" value="{ie}" /></span>
								<div class="box-aviso-input remove-espaco-ie" id="ie-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">Campo Obrigatório</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div> 
								<label class="check check-ie {class_ie}">
									<input type="checkbox" name="ie_isento" value="1" {checked_ie}/>
									<span>Isento</span>
								</label>
							</div>
							<div class="field-mod w300 last">
								<span class="title-element boldless">CEP <span class="txt-obrigatorio">*</span></span>
								<span class="field">
									<input type="text" name="cep" class="busca-cep" value="{cep}" id="cep-mod" />
									<a href="#" alt="Busca CEP" title="Busca CEP"><img class="bt-busca-cep" src="{live}/media/front/img/bt-lupa.jpg" alt="Busca CEP" title="Busca CEP"></a>
								</span>
								<div class="box-aviso-input" id="cep-mod-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">Campo Obrigatório</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>
								<p class="txt-input">Digíte somente números</p>	
							</div>
							<br class="clear" />
							<div class="field-mod w620 last">
								<span class="title-element boldless">Nome Responsável <span class="txt-obrigatorio">*</span></span>
								<span class="field"><input id="nome-responsavel" type="text" name="nome" value="{nome}" /></span>
								<div class="box-aviso-input remove-espaco-ie" id="nome-responsavel-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">Campo Obrigatório</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>
							</div>	
							<div class="field-mod w460">
								<span class="title-element boldless">Endereço <span class="txt-obrigatorio">*</span></span>
								<span class="field"><input id="endereco-mod" type="text" name="endereco" value="{endereco}" /></span>
								<div class="box-aviso-input remove-espaco-ie" id="endereco-mod-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">Campo Obrigatório</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>
							</div>
							<div class="field-mod w140 last">
								<span class="title-element boldless">Número <span class="txt-obrigatorio">*</span></span>
								<span class="field"><input type="text" name="numero" id="num-mod" value="{numero}" /></span>
								<div class="box-aviso-input  remove-espaco-ie width-100" id="num-mod-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">Campo Obrigatório</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>	
							</div>
							<br class="clear" />
							<div class="field-mod w200">
								<span class="title-element boldless">Complemento</span>
								<span class="field"><input type="text" name="complemento" value="{complemento}" /></span>
							</div>
							<div class="field-mod w160" id="estado-mod">
								<span class="title-element boldless">Estado (UF) <span class="txt-obrigatorio">*</span></span>
								<select name="uf_pj" id="estado-2" >
										<option value="">Selecione</option>
										<!-- BEGIN ESTADO2 -->
										<option value="{id_estado}" {selected_estado}>{estado}</option>
										<!-- END ESTADO2 -->
									</select>
								<div class="box-aviso-input" id="estado-mod-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">Campo Obrigatório</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>
							</div>
							<div class="field-mod w240 last" id="cidade-mod">
								<span class="title-element boldless">Cidade <span class="txt-obrigatorio">*</span></span>
								<select name="cidade_pj" id="cidade-2">
									<option value="">Selecione</option>
									<!-- BEGIN CIDADE2 -->
									<option value="{id_cidade}" {selected_cidade}>{cidade}</option>
									<!-- END CIDADE2 -->
								</select>
								<div class="box-aviso-input" id="cidade-mod-erro">
									<div class="lateral-direita-aviso-input">&nbsp;</div>
									<div class="aviso-input">Campo Obrigatório</div>
									<div class="lateral-esquerda-aviso-input">&nbsp;</div>
								</div>
							</div>
							<br class="clr" />
							<div class="blocow620 w620 pad-bot-20">
								<div class="field-mod w300">
									<span class="title-element boldless">Bairro:</span>
									<span class="field"><input type="text" name="bairro" value="{bairro}" /></span>
								</div>
								<div class="col-dir">
									<span class="title-element boldless">Telefone de Contato <span class="txt-obrigatorio">*</span></span>
									<div class="field-mod ddd height-41">
										<span class="field"><input type="text" id="ddd-mod1" name="ddd1" value="{ddd1}" /></span>
										<br class="clear" />
									</div>
									<div class="field-mod nro last height-41">
										<span class="field"><input type="text" id="tel-mod1" name="telefone1" value="{tel1}" /></span>
										<br class="clear" />
									</div>
									<br class="clear" />
									<p class="txt-input floatless">Cód. área &nbsp;&nbsp;&nbsp;&nbsp; Número</p>	
								</div>
								<br class="clear" />
							</div>
							<div class="blocow620 w620">
								<div class="col-esq">
									<span class="title-element boldless">Telefone 2:</span>
									<div class="field-mod ddd height-41">
										<span class="field"><input type="text" id="ddd-mod2" name="ddd2" value="{ddd2}" /></span>
										<br class="clear" />
									</div>
									<div class="field-mod nro last height-41">
										<span class="field"><input type="text" id="tel-mod2" name="telefone2" value="{tel2}" /></span>
										<br class="clear" />
									</div>
								</div>
								<div class="col-dir">
									<span class="title-element boldless">Telefone 3:</span>
									<div class="field-mod ddd height-41">
										<span class="field"><input type="text" name="ddd3" id="ddd-mod3" value="{ddd3}" /></span>
										<br class="clear" />
									</div>
									<div class="field-mod nro last height-41">
										<span class="field"><input type="text" name="telefone3" value="{tel3}" id="tel-mod3" /></span>
										<br class="clear" />
									</div>
								</div>
								<br class="clear" />
							</div>
							</form>		
							<label class="check">
								<input type="checkbox" id="check-termo" name="txt-termos" value="" />
								<span>Concordo com os <a href="{live}/ajax/acao/termos" rel="facebox[.boxtermos]" class="link-termos" alt="Termos e Condições" title="Termos e Condições">Termos e Condições</a> do ABC Classificados</span>
							</label>
							<input type="hidden" id="tipo-pessoa" name="tipo_pessoa" value="{tipo_pessoa}"/>
							<br class="clear" />
							<img class="bt-cadastrar" src="{live}/media/front/img/bt-cadastrar.jpg" />
							<div class="termos-obrigatorio">
								<img src="{live}/media/front/img/classificados/img-termos.jpg">
							</div>
							<br class="clear" />
					</div>
				</div>		
			</div>
        </div>
    </div>
