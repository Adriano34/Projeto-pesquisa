<?php

$path = $_SERVER['PATH_INFO'] ?? '/index';

$path = explode('/', $path);

$pagina = $path[1] ?? 'index';
$acao = $path[2] ?? 'index';

require 'vendor/autoload.php';

$controller = "App\Controllers\\". ucfirst($pagina) ."Controller";

$app = new $controller();

if (!method_exists($app, $acao)) {
  die('Página não encontrada!');
}

$app->$acao();
