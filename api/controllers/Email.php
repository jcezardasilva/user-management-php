<?php

namespace api\controllers;

//use api\models\Email as Model;
use api\controllers\Json;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class Email
{
    public function __construct($app)
    {
        $app->post('/email', function (Request $req, Response $res, array $args) {
            $model = new Model();
            $parsedBody = $req->getParsedBody();
            $subject = $parsedBody["subject"];
            $responsavel_nome = $parsedBody["responsavel_nome"];
            $url_termo = $parsedBody["url_termo"];
            $nome = $parsedBody["nome"];
            $url_formulario = $parsedBody["url_formulario"];
            $to = $parsedBody["to"];

            $model->send($subject,$responsavel_nome,$url_termo,$nome,$url_formulario,$to);
            $res->getBody();
        });
    }
}
