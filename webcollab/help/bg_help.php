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

  Help page for 'bg' (Bulgarian)
    
  Maintainer: Stoyan Dimitrov <stoyan at adiumdesign dot com>

  
  NOTE: This file is written in Windows-1251 character set
    


*/

//get our location
require_once("path.php" );

include_once(BASE . "includes/screen.php" );

$web_charset = "windows-1251";

create_top("�����", 1 );

$content = "
<a name=\"usergroup\"></a>
<p><b>������������� �����:</b></p>
<p>�������� ������� ��� ������ ���� ����� �� �����������, �������� ������ � ���� ���������� ������. ���� � �����
�����������, ����� ������� ������� ������ �� ������. ������������ ����� �� ����������� ����� �� ����� ��������� ���
�������, ��-����� �� ������������ ����������.</p>
<p>������������� ����� ���� ���� �� ����� ���������� �� ������� �� ������. ��� ���� �� ���� ��������� �� ����� ���������� 
������������� �����, � ���� ������ ������� ����������� ���� �� ������ ������������ ������ / ������, ��� ����� �������� 
�� �� ��������. ������������� �� �������� ���� �� ���� ��������� ��� ���� �� ������ ��� ������ ���� ���������� �� ������ 
&quot;����� �� ������&quot;.
</p>
<p>������ � ��������, ��������������� ����� ��������� �������� ����������� ����� �� ����� ������ ��� ������.
</p>
<a name=\"taskgroup\"></a>
<p><b>����� ������:</b></p>
<p>��������� ����� ����� ������ � ������������� ����� �� �� �������� �� ����������� �����������. ����� ��������� � ��������, ������������� ����� ���������� ������ �� ������ � ����� �� ������������, � ������� ������ �� ������ �� ��-����� �������� �� ������� ������.
</p>
<p>������ ���� ������ �����, ������ � ����������� ��, �������� �� ���� �� � ����� � �� �����. � ����������� �� ������ � ����� �������� �� ���� ����������� �������� � ��������� � ���� ��-����� �� ������. ������, ����� ����� �����, �� ����� ��������� ���� <i>[��� �����]</i>
</p>
<p>�� ������: ��� ����� �� �������� � ������ �� � � ����� �� ������, �������� �� �������� �� ���� �����. ��� ���� ���� ������ � � �����, ������ ������ �� ����� ��������� �� �����.
</p>
<a name=\"globalaccess\"></a>
<p><b>����� �� ������:</b></p>
<p>���� ������� ��������� ������������� �� ������ / ������ �� ���� ���������� ���� �� ��������� �� ������� ������������� �����. ������ ��� �������, ������ ����������� ����� �� ���������� �������� / ������. �������, ������ ���� ���� ������� �� ������� ������������� ����� ����� �� �� ����������.
</p>
<p>�� ������: ����������, ����� �� � � ��������� ����� �� ���� �������� �� ����� �������� � ������� �� �������, �� ���� �� ���� �������� �� �� ����.
</p>
<p>�� �������: ����������, ����� �� � � ��������� ����� ���� �� ���� �������� �� ����� ���� �������, ���� ���������� � ���� ������.
</p>
<p>��� ���� ������� �����, ���� ������� ���� ��������.
</p>
<a name=\"groupaccess\"></a>
<p><b>����� � ������� ���� �� �������:</b></p>
���� ������� ��������� �� ������ ������� �� ������������� ����� �� ���������� ������ / ������. ������ ��� �������, ������ ������� �� ������ ����� ����� �� ���������� ���� �������. ��� ���� �������, ���� ������������ ���� �� ��������� ���� ������ / ������.
</p>
<p>��� ���� ������� �����, ���� ������� ���� ��������.
</p>
<a name=\"summarypage\"></a>
<p><b>����������:</b></p>
<p>���������� �� ������������ ������� ���� ������, ����� ������ �������� ����������� �� ����� ������ / ������.
</p>
<ul>
<li><b>�������</b>:
������� ����� � ������ �� ����������� ������ / ������:
<ul>
<li><b>C</b>:<br />
�������, �� � �������</li>
<li><b>M</b>:<br />
�������, �� � ���������</li>
<li><b>P</b>:<br />
�������, �� � ������ ������ ��� ������ �� ���� ������ / ������</li>
<li><b>F</b>:<br />
�������, �� � ����� ���� ��� ��������</li>
</ul>
��� ��� ����, ������ �� �������� ����� ���� �� �� ������ ���������� ������ / ������.</li>
<li><b>����� ����</b>:<br />
������� ���� �������� / ������� �� ������ �� ���� ���������. ��� ������ � � <span class=\"red\">������ ����</span>, ������ �������� / �������� � ����������. ��� ������ � � <span class=\"green\">�����</span>, ������ �������� �� �������� �� � ������ �� ����.</li>
<li><b>������</b>:<br />
������� ��������� ������ �� ��������
<ul>
<li><b>��������</b>:<br />
�������, �� �������� / ������� ����� � ���� ���������, �� (��������) �� � ���������</li>
<li><b>���</b>:<br />
�������, �� �������� / �������� ����� � ���� ��������� � ������ ������� �� �� �������</li>
<li><b><span class=\"blue\">� ������</span>:</b><br />
�������, �� �������� �� �������� / �������� � ������, ��������� ������� ������ �������</li>
<li><b><span class=\"orange\">�������</span>:</b><br />
�������. �� �� �������� / �������� �� ������</li>
<li><span class=\"green\">�����</span>:<br />
�������, �� �������� � ����������</li>
</ul>
</li>
<li><b>����������</b>:<br />
�������, �� ���� � ������������� ���� ������ / ������. ������ �� �������� ����� ����� �� �� ������ �������� ���������� �� ������.</li>
<li><b>�����</b>:<br />
������� ��������������� ��� ������� ������ �������� � ���� ������ / ������. ���������� ����� ���������� ������ �� ���� ������, ���������� ����� ��� ���� �����.</li>
<li><b>������</b>:<br />
������� ��� �� ��������. ������ �� �������� ����� ����� �� �� ������ ������ ����������.</li>
</ul>
";
  new_box("Help", $content );
  create_bottom();
?>
