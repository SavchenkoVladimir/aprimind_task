'use strict';

/* This class adopts fields identifiers as an array and paint a field in pink if it is empty. */
function RequiredValidator(identArr){
  this.objCollection = [];
  this.field;
  this.fielValue;
  
  for( var i = 0; i < identArr.length; i++ ){
    this.objCollection[i] = document.body.querySelector(identArr[i]);
  }
}
/* This method only paint an element inred color if the value is empty. */
RequiredValidator.prototype.paint = function(){

  for( var i = 0; i < this.objCollection.length; i++ ){
  	    console.log(this.objCollection.length);
    if( $(this.objCollection[i]).val() == '' ){

      $(this.objCollection[i]).css('border-color', 'pink');
    }else{
      $(this.objCollection[i]).css('border-color', '');
    }
  }
}
/* This method returs false if element is empty. */
RequiredValidator.prototype.validate = function(){
  for( var i = 0; i < this.objCollection.length; i++ ){
    if( $(this.objCollection[i]).val() == '' ){
	  return false;
	}
	return true;
  }  
}


/* This class adopts an element identifier and change it bordre-color depends on empty or not.  */
function NoEmpty(elemIdent){
  this.elem = document.body.querySelector(elemIdent);
  this.value;
}
NoEmpty.prototype.validate = function(){
  var self = this;
  
  this.elem.addEventListener('input', changeFieldApearance);
  
  function changeFieldApearance(){
  	self.value = $(self.elem).val();

    if( self.value != '' ){
	  $(self.elem).css('border-color', '');
	}else{
	  $(self.elem).css('border-color', 'pink');
	}
  }
}


/* This class adopts an email field identifier and a regular expression.
It verifies the field in regular expression compliance. */
function RegexpValidator(fieldIdent, regExpr){
  this.field = document.body.querySelector(fieldIdent);
  this.fieldValue;
  this.regExpr = regExpr;
}
/* This method verifies the field each time it has been changed. */
RegexpValidator.prototype.validateInputed = function(){
  var self = this;
  
  this.field.addEventListener('input', changeFieldApearance);
  
  function changeFieldApearance(){
    self.fieldValue = $(self.field).val();
    if( !self.fieldValue.match(self.regExpr) ){
      $(self.field).css('border-color', 'pink');
      return false;
    }else{
      $(self.field).css('border-color', '');
      return true;
    }
  }
}
/* It verifies the field in regular expression compliance. */
RegexpValidator.prototype.validate = function(){  
  this.fieldValue = $(this.field).val();
  
  if( this.fieldValue != '' ){
    if( !this.fieldValue.match(this.regExpr) ){
      $(this.field).css('border-color', 'pink');
      return false;
    }else{
      $(this.field).css('border-color', '');
      return true;
    }  
  }
  return false;
}
/* RegExp verification does not applyed if field property is not empty string. */
RegexpValidator.prototype.ifNotEmpty = function(){
  this.fieldValue = $(this.field).val();
  
  if( this.fieldValue === '' ){
    return true;
  }
  if( !this.fieldValue.match(this.regExpr) ){
    $(this.field).css('border-color', 'pink');
    return false;
  }else{
    $(this.field).css('border-color', '');
    return true;
  }  
}

/* This class makes AJAX if data are valid. */
function SendData(){
  this.button;
  this.address;
  this.RequiredValidate;
  this.emailValidate;
  this.phoneVerify;
  this.sendedData = {};
}
/* This method adopts fields identifiers as an array. 
Read property of these fields and make data string. */
SendData.prototype.setData = function(fieldsIdenstArr){
  for( var i = 0; i <= fieldsIdenstArr.length-1; i++ ){
    var field = document.body.querySelector(fieldsIdenstArr[i]);
    var name = $(field).attr('name');
    this.sendedData[name] = $(field).val();
  }
}
/* This class makes AJAX if data are valid. */
SendData.prototype.send = function(buttonIdent, address){
  var self = this;
  this.button = document.body.querySelector(buttonIdent);

  this.address = address;

  $(this.button).click(function(event){

    self.setData(['[name="first_name"]', '[name="company"]', '[name="email"]', '[name="last_name"]',
    '[name="phone"]', '[name="job_title"]', '[name="message"]', '[name="submit"]']);
   
    /* Required fields validation. */
    self.RequiredValidate = new RequiredValidator(['[name="first_name"]', '[name="email"]']);
    self.RequiredValidate.paint();
    
    /* Email validation apply. */
    self.emailValidate = new RegexpValidator('[name="email"]', /.+@.+\..+/i);
   
    /* Phone number apply. */
    self.phoneVerify = new RegexpValidator('[name="phone"]', /^\+\d{2}\(\d{3}\)\d{3}-\d{2}-\d{2}$/);

    /* If data are valid send AJAX. */
    if( self.RequiredValidate.validate() && self.emailValidate.validate() && self.phoneVerify.ifNotEmpty() ){
   
      $.ajaxSetup({
       type: 'POST',   
       url: self.address,
       data: self.sendedData,
       dataType: 'script',
       async: true,
       timeout: 10000
      });
      
      $.ajax({
        success: function(d){
          $('head').append(d);
        },
        error: function(){
          window.location = "http://savchenkoportfolio/aprimindtask/view/404.php";
        }      
      });
    }
    event.preventDefault();
  });  
}
/*---------------------------------------------------------------------------------------------------------*/



/* Email validation apply. */
var emailVerify = new RegexpValidator('[name="email"]', /.+@.+\..+/i);
emailVerify.validateInputed();

/* Phone number validation apply. */
var phoneVerify = new RegexpValidator('[name="phone"]', /^\+\d{2}\(\d{3}\)\d{3}-\d{2}-\d{2}$/);
phoneVerify.validateInputed();

/* Name validation apply. */
var nameVerify = new NoEmpty('[name="first_name"]');
nameVerify.validate();

/* Make an AJAX query. */
var sendData = new SendData();
sendData.send('[name="submit"]', 'http://savchenkoportfolio/aprimindtask/controllers/formController.php');