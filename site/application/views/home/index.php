        <!-- MODAL FORNECEDORES -->
        <div class="reveal-modal" id="ModalFornecedor">
            <h1>Fornecedores <b>APL</b></h1>            
            <div class="line"></div>

            <!-- OS ITENS DESTE UL SÃO REFERENTES AOS 
            ITENS DOS ASSOCIADOS DEVEM SER GERADOS NA MESMA ORDEM DEVIDO A NAVEGAÇÃO DO SLIDER -->

            <ul class="fornecedores-modal-carousel">
            	<!-- BEGIN FORNECEDOR_MODAL -->
                <li>
                    <div class="col-text">
                        <h2>{fornecedor_nome}</h2>
                        <ul class="project-data">
                            <li>Categoria:<span>{fornecedor_categoria}</span></li>
                        </ul>            
                        <p>{fornecedor_texto}</p>
                        <h3>Contato</h3>
                        <p>{fornecedor_contato}<br />{fornecedor_contato_email}<br />{fornecedor_contato_telefone}</p>
                        {fornecedor_endereco}
                        <map value="{fornecedor_coordenadas}" width="500" height="116">
                    </div>
                    <div class="col-img">
                        <img src="{fornecedor_marca}">
                        <!-- BEGIN HAS_PROJETO_FORNECEDOR -->
                        <h3>Projetos:</h3>
                        {fornecedor_projetos}
                        <!-- END HAS_PROJETO_FORNECEDOR -->
                    </div>
                </li>
                <!-- END FORNECEDOR_MODAL -->
            </ul>
            <a href="#" class="fornecedores-modal-carousel-prev prev"></a>
            <a href="#" class="fornecedores-modal-carousel-next next"></a>
            <a class="close-reveal-modal"></a>
        </div>
        
        <div class="reveal-modal" id="ModalDownload">
            <h1>Downloads <b>APL</b> - <span id="download-categoria"></span></h1>            
            <div class="line"></div>

            <!-- OS ITENS DESTE UL SÃO REFERENTES AOS 
            ITENS DOS ASSOCIADOS DEVEM SER GERADOS NA MESMA ORDEM DEVIDO A NAVEGAÇÃO DO SLIDER -->

            <div class="col-text" id="link-area">
			</div>
            <a class="close-reveal-modal"></a>
        </div>
        
        <!-- MODAL ASSOCIADOS -->
        <div class="reveal-modal" id="ModalAssociados">
            <h1>Associados <b>APL</b></h1>            
            <div class="line"></div>

            <!-- OS ITENS DESTE UL SÃO REFERENTES AOS 
            ITENS DOS ASSOCIADOS DEVEM SER GERADOS NA MESMA ORDEM DEVIDO A NAVEGAÇÃO DO SLIDER -->

            <ul class="modal-carousel">
            	<!-- BEGIN ASSOCIADO_MODAL -->
                <li>
                    <div class="col-text">
                        <h2>{associado_nome}</h2>
                        <ul class="project-data">
                            <li>Categoria:<span>{associado_categoria}</span></li>
                        </ul>            
                        <p>{associado_texto}</p>
                        <h3>Contato</h3>
                        <p>{associado_contato}<br />{associado_contato_email}<br />{associado_contato_telefone}</p>
                        {associado_endereco}
                        <map value="{associado_coordenadas}" width="500" height="116">
                    </div>
                    <div class="col-img">
                        <img src="{associado_marca}">
                        <!-- BEGIN HAS_PROJETO_ASSOCIADO -->
                        <h3>Projetos:</h3>
                        {associado_projetos}
                        <!-- END HAS_PROJETO_ASSOCIADO -->
                    </div>
                </li>
                <!-- END ASSOCIADO_MODAL -->
            </ul>
            <a href="#" class="modal-carousel-prev prev"></a>
            <a href="#" class="modal-carousel-next next"></a>
            <a class="close-reveal-modal"></a>
        </div>
        
        <a name="apresentacao" id="apresentacao"></a>
        <div class="conceitual">
            <div class="conceitual-carousel-container">
                <ul class="conceitual-carousel">
                	<!-- BEGIN CONCEITUAIS -->
                    <li><img alt="{conceitual_titulo}" title="{conceitual_titulo}" src="{conceitual_imagem}"></li>
                    <!-- END CONCEITUAIS -->
                </ul>
                <div class="conceitual-carousel-pagination"></div>
            </div>
        </div>
        <section>
        	<!-- BEGIN APRESENTACAO_DESTAQUE -->
            <div class="col-1">
                <h1>{apresentacao_titulo_formatado}</h1>
                <p class="quotes">{apresentacao_subtitulo}</p>
                {apresentacao_texto}
            </div>
            <div class="col-1">
                <img class="img0" alt="{apresentacao_titulo}" title="{apresentacao_titulo}" src="{apresentacao_imagem}">
            </div>
            <div class="clearfix"></div>
            <!-- END APRESENTACAO_DESTAQUE -->
            <!-- BEGIN APRESENTACOES --> 
	            <div class="col-1">
                	<h1>{apresentacao_titulo_formatado}</h1>
	                {apresentacao_texto}
	                <img class="img1" alt="{apresentacao_titulo}" title="{apresentacao_titulo}" src="{apresentacao_imagem}">
	            </div>
	            <!-- BEGIN APRESENTACAO_BREAK -->
	            	<div class="clearfix"></div>
	            <!-- END APRESENTACAO_BREAK -->
            <!-- END APRESENTACOES -->         
        </section>
        <a name="associados" id="associados"></a>
        <section class="expanded gray">
            <div class="col">
                <h1>Associados <b>APL</b></h1>
                <h2>{texto_subtitulo_associado}</h2>
            
            <!-- OS ITENS DESTE UL SÃO REFERENTES AOS 
            ITENS DO MODAL DOS ASSOCIADOS DEVEM SER GERADOS NA MESMA ORDEM DEVIDO A NAVEGAÇÃO DO SLIDER, INCRMENTAR O PARAMETRO DATA-INDEX APARTIR DO 1 -->
                <ul class="affiliates-carousel">
                	<!-- BEGIN ASSOCIADOS -->
                    <li><a href="#" data-reveal-id="ModalAssociados" data-index="{associado_index}"><img title="{associado_nome}" alt="{associado_nome}" src="{associado_marca}"/><h3>{associado_nome}</h3></a></li>
                	<!-- END ASSOCIADOS -->
                </ul>
                <a href="#" class="affiliates-carousel-prev prev"></a>
                <a href="#" class="affiliates-carousel-next next"></a>
            </div>
            <a class="button" href="{live}/associados/">Ver <b>todos associados</b></a>
        </section>
        
        <!-- BEGIN FORNECEDORES_AREA -->
        <a name="fornecedores" id="fornecedores"></a>
        <section class="expanded gray">
            <div class="col">
                <h1>Fornecedores</h1>
                <h2>{texto_subtitulo_fornecedor}</h2>
            
            <!-- OS ITENS DESTE UL SÃO REFERENTES AOS 
            ITENS DO MODAL DOS ASSOCIADOS DEVEM SER GERADOS NA MESMA ORDEM DEVIDO A NAVEGAÇÃO DO SLIDER, INCRMENTAR O PARAMETRO DATA-INDEX APARTIR DO 1 -->
                <ul class="fornecedores-carousel">
                	<!-- BEGIN FORNECEDORES -->
                    <li><a href="#" data-reveal-id="ModalFornecedor" data-index="{fornecedor_index}"><img title="{fornecedor_nome}" alt="{fornecedor_nome}" src="{fornecedor_marca}"/><h3>{fornecedor_nome}</h3></a></li>
                	<!-- END FORNECEDORES -->
                </ul>
                <a href="#" class="fornecedores-carousel-prev prev"></a>
                <a href="#" class="fornecedores-carousel-next next"></a>
            </div>
            <a class="button" href="{live}/fornecedores/">Ver <b>todos fornecedores</b></a>
        </section>
        <!-- END FORNECEDORES_AREA -->
        
        
        <a name="projetos" id="projetos"></a>            
        <section class="expanded">
            <div class="col">
                <h1>Conheça <b>nossos projetos</b></h1>
                <h2>{texto_subtitulo_projeto}</h2>
                <ul class="projects-carousel">
                    <!-- BEGIN PROJETOS -->
                    <li class="col-2">
                        <a href="{live}/projetos/acao/detalhe/id/{projeto_id}">
                            <img alt="{projeto_nome}" title="{projeto_nome}" src="{projeto_marca}">
                            <h3>{projeto_nome}</h3>
                            {projeto_texto}
                        </a>
                    </li>
                    <!-- END PROJETOS -->
                </ul>
                <a href="#" class="projects-carousel-prev prev"></a>
                <a href="#" class="projects-carousel-next next"></a>
            </div>
            <a class="button" href="{live}/projetos/">Ver <b>todos projetos</b></a>            
        </section>
        <a name="agenda" id="agenda"></a>
        <a name="downloads" id="downloads"></a>
        <section class="expanded gray events">
            <div class="col">
                <div class="col-2 calendar">
                    <div class="calendar-content"> 
                        <h1 class="center">Agenda / <b>Eventos</b></h1>
                        <div class="calendar-widget"></div>

                        

                    </div>
                    <a class="button" href="{live}/eventos/">Ver <b>todos eventos</b></a>
                </div>
                <div class="col-3">
                    <h1><b>Downloads</b></h1>
                    <h2>{texto_subtitulo_download}</h2>
                    <ul class="download-list">
                    	<!-- BEGIN CATEGORIAS_DOWNLOAD -->
                        <li>
                            <a href="#" class="cd-link" data-id="{categorias_download_id}" data-reveal-id="ModalDownload">
                                <img src="{categorias_download_icone}">
                                {categorias_download_nome}
                            </a>
                        </li>
                        <!-- END CATEGORIAS_DOWNLOAD -->
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>            
        </section>
        <a name="noticias" id="noticias"></a>
        <section class="expanded">
            <div class="col">
                <h1>Últimas <b>notícias</b></h1>
                <ul class="news-carousel">
                	<!-- BEGIN NOTICIAS -->
                    <li class="col-4">
                        <a href="{live}/noticias/acao/detalhe/id/{noticia_id}">
                            <img  alt="{noticia_titulo}" titulo="{noticia_titulo}" src="{noticia_imagem}">
                            <h3>{noticia_titulo}</h3>
                            <p>{noticia_texto}</p>
                        </a>
                    </li>
                	<!-- END NOTICIAS -->
                </ul>
                <a href="#" class="news-carousel-prev prev"></a>
                <a href="#" class="news-carousel-next next"></a>
            </div>
            <a class="button" href="{live}/noticias/">Ver <b>todas notícias</b></a>
        </section>
        <a name="contato" id="contato"></a>
        <a name="localizacao" id="localizacao"></a>
        <section class="expanded contact">
            <div class="contact">
                <div class="col">
                    <h1><b>Localização</b></h1>
                    <div class="contact-form">
                        <h1>Contato</h1>
                        {texto_subtitulo_contato}
                        <form action="{live}/contato/acao/enviar" id="form-contato" Method="POST">
                            <input type="text" name="nome" placeholder="Nome">
                            <input type="text" name="email" placeholder="E-mail">
                            <input type="text" name="telefone" placeholder="Telefone">
                            <input type="text" name="assunto" placeholder="Assunto">
                            <textarea name="mensagem" placeholder="Mensagem"></textarea>
                        </form>                        
                        <a class="button" href="#" onclick="return sendmail(this);">Enviar <b>mensagem</b></a>
                    </div>                    
                </div>
            </div>
        </section>