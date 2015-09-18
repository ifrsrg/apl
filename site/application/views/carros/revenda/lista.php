<script src="http://maps.googleapis.com/maps/api/js?key={api_key}&sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="{live}/media/front/js/jquery.ui.map.full.min.js"></script>
<script type="text/javascript" src="{live}/media/front/js/map.js"></script>
<script type="text/javascript" src="{live}/media/front/js/carros/anuncio/box-comparar.js"></script>
<script type="text/javascript" src="{live}/media/front/js/carros/revenda/revenda.js"></script>

<div id="conteudo">
<div class="limite">
            <br class="clear" />
        	<div id="coluna-principal">
				<div id="breadcrumb">
					<a href="{live}" title="ABC Classificados">ABC Classificados</a><span>&nbsp;</span>
					<a href="{live}/carros" title="Carros">Carros</a><span>&nbsp;</span>
					Revendas
				</div>
                <div id="titulo-internas"><h2 title="Revendas"><strong>Revendas</strong></h2></div>
                <br class="clear" />
                <ul id="revendas">
                	<!-- BEGIN NENHUMA -->
                	<li>Nehuma revenda encontrada para o local selecionado.</li>
                	<!-- END NENHUMA -->
                	<!-- BEGIN REVENDA -->
                    <li>
                        <div class="thumb"><a href="{live}/carros/revenda/acao/ver/id/{id_revenda}"><img src="{live}/media/uploads/parceiro/{logotipo}" alt="{nome}" width="90" height="90" /></a></div>
                        <div class="data">
                            <h6><a href="{live}/carros/revenda/acao/ver/id/{id_revenda}">{nome}</a></h6>
                            <span class="n-anuncios"><a href="{live}/carros/revenda/acao/ver/id/{id_revenda}" title="{num_anuncios} anúncio{plural_anuncios}">{num_anuncios} anúncio{plural_anuncios} »</a></span>
                            <br class="clear" />
                            <address>
                                {endereco}<br />
                                {cidade} - {estado}<br />
                                Telefone: <strong>{telefone}</strong>
                            </address>
                            <br class="clear" />
                        </div>
                        <div class="map" id="map" lat="{lat}" lng="{lng}" zoom="15">
                            
                        </div>
                        <br class="clear" />
                    </li>
                    <!-- END REVENDA -->
                </ul>
                {paginacao}
                <br class="clear" />

            </div>
            <div id="coluna-secundaria">
            	<form method="GET" action="{live}/carros/revenda/acao/lista">
	                <div class="filtro">
	                    <h3>FILTRAR</h3>
	                    <dl>
	                        <dt>Localização</dt>
	                        <dd>
	                            <div class="border">
	                                <select name="estado" id="estado" class="select-estado">
		                            	<option value="">Todos os estados</option>
		                            	<!-- BEGIN ESTADO -->
		                            	<option value="{id_estado}" {selected}>{estado}</option>
		                            	<!-- END ESTADO -->
		                            </select>
		                            <select name="cidade" id="cidade" class="select-cidade">
		                            	<option value="">Todas as cidades</option>
		                            	<!-- BEGIN CIDADE -->
		                            	<option value="{id_cidade}" {selected}>{cidade}</option>
		                            	<!-- END CIDADE -->
		                            </select>
		                            <input type="button" id="filtrar" value="" />
	                            </div>
	                        </dd>
	                    </dl>
	                </div>
                </form>
            </div>
            <br class="clear" />
        </div>
        </div>