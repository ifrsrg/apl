<?php defined('SYSPATH') or die('No direct access allowed.');

class Model_Usuario extends ORM {
	
	function getLista($where = array(), $limit = 0, $offset = 0){
		
		foreach($where as $condition)
			$this->where($condition[0], $condition[1], $condition[2]);
		
		if($limit)
			$this->limit($limit);
		
		if($offset)
			$this->offset($offset);
		
		return $this->find_all()->as_array();
	}
	
	function getCount($where = array()){ 
		foreach($where as $condition)
			$this->where($condition[0], $condition[1], $condition[2]);
		
		return $this->count_all();
	}
	
	function validaEmail($email, $id = null){
		$this->where('email', '=', $email);
		
		if($id)
			$this->where('id_usuario', '!=', $id);
		
		return !(bool)$this->count_all();
	}
	
	function login($email, $senha){
		$this->where($this->_object_name.'.email', '=', $email);
		$this->where($this->_object_name.'.senha', '=', md5($senha));
		$this->find();
		if($this->id_usuario){
			$session = Session::instance();
			$session->set("id_usuario", $this->id_usuario);
			return true;
		}
		return false;
	}
	
	function deslogar(){
		$session = Session::instance();
		$session->delete("id_usuario");
	}
	
	function loadLogado(){
		$session = Session::instance();
		
		if($session->get("id_usuario",false)){
			$this->where($this->_object_name.'.'.$this->_primary_key, '=', $session->get("id_usuario"))->find();
			return $this->id_usuario;
		}
		return false;
	}
	
	function isLogado(){
		return ($this->id_usuario);
	}
	
	function verificaPermissao($controller, $action=false, $id=false){
		
		if($this->admin==1){
			return true;
		}
		return false;
	}
	
	function esqueciSenha($email) {
		
		if ($email) {
			$senhaRandom = substr(md5(rand(0,1000)),0,6);
			
			$this->where($this->_object_name.'.email', '=', $email);
			$this->find();

			if($this->id_usuario){					
				// enviar o e-mail				
				$tpl = new Template(Kohana::find_file('views/email', 'esquecisenha'));
				$tpl->live = absolutePath();
				$tpl->email = $email;
				$tpl->nome = $this->nome;  
				$tpl->novasenha = $senhaRandom;
				date_default_timezone_set('America/Sao_Paulo');
				$tpl->data = date('d/m/Y - H:i');
				$email_sender = new Email($tpl->getContent(), "APL - Sua senha foi redefinida");
				$email_sender->addDestinatario($email);
				
				if ($email_sender->smtpSend()) {
					// setar a senha depois de enviar o email garante que a senha só vai ser trocada
					//   se não ocorrer nenhum problema no envio do mesmo, por mais estranho que isso pareça
					$this->senha = md5($senhaRandom);
					$this->save();
					$this->clear();
					return "Sua senha foi resetada e enviada por email para ".$email;
				} else {
					$this->clear();
					return "Ocorreu um erro: entre em contato com o Administrador do Sistema.";
				}			
			} else {
				return "Usuário não encontrado";
			}
		} else {
			return "Não houve email enviado";
		}
	}
	
}