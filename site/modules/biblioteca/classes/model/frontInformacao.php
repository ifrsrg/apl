<?php defined("SYSPATH") or die("No direct script access.");

class FrontInformacao {
	
	/**
	 * @var Model_Cliente
	 * */
	public $cliente;
	
	public $paginaLogada;
	public $paginaHTTPS = null;
	public $urlCorrente;
	
	public $pathLogin = "acesso";
	
	public $tipo;
	public $title;
	public $metaDescription;
	public $metaKeywords;
	
	function __construct($cliente=null, $paginaLogada=false, $tipo=0, $title="", $metaDescription="", $metaKeywords=""){
		$this->cliente = $cliente;
		$this->tipo = $tipo;
		$this->title = $title;
		$this->metaDescription = $metaDescription;
		$this->metaKeywords = $metaKeywords;
		$this->paginaLogada = $paginaLogada;
	}
	
	
}
