	<div id="conteudo">
        <div class="limite">
            <br class="clear" />
            <div id="main">
				<div id="breadcrumb" class="duvidas-frequentes"><a href="{live}" title="ABC Classificados">ABC Classificados</a><span>&nbsp;</span>Dúvidas Frequentes</div>
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
					<p class="txt-encontra-resposta">
						Encontre respostas para as principais dúvidas sobre o ABC Classificados.<br/>
						As dúvidas estão separadas por categorias, mas você também pode utilizar o campo de busca, abaixo.
					</p>
					<form class="box-busca-duvida-interna" action="{live}/duvidas-frequentes/acao/busca" method="get">
						<input type="text" class="campo-busca-interna" name="termo" />
						<input type="image" src="{live}/media/front/img/bt-buscar-mod.jpg" />
					</form>
					<div class="barra-cinza-horizontal">&nbsp;</div>
					<ul class="lista-perguntas">
						<!-- BEGIN DUVIDA -->
						<li class="{classe_duvida}"><a href="{live}/duvidas-frequentes/acao/ver/id/{id_duvida}" title="{duvida}">{duvida}</a></li>
						<!-- END DUVIDA -->
					</ul>
				</div>
                <br class="clear" />
            </div>
        </div>
    </div>
