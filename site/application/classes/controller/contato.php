<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Contato extends ControllerFront {
	
	public function action_enviar(){
		$tpl = new Template(Kohana::find_file('views/email', 'contato'));
		
		$nome = $_POST["nome"];
		$email = $_POST["email"];
		$telefone = $_POST["telefone"];
		$assunto = $_POST["assunto"];
		$mensagem = $_POST["mensagem"];		
		
		if(!($nome&&$email&&$telefone&&$assunto&&$mensagem)) {
			exit("0|Erro ao enviar o email, por favor tente mais tarde.");
		}
		
		$tpl->email = $email;
		$tpl->nome = $nome;  
		$tpl->telefone = $telefone;
		date_default_timezone_set('America/Sao_Paulo');
		$tpl->data = date('d/m/Y - H:i');
		$tpl->assunto = $assunto;
		$tpl->mensagem = $mensagem;
		
		$email_sender = new Email($tpl->getContent(), "APL - Contato: ".$assunto);
		$email_sender->addDestinatario(MAIL_USUARIO);
		
		if ($email_sender->smtpSend()) {
			exit("1|Email enviado com sucesso!");
		} else {
			exit("0|Erro ao enviar o email, por favor tente mais tarde.");
		}
	}
	
	
	
} 
