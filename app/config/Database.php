<?php

namespace App\Config;

use \PDO;

class Database {

  // private $db_name;
  // private $db_user;
  // private $db_pass;
  // private $db_host;
  public $pdo;
  //
  // public function __construct ($db_name) {
  //   $this->db_name = $db_name;
  //   $this->db_user = $db_user;
  //   $this->db_pass = $db_pass;
  //   $this->db_host = $db_host;
  // }

  private function getPDO(){
    if ($this->pdo === null) {
      $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USER,DB_PASS);

      // Set fetch mode to object
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

      $this->pdo = $pdo;
    }

    return $this->pdo;
  }

  public function select($query, $fetch_all = true){
    $prepare = $this->getPDO()->prepare($query);
    $prepare->execute();

    if ($fetch_all)
      $data = $prepare->fetchAll();
    else
      $data = $prepare->fetch();

    return $data;
  }

  public function prepareQuery($query){
    $prepare = $this->getPDO()->prepare($query);
    $exec = $prepare->execute();

    return $exec;
  }

    public function beginTransaction(){
      $this->getPDO()->beginTransaction();
    }
}
