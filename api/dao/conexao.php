<?php
namespace api\dao;

  use \PDO;
  use \PDOException;

  class Conexao
  {
    /*  
    * Atributo estático para instância do PDO  
    */
    private static $pdo;

    /*  
    * Escondendo o construtor da classe  
    */
    private function __construct()
    {
      //  
    }

    /*  
    * Método estático para retornar uma conexão válida  
    * Verifica se já existe uma instância da conexão, caso não, configura uma nova conexão  
    */
    public static function getInstance()
    {
      if (!isset(self::$pdo)) {
        try {
          
          $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);
          self::$pdo = new PDO("mysql:host=" . getenv('DB_HOST') . "; dbname=" . getenv('DB_NAME') . "; charset=" . getenv('DB_CHARSET') . ";", getenv('DB_USER'), getenv('DB_PASSWORD'), $opcoes);
        } catch (PDOException $e) {
          $message = $e->getMessage();
          error_log("Erro de conexão com banco de dados. " . $message . PHP_EOL, 3, __DIR__ . "/../../errors.log");
        }
      }
      return self::$pdo;
    }
    public static function getFetch()
    {
      return PDO::FETCH_OBJ;
    }
  }
