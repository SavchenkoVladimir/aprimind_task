<?php
  class Db{
  	public $connection;
  	
    public function connect(){
	  $this->connection = new PDO('mysql:host='.HOST.';dbname='.DB_NAME, USER, PASSW);
	  return $this->connection;  
	}
  }