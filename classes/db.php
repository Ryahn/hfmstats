<?php
$data = include("../config.php");
$configs = json_decode($data);
$db = $configs->dbinfo;


class Database extends PDO {
  private $host     = $db->host;
  private $user     = $db->dbuser;
  private $pass     = $db->dbpass;
  private $dbname   = $db->dbname;

  public function __construct() {
    //SET DSN
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
    //CREATE PDO INSTANCE
    try {
      parent::__construct($dsn, $this->user, $this->pass);
    }
    //CATCH ERRORS
    catch(PDOException $e) {
      echo $e->getMessage();
    }
  }
}

function Salt(){
    return substr(strtr(base64_encode(hex2bin(RandomToken(32))), '+', '.'), 0, 44);
}
echo Salt();
