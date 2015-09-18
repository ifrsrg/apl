                  <!-- BEGIN CAMPO -->
                        <!-- BEGIN CAMPOS_ADICIONAIS -->
                        <!-- BEGIN BR_CLEAR -->
                        <br class="clear" />
                        <!-- END BR_CLEAR -->
                        <div class="campo field-mod w300{class_last}">
                            <span class="title-element">{campos_adicionais_label} :</span> 
                            <!-- BEGIN CAMPO_LISTA -->
                            <select name="campo_adicional_{id_veiculo_campos_adicionais}" loaded="0"  class="select-style">
                                    <option value="">Selecione</option>
                                    <!-- BEGIN CAMPO_VALUES -->
                                    <option value="{campo_value}" {selected_campo_value}>{campo_value}</option>
                                    <!-- END CAMPO_VALUES -->
                            </select>
                            <!-- END CAMPO_LISTA -->
                            <!-- BEGIN CAMPO_INPUT -->
                            <span class="field">
                                    <input name="campo_adicional_{id_veiculo_campos_adicionais}" type="text" value="{valor_preenchido_editar}"> 
                            </span>
                            <!-- END CAMPO_INPUT -->
			</div>
			<!-- END CAMPOS_ADICIONAIS -->
                        
                        <!-- BEGIN CAMPO_CHECKBOX -->
                        <!-- BEGIN BR_CLEAR -->
                        <br class="clear" />
                        <!-- END BR_CLEAR -->
                        <div class="list-especificacao{class_last}">
                            <h6>{campos_adicionais_label}:</h6>
                            <ul>
                                <!-- BEGIN CAMPO_CHECK_VALUE -->
				<li>
                                    <label class="checkbox {checked_campo_value_on}"> 
					<input type="checkbox" {checked_campo_value} name="campo_adicional_{id_veiculo_campos_adicionais}[]" value="{campo_value}">
					<span>{campo_value}</span>
                                    </label>
				</li>
                                <!-- END CAMPO_CHECK_VALUE -->
                            </ul>
			</div>
                        <!-- END CAMPO_CHECKBOX -->
                        <!-- BEGIN CAMPO_TEXT -->
                        <br class="clear" />
                        <div class="field-mod w500h131">
                            <span class="title-element">{campos_adicionais_label}:</span> 
                            <span class="field">
                                    <textarea id="descricao" name="campo_adicional_{id_veiculo_campos_adicionais}" rows="1" cols="1">{valor_preenchido_editar}</textarea>
                            </span>
			</div>
                        <!-- END CAMPO_TEXT -->
        <!-- END CAMPO -->