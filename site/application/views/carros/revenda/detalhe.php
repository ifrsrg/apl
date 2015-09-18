<script src="http://maps.googleapis.com/maps/api/js?key={api_key}&sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="{live}/media/front/js/jquery.ui.map.full.min.js"></script>
<script type="text/javascript" src="{live}/media/front/js/map.js"></script>
<script type="text/javascript" src="{live}/media/front/js/carros/anuncio/box-comparar.js"></script>

<div id="conteudo">
	<div class="limite">
		<br class="clear" />
		<div id="coluna-principal">
			<div id="breadcrumb">
				<a href="{live}" title="ABC Classificados">ABC Classificados</a><span>&nbsp;</span>
				<a href="{live}/carros" title="Carros">Carros</a><span>&nbsp;</span>
				Revendas
			</div>
			<br class="clear" />

			<div id="perfil-cliente">
				<div class="thumb">
					<img src="{live}/media/uploads/parceiro/{logotipo}" alt="" width="90" height="90" />
				</div>
				<div class="data">
					<h6>{nome}</h6>
					<span class="n-anuncios"><a href="{live}/carros/revenda/acao/ver/id/{id_revenda}"
						title="{num_anuncios} anúncio{plural_anuncios}">{num_anuncios_revenda} anúncio{plural_anuncios_revenda} »</a>
					</span>
					<br class="clear" />
					<address>
						{endereco}<br />
						{cidade} - {estado}<br />
						Telefone: <strong>{telefone}</strong>
					</address>
					<!-- BEGIN NAO_EXIBIR -->
					<span class="btn"><a href="javascript:void(0);" title="Enviar uma proposta">Enviar uma proposta</a></span>
					<!-- END NAO_EXIBIR -->
					<br class="clear" />
				</div>
				<div class="map" id="map" lat="{lat}" lng="{lng}" zoom="15">

	            </div>
				<br class="clear" />
			</div>
			<br class="clear" />
			<div class="layout-search">
				<ul>
					<li class="box {box_on}"><a href="{url_caixas}"
						title="Visualizar anúncios em caixas">&nbsp;</a></li>
					<li class="list {list_on}"><a href="{url_lista}"
						title="Visualizar anúncios em lista">&nbsp;</a></li>
				</ul>
				<span>Foram encontrados <strong>{num_anuncios}</strong> anúncio{plural_anuncios}</span>
			</div>
			<br class="clear" />
			<table cellpadding="0" cellspacing="0" class="table-default">
				<thead>
					<tr>
                            <th width="31%" colspan="3" class="first {ordem_veiculo} {active_veiculo}">
                                <a href="javascript:void(0);" class="js-ordenacao" lang="veiculo">Veículo</a>
                            </th>
                            <th width="16%" class="{ordem_valor} {active_valor}">
                                <a href="javascript:void(0);" class="js-ordenacao" lang="valor">Preço</a>
                            </th>
                            <th width="11%" class="{ordem_ano_modelo} {active_ano_modelo}">
                                <a href="javascript:void(0);" class="js-ordenacao" lang="ano_modelo">Ano</a>
                            </th>
                            <th width="21%" class="{ordem_veiculo_estado_de_uso} {active_veiculo_estado_de_uso}">
                                <a href="javascript:void(0);" class="js-ordenacao" lang="veiculo_estado_de_uso">Estado de Uso</a>
                            </th>
                            <th width="21%" class="last {ordem_cidade} {active_cidade}">
                                <a href="javascript:void(0);" class="js-ordenacao" lang="cidade">Localização</a>
                            </th>
                        </tr>
				</thead>
				<tbody>
					<!-- BEGIN VAZIO -->
					<tr>
						<td colspan="7">							Nenhúm anúncio encontrado.
						</td>
					</tr>
					<!-- END VAZIO -->
					<!-- BEGIN BOX_CAIXAS -->
					<tr class="even">
						<td class="caixas" colspan="7">							<div class="bloco-anuncios-em-destaque">
							<!-- BEGIN ANUNCIO_COLUNA -->
			                    <div class="anuncios-em-destaque-coluna-{coluna_class}">
			                    	<!-- BEGIN ANUNCIO_MENOR -->
			                    	<div class="anuncio">
			                        	<div class="estrela {fav_class}">
			                            	<a href="javascript:void();" class="bt-favorito" fav="{id_anuncio}" title="Adicionar aos meus favoritos">Adicionar aos meus favoritos</a>
			                            </div>
			                            <div class="anuncio-imagem">
			                                <!-- BEGIN ANUNCIO_IMAGEM_MENOR -->
			                                <img src="{live}/media/uploads/anuncio/{url_midia}" alt="" title="" width="222" height="160" />
			                                <!-- END ANUNCIO_IMAGEM_MENOR -->
			                            </div>
			                        	<div class="anuncio-dados">
			                            	<div class="anuncio-dados-seta">
			                                	<a href="#" title=""><img src="{live}/media/front/img/bt-seta.png" alt="" title="" width="8" height="15" /></a>
			                                </div>
			                                <div class="anuncio-dados-texto">
			                                	<div class="produto"><a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{carro}">{carro}</a></div>
			                               		<div class="ano">{ano}</div>
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
			                        	<div class="estrela {fav_class}">
			                            	<a href="javascript:void();" class="bt-favorito" fav="{id_anuncio}" title="Adicionar aos meus favoritos">Adicionar aos meus favoritos</a>
			                            </div>
			                            <div class="anuncio-imagem">
			                            	<!-- BEGIN ANUNCIO_IMAGEM_MAIOR -->
			                                <img src="{live}/media/uploads/anuncio/{url_midia}" alt="" title="" width="300" height="226" />
			                                <!-- END ANUNCIO_IMAGEM_MAIOR -->
			                            </div>
			                            <div class="anuncio-dados">
			                            	<div class="anuncio-dados-seta">
			                                	<a href="#" title=""><img src="{live}/media/front/img/bt-seta.png" alt="" title="" width="8" height="15" /></a>
			                                </div>
			                                <div class="anuncio-dados-texto">
			                                	<div class="produto"><a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{carro}">{carro}</a></div>
			                               		<div class="ano">{ano}</div>
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
					<!-- BEGIN CARRO -->
					<tr>
						<td class="options">
							<ul>
                                <li class="favorito {class_fav}"><a class="bt-favorito" fav="{id_anuncio}" href="javascript:void(0);">Favorito</a></li>
                                <li class="checkbox checkbox-comparar"><input type="checkbox" name="comparar_carros" value="{id_anuncio}" {checked_comparar} /></li>
							</ul>
                        </td>
						<td class="image {active_veiculo}">
							<div class="thumb">
								<!-- BEGIN ANUNCIO_IMAGEM_LISTA -->
								<img src="{live}/media/uploads/anuncio/{url_midia}" alt="{carro}" width="60" height="45" />
								<!-- END ANUNCIO_IMAGEM_LISTA -->
							</div>
							<div class="mask">
								<a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{carro}">{carro}</a>
							</div>
						</td>
						<td class="{active_veiculo}">
							<div class="title">
								<a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{carro}">{carro}</a>
							</div>
							<div>{nome}</div>
							<div class="phone">
								<a href="javascript:void(0);" title="Ver telefone">Ver telefone</a>
							</div>
						</td>
						<td class="{active_valor}">{valor}</td>
						<td class="{active_ano_fabricacao}">{ano}</td>
						<td class="{active_veiculo_estado_de_uso}">{veiculo_estado_de_uso}</td>
						<td class="last {active_cidade}">{cidade}</td>
					</tr>
					<!-- END CARRO -->
				</tbody>
			</table>
			<div class="bt-comparacao estilo1">
                <a href="javascript:void(0);" title="Comparar veículos selecionados" id="num-comparar">{num_comparar}</a>
            </div>
			{paginacao}
			<div id="comparacao">
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
								<a href="{live}/carros/anuncio/acao/comparar">
								<input type="button" value=""
								class="bt-comparar" />
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
		<div id="coluna-secundaria" class="revenda">
			<div class="filtro">
				<h3>FILTRAR</h3>
				<dl>
					<dt>Preço</dt>
                        <dd>
                            <div class="border">
                                <script type="text/javascript">
                        			$(function() {
                                		$( '#slider' ).slider({
                                			orientation: 'horizontal',
                                			range: true,
                                			values: [ $('#slider').attr('smin'), $('#slider').attr('smax') ],
                                			slide: function( event, ui ) {
                                    			valor = ui.values[0] == 0 ? '-' : Math.floor((ui.values[0]/100)*($('#slider').attr('maximo')/1000)) + ' mil';
                                				$( '#valor-inicial' ).val( valor );

												valor = ui.values[1] == 0 ? '-' : Math.floor((ui.values[1]/100)*($('#slider').attr('maximo')/1000)) + ' mil';
                                				$( '#valor-final' ).val( valor );
                                			}
                                		});

                                		if($('#slider').attr('loaded') == 1) {
                                			values = $('#slider').slider("option", "values");

                                			valor = values[0] == 0 ? '-' : Math.floor((values[0]/100)*($('#slider').attr('maximo')/1000)) + ' mil';
                            				$( '#valor-inicial' ).val( valor );

											valor = values[1] == 0 ? '-' : Math.floor((values[1]/100)*($('#slider').attr('maximo')/1000)) + ' mil';
                            				$( '#valor-final' ).val( valor );
                                		} else {
	                                		$( '#valor-inicial' ).val( 'de' );
	                                		$( '#valor-final' ).val( 'até' );
                                		}

                                		$('.submit-filtro').click(function(){
											porcentagem = $('#slider').slider("option", "values");
											maximo = $('#slider').attr('maximo');

											value = Math.floor(((porcentagem[0]/100)*maximo)/1000)+'|'+Math.floor(((porcentagem[1]/100)*maximo)/1000);

							                window.location.href = addUrlVar('preco', value);
							        	});
                                	});
                        		</script>
                                <div id="slider" maximo="{max}" smin="{smin}" smax="{smax}" loaded="{sloaded}"></div>
                                <input type="text" value="de" id="valor-inicial" name="valor-inicial" class="field-filtro" disabled="disabled" />
                                <input type="text" value="ate" id="valor-final" name="valor-final" class="field-filtro" disabled="disabled" />
                                <input type="submit" value="" class="submit-filtro" />
                                <br class="clear" />
                            </div>
                        </dd>

                                    <dt>Localização</dt>
                                    <dd>
                                            <div class="border">
                                                    <ul>
                                                            <!-- BEGIN FILTRO_CIDADE -->
                                                            <li><a href="{url_filtro}">{nome_filtro}</a> ({count})</li>
                                                            <!-- END FILTRO_CIDADE -->
                                                    </ul>
                                            </div>
                                    </dd>

                                    <dt>Estado de Uso</dt>
                                    <dd>
                                            <div class="border">
                                                    <ul>
                                                            <!-- BEGIN FILTRO_ESTADO_DE_USO -->
                                                            <li><a href="{url_filtro}">{nome_filtro}</a> ({count})</li>
                                                            <!-- END FILTRO_ESTADO_DE_USO -->
                                                    </ul>
                                            </div>
                                    </dd>

				</dl>
			</div>
		</div>
		<br class="clear" />
	</div>
</div>