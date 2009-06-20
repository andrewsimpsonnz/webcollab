/*
  $Id: webcollab.js 2068 2009-01-31 08:14:29Z andrewsimpson $
  (c) 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>
  ---------
  Javascript function library for WebCollab setup
*/

function userCheck(){
  var error = 0;
  for(var i = 0; i < arguments.length; i++ ) {
    var field = document.getElementById(arguments[i]).value;
    var id = document.getElementById(arguments[i]).id;
    if(field.length === 0) {
      document.getElementById(arguments[i]).focus();
      document.getElementById(arguments[i]).style.background='#FFFF94';
      error = 1;
    }
    if (id == 'password' ) {
      var pass1 = field;
    }
    if (id == 'password_check' ) {
      var pass2 = field;
    }
    if(id == 'email' ) {
      if(field.indexOf('@') == -1 || field.lastIndexOf('.') < 2) {
        document.getElementById('email').focus();
        document.getElementById('email').style.background='#FFB3B3';
        alert(document.getElementById('alert_email').value);
        return false;
      }
    }
  }
  if(error == 1  ) {
      alert(document.getElementById('alert_field').value);
      return false;
  }
  if (pass1 != pass2 ) {
    alert(document.getElementById('pass_match').value);
    return false;
  }
  return true;
}

function fieldCheck(){
  var error = 0;
  for(var i = 0; i < arguments.length; i++ ) {
    var field = document.getElementById(arguments[i]).value;
    var id = document.getElementById(arguments[i]).id;
    if(field.length === 0) {
      document.getElementById(arguments[i]).focus();
      document.getElementById(arguments[i]).style.background='#FFFF94';
      error = 1;
    }
  }
  if(error == 1  ) {
      alert(document.getElementById('alert_field').value);
      return false;
  }
  return true;
}
