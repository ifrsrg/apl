$(document).ready(function(){
	
	$('#status').change(function(){
		$.ajax({
			type: 'POST',
			url: live+'/admin/dashboard/acao/pendentesByTipoRestricao',
			data: {
				restricao: $('#status').val()
			},
			beforeSend: function() {
				$('#paging-table').attr('ativo', 0);
				$('#status').attr('disabled', 'disabled');
			},
			success: function(data) {
				$('#paginacao').html(data.paginacao);
				$('.box-clientes').html(data.clientes);
			},
			complete: function() {
				$('#status').removeAttr('disabled');
			},
			dataType: 'json'
		});
	});
	
	$('#paging-table > tbody > tr > td > a[id^="pag-"]').live('click', function(){
		if($('#paging-table').attr('ativo') == '0' || $(this).attr('pag') == '#')
			return false;
		
		var pag = $(this).attr('pag');
		var total = $('#paging-table').attr('total');
		
		$.ajax({
			type: 'POST',
			url: live+'/admin/dashboard/acao/pendentes',
			data: {
				pag: pag,
				restricao: $('#status').val()
			},
			beforeSend: function() {
				$('#paging-table').attr('ativo', 0);
				$('#page-info').hide();
				$('#page-loader').show();
			},
			success: function(data) {
				$('#pag-primeira').attr('pag', pag != 1 ? '1' : '#');
				$('#pag-anterior').attr('pag', pag != 1 ? pag-1 : '#');
				$('#pag-proxima').attr('pag', pag != total ? pag+1 : '#');
				$('#pag-ultima').attr('pag', pag != total ? total : '#');
				$('#pag-atual').html(pag);
				
				$('.box-clientes').html(data);
			},
			complete: function() {
				$('#paging-table').attr('ativo', 1);
				$('#page-info').show();
				$('#page-loader').hide();
			}
		});
	});

});