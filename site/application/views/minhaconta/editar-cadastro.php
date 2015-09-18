<script type="text/javascript" src="{live}/media/front/js/cep.js"></script>
<script type="text/javascript" language="javascript" src="{live}/media/front/js/minhaconta/editar-cadastro.js"></script>
<h2 class="title tit-editar-cadastro">Editar <strong>Cadastro</strong></h2>
<!-- BEGIN PESSOA_JURIDICA -->
<div class="cadastro-minha-conta-pf-pj">
		<form id="form-pj" method="POST" action="{live}/minha-conta/acao/salvarPJ">
			<div class="title w620">
			<h3>Dados de <strong>acesso</strong></h3>
			<span class="text">Todos os campos são obrigatórios</span>
			<br class="clear" />
		</div>
		<div class="field-mod w300">
			<span class="title-element">CNPJ:</span>
			<span class="field"><input type="text" id="cnpj" name="cnpj" value="{cnpj}" /></span>
			<div class="box-aviso-input" id="cnpj-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">CNPJ Inválido</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>
			<p class="txt-input">Digíte somente números</p>	
		</div>
		
		<div class="field-mod w300 last">
			<span class="title-element">E-mail:</span>
			<span class="field"><input type="text" name="email" id="email" value="{email}" /></span>
			<div class="box-aviso-input" id="email-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">E-mail já esta cadastrado</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>
		</div>
		<br class="clear" />
		<div class="title w620 margin-topless">
			<h3>Dados da <strong>empresa</strong></h3>
			<span class="text">( <span class="txt-obrigatorio">*</span> ) campos obrigatórios</span>
			<br class="clear" />
		</div>
		<div class="field-mod w300">
			<span class="title-element boldless">Nome Fantasia <span class="txt-obrigatorio">*</span></span>
			<span class="field"><input type="text" id="nome-fantasia" name="nome_fantasia" value="{nome_fantasia}" /></span>
			<div class="box-aviso-input" id="nome-fantasia-erro">
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
			<div class="box-aviso-input"  id="razao-social-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">Campo Obrigatório</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>	
		</div>
		<br class="clear" />
		<div class="field-mod w300">
			<span class="title-element boldless">IE <span class="txt-obrigatorio">*</span></span>
			<span class="field"><input type="text" id="ie" name="ie" value="{ie}" /></span>
			<label class="check check-ie {ie_class}">
				<input type="checkbox" name="ie_isento" value="1" {ie_checked}/>
				<span>Isento</span>
			</label>
			<div class="box-aviso-input" id="ie-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">Campo Obrigatório</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>
		</div>
		<div class="field-mod w300 last">
			<span class="title-element boldless">CEP <span class="txt-obrigatorio">*</span></span>
			<span class="field">
				<input type="text" name="cep" class="busca-cep busca-cep-mod" value="{cep}" id="cep" />
				<a href="#" alt="Busca CEP" class="link-busca-cep" title="Busca CEP"><img class="bt-busca-cep" src="{live}/media/front/img/bt-lupa.jpg" alt="Busca CEP" title="Busca CEP"></a>
			</span>
			<div class="box-aviso-input" id="cep-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">Campo Obrigatório</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>
			<p class="txt-input">Digíte somente números</p>	
		</div>
		<br class="clear" />
		<div class="field-mod w620 last">
			<span class="title-element boldless">Nome Responsável <span class="txt-obrigatorio">*</span></span>
			<span class="field"><input id="nome" type="text" name="nome" value="{nome}" /></span>
			<div class="box-aviso-input" id="nome-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">Campo Obrigatório</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>
		</div>	
		<div class="field-mod w460">
			<span class="title-element boldless">Endereço <span class="txt-obrigatorio">*</span></span>
			<span class="field"><input id="endereco" type="text" name="endereco" value="{endereco}" /></span>
			<div class="box-aviso-input" id="endereco-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">Campo Obrigatório</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>
		</div>
		<div class="field-mod w140 last">
			<span class="title-element boldless">Número <span class="txt-obrigatorio">*</span></span>
			<span class="field"><input type="text" name="numero" id="num" value="{num}" /></span>
			<div class="box-aviso-input" id="num-erro">
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
			<span class="title-element boldless">Estado (UF):</span>
			<select name="estado" id="estado" >
				<option value="">Selecione</option>
				<!-- BEGIN ESTADO_PF -->
				<option value="{id_uf}" {selected_uf}>{uf}</option>
				<!-- END ESTADO_PF -->
			</select>
			<div class="box-aviso-input" id="estado-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">Campo Obrigatório</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>
		</div>
		<div class="field-mod w240 last" id="cidade">
			<span class="title-element boldless">Cidade:</span>
			<select name="cidade" id="cidade">
				<option value="">Selecione</option>
				<!-- BEGIN CIDADE_PF -->
				<option value="{id_cidade}" {selected_cidade}>{cidade}</option>
				<!-- END CIDADE_PF -->
			</select>
			<div class="box-aviso-input" id="cidade-erro">
				<div class="lateral-direita-aviso-input">&nbsp;</div>
				<div class="aviso-input">Campo Obrigatório</div>
				<div class="lateral-esquerda-aviso-input">&nbsp;</div>
			</div>
		</div>
		<br class="clr" />
		<div class="blocow620-mod w620">
			<div class="field-mod w300">
				<span class="title-element boldless">Bairro:</span>
				<span class="field"><input type="text" name="bairro" value="{bairro}" /></span>
			</div>
			<div class="col-dir">
				<span class="title-element boldless">Telefone de Contato <span class="txt-obrigatorio">*</span></span>
				<div class="field-mod ddd height-41">
					<span class="field"><input type="text" id="ddd-1" name="ddd1" value="{ddd1}" /></span>
					<br class="clear" />
				</div>
				<div class="field-mod nro last height-41">
					<span class="field"><input type="text" id="tel-1" name="telefone1" value="{tel1}" /></span>
					<br class="clear" />
				</div>
				<br class="clear" />
				<p class="txt-input floatless">Cód. área &nbsp;&nbsp;&nbsp;&nbsp; Número</p>	
			</div>
			<br class="clear" />
		</div>
		<div class="blocow620-mod w620">
			<div class="col-esq">
				<span class="title-element boldless">Telefone 2:</span>
				<div class="field-mod ddd height-41">
					<span class="field"><input type="text" id="ddd-2" name="ddd2" value="{ddd2}" /></span>
					<br class="clear" />
				</div>
				<div class="field-mod nro last height-41">
					<span class="field"><input type="text" id="tel-2" name="telefone2" value="{tel2}" /></span>
					<br class="clear" />
				</div>
			</div>
			<div class="col-dir">
				<span class="title-element boldless">Telefone 3:</span>
				<div class="field-mod ddd height-41">
					<span class="field"><input type="text" name="ddd3" id="ddd-3" value="{ddd3}" /></span>
					<br class="clear" />
				</div>
				<div class="field-mod nro last height-41">
					<span class="field"><input type="text" name="telefone3" value="{tel3}" id="tel-3" /></span>
					<br class="clear" />
				</div>
			</div>
			<br class="clear" />
		</div>
		</form>
		<br class="clear" />
		<img id="salvar" src="{live}/media/front/img/classificados/bt-salvar.png" />
		<br class="clear" />
</div>
<!-- END PESSOA_JURIDICA -->
<!-- BEGIN PESSOA_FISICA -->
<div class="cadastro-minha-conta-pf-pj">
	<div id="form-cadastro-usuario-comum">
		<form id="form-pf" method="POST" action="{live}/minha-conta/acao/salvarPF">
			<div class="title w620">
				<h3>Dados de <strong>acesso</strong></h3>
				<span class="text">Todos os campos são obrigatórios</span>
				<br class="clear" />
			</div>
			<div class="field-mod w300">
				<span class="title-element">CPF:</span>
				<span class="field"><input type="text" id="cpf" name="cpf" value="{cpf}" /></span>
				<div id="cpf-erro" class="box-aviso-input">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">CPF Inválido</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
				<p class="txt-input">Digíte somente números</p>	
			</div>
			
			<div class="field-mod w300 last">
				<span class="title-element">E-mail:</span>
				<span class="field"><input id="email" type="text" name="email" value="{email}" /></span>
				<div class="box-aviso-input" id="email-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">E-mail já esta cadastrado</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<br class="clear" />
			<div class="title w620">
				<h3>Dados <strong>pessoais</strong></h3>
				<span class="text">( <span class="txt-obrigatorio">*</span> ) campos obrigatórios</span>
				<br class="clear" />
			</div>
			<div class="field-mod w620 last">
				<span class="title-element">Nome Completo <span class="txt-obrigatorio">*</span></span>
				<span class="field"><input id="nome" type="text" name="nome" value="{nome}" /></span>
				<div id="nome-erro" class="box-aviso-input">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<div class="field-mod w300 last">
				<span class="title-element boldless">CEP <span class="txt-obrigatorio">*</span></span>
				<span class="field">
					<input type="text" id="cep" name="cep" class="busca-cep busca-cep-mod" value="{cep}" />
					<a href="javascript:void(0);" alt="Busca CEP" title="Busca CEP"><img class="bt-busca-cep" src="{live}/media/front/img/bt-lupa.jpg" alt="Busca CEP" title="Busca CEP"></a>
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
				<div class="box-aviso-input" id="endereco-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<div class="field-mod w140 last">
				<span class="title-element boldless">Número <span class="txt-obrigatorio">*</span></span>
				<span class="field"><input type="text" id="num" name="numero" value="{num}" /></span>
				<div class="box-aviso-input" id="num-erro">
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
				<select name="estado" id="estado" >
					<option value="">Selecione</option>
					<!-- BEGIN ESTADO_PF -->
					<option value="{id_uf}" {selected_uf}>{uf}</option>
					<!-- END ESTADO_PF -->
				</select>
				<div class="box-aviso-input" id="estado-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<div class="field-mod w240 last" id="cidade">
				<span class="title-element boldless">Cidade <span class="txt-obrigatorio">*</span></span>
				<select name="cidade" id="cidade">
					<option value="">Selecione</option>
					<!-- BEGIN CIDADE_PF -->
					<option value="{id_cidade}" {selected_cidade}>{cidade}</option>
					<!-- END CIDADE_PF -->
				</select>
				<div class="box-aviso-input" id="cidade-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<br class="clr" />
			<div class="blocow620-mod w620">
				<div class="field-mod w300">
					<span class="title-element boldless">Bairro:</span>
					<span class="field"><input type="text" name="bairro" value="{bairro}" /></span>
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
			<div class="blocow620-mod w620">
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
		<br class="clear" />
		<img id="salvar" src="{live}/media/front/img/classificados/bt-salvar.png" />
		<br class="clear" />
	</div>
</div>
<!-- END PESSOA_FISICA -->