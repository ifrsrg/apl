<header>
	<div class="nav-content">
		<a href="{live}/"><img src="{live}/media/front/img/logo.jpg"></a>
	</div>
	<div class="nav-lock"></div>
	<div class="nav-right">
		<ul>
		<!-- BEGIN DESLOGADO -->
			<li><a href="#" data-reveal-id="ModalLogin">Acesso <b>restrito</b></a></li>
		<!-- END DESLOGADO -->
		<!-- BEGIN LOGADO -->
			<li>
				<select onchange="return paginaRestrita(this);">
					<option value="0">Áreas Restritas</option>
					<option value="fornecedores">Fornecedores</option>
					<option value="downloads">Downloads</option>
					<!-- BEGIN ADMIN -->
						<option value="admin">Administrador</option>
					<!-- END ADMIN -->
				</select>
				<a style="position:absolute;visibility:hidden;" class="anchorPlaceholder anchorLink">
			</li>
			<li>
				<a href="#" onclick="return deslogar(this);">Sair</a>
			</li>
		<!-- END LOGADO -->
		</ul>
	</div>
</header>
<nav>
	<ul id="top-menu">
		<li><a href="{live}/#apresentacao" class="">Apresentação</a></li>
		<li class="divisor"></li>
		<li><a href="{live}/#associados" class="">Associados</a></li>
		<li class="divisor"></li>
		<li><a href="{live}/#projetos" class="">Projetos</a></li>
		<li class="divisor"></li>
		<li><a href="{live}/#agenda" class="">Agenda</a></li>
		<li class="divisor"></li>
		<li><a href="{live}/#downloads" class="">Downloads</a></li>
		<li class="divisor"></li>
		<li><a href="{live}/#noticias" class="">Notícias</a></li>
		<li class="divisor"></li>
		<li><a href="{live}/#localizacao" class="">Localização</a></li>
		<li class="divisor"></li>
		<li><a href="{live}/#contato" class="">Contato</a></li>
	</ul>
</nav>

        <!-- MODAL LOGIN -->
        <div class="reveal-modal" id="ModalLogin">
            <h1>Acesso <b>Restrito</b></h1>
            <div class="line"></div>

            <form>
                <input type="text" name="username" placeholder="E-mail"><br>
                <input type="password" name="password" placeholder="Senha">
            </form>
            <a href="#" onclick="return esqueciSenha(this);">Esqueci minha senha</a>
            <a href="#" onclick="return login(this);" class="button">Entrar</a>

            <a class="close-reveal-modal"></a>
        </div>        
