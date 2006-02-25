<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003 by Andrew Simpson
  
  This program is free software; you can redistribute it and/or modify it under the
  terms of the GNU General Public License as published by the Free Software Foundation;
  either version 2 of the License, or (at your option) any later version.

  This program is distributed in the hope that it will be useful, but WITHOUT ANY
  WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A
  PARTICULAR PURPOSE. See the GNU General Public License for more details.

  You should have received a copy of the GNU General Public License along with this
  program; if not, write to the Free Software Foundation, Inc., 675 Mass Ave,
  Cambridge, MA 02139, USA.


  Function:
  ---------
  
  Language files for 'zh-tw'(Traditional Chinese)
  
  Maintainer: Marcus Tsang <mathk2004 @ yahoo.com.hk>
              (please email me to discuss the wording in this language file)
  
*/


$taskgroup_info =   "<ul><li>如果你刪除工作組別，所有相關連的工作會被設置為\'未歸類\'</li>\n".
                      "<li>你可以更改工作組別的名稱而不會影響工作內容</li>\n".
                      "<li>兩個工作組別不可以有相同的名稱</li></ul>\n";

$usergroup_info =   "<ul><li>如果你刪除一個使用者組別，所有相關的私人討論區信息也會被刪除</li>\n".
                      "<li>私人使用者組別只可以被該私人使用者組別的成員看見</li>\n".
                      "<li>你可以更改使用者組別的名稱而不會影響內裏的使用者</li>\n".
                      "<li>兩個使用者組別不可以有相同的名稱</li></ul>\n";

$user_info      =    "請在左手面的選單選擇你的行動<br /><br />".
                      "一些快速提示:<br />".
                      "<ul>".
                      //**
                      "<li>私人使用者只可以被同一使用者組別的成員看見</li>\n".
                      "<li>刪除使用者有兩個程度，第二個是永久的</li>\n".
                      "<li>一個被刪除的使用者會失去他的所有工作但不會失去他的討論區信息</li>\n".
                      "<li>一個被永久刪除的使用者會失去所有</li>\n".
                      //"<li>A deleted user keeps the record of tasks that they have seen, and will continue with that list upon revival.</li>\n".
					  //一個被刪除的使用者所查閱的工作紀錄會被保存，直到他被 revival
					  "<li>一個被刪除的使用者所查閱的工作紀錄會被保存，直到他被復活</li>\n".
                      "<li>對使用者所進行的行動會被 email 至該使用者</li>\n".
                      "<li>在資料庫的密碼會被加密，你只可以設定新的</li>\n".
                      "<li>密碼只會於設定時被email 至使用者一次，所以請小心你email 了密碼至那裏!</li>\n".
                      "<li>使用者可以更改自己的資料--這樣可以節省你的時間(和垃圾)</li>\n".
                      "</ul>\n";

?>
