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

  Help files for 'ru' (Russian)

  Translation by Eugene N. Shilaev
  
  NOTE: This file is written in UTF-8 character set

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "ru" );

include_once(BASE."includes/screen.php" );

create_top("Справка", 1 );

$content = "
	<a name=\"admin\"></a>
	<p><b>email Администратора:</b></p>
	<p>Это адрес электронной почты администратора сайта, который следит за его работой денно и нощно.
	</p>
	<p>Этот адрес будет указываться в информационных письмах, которые система рассылает пользователям, для связи в случае возникновения затруднений.
	</p>
	<p>Этот адрес должен быть всегда. Если у Вас затруднения с его определением - поставьте свой!
	</p>
	<a name=\"reply\"></a>
	<p><b>Email 'reply to':</b></p>
	<p>'reply-to' заголовок для писем, отправляемых с сайта.
	</p>
	<p>Если сомневаетесь - впишите адрес email Администратора.
	</p>
	<a name=\"from\"></a>
	<p><b>Email 'from':</b></p>
	<p>'from' заголовок для писем, отправляемых с сайта.
	</p>
	<p>Если сомневаетесь - впишите адрес email Администратора.
	</p>
	<a name=\"list\"></a>
	<p><b>Mailing list:</b></p>
	<p>Когда сообщение будет послано группе пользователей, оно будет также отослано по адресам email, указанным здесь.  Эта функция позволяет держать ответственных лиц в курсе текущего состояния проектов/заданий.
	</p>
	<p>Для email-рассылки группе пользователей при создании или изменении проекта/задания необходимо проверять переключатель \"сообщить группе пользователей\" в разделе проекта или задания.</p>
	<p>Состояние переключателя может быть установлено по умолчанию ниже или проверяться каждый раз пользователем, делающим изменения.
	</p>
	<p>Имейте в виду, что пользователи могут изменять настройки по умолчанию по своему усмотрению.
	</p>
	<p>Setting a usergroup to private does not affect the mailing list.</p>
	";

  new_box( "Справка", $content );
  create_bottom();
?>
