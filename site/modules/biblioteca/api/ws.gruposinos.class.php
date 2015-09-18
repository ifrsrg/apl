<?php

class GrupoSinosWebService {

    public $caminho;
    public $metodo;
    public $nameSpace = WS_SOAP_NAMESPACE;
    public $uri = "http://test-uri/";
    public $xmlRequest = "";
    public $xmlResponse = "";
    
    function __construct($dirServico, $metodo, $caminhoCompleto=WS_SOAP_PATH, $arquivo="servidor.php"){
        $this->caminho = $caminhoCompleto."/".$dirServico."/".$arquivo;
        $this->metodo = $metodo;
    }
    
    function executar($parametros = array()) {
        
        $this->xmlRequest = $this->getRequestFromArray($parametros);
        
        $client = new SoapClient(null, array('location' => $this->caminho, 'uri' => $this->uri));
        
        $this->xmlResponse = $client->__doRequest($this->xmlRequest, $this->caminho, $this->uri."#wgs:".$this->metodo."Request", 1);
        if(strpos($this->xmlResponse,"?xml")>0){
            return $this->getArrayFromResponse($this->xmlResponse);
        } else {
            return $this->xmlResponse;
        }
        
    }
        
    
    function getRequestFromArray($parametros) { 
        $request = '<?xml version="1.0" encoding="UTF-8"?><soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:wgs="'.$this->nameSpace.'"><soap:Header /><soap:Body>';
        $request .= '<wgs:'.$this->metodo.'Request>';
        $request .= $this->getRequestXMLFromArray($parametros);
        $request .= '</wgs:'.$this->metodo.'Request>';
        $request .= '</soap:Body></soap:Envelope>';
        return $request;
    }
    
    function getRequestXMLFromArray($parametros) { 
        $request = '';
        foreach($parametros as $key=>$val){
            $request .= '<wgs:'.$key.'>';
            if(is_array($val)){
                foreach($val as $key2=>$val2){
                    $request .= '<wgs:'.substr($key,0,strlen($key)-1).'>';
                    if(is_array($val2)){
                        $request .= $this->getRequestXMLFromArray($val2);
                    } else {
                        $request .= $val;
                    }
                    $request .= '</wgs:'.substr($key,0,strlen($key)-1).'>';
                }
            } else {
                $request .= $val;
            }
            $request .= '</wgs:'.$key.'>';
        }
        return $request;
    }
    
    function getArrayFromResponse($response) { 
        $dom = new DOMDocument();
        try{
            $dom->loadXML($response);
        } catch (Exception $e) {
            $response = str_ireplace("utf-8","iso-8859-1",$response);
            $dom->loadXML($response);
        }
        
        $node = $dom->getElementsByTagNameNS($this->nameSpace, $this->metodo."Response");
        $arr = $this->getArrayFromDocumentNode($node->item(0));
        return $this->clearNodeArray($arr);
    }
    
    function clearNodeArray($arr){
        $retorno = array();
        foreach($arr as $key=>$val){
            $k = str_replace("wgs:","",$key);
            if(is_array($val)){
                if((isset($val[0])&&($val[0]==""))){
                    $retorno[$k] = "";
                }
                else if(isset($val[0]["#text"])){
                    $retorno[$k] = $val[0]["#text"];
                } else {
                    foreach($val as $k1=>$val1){
                        if(is_array($val1)){
                            $retornoAux = $this->clearNodeArray($val1);
                            foreach($retornoAux as $k2=>$val2){
                                if(($k2==substr($k,0,strlen($k2)))&&(is_array($val2))&&(count($val2)==1)){
                                    $retorno[$k][$k1] = $val2[0];
                                } else {
                                    $retorno[$k][$k1][$k2] = $val2;
                                }
                            }
                        } else {
                            $retorno[$k][$k1] = $val1; 
                        }
                    }
                }
            } else {
                $retorno[$k] = $val;
            }
        }   
        return $retorno;
    }

    function getArrayFromDocumentNode($node) 
    { 
        $array = false; 

        if ($node->hasAttributes()) 
        { 
            foreach ($node->attributes as $attr) 
            { 
                $array[$attr->nodeName] = $attr->nodeValue; 
            } 
        } 

        if ($node->hasChildNodes()) 
        { 
            if ($node->childNodes->length == 1) 
            { 
                if ($node->firstChild->hasChildNodes()) {
                    $array[$node->firstChild->nodeName][] = $this->getArrayFromDocumentNode($node->firstChild); 
                } else {
                    $array[$node->firstChild->nodeName] = $node->firstChild->nodeValue; 
                }
                
            } 
            else 
            { 
                foreach ($node->childNodes as $childNode) 
                { 
                    if ($childNode->nodeType != XML_TEXT_NODE) 
                    { 
                        $array[$childNode->nodeName][] = $this->getArrayFromDocumentNode($childNode); 
                    } 
                } 
            } 
        } 

        return $array; 
    }
    
}
?>