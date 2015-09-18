<?php
function isHTTPS(){
	if(isset($_SERVER["SERVER_PORT"])){
		return ($_SERVER["SERVER_PORT"]==443);
	} else {
		return true;
	}

}

function loadSessionCookies(){
	Cookie::$salt = "abcClassificados_key_cookie";
	Cookie::$expiration = 2721600;
	Cookie::$secure = false;
	Cookie::$httponly = true;
	Cookie::$domain = "";
	Cookie::$path = "/";

	Session::$default = "cookie";
}

function iniNav($valor){
	return (substr(NAV,0,strlen($valor)) == $valor);
}

function rq ($var) {
	if(!isset ($_REQUEST[$var])) return "";
	return mysql_real_escape_string($_REQUEST[$var]);
}

function escape($var) {
	return mysql_real_escape_string($var);
}

function escapeArray($arr, $glue = ',') {
	$escaped = array();
	foreach($arr as $value)
		$escaped[] = escape($value);
	return implode($glue, $escaped);
}

function somarDias($date,$days,$format='%d/%m/%Y') {
	$thisyear = substr ( $date, 0, 4 );
	$thismonth = substr ( $date, 5, 2 );
	$thisday =  substr ( $date, 8, 2 );
	$thishour = substr ( $date, 11, 2);
	$thisminutes = substr ( $date, 14, 2);
	$thisseconds = substr ( $date, 17, 2);
	$nextdate = mktime ( $thishour, $thisminutes, $thisseconds, $thismonth, $thisday + $days, $thisyear );
	return strftime($format, $nextdate);
}

function formatData($dataOuTimestamp, $comAno = true, $separadorData = "/", $comHora = true) {
	if ($dataOuTimestamp) {
		$data = strpos($dataOuTimestamp," ") === false ? $dataOuTimestamp : substr($dataOuTimestamp,0,strpos($dataOuTimestamp," "));
		$hora = (strpos($dataOuTimestamp," ") === false or (!$comHora)) ? "" : substr($dataOuTimestamp,strpos($dataOuTimestamp," ")+1);

		if (strpos($data,"-") == 4) { // é YYYY-MM-DD
			// Y-m-d  ---> d/m/Y , d/m
			$vetTime = explode("-",$data);
			krsort($vetTime);
			if (!($comAno)) {
				unset($vetTime[count($vetTime)]);
			}
			$data = implode($separadorData,$vetTime);
		} else {
			// d/m/Y  ---> Y-m-d
			$vetTime = explode("/",$data);
			krsort($vetTime);
			$data = implode("-",$vetTime);
		}

		if ($hora) {
			$data .= " ".$hora;
		}

		return $data;

	} else return "";
}

function formatNome($nome,$ficam_minusculas=0) {
	if ( !is_null($nome) ) {

		if ( $ficam_minusculas==0 ) { $ficam_minusculos = array("de","del","do","dos","da","das","a","as","e","o","os","que","para","em","no","na","nos","nas"); }
		$aspas = array("'","`","'");
		$nome = explode(" ", toMinuscula(c_stripslashes($nome)));

		foreach( $nome as $palavra ) {

			if ( !in_array($palavra, $ficam_minusculos) ) {
				$palavra[0] = toMaiuscula($palavra[0]);
				if( isset($palavra[1]) and in_array($palavra[1], $aspas ) ) {
					if( isset($palavra[2]) ) {
						$palavra[2] = toMaiuscula($palavra[2]);
					}
				}
			}
			$retorno[] = $palavra;
		}
		return implode(" ",$retorno);

	} else {
		return null;
	}
}

function toMinuscula($string) {
	$retorno = strtr($string,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝ',
        'àáâãäåçèéêëìíîïñòóôõöøùúûüý');
	return strtolower($retorno);
}

function toUrl($string) {
	$retorno = preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml|caron);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
	$retorno = strtolower($retorno);
	return $retorno;
}

function toMaiuscula($string) {
	$retorno = strtr($string,'àáâãäåçèéêëìíîïñòóôõöøùúûüý',
        'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÑÒÓÔÕÖØÙÚÛÜÝ');
	return strtoupper($retorno);
}

function idade($data, $dataBase = '') {
	if($dataBase == '')
	$dataBase = date("Y-m-d");

	$data = explode("-", $data);
	$dataBase = explode("-", $dataBase);

	$anos = $dataBase[0] - $data[0];

	if($dataBase[1] < $data[1] || ($dataBase[1] == $data[1] && $dataBase[2] < $data[2])) {
		$anos--;
	}
	return $anos;
}

function arrayToObject( $array, &$obj, $ignore='', $prefix=NULL, $checkSlashes=true ) {
	if (!is_array( $array ) || !is_object( $obj )) {
		return (false);
	}

	foreach (get_object_vars($obj) as $k => $v) {
		if( substr( $k, 0, 1 ) != '_' ) {			// internal attributes of an object are ignored
			if (strpos( $ignore, $k) === false) {
				if ($prefix) {
					$ak = $prefix . $k;
				} else {
					$ak = $k;
				}
				if (isset($array[$ak])) {
					$obj->$k = ($checkSlashes && get_magic_quotes_gpc()) ? stripslashes( $array[$ak] ) : $array[$ak];
				}
			}
		}
	}

	return true;
}

function objectToArray ($object) {
	if (is_object($object)) {
		return get_object_vars($object);
	} elseif (is_array($object)) {
		$arr = array();
		for ($i = 0; $i < count($object); $i++) {
			$arr[] = (is_object($object[$i])?get_object_vars($object[$i]):$object[$i]);
		}
		return $arr;
	} else {
		return false;
	}
}


function array_walk_key($array,$funcao) {
	$ret = array();
	foreach ($array as $ind => $valor) {
		$iind = $funcao($ind);
		$ret[$iind] = $valor;
	}
	return $ret;

}

function arrayWalk(&$vetor, $funcao) {
	foreach ($vetor as &$valor) {
		if(is_array($valor)) arrayWalk($valor,$funcao);
		else 						$valor = $funcao($valor);
	}
}

function obj_walk_key($obj,$funcao) {
	$ret = null;
	foreach ($obj as $ind => $valor) {
		$iind = $funcao($ind);
		$ret->$iind = $valor;
	}
	return $ret;
}

/**
 * Strip slashes from strings or arrays of strings
 * @param mixed The input string or array
 * @return mixed String or array stripped of slashes
 */
function c_stripslashes( &$value ) {
	$ret = '';
	if (is_string( $value )) {
		$ret = c_stripslashes( $value );
	} else {
		if (is_array( $value )) {
			$ret = array();
			foreach ($value as $key => $val) {
				$ret[$key] = c_stripslashes( $val );
			}
		} else {
			$ret = $value;
		}
	}
	return $ret;
}

function marcacoesPadrao(&$tpl) {
	$tpl->url = live();
	$tpl->live = live();
	$tpl->api_key = getGoogleApiKey();
}

function debug($variavel) {
	$cor="red";
	$fundo="#EAE6E9";
	$conteudo = print_r($variavel,true);
	echo '<fieldset style="color: '.$cor.'; border: '.$cor.' 2px solid; background: '.$fundo.'; font-family: Verdana; font-size:12px; text-align:left;">
              <legend><b><font color="'.$cor.'">DEBUG</legend>
              <div class="debug_main">
         	     <pre>'.$conteudo.'</pre>
         	  </div>
           </fieldset>';
}


function debugExit($variavel) {
	debug($variavel);
	exit;
}

function nomeHtml($nomeFormat) {
	$nomeFormat = str_replace(",","",$nomeFormat);
	$nomeFormat = str_replace(" ","_",$nomeFormat);
	$nomeFormat = strtolower($nomeFormat);
	return $nomeFormat;
}

function pathTpl($arq = "", $typePath = ROOT) {
	if ($arq != "") $arq .= ".tpl";
	return $typePath."/tpl/".$arq;
}

function pathImg($arq = "", $typePath = LIVE) {
	return $typePath."/img/".$arq;
}

function pathJs($arq = "", $typePath = LIVE) {
	if ($arq != "") $arq .= ".js";
	return $typePath."/tpl/js/".$arq;
}

function pathCss($arq = "", $typePath = LIVE) {
	if ($arq != "") $arq .= ".css";
	return $typePath."/tpl/css/".$arq;
}

function diferencaDias($data1,$data2) {
	$vetdata1 = explode("-",$data1);
	$vetdata2 = explode("-",$data2);
	// mes             dia          ano
	$data_inicial = mktime(null,null,null,$vetdata1[1], $vetdata1[2], $vetdata1[0]); // converte tudo em segundos
	$data_final   = mktime(null,null,null,$vetdata2[1], $vetdata2[2], $vetdata2[0]);
	$tempo_unix   = $data_final - $data_inicial; // Acha a diferença em segundos
	$nro_dias  = floor($tempo_unix /(24*60*60)); // Converte em dias 24(horas) 60(minutos) 60(segundos)
	return $nro_dias;
}

function validaEmail($email) {
	$conta = "^[a-zA-Z0-9\._-]+@";
	$domino = "[a-zA-Z0-9\._-]+\.";
	$extensao = "([a-zA-Z]{2,4})$";

	$pattern = $conta.$domino.$extensao;

	return (bool)preg_match('/'.$pattern.'/', $email);
}

function listaEstados($id_estado = null, $geral = 'Selecione') {
	$estado = ORM::factory('estado');

	$lista = '';

	if($geral)
		$lista .= '<option value="">'.$geral.'</option>';

	foreach($estado->find_all()->as_array('id_estado', 'estado') as $id => $estado)
		$lista .= '<option value="'.$id.'" '.($id == $id_estado ? 'selected' : '').'>'.$estado.'</option>';

	return $lista;
}

function listaCidades($id_estado = null, $id_cidade = null, $geral = 'Selecione') {
	$cidade = ORM::factory('cidade');

	$lista = '';

	if($geral)
		$lista .= '<option value="">'.$geral.'</option>';

	if($id_estado) {
		foreach($cidade->where('id_estado', '=', $id_estado)->find_all()->as_array('id_cidade', 'cidade') as $id => $cidade)
			$lista .= '<option value="'.$id.'" '.($id == $id_cidade ? 'selected' : '').'>'.$cidade.'</option>';
	}

	return $lista;
}

function optlist($arr) {
	$list = '<option value="">Selecione</option>';
	foreach($arr as $id => $val) {
		$list .= '<option value="'.$id.'">'.$val.'</option>';
	}
	return $list;
}

function live(){
	$live = str_replace("index.php", "", URL::base());
	$live = str_replace("//", "/", $live);
	$live = substr($live,0,strlen($live)-1);
	return $live;
}
/*
function absolutePath(){
	return 'http://'.$_SERVER['HTTP_HOST'];
}
*/
function absolutePath(){
	$liveHTTP = str_replace("/index.php", "", URL::base("http"));
	$liveHTTP = substr($liveHTTP,0,strlen($liveHTTP)-1);
	return $liveHTTP;
}

function shortText($str, $chars)
{
	if (mb_strlen($str) > $chars)
	{
		$str = mb_substr($str, 0, $chars);
		$str = $str . "...";
		return $str;
	}
	else
	{
		return $str;
	}
}

function parseFloat($string) {
	$num = str_replace(array('R$', ' ', '.'), '', $string);

	return $num;
}

function formatMoeda($num) {
	return 'R$ '.number_format($num, 2, ',', '.');
}

function youtubeThumbnail($code) {
	return 'http://i1.ytimg.com/vi/'.$code.'/default.jpg';
}

function getGoogleApiKey() {
	return 'AIzaSyBS8R12mQY3Q3z2478GYr6dyOhgGLSSwsU';
}

function formatTelefone($num_telefone){
	$num_telefone =  preg_replace("/[^0-9]/","", $num_telefone);
	
	$prefixo = substr($num_telefone, 0, 2);
	$num_telefone = substr($num_telefone, 2);
	$num = substr($num_telefone, 0, 4);
	$num2 = substr($num_telefone, 3);
	$num_telefone = $num.'-'.$num2;
	$num_telefone = '('.$prefixo.') '.$num_telefone;

	return $num_telefone;
}

function getAnunciarIndividualTopo($etapa = 1, $comAcao = true) {
	$tpl = new Template(Kohana::find_file('views/anunciarindividual', 'topo'));
	$tpl->live = live();

	for($c = $etapa ; $c > 0 ; $c--) {
		$etapa = 'etapa'.$c;
		$tpl->$etapa = 'active';
	}

	$linkEditar = ($comAcao)?"_LINK":"";

	$session = Session::instance();
	$anuncios = $session->get('anunciar.individual.anuncios', array());
	$total = 0;
	$num_anuncios = 0;
	$total_online = 0;
	$total_impresso = 0;

	foreach($anuncios as $anuncio) {
		if($anuncio['tipo'] == 'O')
			$total_online++;
		elseif($anuncio['tipo'] == 'I')
			$total_impresso++;

		$num_anuncios++;
		$total += $anuncio['valor'];
	}

	$online = 1;
	$impresso = 1;
	foreach($anuncios as $k => $anuncio) {
		$tpl->id = $k;
		$tpl->descricao = $anuncio['descricao'];
		$tpl->valor = formatMoeda($anuncio['valor']);
		switch($anuncio['segmento']) {
			case Model_Segmento::$VEICULOS:
				$tpl->class = 'carros';
				break;
			case Model_Segmento::$IMOVEIS:
				$tpl->class = 'imoveis';
				break;
			case Model_Segmento::$EMPREGOS:
				$tpl->class = 'empregos';
				break;
			case Model_Segmento::$DIVERSOS:
				$tpl->class = 'diversos';
				break;
		}

		if($anuncio['tipo'] == 'O') {
			if($online == $total_online)
				$tpl->class .= ' last';

			$online++;
			$tpl->parseBlock('ONLINE'.$linkEditar);
		} else {
			if($impresso == $total_impresso)
				$tpl->class .= ' last';

			$impresso++;
			$tpl->parseBlock('IMPRESSO'.$linkEditar);
		}
	}

	$tpl->num_anuncios = $num_anuncios;
	$tpl->anuncio_plural = ($tpl->num_anuncios == 1) ? '' : 's';

	$session->set("anunciar.individual.anuncios.total", $total);
	$tpl->total = formatMoeda($total);

	if(!$tpl->num_anuncios)
		$tpl->parseBlock('VAZIO');

	if($total_online)
		$tpl->parseBlock('BOX_ONLINE');

	if($total_impresso)
		$tpl->parseBlock('BOX_IMPRESSO');

	if($comAcao){
		$tpl->parseBlock('FINALIZAR');
	}

	return $tpl->getContent();
}

function getYoutubeID($url) {
	$pattern = '/http[s]?:\/\/(?:[^\.]+\.)*(?:youtube\.com\/(?:v\/|watch\?(?:.*?\&)?v=|embed\/)|youtu.be\/)([\w\-\_]+)/i';

	$result = preg_match($pattern, $url, $matches);

	if (false !== $result && isset($matches[1])) {
		return $matches[1];
	}

	return false;
}

function file_get_contents_curl($url) {
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
	curl_setopt($ch, CURLOPT_URL, $url);

	$data = curl_exec($ch);
	curl_close($ch);

	return $data;
}

function formatToCPF($cpf) {
	return substr($cpf,0,3).'.'.substr($cpf,3,3).'.'.substr($cpf,6,3).'-'.substr($cpf,9,2);
}

function formatToCNPJ($cnpj) {
	return substr($cnpj,0,2).'.'.substr($cnpj,2,3).'.'.substr($cnpj,5,3).'/'.substr($cnpj,8,4).'-'.substr($cnpj,12,2);
}

function formatToNumeric($string) {
	return preg_replace("/[^0-9]/", '', $string);
}

function removeAcentos($palavra) {
	$acentos = array(
			'a' => '/À|Á|Â|Ã|Ä|Å/',
			'a' => '/à|á|â|ã|ä|å/',
			'c' => '/Ç/',
			'c' => '/ç/',
			'e' => '/È|É|Ê|Ë/',
			'e' => '/è|é|ê|ë/',
			'i' => '/Ì|Í|Î|Ï/',
			'i' => '/ì|í|î|ï/',
			'n' => '/Ñ/',
			'n' => '/ñ/',
			'o' => '/Ò|Ó|Ô|Õ|Ö/',
			'o' => '/ò|ó|ô|õ|ö/',
			'u' => '/Ù|Ú|Û|Ü/',
			'u' => '/ù|ú|û|ü/',
			'y' => '/Ý/',
			'y' => '/ý|ÿ/',
			'a.' => '/ª/',
			'o.' => '/º/'
	);
	return preg_replace($acentos, array_keys($acentos), $palavra);
}

?>