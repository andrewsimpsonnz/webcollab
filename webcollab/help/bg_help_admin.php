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

  
  NOTE: This file is written in ISO-8859-5 character set
    
*/

//get our location
require_once("path.php" );

include_once(BASE."includes/screen.php" );

create_top("Help", 1 );

$content = "
    <a name=\"admin\"><br /></a>
    <b>���������������� �-����:</b><br />
    ���� � �-������ �� �������������� �� �����, ����� �� �������� � ����������� �� ���������.
    <br /><br />
    ������������� ����� �� ���� ��������, ���������� �������� � ��������������� �������, �� ����� ���� �����, ���� ����� �� �������.
    <br /><br />
    ���� ����� ������ ������ �� ���� ��������. ��� �� ���������, �������� ������� ������ �-���� ���.
    <br /><br />

    <a name=\"reply\"><br /></a>
    <b>�-���� 'reply to':</b><br />
    'reply-to' header �� ���������� ���� �� ���� ��������.
    <br /><br />
    ��� �� ���������, �������� ����������������� �-���� ���.
    <br /><br />

    <a name=\"from\"><br /></a>
    <b>�-���� 'from':</b><br />
    'from' header �� ���������� ���� �� ���� ��������.
    <br /><br />
    ��� �� ���������, �������� ����������������� �-���� ���.
    <br /><br />

    <a name=\"list\"><br /></a>
    <b>�������� ������:</b><br />
    ������ ��������� ���������� ����� ��� ������������� �����, �� ���� �� ����� ��������� � ��� �-������ ������� ���. ���� ������� � �� �� ����� �������� �� ������� ��������� �� ������� ������.
    <br /><br />
    �� �� ����� ������������ ����� �� ����� ��������� ��� ������������� �����, ������ �� ���� ������� ������� &quot;����� �� ��������������� ����� � ���������&quot; � �������� / ������� �� ������ / ������. ���� ���� �� ���� ��������� �� � �� ������������ �� ��������� ��-����, ��� ������������ ����� �� ������� �������.
    <br /><br />
    ����������, �� ����������� ���� �� �� �� �������� � ���� ���������.
    <br /><br />
    ������������ ������������� ����� ���� �����������, �� �� �������� ����� ��������� ������.
    ";

  new_box("Help", $content);
  create_bottom();
?>