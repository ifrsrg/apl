<link rel="stylesheet" type="text/css" href="{live}/media/front/css/boxContrato.css" media="all" />

<!-- BEGIN INC_JS -->
<script type="text/javascript" src="{live}/media/front/js/boxContrato.js"></script>
<input type="hidden" name="id_contrato" name="id_contrato" value="{selected}" />
<!-- END INC_JS -->

<!-- BEGIN SEM_CONTRATOS -->
<div class="boxNotifica">
	<div class="boxNotificaTop bopen">
		<p>Não existem contratos vinculados a sua conta.</p>
	</div>
</div>
<!-- END SEM_CONTRATOS -->


<!-- BEGIN BOX_CONTRATOS -->
<div class="boxContrato {classes}" id="contrato_{id_contrato}">
	<div class="lineExpires">
		Expira em: <strong {expired}>{data_expiracao}</strong>
	</div>
	<div class="lineInfo">
		Anúncios disponíveis/contratados
	</div>
	<div class="lineGraph" style="background-position-x: -{bar_anuncios}px;" >
		{anuncios_disponiveis}/{num_anuncios}
	</div>
</div>
<!-- END BOX_CONTRATOS -->
