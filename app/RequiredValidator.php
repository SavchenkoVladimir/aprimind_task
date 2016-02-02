<?php
  /* This class adopts the required fields list and return message array if any field is empty. */
  class RequiredValidator{
    public $data;
    public $resp;
    public $requiredFields;
    
    public function __construct($requiredFieldsArr){
	  $this->data = FormValidator::$data;
	  $this->requiredFields = $requiredFieldsArr;
	}
	
	public function validate(){
      foreach( $this->requiredFields as $value ){
	    if( !$this->data[$value] ){
          FormValidator::$warningsArray[$value] = ' is required.';
		}
	  }
	}
  }