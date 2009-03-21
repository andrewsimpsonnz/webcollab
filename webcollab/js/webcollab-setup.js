/*
  $Id: webcollab.js 2068 2009-01-31 08:14:29Z andrewsimpson $
  (c) 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>
  ---------
  Javascript function library for WebCollab setup
*/

function fieldCheck(){
  var user = document.getElementById('user');
  var pass1 = document.getElementById('password');
  var pass2 = document.getElementById('password_check');
  var email = document.getElementById('email');
  if (user.length === 0 || pass1.length === 0 || pass2.length === 0 ) {
    alert(text.AlertField );
    return false;
  }
  if (pass1.value != pass2.value ) {
    alert(text.PassMatch );
  return false;
  }
  with(email) {
    if (value.indexOf('@') == -1 || value.lastIndexOf('.') == -1) {
      alert(text.EmailMiss );
      return false;
    }
  }
  return true;
}