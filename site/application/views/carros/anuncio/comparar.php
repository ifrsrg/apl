<script type="text/javascript" src="{live}/media/front/js/carros/anuncio/comparar.js"></script>

<div id="conteudo">
<div class="limite">
            <br class="clear" />
            <div id="main">
				<div id="breadcrumb">
					<a href="{live}" title="ABC Classificados">ABC Classificados</a><span>&nbsp;</span>
					<a href="{live}/carros" title="Carros">Carros</a><span>&nbsp;</span>
					Comparar
				</div>
                <div id="titulo-internas"><h2>Comparação de <strong>anúncios</strong></h2></div>

                <table class="comparacao">
                    <thead>
                        <tr>
                            <th width="167"></th>
                            <!-- BEGIN OPCOES -->
                            <th class="td{id_anuncio}">
                                <ul class="ul-comparacao">
                                    <li class="remove" anuncio="{id_anuncio}"><a href="javascript:void(0);" title="Remover da tabela de comparação">Remover da tabela de comparação</a></li>
                                    <li class="favorito {class_fav}"><a href="javascript:void(0);" class="bt-favorito" fav="{id_anuncio}" title="Adicionar aos meus favoritos">Adicionar aos meus favoritos</a></li>
                                </ul>
                            </th>
                            <!-- END OPCOES -->
                        </tr>
                        <tr class="thumb">
                            <th><img src="{live}/media/front/img/img-compara.jpg" /></th>
                            <!-- BEGIN IMG -->
                            <th class="td{id_anuncio}">
                                <div><img src="{live}/media/uploads/anuncio/{url_midia}" width="197" height="148" alt="Spin" /></div>
                            </th>
                            <!-- END IMG -->
                        </tr>
                        <tr class="modelo">
                            <th><a href="{urlVoltar}"><img src="{live}/media/front/img/bt-compara-outros.jpg" /></a></th>
                            <!-- BEGIN VEICULO -->
                            <th class="td{id_anuncio}"><a href="">{marca}<br /><span>{modelo}</a></span></th>
                            <!-- END VEICULO -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="valor">
                            <td class="even first">Valor</td>
                            <!-- BEGIN VALOR -->
                            <td class="{classe} td{id_anuncio}">{valor}</td>
                            <!-- END VALOR -->
                        </tr>
                        <tr>
                            <td class="even first">Tipo de Veículo</td>
                            <!-- BEGIN ESTADO_DE_USO -->
                            <td class="{classe} td{id_anuncio}">{estado_uso}</td>
                            <!-- END ESTADO_DE_USO -->
                        </tr>
                        <tr>
                            <td class="even first">Ano do Modelo</td>
                            <!-- BEGIN ANO_MODELO -->
                            <td class="{classe} td{id_anuncio}">{ano_modelo}</td>
                            <!-- END ANO_MODELO -->
                        </tr>
                        <tr>
                            <td class="even first">Ano de Fabricação</td>
                            <!-- BEGIN ANO_FABRICACAO -->
                            <td class="{classe} td{id_anuncio}">{ano_fabricacao}</td>
                            <!-- END ANO_FABRICACAO -->
                        </tr>
						<!-- BEGIN LINHA -->
                        <tr>
                            <td class="even first">{campo_label}</td>
                            <!-- BEGIN COLUNA -->
                            <td class="{classe} td{id_anuncio}">{campo_valor}</td>
                            <!-- END COLUNA -->
                        </tr>
                        <!-- END LINHA -->
                        <!-- BEGIN ACESSORIO -->
                        <tr>
                            <td class="even first">{acessorio}</td>
                            <!-- BEGIN ACESSORIO_TD -->
                            <td class="{classe} td{id_anuncio}">
                            	<!-- BEGIN ACESSORIO_TD_IMG -->
                            	<img src="{live}/media/front/img/bl-mod3.gif" width="9" height="9" alt="Sim" />
                            	<!-- END ACESSORIO_TD_IMG -->
                            </td>
                            <!-- END ACESSORIO_TD -->
                        </tr>
                        <!-- END ACESSORIO -->
                    </tbody>
                </table>
				
				<!-- BEGIN MATERIAS -->
                <div class="materias">
                    <div class="bloco-materias-recentes">
                    	<div class="link-titulo-bloco"><a href="{live}/carros/materias/acao/lista" title="Ver mais matérias">Ver mais matérias &raquo;</a></div>
                        <h2 title="Matérias Recentes">Matérias <strong>Recentes</strong></h2>
                        <br class="clear" />
                        <!-- BEGIN MATERIA -->
                        <div class="materia-recente {class}">
							<a href="{live}/carros/materias/acao/ver/id/{id_materia}" title="{materia_titulo}">
								<img src="{live}/media/uploads/materia/{materia_midia}" alt="{materia_titulo}" title="{materia_titulo}" width="218" height="158" />
							</a> 
							<a href="{live}/carros/materias/acao/ver/id/{id_materia}" title="{materia_titulo}" class="titulo-chamada">{materia_titulo}</a>
							<p>{materia_subtitulo}</p>
						</div>
						<!-- END MATERIA -->
                        <br class="clear" />
                    </div>
                </div>
                <!-- END MATERIAS -->
                
                <div class="publicidade">
                	<!-- "ABC_Carros160x140" (section "ABC_Carros") --><script type="text/javascript" src="http://eas21.emediate.eu/eas?cu=18008;cre=mu;js=y;target=_blank"></script>
                </div>
                <br class="clear" />
            </div>
        </div>
        </div>