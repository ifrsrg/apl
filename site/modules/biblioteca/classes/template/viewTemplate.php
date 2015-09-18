<?php defined("SYSPATH") or die("No direct script access.");

class ViewTemplate {

	/**
	 * @var Template
	 * */
	public $tplEstrutura = null;

	/**
	 * @var Template
	 * */
	public $tpl = null;

	public function __construct($tpl, $tplEstrutura)
	{
		$this->tplEstrutura = new Template(Kohana::find_file("views", $tplEstrutura));
		$this->tpl = new Template(Kohana::find_file("views", $tpl));
	}

	public function __toString()
	{
		try{
			$this->addEstruturaContent();
			$this->setTplVars($this->tplEstrutura);
			$this->setTplVars($this->tpl);
			$this->tplEstrutura->content = $this->tpl->getContent();
			return $this->tplEstrutura->getContent();
		}
		catch (Exception $e)
		{
			// Display the exception message
			Kohana_Exception::handler($e);

			return '';
		}
	}

	public static function factory($tpl, $tplEstrutura="template/default")
	{
		return new ViewTemplate($tpl, $tplEstrutura);
	}

	public function addEstruturaContent()
	{

	}

	public function setTplVars($tpl){
		$live = str_replace("/index.php", "", URL::base());
		$live = substr($live,0,strlen($live)-1);
		$tpl->live = $live;

		$liveHTTP = str_replace("/index.php", "", URL::base("http"));
		$liveHTTP = substr($live,0,strlen($liveHTTP)-1);
		$tpl->liveHTTP = $liveHTTP;

		if(HTTPS_HABILITADO){
			$liveHTTPS = str_replace("/index.php", "", URL::base("https"));
			$liveHTTPS = substr($live,0,strlen($liveHTTPS)-1);
			$tpl->liveHTTPS = $liveHTTPS;
		} else {
			$tpl->liveHTTPS = $tpl->liveHTTP;
		}

	}

} // End Welcome
