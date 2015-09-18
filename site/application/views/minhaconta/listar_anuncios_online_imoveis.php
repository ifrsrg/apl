<script type="text/javascript" src="{live}/media/front/js/minhaconta/anunciosOnline.js"></script>
<div class="pagination f-left">
    <ul>
    <!--
        <li class="next"><a class="bt-paginacao-minha-conta" href="javascript:void(0);" pag="{pag_prox}">Próxima</a></li>
        <li class="prev"><a class="bt-paginacao-minha-conta" href="javascript:void(0);" pag="{pag_ant}">Anterior</a></li>
        <li>de <strong>{num_total_paginas}</strong></li>
        <li>
        <select id="select-paginacao-minha-conta" class="select-style-paginacao-minha-conta" name="pag">
            <!-- BEGIN PAGINAS --
            <option {pag_selected} value="{pag}">{pag}</option>
            <!-- END PAGINAS --
        </select>
        </li>
        <li>Página</li>
    -->
        <li class="filtro-table-minha-conta">
        <select class="select-style-filtrar-minha-conta" name="filtrar">
            <option value="ALL" {filtro_selected_ALL}>Todos</option>
            <option value="1" {filtro_selected_1}>Ativos</option>
            <option value="0" {filtro_selected_0}>Inativos</option>
            <option value="EXP" {filtro_selected_EXP}>Expirados</option>
        </select>
        </li>
        <li class="td-filtrar">Filtrar</li>
        <li class="td-acoes recadastrar" style="visibility: hidden"><a href="javascript:void(0);" alt="Recadastrar" title="Recadastrar"><img src="{live}/media/front/img/bt-recadastrar.png" alt="Recadastrar" title="Recadastrar"></a></li>
        <li class="td-acoes ativar"><a href="javascript:void(0);" alt="Ativar" title="Ativar"><img src="{live}/media/front/img/bt-ativar.png" alt="Ativar" title="Ativar"></a></li>
        <li class="td-acoes desativar"><a href="javascript:void(0);" alt="Desativar" title="Desativar"><img src="{live}/media/front/img/bt-desativar.png" alt="Desativar" title="Desativar"></a></li>
        <li class="td-acoes excluir"><a href="javascript:void(0);" alt="Excluir" title="Excluir"><img src="{live}/media/front/img/bt-excluir.png" alt="Excluir" title="Excluir"></a></li>
        <!-- BEGIN ACAO_EDITAR -->
        <li class="td-acoes editar"><a href="anunciosOnlineImoveis" alt="Editar" title="Editar"><img src="{live}/media/front/img/bt-editar.png" alt="Editar" title="Editar"></a></li>
        <!-- END ACAO_EDITAR -->
        <li>Ações</li>
    </ul>
    <!--  <br class="clear" />   -->
    </div>

{paginacao}

    <table cellpadding="0" cellspacing="0" class="table-default-mod">
            <thead>
                    <tr>
                            <th width="4%" class="first">
                                    <ul class="checkbox-imoveis">
                                            <li class="checkbox checkbox-todos"><input type="checkbox" /></li>
                                    </ul>
                            </th>
                            <th width="14%" class="{ordem_status} {active_status}"><a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="status">Status</a></th>
                            <th width="37%" class="{ordem_anuncio} {active_anuncio}">
                                <a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="anuncio">Anúncio</a>
                            </th>
                            <th width="11%" class="{ordem_bairro} {active_bairro}"><a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="bairro">Bairro</a></th>
                            <th width="19%" class="{ordem_data} {active_data}"><a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="data">Data de Publicação</a></th>
                            <th width="15%" class="{ordem_visualizacoes} {active_visualizacoes}"><a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="visualizacoes">Visualizações</a></th>
                            <th width="11%" class="last {ordem_n_favoritos} {active_n_favoritos}"><a href="javascript:void(0);" class="js-ordenacao-minha-conta" lang="n_favoritos">Favorito</a></th>
                    </tr>
            </thead>
        <tbody class="lista-imoveis">
            <!-- BEGIN ANUNCIO -->
            <tr {classe_odd}>
                <input type="hidden" name="id_anuncio" value="{id_anuncio}" />
                <td class="options">
                    <ul class="checkbox-imoveis">
                        <li class="checkbox"><input type="checkbox" name="product" value="1" /></li>
                    </ul>
                </td>
                <td>
                    <a href="javascript:void(0);" class="lista-status lista-status-{classe_status}" alt="{status}" title="{status}">&nbsp;</a><span class="txt-status">{status}</span>
                </td>
                <td class="active td-anuncio"><a class="link-imoveis" href="{live}{link}">{anuncio}</a></td>
                <td>{bairro}</td>
                <td>{data}</td>
                <td class="td-centralizada">{visualizacoes}</td>
                <td class="td-centralizada last">{n_favoritos}</td>
            </tr>
            <!-- END ANUNCIO -->
        </tbody>
    </table>

            <!-- BEGIN SEM_RESULTADO -->
            <br>
            <h2>Sem anúncios a exibir.</h2>
            <!-- END SEM_RESULTADO -->
