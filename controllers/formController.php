<?php
  require_once($_SERVER['DOCUMENT_ROOT'].'/aprimindTask/config/config.php');
  
  /* Making data validation. */
  $formValidation = new FormValidator($_REQUEST);
  $validationResault = $formValidation->validate();

  
  /* If data are not valid display warnings */
  if( isset($validationResault[0][0]) == 'FALSE' ){
  	$warnings = $validationResault[1];
  	
  	/* If AJAX return warnings array. */
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
      echo 'window.location = "http://savchenkoportfolio/aprimindtask/view/warnings_form.php"';
      return $warnings;
	}
	
    include_once($_SERVER['DOCUMENT_ROOT'].'/aprimindTask/view/warnings_form.php');
  /* If data are valid insert them into DB. */
  }else{
    $insertData = new CreateData;
    $insertData->insert($validationResault);
    
    /* If AJAX return relocation. */
    if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH'])
    && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	   echo "window.location = 'http://savchenkoportfolio/aprimindtask/controllers/showController.php'";
	   return;
	}
	
    $showData = new ReadData;
    $data = $showData->read();
    include_once($_SERVER['DOCUMENT_ROOT'].'/aprimindTask/view/resaults.php');
  }
?>