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

  
  NOTE: This file is written in windows-1251 character set
    
*/

//get our location
require_once("path.php" );

include_once(BASE."includes/screen.php" );

$web_charset = "windows-1251";

create_top("Help", 1 );

$content = "
    <a name=\"admin\"></a>
    <p><b>���������������� �-����:</b></p>
    ���� � �-������ �� �������������� �� �����, ����� �� �������� � ����������� �� ���������.
    </p>
    <p>������������� ����� �� ���� ��������, ���������� �������� � ��������������� �������, �� ����� ���� �����, ���� ����� �� �������.
    </p>
    <p>���� ����� ������ ������ �� ���� ��������. ��� �� ���������, �������� ������� ������ �-���� ���.
    </p>

    <a name=\"reply\"></a>
    <b>�-���� 'reply to':</b></p>
    <p>'reply-to' header �� ���������� ���� �� ���� ��������.
    </p>
    <p>��� �� ���������, �������� ����������������� �-���� ���.
    </p>

    <a name=\"from\"></a>
    <p><b>�-���� 'from':</b></p>
    <p>'from' header �� ���������� ���� �� ���� ��������.
    </p>
    <p>��� �� ���������, �������� ����������������� �-���� ���.
    </p>

    <a name=\"list\"></a>
    <p><b>�������� ������:</b></p>
    <p>������ ��������� ���������� ����� ��� ������������� �����, �� ���� �� ����� ��������� � ��� �-������ ������� ���. ���� ������� � �� �� ����� �������� �� ������� ��������� �� ������� ������.
    </p>
    <p>�� �� ����� ������������ ����� �� ����� ��������� ��� ������������� �����, ������ �� ���� ������� ������� &quot;����� �� ��������������� ����� � ���������&quot; � �������� / ������� �� ������ / ������. ���� ���� �� ���� ��������� �� � �� ������������ �� ��������� ��-����, ��� ������������ ����� �� ������� �������.
    </p>
    <p>����������, �� ����������� ���� �� �� �� �������� � ���� ���������.
    </p>
    <p>������������ ������������� ����� ���� �����������, �� �� �������� ����� ��������� ������.
    </p>
    ";

  new_box("Help", $content);
  create_bottom();
?>