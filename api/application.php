<?php

namespace api;

use api\controllers as Ctrl;
use api\models\Constantes;

class Application
{
    private $app;
    private $routes = [];
    public function __construct()
    {
        Constantes::set();
        $this->app = new \Slim\App;
        $this->setControllers();
    }
    public function setControllers()
    {
        $app = $this->app;

        array_push($this->routes, new Ctrl\Imagem($app));
        array_push($this->routes, new Ctrl\Email($app));
        array_push($this->routes, new Ctrl\Servidor($app));
        array_push($this->routes, new Ctrl\Form($app));
    }
    public function open()
    {
        $this->app->run();
    }
}
