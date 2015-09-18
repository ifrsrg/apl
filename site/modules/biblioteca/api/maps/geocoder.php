<?php
    class Geocoder
    {
        public static $url = 'https://maps.googleapis.com/maps/api/geocode/xml';
 
        const G_GEO_SUCCESS             = 'OK';
 
        protected $_apiKey;
 
        public function __construct($key)
        {
            $this->_apiKey = $key;
        }
 
   		public function performRequest($search, $output = 'xml')
        {
            $url = sprintf('%s?address=%s&sensor=false',
                           self::$url,
                           urlencode($search));
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
            $response = curl_exec($ch);
            curl_close($ch);
            return $response;
        }
        
        public function lookup($search)
        {
        	$response = $this->performRequest($search, 'xml');
        	$xml      = new SimpleXMLElement($response);
        	$status   = (int) $xml->status;
        	
        	switch ($status) {
        		case self::G_GEO_SUCCESS:
       				$placemarks = array();
        			
       				
       				if(!isset($xml->result))
       					return array();
       				
       				$results = $xml->result;
       				
        			if(!is_array($results))
        				$results = array($results);
        			
        			foreach ($xml->result as $placemark)
        				$placemarks[] = Placemark::FromSimpleXml($placemark);
        
        			return $placemarks;    
        		default:
        			return array();
        	}
        }
    }
?>