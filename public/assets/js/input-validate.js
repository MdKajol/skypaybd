// Form Data
var errors = {
   initSubmit: true
};
function validateEmail(email) {
   var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
   return re.test(String(email).toLowerCase());
}
function checkEmpty(ele, message = null) {
   if($(ele).val() == "") {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         errors[$(ele).attr("id")].empty = message ? message: "Can not Empty";
      } else {
         errors[$(ele).attr("id")] = {};
         errors[$(ele).attr("id")].empty = message ? message: "Can not Empty";
      }
   } else {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         delete errors[$(ele).attr("id")].empty;
      }
   }
}
function checkEmail(ele, message = null) {
   if(!validateEmail($(ele).val())) {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         errors[$(ele).attr("id")].email = message ? message: "please enter a valid email";
      } else {
         errors[$(ele).attr("id")] = {};
         errors[$(ele).attr("id")].email = message ? message: "please enter a valid email";
      }
   } else {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         delete errors[$(ele).attr("id")].email;
      }
   }
}
function checkMinLength(ele, len, message = null) {
   if(($(ele).val().length) < len) {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         errors[$(ele).attr("id")].minLength = message ? message : "length must be gather than " + len;
      } else {
         errors[$(ele).attr("id")] = {};
         errors[$(ele).attr("id")].minLength = message ? message : "length must be gather than " + len;
      }
   } else {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         delete window.errors[$(ele).attr("id")].minLength;
      }
   }
}
function checkMaxLength(ele, len, message = null) {
   if(($(ele).val().length) >= len) {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         errors[$(ele).attr("id")].MaxLength = message ? message : "length must be less than " + len;
      } else {
         errors[$(ele).attr("id")] = {};
         errors[$(ele).attr("id")].MaxLength = message ? message : "length must be less than " + len;
      }
   } else {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         delete window.errors[$(ele).attr("id")].MaxLength;
      }
   }
}
function confirmPass(ele, pass, message = null) {
   if($(ele).val() != pass.value) {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         errors[$(ele).attr("id")].confirmPass = message ? message: "password doesn't match";
      } else {
         errors[$(ele).attr("id")] = {};
         errors[$(ele).attr("id")].confirmPass = message ? message: "password doesn't match";
      }
   } else {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         delete errors[$(ele).attr("id")].confirmPass;
      }
   }
}
function checkPhone(ele, region = "", message = null) {
   var region = region.toLowerCase();
   if(region == "bd" || region == "") {
      var p = /^(?:\+88|01)?(?:\d{11}|\d{13})$/gm;
   }

   var bool = p.test($(ele).val());
   if( !bool ) {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         errors[$(ele).attr("id")].phoneError = message ? message: "Invalid phone number";
      } else {
         errors[$(ele).attr("id")] = {};
         errors[$(ele).attr("id")].phoneError = message ? message: "Invalid phone number";
      }
   } else {
      if( window.errors.hasOwnProperty( $(ele).attr("id") ) ) {
         delete errors[$(ele).attr("id")].phoneError;
      }
   }
}

function checkValidation(param) {
   errors.initSubmit = false;
   var ele = param.ele;
   var check = param.check;
   if( jQuery.isEmptyObject(check) ) {
      return false;
   }
   if(check.empty) {
      if(check.empty[0]) {
         checkEmpty(ele, check.empty[1]);
      }
   }
   if(check.email) {
      if(check.email[0]) {
         checkEmail(ele, check.email[1]);
      }
   }
   if(check.minLength) {
      if(check.minLength[0]) {
         checkMinLength(ele, check.minLength[0], check.minLength[1]);
      }
   }
   if(check.maxLength) {
      if(check.maxLength[0]) {
         checkMaxLength(ele, check.maxLength[0], check.maxLength[1]);
      }
   }
   if(check.confirmPass) {
      if(check.confirmPass[0]) {
         confirmPass(ele, check.confirmPass[1], check.confirmPass[2]);
      }
   }
   if(check.checkPhone) {
      if(check.checkPhone[0]) {
         checkPhone(ele, check.checkPhone[1], check.checkPhone[2]);
      }
   }

   if(jQuery.isEmptyObject(errors[$(ele).attr("id")])) {
      return "pass";
   }
}

function getErrorMsg(ele) {
   var errorMeg = ""
   for(var error in errors[$(ele).attr("id")]) {
      errorMeg += errors[$(ele).attr("id")][error] + "<br>";
   }
   return errorMeg;
}
function showValidationError(ele, message) {
   $(ele).addClass("error").removeClass("success");
   $(ele).popover({trigger: 'focus', placement : 'right', html:true});
   $(ele).attr('data-original-title', "Error");
   $(ele).attr('data-content', message);
   $(ele).popover('show');
   var popoverId = $(ele).attr("aria-describedby");
   $("#" + popoverId).removeClass("ku-success");
   $("#" + popoverId).addClass("ku-error");
}
function showValidationSuccess(ele, message) {
   $(ele).addClass("success").removeClass("error");
   $(ele).popover({trigger: 'focus', placement : 'right', html:true});
   $(ele).attr('data-original-title', "Success");
   $(ele).attr('data-content', message);
   $(ele).popover('show');
   var popoverId = $(ele).attr("aria-describedby");
   $("#" + popoverId).removeClass("ku-error");
   $("#" + popoverId).addClass("ku-success");
}
function hideValidationError(ele) {
   $(ele).attr('data-content', "");
   $(ele).popover('hide');
   $(ele).removeClass("error success");
}
function checkErrorExist() {
   if(window.errors) {
      var id = [];
      for(var error in window.errors) {
         if( jQuery.isEmptyObject(errors[error]) ) {
         } else {
            id.push(error);
         }
      }
   }
   return id.length ? id : false;
}
function hideError(ele) {
   $(ele).hide();
}
function showError(ele, message) {
   $(ele).slideDown().html(message)
}


// admin form validation
$("#admin-email").on("keyup focus", function() {
   hideError($(".showError"));

   var emailValidate = checkValidation({
      ele: $(this),
      check: {
         empty: [true, "Email cannot be blank"],
         email: [true, "Please Enter a valid email"]
      }
   });

   if(emailValidate !== "pass") {
      // show the errors
      var emailError = getErrorMsg($(this));
      if(emailError) {showValidationError($(this), emailError);}
   } else {
      hideValidationError($(this));
   }
});
$("#admin-password").on("keyup focus", function() {
   hideError($(".showError"));
   var adminValidate = checkValidation({
      ele: $(this),
      check: {
         empty: [true, "Password cannot be blank"]

      }
   });

   if(adminValidate !== "pass") {
      // show the errors
      var adminError = getErrorMsg($(this));
      showValidationError($(this), adminError);
   } else {
      // check all the field
      hideValidationError($(this), "Password OK");
   }
});
$("#admin-form").on("submit", function (e) {
   e.preventDefault();
   var errorId = checkErrorExist();
   if(errorId) {
      // show the errors
      for(var l = 0; l < errorId.length; l++) {
         var id = "#" + errorId[l]
         var emailError = getErrorMsg($(id));
         showValidationError($(id), emailError);
      }
   } else {
      if(!errors.initSubmit) {
         $(this)[0].submit();
      } else {
         // initial form submit
         console.log("please fill the form");
         showError($(".showError"), "Please fill the form Data");
      }

   }
});



// registration form validation
$("#userFullName").on("keyup focus", function() {
   hideError($(".showError"));

   var field = checkValidation({
      ele: $(this),
      check: {
         empty: [true, "Full Name cannot be blank"],
         minLength: [4, "Full Name is too small"],
         maxLength: [20, "Full Name is too long"]
      }
   });

   if(field !== "pass") {
      // show the errors
      var errormsg = getErrorMsg($(this));
      if(errormsg) {showValidationError($(this), errormsg);}
   } else {
      hideValidationError($(this));
   }
});
$("#userEmail").on("keyup focus", function() {
   hideError($(".showError"));

   var field = checkValidation({
      ele: $(this),
      check: {
         empty: [true, "Email cannot be blank"],
         email: [true, "Please Enter a valid email"]
      }
   });

   if(field !== "pass") {
      // show the errors
      var errormsg = getErrorMsg($(this));
      if(errormsg) {showValidationError($(this), errormsg);}
   } else {
      hideValidationError($(this));
   }
});
$("#userPassword").on("keyup focus", function() {
   hideError($(".showError"));

   var field = checkValidation({
      ele: $(this),
      check: {
         empty: [true, "password cannot be blank"],
         minLength: [6, "password is too small"],
         maxLength: [30, "password is too long"]
      }
   });

   if(field !== "pass") {
      // show the errors
      var errormsg = getErrorMsg($(this));
      if(errormsg) {showValidationError($(this), errormsg);}
   } else {
      hideValidationError($(this));
   }
});
$("#userConfirmPassword").on("keyup focus", function() {
   hideError($(".showError"));

   var field = checkValidation({
      ele: $(this),
      check: {
         empty: [true, "confirm password cannot be blank"],
         confirmPass: [true, {value: $("#userPassword").val()}, "password doesn't match"]
      }
   });

   if(field !== "pass") {
      // show the errors
      var errormsg = getErrorMsg($(this));
      if(errormsg) {showValidationError($(this), errormsg);}
   } else {
      showValidationSuccess($(this), "password match");
   }
});
$("#userPhoneNumber").on("keyup focus", function() {
   hideError($(".showError"));

   var field = checkValidation({
      ele: $(this),
      check: {
         empty: [true, "phone number cannot be blank"],
         minLength: [10, "minimum 11 character required"],
         maxLength: [15, "maximum 14 character required"],
         checkPhone: [true, "BD", "Invalid phone number"]
      }
   });

   if(field !== "pass") {
      // show the errors
      var errormsg = getErrorMsg($(this));
      if(errormsg) {showValidationError($(this), errormsg);}
   } else {
      hideValidationError($(this));
   }
});









