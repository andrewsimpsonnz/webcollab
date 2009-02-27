/*
  $Id: webcollab.js 2068 2009-01-31 08:14:29Z andrewsimpson $
  (c) 2009 Andrew Simpson <andrew.simpson at paradise.net.nz>
  ---------
  Javascript function library for WebCollab
*/

function placeCursor(cursor){
  document.getElementById(cursor).focus();
}

function fieldCheck(check){
  var field = document.getElementById(check).value;
  if(field.length === 0){
    alert(text.AlertField);
    document.getElementById(check).focus();
    return false;
  }
  return true;
}

function dateCheck(check) {
  if(!fieldCheck(check)){
    return false;
  }
  var daysMonth = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31 ];
  if(document.getElementById('year').value % 4 === 0 ){
    daysMonth[1] = 29;}
  if(document.getElementById('day').value > daysMonth[(document.getElementById('month').value-1)] ){
    alert(text.InvalidDate);
    return false;
  }
  var finishDate = document.getElementById('projectDate').value;
  var statusType = document.getElementById('projectStatus').value;
  if(finishDate > 0 && (statusType != 'cantcomplete' && statusType != 'notactive')){
    var inputDate = Date.UTC(document.getElementById('year').value, (document.getElementById('month').value-1), document.getElementById('day').value, 0, 0, 0 )/1000;
    if(inputDate - finishDate > 21600 ){
      return confirm(text.FinishDate);
    }
  }
}

function dateSet(dayIndex, monthIndex, yearIndex) {
  if(window.opener && !window.opener.closed) {
    window.opener.document.getElementById('day').selectedIndex=dayIndex;
    window.opener.document.getElementById('month').selectedIndex=monthIndex;
    window.opener.document.getElementById('year').selectedIndex=yearIndex;}
}

function postToggle(ellipis, post2, image1, image2 ) {
  if(document.getElementById(post2).style.display == "none") {
    document.getElementById(post2).style.display = "inline";
    document.getElementById(ellipis).style.display = "none";
    document.getElementById(image1).style.display = "none";
    document.getElementById(image2).style.display = "inline";
  }
  else {
    document.getElementById(post2).style.display = "none";
    document.getElementById(ellipis).style.display = "inline";
    document.getElementById(image1).style.display = "inline";
    document.getElementById(image2).style.display = "none";
  }
  return true;
}
