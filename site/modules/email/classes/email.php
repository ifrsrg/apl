<?php
class Email {
	
	public $msg = null;
	public $subject = null;
	public $to = array();
	public $erro = null;
	
	public function __construct($msg, $subject) {
		$this->msg = $msg;
		$this->subject = $subject;
		
	}
	
	public function addDestinatario($destinatario) {
		$this->to[] = $destinatario;
	}
	
	public function smtpSend() {
		$mail = new PHPMailer();
		
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->Host = MAIL_HOST;
		$mail->Port = MAIL_PORTA;
		$mail->Username = MAIL_USUARIO;
		$mail->Password = MAIL_SENHA;
		$mail->CharSet = 'UTF-8';
		
		if(MAIL_SECURE!=""){
			if(MAIL_SECURE=="SSL"){
				$mail->Host = 'ssl://'.$mail->Host;
			}else{
				$mail->SMTPSecure = MAIL_SECURE;
			}
			 
		}
		
		$mail->setFrom(MAIL_USUARIO);
		
		foreach($this->to as $destinatario)
			$mail->AddAddress($destinatario);
		$mail->Subject = $this->subject;
		
		$mail->MsgHTML($this->msg);
		
		if($mail->Send()) {
			return 1;
		} else {
			$this->erro = $mail->ErrorInfo;
		}
	}
	
	public function getErro() {
		return $this->erro;
	}
	
	
}