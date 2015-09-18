<div class="conceitual intern">
            <div class="conceitual-carousel-container intern">
                <img src="{live}/media/front/img/01-interna.jpg">
            </div>
        </div>
        <section class="marginbottom30">
            
            <div class="col-2-1 col-project-detail">                
                <h1><b>{nome}</b></h1>
                <div class="border-right">                    
                    <p><img src="{marca}"></p>
                    {texto}
                </div>
            </div>
            <div class="col-2">
                <ul class="project-data">
                	<!-- BEGIN HAS_DATA_INICIO -->
                    	<li>Início: <span>{data_inicio}</span></li>
                    <!-- END HAS_DATA_INICIO -->
                	<!-- BEGIN HAS_DATA_TERMINO -->
                    	<li>Término: <span>{data_termino}</span></li>
                	<!-- END HAS_DATA_TERMINO -->
                	<!-- BEGIN HAS_STATUS -->
                    	<li>Status do projeto: <span>{status}</span></li>
                	<!-- END HAS_STATUS -->
                </ul>
                <div class="project-partners">
                	<!-- BEGIN HAS_EXECUCAO -->
	                    <h4>Execução</h4>
	                    <img src="{execucao}">
                    <!-- END HAS_EXECUCAO -->
                    <!-- BEGIN HAS_FINANCIAMENTO -->
	                    <h4>Financiamento</h4>
	                    <img src="{financiamento}">
                    <!-- END HAS_FINANCIAMENTO -->
                </div>
            </div>            
            <div class="clearfix"></div>

        </section>        
        <!-- BEGIN DOWNLOADS -->
        <section class="expanded gray agenda">
            <div class="col">
                <h1 class="left">Agenda de <b>Ações</b></h1>
                <!-- BEGIN DOWNLOAD_PUBLICO -->
                    {texto_agenda_acoes}
                    <a href="{arquivo}" class="button download-actions">Download da agenda de ações</a>
                <!-- END DOWNLOAD_PUBLICO -->


                <!-- BEGIN DOWNLOAD_PRIVADO -->
                    {texto_agenda_completa}
                    <a href="{arquivo_restrito}" class="button download-actions restrito"><span>&nbsp</span>Download da agenda de ações completa</a>
                <!-- END DOWNLOAD_PRIVADO -->
            </div>
        </section>
        <!-- END DOWNLOADS -->
        <a name="projetos" id="projetos"></a>            
        <section class="expanded">
            <div class="col">
                <h1>Conheça <b>outros projetos</b></h1>
                {subtitulo_projeto}
                <span class='projetos-outros'>
	                <ul class="projects-carousel">
	                    <!-- BEGIN PROJETOS -->
	                    <li class="col-2">
	                        <a href="{live}/projetos/acao/detalhe/id/{projeto_id}">
	                            <img src="{projeto_marca}">
	                            <h3>{projeto_nome}</h3>
	                            <p>{projeto_texto}</p>
	                        </a>
	                    </li>
	                    <!-- END PROJETOS -->
	                </ul>
                </span>
                <a href="#" class="projects-carousel-prev prev"></a>
                <a href="#" class="projects-carousel-next next"></a>
            </div>
            <a class="button" href="{live}/projetos/">Ver <b>todos projetos</b></a>            
        </section>       