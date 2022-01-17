<?php

use \Dotenv\Dotenv as Dotenv;

function configExtensoes()
{ 
    if (file_exists(__DIR__ . '/vendor/autoload.php')) {
        require_once(__DIR__ . '/vendor/autoload.php');
    }
}
function configVariaveisAmbiente()
{
    $dotenv = Dotenv::createImmutable(__DIR__, './.env');
    $dotenv->load();
}
function configConstantes()
{
    define('APP_CONFIG', true);
}
function loadClasses()
{
    spl_autoload_register(function ($className) {
        $ds = DIRECTORY_SEPARATOR;
        $dir = __DIR__;
        $className = str_replace('\\', $ds, $className);
        $file = "{$dir}{$ds}{$className}.php";
        if(is_readable($file)){
            require_once $file;
        }
    });
}
if (!defined('APP_CONFIG')) {
    configExtensoes();
    configVariaveisAmbiente();
    configConstantes();
    loadClasses();
}
