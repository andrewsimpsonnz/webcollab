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
  
  NOTE: This file is written in koi8-r character set

*/

//get our location
require_once("path.php" );

include_once(BASE."includes/screen.php" );

create_top("�������", 1 );

$content = "
	<a name=\"admin\"></a>
	<p><b>email ��������������:</b></p>
	<p>��� ����� ����������� ����� �������������� �����, ������� ������ �� ��� ������� ����� � �����.
	</p>
	<p>���� ����� ����� ����������� � �������������� �������, ������� ������� ��������� �������������, ��� ����� � ������ ������������� �����������.
	</p>
	<p>���� ����� ������ ���� ������. ���� � ��� ����������� � ��� ������������ - ��������� ����!
	</p>
	<a name=\"reply\"></a>
	<p><b>Email 'reply to':</b></p>
	<p>'reply-to' ��������� ��� �����, ������������ � �����.
	</p>
	<p>���� ������������ - ������� ����� email ��������������.
	</p>
	<a name=\"from\"></a>
	<p><b>Email 'from':</b></p>
	<p>'from' ��������� ��� �����, ������������ � �����.
	</p>
	<p>���� ������������ - ������� ����� email ��������������.
	</p>
	<a name=\"list\"></a>
	<p><b>Mailing list:</b></p>
	<p>����� ��������� ����� ������� ������ �������������, ��� ����� ����� �������� �� ������� email, ��������� �����.  ��� ������� ��������� ������� ������������� ��� � ����� �������� ��������� ��������/�������.
	</p>
	<p>��� email-�������� ������ ������������� ��� �������� ��� ��������� �������/������� ���������� ��������� ������������� \"�������� ������ �������������\" � ������� ������� ��� �������.</p>
	<p>��������� ������������� ����� ���� ����������� �� ��������� ���� ��� ����������� ������ ��� �������������, �������� ���������.
	</p>
	<p>������ � ����, ��� ������������ ����� �������� ��������� �� ��������� �� ������ ����������.
	</p>
	<p>Setting a usergroup to private does not affect the mailing list.</p>
	";

  new_box( "�������", $content );
  create_bottom();
?>
