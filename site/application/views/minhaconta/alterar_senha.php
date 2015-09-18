<h3>Alterar <strong>Senha</strong></h3>
<div class="line2">&nbsp;</div>
<!-- BEGIN ALTERAR_SENHA -->
<form action="{live}/minha-conta/acao/atualizarSenha" METHOD="POST">
        <label>Senha Atual:</label>
        <input type="password" name="s-atual" class="input-default" value="" />
        <label>Nova Senha:</label>
        <input type="password" name="s-nova" class="input-default" value="" />
        <label>Repetir Nova Senha:</label>
        <input type="password" name="s-repetir" class="input-default" value="" />
        <input type="image" src="{live}/media/front/img/btn-alterar.jpg" class="botao-default" />
</form>
<!-- END ALTERAR_SENHA -->
<!-- BEGIN SENHA_ALTERADA -->
<p>
<br />
Sua senha foi alterada e enviada para seu e-mail.<br /><br />
<a href="{live}/minha-conta/acao/dadosCadastrais">« Voltar para Dados de Cadastro</a>
</p>
<!-- END SENHA_ALTERADA -->
<!-- BEGIN ERRO_SENHA -->
<p>
<br />
{erro}<br /><br />
<a href="{live}/minha-conta/acao/alterarSenha">« Voltar e Alterar Senha novamente</a>
</p>
<!-- END ERRO_SENHA -->