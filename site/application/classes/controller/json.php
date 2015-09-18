<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Json extends ControllerFront {
	
	public function action_eventos(){
		$data = array();
		
		$eventos = ORM::factory("evento")->getLista();
		foreach ($eventos as $evento) {
			$adicionado = false;
			
			for($i = 0; $i < count($data); $i++) {
				if($data[$i]["date"] == date("U",strtotime($evento->data))."000")
				{
					$adicionado = true;
					$data[$i]["url"] = live()."/eventos/?data=".date("Y-m-d",strtotime($evento->data));
				}
			}
			
			if(!$adicionado) {
				$data[] = array(
					"date" => date("U",strtotime($evento->data))."000",
					"url" => live()."/eventos/acao/detalhe/id/".$evento->id_evento
				);
			}
		}
		
		echo json_encode($data);
	}
	
	
	public function action_download() {
		
		$usuario = ORM::factory("usuario");
		$usuario->loadLogado();
		
		$downloads = ORM::factory("download")->getLista(array(array("download.id_download_categoria","=",$_POST["id"])));
		$data = array();
		
		foreach($downloads as $download) {
			if($download->restricao != 1 || $usuario->isLogado()) {
				$data[] = array(
					"nome" => $download->nome,
					"id" => $download->id_download,
				 	"url" => $download->arquivo
				);
			}
		}
		
		echo json_encode($data);
	}
} 
