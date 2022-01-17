<?php

namespace api\models;

class Imagem
{
    public $dir = __DIR__ . '/../images/';
    public function __construct()
    {
        return null;
    }
    public function save($name, $data)
    {
        $erros = ["erros" => array()];
        if (empty($name)) {
            array_push($erros['erros'], ["errmsg" => "informe o nome do arquivo."]);
        }
        if (empty($name)) {
            array_push($erros['erros'], ["errmsg" => "arquivo sem conteúdo."]);
        }

        if (count($erros["erros"]) > 0) {
            return $erros;
        } else {
            $retorno = file_put_contents($this->dir . $name, $data);
            if (!$retorno) {
                return ["errmsg" => "falha ao salvar arquivo."];
            } else {
                return ["message" => "arquivo salvo."];
            }
        }
    }
    public function uniqFileName($prefix, $extension)
    {
        return uniqid($prefix, true) . "." . $extension;
    }
    public function saveBase64ToFile($category, $base64)
    {
        $data = explode(',', $base64);
        $metadata = explode('/', $data[0]);
        $extension = explode(';', $metadata[1]);
        $filename = $this->uniqFileName($category . "_", $extension[0]);
        $this->save($filename,$this->fromBase64($data[1]));
        return $filename;
    }
    public function getType($base64){
        $data = explode(',', $base64);
        $metadata = explode('/', $data[0]);
        $type = explode(';', $metadata[1]); 
        return $type[0];
    }
    public function fromBase64($base64){
        return base64_decode($base64);
    }
    public function get($filename)
    {
        $file = $this->dir .  $filename;
        $retorno = null;
        if (file_exists($file)) {
            $fh = fopen($file, 'rb');
            $retorno = new \Slim\Http\Stream($fh);
        }
        return  $retorno;
    }
    public function getImages()
    {
        $list = [];
        if ($handle = opendir($this->dir)) {
            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    array_push($list, $file);
                }
            }
            closedir($handle);
        }
        return $list;
    }
}
