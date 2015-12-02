<div class="conceitual intern">
            <div class="conceitual-carousel-container intern">
                <img src="{live}/media/front/img/01-interna.jpg">
            </div>
        </div>
        <section style="margin-bottom: 10px;">
            <div class="col">
                <h1 style="display:inline-block;">
                    <b>Notícias</b>
                </h1> 
                <form method="get"  style="float:right; "> 
                    <input name="q" type="text" size="30" 
                        maxlength="30" placeholder="busca por palavra-chave" 
                        title="Parte do titulo ou texto da noticia" value="{q}">
                    <input type="submit" value="buscar">
                </form>   
                <br>
            </div>
        </section>

        <section class="expanded nopadding projects">
            <div class="col">
                <ul class="projects-list">
                    <!-- BEGIN NOTICIAS -->
                    <li class="col-2 center">
                        <a href="{live}/noticias/acao/detalhe/id/{noticia_id}">
                            <img src="{noticia_marca}" width="250">
                            <h3>{noticia_nome}</h3>
                            <h5>{data}</h5>
                            <p>{noticia_texto}</p>
                        </a>
                    </li>
                    <!-- BEGIN NOTICIA_BREAK -->
                    <div class="clearfix"></div>
                    <!-- END NOTICIA_BREAK -->
                    <!-- END NOTICIAS -->
                </ul>
                <div class="clearfix"></div>                
            </div>
        </section>

        <!-- BEGIN MORE_NEWS -->
        <a class="bt-more-news" offset="6" q="{q}" href="#"><span>mais notícia</span></a>
        <!-- END MORE_NEWS -->