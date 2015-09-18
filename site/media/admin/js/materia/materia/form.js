/*function validacao(){
	var valido = true;
	var msg = 'Preencha os seguintes campos antes de continuar:'
	
	if(!$('#segmento').val()){
		valido = false;
		msg += '\n•Segmento';
	}
	
	if(!$('#categoria').val()){
		valido = false;
		msg += '\n•Categoria';
	}
	
	if(!$('#titulo').val()){
		valido = false;
		msg += '\n•Título';
	}
	
	if(!$('#subtitulo').val()){
		valido = false;
		msg += '\n•Sub-título';
	}
	
	if(!$('#texto').val()){
		valido = false;
		msg += '\n•Conteúdo';
	}
	
	if(!$('.remover-tag').length){
		valido = false;
		msg += '\n•Ao menos uma tag deve ser adicionada';
	}
	
	if($('input[name="destaque"]').length){
		if(!('input[name="destaque"]:checked').val()) {
			valido = false;
			msg += '\n•Selecione a imagem destaque';
		}
	}
	
	if(!valido) {
		alert(msg);
		return false;
	}
}
*/

$(document).ready(function(){
	
	$('#adicionar-tag').click(function(){
		if(!$('#tag').val()) {
			alert('Preencha o campo tag');
			return false;
		}
		
		var btn = $(this);
		btn.hide();
		$('#btn-loader').show();
		
		$.ajax({
			type: 'POST',
			url: live+'/admin/materia/acao/adicionarTag/',
			data: {
				tag: $('#tag').val(),
				id: $('input[name="id"]').val()
			},
			success: function(data){
				btn.show();
				$('#btn-loader').hide();
				
				arr = data.split('|');
				
				if(arr[0] == 1)
					$('#box-tags').append(arr[1]);
				else
					alert(data);	
			},
			error: function(){
				btn.show();
				$('#btn-loader').hide();
			}
		})
	});
	
	$('.remover-tag').live('click', function(){
		var btn = $(this);
		btn.hide();
		btn.parent().find('.tag-loader').show();
		$.ajax({
			type: 'POST',
			url: live+'/admin/materia/acao/removerTag/',
			data: {
				tag: $(this).attr('tag'),
				id: $('input[name="id"]').val()
			},
			success: function(data){
				if(data == 1)
					btn.parent().remove();
				else {
					btn.show();
					btn.parent().find('.tag-loader').hide();
					alert(data);
				}
			},
			error: function(){
				btn.show();
				btn.parent().find('.tag-loader').hide();
			}
		})
	});
	
	$('.remover-midia').live('click', function(){
		bt = $(this);
		loader = bt.parent().find('.remover-midia-loader');
		
		bt.hide();
		loader.show()
		$.ajax({
			type: 'POST',
			url: live+'/admin/materia/acao/removerMidia',
			data: {
				id_midia: bt.attr('id_media')
			},
			success: function(data){
				if(data == 1)
					bt.parent().remove();
				else {
					bt.show();
					loader.hide();
					alert(data);
				}
			},
			error: function(){
				bt.show();
				loader.hide();
			}
		});
	});
	
	$('#adicionar-midia').click(function(){
		btn = $(this);
		loader = $('#midia-loader');
		
		if($('input[name="tipo-midia"]:checked').val() == 'I') {
			$('#form-materia').ajaxSubmit({
				url: live+'/admin/materia/acao/adicionarImagem',
				beforeSubmit: function() {
	                if(!$('input[name="imagem"]').val()) {
	                    alert('Selecione uma imagem');
	                    return false;
	                }
	                
	                btn.hide();
	                loader.show();
	                
	                return true;
            	},
	            success: function(data){
            		arr = data.split('|');
					
					if(arr[0] == 1)
						$('#box-midias').append(arr[1]);
					else
						alert(data);
            	},
            	complete: function() {
            		btn.show();
            		loader.hide();
            	}
			});
		} else {
			$.ajax({
				type: 'POST',
				url: live+'/admin/materia/acao/adicionarVideo',
				data: {
					midia: $('input[name="video"]').val(),
					id: $('input[name="id"]').val()
				},
				beforeSend: function() {
					if(!$('input[name="video"]').val()) {
						alert('Preencha o campo "URL do Youtube"');
						return false;
					}
					
					btn.hide();
					loader.show();
					
					return true;
				},
				success: function(data) {
					arr = data.split('|');
					
					if(arr[0] == 1)
						$('#box-midias').append(arr[1]);
					else
						alert(data);
				},
				complete: function() {
					btn.show();
					loader.hide();
				}
			})
		}
	});
	
	$('select[name="id_segmento"]').change(function(){
		$('select[name="id_materia_categoria"]').attr('disabled', 'disabled'); 
		
		$.post(live+'/admin/materiacategoria/acao/getBySegmento', {
			id_segmento: $('select[name="id_segmento"]').val()
		}, function(data){
			$('select[name="id_materia_categoria"]').html(data);
			$('select[name="id_materia_categoria"]').removeAttr('disabled');
		});
			 
	});
	
	$('input[name="tipo-midia"]').change(function(){
		if($('input[name="tipo-midia"]:checked').val() == 'I'){
			$('#campos-video').hide();
			$('#campos-imagem').show();
		} else {
			$('#campos-video').show();
			$('#campos-imagem').hide();
		}
	})
	$('input[name="tipo-midia"]').change();
	

	$('#enviar').click(function(){
		var valido = true;
		var campos = new Array();
		
		for ( instance in CKEDITOR.instances )
            CKEDITOR.instances[instance].updateElement();
		
		$('#message-red').hide();
		
		if(!$('#segmento').val()){
			valido = false;
			campos.push('Segmento');
		}
		
		if(!$('input[name=data_publicacao]').val()){
			valido = false;
			campos.push('Data de Publicação');
		}
		
		if(!$('#categoria').val()){
			valido = false;
			campos.push('Categoria');
		}
		
		if(!$('#titulo').val()){
			valido = false;
			campos.push('Título');
		}
		
		if(!$('#subtitulo').val()){
			valido = false;
			campos.push('Sub-título');
		}
		
		if(!$('#texto').val()){
			valido = false;
			campos.push('Conteúdo');
		}
		
		if(!$('.remover-tag').length){
			valido = false;
			campos.push('Tags');
		}
		
		if($('input[name="destaque"]').length){
			if(!('input[name="destaque"]:checked').val()) {
				valido = false;
				campos.push('Destaque');
			}
		}
		
		if(!valido) {
			$('#box-erros').html('Preencha os campos: '+campos.join(', '));
			$('#message-red').show();
			$('#segmento').focus();
			return false;
		}
	});
});