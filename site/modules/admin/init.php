<?php defined('SYSPATH') or die('No direct script access.');

require Kohana::find_file("classes/template", "viewTemplateAdmin");
require Kohana::find_file("classes/controller", "admin");

// Static file serving (CSS, JS, images)
Route::set('docs/media', 'admin/media(/<file>)', array('file' => '.+'))
->defaults(array(
		'controller' => 'arquivo',
		'action'     => 'media',
		'file'       => NULL,
));

Route::set('docs/admin', 'admin(<controller>(;acao;<action>(;id;<id>)))')
	->defaults(array(
		'controller' => 'dashboard',
		'action'     => 'index',
));
