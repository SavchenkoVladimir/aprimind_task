<?php
  class FormValidator{
    public static $data;
    public $empty;    
    public $required;
    public $strings;
    public static $warningsArray;
    public static $verifiedDataArr;
    public $email;
    public $phone;
    public $insertData;
    
    public function __construct($data){
	  $this::$data = $data;
	}
    
    /* This method returns double items array.
       If verification is failed - first item is string 'FALSE' and second is array of warnings.
       If verification is successful the method returns array of handled data.
    */
    public function validate(){

      $empty = new EmptyValidator($_REQUEST);
      $empty->validate();
      
      /* Type required field's names as arguments array. */
      $this->required = new RequiredValidator(['first_name', 'email']);
      $this->required->validate();//Required fields validation

      /* Type string's names and its length as the multi level array argument. */
      $this->strings = new StringValidator();
      $this->strings->lengthValidate([['first_name', 50], ['last_name', 50], ['message', 1000],
      ['company', 255], ['email', 255], ['phone', 20], ['message', 1000]]);//Strings length validation
      $this->strings->handleStrings(['first_name', 'last_name', 'company', 'job_title', 'message']);//Disarm strings 
   
      /* Email validation. */
      $this->email = new EmailValidator;
      $this->email->validate('email');
      
      /* Phone number validation. */
      $this->phone = new PhoneValidation;
      $this->phone->validate('phone');

      /* Return the resaults. */
      if ( self::$warningsArray != NULL ){
	    return [['FALSE'], [self::$warningsArray]];
	  }else{
	    return self::$verifiedDataArr;
	  }
	}
  }