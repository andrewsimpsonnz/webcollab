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

  Language files (long messages) for 'bg' (Bulgarian)

  Translation: Stoyan Dimitrov <stoyan at adiumdesign dot com> (5 June 2004)
  Translation: Svetlozar Ivanov <svetlozarin at gmail dot com> (5 July 2014)

  
  NOTE: This file is written in UTF-8 character set

*/


$taskgroup_info     =   "<ul>\n".
                            "<li>Ако изтриете група задачи, всички задачи принадлежащи към тази група ще бъдат прехвърлени като <i>[без група]</i>.</li>\n".
                            "<li>Можете да преименувате групата задачи без това да се отрази на задачите в нея.</li>\n".
                            "<li>Не може да име две групи задачи с еднакви имена.</li>\n".
                        "</ul>\n";

$usergroup_info     =   "<ul>\n".
                            "<li>Ако изтриете всички потребителски групи, съобщенията им в поверителните форуми също ще бъдат изтрити.</li>\n".
                            "<li>Поверителните групи могат да бъдат виждани от членовете на тези групи.</li>\n".
                            "<li>Можете да преименувате потребителската група без това да се отрази на нейните членове.</li>\n".
                            "<li>Не може да име две потребителски групи с еднакви имена.</li>\n".
                        "</ul>\n";

$user_info          =    "Изберете действие от менюто вляво.<br /><br />".
                      "Подсказки:<br />".
                          "<ul>".
                              //**
                              "<li>Поверителни потребители могат да бъдат виждани само от членове на същата потребителска група.</li>\n".
                              "<li>Потребителите имат два етапа на изтриване, вторият е окончателен.</li>\n".
                              "<li>Изтритият потребител губи задачите си, но не и съобщенията си във форумите.</li>\n".
                              "<li>Окончателно изтритият потребител губи всичко.</li>\n".
                              "<li>За изтрит потребител се пази списък на видяните от него задачи и този списък ще бъде възобновен при възстановянето на потребителя.</li>\n".
                              "<li><b>Всички</b> действия по промяна на потребител се изпращат на електронната му поща.</li>\n".
                              "<li>Паролите са записани кодирани в базата от данни. Могат само да бъдат сменяни.</li>\n".
                              "<li>Паролите се изпращат само веднъж по e-mail, когато се създава потребител, затова внимавайте къде какво изпращате!</li>\n".
                              "<li>Потребителите могат да променят данните си без участието на администратора.</li>\n".
                          "</ul>\n";

?>