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

  Email text language files for 'gr' (Greek)

  Translation: Nico(designext.gr)

  Maintainer:Nico <designext at users.sourceforge.net>

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
//format is 2004 Apr 01 09:18 +1200
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

$title_file_post        = ABBR_MANAGER_NAME.": ��� ������ ���������: %s";
$email_file_post        = "Hola,\n\nEl sitio ".MANAGER_NAME." ��� ��� ������ ��������� ���  ".$email_date." por %1\$s.\n\n".
                          "������:        %2\$s\n".
                          "���������: %3\$s\n\n".
                          "Project:       %4\$s\n".
                          "�������:       %5\$s\n\n".
                          "������������ ��� ������ ��� ������������ �����������.\n\n".BASE_URL."%6\$s\n";


$title_forum_post        = ABBR_MANAGER_NAME.": ��� �������� ��� forum: %s";
$email_forum_post        = "���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� �������  ��� ��� ���������� ��� forum".$email_date." ��� %1\$s:\n\n".
                           "----\n\n".
                           "%2\$s\n\n".
                           "----\n\n".
                          "������������ ��� ������ ��� ������������ �����������.\n\n".BASE_URL."%3\$s\n";

$email_forum_reply       = "���� ���,\n\n� ������  ".MANAGER_NAME." ��� ���������� ��� ������� ��� ��� ������ ��� forum".$email_date." ��� %1\$s.\n\n".
                           "���� �� ������ ����� ��� �������� ��� %2\$s.\n\n".
                           "������ ������:\n %3\$s\n\n".
                           "----\n\n".
                           "��� ��������:\n%4\$s\n\n".
                           "----\n\n".
                           "������������ ��� ������ ��� ������������ �����������.\n\n".BASE_URL."%5\$s\n";

$email_list = "Project: %1\$s\n".
              "�������:    %2\$s\n".
              "������:   %3\$s\n".
              "���������:  %4\$s ( %5\$s )\n".
              "�������:\n%6\$s\n\n".
              "������������ ��� ������ ��� ������������ �����������.\n\n".BASE_URL."%7\$s\n";


$title_takeover_project   = ABBR_MANAGER_NAME.": �� ������� ��� �������������������";
$title_takeover_task      = ABBR_MANAGER_NAME.": �� ������� ��� �������������������";
$email_takeover_project   = "���� ���,\n\n� ������ ".MANAGER_NAME." ��� ������������ ��� ��� project ��� ����� �������� ��� ���� ������������������ ��� ��� �����������".$email_date.".\n\n";
$email_takeover_task      = "���� ���,\n\n� ������ ".MANAGER_NAME."  ��� ������������ ��� ��� ������� ��� ����� �������� ��� ���� ������������������ ��� ��� �����������".$email_date.".\n\n";

$title_new_owner_project  = ABBR_MANAGER_NAME.": ��� project ��� ����";
$title_new_owner_task     = ABBR_MANAGER_NAME.": ��� ������� ��� ����";
$email_new_owner_project  = "���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� ��� ���� ��� project (���� �� ������ �������� ���) ���� ��������������".$email_date.".\n\n��� ����� �� �����������:\n\n";
$email_new_owner_task     = "���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� ��� ������� ���� ��� (���� �� ������ �������� ���) ���� �������������� ".$email_date.".\n\n��� ����� �� �����������:\n\n";


$title_new_group_project  = ABBR_MANAGER_NAME.": ��� project: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": ��� �������: %s";
$email_new_group_project  = "���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� ��� ��� project ������������� ��� ".$email_date."\n\n��� ����� �� �����������:\n\n";
$email_new_group_task     = "���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� ��� ��� ������� ������������� ��� ".$email_date."\n\n��� ����� �� �����������:\n\n";

$title_edit_owner_project = ABBR_MANAGER_NAME.": �� project ��� �����������";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": � ������� ��� �����������";
$email_edit_owner_project ="���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� ������ ��� ������ �� ��� project ��� ".$email_date.".\n\n��� ����� �� �����������:\n\n";
$email_edit_owner_task    ="���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� ������ ��� ������ �� ��� ������� ��� ".$email_date.".\n\n��� ����� �� �����������:\n\n";

$title_edit_group_project = ABBR_MANAGER_NAME.": Project �����������";
$title_edit_group_task    = ABBR_MANAGER_NAME.": ������� �����������";
$email_edit_group_project = "���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� project �������� ��� %s ���� ������� ��� ".$email_date.".\n\n��� ����� �� �����������:\n\n";
$email_edit_group_task    = "���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� ��� ������� ��'������ ��� %s ���� ������� ��� ".$email_date.".\n\n��� ����� �� �����������:\n\n";

$title_delete_project     = ABBR_MANAGER_NAME.": Project ����������";
$title_delete_task        = ABBR_MANAGER_NAME.": ������� ����������";
$email_delete_project     = "���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� �� project ��� ���������� ��� ".$email_date."\n\n".
                            "��� ������������ ����.\n\n";
$email_delete_task        = "���� ���,\n\n� ������ ".MANAGER_NAME." ��� ���������� ��� ��� ������� ��� ���������� ��� ".$email_date."\n\n".
                            "��� ������������ ����..\n\n";

$delete_list =  "Project: %1\$s\n".
                "�������:    %2\$s\n".
                "������:   %3\$s\n\n".
                "�������:\n%4\$s\n\n";

$title_welcome      = "����������� ��� ".ABBR_MANAGER_NAME;
$email_welcome      = "���� ���,\n\n����������� ���: ".MANAGER_NAME." ���  ".$email_date.".\n\n".
			"����� ����� ��������� ����������� ��� ���� ����������� �������.\n\n".
			"���� ��� �,�������� ��� ������������ ��� ���� � �������� ����� ��� �������� ������������ project, � ������ ������ ��� ������� �� project ��� ��� �������. ".
			"�� ��������� ������ ��� �� project ��� �� ��� ����������� �� ����������� ��������..\n\n".
			"���� ������� � ������� ��� ����� �������� � ������������� �� ����������� �� ����� ���� ��������������� ������� ��� '���������' � '�����������'. ���� ��������� ��� ���������� ��� ".
			"��������������� ��� �� �������� �� ��������� ������ ���� ���������� �������.\n\n".
			"����� ������ �������� �� ��������� ������� �������� ��� �� ����� �� ���������� �� ��� ��������. ������ �� ������������ ��� ��� ��������� ��� �� �������� ��� forum. ".
			"�� ��� ������ ��� �������� ����������� �� ����������� �� ������� ��� �������� ��� �� ������ ��� ����� ���������� �� ������ ����� ���� ���� �� �������������� �� ������� �� ����������� �� ������ ��� ����� ��������� �� project. ".
			"\n\n����������� ��� � ����� ����� ��� ��������� �� �������� ��� �� �������� ��� ��� ������� ���. �������� �� �������������� ��� ".EMAIL_ADMIN." �� ��������� ��� ����� ������ ������.\n\n --���� ����������!\n\n".
			"\n\n�������� ��� ����������� �� �������� �� �� ����� ��������� ��� �������\n\n".
			"Login:      %1\$s\n".
			"Password:   %2\$s\n\n".
			"�������� ������ ������� ��� �������: %3\$s".
			"�����:     %4\$s\n".
			"������:    ".BASE_URL."\n\n".
			"%5\$s";

$title_user_change1 = ABBR_MANAGER_NAME.": ������ ��� ��������� ��� ��� ��� �����������";
$email_user_change1 = "���� ���,\n\n ".MANAGER_NAME." ��� ���������� ��� �� �������� ��� ����� ������� ".$email_date." ��� %1\$s ( %2\$s ) \n\n".
			"Login:      %3\$s\n".
			"Password:   %4\$s\n\n".
			"�������� ������ ������� ��� �������: %5\$s".
			"�����:     %6\$s\n\n".
			"%7\$s";

$title_user_change2 = ABBR_MANAGER_NAME.": ������ ��� ����������� ���";
$email_user_change2 = "���� ���,\n\n ".MANAGER_NAME." ��� ������������ ��� ����� ������� �� �������� ��� ����������� ��� �� �������� ".$email_date."\n\n".
			"Login:    %1\$s\n".
			"Password: %2\$s\n\n".
			"�����:   %3\$s\n";

$title_user_change3 = ABBR_MANAGER_NAME.": ������ ��� ����������� ���";
$email_user_change3 = "���� ���,\n\n ".MANAGER_NAME." ��� ������������ ��� ����� ������� �� �������� �� ���������� ��� ��� ".$email_date."\n\n".
			"Login:    %1\$s\n".
			"� ������� ��� ��� ���� �������.\n\n".
			"�����:   %2\$s\n";


$title_revive       = ABBR_MANAGER_NAME.": ����������� �� ���������������";
$email_revive       = "���� ���,\n\n ".MANAGER_NAME." ��� ���������� ��� � ����������� ��� ������ �� ��������������� ���  ".$email_date.".\n\n".
			"Loginname: %1\$s\n".
			"Username:  %2\$s\n\n".
			"��� �������� �� ��� ��������� ��� ������ ��� ����� ����� ���������������. \n\n".
			"��� ����� ������� ��� ������ ��� ������� ��� email ".EMAIL_ADMIN." ����������� �� ��������� ��������� ������.";



$title_delete_user  = ABBR_MANAGER_NAME.": ����������� �����������������.";
$email_delete_user  = "���� ���,\n\n ".MANAGER_NAME." ��� ���������� ��� � ����������� ��� ���������������� ��� ".$email_date.".\n\n".
			"������������ ��� �� ����������!\n\n".
			"�� ��������� ��� � ������� ���� ���������� ������� ��� email ��� ".EMAIL_ADMIN.".";

?>