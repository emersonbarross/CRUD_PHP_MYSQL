<?php

require_once("config.php");

//$usuario = new Model();

//$usuario->insere("050", "EMERSON", "M", "4050", "LATITUTE", "DELL");

//$usuario->consultaGeral();

//$usuario->updateUso("108", "4050", NULL, "1412");

//$usuario->deleteUso("50", "4050");

require_once("vendor/autoload.php");

$app = new \Slim\Slim();
$app->get('/consulta', function(){
    $usuario = new Model();
    $usuario->consultaGeral();
});

$app->run();


?>