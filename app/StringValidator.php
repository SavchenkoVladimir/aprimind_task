<?php
  /* This class verifies strings lengrh and disarm them. */
  class StringValidator{
    public $data;
    
    public function __construct(){
	  $this->data = FormValidator::$data;
	}
    
    /* This method adopts form fields names and its max-length as multi-level array and make warnings if length more than 
    allowed. */
 	public function lengthValidate($lengthPointersArr){ 		
	  foreach( $lengthPointersArr as $value ){
	    if( mb_strlen($this->data[$value[0]]) > $value[1] ){
    	  FormValidator::$warningsArray[$value[0]] = $value[1];
		}
	  }	  
	}
 	
	/* This method prepare strings to be inserted to the database. */
	public function handleStrings($stringsPointerArr){
	  foreach( $stringsPointerArr as $value ){
	    if( isset($this->data[$value]) && $this->data[$value] != '' ){
		  FormValidator::$verifiedDataArr[$value] = htmlspecialchars(strip_tags(stripcslashes(trim($this->data[$value]))));
		}
	  }
	}
  }