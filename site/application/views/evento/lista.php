<div class="conceitual intern">
            <div class="conceitual-carousel-container intern">
                <img src="{live}/media/front/img/01-interna.jpg">
            </div>
        </div>
        <section>
            <div class="col">
                <h1>Eventos</h1>                
                {texto_subtitulo_evento}
                <br>
            </div>
        </section>

        <section class="expanded nopadding projects">
            <div class="col">
                <ul class="projects-list">
                    <!-- BEGIN EVENTOS -->
                    <li class="col-2 center">
                        <a href="{live}/eventos/acao/detalhe/id/{evento_id}">
                            <img src="{evento_marca}" width="250">
                            <h3>{evento_nome}</h3>
                            <p>{evento_texto}</p>
                        </a>
                    </li>
                    <!-- BEGIN EVENTO_BREAK -->
                    <div class="clearfix"></div>
                    <!-- END EVENTO_BREAK -->
                    <!-- END EVENTOS -->
                </ul>
                <div class="clearfix"></div>                
            </div>
        </section>

        <!-- BEGIN MORE_EVENTO -->
        <a class="bt-more-events" offset="6" data="{data}" href="#"><span>mais eventos</span></a>
        <!-- END MORE_EVENTO -->