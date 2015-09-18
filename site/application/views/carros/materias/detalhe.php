<script type="text/javascript" src="{live}/media/front/js/materias/detalhe.js"></script>
<div id="conteudo">
<div class="limite">
            <br class="clear" />
        	<div id="coluna-principal">
				<div id="breadcrumb">
					<a href="{live}" title="ABC Classificados">ABC Classificados</a><span>&nbsp;</span>
					<a href="{live}/carros" title="ABC Carros">ABC Carros</a><span>&nbsp;</span>
					<a href="{live}/carros/materias" title="Matérias">Matérias</a><span>&nbsp;</span>
					Todas
				</div>
                <div class="materia">
                    <div class="title">
                        <h3 class="title-materia">{titulo}</h3>
                        <p class="lead">{subtitulo}</p>
                        <p class="date">{data}  -  <a href="{live}/carros/materias/acao/lista/id/{id_categoria}">{categoria}</a></p>
                    </div>
                    {share}
                    <!-- BEGIN GALERIA -->
                    <div class="galeria">
                        <div class="visualizacao">
                        	<img id="box-img" src="{live}/media/uploads/materia/{url_midia_destaque}" width="460" alt="" style="{style_img}" />
                        	<iframe id="box-video" src="http://www.youtube.com/embed/{video_id}" frameborder="0" width="460" height="345" style="{style_video}">&nbsp;</iframe>
                        </div>
                        <div class="lista-galeria">
                            <div class="nav-prev nav-list">Anterior</div>
                            <div class="list">
                                <ul>
                                	<!-- BEGIN GALERIA_IMAGEM -->
                                	<li><a href="javascript:void(0);" title=""><img class="img-galeria" tipo="I" src="{live}/media/uploads/materia/{url_midia}" width="120" height="90" alt="" /></a></li>
                                	<!-- END GALERIA_IMAGEM -->
                                	<!-- BEGIN GALERIA_VIDEO -->
                                	<li><a href="javascript:void(0);" title=""><img class="img-galeria" tipo="V" vid="{video_id}" src="{url_video}" width="120" height="90" alt="" /></a></li>
                                	<!-- END GALERIA_VIDEO -->
                                </ul>
                        	</div>
                        	<div class="nav-next nav-list">Próximo</div>
                        	<br class="clear" />
                        </div>
                    </div>
                    <!-- END GALERIA -->
                    {texto}
                </div>
                <div class="separador-horizontal"></div>
                <div class="bloco-materias-recentes">
                	<div class="link-titulo-bloco"><a href="{live}/carros/materias/acao/lista" title="Ver todas matérias">Ver todas matérias &raquo;</a></div>
                    <h2 title="Mais matérias">Mais <strong>Matérias</strong></h2>
                    <br class="clear" />
                    <!-- BEGIN MATERIA_RECENTE -->
                    <div class="materia-recente {recente_class}">
                        <a href="{live}/carros/materias/acao/ver/id/{recente_id}" title="{recente_titulo}"><img src="{live}/media/uploads/materia/{recente_midia}" alt="{recente_titulo}" title="{recente_titulo}" width="218" height="158" /></a>
                        <a href="{live}/carros/materias/acao/ver/id/{recente_id}" title="{recente_titulo}" class="titulo-chamada">{recente_titulo}</a>
                     	<p>{recente_subtitulo}</p>
                    </div>
                    <!-- END MATERIA_RECENTE -->
                  <br class="clear" />
                </div>

                <div class="separador-horizontal"></div>

				<!-- BEGIN ANUNCIOS_RELACIONADOS -->
                <div class="bloco-anuncios-em-destaque bloco-materias-recentes">
                    <div class="link-titulo-bloco"><a href="{live}/carros" title="Ver mais anúncios">Ver mais anúncios &raquo;</a></div>
                    <h2 title="ABC Carros">ABC <strong>Carros</strong></h2>
                    <br class="clear" />
                    <div class="anuncios-em-destaque-coluna-maior left">
                    	<!-- BEGIN ANUNCIO_MENOR -->
                    	<div class="anuncio">
                        	<div class="estrela {fav_class}">
                            	<a href="javascript:void();" class="bt-favorito" fav="{id_anuncio}" title="Adicionar aos meus favoritos">Adicionar aos meus favoritos</a>
                            </div>
                            <div class="anuncio-imagem">
                            	<a href="{live}/carros/anuncios/acao/ver/id/{id_anuncio}" title="{veiculo}">
                              		<img src="{live}/media/uploads/anuncio/{url_midia}" alt="" title="" width="222" height="160" />
                            	</a>
                            </div>
                        	<div class="anuncio-dados">
                            	<div class="anuncio-dados-seta">
                                	<a href="{live}/carros/anuncios/acao/ver/id/{id_anuncio}" title="{veiculo}"><img src="{live}/media/front/img/bt-seta.png" alt="" title="" width="8" height="15" /></a>
                                </div>
                                <div class="anuncio-dados-texto">
                                	<div class="produto"><a href="{live}/carros/anuncios/acao/ver/id/{id_anuncio}" title="{veiculo}">{veiculo}</a></div>
                               		<div class="ano">{ano_fabricacao}</div>
                                	<div class="preco">{valor}</div>
                                </div>
                                <br class="clear" />
                                <div class="anuncio-selecao">
                                    &nbsp;
                                </div>
                            </div>
                        	<br class="clear" />
                        </div>
                        <!-- END ANUNCIO_MENOR -->
                    </div>
                    <div class="anuncios-em-destaque-coluna-menor">
                        <!-- BEGIN ANUNCIO_MAIOR -->
                        <div class="anuncio">
                        	<div class="estrela {fav_class}">
                            	<a href="javascript:void();" class="bt-favorito" fav="{id_anuncio}" title="Adicionar aos meus favoritos">Adicionar aos meus favoritos</a>
                            </div>
                            <div class="anuncio-imagem">
                                <a href="{live}/carros/anuncios/acao/ver/id/{id_anuncio}" title="{veiculo}">
                                	<img src="{live}/media/uploads/anuncio/{url_midia}" alt="" title="" width="300" height="226" />
                            	</a>
                            </div>
                            <div class="anuncio-dados">
                            	<div class="anuncio-dados-seta">
                                	<a href="{live}/carros/anuncios/acao/ver/id/{id_anuncio}" title="{veiculo}"><img src="{live}/media/front/img/bt-seta.png" alt="" title="" width="8" height="15" /></a>
                                </div>
                                <div class="anuncio-dados-texto">
                                	<div class="produto"><a href="{live}/carros/anuncios/acao/ver/id/{id_anuncio}" title="{veiculo}">{veiculo}</a></div>
                               		<div class="ano">{ano_fabricacao}</div>
                                	<div class="preco">{valor}</div>
                                </div>
                                <br class="clear" />
                            </div>
                            <div class="anuncio-selecao">
                                &nbsp;
                            </div>
                  		</div>
                  		<!-- END ANUNCIO_MAIOR -->
                    </div>
                    <br class="clear" />
                </div>
                <!-- END ANUNCIOS_RELACIONADOS -->

            </div>
            <div id="coluna-secundaria">
                <div class="publicidade-secundaria">
                	<!-- "ABC_Carros160x600A" (section "ABC_Carros") -->
<script type="text/javascript" src="http://eas21.emediate.eu/eas?cu=17889;cre=mu;js=y;target=_blank"></script>
<noscript>
<a target="_blank" href="http://eas21.emediate.eu/eas?cu=17889;ty=ct"><img src="http://eas21.emediate.eu/eas?cu=17889;cre=img" alt="EmediateAd" width="160" height="600" style="border:0px"/></a>
</noscript>
</div>
                <div class="publicidade-secundaria">
                	<!-- "ABC_Carros160x140" (section "ABC_Carros") -->
<script type="text/javascript" src="http://eas21.emediate.eu/eas?cu=18008;cre=mu;js=y;target=_blank"></script>
<noscript>
<a target="_blank" href="http://eas21.emediate.eu/eas?cu=18008;ty=ct"><img src="http://eas21.emediate.eu/eas?cu=18008;cre=img" alt="EmediateAd" width="160" height="140" style="border:0px"/></a>
</noscript>
</div>
            </div>
            <br class="clear" />
        </div>
        </div>