<?php

require_once("config.php");

$usuario = new Model();

//$usuario->insere("050", "EMERSON", "M", "1412", "LATITUTE", "DELL");

//$usuario->consultaGeral();

$usuario->update("108", "4050", NULL, "1412");

?>