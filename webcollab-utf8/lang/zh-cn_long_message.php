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

  Language files for 'zh-cn'(Simplified Chinese)
  
  Maintainer: Marcus Tsang <mathk2004 @ yahoo.com.hk>

*/


$taskgroup_info =   "<ul><li>如果你删除工作组别，所有相关连的工作会被设置为\'未归类\'</li>\n".
                      "<li>你可以更改工作组别的名称而不会影响工作内容</li>\n".
                      "<li>两个工作组别不可以有相同的名称</li></ul>\n";

$usergroup_info =   "<ul><li>如果你删除一个使用者组别，所有相关的私人讨论区信息也会被删除</li>\n".
                      "<li>私人使用者组别只可以被该私人使用者组别的成员看见</li>\n".
                      "<li>你可以更改使用者组别的名称而不会影响内里的使用者</li>\n".
                      "<li>两个使用者组别不可以有相同的名称</li></ul>\n";

$user_info      =    "请在左手面的选单选择你的行动<br /><br />".
                      "一些快速提示:<br />".
                      "<ul>".
                      "<li>私人使用者只可以被同一使用者组别的成员看见</li>\n".
                      "<li>删除使用者有两个程度，第二个是永久的</li>\n".
                      "<li>一个被删除的使用者会失去他的所有工作但不会失去他的讨论区信息</li>\n".
                      "<li>一个被永久删除的使用者会失去所有</li>\n".
                      //"<li>A deleted user keeps the record of tasks that they have seen, and will continue with that list upon revival.</li>\n".
					  //一个被删除的使用者所查阅的工作纪录会被保存，直到他被 revival
					  "<li>一个被删除的使用者所查阅的工作纪录会被保存，直到他被 revival</li>\n".
                      "<li>对使用者所进行的行动会被 email 至该使用者</li>\n".
                      "<li>在资料库的密码会被加密，你只可以设定新的</li>\n".
                      "<li>密码只会于设定时被email 至使用者一次，所以请小心你email 了密码至那里!</li>\n".
                      "<li>使用者可以更改自己的资料--这样可以节省你的时间(和垃圾)</li>\n".
                      "</ul>\n";

?>
