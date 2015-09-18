<link rel="stylesheet" type="text/css" href="{live}/media/front/css/detalhes.css" media="all" />
<link rel="stylesheet" type="text/css" href="{live}/media/front/css/jquery.lightbox.css" media="all" />

<script type="text/javascript" src="{live}/media/front/js/jquery.lightbox.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key={api_key}&sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="{live}/media/front/js/jquery.ui.map.full.min.js"></script>
<script type="text/javascript" src="{live}/media/front/js/jquery.limit-1.2.source.js"></script>
<script type="text/javascript" src="{live}/media/front/js/map.js"></script>
<script type="text/javascript" src="{live}/media/front/js/anuncio/detalhe.js"></script>

<div id="conteudo" class="themes-detalhes-carro">
	<div class="limite">
            <br class="clear" />
        	<div id="coluna-principal">
				<div id="breadcrumb">
					<a href="{live}" title="ABC Classificados">ABC Classificados</a><span>&nbsp;</span>
					<a href="{live}/carros" title="Carros">Carros</a><span>&nbsp;</span>
					<a href="javascript:void(0);" title="Comprar">Comprar</a><span>&nbsp;</span>
					{marca} {modelo}
				</div>
                <div class="options-list">
                    <ul>
                        <!-- BEGIN HIDE_BLOCK_DENUNCIA --><li class="denunciar"><a href="javascript:void(0);" title="Denunciar">Denunciar</a></li><!-- END HIDE_BLOCK_DENUNCIA -->
                        <li class="imprimir"><a href="javascript:window.print();" title="Imprimir">Imprimir</a></li>
                    </ul>
                    <br class="clear" />
                </div>
                <br class="clear" />

                <!-- BEGIN PERFIL_REVENDA -->
                <div id="perfil-cliente">
                    <!-- BEGIN LOGOTIPO -->
                    <div class="thumb"><img src="{live}/media/uploads/parceiro/{url_logotipo}" alt="" width="90" height="90" /></div>
                    <!-- END LOGOTIPO -->
                    <div class="data">
                        <h6>{nome}</h6>
                        <span class="n-anuncios"><a href="{live}/carros/revenda/acao/ver/id/{id_cliente}" title="{num_anuncios} anúncio{plural_anuncios}">{num_anuncios} anúncio{plural_anuncios} »</a></span>
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
                <!-- END PERFIL_REVENDA -->

                <!-- BEGIN PERFIL_CLIENTE -->
                <div id="perfil-cliente">
                    <div class="data largura460">
                        <h6>{nome}</h6>
                        <br class="clear" />
                        <address>
                            {cidade} - {estado}<br />
                        </address>
                        <!-- BEGIN HIDE_BOTAO --><span class="btn f-right"><a href="javascript:void(0);" title="Enviar uma proposta">Enviar uma proposta</a></span><!-- END HIDE_BOTAO -->
                    </div>
                    <div class="map" lat="{lat}" lng="{lng}" zoom="10">

                    </div>
                    <br class="clear" />
                </div>
                <!-- END PERFIL_CLIENTE -->

                <h3 class="tlt">{modelo}</h3>
                <br class="clear" />
				<p class="valor">{valor}</p>

				<div class="col-indicar">
					<span > Indicar a um amigo: </span>
					{share}
				</div>

				     <div class="galeria">
                        <div class="estrela {fav_class}">
                            <a href="javascript:void();" class="bt-favorito" fav="{id_anuncio}" title="Adicionar aos meus favoritos">Adicionar aos meus favoritos</a>
                        </div>
                        <div class="visualizacao">
                        	<a href="{live}/media/uploads/anuncio/{url_midia_destaque}" style="display:block;" class="noLightbox centralizar" rel="lightbox[galery01]">
                        		<span></span>
                                <img id="box-img" src="{live}/media/uploads/anuncio/{url_midia_destaque}" alt="" style="{style_img}" />
                        	</a>
                            <iframe id="box-video" src="http://www.youtube.com/embed/{video_id}" frameborder="0" width="460" height="345" style="{style_video}">&nbsp;</iframe>
                        </div>
                        <div class="comparar anuncio-selecao">
                            <label class="checkbox-comparar checkbox {comparar_check_class}"><input type="checkbox" name="comparar_carros" value="{id_anuncio}" {comparar_checked}>Comparar</label>
                        </div>
                    </div>

                      <div class="lista-galeria">
                            <div class="nav-prev nav-list">Anterior</div>
                            <div class="list">
                                <ul>
                                	<!-- BEGIN GALERIA_IMAGEM -->
                                	<li><a href="{live}/media/uploads/anuncio/{url_midia}" class="img-galeria" title="" rel="lightbox[galery01]"><img tipo="I" src="{live}/media/uploads/anuncio/{url_midia}" width="120" height="90" alt="" /></a></li>
                                	<!-- END GALERIA_IMAGEM -->
                                	<!-- BEGIN GALERIA_VIDEO -->
                                	<li>
                                            <a href="javascript:void(0);" title="">
                                                <img class="bt-play-video img-galeria" tipo="V" vid="{video_id}" src="{live}/media/front/img/classificados/bt_play.png" />
                                                <img class="img-galeria" tipo="V" vid="{video_id}" src="{url_video}" width="120" height="90" alt="" />
                                            </a>
                                        </li>
                                	<!-- END GALERIA_VIDEO -->
                                </ul>
                        	</div>
                        	<div class="nav-next nav-list">Próximo</div>
                        	<br class="clear" />
                        </div>

                <div class="anuncio-left">

 					<table>
                        <!-- BEGIN CAMPO -->
                        <tr>
                            <td width="30%" class="title">{campolabel}</td>
                            <td width="70%">{campovalor}</td>
                        </tr>
                        <!-- END CAMPO -->
                    </table>

                    <br class="clear" />


                </div>
                <div class="anuncio-right">
					<h3>Informações <strong>adicionais</strong></h3>
                    <p>{descricao}</p>
					<br class="clear mb15" />

					<h3><strong>ítens</strong> opcionais</h3>
                    <ul class="detalhes">
                        <!-- BEGIN ACESSORIO -->
                        <li>{acessorio}</li>
                        <!-- END ACESSORIO -->
                    </ul>
                    <br class="clear" />

                </div>
                <br class="clear" />

                <div class="separador-horizontal"></div>

				{form_proposta}
				<br class="clear" />

				<div class="separador-horizontal"></div>

				<!-- BEGIN RELACIONADOS -->
                <div class="bloco-materias-recentes">
                    <h2 title="Outras sugestões">Outras <strong>Ofertas</strong></h2>
                    <br class="clear" />
                    <div class="slider-sugestoes">
                        <div class="sugestoes-prev nav-list">Anterior</div>
                        <div class="list">
                            <ul>
                            	<!-- BEGIN RELACIONADO -->
                            	<li>
                                    <div class="thumb"><a href="{live}/carros/anuncio/acao/ver/id/{relacionado_id}" title=""><img src="{live}/media/uploads/anuncio/{img_relacionado}" alt="" width="120" height="90" /></a></div>
                                    <div class="data">
                                        <h5><a href="{live}/carros/anuncio/acao/ver/id/{relacionado_id}">{relacionado_modelo}</a></h5>
                                        <p>{relacionado_ano}</p>
                                        <p><strong>{relacionado_valor}</strong></p>
                                    </div>
                                    <div class="options">
                                        <span class="favorito {relacionado_favorito} {fav_class}"><a href="javascript:void(0);" class="bt-favorito" fav="{id_anuncio}">Favorito</a></span>

                                    </div>
                                </li>
                                <!-- END RELACIONADO -->
                            </ul>
                    	</div>
                    	<div class="sugestoes-next nav-list">Próximo</div>
                    	<br class="clear" />
                        <script type="text/javascript">
                            //SLIDER
                            $('.slider-sugestoes .list').jCarouselLite({
                                btnNext: '.sugestoes-next',
                                btnPrev: '.sugestoes-prev',
                                scroll: 1,
                                speed: 500,
                                circular: false
                            });
                        </script>
                    </div>

                  <br class="clear" />
                </div>
                <div class="separador-horizontal"></div>
				<!-- END RELACIONADOS -->

                <div class="bloco-materias-recentes">
                	<div class="link-titulo-bloco"><a href="{live}/carros/materias/acao/lista" title="Ver mais matérias">Ver mais matérias &raquo;</a></div>
                    <h2 title="Matérias Recentes">Matérias <strong>Recentes</strong></h2>
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
            </div>
            <div id="coluna-secundaria">
                <div class="publicidade-secundaria">
                     <!-- "ABC_Carros160x600A" (section "ABC_Carros") --><script type="text/javascript" src="http://eas21.emediate.eu/eas?cu=17889;cre=mu;js=y;target=_blank"></script>
                    <noscript><a target="_blank" href="http://eas21.emediate.eu/eas?cu=17889;ty=ct"><img src="http://eas21.emediate.eu/eas?cu=17889;cre=img" alt="EmediateAd" width="160" height="600" style="border:0px"/></a></noscript>
                </div>
                <div class="publicidade-secundaria">
                     <!-- "ABC_Carros160x600B" (section "ABC_Carros") --><script type="text/javascript" src="http://eas21.emediate.eu/eas?cu=19915;cre=mu;js=y;target=_blank"></script>
                     <noscript><a target="_blank" href="http://eas21.emediate.eu/eas?cu=19915;ty=ct"><img src="http://eas21.emediate.eu/eas?cu=19915;cre=img" alt="EmediateAd" width="160" height="600" style="border:0px"/></a></noscript>
                </div>
            </div>
            <br class="clear" />
        </div>
        </div>