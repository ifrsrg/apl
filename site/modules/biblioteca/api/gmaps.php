<?php

/**
 * gMaps Class
 *
 * Pega as informações de latitude, longitude e zoom de um endereço usando a API do Google Maps
 *
 * @author Thiago Belem <contato@thiagobelem.net>
 */
class gMaps {
	// Host do GoogleMaps
	private $mapsHost = 'maps.google.com';
	// Sua Google Maps API Key
	public $mapsKey = '';

	function __construct($key = null) {
		if (!is_null($key)) {
			$this->mapsKey = $key;
		}
	}

	function geoLocal($endereco) {
		$url = "http://maps.google.com/maps/geo?q=$endereco&key=".getGoogleApiKey()."&output=json";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$response = curl_exec($ch);
		curl_close($ch);
		$response_a = json_decode($response);
		
		$result['lat'] = $lat = $response_a->results[0]->geometry->location->lat;
		$result['lng'] = $response_a->results[0]->geometry->location->lng;
		
		return $result;
	}
}

?>