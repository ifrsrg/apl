<header>
	<div class="nav-content">
		<a href="#"><img src="{live}/media/front/img/logo.jpg"></a>
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
		<li class="active"><a href="#apresentacao" class="anchorLink">Apresentação</a></li>
		<li class="divisor"></li>
		<li><a href="#associados" class="anchorLink">Associados</a></li>
		<li class="divisor"></li>
		<li><a href="#projetos" class="anchorLink">Projetos</a></li>
		<li class="divisor"></li>
		<li><a href="#agenda" class="anchorLink">Agenda</a></li>
		<li class="divisor"></li>
		<li><a href="#downloads" class="anchorLink">Downloads</a></li>
		<li class="divisor"></li>
		<li><a href="#noticias" class="anchorLink">Notícias</a></li>
		<li class="divisor"></li>
		<li><a href="#localizacao" class="anchorLink">Localização</a></li>
		<li class="divisor"></li>
		<li><a href="#contato" class="anchorLink">Contato</a></li>
	</ul>
</nav>

        <!-- MODAL LOGIN -->
        <div class="reveal-modal" id="ModalLogin">
            <h1>Acesso <b>Restrito</b></h1>
            <div class="line"></div>

            <form>
                <input type="text" name="email" placeholder="E-mail"><br>
                <input type="password" name="senha" placeholder="Senha">
            </form>
            <a href="#" onclick="return esqueciSenha(this);">Esqueci minha senha</a>
            <a href="#" onclick="return login(this);" class="button">Entrar</a>

            <a class="close-reveal-modal"></a>
        </div>        
