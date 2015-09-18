
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
                        <!-- BEGIN HAS_PROJETO -->
                        <h3>Projetos:</h3>
                        {associado_projetos}
                        <!-- END HAS_PROJETO -->
                    </div>
                </li>
                <!-- END ASSOCIADO_MODAL -->
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
                <h1>Conheça <b>nossos associados</b></h1>                
                <p>{texto_subtitulo_associados}</p>
            </div>
        </section>

        <section class="expanded nopadding projects">
            <div class="col">
                <ul class="affiliates-list">
                
                	<!-- BEGIN ASSOCIADOS -->
                    <li class="col-2 center">
                        <a href="#" data-reveal-id="ModalAssociados" data-index="{associado_index}">
                            <img title="{associado_nome}" alt="{associado_nome}" width="220" height="130" src="{associado_marca}">
                            <h3>{associado_nome}</h3>
                        </a>
                    </li>
                	<!-- END ASSOCIADOS -->
                	
                </ul>
                <div class="clearfix"></div>                
            </div>
        </section>

		<!-- BEGIN MORE_ASSOCIADO -->
        <a class="bt-more-affiliates" offset="6" href="#"><span>mais associados</span></a>
        <!-- END MORE_ASSOCIADO -->
