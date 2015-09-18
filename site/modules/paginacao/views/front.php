<div class="pagination">
                    <ul>
                        <li class="next bt-paginacao" pag="{proxima}"><a href="javascript:void(0);">Próxima</a></li>
                        <li class="prev bt-paginacao" pag="{anterior}"><a href="javascript:void(0);">Anterior</a></li>
                        <li>de <strong>{num_pag}</strong></li>
                        <li>
                            <select class="select-style-paginacao" name="pag" id="select-paginacao">
                                <!-- BEGIN PAG -->
                                <option {selected}>{pag}</option>
                                <!-- END PAG -->
                            </select>
                        </li>
                        <li>Página</li>
                    </ul>
                    <br class="clear" />
                </div>
                <br class="clear" />