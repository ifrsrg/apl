<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends ControllerFront {
	
	private function preencheConceituais($view) {
		$conceituais = ORM::factory("conceitual")->getLista();
		
		foreach ($conceituais as $conceitual) {
			$view->tpl->conceitual_imagem = Utils::getScaledPath("conceitual", $conceitual->id_conceitual);
			$view->tpl->conceitual_titulo = $conceitual->titulo;
			$view->tpl->parseBlock("CONCEITUAIS");
		}
	}
	
	private function preencheApresentacoes($view) {
		$apresentacoes = ORM::factory("apresentacao")->getLista();
		$par = false;
		
		foreach($apresentacoes as $k => $apresentacao) {
			
			$view->tpl->apresentacao_titulo = $apresentacao->titulo;
			$view->tpl->apresentacao_titulo_formatado = $apresentacao->titulo_formatado;
			$view->tpl->apresentacao_texto = $apresentacao->texto;
			$view->tpl->apresentacao_imagem = Utils::getScaledPath("apresentacao", $apresentacao->id_apresentacao);
			
			if(!$apresentacao->destaque) {
				$view->tpl->apresentacao_subtitulo = "";
				$par != $par;
				if($par || $k == count($apresentacoes)-1)
					$view->tpl->parseBlock("APRESENTACAO_BREAK");
				$view->tpl->parseBlock("APRESENTACOES");
			} else {
				$view->tpl->apresentacao_subtitulo = strip_tags($apresentacao->subtitulo);
				$view->tpl->parseBlock("APRESENTACAO_DESTAQUE");
			}
		}
	}
	
	private function preencheAssociados($view) {
		$associados = ORM::factory("associado")->getLista(array(),10,0,array(array("id_associado","desc")));
		$i = 1;
		foreach($associados as $associado) {
			$view->tpl->associado_nome = $associado->nome;
			$view->tpl->associado_marca = Utils::getScaledPath("associado", $associado->id_associado);
			$view->tpl->associado_texto = $associado->descricao;
			$view->tpl->associado_projetos = $associado->projetos;
			$view->tpl->associado_contato = $associado->contato;
			$view->tpl->associado_categoria = $associado->categoria;
			$view->tpl->associado_contato_telefone = $associado->contato_telefone;
			$view->tpl->associado_contato_email = $associado->contato_email;
			$view->tpl->associado_coordenadas = $associado->coordenadas;
			$view->tpl->associado_endereco = $associado->endereco;
			$view->tpl->associado_index = $i++;
			
			if($associado->projetos)
				$view->tpl->parseBlock("HAS_PROJETO_ASSOCIADO");
			
			$view->tpl->parseBlock("ASSOCIADOS");
			$view->tpl->parseBlock("ASSOCIADO_MODAL");
		}
	}
	
	private function preencheFornecedores($view) {
		$fornecedores = ORM::factory("fornecedor")->getLista(array(),10,0,array(array("id_fornecedor","desc")));
		$i = 1;
		foreach($fornecedores as $fornecedor) {
			$view->tpl->fornecedor_nome = $fornecedor->nome;
			$view->tpl->fornecedor_marca = Utils::getScaledPath("fornecedor", $fornecedor->id_fornecedor);
			$view->tpl->fornecedor_texto = $fornecedor->descricao;
			$view->tpl->fornecedor_projetos = $fornecedor->projetos;
			$view->tpl->fornecedor_contato = $fornecedor->contato;
			$view->tpl->fornecedor_categoria = $fornecedor->categoria;
			$view->tpl->fornecedor_contato_telefone = $fornecedor->contato_telefone;
			$view->tpl->fornecedor_contato_email = $fornecedor->contato_email;
			$view->tpl->fornecedor_coordenadas = $fornecedor->coordenadas;
			$view->tpl->fornecedor_endereco = $fornecedor->endereco;
			$view->tpl->fornecedor_index = $i++;
			
			if($fornecedor->projetos)
				$view->tpl->parseBlock("HAS_PROJETO_FORNECEDOR");
				
			$view->tpl->parseBlock("FORNECEDORES");
			$view->tpl->parseBlock("FORNECEDOR_MODAL");
		}
	}
	
	private function preencheNoticias($view) {
		$noticias = ORM::factory("noticia")->getLista(array(),10,0,array(array("data","desc")));
		
		foreach($noticias as $noticia) {
			$view->tpl->noticia_titulo = $noticia->titulo;
			$view->tpl->noticia_texto = $noticia->texto_lista;
			$view->tpl->noticia_imagem = Utils::getScaledPath("noticia", $noticia->id_noticia);
			$view->tpl->noticia_id = $noticia->id_noticia;
			$view->tpl->parseBlock("NOTICIAS");
		}
	}

	private function preencheProjetos($view) {
		$projetos = ORM::factory("projeto")->getLista(array(),10,0,array(array("id_projeto","desc")));

		foreach($projetos as $projeto) {
			$view->tpl->projeto_id = $projeto->id_projeto;
			$view->tpl->projeto_nome = $projeto->nome;
			$view->tpl->projeto_texto = $projeto->texto_lista;
			$view->tpl->projeto_marca = Utils::getScaledPath("projeto", $projeto->id_projeto);
			$view->tpl->parseBlock("PROJETOS");
		}
	}

	private function preencheTextoLayout($view) {
		$ts = ORM::factory("texto_sistema");
		$view->tpl->texto_subtitulo_associado = $ts->get("subtitulo_associado");
		$view->tpl->texto_subtitulo_fornecedor = $ts->get("subtitulo_fornecedor");
		$view->tpl->texto_subtitulo_projeto = $ts->get("subtitulo_projeto");
		$view->tpl->texto_subtitulo_download = $ts->get("subtitulo_download");
		$view->tpl->texto_subtitulo_contato = $ts->get("subtitulo_contato");
	}

	private function preencheCategoriasDownload($view) {
		
		$usuario = ORM::factory("usuario");
		
		$categorias_download = ORM::factory("download_categoria")->getLista();
		
		foreach($categorias_download as $categoria_download) {
			if($categoria_download->restricao == 0 || !$usuario->isLogado()) {																																																												
				$view->tpl->categorias_download_nome = $categoria_download->nome;
				$view->tpl->categorias_download_icone = $categoria_download->icone;
				$view->tpl->categorias_download_id = $categoria_download->id_download_categoria;
				$view->tpl->parseBlock("CATEGORIAS_DOWNLOAD");
			}
		}
	}
	
	public function action_index(){
		$view = ViewTemplateFront::factory("home/index", $this->info);
                $view->tpl->url = 'http%3A%2F%2F'.$_SERVER['HTTP_HOST'].str_replace('/', '%2F', $_SERVER['REQUEST_URI']);
                
        $usuario = ORM::factory("usuario");
        $usuario->loadLogado();
       	if($usuario->isLogado())
			$view->tpl->parseBlock("FORNECEDORES_AREA");
                
        $this->preencheConceituais($view);
        $this->preencheApresentacoes($view);
        $this->preencheAssociados($view);
        $this->preencheFornecedores($view);
        $this->preencheNoticias($view);
        $this->preencheProjetos($view);
        $this->preencheCategoriasDownload($view);
                
        $this->preencheTextoLayout($view);
        
		$this->response->body($view);
	}
	
	
	
} 
