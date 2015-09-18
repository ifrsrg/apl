<?php defined('SYSPATH') or die('No direct script access.');

return array(

	'default' => array(
		'key' => "docctor_key_encrypt",	
		'cipher' => MCRYPT_RIJNDAEL_128,
		'mode'   => MCRYPT_MODE_OFB,
	),

);
