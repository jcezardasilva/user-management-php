<?php

namespace api\controllers;

use api\models\Form as Model;
use api\controllers\Json;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

function toBoolean($value){
    if($value){
        return "1";
    }
    else{
        return "0";
    }
}
class Form
{
    public function __construct($app)
    {
        $app->post('/form', function (Request $req, Response $res, array $args) {

            $model = new Model();
            $parsedBody = $req->getParsedBody();

            $nome = $parsedBody["nome"];
            $email = $parsedBody["email"];
            $nascimento = $parsedBody["nascimento"];
            $responsavel_nome = $parsedBody["responsavel_nome"];
            $responsavel_cpf = $parsedBody["responsavel_cpf"];
            $responsavel_email = $parsedBody["responsavel_email"];
            $responsavel_endereco_logradouro = $parsedBody["responsavel_endereco_logradouro"];
            $responsavel_endereco_numero = $parsedBody["responsavel_endereco_numero"];
            $responsavel_endereco_complemento = $parsedBody["responsavel_endereco_complemento"];
            $responsavel_endereco_bairro = $parsedBody["responsavel_endereco_bairro"];
            $responsavel_endereco_cidade = $parsedBody["responsavel_endereco_cidade"];
            $responsavel_endereco_estado = $parsedBody["responsavel_endereco_estado"];
            $responsavel_endereco_cep = $parsedBody["responsavel_endereco_cep"];
            $responsavel_autorizacao = $parsedBody["responsavel_autorizacao"];
            $responsavel_autorizacao = toBoolean($responsavel_autorizacao);
            
            $cpf = $parsedBody["cpf"];
            $telefone = $parsedBody["telefone"];
            $telefone_fixo = $parsedBody["telefone_fixo"];
            $cidade = $parsedBody["cidade"];
            $estado = $parsedBody["estado"];

            $possui_deficiencia = $parsedBody["possui_deficiencia"];
            $possui_deficiencia = toBoolean($possui_deficiencia);

            $deficiencia = $parsedBody["deficiencia"];
            $identificacao_genero = $parsedBody["identificacao_genero"];
            $raca_etnia = $parsedBody["raca_etnia"];
            $estudante = $parsedBody["estudante"];
            $estudante = toBoolean($estudante);

            $escolaridade = $parsedBody["escolaridade"];
            $estudante_nivel = $parsedBody["estudante_nivel"];
            $area_interesse = $parsedBody["area_interesse"];
            $como_soube_feira = $parsedBody["como_soube_feira"];
            
            $autorizo_compartilhamento_dados = $parsedBody["autorizo_compartilhamento_dados"];
            $autorizo_compartilhamento_dados = toBoolean($autorizo_compartilhamento_dados);
            
            $attr = ["nome"=> $nome,
                        "email" => $email, 
                        "nascimento"=> $nascimento, 
                        "responsavel_nome"=>$responsavel_nome, 
                        "responsavel_cpf"=> $responsavel_cpf, 
                        "responsavel_email"=> $responsavel_email, 
                        "responsavel_endereco_logradouro"=> $responsavel_endereco_logradouro, 
                        "responsavel_endereco_numero"=> $responsavel_endereco_numero, 
                        "responsavel_endereco_complemento"=> $responsavel_endereco_complemento, 
                        "responsavel_endereco_bairro"=> $responsavel_endereco_bairro, 
                        "responsavel_endereco_cidade"=> $responsavel_endereco_cidade, 
                        "responsavel_endereco_estado"=> $responsavel_endereco_estado, 
                        "responsavel_endereco_cep"=> $responsavel_endereco_cep, 
                        "responsavel_autorizacao"=> $responsavel_autorizacao, 
                        "cpf"=> $cpf, 
                        "telefone"=> $telefone, 
                        "telefone_fixo"=> $telefone_fixo, 
                        "cidade"=> $cidade, 
                        "estado"=> $estado, 
                        "possui_deficiencia"=> $possui_deficiencia, 
                        "deficiencia"=> $deficiencia, 
                        "identificacao_genero"=> $identificacao_genero, 
                        "raca_etnia"=> $raca_etnia, 
                        "estudante"=> $estudante, 
                        "escolaridade"=> $escolaridade, 
                        "estudante_nivel"=> $estudante_nivel, 
                        "area_interesse"=> $area_interesse, 
                        "como_soube_feira"=> $como_soube_feira, 
                        "autorizo_compartilhamento_dados"=> $autorizo_compartilhamento_dados
                    ];
                    
            $pre_cadastro = $model->search($email);
            if($pre_cadastro){
                return $res->getBody()->write("(já existe um cadastro para esse e-mail)");
            }
            else{
                $attr["cadastro_completo"] = 1;
                $result = $model->create($attr);
                return $res->getBody()->write(Json::stringify($result));
            }
        });
    }
}
