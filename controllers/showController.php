<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/aprimindTask/config/config.php');
    
    $showData = new ReadData;
    $data = $showData->read();
    include_once($_SERVER['DOCUMENT_ROOT'].'/aprimindTask/view/resaults.php');
?>