<script type="text/javascript" src="{live}/media/front/js/carros/anuncio/box-comparar.js"></script>
<script type="text/javascript" src="{live}/media/front/js/carros/busca.js"></script>
<script type="text/javascript" src="{live}/media/front/js/jquery.viewport.js"></script>
<!-- BEGIN SCRIPT_AJAX -->
<script type="text/javascript" src="{live}/media/front/js/functions.js"></script>
<script type="text/javascript" src="{live}/media/front/js/default.js"></script>
<!-- END SCRIPT_AJAX -->

<div id="conteudo">
<!-- BEGIN RESULTADOS -->
<div class="limite"> 
            <input type="hidden" id="url-ajax" value="{url_ajax}" />

        	<div id="coluna-principal">
				<div id="breadcrumb">
					<a href="{live}" title="ABC Classificados">ABC Classificados</a><span>&nbsp;</span>
					<a href="{live}/carros" title="Carros">Carros</a><span>&nbsp;</span>
					<a href="javascript:void(0);" title="Comprar">Comprar</a><span>&nbsp;</span>
					Resultado da Busca
				</div>
                <div id="titulo-internas"><h2 title="Sua busca por {categoria}">Sua busca por <strong>{categoria}</strong></h2></div>
                <div class="itens-search">
                    <ul>
                        <!-- BEGIN TERMO_BUSCA_SEM_LINK -->
                        <li><span>{termo}</span></li>
                        <!-- END TERMO_BUSCA_SEM_LINK -->
                        <!-- BEGIN TERMO_BUSCA -->
                        <li>
                            <a href="{termo_link}" title="Remover este Ítem" class="js-link-ajax icon">Remover este Ítem</a>
                            <span>{termo}</span>
                        </li>
                        <!-- END TERMO_BUSCA -->
                        <li class="options">
                            <a href="{live}/carros/busca/resultado" title="Limpar">Limpar</a> - <a href="{live}/carros/busca/resultado" title="Nova busca">Nova busca</a>
                        </li>
                    </ul>
                </div>
                <div class="layout-search">
                    <ul>
                        <li class="box {box_on}"><a class="js-link-ajax" href="{url_caixas}"
						title="Visualizar anúncios em caixas">&nbsp;</a></li>
					<li class="list {list_on}"><a class="js-link-ajax" href="{url_lista}"
						title="Visualizar anúncios em lista">&nbsp;</a></li>
                    </ul>
                    <span>Foram encontrados <strong>{num_anuncios_encontrados}</strong> anúncios</span>
                </div>
                <br class="clear" />
                <!-- BEGIN SEM_RESULTADO -->
                <h2>Nenhum Resultado Encontrado</h2>
                <!-- END SEM_RESULTADO -->
                <table cellpadding="0" cellspacing="0" class="table-default">
                	<thead>
                        <tr>
                            <th width="31%" colspan="3" class="first {ordem_veiculo} {active_veiculo}">
                                <a href="javascript:void(0);" class="js-ordenacao-ajax" lang="veiculo">Veículo</a>
                            </th>
                            <th width="16%" class="{ordem_valor} {active_valor}">
                                <a href="javascript:void(0);" class="js-ordenacao-ajax" lang="valor">Preço</a>
                            </th>
                            <th width="11%" class="{ordem_ano_modelo} {active_ano_modelo}">
                                <a href="javascript:void(0);" class="js-ordenacao-ajax" lang="ano_modelo">Ano</a>
                            </th>
                            <th width="21%" class="{ordem_veiculo_estado_de_uso} {active_veiculo_estado_de_uso}">
                                <a href="javascript:void(0);" class="js-ordenacao" lang="veiculo_estado_de_uso">Estado de Uso</a>                            </th>
                            <th width="21%" class="last {ordem_cidade} {active_cidade}">
                                <a href="javascript:void(0);" class="js-ordenacao-ajax" lang="cidade">Localização</a>
                            </th>
                        </tr>
                	</thead>
                    <tbody>
                        <!-- BEGIN ITEM -->
                        <tr>
                            <td class="options">
                                <ul>
                                    <li class="favorito {class_fav}"><a class="bt-favorito" fav="{id_anuncio}" href="javascript:void(0);">Favorito</a></li>
                                    <li class="checkbox checkbox-comparar"><input type="checkbox" name="comparar_carros" value="{id_anuncio}" {checked_comparar} /></li>
                                </ul>
                            </td>
                            <td class="image {active_veiculo}">
                                <div class="thumb"><img src="{live}/media/uploads/anuncio/{url_midia_destaque}" alt="Uno" width="60" height="45" /></div>
                                <div class="mask"><a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{veiculo}">{veiculo}</a></div>
                            </td>
                            <td class="{active_veiculo}">
                                <div class="title"><a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{veiculo}">{veiculo}</a></div>
                                <div>{nome}</div>
                                <div class="phone"><a href="javascript:void(0);" title="Ver telefone">Ver telefone</a></div>
                            </td>
                            <td class="{active_valor}">{valor}</td>
                            <td class="{active_ano_modelo}">{ano_modelo}</td>
                            <td class="{active_veiculo_estado_de_uso}">{veiculo_estado_de_uso}</td>
                            <td class="last {active_cidade}">{cidade}</td>
                        </tr>
                        <!-- END ITEM -->
                        <!-- BEGIN BOX_CAIXAS -->
					<tr class="even"> 
						<td class="caixas" colspan="7">
							<div class="bloco-anuncios-em-destaque">
							<!-- BEGIN ANUNCIO_COLUNA -->
			                    <div class="anuncios-em-destaque-coluna-{coluna_class}">
			                    	<!-- BEGIN ANUNCIO_MENOR -->
			                    	<div class="anuncio">
			                        	<div class="estrela {class_fav}">
			                            	<a href="javascript:void();" class="bt-favorito" fav="{id_anuncio}" title="Adicionar aos meus favoritos">Adicionar aos meus favoritos</a>
			                            </div>
			                            <div class="anuncio-imagem">
			                                <!-- BEGIN ANUNCIO_IMAGEM_MENOR -->
			                                <a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{carro}">
			                                	<img src="{live}/media/uploads/anuncio/{url_midia_destaque}" alt="" title="" width="222" height="160" />
			                                </a>
			                                <!-- END ANUNCIO_IMAGEM_MENOR -->
			                            </div>
			                        	<div class="anuncio-dados">
			                            	<div class="anuncio-dados-seta">
			                                	<a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{carro}"><img src="{live}/media/front/img/bt-seta.png" alt="" title="" width="8" height="15" /></a>
			                                </div>
			                                <div class="anuncio-dados-texto">
			                                	<div class="produto"><a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{carro}">{veiculo}</a></div>
			                               		<div class="ano">{ano_modelo}</div>
			                                	<div class="preco">{valor}</div>
			                                </div>
			                                <br class="clear" />
			                                <div class="anuncio-selecao">
			                                    <label class="checkbox checkbox-comparar"><input type="checkbox" name="comparar_carros" value="{id_anuncio}" {checked_comparar}/>Comparar</label>
			                                </div>
			                            </div>
			                        	<br class="clear" />
			                        </div>
			                        <!-- END ANUNCIO_MENOR -->
			                        <!-- BEGIN ANUNCIO_MAIOR -->
			                        <div class="anuncio">
			                        	<div class="estrela {class_fav}">
			                            	<a href="javascript:void();" class="bt-favorito" fav="{id_anuncio}" title="Adicionar aos meus favoritos">Adicionar aos meus favoritos</a>
			                            </div>
			                            <div class="anuncio-imagem">
			                            	<!-- BEGIN ANUNCIO_IMAGEM_MAIOR -->
			                                <a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{carro}">
			                                	<img src="{live}/media/uploads/anuncio/{url_midia_destaque}" alt="" title="" width="300" height="226" />
			                                </a>
			                                <!-- END ANUNCIO_IMAGEM_MAIOR -->
			                            </div>
			                            <div class="anuncio-dados">
			                            	<div class="anuncio-dados-seta">
			                                	<a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{carro}"><img src="{live}/media/front/img/bt-seta.png" alt="" title="" width="8" height="15" /></a>
			                                </div>
			                                <div class="anuncio-dados-texto">
			                                	<div class="produto"><a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{carro}">{veiculo}</a></div>
			                               		<div class="ano">{ano_modelo}</div>
			                                	<div class="preco">{valor}</div>
			                                </div>
			                                <br class="clear" />
			                            </div>
			                            <div class="anuncio-selecao">
			                                <label class="checkbox checkbox-comparar"><input type="checkbox" name="comparar_carros" value="{id_anuncio}" {checked_comparar}/>Comparar</label>
			                            </div>
			                  		</div>
			                        <!-- END ANUNCIO_MAIOR -->
			                    </div>
			                    <!-- BEGIN BLOCO_CLEAR -->
			                    <br class="clear" />
			                    <!-- END BLOCO_CLEAR -->
			                <!-- END ANUNCIO_COLUNA -->
							</div>
						</td>
					</tr>
					<!-- END BOX_CAIXAS -->
                    </tbody>
                </table>
                <div class="bt-comparacao estilo1">
                    <a href="javascript:void(0);" title="Comparar veículos selecionados" id="num-comparar">{num_comparar}</a>
                </div>
                <div class="pagination">
                    <input type="hidden" id="pag_atual" name="pag_atual" value="{pag_atual}" />
                    <ul>
                        <li class="next"><a class="bt-paginacao-ajax" href="javascript:void(0);" alt="PrÃ³xima" pag="{pag_prox}">Próxima</a></li>
                        <li class="prev"><a class="bt-paginacao-ajax" href="javascript:void(0);" alt="Anterior" pag="{pag_ant}">Anterior</a></li>
                        <li>de <strong>{num_total_paginas}</strong></li>
                        <li>
                            <select class="select-style-paginacao-ajax" name="pag">
                                <!-- BEGIN PAGINAS -->
                                <option {pag_selected} value="{pag}">{pag}</option>
                                <!-- END PAGINAS -->
                            </select>
                        </li>
                        <li>Página</li>
                    </ul>
                    <br class="clear" />
                </div>
                <div id="comparacao" class="estilo1">
					<span class="top-left"> <a href="javascript:void(0);">Fechar</a>
					</span> <span class="top-center">&nbsp;</span> <span class="top-right">&nbsp;</span>
					<div class="center-left">
						<div class="center-right">
							<div class="center">
								<ul id="ul-comparar">
										<!-- BEGIN COMPARAR -->
									<li class="li-comparar-{id_comparar}">
										<div class="thumb">
											<img src="{live}{img_comparar}" width="120" height="90" alt="" />
										</div>
										<div class="mask">
											<a href="javascript:void(0);">&nbsp;</a>
										</div> <span class="remove" title="Remova este veículo"><a
											anuncio="{id_comparar}" class="remover-comparar-carro" href="javascript:void(0);">Remover</a> </span>
										<p>
											{veiculo}<br /> <span>{valor}</span>
										</p>
									</li>
									<!-- END COMPARAR -->
									<!-- BEGIN COMPARAR_OFF -->
									<li class="off">
										<div class="thumb">
											<img src="{live}/media/front/img/comparacao-thumb.png" width="120" height="91"
												alt="" />
										</div>
										<p>
											Selecione mais veículos<br />para comparar
										</p>
									</li>
									<!-- END COMPARAR_OFF -->
										</ul>
										<span class="buttons"> 
											<a href="{live}/carros/anuncio/acao/comparar" class="bt-comparar" >
											
											</a>
											<a href="javascript:void(0);"
											title="Limpar" class="bt-limpar">Limpar</a>
										</span> <br class="clear" />
									</div>
								</div>
							</div>
						
							<span class="bottom-left">&nbsp;</span> <span class="bottom-center">&nbsp;</span>
							<span class="bottom-right">&nbsp;</span>
						
						</div>
            		
            </div>
            <div id="coluna-secundaria">
                <div class="filtro">
                    <h3>FILTRAR</h3>
                    <dl>
                        <dt>Preço</dt>
                        <dd>
                            <div class="border">
                                <div id="slider"></div>
                                <input type="hidden" value="{valor_maximo}" id="valor-maximo" name="valor-maximo" />
                                <input type="text" value="{valor_inicial}" id="valor-inicial" name="valor-inicial" class="field-filtro" />
                                <input type="text" value="{valor_final}" id="valor-final" name="valor-final" class="field-filtro" />
                                <input id="valor-submit-filtro" type="submit" value="" class="submit-filtro" />
                                <br class="clear" />
                            </div>
                        </dd>

                        <dt>Localização</dt>
                        <dd>
                            <div class="border">
                                <ul>
                                    <!-- BEGIN FILTRO_CIDADE -->
                                    <li><a href="{link_filtro_cidade}" class="js-link-ajax">{cidade}</a> ({count_cidade})</li>
                                    <!-- END FILTRO_CIDADE -->
                                </ul>
                            </div>
                        </dd>
                        <dt>Estado de Uso</dt>
                        <dd>
                            <div class="border">
                                <ul>
                                    <!-- BEGIN FILTRO_ESTADO_USO -->
                                    <li><a href="{link_filtro_estado_uso}" class="js-link-ajax">{estado_uso}</a> ({count_estado_uso})</li>
                                    <!-- END FILTRO_ESTADO_USO -->
                                </ul>
                            </div>
                        </dd>
                    </dl>
                </div>
            </div>
            <br class="clear" />     
        </div>
    </div>
    <!-- END RESULTADOS -->
    <!-- BEGIN ALERTA -->
    <div class="limite">
            <br class="clear" />
        	<div id="coluna-principal">
				<div id="breadcrumb"><a href="#" title="ABC Classificados">ABC Classificados</a><span>&nbsp;</span><a href="#" title="Carros">Carros</a><span>&nbsp;</span><a href="#" title="Comprar">Comprar</a><span>&nbsp;</span>Resultado da Busca</div>
                <div id="titulo-internas"><h2 title="Sua busca por {categoria}">Sua busca por <strong>{categoria}</strong></h2></div>
                <div class="itens-search">
                    <ul>
                        <!-- BEGIN TERMO_BUSCA_SEM_LINK2 -->
                        <li><span>{termo}</span></li>
                        <!-- END TERMO_BUSCA_SEM_LINK2 -->
                        <!-- BEGIN TERMO_BUSCA2 -->
                        <li>
                            <a href="{termo_link}" title="Remover este Ítem" class="js-link-ajax icon">Remover este Ítem</a>
                            <span>{termo}</span>
                        </li>
                        <!-- END TERMO_BUSCA2 -->
                        <li class="options">
                            <a href="{live}/carros/busca/resultado" title="Limpar">Limpar</a> - <a href="{live}/carros/busca/resultado" title="Nova busca">Nova busca</a>
                        </li>
                    </ul>
                </div>
                <br class="clear" />
                <div id="search-result">
                    <p>Ainda não existem anúncios do veículo que você procura.</p>
                    <div id="alerta" class="box-alerta">
                        <h2>Alerta</h2>
                        <div id="alerta-pd">
                            <p class="intro">Crie um alerta para ser informado caso este veículo que você procura seja anunciado no <br />ABC Carros.</p>
                            <div id="itens">
                                <ul>
                                    <li>Sua busca:</li>
                                    <!-- BEGIN TERMO_BUSCA_SEM_LINK3 -->
                                    <li><span>{termo}</span></li>
                                    <!-- END TERMO_BUSCA_SEM_LINK3 -->
                                    <!-- BEGIN TERMO_BUSCA3 -->
			                        <li>
			                            <a href="{termo_link}" title="Remover este Ítem" class="js-link-ajax icon">Remover este Ítem</a>
			                            <span>{termo}</span>
			                        </li>
			                        <!-- END TERMO_BUSCA3 -->
                                </ul>
                            </div>
                            
                            <!-- BEGIN ALERTA_MSG_NORMAL -->
                            <p class="instrucao">Para criar alertas, você precisa possuir uma conta no ABC Classificados. Após criar o alerta, ele vai estar disponível para visualização ou cancelamento na sua página pessoal, dentro da parte de Alertas. Quando um anúncio criado for compatível com os itens que compõe a sua busca, você será informado através de uma notificação por e-mail e na sua conta pessoal do ABC Classificados.</p>
                            <!-- END ALERTA_MSG_NORMAL -->

                            <!-- BEGIN ALERTA_MSG_LOGADO -->
                            <p class="instrucao">Após criar o alerta, ele vai estar disponível para visualização ou cancelamento na sua página pessoal, dentro da parte de Alertas. Quando um anúncio criado for compatível com os itens que compõe a sua busca, você será informado através de uma notificação por e-mail e na sua conta pessoal do ABC Classificados.</p>
                            <!-- END ALERTA_MSG_LOGADO -->
                            
							<div class="wrapperBotoesBusca">
	                            <div class="bt" id="bt-criar-alerta" segmento="1" url="{url_alerta}">
									<a href="javascript:void(0);" title="Criar alerta">Criar alerta</a>
								</div>
								<div class="nova-busca">
									<a href="{live}/carros/busca/resultado" title="Nova busca">Nova busca</a>
								</div>
							</div>
                        </div>
                    </div>
                    <div id="alerta-sucesso" class="box-alerta" style="display: none;">
                        <h2>Alerta</h2>
                        <div id="alerta-pd">
                            <p class="intro">Você criou um alerta para a seguinte busca:</p>
                            <div id="itens">
                                <ul>
                                    <li>Sua busca:</li>
                                    <!-- BEGIN TERMO_BUSCA_SEM_LINK4 -->
                                    <li><span>{termo}</span></li>
                                    <!-- END TERMO_BUSCA_SEM_LINK4 -->
                                    <!-- BEGIN TERMO_BUSCA4 -->
			                        <li>
			                            <a href="{termo_link}" title="Remover este Ítem" class="js-link-ajax icon">Remover este Ítem</a>
			                            <span>{termo}</span>
			                        </li>
			                        <!-- END TERMO_BUSCA4 -->
                                </ul>
                            </div>
                            <p class="instrucao">Quando um anúncio com estes atributos for publicado, você receberá uma notificação.</p>
                            <div class="acoes">
                            	<a href="{live}/carros/busca/resultado" title="Tentar outra busca">Tentar outra busca</a><br/><br/>
                            	<a href="{live}/minha-conta/acao/alertas" title="Ver todos meus alertas">Ver todos meus alertas</a>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
            <br class="clear" />

        </div>
    <!-- END ALERTA -->
</div>