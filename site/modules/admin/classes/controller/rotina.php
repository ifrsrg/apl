<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Rotina extends ControllerAdmin {

	public $isAcessoShell = false;
	
	function __construct($request, $response){
		$this->isAcessoShell = $this->verificaAcessoShell(); 
		if($this->isAcessoShell){
			$this->autenticaUsuarioRotina();
		}
		parent::__construct($request, $response);
		if(ROTINA_SHELL_ONLY){
			if(!$this->isAcessoShell){
				$this->request->action("sempermissaohttp");
			}
		}
	}
	
	public function action_index()
	{
		$this->showMensagem("Você deve acessar esse controller apenas com uma action");
	}
	
	public function verificaAcessoShell(){
		return ISSHELL;
	}
	
	public function autenticaUsuarioRotina(){
		$this->usuario = ORM::factory("usuario");
		$this->usuario->where('usuario', '=', 'servico');
		$this->usuario->find();
		if($this->usuario->id_usuario){
			$session = Session::instance();
			$session->set("id_usuario", $this->usuario->id_usuario);
			return true;
		}
		return false;
	}
	
	public function showMensagem($mensagem){
		if($this->isAcessoShell){
			$this->response->body($mensagem);
		}
		else{
			$view = ViewTemplateAdmin::factory("mensagem/index", $this->usuario);
			$view->tpl->mensagem = nl2br($mensagem);
			$this->response->body($view);
		}
	}
	
	public function action_sempermissaohttp()
	{
		$this->showMensagem("As rotinas só podem ser acessadas por chamada SHELL");
	}
    
    // Para chamar a rotina por cron deve-se chamar "php index.php --uri=/rotina/acao/getdata"
	public function action_getdata() {
		$sent = 0;
		///Inicio
		//verificaQualidadeAr();
		//$min = 38;
		
		//$itens = ORM::factory('qualidade_ar')->getUltimosPorZona();
		//foreach ($itens as $item) {
			//$msg = ORM::factory("mensagem");
			
			//if($item['umidade'] < $min) {
				//if($msg->enviar(Model_Mensagem_Tipo::$QualidadeAr, $item['umidade'].' de Umidade do Ar ('.$item['zona_nome'].'). Dica: '.$item['dica']))
					//$sent++;
			//}
		//}
		
		//verificaTransito();

		//$max = 10;
		//$itens = ORM::factory('transito')->getTotalPorZona();
		//foreach ($itens as $item) {
			//$msg = ORM::factory("mensagem");
			
			//if($item['km_total'] > $max) {
				//if($msg->enviar(Model_Mensagem_Tipo::$Transito, $item['zona_nome'].': Trânsito com '.$item['km_total'].' km de Congestionamento.'))
					//$sent++;
			//}
		//}
		///Fim
		
		//$msg = ORM::factory('mensagem');
		//$msg->limparBase(); // Apaga mensagens antigas
		echo "$sent mensagens foram cadastradas.";
	}
	
	// Para chamar a rotina por cron deve-se chamar "php index.php --uri=/rotina/acao/senddata"
	public function action_senddata() {
		$msg = ORM::factory("mensagem");
		$sent = $msg->enviarMensagemAmazon();
		echo "$sent mensagens foram enviadas.";
	}
} 
