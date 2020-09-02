<?php

spl_autoload_register(function($className)
{
    if(file_exists("model" . DIRECTORY_SEPARATOR . $className . ".php"))
    {
        require_once("model" . DIRECTORY_SEPARATOR . $className . ".php");
    }
});


?>