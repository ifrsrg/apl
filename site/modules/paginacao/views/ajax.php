<table border="0" cellpadding="0" cellspacing="0" id="paging-table" ativo="1" total="{num_paginas}">
<tr>
<td>
	<a href="javascript:void(0)" pag="{url_primeira}" id="pag-primeira" class="page-far-left"></a>
	<a href="javascript:void(0)" pag="{url_anterior}" id="pag-anterior" class="page-left"></a>
	<div id="page-info">Página <strong><span id="pag-atual">{pag}</span></strong> / {num_paginas}</div>
	<div id="page-loader" style="display:none;"><img width="19" height="19" src="{live}/media/admin/images/shared/loader.gif"></div>
	<a href="javascript:void(0)" pag="{url_proximo}" id="pag-proxima" class="page-right"></a>
	<a href="javascript:void(0)" pag="{url_ultimo}" id="pag-ultima" class="page-far-right"></a>
</td>
</tr>
</table>