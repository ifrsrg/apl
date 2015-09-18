<div id="conteudo">
        <div class="limite">
            <br class="clear" />
            <div id="main">
				<div id="breadcrumb" class="duvidas-frequentes"><a href="{live}" title="ABC Classificados">ABC Classificados</a><span>&nbsp;</span><a href="{live}/duvidas-frequentes" title="Dúvidas Frequentes">Dúvidas Frequentes</a><span>&nbsp;</span>Resultado de Busca</div>
                <br class="clear" />
                <div class="col-topicos">
					<img src="{live}/media/front/img/topo-topicos.png" width="206" height="5" alt="Tópicos" title="Tópicos" />
					<div class="box-topicos">	
						<h3 class="tit-topicos">TÓPICOS</h3>
						<ul class="lista-topicos">
							<!-- BEGIN TOPICO -->
							<li class="{classe_topico}"><a href="{live}/duvidas-frequentes?topico={id}" title="{topico}">{topico}</a></li>
							<!-- END TOPICO -->
						</ul>
					</div>
					<img src="{live}/media/front/img/base-topicos.png" width="206" height="5" alt="Tópicos" title="Tópicos" />
				</div>
				<div class="coluna-conteudo-interna-mod">
					<h2 class="tit-duvidas">DÚVIDAS FREQUENTES</h2>
					<form class="box-busca-duvida-interna" action="{live}/duvidas-frequentes/acao/busca" method="get">
						<input type="text" class="campo-busca-interna" name="termo" />
							<input type="image" src="{live}/media/front/img/bt-buscar-mod.jpg" />
					</form>
					<p class="txt-resultado-duvida">{foram} {encontradas} {total} {respostas} para sua busca.</p>
					<div class="barra-cinza-horizontal">&nbsp;</div>
					<ul class="lista-perguntas">
						<!-- BEGIN DUVIDA -->
						<li class="{classe_duvidas}"><a href="{live}/duvidas-frequentes/acao/ver/id/{id_duvida}" title="{titulo}">{titulo}</a></li>
						<!-- END DUVIDA -->
					</ul>
					{paginacao}
                    <br class="clear" />
                </div>
				</div>
                <br class="clear" />
            </div>
        </div>
    </div>