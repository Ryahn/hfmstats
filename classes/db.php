<?php
$data = include("../config.php");

class Database extends PDO {

  public function __construct() {
    //SET DSN
    $dsn = 'mysql:host=' . $data->dbinfo->host . ';dbname=' . $data->dbinfo->dbname;
    //CREATE PDO INSTANCE
    try {
      parent::__construct($dsn, $data->dbinfo->dbuser, $data->dbinfo->dbpass);
    }
    //CATCH ERRORS
    catch(PDOException $e) {
      echo $e->getMessage();
    }
  }
}
