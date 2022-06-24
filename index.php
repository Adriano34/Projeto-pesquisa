<?php

$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 'index';
$acao = isset($_GET['acao']) ? $_GET['acao'] : 'index';

require 'vendor/autoload.php';

$controller = "App\Controllers\\". ucfirst($pagina) ."Controller";

$app = new $controller();

if (!method_exists($app, $acao)) {
  die('Página não encontrada!');
}

$app->$acao();
$EmpresaDao = new \App\model\EmpresaDao();
$EmpresaDao->create($empresa);