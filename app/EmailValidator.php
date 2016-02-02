<?php
  /* This class verifies email field matches or not a regular expression. */
  class EmailValidator{
    public $email;
  
    public function validate($fieldName){
	  if( isset(FormValidator::$data[$fieldName]) ){
	    if( preg_match(EMAIL_PATTERN, FormValidator::$data[$fieldName]) === 1 ){
		  FormValidator::$verifiedDataArr[$fieldName] = FormValidator::$data[$fieldName];
		}else{
		  FormValidator::$warningsArray[$fieldName] = 'not valid';
		}
	  }
	} 
  }