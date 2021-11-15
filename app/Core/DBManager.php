<?php
namespace Com\Daw2\Core;

use \PDO;
class DBManager
{
  // Contenedor de la instancia de la Clase
  private static $instance;
  private $db;
  //Previene creacion de objetos via new
  
  private function __construct() { }
  // Única forma para obtener el objeto singleton
  
  public static function getInstance ()
  {
    if ( is_null ( self::$instance) ) {
       self::$instance = new self();
    }
    return self::$instance;
  }
  
  public function getConnection (){
    if (is_null($this->db)) {
        $config = Config::getInstance();
        $host = $config->get('dbhost');
        $dbname = $config->get('dbname');
        $dbuser = $config->get('dbuser');
        $dbpass = $config->get('dbpass');
        $charset = $config->get('dbcharset');
        $options = [
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try{
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset",
                           $dbuser, $dbpass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
    return $this->db;
 }
}
