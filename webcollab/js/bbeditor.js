/*
 $Id: webcollab.js 2068 2009-01-31 08:14:29Z andrewsimpson $

/*****************************************
// Name: Javascript Textarea BBCode Markup Editor
// Version: 1.3
// Author: Balakrishnan
// Last Modified Date: 25/jan/2009
// License: Free
// URL: http://www.corpocrat.com
/******************************************

 Modified and changed for WebCollab by Andrew Simpson, 21 March 2010
*/

var textarea;
var content;

function edToolbar(obj) {
  document.write("<div>");
  document.write("<img class=\"button\" src=\"images/text_bold.png\" name=\"Bold\" onClick=\"doAddTags('[b]','[/b]','" + obj + "')\">");
  document.write("<img class=\"button\" src=\"images/text_italic.png\" name=\"Italic\" onClick=\"doAddTags('[i]','[/i]','" + obj + "')\">");
	document.write("<img class=\"button\" src=\"images/text_underline.png\" name=\"Underline\" onClick=\"doAddTags('[u]','[/u]','" + obj + "')\">");
	document.write("<img class=\"button\" src=\"images/link.png\" name=\"Link\" onClick=\"doURL('" + obj + "')\">");
	document.write("<img class=\"button\" src=\"images/images.png\" name=\"Picture\" onClick=\"doImage('" + obj + "')\">");
	document.write("<img class=\"button\" src=\"images/text_list_numbers.png\" name=\"List\" onClick=\"doList('[LIST=1]','[/LIST]','" + obj + "')\">");
	document.write("<img class=\"button\" src=\"images/text_list_bullets.png\" name=\"List\"  onClick=\"doList('[LIST]','[/LIST]','" + obj + "')\">");
	document.write("<img class=\"button\" src=\"images/comment.png\" name=\"Quote\"  onClick=\"doAddTags('[quote]','[/quote]','" + obj + "')\">"); 
  document.write("<img class=\"button\" src=\"images/page_white_code.png\" name=\"Code\"  onClick=\"doAddTags('[code]','[/code]','" + obj + "')\">");
  document.write("</div>");
}

function doImage(obj) {
  textarea = document.getElementById(obj);
  var url = prompt(document.getElementById('image_url').value,'http://');
  var scrollTop = textarea.scrollTop;
  var scrollLeft = textarea.scrollLeft;
  if (url !== '' && url !== null) {
    if (document.selection) {
      // Code for IE
      textarea.focus();
      var sel = document.selection.createRange();
      sel.text = '[img]' + url + '[/img]';
    }
    else {
      var len = textarea.value.length;
      var start = textarea.selectionStart;
      var end = textarea.selectionEnd;
      var sel = textarea.value.substring(start, end);
      var rep = '[img]' + url + '[/img]';
      textarea.value =  textarea.value.substring(0, start) + rep + textarea.value.substring(end, len);
      textarea.scrollTop = scrollTop;
      textarea.scrollLeft = scrollLeft;
    }
  }
}

function doURL(obj) {
  textarea = document.getElementById(obj);
  var url = prompt(document.getElementById('url').value, 'http://');
  var scrollTop = textarea.scrollTop;
  var scrollLeft = textarea.scrollLeft;
  if (url !== '' && url !== null) {
    if (document.selection) {
      // Code for IE
      textarea.focus();
      var sel = document.selection.createRange();

      if(sel.text == "") {
        sel.text = '[url]'  + url + '[/url]';
      }
      else {
      sel.text = '[url=' + url + ']' + sel.text + '[/url]';
      }
    }
    else {
      // Code for Mozilla Firefox
      var len = textarea.value.length;
      var start = textarea.selectionStart;
      var end = textarea.selectionEnd;
      var sel = textarea.value.substring(start, end);
      if(sel == ""){
        var rep = '[url]' + url + '[/url]';
      }
      else {
        var rep = '[url=' + url + ']' + sel + '[/url]';
      }
      textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end, len);
      textarea.scrollTop = scrollTop;
      textarea.scrollLeft = scrollLeft;
    }
  }
}

function doAddTags(tag1, tag2, obj) {
  textarea = document.getElementById(obj);
  if (document.selection) {
    // Code for IE
    textarea.focus();
    var sel = document.selection.createRange();
    sel.text = tag1 + sel.text + tag2;
  }
  else {
    // Code for Mozilla Firefox
		var len = textarea.value.length;
	  var start = textarea.selectionStart;
	  var end = textarea.selectionEnd;
    var scrollTop = textarea.scrollTop;
		var scrollLeft = textarea.scrollLeft;
    var sel = textarea.value.substring(start, end);
		var rep = tag1 + sel + tag2;
    textarea.value =  textarea.value.substring(0, start) + rep + textarea.value.substring(end, len);
		textarea.scrollTop = scrollTop;
		textarea.scrollLeft = scrollLeft;
	}
}

function doList(tag1, tag2, obj){
  textarea = document.getElementById(obj);
  if (document.selection) {
    // Code for IE
    textarea.focus();
    var sel = document.selection.createRange();
    var list = sel.text.split('\n');
    var i;

    for(i=0; i<list.length; i++) {
      list[i] = '[*]' + list[i];
    }
    sel.text = tag1 + '\n' + list.join("\n") + '\n' + tag2;
	}
  else {
    // Code for Firefox
    var len = textarea.value.length;
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var i;
    var scrollTop = textarea.scrollTop;
    var scrollLeft = textarea.scrollLeft;
    var sel = textarea.value.substring(start, end);
    var list = sel.split('\n');

    for(i=0; i<list.length; i++) {
		  list[i] = '[*]' + list[i];
		}
		var rep = tag1 + '\n' + list.join("\n") + '\n' + tag2;
		textarea.value =  textarea.value.substring(0,start) + rep + textarea.value.substring(end, len);
		textarea.scrollTop = scrollTop;
		textarea.scrollLeft = scrollLeft;
  }
}