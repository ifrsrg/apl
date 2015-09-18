<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Services extends ControllerFront {

	public function action_index(){
		if(isset($_GET['zona'])) {
			$zona = $_GET['zona'];
		} else {
			$zona = 'c';
		}

		$jsonResult = array('zona'=>$zona);
			
		// $jsonResult['clima']
			
		$bdobj = ORM::factory("clima");
			
		$item = $bdobj->getLastItem();
		$itens = array(
					'temp' => $item->temperatura,
					'precip' => $item->precipitacao,
					'vento_dir' => $item->direcao_vento,
					'vento_vel' => $item->velocidade_vento,
					'desc' => $item->descricao,
					'chuva' => $item->probabilidade_chuva,
					'nascersol' => $item->nascer_sol,
					'porsol' => $item->por_sol
		);

		$jsonResult['clima'] = $itens;
			
		// $jsonResult['ar']
			
		$bdobj = ORM::factory("qualidade_ar");
			
		$itens = array();
		$bditens = $bdobj->getLista();
			
		foreach($bditens as $item) {
			$itens[] = array(
					'umid' => $item->umidade,
					'qual' => $item->qualidade,
					'desc' => $item->dica
			);
		}
			
		$jsonResult['ar'] = $itens;
			
		// $jsonResult['aeroporto']
		$bdobj = ORM::factory("aeroporto");
			
		$itens = array();
		$bditens = $bdobj->getLista();
			
		$abertos = 0;
		$fechados = 0;
			
		foreach($bditens as $item) {
			$itens[] = array(
					'nome' => $item->nome,
					'prog' => $item->programados,
					'atraso' => $item->atrasados,
					'atraso_perc' => $item->atrasados_percentual,
					'momento' => $item->atrasados_momento,
					'momento_perc' => $item->atrasados_momento_percentual,
					'cancel' => $item->cancelados,
					'cancel_perc' => $item->cancelados_percentual,
					'link_info' => $item->link_info
			);
			if($item->status) $abertos++;
			else $fechados++;
		}
			
		$jsonResult['aeroporto'] =
		array(
				'stat' => $abertos,
				'stat_prob' => $fechados,
				'lista' => $itens
		);
		// $jsonResult['transpub']
			
		$bdobj = ORM::factory("transporte_publico");
			
		$itens = array();
		$bditens = $bdobj->getLista();
			
		foreach($bditens as $item) {
			$itens[$item->tt_nome][] = array(
					'stat' => toMinuscula($item->farol_nome),
					'desc' => $item->texto
			);
		}
			
		$jsonResult['transpub'] = $itens;
			
		// $jsonResult['transito']
			
		$bdobj = ORM::factory("transito");
			
		$itens = array();
		$bditens = $bdobj->getLastItem();
		
		$itens = array(
				'stat' => toMinuscula($bditens->farol_nome),
				'stat_desc' => $bditens->farol_desc,
				'imgmapa' => $bditens->link_mapa,
				'km_norte' => $bditens->km_norte,
				'km_oeste' => $bditens->km_oeste,
				'km_centro' => $bditens->km_centro,
				'km_leste' => $bditens->km_leste,
				'km_sul' => $bditens->km_sul,
				'km_total' => $bditens->km_norte + $bditens->km_oeste + $bditens->km_centro + $bditens->km_leste + $bditens->km_sul,
				'link_fluidez' => $bditens->link_fluidez,
				'link_lentidao' => $bditens->link_lentidao
		);
			
		$jsonResult['transito'] = $itens;
			
		// $jsonResult['alagamento']
		$bdobj = ORM::factory("alagamento");
			
		$itens = array();
		$bditens = $bdobj->getLista();
			
		foreach($bditens as $item) {
			$itens[] = array(
					'stat' => toMinuscula($item->farol_nome),
					'hora' => $item->horario,
					'local' => $item->local,
					'sentido' => $item->sentido,
					'referencia' => $item->referencia
			);
		}
			
		$jsonResult['alagamento'] = $itens;
		
		// $jsonResult['alertageral']
		$bdobj = ORM::factory("alerta_geral");
			
		$itens = array();
		$bditens = $bdobj->getListaPorZona($zona);
			
		foreach($bditens as $item) {
			$itens[] = array(
					'stat' => Model_Farol::$arr_farolAlerta[$item->id_farol-1]['nome'],
					'mensagem' => $item->mensagem
			);
		}
			
		$jsonResult['alertageral'] = $itens;
					
		// $jsonResult['situacao']
		$bdobj = ORM::factory("situacao");
			
		$itens = array();
		$bditens = $bdobj->getPorZona($zona);
		
		if(count($bditens)) {
			$jsonResult['arvores'] = $bditens[0]['arvores_caidas'];
			$jsonResult['semaforos'] = $bditens[0]['semaforos_desativados'];
			$jsonResult['link_mapa_op_verao'] = $bditens[0]['link_mapa'];
		}
			
		die(json_encode($jsonResult));
	}

}
