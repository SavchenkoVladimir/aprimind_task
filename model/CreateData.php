<?php
  class CreateData{
    public $db;
    public $connection;
    public $columnNames;
    public $questions;
    public $values;
    public $query;
    public $prepare;
    
    public function insert($data){
	  $this->db = new Db;
	  $this->connection = $this->db->connect();
	  foreach( $data as $name => $value ){
	    $this->columnNames .= $name.',';
	    $this->questions .= '?,';
	    $this->values[] = $value;
	  }

	  $this->columnNames = substr($this->columnNames, 0, -1);
      $this->questions = substr($this->questions, 0, -1);
      $this->query = 'INSERT INTO messages ('.$this->columnNames.') VALUES ('.$this->questions.')';
      
	  $this->prepare = $this->connection->prepare($this->query);
	  $this->prepare->execute($this->values);
	}
  }