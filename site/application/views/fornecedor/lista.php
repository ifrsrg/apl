		<!-- MODAL FORNECEDORES -->
        <div class="reveal-modal" id="ModalAssociados">
            <h1>Fornecedores <b>APL</b></h1>            
            <div class="line"></div>

            <!-- OS ITENS DESTE UL SÃO REFERENTES AOS 
            ITENS DOS ASSOCIADOS DEVEM SER GERADOS NA MESMA ORDEM DEVIDO A NAVEGAÇÃO DO SLIDER -->

            <ul class="modal-carousel">
            	<!-- BEGIN FORNECEDORES_MODAL -->
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
                        <!-- BEGIN HAS_PROJETO -->
                        <h3>Projetos:</h3>
                        {fornecedor_projetos}
                        <!-- END HAS_PROJETO -->
                    </div>
                </li>
                <!-- END FORNECEDORES_MODAL -->
            </ul>
            <a href="#" class="modal-carousel-prev prev"></a>
            <a href="#" class="modal-carousel-next next"></a>
            <a class="close-reveal-modal"></a>
        </div>

        <div class="conceitual intern">
            <div class="conceitual-carousel-container intern">
                <ul class="conceitual-carousel">
                    <li><img alt="APL do Polo Naval" title="APL do Polo Naval" src="{live}/media/front/img/01-interna.jpg"></li>
                </ul>
                <div class="conceitual-carousel-pagination"></div>
            </div>
        </div>
        
        <section>
            <div class="col">
                <h1>Conheça <b>nossos fornecedores</b></h1>                
                <p>{texto_subtitulo_fornecedores}</p>
            </div>
        </section>

        <section class="expanded nopadding projects">
            <div class="col">
                <ul class="affiliates-list">
                
                	<!-- BEGIN FORNECEDORES -->
                    <li class="col-2 center">
                        <a href="#" data-reveal-id="ModalAssociados" data-index="{fornecedor_index}">
                            <img title="{fornecedor_nome}" alt="{fornecedor_nome}" width="220" height="130" src="{fornecedor_marca}">
                            <h3>{fornecedor_nome}</h3>
                        </a>
                    </li>
                	<!-- END FORNECEDORES -->
                	
                </ul>
                <div class="clearfix"></div>                
            </div>
        </section>

		<!-- BEGIN MORE_FORNECEDOR -->
        <a class="bt-more-affiliates" offset="6" href="#"><span>mais fornecedores</span></a>
        <!-- END MORE_FORNECEDOR -->
