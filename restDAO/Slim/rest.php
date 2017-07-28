<?php
require './Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$app->response()->header('Content-Type', 'application/json;charset=utf-8');



$app->get('/categorias','getCategorias');


function getCategorias()
{

echo "NIlson DESENROLADO";
}

$app->run();

