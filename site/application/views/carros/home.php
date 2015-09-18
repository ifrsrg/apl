    <div id="conteudo">
        <div class="limite">
            <div id="coluna-principal">
				<div class="bloco-revendas">
                	<div class="link-titulo-bloco"><a href="{live}/carros/revenda/acao/lista" title="Ver mais">Ver mais &raquo;</a></div>
                	<h2 title="Revendas">Revendas</h2>
                	<br class="clear" />
                    <div class="lista-revendas">
                        <div class="nav-prev nav-list">Anterior</div>
                        <div class="list">
                            <ul>
                            	<!-- BEGIN REVENDA -->
                            	<li>
                                	<a href="{live}/carros/revenda/acao/ver/id/{parceiro_id}" title="">
                                    	<img src="{live}/media/uploads/parceiro/{logotipo}" alt="{parceiro}" title="{parceiro}" width="90" height="90" />
                                    	{parceiro}
                                    </a>
                                </li>
                                <!-- END REVENDA -->
                            </ul>
                    	</div>
                    	<div class="nav-next nav-list">Próximo</div>
                    	
                        <script type="text/javascript">
                            //SLIDER
                            $('.lista-revendas').jCarouselLite({
                                btnNext: '.nav-next',
                                btnPrev: '.nav-prev',
                                scroll: 1,
                                speed: 1000,
                                visible: 7,
                                circular: false
                            });
                        </script>
                    </div>
                </div>
                <br class="clear" />
                <div class="separador-horizontal"></div>
            	<div class="bloco-anuncios-em-destaque">
                	<h2 title="Anúncios em Destaque">Anúncios em <strong>Destaque</strong></h2>
                    <!-- BEGIN ANUNCIO_COLUNA -->
                    <!-- BEGIN BLOCO_PUBLICIDADE -->
                    <div class="bloco-publicidade-conteudo">
                        <div class="publicidade-conteudo">
                            <!-- "ABC_Carros728x90" (section "ABC_Carros") -->
<script type="text/javascript" src="http://eas21.emediate.eu/eas?cu=17890;cre=mu;js=y;target=_blank"></script>
<noscript>
<a target="_blank" href="http://eas21.emediate.eu/eas?cu=17890;ty=ct"><img src="http://eas21.emediate.eu/eas?cu=17890;cre=img" alt="EmediateAd" width="728" height="90" style="border:0px"/></a>
</noscript>
</div>    
                    </div>
                    <!-- END BLOCO_PUBLICIDADE -->
                    <div class="anuncios-em-destaque-coluna-{coluna_class}">
                    	<!-- BEGIN ANUNCIO_MENOR -->
                    	<div class="anuncio">
                        	<div class="estrela {fav_class}">
                            	<a href="javascript:void();" class="bt-favorito" fav="{id_anuncio}" title="Adicionar aos meus favoritos">Adicionar aos meus favoritos</a>
                            </div>
                            <div class="anuncio-imagem">
                            	<a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{anuncio_veiculo}">
                                	<img src="{live}/media/uploads/anuncio/{anuncio_img}" alt="" title="" width="222" height="160" />
                            	</a>
                            </div>
                        	<div class="anuncio-dados">
                            	<div class="anuncio-dados-seta">
                                	<a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{anuncio_veiculo}"><img src="{live}/media/front/img/bt-seta.png" alt="" title="" width="8" height="15" /></a>
                                </div>
                                <div class="anuncio-dados-texto">
                                	<div class="produto"><a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{anuncio_veiculo}">{anuncio_veiculo}</a></div>
                               		<div class="ano">{anuncio_ano}</div>
                                	<div class="preco">{anuncio_valor}</div>
                                </div>
                                <br class="clear" />
                                <div class="anuncio-selecao">
                                    &nbsp;
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
                            	<a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{anuncio_veiculo}">
                                	<img src="{live}/media/uploads/anuncio/{anuncio_img}" alt="" title="" width="300" height="226" />
                            	</a>
                            </div>
                            <div class="anuncio-dados">
                            	<div class="anuncio-dados-seta">
                                	<a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{anuncio_veiculo}"><img src="{live}/media/front/img/bt-seta.png" alt="" title="" width="8" height="15" /></a>
                                </div>
                                <div class="anuncio-dados-texto">
                                	<div class="produto"><a href="{live}/carros/anuncio/acao/ver/id/{id_anuncio}" title="{anuncio_veiculo}">{anuncio_veiculo}</a></div>
                               		<div class="ano">{anuncio_ano}</div>
                                	<div class="preco">{anuncio_valor}</div>
                                </div>
                                <br class="clear" />
                            </div>
                            <div class="anuncio-selecao">
                                &nbsp;
                            </div>
                  		</div>
                        <!-- END ANUNCIO_MAIOR -->
                    </div>
                    <!-- BEGIN BLOCO_CLEAR -->
                    <br class="clear" />
                    <!-- END BLOCO_CLEAR -->
                    <!-- END ANUNCIO_COLUNA -->                      
                </div>
                <div class="separador-horizontal"></div>
                <div class="bloco-materias-recentes">
                	<div class="link-titulo-bloco"><a href="{live}/carros/materias/acao/lista" title="Ver mais matérias">Ver mais matérias &raquo;</a></div>
                    <h2 title="Matérias Recentes">Matérias <strong>Recentes</strong></h2>
                    <br class="clear" />
                    <!-- BEGIN MATERIA_RECENTE -->
                    <div class="materia-recente {materia_class}">
                        <a href="{live}/carros/materias/acao/ver/id/{id_materia}" title="{titulo}"><img src="{live}/media/uploads/materia/{url_midia}" alt="{titulo}" title="{titulo}" width="218" height="158" /></a>
                        <a href="{live}/carros/materias/acao/ver/id/{id_materia}" title="{titulo}" class="titulo-chamada">{titulo}</a>
                     	<p>{subtitulo}</p>
                    </div>
                    <!-- END MATERIA_RECENTE -->
                  <br class="clear" />
                </div>
            </div>
            <div id="coluna-secundaria">
                <div class="publicidade-secundaria">
                    <!-- "ABC_Carros160x600A" (section "ABC_Carros") --><script type="text/javascript" src="http://eas21.emediate.eu/eas?cu=17889;cre=mu;js=y;target=_blank"></script>
                    <noscript><a target="_blank" href="http://eas21.emediate.eu/eas?cu=17889;ty=ct"><img src="http://eas21.emediate.eu/eas?cu=17889;cre=img" alt="EmediateAd" width="160" height="600" style="border:0px"/></a></noscript>
                </div>
                <div class="publicidade-secundaria">
                     <!-- "ABC_Carros160x140" (section "ABC_Carros") --><script type="text/javascript" src="http://eas21.emediate.eu/eas?cu=18008;cre=mu;js=y;target=_blank"></script>
                     <noscript><a target="_blank" href="http://eas21.emediate.eu/eas?cu=18008;ty=ct"><img src="http://eas21.emediate.eu/eas?cu=18008;cre=img" alt="EmediateAd" width="160" height="140" style="border:0px"/></a></noscript>
                </div>
            </div>
            <br class="clear" />
        </div>
    </div>