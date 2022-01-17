<?php

namespace api\controllers;

use \api\models\Imagem as Model;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Imagem
{
    public $app;
    public function __construct($app = null)
    {
        if (isset($app)) {
            $this->app = $app;
            $this->getImage();
        }
    }
    public function getImage()
    {
        $this->app->get('/imagem/{name}', function (Request $req, Response $res, array $args) {
            $model = new Model();
            $res->getBody()->write($model->get($args["name"]));
            return $res->withHeader('Content-Type', 'image/jpg');
        });
    }
}
