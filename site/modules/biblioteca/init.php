<?php defined('SYSPATH') or die('No direct script access.');

require Kohana::find_file("api", "amazonsns.class");
require Kohana::find_file("api", "functions");
require Kohana::find_file("api", "function.date.class");
require Kohana::find_file("api", "upload");
require Kohana::find_file("api", "share");
require Kohana::find_file("api/maps", "geocoder");
require Kohana::find_file("api/maps", "placemark");
require Kohana::find_file("api/maps", "point");

require Kohana::find_file("classes/components", "utils");

require Kohana::find_file("classes/model", "usuario");
require Kohana::find_file("classes/model", "texto_sistema");
require Kohana::find_file("classes/model", "conceitual");
require Kohana::find_file("classes/model", "apresentacao");
require Kohana::find_file("classes/model", "noticia");
require Kohana::find_file("classes/model", "download");
require Kohana::find_file("classes/model", "download_categoria");
require Kohana::find_file("classes/model", "evento_foto");
require Kohana::find_file("classes/model", "evento");
require Kohana::find_file("classes/model", "associado");
require Kohana::find_file("classes/model", "fornecedor");
require Kohana::find_file("classes/model", "associado_categoria");
require Kohana::find_file("classes/model", "fornecedor_categoria");
require Kohana::find_file("classes/model", "newsletter");
require Kohana::find_file("classes/model", "envio");
require Kohana::find_file("classes/model", "email_categoria");
require Kohana::find_file("classes/model", "email");

require Kohana::find_file("classes/model", "frontInformacao");
require Kohana::find_file("classes/template", "template");
require Kohana::find_file("classes/template", "viewTemplate");

require Kohana::find_file("classes", "BoxContratos");