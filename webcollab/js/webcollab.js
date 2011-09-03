/*
  $Id: webcollab.js 2068 2009-01-31 08:14:29Z andrewsimpson $
  (c) 2009 - 2011 Andrew Simpson <andrew.simpson at paradise.net.nz>
  ---------
  Javascript function library for WebCollab
*/

function fieldCheck(){
  var fieldError = 0;
  for(var i = 0; i < arguments.length; i++ ) {
    var field = document.getElementById(arguments[i]).value;
    var idField = document.getElementById(arguments[i]).id;
    if(field.length === 0) {
      document.getElementById(arguments[i]).focus();
      document.getElementById(arguments[i]).style.background='#FFFF94';
      fieldError = 1;
    }
  }
  if(fieldError == 1) {
    alert(document.getElementById('alert_field').value);
    return false;
  }
  return true;
}

function emailCheck() {
  var emailError = 0;
  for(var j = 0; j < arguments.length; j++ ) {
    var email = document.getElementById(arguments[j]).value;
    var idEmail = document.getElementById(arguments[j]).id;
    if(email.indexOf('@') == -1 || email.lastIndexOf('.') < 2) {
      document.getElementById(idEmail).focus();
      document.getElementById(idEmail).style.background='#FFB3B3';
      emailError = 1;
    }
  }
  if(emailError == 1) {
    alert(document.getElementById('alert_email').value);
    return false;
  }
  return true;
}

function dateCheck() {
  var daysMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];
  if(document.getElementById('year').value % 4 === 0 ){
    daysMonth[1] = 29;}
  if(document.getElementById('day').value > daysMonth[(document.getElementById('month').value-1)] ){
    alert(document.getElementById('alert_date').value);
    return false;
  }
  var finishDate = document.getElementById('projectDate').value;
  if(finishDate > 0 ) {
    var statusType = document.getElementById('projectStatus').value;
    if(statusType != 'cantcomplete' && statusType != 'notactive') {
      var inputDate = Date.UTC(document.getElementById('year').value, (document.getElementById('month').value-1), document.getElementById('day').value, 0, 0, 0 )/1000;
      if(inputDate - finishDate > 21600 ){
        return confirm(document.getElementById('alert_finish').value);
      }
    }
  }
  return true;
}

function dateSet(dayIndex, monthIndex, yearIndex ) {
  if(window.opener && !window.opener.closed) {
    window.opener.document.getElementById('day').selectedIndex = dayIndex;
    window.opener.document.getElementById('month').selectedIndex = monthIndex;
    window.opener.document.getElementById('year').selectedIndex = yearIndex;
  }
  return true;
}

function postToggle(ellipis, post2, image1, image2 ) {
  if(document.getElementById(post2).style.display == 'none') {
    document.getElementById(post2).style.display = 'inline';
    document.getElementById(ellipis).style.display = 'none';
    document.getElementById(image1).style.display = 'none';
    document.getElementById(image2).style.display = 'inline';
  }
  else {
    document.getElementById(post2).style.display = 'none';
    document.getElementById(ellipis).style.display = 'inline';
    document.getElementById(image1).style.display = 'inline';
    document.getElementById(image2).style.display = 'none';
  }
  return true;
}
