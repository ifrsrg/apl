<?php defined('SYSPATH') or die('No direct script access.');

define("APPDIR", "/");

// -- Environment setup --------------------------------------------------------

if(isset($_SERVER["argv"])&&(count($_SERVER["argv"])>0)){
 $aux = explode("--uri=",$_SERVER["argv"][1]);
 if(count($aux)>1){
  chdir(DOCROOT);
  $path = APPDIR."/".$aux[1];
  $vars = array("HTTP_X_ORIGINAL_URL","UNENCODED_URL","REQUEST_URI");
  foreach ($vars as $var){
   $_SERVER[$var] = $path;
  }
  define("ISSHELL", true);
 } else {
  define("ISSHELL", false);
 }
} else {
 define("ISSHELL", false);
}

// Load the core Kohana class
require SYSPATH.'classes/kohana/core'.EXT;

include('/home/developer/credentials.php');

// Variavel que define se o servidor que está publicado o site tem suporte a HTTPS ou não 
// No servidor de produção o valor deve ser true
define("HTTPS_HABILITADO", false);

//Variavel que define se o servidor que está publicado o admin do site tem suporte a HTTPS ou não 
// No servidor de produção o valor deve ser true
define("HTTPS_HABILITADO_ADMIN", false);

// Variavel que define se as rotinas poderão ser acessadas apenas por shell ou poderão ser acesssadas através de URL por usuários administradores logados no Admin
// Para melhor segurança é recomendável estar true em Produção 
define("ROTINA_SHELL_ONLY", false);

if (is_file(APPPATH.'classes/kohana'.EXT))
{
	// Application extends the core
	require APPPATH.'classes/kohana'.EXT;
}
else
{
	// Load empty core extension
	require SYSPATH.'classes/kohana'.EXT;
}

/**
 * Set the default time zone.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/timezones
 */
date_default_timezone_set('America/Sao_Paulo');

/**
 * Set the default locale.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 * @see  http://php.net/setlocale
 */
setlocale(LC_ALL, 'en_US.utf-8');

/**
 * Enable the Kohana auto-loader.
 *
 * @see  http://kohanaframework.org/guide/using.autoloading
 * @see  http://php.net/spl_autoload_register
 */
spl_autoload_register(array('Kohana', 'auto_load'));

/**
 * Enable the Kohana auto-loader for unserialization.
 *
 * @see  http://php.net/spl_autoload_call
 * @see  http://php.net/manual/var.configuration.php#unserialize-callback-func
 */
ini_set('unserialize_callback_func', 'spl_autoload_call');

// -- Configuration and initialization -----------------------------------------

/**
 * Set the default language
 */
I18n::lang('en-us');

/**
 * Set Kohana::$environment if a 'KOHANA_ENV' environment variable has been supplied.
 *
 * Note: If you supply an invalid environment name, a PHP warning will be thrown
 * saying "Couldn't find constant Kohana::<INVALID_ENV_NAME>"
 */
if (isset($_SERVER['KOHANA_ENV']))
{
	Kohana::$environment = constant('Kohana::'.strtoupper($_SERVER['KOHANA_ENV']));
}

/**
 * Initialize Kohana, setting the default options.
 *
 * The following options are available:
 *
 * - string   base_url    path, and optionally domain, of your application   NULL
 * - string   index_file  name of your index file, usually "index.php"       index.php
 * - string   charset     internal character set used for input and output   utf-8
 * - string   cache_dir   set the internal cache directory                   APPPATH/cache
 * - boolean  errors      enable or disable error handling                   TRUE
 * - boolean  profile     enable or disable internal profiling               TRUE
 * - boolean  caching     enable or disable internal caching                 FALSE
 */

Kohana::init(array(
	'base_url'   => APPDIR.'/'
));

/**
 * Attach the file write to logging. Multiple writers are supported.
 */
Kohana::$log->attach(new Log_File(APPPATH.'logs'));

/**
 * Attach a file reader to config. Multiple readers are supported.
 */
Kohana::$config->attach(new Config_File);


/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
$m = Kohana::modules(array(
	// 'auth'       => MODPATH.'auth',       // Basic authentication
	// 'cache'      => MODPATH.'cache',      // Caching with multiple backends
	// 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
	 'database'   => MODPATH.'database',   // Database access
	// 'image'      => MODPATH.'image',      // Image manipulation
	 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
	 'biblioteca' => MODPATH.'biblioteca',        // Object Relationship Mapping	 
	// 'unittest'   => MODPATH.'unittest',   // Unit testing
	 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
	 'admin'  	  => MODPATH.'admin',  // User guide and API documentation
	 'paginacao'  => MODPATH.'paginacao', // Paginacao
	 'wideimage'  => MODPATH.'wideimage',
	 'email' 	  => MODPATH.'email'
	));

	
	
require Kohana::find_file("classes/template", "viewTemplateFront");
require Kohana::find_file("classes/controller", "front");

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */

Route::set('default', '(<controller>(;acao;<action>(;id;<id>)))')
->defaults(array(
		'controller' => 'home',
		'action'     => 'index',
));


require "debug.php";
