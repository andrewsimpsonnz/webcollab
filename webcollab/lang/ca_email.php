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

  Email text language files for 'ca' (Catalan)

  Translation: Daniel Hernandez (dhernan2 at pie.xtec.es)

  Maintainer:

*/

// Get current date/time for emails in a preferred format
$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y g:i a ' );

//-----
$title_file_post        = ABBR_MANAGER_NAME.": New file upload: %s";

$email_file_post        = "Hello,\n\n".
                          "This is the ".MANAGER_NAME." site informing you that a new file has been uploaded on ".$email_date." by %1\$s.\n\n".
                          "File:        %2\$s\n".
                          "Description: %3\$s";

//-----
$title_forum_post        = ABBR_MANAGER_NAME.": New forum post: %s";

$email_forum_post        = "Hello,\n\n".
                           "This is the ".MANAGER_NAME." site informing you that a new forum post has been made on ".$email_date." by %1\$s:\n\n".
                           "----\n\n".                           
                           "%2\$s\n\n".
                           "----\n\n".                           
                           "Dirigir-se al lloc web per a mes detalls.\n\n".
                           BASE_URL."\n";
                            
$email_forum_reply       = "Hello,\n\n".
                           "This is the ".MANAGER_NAME." site informing you that a new forum post has been made on ".$email_date." by %1\$s.\n\n".
                           "This post is in reply to an earlier post by %2\$s.\n\n".
                           "Original post:\n %3\$s\n\n".
                           "----\n\n".                           
                           "New reply:\n%4\$s\n\n".
                           "----\n\n".
                           "Dirigir-se al lloc web per a mes detalls.\n\n".
                           BASE_URL."\n";

//-----                           
$email_list              = "Projecte: %1\$s\n".
                           "Tasca:    %2\$s\n".
                           "Estat:    %3\$s\n".
                           "A c�rreg:  %4\$s ( %5\$s )\n".
                           "Text:\n%6\$s\n\n".
                           "Dirigir-se al lloc web per a mes detalls.\n\n".
                           BASE_URL."\n";

//-----
$title_takeover_project   = ABBR_MANAGER_NAME.": El seu item ha estat reassignat";
$title_takeover_task      = ABBR_MANAGER_NAME.": El seu item ha estat reassignat";

$email_takeover_project   = "Hola,\n\n".
                            "Aquest �e ".MANAGER_NAME." lloc informant-li que un projecte al seu c�rreg ha estat reassignada per l'administrador el ".$email_date.".\n\n";

$email_takeover_task      = "Hola,\n\n".
                            "Aquest �e ".MANAGER_NAME." lloc informant-li que un tasca al seu c�rreg ha estat reassignada per l'administrador el ".$email_date.".\n\n";

//-----                                                        
$title_new_owner_project  = ABBR_MANAGER_NAME.": Nou projecte per a vost�";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nou tasca per a vost�";

$email_new_owner_project  = "Hola,\n\n".
                            "Aquest es el ".MANAGER_NAME." lloc informant-li que un projecte seu (ara al seu c�rreg) va ser canviat el ".$email_date.".\n\n".
                            "Aqu� els detalls:\n\n";
                            
$email_new_owner_task     = "Hola,\n\n".
                            "Aquest es el ".MANAGER_NAME." lloc informant-li que un tasca seu (ara al seu c�rreg) va ser canviat el ".$email_date.".\n\n".
                            "Aqu� els detalls:\n\n";

//-----
$title_new_group_project  = ABBR_MANAGER_NAME.": Nou projecte: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nou tasca: %s";

$email_new_group_project  = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc informant-li que un nou projecte ha estat creat el ".$email_date."\n\n".
                            "Aqu� els detalls:\n\n";

$email_new_group_task     = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc informant-li que un nou tasca ha estat creat el ".$email_date."\n\n".
                            "Aqu� els detalls:\n\n";

//-----
$title_edit_owner_project = ABBR_MANAGER_NAME.": La seva projecte actualitzada";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": La seva tasca actualitzada";

$email_edit_owner_project = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc informant-li que un projecte al seu c�rreg va canviar el ".$email_date.".\n\n".
                            "Aqu� els detalls:\n\n";

$email_edit_owner_task    = "Hola,\n\n".
                             "Aquest �s el ".MANAGER_NAME." lloc informant-li que un tasca al seu c�rreg va canviar el ".$email_date.".\n\n".
                             "Aqu� els detalls:\n\n";

//-----
$title_edit_group_project = ABBR_MANAGER_NAME.": Projecte actualitzada";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Tasca actualitzada";

$email_edit_group_project = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc informant-li que un projecte a c�rreg de %s ha canviat el ".$email_date.".\n\n".
                            "Aqu� els detalls:\n\n";

$email_edit_group_task    = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc informant-li que un tasca a c�rreg de %s ha canviat el ".$email_date.".\n\n".
                            "Aqu� els detalls:\n\n";

//-----
$title_delete_project     = ABBR_MANAGER_NAME.": Projecte eliminada";
$title_delete_task        = ABBR_MANAGER_NAME.": Tasca eliminada";

$email_delete_project     = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc informant-li que un projecte al seu c�rreg ha estat eliminat el ".$email_date."\n\n".
                            "Gr�cies per dirigir la projecte al seu moment.\n\n";

$email_delete_task        = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc informant-li que un tasca al seu c�rreg ha estat eliminat el ".$email_date."\n\n".
                            "Gr�cies per dirigir la tasca al seu moment.\n\n";

$delete_list              = "Projecte: %1\$s\n".
                            "Tasca:    %2\$s\n".
                            "Estat:   %s3\$\n\n".
                            "Text:\n%s4\$\n\n";


//-----                
$title_welcome            = "Benvinguda a ".ABBR_MANAGER_NAME;

$email_welcome            = "Hola,\n\nAquest �s el lloc ".MANAGER_NAME." donant-li la benvinguda ;) el  ".$email_date.".\n\n".
                            "Com que vost� �s nou aqui li explicar� un parell de cosetes per a que r�pidament pugui comen�ar a treballar\n\n".
                            "Abans de res, est� l'eina de manegament de projectes, la pantalla principal li mostrar� els projectes actualment disponibles.. ".
                            "Si fa click a un dels nom, es trobar� en la zona de tasques. Aqu� �s on la feina comen�a..\n\n".
                            "Cada �tem que vost� envia o tasca que editar ser� mostrada als altres usuaris com 'nova' o 'actualitzada'. Aix� tamb� funciona a la inversa i ".
                            "el permet r�pidamentlo enfocar on est� l'activitat.\n\n".
                            "Vost� pot tamb� fer-se c�rreg o prendre propietat de tasques i es trobar� habilitat per editar i tots els enviaments al f�rum seran rebuts. ".
                            "A mesura que avan? en la seva feina, per favor editi el text de les seves tasques i l'estat de tal forma que tothom pugui mantenir un seguiment del seu progr�s. ".
                            "\n\nNo em resta m�s que desijar-li �xits i informar-li que pot enviar un correu a %s si es troba amb alguna dificultat.\n\n --Bona sort !\n\n".
                            "Usuari:  %1\$s\n".
                            "Clau:    %2\$s\n\n".
                            "Usergroups: %3\$s\n".
                            "Nom:     %4\$s\n".
                            "Website: ".BASE_URL."\n\n".
                            "%5\$s";


//-----                        
$title_user_change1       = ABBR_MANAGER_NAME.": Edici� del seu compte per un administrador";

$email_user_change1       = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc informant-li que el seu compte ha estat modificat el ".$email_date." per %1\$s ( %2\$s ) \n\n".
                            "Usuari: %3\$s\n".
                            "Clau:   %4\$s\n\n".
                            "Usergroups: %5\$s".
                            "Nom:    %6\$s\n\n".
                            "%7\$s";


//-----
$title_user_change2       = ABBR_MANAGER_NAME.": Edici� del seu compte";

$email_user_change2       = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc confirmant-li que ha modificat amb �xit el seu compte el ".$email_date."\n\n".
                            "Usuari: %1\$s\n".
                            "Clau:   %2\$s\n\n".
                            "Nom:    %3\$s\n";


//-----
$title_user_change3       = ABBR_MANAGER_NAME.": Edici� del seu compte";

$email_user_change3       = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc confirmant-li que ha modificat amb �xit el seu compte el ".$email_date."\n\n".
                            "Usuari: %1\$s\n".
                            "La seva clau NO ha estat modificada.\n\n".
                            "Nom:    %2\$s\n";


//-----
$title_revive             = ABBR_MANAGER_NAME.": Compte reactivtat";

$email_revive             = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc informant-li que el seu compte ha estat reactivat el  ".$email_date.".\n\n".
                            "Usuari: %1\$s\n".
                            "Clau:   %2\$s\n\n".
                            "No podem enviar-li la seva clau perqu� est� encriptada. \n\n".
                            "Si ha perdut la seva clau, envii un correu per %s per a sol�licitar una nova clau.";


//-----
$title_delete_user        = ABBR_MANAGER_NAME.": Compte desactivat.";

$email_delete_user        = "Hola,\n\n".
                            "Aquest �s el ".MANAGER_NAME." lloc informant-li que el seu compte ha estat desactivat el ".$email_date."\n\n".
                            "Ens sap greu la seva desactivaci� i li estem agraits per la seva feina!\n\n".
                            "Si desitja objectar la seva desactivaci�, o pensa que ha estat un error, envii un correu a ".EMAIL_ADMIN.".";

?>
