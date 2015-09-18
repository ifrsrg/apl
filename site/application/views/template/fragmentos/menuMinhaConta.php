<script src="{live}/media/front/js/minhaconta/menuMinhaconta.js" type="text/javascript"></script>
<div class="mcMenu">
	<!-- BEGIN ANUNCIAR_PARCEIRO -->
	<div class="dv-anunciar-contrato">
		<a href="{live}/anunciar/contrato/anuncio" class="btn-anunciar-contrato"><img src="{live}/media/front/img/btn-anunciar-contrato.png" /></a>
		ou fazer anúncio <a href="{live}/anunciar/individual/tipo" class="avulso">avulso</a>
	</div>
	<!-- END ANUNCIAR_PARCEIRO -->
	<!-- BEGIN ANUNCIAR -->
	<div class="dv-anunciar">
		<a href="{live}/anunciar/individual/tipo"><img src="{live}/media/front/img/btn-anunciar.png" /></a>
	</div>
	<!-- END ANUNCIAR -->
	<div class="{classe_resumo}">
		<a href="{live}/minha-conta">Resumo</a>
	</div>

	<!-- BEGIN MENU_CONTRATO -->
	<div class="{classe_contratos}">
		<h4 class="menu-minha-conta-contrato">
			<a href="{live}/minha-conta/acao/anunciosContrato">Contrato</a>
		</h4>
	</div>
	<!-- END MENU_CONTRATO -->

	<div class="{classe_anuncios_online} open">
		<h4 class="menu-minha-conta-anuncios">{anuncio_online}</h4>
		<ul class="submenuMinhaconta">
			<li><a {classe_ativa_carrosonline} href="{live}/minha-conta/acao/anunciosOnlineCarros">Carros</a></li>
			<li><a {classe_ativa_imoveisonline} href="{live}/minha-conta/acao/anunciosOnlineImoveis">Imóveis</a></li>
			<li><a {classe_ativa_empregosonline} href="#">Empregos</a></li>
			<li><a {classe_ativa_diversosonline} href="#">Diversos</a></li>
		</ul>
	</div>

	<!-- BEGIN MENU_ANUNCIANTE -->
	<div class="{classe_anuncios_impressos} open">
		<h4 class="menu-minha-conta-anuncios">Anúncios Impressos</h4>
		<ul class="submenuMinhaconta">
			<li><a {classe_ativa_carrosimpressos} href="{live}/minha-conta/acao/anunciosImpressosCarros">Carros</a></li>
			<li><a {classe_ativa_imoveisimpressos} href="#">Imóveis</a></li>
			<li><a {classe_ativa_empregosimpressos} href="#">Empregos</a></li>
			<li><a {classe_ativa_diversosimpressos} href="#">Diversos</a></li>
		</ul>
	</div>
	<div class="{classe_alertas}">
		<h4>
			<a href="{live}/minha-conta/acao/alertas">Alertas</a>
		</h4>
	</div>
	<div class="{classe_favoritos}">
		<h4>
			<a href="{live}/minha-conta/acao/favoritos">Favoritos</a>
		</h4>
	</div>
	<div class="{classe_dados}">
		<h4>
			<a href="{live}/minha-conta/acao/dadosCadastrais">Dados de Cadastro</a>
		</h4>
	</div>
	<!-- END MENU_ANUNCIANTE -->

	<!-- BEGIN MENU_EMPRESA -->
	<div class="{classe_pempresa}">
		<h4>
			<a href="{live}/minha-conta/acao/paginaEmpresa">Página Empresa</a>
		</h4>
	</div>
	<!-- END MENU_EMPRESA -->
</div>

<!-- BEGIN CONTRATOS -->
{box_contratos}
<!-- END CONTRATOS -->
