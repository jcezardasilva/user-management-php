<?php

namespace api\models;

use api\dao\Conexao;
use stdClass;

class Form
{
    public function __construct()
    {
        return null;
    }
    public function create($attr)
    {

        $conexao = Conexao::getInstance();
        $date = date('Y-m-d H:i:s');

        $sql = "INSERT INTO forms(";
        $sql .= "nome, ";
        $sql .= "email, ";
        $sql .= "nascimento, ";
        $sql .= "responsavel_nome, ";
        $sql .= "responsavel_cpf, ";
        $sql .= "responsavel_email, ";
        $sql .= "responsavel_endereco_logradouro, ";
        $sql .= "responsavel_endereco_numero, ";
        $sql .= "responsavel_endereco_complemento, ";
        $sql .= "responsavel_endereco_bairro, ";
        $sql .= "responsavel_endereco_cidade, ";
        $sql .= "responsavel_endereco_estado, ";
        $sql .= "responsavel_endereco_cep, ";
        $sql .= "responsavel_autorizacao, ";
        $sql .= "cpf, ";
        $sql .= "telefone, ";
        $sql .= "telefone_fixo, ";
        $sql .= "cidade, ";
        $sql .= "estado, ";
        $sql .= "possui_deficiencia, ";
        $sql .= "deficiencia, ";
        $sql .= "identificacao_genero, ";
        $sql .= "raca_etnia, ";
        $sql .= "estudante, ";
        $sql .= "escolaridade, ";
        $sql .= "estudante_nivel, ";
        $sql .= "area_interesse, ";
        $sql .= "como_soube_feira, ";
        $sql .= "autorizo_compartilhamento_dados, ";
        $sql .= "createdAt, ";
        $sql .= "updatedAt, ";
        $sql .= "cadastro_completo) ";

        $sql .= "VALUES( ";
        $sql .= "'{$attr["nome"]}', ";
        $sql .= "'{$attr["email"]}', ";
        $sql .= "'{$attr["nascimento"]}', ";
        $sql .= "'{$attr["responsavel_nome"]}', ";
        $sql .= "'{$attr["responsavel_cpf"]}', ";
        $sql .= "'{$attr["responsavel_email"]}', ";
        $sql .= "'{$attr["responsavel_endereco_logradouro"]}', ";
        $sql .= "'{$attr["responsavel_endereco_numero"]}', ";
        $sql .= "'{$attr["responsavel_endereco_complemento"]}', ";
        $sql .= "'{$attr["responsavel_endereco_bairro"]}', ";
        $sql .= "'{$attr["responsavel_endereco_cidade"]}', ";
        $sql .= "'{$attr["responsavel_endereco_estado"]}', ";
        $sql .= "'{$attr["responsavel_endereco_cep"]}', ";
        $sql .= "'{$attr["responsavel_autorizacao"]}', ";
        $sql .= "'{$attr["cpf"]}', ";
        $sql .= "'{$attr["telefone"]}', ";
        $sql .= "'{$attr["telefone_fixo"]}', ";
        $sql .= "'{$attr["cidade"]}', ";
        $sql .= "'{$attr["estado"]}', ";
        $sql .= "'{$attr["possui_deficiencia"]}', ";
        $sql .= "'{$attr["deficiencia"]}', ";
        $sql .= "'{$attr["identificacao_genero"]}', ";
        $sql .= "'{$attr["raca_etnia"]}', ";
        $sql .= "'{$attr["estudante"]}', ";
        $sql .= "'{$attr["escolaridade"]}', ";
        $sql .= "'{$attr["estudante_nivel"]}', ";
        $sql .= "'{$attr["area_interesse"]}', ";
        $sql .= "'{$attr["como_soube_feira"]}', ";
        $sql .= "'{$attr["autorizo_compartilhamento_dados"]}', ";
        $sql .= "'" . $date . "', ";
        $sql .= "'" . $date . "', ";
        $sql .= "'{$attr["cadastro_completo"]}');";
        
        try {
            $stm = $conexao->prepare($sql);
            $result = $stm->execute();
        } catch (Exception $e) {
            error_log("Falha ao inserir dados no banco. " . $e->getMessage(), 3, __DIR__ . "/../../errors.log");
        }
        
        if ($result == 1) {
            return ["status" =>$result, "message" => "formulário gravado."];
        } else {
            return ["status" =>$result, "message" => "Não foi possível gravar o formulário."];
        }
    }    
    public function update($attr)
    {

        $conexao = Conexao::getInstance();
        $date = date('Y-m-d H:i:s');
        $sql = "UPDATE forms ";
        $sql .= "SET ";
        $sql .= "nascimento = '{$attr["nascimento"]}', ";
        $sql .= "responsavel_autorizacao = '{$attr["responsavel_autorizacao"]}', ";
        $sql .= "cpf = '{$attr["cpf"]}', ";
        $sql .= "telefone = '{$attr["telefone"]}', ";
        $sql .= "telefone_fixo = '{$attr["telefone_fixo"]}', ";
        $sql .= "cidade = '{$attr["cidade"]}', ";
        $sql .= "estado = '{$attr["estado"]}', ";
        $sql .= "possui_deficiencia = '{$attr["possui_deficiencia"]}', ";
        $sql .= "deficiencia = '{$attr["deficiencia"]}', ";
        $sql .= "identificacao_genero = '{$attr["identificacao_genero"]}', ";
        $sql .= "raca_etnia = '{$attr["raca_etnia"]}', ";
        $sql .= "estudante = '{$attr["estudante"]}', ";
        $sql .= "escolaridade = '{$attr["escolaridade"]}', ";
        $sql .= "estudante_nivel = '{$attr["estudante_nivel"]}', ";
        $sql .= "area_interesse = '{$attr["area_interesse"]}', ";
        $sql .= "como_soube_feira = '{$attr["como_soube_feira"]}', ";
        $sql .= "autorizo_compartilhamento_dados = '{$attr["autorizo_compartilhamento_dados"]}', ";
        $sql .= "updatedAt = '{$date}' ";
        $sql .= "cadastro_completo = 1 ";
        $sql .= "WHERE id = '{$attr["id"]}'";

        try {
            $stm = $conexao->prepare($sql);
            $result = $stm->execute();
        } catch (Exception $e) {
            error_log("Falha ao inserir dados no banco. " . $e->getMessage(), 3, __DIR__ . "/../../errors.log");
        }
        
        if ($result == 1) {
            return ["status" =>$result, "message" => "formulário gravado."];
        } else {
            return ["status" =>$result, "message" => "Não foi possível gravar o formulário."];
        }
    }    
    public function getAll()
    {
        $conexao = Conexao::getInstance();
        $sql = "SELECT * FROM forms;";
        $stm = $conexao->prepare($sql);
        $stm->execute();
        $retorno = $stm->fetchAll(Conexao::getFetch());

        if ($retorno) {
            return $retorno;
        } else {
            return null;
        }
    }
    public function search($email){
        $conexao = Conexao::getInstance();
        $sql = "select id, cadastro_completo from forms where email = ? limit 1";
        $stm = $conexao->prepare($sql);
        $stm->bindValue(1, $email);
        $stm->execute();
        $retorno = $stm->fetch(Conexao::getFetch());
        if ($retorno) {
            return $retorno;
        } else {
            return null;
        }
    }
}
