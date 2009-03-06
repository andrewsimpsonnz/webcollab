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
  if (user.length == 0 || pass1.length == 0 || pass2.length == 0 ) {
    alert('Please enter the missing field' );
    return false;
  }
  if (pass1.value != pass2.value ) {
    alert('Passwords do not match!');
  return false;
  }
}
