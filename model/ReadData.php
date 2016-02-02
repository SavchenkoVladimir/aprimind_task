<?php
  class ReadData{
    public $db;
    public $connection;
    public $prepare;
    public $resault;
    
    public function read(){
      $this->db = new Db;
      $this->connection = $this->db->connect();
      
      $this->prepare = $this->connection->prepare('SELECT * from messages');
      $this->prepare->execute();
      $this->resault = $this->prepare->fetchAll(PDO::FETCH_ASSOC);
      
      return  $this->resault;
    }
  }