<?php
namespace api\controllers;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

class Servidor
{
    public function __construct($app)
    {
        $app->get('/info', function (Request $req, Response $res, array $args) {
            phpinfo();
            return $res;
        });
    }
}
