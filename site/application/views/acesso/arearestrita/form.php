	 <script type="text/javascript">
	 	$(document).ready(function(){
		 	<!-- BEGIN MENSAGEM -->
		 	alert('{msg}');
		 	<!-- END MENSAGEM -->
		 	$('#cp-email').focus();
	 	});
	 </script>
	 <div id="area-restrita">
        <div class="limite">
            <br class="clear" />
            <div id="main">
            	<div class="dv-acessar">
            		<h2>ACESSAR <strong>ÁREA RESTRITA</strong></h2>
            		<div class="box-acessar">
            			<form action="{live}/acesso/acao/autenticar" method="post" id="form-login">
            				<input type="hidden" name="tplOrigem" value="/arearestrita" />
            				<input type="hidden" name="redirect" value="{redirect}" />
            				<label>E-mail:</label>
            				<input type="text" id="cp-email" name="email" value="" />
            				<label>Senha:</label>
            				<input type="password" name="senha" value="" />
            				<input type="image" src="{live}/media/front/img/bt-acessar.png" class="botao" />
            				<a href="{live}/acesso/acao/esquecisenha" id="esqueci-senha">Esqueci minha Senha</a>
            			</form>
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