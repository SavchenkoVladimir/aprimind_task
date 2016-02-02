<?php
  /**
  * Turn on/off error report
  */
  error_reporting(E_ALL);
  /*----------------------------------------------------------------*/
  
  /**
  * The autoload function downloads required class automatically.
  */
  function autoload($className){
    $files = scandir($_SERVER['DOCUMENT_ROOT'].'/aprimindTask/app/');
    foreach( $files as $value ){
	  if( $value == $className.'.php' ){
        $res = require_once($_SERVER['DOCUMENT_ROOT'].'/aprimindTask/app/'.$className.'.php');
	  }
	}
	if( !isset($res) ){
	  $files = scandir($_SERVER['DOCUMENT_ROOT'].'/aprimindTask/model/');
	  foreach( $files as $value ){
	    if( $value == $className.'.php' ){
          $res = require_once($_SERVER['DOCUMENT_ROOT'].'/aprimindTask/model/'.$className.'.php');		  
		}
	  }
	}
  }
  /**
  * autoload function registration 
  */
  spl_autoload_register('autoload');
  /*---------------------------------------------------------------------*/
  
  /**
  * These constants DB configure.
  */
  /* Host. */
  define('HOST', 'localhost');
  /* Database name. */
  define('DB_NAME', 'message_form');
  /* User name. */
  define('USER', 'root');
  /* Password. */
  define('PASSW', '');
  /*-----------------------------------------------------------------------*/
  
  /**
  * These constants set regular expression pattern.
  */
  /* Email pattern. */
  define('EMAIL_PATTERN', '/.+@.+\..+/i');
  /* Phone number pattern. */
  define('PHONE_PATTERN', '/^\+\d{2}\(\d{3}\)\d{3}-\d{2}-\d{2}$/');
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
?>