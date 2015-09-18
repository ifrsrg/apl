<?php
    class Point
    {
        protected $_lat;
        protected $_lng;
 
        public function __construct($latitude, $longitude)
        {
            $this->_lat = $latitude;
            $this->_lng = $longitude;
        }
 
        public function getLatitude()
        {
        	return $this->_lat;
        }
        
        public function getLongitude()
        {
        	return $this->_lng;
        }
        
        public static function Create($lat, $lng)
        {
        	return new self($lat, $lng);
        }
    }
?>