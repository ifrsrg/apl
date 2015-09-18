<link rel="stylesheet" href="{live}/media/front/css/classificados.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="{live}/media/front/js/uploadify/uploadify.css" />

<script type="text/javascript" src="{live}/media/front/js/uploadify/jquery.uploadify-3.1.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?key={api_key}&sensor=false" type="text/javascript"></script>
<script type="text/javascript" src="{live}/media/front/js/jquery.ui.map.full.min.js"></script>
<script type="text/javascript" src="{live}/media/front/js/map.js"></script>
<script type="text/javascript" src="{live}/media/front/js/minhaconta/pagina_empresa.js"></script>

<h3>
	<strong>Página Empresa</strong>
</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In at magna
	vitae mauris coIn at magna vitIn at magna vitIn at magna vitIn at magna
	vit.</p>

<div class="line">&nbsp;</div>

<form name="formEmpresa" action="" method="post" enctype="multipart/formdata">

	<div class="f-left indice-pempresa">
		<h4>Logotipo:</h4>
	</div>

	<div class="f-right">
		<div>
			<input type="file" name="logo" id="upload-logo"/>
			<div>
				<p class="obs">A imagem deve ser nos formatos JPG ou PNG, com tamanho máximo de 2mb. <br>O arquivo deve ter no mínimo a resolução de 400x400 pixels.</p>
			</div>
		</div>
		<div class="logo-parceiro">
                    <div>
			<img src="{live}/media/{imagem}" alt="{nome}" width="100" height="100"/>
                    </div>
                    <div class="logo-txt">
                        Logotipo atual
                    </div>
		</div>
	</div>

	<div class="line">&nbsp;</div>

	<div class="f-left indice-pempresa">
		<h4>Informações de localização da empresa:</h4>
	</div>

	<div class="f-right">
		<div>
			{endereco}, {numero}
			<br />
			{cidade} - {sigla}
		</div>

		<div class="map mapEmpresa" id="map" lat="{lat}" lng="{lng}" zoom="15">&nbsp;</div>
	</div>

	<div class="line">&nbsp;</div>

	<div class="f-left indice-pempresa">
		<h4>Telefones de contato:</h4>
	</div>

	<div class="f-right">
		<div>
			<ul>
				<!-- BEGIN FONE1 -->
				<li>Telefone 1: {telefone1}</li>
				<!-- END FONE1 -->
				<!-- BEGIN FONE2 -->
				<li>Telefone 2: {telefone2}</li>
				<!-- END FONE2 -->
				<!-- BEGIN FONE3 -->
				<li>Telefone 3: {telefone3}</li>
				<!-- END FONE3 -->
			</ul>
		</div>
		<p class="obs">Para editar estes dados é necessário entrar em contato com o Grupo Sinos.</p>
	</div>

</form>
