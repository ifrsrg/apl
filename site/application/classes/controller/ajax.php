<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Ajax extends ControllerFront {

	public function loadInformacoes()
	{
		$this->info->paginaHTTPS = isHTTPS();
	}

	public function action_cidade() {
		$id = $this->request->post('id_estado');

		$selecione = $this->request->post('selecione') ? $this->request->post('selecione') : 'Selecione';

		exit(listaCidades($id, null, $selecione));
	}
        
        public function action_bairros() {
		$id = $this->request->query('c');
                settype($id, 'integer');
                $query = "SELECT DISTINCT CONCAT(UPPER(SUBSTRING(bairro, 1, 1)), LOWER(SUBSTRING(bairro FROM 2))) AS bairro 
			FROM anuncio_imovel ai
				INNER JOIN anuncio a ON ai.id_anuncio=a.id_anuncio 
		WHERE a.id_cidade = ".$id;
                $result = DB::query(Database::SELECT, $query )->execute()->as_array('bairro','bairro');
                exit(optlist($result));
	}
        
        public function action_categoria()
	{
		$sub = ORM::factory('categoria');
		$html = '<option value="">Selecione</option>';
		foreach($sub->where('id_segmento', '=', $this->request->post('id_segmento'))->find_all()->as_array('id_categoria', 'categoria') as $id => $categoria)
			$html .= '<option value="'.$id.'">'.$categoria.'</option>';
		exit($html);
	}

	public function action_subcategoria()
	{
		$categoria = $this->request->post('categoria');

		$subcategoria = ORM::factory('subcategoria');
		$subcategoria->where('id_categoria', '=', escape($categoria));
		$subcategoria->where('status', '=', 1);

		exit(optlist($subcategoria->find_all()->as_array('id_subcategoria', 'subcategoria')));
	}
        
        public function action_item()
	{
		$subcategoria = $this->request->post('subcategoria');

		$impresso_item = ORM::factory('impresso_item');
		$impresso_item->where('id_subcategoria', '=', escape($subcategoria));
		$impresso_item->where('status', '=', 1);

		exit(optlist($impresso_item->find_all()->as_array('id_impresso_item', 'impresso_item')));
	}
        
        public function action_marca()
	{
            $marca = ORM::factory('veiculo_marca');
            $marca->where('id_veiculo_tipo', '=', $this->request->post('id_veiculo_tipo'));
            $marca->where('status', '=', 1);
            $marca->order_by('marca');
            
            exit(optlist($marca->find_all()->as_array('id_veiculo_marca', 'marca')));
	}

	public function action_compararCarros() {
		$id = $this->request->post('id');
		$acao = $this->request->post('acao');
		$bloco = $this->request->post('bloco');

		$session = Session::instance();
		$comparar = $session->get('carros.comparar', array());

		if($acao == 'R') {
			unset($comparar[$id]);

			$session->set('carros.comparar', $comparar);

			$result['status'] = '1';

			if($bloco) {
				$tpl = new Template(Kohana::find_file('views/carros/boxcomparar', 'blocos'));
				$tpl->live = live();
				$tpl->parseBlock('COMPARAR_OFF');
				$result['html'] = $tpl->getContent();
			}

			$result['count'] = count($comparar);

			exit(json_encode($result));
		} elseif($acao == 'A') {
			$result['status'] = '1';

			if(count($comparar) >= 4) {
				$result['status'] = 0;
				$result['mensagem'] = 'Não é possível comparar mais de 4 veículos ao mesmo tempo.';
				exit(json_encode($result));
			}

			$comparar[$id] = $id;

			$session->set('carros.comparar', $comparar);

			if($bloco) {
				$anuncio = ORM::factory('anuncio_veiculo')->getAnuncio($id);
				$tpl = new Template(Kohana::find_file('views/carros/boxcomparar', 'blocos'));
				$tpl->live = live();
				$tpl->img_comparar = $anuncio['url_midia_destaque'] ? '/media/uploads/anuncio/'.$anuncio['url_midia_destaque'] : '/media/front/img/comparacao-thumb.png';
				$tpl->veiculo = $anuncio['veiculo'];
				$tpl->valor = $anuncio['valor'] ? formatMoeda($anuncio['valor']) : 'Sob consulta';
				$tpl->id_comparar = $anuncio['id_anuncio'];
				$tpl->parseBlock('COMPARAR');
				$result['html'] = $tpl->getContent();
			}

			$result['count'] = count($comparar);

			exit(json_encode($result));
		}
	}

	public function action_compararImoveis() {
		$id = $this->request->post('id');
		$acao = $this->request->post('acao');
		$bloco = $this->request->post('bloco');
		
		$session = Session::instance();
		$comparar = $session->get('imoveis.comparar', array());
		
		if($acao == 'R') {
			unset($comparar[$id]);
		
			$session->set('imoveis.comparar', $comparar);
		
			$result['status'] = '1';
		
 			if($bloco) {
 				$tpl = new Template(Kohana::find_file('views/imoveis/boxcomparar', 'blocos'));
 				$tpl->live = live();
 				$tpl->parseBlock('COMPARAR_OFF');
 				$result['html'] = $tpl->getContent();
 			}
		
			$result['count'] = count($comparar);
		
			exit(json_encode($result));
		} elseif($acao == 'A') {
 			$result['status'] = '1';
		
 			if(count($comparar) >= 4) {
 				$result['status'] = 0;
 				$result['mensagem'] = 'Não é possível comparar mais de 4 imóveis ao mesmo tempo.';
 				exit(json_encode($result));
 			}
		
 			$comparar[$id] = $id;
		
 			$session->set('imoveis.comparar', $comparar);
		
 			if($bloco) {
 				$anuncio = ORM::factory('anuncio_imovel')->getAnuncio($id);
 				$tpl = new Template(Kohana::find_file('views/imoveis/boxcomparar', 'blocos'));
 				$tpl->live = live();
 				$tpl->img_comparar = $anuncio['url_midia_destaque'] ? '/media/uploads/anuncio/'.$anuncio['url_midia_destaque'] : '/media/front/img/comparacao-thumb.png';
				$tpl->veiculo = $anuncio['imovel_tipo'];
 				$tpl->valor = $anuncio['valor'] ? formatMoeda($anuncio['valor']) : 'Sob consulta';
 				$tpl->id_comparar = $anuncio['id_anuncio'];
 				$tpl->parseBlock('COMPARAR');
 				$result['html'] = $tpl->getContent();
 			}
		
 			$result['count'] = count($comparar);
		
 			exit(json_encode($result));
		}
	}
	
	public function action_limparCompararCarros() {
		$session = Session::instance();

		$comparar = $session->delete('carros.comparar');

		$tpl = new Template(Kohana::find_file('views/carros/boxcomparar', 'blocos'));
		$tpl->live = live();
		$tpl->parseBlock('COMPARAR_OFF');

		exit(str_repeat($tpl->getContent(), 4));
	}
	
	public function action_limparCompararImoveis() {
		$session = Session::instance();
	
		$comparar = $session->delete('imoveis.comparar');
	
		$tpl = new Template(Kohana::find_file('views/imoveis/boxcomparar', 'blocos'));
		$tpl->live = live();
		$tpl->parseBlock('COMPARAR_OFF');
	
		exit(str_repeat($tpl->getContent(), 4));
	}

	public function action_getOptionMarca() {
		$tipo = $this->request->post('id_veiculo_tipo');
		$null = $this->request->post('selecione');

		$obj = ORM::factory('veiculo_marca');

		if($tipo)
			$obj->where('id_veiculo_tipo', '=', $tipo);

		$options = '';

		if($null)
			$options .= '<option value="">'.$null.'</option>';

		foreach($obj->find_all()->as_array('id_veiculo_marca', 'marca') as $id => $text)
			$options .= '<option value="'.$id.'">'.$text.'</option>';

		exit($options);
	}

        public function action_getOptionImovelCategoria() {
		$tipo = $this->request->post('id_imovel_tipo');
		$null = $this->request->post('selecione');

		$obj = ORM::factory('imovel_categoria');

		if($tipo)
			$obj->where('id_imovel_tipo', '=', $tipo);

		$options = '';

		if($null)
			$options .= '<option value="">'.$null.'</option>';

		foreach($obj->find_all()->as_array('id_imovel_categoria', 'imovel_categoria') as $id => $text)
			$options .= '<option value="'.$id.'">'.$text.'</option>';

		exit($options);
	}
        
        public function action_getCamposAdicionais() {
		$tipo = $this->request->post('id_veiculo_tipo');
		$id_anuncio_veiculo = $this->request->post('id_anuncio_veiculo');
		

		$obj = ORM::factory('veiculo_campos_adicionais');
                $opt = ORM::factory('veiculo_campos_option');
                $val_array = array();
                if(!empty($id_anuncio_veiculo)){
                    $val = ORM::factory('anuncio_veiculo_valores_adicionais');
                    $val->select('id_veiculo_campos_adicionais','valor_campo_adicional','id_veiculo_campos_option');
                    $val->where('id_anuncio_veiculo', '=', $id_anuncio_veiculo);
                    $valores = $val->find_all();
                    foreach($valores as $v){
                        if(empty($val_array[$v->id_veiculo_campos_adicionais])){
                            $val_array[$v->id_veiculo_campos_adicionais] = $v->valor_campo_adicional;
                        }else{
                            if(is_array($val_array[$v->id_veiculo_campos_adicionais])){
                                $val_array[$v->id_veiculo_campos_adicionais] = 
                                    array_merge($val_array[$v->id_veiculo_campos_adicionais], array($v->valor_campo_adicional));
                            }else{
                                $val_array[$v->id_veiculo_campos_adicionais] 
                                    = array($val_array[$v->id_veiculo_campos_adicionais],$v->valor_campo_adicional);
                            }
                        }
                    }
                }
                
                $tpl = new Template(Kohana::find_file('views/carros/anunciar', 'form_campos_adicionais'));
                $tpl->live = live();


		if($tipo){
                    $obj->join('veiculo_campos_por_tipo');
                    $obj->on('veiculo_campos_adicionais.id_veiculo_campos_adicionais', '=', 'veiculo_campos_por_tipo.id_veiculo_campos_adicionais');
                    
                    $obj->where('veiculo_campos_por_tipo.id_veiculo_tipo', '=', $tipo);
                    $obj->or_where('veiculo_campos_por_tipo.id_veiculo_tipo', '=', 0);
                    $obj->order_by('id_form_campo_tipo','ASC');

                    $i=0;
                    $tipo_anterior = 1;
                    foreach ($obj->find_all() as $campo){
                        $tpl->id_veiculo_campos_adicionais = $campo->id_veiculo_campos_adicionais;
                        $tpl->campos_adicionais_label = $campo->label;
                        if(array_key_exists($campo->id_veiculo_campos_adicionais, $val_array)){
                            $tpl->valor_preenchido_editar = (is_array($val_array[$campo->id_veiculo_campos_adicionais]))?
                                '':$val_array[$campo->id_veiculo_campos_adicionais];
                        }else { $tpl->valor_preenchido_editar = '';}
                        if(($i%2)==0 || $tipo_anterior!=$campo->id_form_campo_tipo){
                            $tpl->parseBlock('BR_CLEAR');
                            $tpl->class_last = '';
                        }else{
                            $tpl->class_last = ' last';
                        }

                        switch ($campo->id_form_campo_tipo) {
                            case(1): case(3): case(5):
                                $opt->where('id_veiculo_campos_adicionais', '=', $campo->id_veiculo_campos_adicionais);
                                $opt->and_where_open();
                                $opt->where('id_veiculo_tipo', '=', $tipo);
                                $opt->or_where('id_veiculo_tipo', '=', 0);
                                $opt->and_where_close();
                                $opt->and_where('status', '=', 1);
                                $opcoes = $opt->find_all();
                                break;

                        }
                        switch ($campo->id_form_campo_tipo) {
                            case(1): case(5):
                                foreach($opcoes as $o){
                                    $tpl->selected_campo_value = '';
                                    if(array_key_exists($campo->id_veiculo_campos_adicionais, $val_array)){
                                        if($o->veiculo_campos_option==$val_array[$campo->id_veiculo_campos_adicionais]){
                                            $tpl->selected_campo_value = 'selected="selected"';
                                        }
                                    }
                                    $tpl->campo_value = $o->veiculo_campos_option;
                                    $tpl->parseBlock("CAMPO_VALUES");
                                }
                                $tpl->parseBlock('CAMPO_LISTA');
                                $tpl->parseBlock('CAMPOS_ADICIONAIS');
                                break;
                            case(2): case(4):
                                $tpl->parseBlock('CAMPO_INPUT');
                                $tpl->parseBlock('CAMPOS_ADICIONAIS');
                                break;
                            case(3):
                                foreach($opcoes as $o){
                                    $tpl->checked_campo_value = '';
                                    $tpl->checked_campo_value_on = '';
                                    if(array_key_exists($campo->id_veiculo_campos_adicionais, $val_array)){
                                        if($o->veiculo_campos_option==$val_array[$campo->id_veiculo_campos_adicionais]
                                           || (is_array($val_array[$campo->id_veiculo_campos_adicionais]) &&
                                                in_array($o->veiculo_campos_option, $val_array[$campo->id_veiculo_campos_adicionais]))){
                                            $tpl->checked_campo_value = 'checked="checked"';
                                            $tpl->checked_campo_value_on = 'on';
                                        }
                                    }
                                    $tpl->campo_value = $o->veiculo_campos_option;
                                    $tpl->parseBlock("CAMPO_CHECK_VALUE");
                                }
                                $tpl->parseBlock('CAMPO_CHECKBOX');
                                break;
                            case(6):
                                $tpl->parseBlock('CAMPO_TEXT');
                                break;
                        }
                        $i++;

                        if($tipo_anterior!=$campo->id_form_campo_tipo){
                            $tipo_anterior=$campo->id_form_campo_tipo;
                            $i=1;
                        }
                        $tpl->parseBlock('CAMPO');
                    }
                }else{
                    echo 'sem tipo';
                }
		$tpl->show();
		exit();
	}

	public function action_getOptionModelo() {
		$marca = $this->request->post('id_veiculo_marca');
		$null = $this->request->post('selecione');

		$obj = ORM::factory('veiculo');

		if($marca)
			$obj->where('id_veiculo_marca', '=', $marca);

		$options = '';

		if($null)
			$options .= '<option value="">'.$null.'</option>';

		foreach($obj->find_all()->as_array('id_veiculo', 'veiculo') as $id => $text)
			$options .= '<option value="'.$id.'">'.$text.'</option>';

		exit($options);
	}

	public function action_getValorModelo() {
		$obj = ORM::factory('anuncio_veiculo');

		$modelo = $this->request->post('id_veiculo');
		$ano_fabricacao = $this->request->post('ano_fabricacao');

		$result = $obj->getValorVeiculos($modelo, $ano_fabricacao);

		foreach($result as $key => $val)
			$result[$key] = formatMoeda($val);

		exit(json_encode($result));
	}

	public function action_selecionarPlano() {
		if(!$this->request->post('plano'))
			exit('0');

		Session::instance()->set('anunciar.plano', $this->request->post('plano'));

		exit('1');
	}

	public function action_favorito()
	{
		$cliente = Session::instance()->get('id_cliente', false);
		if(!$cliente)
			exit('Você deve estar logado para favoritar anúncios.');

		$anuncio = ORM::factory('anuncio', $this->request->post('fav'));
		if(!$anuncio->loaded())
			exit('Anúncio inválido.');

		$favoritos = ORM::factory('favoritos');
		if($this->request->post('on') == 'true') {
			$favoritos->where('id_cliente', '=', $cliente);
			$favoritos->where('id_anuncio', '=', $anuncio->id_anuncio);
			$favoritos->find();
			$favoritos->delete();
		} else {
			$favoritos->id_cliente = $cliente;
			$favoritos->id_anuncio = $anuncio->id_anuncio;
			$favoritos->save();
		}

		exit('1');
	}

	public function action_validaEmailCliente()
	{
		$email = ORM::factory('cliente');
		$email->where('email', 'LIKE', $this->request->post('email'));

		if($this->cliente->loaded())
			$email->where('id_cliente', '!=', $this->cliente->id_cliente);

		$res = $email->count_all();
		exit($res);
	}

	public function action_validaTextoListaNegra()
	{
		$texto = strtolower(removeAcentos($this->request->post('texto')));
		$texto = " ".$texto." ";
		$lista = ORM::factory('lista_negra')->where('status', '=', 1)->find_all()->as_array('id_lista_negra_integracao', 'palavra_termo');

		foreach($lista as $palavra) {
			$palavra = strtolower(removeAcentos($palavra));
			$palavra = " ".$palavra." ";
			if(strpos($texto, $palavra) !== false)
				exit('0');
		}

		exit('1');
	}

	public function action_termos()
	{
		$termos = file_get_contents('media/uploads/termos/termos.txt');
		$tpl = new Template(Kohana::find_file('views', 'termos/termos'));
		$tpl->termos = nl2br($termos);
		$tpl->show();
	}

	public function action_enviaProposta(){
		$tplEmail = new Template(Kohana::find_file('views/proposta', 'email'));
		$tplEmail->email_proposta = $this->request->post('email');
		$tplEmail->nome_proposta = $this->request->post('nome');
		$tplEmail->telefone_proposta = $this->request->post('telefone');
		$tplEmail->msg_proposta = $this->request->post('mensagem');

		$tplEmail->live = absolutePath();

		$cliente = ORM::factory('cliente')
						->join('anuncio', 'INNER')->on('anuncio.id_cliente', '=', 'cliente.id_cliente')
						->where('anuncio.id_anuncio', '=', $this->request->post('id_anuncio'))
						->find();

		if($cliente->loaded()) {
			$email = new Email($tplEmail->getContent(), 'ABC Classificados');
			$email->addDestinatario($cliente->email);
			$email->smtpSend();
			exit('1');
		} else 
			exit('0');
	}
	
	
}