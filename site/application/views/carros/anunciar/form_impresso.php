<script src="{live}/media/front/js/anunciarindividual/impresso.js" type="text/javascript"></script>
<script src="{live}/media/front/js/jquery.maskedinput-1.3.min.js" type="text/javascript"></script>
<script src="{live}/media/front/js/jquery-ui.multidatespicker.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#dias').multiDatesPicker({
			numberOfMonths: 2,
			minDate: {min_date},
			altField: '#impresso-dias',
			dateFormat: 'yy-mm-dd',
			{datas}
			onSelect: function() {
				montaValor();
			},
			beforeShowDay: function(date) {
				arrDisabled = [{datasDisabled}];

				if(arrDisabled.length > 0) {
					data  = date.getDate()+'-';
					if(date.getMonth()+1 < 10)
						data += '0';
					data += (date.getMonth()+1)+'-';
					data += date.getFullYear();
					
					for(c = 0 ; c < arrDisabled.length ; c++) {
						if(arrDisabled[c] == data)
							return [false];
					}
				}

				return [true];
			}
		});

		montaValor();
	});
</script>
<link rel="stylesheet" type="text/css" href="{live}/media/front/css/jquery-ui.css" media="all"></link>

        <div class="limite area classificados">
        	<h2 class="title-cadastro">Cadastrar <strong>veículo</strong></h2>
            <form action="{live}/anunciar/individual/anuncio/acao/cadastrarImpresso{action}" name="form" method="post">
                <div class="title w620">
                    <h3>Dados do <strong>anúncio</strong></h3>
                    <span class="text">Todos os campos são obrigatórios</span>
                    <br class="clear" />
                </div>
                <div class="left w620">
                    <div class="field-mod w300 last" id="tipo">
                        <span class="title-element">Tipo de veículo:</span>
                        <select name="tipo" class="select-style">
                            <option value="">Selecione</option>
                            <!-- BEGIN CATEGORIA -->
                            <option value="{id_categoria}" {selected_categoria}>{categoria}</option>
							<!-- END CATEGORIA -->
                        </select>
						<div class="box-aviso-input" style="visibility:hidden;" id="tipo-erro">
							<div class="lateral-direita-aviso-input">&nbsp;</div>
							<div class="aviso-input">Campo Obrigatório</div>
							<div class="lateral-esquerda-aviso-input">&nbsp;</div>
						</div>
                    </div>
                    <br class="clear" />
                    <div class="field-mod w300" id="subcategoria">
                        <span class="title-element">Marca:</span>
                        
                        <select name="subcategoria" class="select-style">
                            <option value="">Selecione</option>
                            <!-- BEGIN SUBCATEGORIA -->
                            <option value="{id_subcategoria}" {selected_subcategoria}>{subcategoria}</option>
							<!-- END SUBCATEGORIA -->
                        </select>
						<div class="box-aviso-input" style="visibility:hidden;" id="subcategoria-erro">
							<div class="lateral-direita-aviso-input">&nbsp;</div>
							<div class="aviso-input">Campo Obrigatório</div>
							<div class="lateral-esquerda-aviso-input">&nbsp;</div>
						</div>
                    </div>
                    <div class="field-mod w300 last" id="item">
                        <span class="title-element">Modelo:</span>
                        <span class="field" style="display: none;"><input type="text" name="item_digitado" id="item_digitado" value="{item_digitado}" /></span>
                        <select name="item" class="select-style">
                            <option value="">Selecione</option>
                            <!-- BEGIN ITEM -->
                            <option value="{id_impresso_item}" {selected_impresso_item}>{impresso_item}</option>
                            <!-- END ITEM -->
                        </select>
                        <div class="box-aviso-input" style="visibility:hidden;" id="item-erro">
							<div class="lateral-direita-aviso-input">&nbsp;</div>
							<div class="aviso-input">Campo Obrigatório</div>
							<div class="lateral-esquerda-aviso-input">&nbsp;</div>
						</div>
                    </div>
                    <br class="clear" />
                    <div class="left-contato">
			<div class="bloco-tel">
                                <div class="field ddd">
                                        <span class="title-element">Telefone:</span> <span class="field">
                                                <input type="text" id="ddd" name="ddd" value="{ddd}" />
                                        </span> <br class="clear" />
                                </div>
                                <div class="field nro">
                                        <span class="title-element">&nbsp;</span> <span class="field"><input
                                                type="text" name="telefone" id="tel" value="{telefone}" />
                                        </span>
                                        <div class="box-aviso-input" id="num-erro">
	                                        <div class="lateral-direita-aviso-input">&nbsp;</div>
	                                        <div class="aviso-input">Campo Obrigatório</div>
	                                        <div class="lateral-esquerda-aviso-input">&nbsp;</div>
		                                </div> 
                                        <br class="clear" />
                                </div>
                                
                        </div>
                         <div class="bloco-tel">
                                <div class="field ddd">
                                        <span class="title-element">Telefone:</span> <span class="field">
                                                <input type="text" id="ddd2" name="ddd2" value="{ddd2}" />
                                        </span> <br class="clear" />
                                </div>
                                <div class="field nro">
                                        <span class="title-element">&nbsp;</span> <span class="field"><input
                                                type="text" name="telefone2" id="tel2" value="{telefone2}" />
                                        </span> <br class="clear" />
                                </div>
                                <div class="box-aviso-input" id="num-erro">
                                        <div class="lateral-direita-aviso-input">&nbsp;</div>
                                        <div class="aviso-input">Campo Obrigatório</div>
                                        <div class="lateral-esquerda-aviso-input">&nbsp;</div>
                                </div>
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="field-mod w300 last">
                        <span class="title-element">Placa:</span> <span class="field"><input
                                            type="text" name="placa" id="placa" value="{placa}" />
                        </span>
                        <div class="box-aviso-input" id="placa-erro">
                                <div class="lateral-direita-aviso-input">&nbsp;</div>
                                <div class="aviso-input">Campo Obrigatório</div>
                                <div class="lateral-esquerda-aviso-input">&nbsp;</div>
                        </div>
                    </div>
                    <br class="clr" />
                    <div class="field-mod w500h131 w-500" id="texto">
                        <span class="title-element">Texto: <span class="txt-instrucao">Não é necessário preencher novamente o número de telefone e a placa.</span></span>
                        <span class="field"><textarea name="texto" rows="5" cols="1">{texto}</textarea></span>
						<div class="box-aviso-input" id="texto-erro">
							<div class="lateral-direita-aviso-input">&nbsp;</div>
							<div class="aviso-input">Campo Obrigatório</div>
							<div class="lateral-esquerda-aviso-input">&nbsp;</div>
						</div>
                    </div>
                    <div id="count-text">
                        <p id="count-line">{linhas} linha{linhas_plural} </p>
                        <p id="count-caracteres">&nbsp;- Faltam <strong>{caracteres}</strong> caracteres</p>
                        <p class="visualizar-modelo-anuncio">Visualizar modelo de anúncio</p>
                    </div>
                    

                    
	                
                    <div class="box-visualiza-anuncio invisivel">
                    	<p><strong>PARATI</strong>, prata, roda acapulco, 91 GLS, turbo. Aceita troca. R$ 13.500,00. www.baguncaautomoveis.com.br</p>
                    </div>
                    <br class="clear" />
                </div>

                <div class="title w620">
                    <h3><strong>Personalização</strong></h3>
                    <br class="clear" />
                </div>
                <div class="left w620">
                    
                    <span class="title-element">Cor do texto:</span>
                    <!-- BEGIN COR -->
                    <label class="radio3 radio-space">
                    	<!-- BEGIN EXEMPLO_FONTE -->
                    	<div class="exemplo-cor" style="background-color:{fonte_cor};"></div>
                        <!-- END EXEMPLO_FONTE -->
                        <!-- BEGIN SEM_EXEMPLO_FONTE -->
                        <div class="exemplo-cor" style="background-image:url('{live}/media/front/img/impresso-sem-cor.jpg');"></div>
                        <!-- END SEM_EXEMPLO_FONTE -->
                        <input type="radio" valor="{cor_valor}" cor="{fonte_cor}" name="id_impresso_cor" value="{id_cor}" {cor_checked}/>
                        <span>{cor}</span>
                    </label>
                    <!-- END COR -->
                    <br class="clr" />
					
					<span class="title-element">Moldura:</span>
                    <!-- BEGIN MOLDURA -->
                    <label class="radio radio-space">
                    	<!-- BEGIN EXEMPLO_MOLDURA -->
                    	<div class="exemplo-cor" style="background-color:{cor_moldura};"></div>
                    	<!-- END EXEMPLO_MOLDURA -->
                    	<!-- BEGIN SEM_EXEMPLO_MOLDURA -->
                        <div class="exemplo-cor" style="background-image:url('{live}/media/front/img/impresso-sem-cor.jpg');"></div>
                        <!-- END SEM_EXEMPLO_MOLDURA -->
                        <input type="radio" valor="{moldura_valor}" cor="{moldura_cor}" name="id_impresso_moldura" value="{id_moldura}" {moldura_checked}/>
                        <span>{moldura}</span>
                    </label>
                    <!-- END MOLDURA -->
                    <br class="clear" />
                    
                    <span class="title-element">Fundo:</span>
                    <!-- BEGIN FUNDO -->
                    <label class="radio2 radio-space">
                    	<!-- BEGIN EXEMPLO_FUNDO -->
                    	<div class="exemplo-cor" style="background-color:{fundo_cor};"></div>
                    	<!-- END EXEMPLO_FUNDO -->
                    	<!-- BEGIN SEM_EXEMPLO_FUNDO -->
                        <div class="exemplo-cor" style="background-image:url('{live}/media/front/img/impresso-sem-cor.jpg');"></div>
                        <!-- END SEM_EXEMPLO_FUNDO -->
                        <input type="radio" valor="{fundo_valor}" cor="{fundo_cor}" name="id_impresso_fundo" value="{id_fundo}" {fundo_checked}/>
                        <span>{fundo}</span>
                    </label>
                    <!-- END FUNDO -->

                    <br class="clear" />
					
                </div>

                <div class="title w620">
                    <h3>Visualização do <strong>anúncio</strong></h3>
                    <br class="clear" />
                </div>
                <div class="w620">
                    <div class="visualizacao" style="border:{estilo_moldura};color:{estilo_fonte};background-color:{estilo_fundo};">
                        <p></p>
                    </div>
                    <br class="clear" />
                </div>
                <br class="clear" />

                <div class="title w620">
                    <h3>Selecione os dias da <strong>publicação</strong></h3>
                    <span class="text">Clique sobre os dias para selecionar</span>
                    <br class="clear" />
                </div>
                
                <div class="w620">
                    <div id="dias"></div>
                    <input type="hidden" id="impresso-dias" name="impresso_dias" value="{impresso_dias}" />
                    <br class="clear" />
					
					<input type="hidden" id="valor-plano" value="{plano_valor}" />

                    <div class="valores">
                        <ul>
                            <li>
                                <span class="left"><strong>Valor do anúncio:</strong></span>
                                <span class="right"><strong id="valor-anuncio">-</strong></span>
                                <br class="clear" />
                            </li>
                            <li>
                                <span class="left">Valor total fica em:</span>
                                <span class="right" id="subtotal">-</span>
                                <br class="clear" />
                            </li>
                        </ul>
                    </div>
                    
                    <br class="clear" />
                    
                </div>
                
                <br class="clear" />
				
                <div class="bts w620">
                    <ul>
                        <li class="voltar"><a href="javascript:history.back();" title="Voltar">Voltar</a></li>
                        <li class="salvar-finalizar"><input id="salvar" type="button" value="" /></li>
                        <!-- BEGIN HIDE_SALVAR -->
                        <li class="salvar"><input type="button" value="" /></li>
                        <!-- END HIDE_SALVAR -->
                    </ul>
                    <br class="clear" />
                </div>
            </form>
        </div>
    