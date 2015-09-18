				
		<div class="conceitual intern">
            <div class="conceitual-carousel-container intern">
                <img src="{live}/media/front/img/01-interna.jpg">
            </div>
        </div>
        <section class="marginbottom30">
            
            <div class="col-2-1 col-project-detail">                
                <h1>{nome}</h1>
                <div class="border-right">
                    <ul class="project-data">
                        <li>Data:<span> {data}</span></li>
                        <li>Local:<span> {local}</span></li>
                        <li>Hora:<span> {hora}</span></li>
                    </ul>
                    {texto}
                </div>
            </div>
            <div class="col-2">
                <div class="project-partners">
                    <img src="{marca}">
                    <h2>Saiba <b>como chegar</b></h2>
                    <map value="{coordenadas}"  width="300" height="130"/>
                </div>
            </div>            
            <div class="clearfix"></div>

        </section>
        <section class="expanded gray">
            <div class="col">
                <h1>Programação / <b>Grade de horários</b></h1>
                {programacao}
            </div>
        </section>
        <section class="expanded speakers">
            <div class="col">
                <h1 class="left">Palestrantes</h1>
                {palestrantes}
                <div class="clearfix"></div>
            </div>
        </section>          
        <section class="expanded gray">
            <div class="col">
                <h1>Parceiros</h1>
                {parceiros}
            </div>
        </section>
        <section class="expanded gallery">
            <div class="col">
                <h1 class="left">Galeria de imagens</h1>
                <h2 class="left">{subtitulo_evento_galeria}</h2>
                <ul class="gallery-carousel">
                	<!-- BEGIN FOTO_GRANDE -->
                    	<li data-index="{data_index}" data-page="{data_page}"><img src="{imagem}"></li>
                    <!-- END FOTO_GRANDE -->
                </ul>
                <a href="#" class="gallery-carousel-prev prev"></a>
                <a href="#" class="gallery-carousel-next next"></a>
                <ul class="gallery-thumb-carousel">
                	<!-- BEGIN FOTO_PEQUENA -->
                    	<li {select} data-index="{data_index}" data-page="{data_page}"><img src="{imagem_pequena}"></li>
                    <!-- END FOTO_PEQUENA -->
                </ul>
            </div>
            <a class="button marginbottom30" href="#">Voltar <b>ao topo</b></a>

        </section>
        <script src="{live}/js/field_ext.js" type="text/javascript"></script>