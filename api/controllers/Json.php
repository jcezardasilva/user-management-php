<?php
namespace api\controllers;
  class Json {
    /**
      * Retorna o conteúdo JSON transformado em string
      * 
      * @return String
      */
    public static function stringify($object){
      return json_encode($object,JSON_UNESCAPED_UNICODE);
    }
  }
?>