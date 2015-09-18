	 <script type="text/javascript" src="{live}/media/front/js/acesso/facebook.js"></script>
	 <script type="text/javascript">
	 	$(document).ready(function(){
		 	<!-- BEGIN MENSAGEM -->
		 	alert('{msg}');
		 	<!-- END MENSAGEM -->
		 	$('#cp-email').focus();
	 	});
	 </script>
	 <div>
        <div class="limite">
            <br class="clear" />
            <div id="main">
            	<div class="dv-acessar logar-minha-conta">
            		<h2>ACESSAR <strong>MINHA CONTA</strong></h2>
            		<div class="box-acessar">
            			<form action="{live}/acesso/acao/autenticar" method="post" id="form-login">            			
            				<input type="hidden" name="tplOrigem" value="" />
            				<input type="hidden" name="redirect" value="{redirect}" />
            				<label>E-mail:</label>
            				<input type="text" id="cp-email" name="email" value="" />
            				<label>Senha:</label>
            				<input type="password" name="senha" value="" />
            				<input type="image" src="{live}/media/front/img/bt-acessar.png" class="botao" />
            				<a href="{live}/acesso/acao/recuperar-senha" id="esqueci-senha">Esqueci minha Senha</a>
            			</form>
            		</div>
            		<div class="dv-facebook">
            			<h3>VOCÊ TEM <strong>FACEBOOK?</strong></h3>
            			<a href="{live}/acesso/acao/facebook" class="facebook"><img src="{live}/media/front/img/bt-facebook.png" /></a>
            			<p>Acessos feitos pelos Facebook não podem criar anúncios, somente após completar o cadastro.</p>
            			<p class="quero-cadastrar">Não tenho conta,</p> <a href="{live}/cadastro" class="lnk-quero-cadastrar"><img src="{live}/media/front/img/bt-quero-cadastrar.png" /></a>
            		</div>
            	</div>
            	<br class="clear" />
            	<br class="clear" />
            	<br class="clear" />
            	<br class="clear" />
            	<br class="clear" />
            	<br class="clear" />
            	<br class="clear" />
            	<br class="clear" />
            	<br class="clear" />
            	<br class="clear" />
			</div>
        </div>
    </div>