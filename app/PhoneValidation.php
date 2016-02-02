<?php
  class PhoneValidation{
    public $phone;
    
    public function validate($fieldName){
	  if( isset(FormValidator::$data[$fieldName]) ){
	  	if( FormValidator::$data[$fieldName] === '' ){
		  return true;
		}
	    if( preg_match(PHONE_PATTERN, FormValidator::$data[$fieldName]) === 1 ){
		  FormValidator::$verifiedDataArr[$fieldName] = FormValidator::$data[$fieldName];
		}else{
		  FormValidator::$warningsArray[$fieldName] = 'not valid';
		}
	  }
	}	
  }