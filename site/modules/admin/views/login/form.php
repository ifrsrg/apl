<form action="{live}/admin/login/acao/autenticar" method="post" id="form-login">
	<div id="login-inner">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td colspan="3" class="msg-erro">{msg}&nbsp;</td>
		</tr>
		<tr>
			<th>E-mail</th>
			<td colspan="2"><input type="text"  class="login-inp" name="email" /></td>
		</tr>
		<tr>
			<th>Senha</th>
			<td colspan="2"><input type="password" value=""  name="senha" class="login-inp" /></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" class="btn-login" value="Acessar"  /></td>
			<td align="right"><a id="esqueci-senha" href="{live}/admin/login/acao/esqueciminhasenha">Esqueci minha senha</a></td>
		</tr>
		</table>
	</div>
	<div class="clear"></div>
</form>