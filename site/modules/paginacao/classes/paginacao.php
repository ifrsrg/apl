<?php

// No direct access to this file
defined('SYSPATH') or die('No direct script access.');

class Paginacao {

	public $chave = 'pag';
	public $url;
	public $limit;
	public $offset;
	public $total;
	public $pag;
	public $num_paginas;
	public $template;
	public $alwaysShow;

    public function __construct($url, $limit, $total, $template = 'default', $alwaysShow = false){
    	$data = explode($this->chave."=", $_SERVER["REQUEST_URI"], 2);
    	if($data && isset($data[1])) {
	    	$pag = explode("&", $data[1], 2);
	    	if($pag) {
	    		$pag = $pag[0];
	    	}
    	} else {
    		$pag = 1;
    	}

    	$this->url = URL::site($url,null,false).URL::query(array($this->chave => ''));
        $this->limit = $limit;
        $this->total = $total;
        $this->template = $template;
        $this->num_paginas = ceil($total / $limit);
        $this->pag = ($pag && $pag <= $this->num_paginas && $pag > 0) ? $pag : 1;
        $this->offset = ($this->pag-1)*$this->limit;
        $this->alwaysShow = $alwaysShow;
    }

    public function getHTML() {
    	if($this->num_paginas <= 1 && !$this->alwaysShow)
            return '';

    	$tpl = new Template(Kohana::find_file("views", $this->template));

    	if($this->template == 'ajax') {
    		$tpl->pag = $this->pag;
    		$tpl->live = live();
    		$tpl->num_paginas = $this->num_paginas;
    		$tpl->url_primeira = ($this->pag==1)?'#':"1";
    		$tpl->url_anterior = ($this->pag==1)?'#':($this->pag-1);
    		$tpl->url_proximo = ($this->pag==$this->num_paginas)?'#':($this->pag+1);
    		$tpl->url_ultimo = $this->num_paginas;
    	} elseif($this->template == 'front') {
    		$tpl->num_pag = $this->num_paginas;
    		$tpl->anterior = $this->pag == 1 ? '#' : $this->pag - 1;
    		$tpl->proxima = $this->pag == $this->num_paginas ? '#' : $this->pag + 1;
    		for($c = 1 ; $c <= $this->num_paginas ; $c++) {
    			$tpl->pag = $c;
    			$tpl->selected = $c == $this->pag ? 'selected' : '';
    			$tpl->parseBlock('PAG');
    		}
    	} else {
	    	$tpl->pag = $this->pag;
	    	$tpl->num_paginas = $this->num_paginas;
	    	$tpl->url_primeira = $this->url."1";
	    	$tpl->url_anterior = ($this->pag==1)?'#':$this->url.($this->pag-1);
	    	$tpl->url_proximo = ($this->pag==$this->num_paginas)?'#':$this->url.($this->pag+1);
	    	$tpl->url_ultimo = $this->url.$this->num_paginas;
    	}

    	return $tpl->getContent();
    }

    public function __toString() {
        return $this->getHTML();
    }

}

?>
