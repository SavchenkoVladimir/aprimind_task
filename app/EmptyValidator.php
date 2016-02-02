<?php
  /* This method returns an empty form if submit button had not been pressed. */
  class EmptyValidator{
    public $data;
    
    public function __construct($data){
	  $this->data = $data;
	}
	
	public function validate(){
	  if( !isset($this->data['submit']) || $this->data['submit'] != 'on' ){
	    include($_SERVER['DOCUMENT_ROOT'].'/aprimindTask/view/message_form.php');
	    exit();
	  }
	}
  }