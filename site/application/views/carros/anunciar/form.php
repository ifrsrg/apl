<link rel="stylesheet" type="text/css" href="{live}/media/front/js/uploadify/uploadify.css" />
<script type="text/javascript" src="{live}/media/front/js/uploadify/jquery.uploadify-3.1.js"></script>
<script type="text/javascript" src="{live}/media/front/js/carros/anunciar/form.js"></script>
<script type="text/javascript" src="{live}/media/front/js/anunciarindividual/anuncio.js"></script>
<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="{live}/media/front/css/ie7.css" />
	<![endif]-->

<div class="limite area classificados">
	<h2 class="title-cadastro">
		{cadastrar_editar} <strong>veículo</strong>
	</h2>

	<!-- BEGIN SEM_CONTRATOS -->
	<p class="obs">Para prosseguir com o cadastro, você deve ter contratos ativos e não expirados. Para verificar a situação de seus contratos entre em contato com o Grupo Sinos.</p>
	<!-- END SEM_CONTRATOS -->

	<!-- BEGIN FORM -->
	<form action="{live}/anunciar/{tipo_anunciante}/anuncio/acao/cadastrar{action}" method="POST" name="form" id="form-anuncio">
            <input type="hidden" name="id_anuncio_veiculo" value="{id_anuncio_veiculo}">
            <input type="hidden" name="minhaconta" value="{minhaconta}" />
		<!-- BEGIN CONTRATOS -->
			<div class="title w960">
				<h3>
					Escolha o <strong>Contrato</strong>
				</h3>
				<br	class="clear" />
			</div>
			<div class="left-contato">
				{box_contratos}
			</div>
			<br	class="clear" />
		<!-- END CONTRATOS -->

		<div class="title w960">
			<h3>
				Informações do <strong>veículo</strong>
			</h3>
			<span class="text">Todos os campos são obrigatórios</span> <br
				class="clear" />
		</div>
		<div class="left">
			<div class="field-mod w300">
				<span class="title-element">Tipo de Veículo:</span>
				<select	name="id_veiculo_tipo" loaded="0" class="select-style-veiculo-tipo">
					<option value="">Selecione</option>
					<!-- BEGIN VEICULO_TIPO -->
					<option value="{id_veiculo_tipo}" {selected_veiculo_tipo}>{veiculo_tipo}</option>
					<!-- END VEICULO_TIPO -->
				</select>
				<div class="box-aviso-input" id="-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<!-- BEGIN ESTADO_USO -->
			<label class="radio estado-de-uso estado-de-uso-novo">
				<input type="radio" name="id_estado_de_uso" value="{id_estado_uso}" {checked_estado_uso} {checked_estado_novo} />
                <span>{estado_uso}</span>
			</label>
			<!-- END ESTADO_USO -->
			<br class="clear" />

			<div class="field-mod w300">
				<span class="title-element">Marca:</span>
				<select name="id_veiculo_marca" loaded="0" class="select-style-marca">
					<option value="">Selecione</option>
					<!-- BEGIN MARCA -->
					<option value="{id_veiculo_marca}" {selected_marca}>{marca}</option>
					<!-- END MARCA -->
				</select>
				<div class="box-aviso-input" id="-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<div class="field-mod w300 last">
				<span class="title-element">Modelo:</span>
				<select name="id_veiculo" loaded="0" class="select-style-modelo">
					<option value="">Selecione</option>
					<!-- BEGIN MODELO -->
					<option value="{id_veiculo}" {selected_veiculo}>{veiculo}</option>
					<!-- END MODELO -->
				</select>
				<div class="box-aviso-input" id="-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>

			<br class="clr" />

			<div class="field-mod w160">
				<span class="title-element">Ano de Fabricação:</span>
				<select	name="ano_fabricacao" loaded="0" class="select-style-ano-fabricacao">
					<option value="">Selecione</option>
					<!-- BEGIN ANO_FABRICACAO -->
					<option value="{ano}" {selected_ano_fabricacao}>{ano}</option>
					<!-- END ANO_FABRICACAO -->
				</select>
				<div class="box-aviso-input" id="-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<div class="field-mod w160">
				<span class="title-element">Ano do Modelo:</span>
				<select name="ano_modelo" loaded="0" class="select-style">
					<option value="">Selecione</option>
					<!-- BEGIN ANO_MODELO -->
					<option value="{ano}" {selected_ano_modelo}>{ano}</option>
					<!-- END ANO_MODELO -->
				</select>
				<div class="box-aviso-input" id="-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<!--div class="field-mod w260 last">
				<span class="title-element">Combustível:</span> <select
					name="id_veiculo_combustivel" class="select-style">
					<option value="">Selecione</option>
					<BEGIN COMBUSTIVEL>
					<option value="{id_veiculo_combustivel}" {selected_combustivel}>{combustivel}</option>
					<END COMBUSTIVEL>
				</select>
				<div class="box-aviso-input" id="-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div-->
            
            <br class="clr" />
            <div class="info-placa">
                <div class="field-mod w300">
                        <span class="title-element">Placa:</span> <span class="field"><input
                                type="text" name="placa" value="{placa}" />
                        </span>
                        <div class="box-aviso-input" id="-erro">
                                <div class="lateral-direita-aviso-input">&nbsp;</div>
                                <div class="aviso-input">Campo Obrigatório</div>
                                <div class="lateral-esquerda-aviso-input">&nbsp;</div>
                        </div>
                </div>                            
            </div>

			<br class="clr" />

			<div class="field-mod w300">
				<span class="title-element">Valor:</span>
				<span class="field field-ie">
					<input type="text" name="valor" value="{valor}" class="price" {disabled_valor}/>
				</span>
				<div class="box-aviso-input remove-espaco-ie" id="-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<div class="field-mod w300 last">
				<label class="check check-sob-consulta"> <input type="checkbox"
					name="aceita_proposta" value="1" {checked_aceita_proposta}/> <span>Sob Consulta</span>
				</label> <br class="clr" />
			</div>

		</div>
		<div class="right box-preco-seu-veiculo" style="display:none;">
			<span class="box-top">&nbsp;</span>
			<div class="box remove-espaco-ie">
				<div class="box-main">
					<h5>O preço do seu carro</h5>
					<p>Selecione a Marca, o Modelo e o Ano de fabricação</p>
					<ul>
						<li><span class="name">Maior valor</span> <span class="value"
							id="max-valor">R$ 0.0</span> <br class="clear" /></li>
						<li><span class="name">Menor valor</span> <span class="value"
							id="min-valor">R$ 0.0</span> <br class="clear" /></li>
						<li class="last"><span class="name">Valor médio</span> <span
							class="value" id="mid-valor">R$ 0.0</span> <br class="clear" /></li>
					</ul>
				</div>
			</div>
			<span class="box-bottom">&nbsp;</span>
		</div>
		<br class="clear" />

		<div class="title w960">
			<h3>
				<strong>Fotos</strong>
			</h3>
			<br class="clear" />
		</div>
		<div class="left">
			<div class="picture">
				<ul>
					<li class="capa">
						<span>
							<!-- BEGIN CAPA_VAZIO -->
							<img src="{live}/media/front/img/classificados/thumb-capa-imovel.png" width="240" height="180">
							<!-- END CAPA_VAZIO -->
							<!-- BEGIN CAPA -->
							<img src="{live}/media/uploads/anuncio/{capa}" width="240" height="180">
							<!-- END CAPA -->
							<font class="legend">Foto de capa</font>
						</span>
					</li>
					<!-- BEGIN ANUNCIO_IMG -->
					<li class="com-img {class}">
						<div class="exclui-picture" alt="Remover Foto"></div>
						<span>
							<img width="120" height="90" src="{live}/media/uploads/anuncio/{foto}">
						</span>
					</li>
					<!-- END ANUNCIO_IMG -->
					<!-- BEGIN ANUNCIO_IMG_VAZIO  -->
					<li class="vazio">
						<div class="exclui-picture" alt="Remover Foto"></div>
						&nbsp;
					</li>
					<!-- END ANUNCIO_IMG_VAZIO -->
				</ul>
				<br class="clear" />
			</div>
			<input type="file" name="foto" id="upload-fotos" />
			<p class="obs">
				Selecione até [<span id="num-fotos">{num_fotos}</span>] fotos no formato jpg ou png para colocar no seu
				anúncio.<br />Cada arquivo não pode ser maior que 5MB.
			</p>
		</div>
		<br class="clear" />

		<div class="title w960">
			<h3>
				<strong>Vídeos</strong>
			</h3>
			<br class="clear" />
		</div>
		<div class="left">
			<div class="video-left">
				<div id="youtube"></div>
				<div class="field w209">
					<span class="field"><input type="text" name="url-youtube"
						class="url-youtube" value="Cole o link do YouTube aqui" />
					</span>
				</div>
				<input type="button" name="add-youtube" class="incorporar" value="" />
				<br class="clr" />
			</div>
			<div class="video-right">
				<ul>
					<li>
						<p>1. Copie o link do video no Youtube</p> <img
						src="{live}/media/front/img/classificados/img-add-youtube-01.png"
						width="220" height="80" alt="Copie o link do video no Youtube" />
					</li>
					<li>
						<p>
							2. Cole o link no campo ao lado e clique em <strong>Incorporar</strong>
						</p> <img
						src="{live}/media/front/img/classificados/img-add-youtube-02.png"
						width="220" height="80"
						alt="Cole o link no campo ao lado e clique em Incorporar" />
					</li>
					<li>
						<p>3. O vídeo vai ser adicionado ao anúncio.</p>
					</li>
				</ul>
			</div>
			<br class="clear" />
		</div>
		<div class="box-video-incorporado" style="display:{display_video};">
			<div class="title w960">
				<h3>
					<strong>Vídeo Incorporado</strong>
				</h3>
				<br	class="clear" />
			</div>
			<iframe id="video-incorporado" src="http://www.youtube.com/embed/{url_video}" frameborder="0" width="460" height="345" style="{style_video}">&nbsp;</iframe>
			<br/><br/>
		</div>
		<br class="clear" />
		<div class="title w960">
			<h3>
				<strong>Especificações</strong>
			</h3>
			<span class="text">Todos os campos são obrigatórios</span> <br
				class="clear" />
		</div>
		<div id="div-especificacoes" class="left">
			<!-- BEGIN CAMPOS_ADICIONAIS -->
                        <div class="field-mod w300">
                            <span class="title-element">{campos_adicionais_label} :</span>
                            <!-- BEGIN CAMPO_LISTA -->
                            <select name="campo_adicional_{id_veiculo_campos_adicionais}" loaded="0"  class="select-style">
                                    <option value="">Selecione</option>
                                    <!-- BEGIN CAMPO_VALUES -->
                                    <option value="{campo_value}" {selected_campo_value}>{campo_value}</option>
                                    <!-- END CAMPO_VALUES -->
                            </select>
                            <!-- END CAMPO_LISTA -->
                            <!-- BEGIN CAMPO_INPUT -->
                                    <input name="campo_adicional_{id_veiculo_campos_adicionais}" type="text" value="{campo_value}">
                            <!-- END CAMPO_INPUT -->
			</div>
			<!-- END CAMPOS_ADICIONAIS -->

                        <!-- BEGIN CAMPO_CHECKBOX -->
                        <div class="list-especificacao">
                            <h6>{campos_adicionais_label}:</h6>
                            <ul>
                                <!-- BEGIN CAMPO_CHECK_VALUE -->
				<li>
                                    <label class="checkbox">
					<input type="checkbox" {checked_campo_value} name="campo_adicional_{id_veiculo_campos_adicionais}[]" value="{campo_value}">
					<span>{campo_value}</span>
                                    </label>
				</li>
                                <!-- END CAMPO_CHECK_VALUE -->
                            </ul>
			</div>
                        <!-- END CAMPO_CHECKBOX -->
                        <!-- BEGIN CAMPO_TEXT -->
                        <div class="field-mod w500h131">
                            <span class="title-element">{campos_adicionais_label}:</span>
                            <span class="field">
                                    <textarea id="descricao" name="campo_adicional_{id_veiculo_campos_adicionais}" rows="1" cols="1">{campo_text}</textarea>
                            </span>
			</div>
                        <!-- END CAMPO_TEXT -->
                        <!-- BEGIN BR_CLEAR -->
                        <br class="clear" />
                        <!-- END BR_CLEAR -->
		</div>
		<br class="clear" />

		<div class="title w960">
			<h3>
				<strong>Localização</strong> do veículo
			</h3>
			<span class="text">Todos os campos são obrigatórios</span> <br
				class="clear" />
		</div>
		<div class="left">
			<div class="field-mod w300">
				<span class="title-element">Estado (UF):</span>
					<select name="id_estado" loaded="0"  class="select-style-estado">
					<option value="">Selecione</option>
					<!-- BEGIN ESTADO -->
					<option value="{id_estado}" {selected_estado}>{estado}</option>
					<!-- END ESTADO -->
				</select>
				<div class="box-aviso-input" id="uf-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">Campo Obrigatório</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
			<div class="field-mod w300 last">
				<span class="title-element">Cidade:</span>
					<select name="id_cidade" class="select-style">
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
		</div>
		<br class="clear" />

		<div class="title w960">
			<h3>
				<strong>Contato</strong> que será exibido no anúncio
			</h3>
			<span class="text">Todos os campos são obrigatórios</span> <br
				class="clear" />
		</div>
		<div class="left-contato">
			<div class="bloco-tel">
				<span class="title-element">Telefone 1:</span>
                                <div class="field ddd">
					<span class="field">
						<input type="text" name="ddd" value="{ddd}" />
					</span> <br class="clear" />
				</div>
				<div class="field nro">
					<span class="field"><input
						type="text" name="telefone" value="{telefone}" />
					</span> <br class="clear" />
				</div>

			</div>
                        <div class="bloco-tel">
				<span class="title-element">Telefone 2:</span>
                                <div class="field ddd">
					<span class="field">
						<input type="text" name="ddd2" value="{ddd2}" />
					</span> <br class="clear" />
				</div>
				<div class="field nro">
					<span class="field"><input
						type="text" name="telefone2" value="{telefone2}" />
					</span> <br class="clear" />
				</div>
			</div>
			<div class="field-mod w300 last">
				<span class="title-element">E-mail:</span> <span class="field"><input id="email" type="text" name="email" value="{email}" />
				</span>
				<div class="box-aviso-input remove-espaco-ie" id="email-erro">
					<div class="lateral-direita-aviso-input">&nbsp;</div>
					<div class="aviso-input">No Mínimo 1 Campo Deve ser Preechido</div>
					<div class="lateral-esquerda-aviso-input">&nbsp;</div>
				</div>
			</div>
                        <br class="clear" />
                        <p class="obs">Preencha no minímo 1 dado de contato para ser exibido no anúncio.</p>
		</div>
		<br class="clear" />

		<div class="bts">
			<ul>
				<li class="voltar"><a href="javascript:history.back();"
					title="Voltar">Voltar</a>
				</li>
				<li class="{bt_salvar_cadastrar}"><input id="salvar" type="button" value="" /></li>
			</ul>
			<br class="clear" />
		</div>
	</form>
	<!-- END FORM -->
</div>
