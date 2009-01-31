<?php
/*
  $Id$

  WebCollab
  ---------------------------------------

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

  Help files for 'bg' (Bulgarian)

  Maintainer: Stoyan Dimitrov <stoyan at adiumdesign dot com>

  NOTE: This file is written in UTF-8 character set

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "bg" );

include_once(BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
    <a name=\"admin\"></a>
    <p><b>Администраторска е-Поща:</b></p>
    Това е е-Пощата на администратора на сайта, който се занимава с ежедневната му поддръжка.
    </p>
    <p>Автоматичните писма от тази страница, обикновено свързани с потребителските акаунти, ще сочат този адрес, като адрес за контакт.
    </p>
    <p>Този адрес винаги трябва да бъде въвеждан. Ако се колебаете, въведете адресът своята е-Поща тук.
    </p>

    <a name=\"reply\"></a>
    <b>е-Поща 'reply to':</b></p>
    <p>'reply-to' header за електронна поща от тази страница.
    </p>
    <p>Ако се колебаете, въведете администраторката е-Поща тук.
    </p>

    <a name=\"from\"></a>
    <p><b>е-Поща 'from':</b></p>
    <p>'from' header за електронна поща от тази страница.
    </p>
    <p>Ако се колебаете, въведете администраторката е-Поща тук.
    </p>

    <a name=\"list\"></a>
    <p><b>Пощенски списък:</b></p>
    <p>Когато изпращате електронни писма към потребителски групи, те също ще бъдат изпращани и към е-Пощите описани тук. Тази функция е за да държи мениджър на проекта осведомен за текущия статус.
    </p>
    <p>За да могат електронните писма да бъдат изпращани към потребителски групи, трябва да бъде избрана опцията &quot;Писмо до потребителската група с промените&quot; в добавяне / промяна на проект / задача. Това може да бъде направено да е по подразбиране от отметката по-долу, или потребителят ръчно да направи отметка.
    </p>
    <p>Забележете, че потребителя може да не се съобрази с тази настройка.
    </p>
    <p>Настройвайки потребителска група като поверителна, не се отразява върху пощенския списък.
    </p>
    ";

  new_box("Help", $content);
  create_bottom();
?>