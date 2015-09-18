<script type="text/javascript" src="{live}/media/front/js/minhaconta/alertas.js"></script>
<div class="pagination">
    <ul>
        <li class="next"><a class="bt-paginacao-minha-conta" href="javascript:void(0);" pag="{pag_prox}">Próxima</a></li>
        <li class="prev"><a class="bt-paginacao-minha-conta" href="javascript:void(0);" pag="{pag_ant}">Anterior</a></li>
        <li>de <strong>{num_total_paginas}</strong></li>
        <li>
        <select id="select-paginacao-minha-conta" class="select-style-paginacao-minha-conta" name="pag">
            <!-- BEGIN PAGINAS -->
            <option {pag_selected} value="{pag}">{pag}</option>
            <!-- END PAGINAS -->
        </select>
        </li>
        <li>Página</li>
        <li class="filtro-table-minha-conta">
        <select class="select-style-filtrar-minha-conta" name="filtrar">
            <option value="Todos" {filtro_selected_Todos}>Todos</option>
            <option value="Carros" {filtro_selected_Expirado}>Carros</option>
            <option value="Imóveis" {filtro_selected_Expirado}>Imóveis</option>
            <option value="Empregos" {filtro_selected_Expirado}>Empregos</option>
            <option value="Diversos" {filtro_selected_Expirado}>Diversos</option>
        </select>
        </li>
        <li class="td-filtrar">Filtrar</li>
        <li class="td-acoes ativar" style="visibility:hidden"><a href="javascript:void(0);" alt="Ativar" title="Ativar"><img src="{live}/media/front/img/bt-ativar.png" alt="Ativar" title="Ativar"></a></li>
        <li class="td-acoes desativar" style="visibility:hidden"><a href="javascript:void(0);" alt="Desativar" title="Desativar"><img src="{live}/media/front/img/bt-desativar.png" alt="Desativar" title="Desativar"></a></li>
        <li class="td-acoes recadastrar" style="visibility:hidden"><a href="javascript:void(0);" alt="Recadastrar" title="Recadastrar"><img src="{live}/media/front/img/bt-recadastrar.png" alt="Recadastrar" title="Recadastrar"></a></li>
        <li class="td-acoes excluir-alertas"><a href="javascript:void(0);" alt="Excluir" title="Excluir"><img src="{live}/media/front/img/bt-excluir.png" alt="Excluir" title="Excluir"></a></li>
        <li>Ações</li>
    </ul>
    <br class="clear" />
    </div>
    <table cellpadding="0" cellspacing="0" class="table-default-mod">
            <thead>
                    <tr>
                            <th width="4%" class="first">
                                    <ul>
                                            <li class="checkbox checkbox-todos"><input type="checkbox" /></li>
                                    </ul>
                            </th>
                            <th width="28%" class="{ordem_classificados} {active_classificados}"><a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="classificados">Canal</a></th>
                            <th width="46%" class="{ordem_descricao} {active_descricao}">
                                <a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="descricao">Alerta</a>
                            </th>
                            <th width="22%" class="{ordem_data} {active_data}"><a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="data">Data de Criação</a></th>
                    </tr>
            </thead>
        <tbody>
            <!-- BEGIN ANUNCIO -->
            <tr {classe_odd}>
                <input type="hidden" name="id_anuncio" value="{id_anuncio}" />
                <td class="options">
                    <ul>
                        <li class="checkbox"><input type="checkbox" name="alertas" value="{id_alerta}" /></li>
                    </ul>
                </td>
                <td>{classificados}</td>
                <td class="active td-anuncio">{descricao}</td>
                <td>{data}</td>
            </tr>
            <!-- END ANUNCIO -->
        </tbody>
    </table>
            <!-- BEGIN SEM_RESULTADO -->
            <br>
            <h2>Não há alertas cadastrados com este filtro.</h2>
            <!-- END SEM_RESULTADO -->
    <div class="pagination">
    <ul>
            <li class="next"><a class="bt-paginacao-minha-conta" href="javascript:void(0);" pag="{pag_prox}">Próxima</a></li>
            <li class="prev"><a class="bt-paginacao-minha-conta" href="javascript:void(0);" pag="{pag_ant}">Anterior</a></li>
            <li>de <strong>{num_total_paginas}</strong></li>
            <li>
            <select id="select-paginacao-minha-conta2" class="select-style-paginacao-minha-conta" name="pag">
                <!-- BEGIN PAGINAS_2 -->
                <option {pag_selected} value="{pag}">{pag}</option>
                <!-- END PAGINAS_2 -->
            </select>
            </li>
            <li>Página</li>
            <li class="filtro-table-minha-conta">
            <select class="select-style">
                    <option>Todos</option>
                    <option>Ativos</option>
                    <option>Inativos</option>
                    <option>Expirados</option>
            </select>
            </li>
            <li>Filtrar</li>
    </ul>
    <br class="clear" />
</div>