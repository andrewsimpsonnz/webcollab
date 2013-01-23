<?php
/*
  $Id$

  WebCollab
  ---------------------------------------
  This file created 2003

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
               Marc Tormo i Bochaca (mtormo at hotmail.com)

  Maintainer:

  NOTE: This file is written in UTF-8 character set

*/

// Get current date/time in prefered timezone
$ltime = TIME_NOW - date('Z') + TZ * 3600;
$email_date = sprintf('%s %s %s %+03d00', date('Y', $ltime ), $month_array[(date('n', $ltime ) )], date('d H:i', $ltime ), TZ );

//$email_date = date("d" )." ".$month_array[(date("n" ) )]." ".date('Y g:i a ' );

//-----
$title_file_post        = ABBR_MANAGER_NAME.": Nou arxiu disponible: %s";

$email_file_post        = "Hola,\n\n".
                          "S'ha carregat un nou arxiu a ".MANAGER_NAME." el ".$email_date." per %1\$s.\n\n".
                          "Arxiu:        %2\$s\n".
                          "Descripció: %3\$s\n\n".
                          "Projecte:    %4\$s\n".
                          "Tasca:       %5\$s\n\n".
                          "Dirigir-se al lloc web per a més detalls.\n\n".
                           BASE_URL."%6\$s\n";
//-----
$title_forum_post        = ABBR_MANAGER_NAME.": Nou missatge al fòrum: %s";

$email_forum_post        = "Hola,\n\n".
                           "El lloc ".MANAGER_NAME." l'informa que teniu un nou missatge al fòrum possat el ".$email_date." per %1\$s:\n\n".
                           "----\n\n".
                           "%2\$s\n\n".
                           "----\n\n".
                           "Dirigiu-vos al lloc web per a més detalls.\n\n".
                           BASE_URL."%3\$s\n";

$email_forum_reply       = "Hola,\n\n".
                           "El lloc ".MANAGER_NAME." l'informa que teniu un nou missatge al fòrum possat el ".$email_date." per %1\$s.\n\n".
                           "Aquest missatge és una resposta a un missatge anterior de %2\$s.\n\n".
                           "Missatge Original:\n %3\$s\n\n".
                           "----\n\n".
                           "Nova resposta:\n%4\$s\n\n".
                           "----\n\n".
                           "Dirigir-se al lloc web per a mes detalls.\n\n".
                           BASE_URL."%5\$s\n";

//-----
$email_list              = "Projecte: %1\$s\n".
                           "Tasca:    %2\$s\n".
                           "Estat:    %3\$s\n".
                           "A càrrec de:  %4\$s ( %5\$s )\n".
                           "Text:\n%6\$s\n\n".
                           "Dirigir-se al lloc web per a mes detalls.\n\n".
                           BASE_URL."%7\$s\n";

//-----
$title_takeover_project   = ABBR_MANAGER_NAME.": El seu ítem ha estat reassignat";
$title_takeover_task      = ABBR_MANAGER_NAME.": El seu ítem ha estat reassignat";

$email_takeover_project   = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que un projecte al seu càrrec ha estat reassignat per l'administrador el ".$email_date.".\n\n";

$email_takeover_task      = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que una tasca al seu càrrec ha estat reassignada per l'administrador el ".$email_date.".\n\n";

//-----
$title_new_owner_project  = ABBR_MANAGER_NAME.": Nou projecte per a vos";
$title_new_owner_task     = ABBR_MANAGER_NAME.": Nova tasca per a vos";

$email_new_owner_project  = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que un projecte seu (ara al seu càrrec) va ser canviat el ".$email_date.".\n\n".
                            "Aquí els detalls:\n\n";

$email_new_owner_task     = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que una tasca seua (ara al seu càrrec) va ser canviada el ".$email_date.".\n\n".
                            "Aquí els detalls:\n\n";

//-----
$title_new_group_project  = ABBR_MANAGER_NAME.": Nou projecte: %s";
$title_new_group_task     = ABBR_MANAGER_NAME.": Nova tasca: %s";

$email_new_group_project  = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que un nou projecte ha estat creat el ".$email_date."\n\n".
                            "Aquí els detalls:\n\n";

$email_new_group_task     = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que una nova tasca ha estat creada el ".$email_date."\n\n".
                            "Aquí els detalls:\n\n";

//-----
$title_edit_owner_project = ABBR_MANAGER_NAME.": El seu projecte actualitzat";
$title_edit_owner_task    = ABBR_MANAGER_NAME.": La seua tasca actualitzada";

$email_edit_owner_project = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que un projecte al seu càrrec va canviar el ".$email_date.".\n\n".
                            "Aquí els detalls:\n\n";

$email_edit_owner_task    = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que una tasca al seu càrrec va canviar el ".$email_date.".\n\n".
                            "Aquí els detalls:\n\n";

//-----
$title_edit_group_project = ABBR_MANAGER_NAME.": Projecte actualitzat";
$title_edit_group_task    = ABBR_MANAGER_NAME.": Tasca actualitzada";

$email_edit_group_project = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que un projecte a càrrec de %s ha canviat el ".$email_date.".\n\n".
                            "Aquí els detalls:\n\n";

$email_edit_group_task    = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que una tasca a càrrec de %s ha canviat el ".$email_date.".\n\n".
                            "Aquí els detalls:\n\n";

//-----
$title_delete_project     = ABBR_MANAGER_NAME.": Projecte eliminat";
$title_delete_task        = ABBR_MANAGER_NAME.": Tasca eliminada";

$email_delete_project     = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que un projecte al seu càrrec ha estat eliminat el ".$email_date."\n\n".
                            "Gràcies per dirigir el projecte al seu moment.\n\n";

$email_delete_task        = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que un tasca al seu càrrec ha estat eliminada el ".$email_date."\n\n".
                            "Gràcies per dirigir la tasca al seu moment.\n\n";

$delete_list              = "Projecte: %1\$s\n".
                            "Tasca:    %2\$s\n".
                            "Estat:   %3\$s\n\n".
                            "Text:\n%4\$s\n\n";

$title_usergroup_add      = ABBR_MANAGER_NAME.": Nou grup d'usuaris %1\$s creat";
$email_usergroup_add      = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que el nou grup d'usuaris %1\$s, ha estat creat el ".$email_date.".\n\n".
                            "Els membres del nou grup d'usuaris són:\n".
                            "%2\$s\n";

$title_usergroup_edit      = ABBR_MANAGER_NAME.": Grup d'usuaris %1\$s canviat";
$email_usergroup_edit      = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que el grup d'usuaris %1\$s, ha estat canviat el ".$email_date.".\n\n".
                            "Els membres del grup d'usuaris són:\n".
                            "%2\$s\n";

//-----
$title_welcome            = "Benvinguts a ".ABBR_MANAGER_NAME;

$email_welcome            = "Hola,\n\nEl lloc ".MANAGER_NAME." li dona la benvinguda ;) el  ".$email_date.".\n\n".
                            "Com que vostè és nou aquí li explicaré un parell de cosetes per a que ràpidament pugui començar a treballar\n\n".
                            "Abans de res, hem d'anar a la pantalla de gestió de projectes. La pantalla principal li mostrarà els projectes actualment disponibles.. ".
                            "Si fa clic a un dels nom, es trobarà en la zona de tasques. Aquí és on la feina comença..\n\n".
                            "Cada ítem que vostè envii o tasca que editi es mostrarà als altres usuaris com a 'nova' o 'actualitzada'. Això també funciona a la inversa i ".
                            "li permet identificar ràpidament les activitats que es realitzen sobre cada projecte.\n\n".
                            "Pot fer-se càrrec o prendre la propietat de les tasques i obtindrà permisos per editar-les. Com a usuari també rebrà els enviaments al fòrum. ".
                            "A mesura que avanci en la seua feina, editi el text de les seves tasques i l'estat de tal forma que tothom pugui tenir un seguiment del seu progrés. ".
                            "\n\nNo em resta més que desitjar-li èxits i informar-li que pot enviar un correu a %s si es troba amb alguna dificultat.\n\n --Bona sort !\n\n".
                            "Usuari:  %1\$s\n".
                            "Clau:    %2\$s\n\n".
                            "Grup d'usuaris: %3\$s\n".
                            "Nom:     %4\$s\n".
                            "Lloc web: ".BASE_URL."\n\n".
                            "%5\$s";


//-----
$title_user_change1       = ABBR_MANAGER_NAME.": Edició del seu compte per un administrador";

$email_user_change1       = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que el seu compte ha estat modificat el ".$email_date." per %1\$s ( %2\$s ) \n\n".
                            "Usuari: %3\$s\n".
                            "Clau:   %4\$s\n\n".
                            "Grup d'usuaris: %5\$s".
                            "Nom:    %6\$s\n\n".
                            "%7\$s";


//-----
$title_user_change2       = ABBR_MANAGER_NAME.": Edició del seu compte";

$email_user_change2       = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." li confirma que ha modificat amb èxit el seu compte el ".$email_date."\n\n".
                            "Usuari: %1\$s\n".
                            "Clau:   %2\$s\n\n".
                            "Nom:    %3\$s\n";


//-----
$title_user_change3       = ABBR_MANAGER_NAME.": Edició del seu compte";

$email_user_change3       = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." li confirma que ha modificat amb èxit el seu compte el ".$email_date."\n\n".
                            "Usuari: %1\$s\n".
                            "La seua clau NO ha estat modificada.\n\n".
                            "Nom:    %2\$s\n";


//-----
$title_revive             = ABBR_MANAGER_NAME.": Compte reactivat";

$email_revive             = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que el seu compte ha estat reactivat el  ".$email_date.".\n\n".
                            "Usuari: %1\$s\n".
                            "Clau:   %2\$s\n\n".
                            "No podem enviar-li la seva clau perquè està encriptada. \n\n".
                            "Si ha oblidat la seua clau envii un correu a ".EMAIL_ADMIN." per sol·licitar una nova clau.";


//-----
$title_delete_user        = ABBR_MANAGER_NAME.": Compte desactivat.";

$email_delete_user        = "Hola,\n\n".
                            "El lloc ".MANAGER_NAME." l'informa que el seu compte ha estat desactivat el ".$email_date."\n\n".
                            "Ens sap greu la seva desactivació i li estem agraïts per la seva feina!\n\n".
                            "Si desitja objectar la seva desactivació, o pensa que ha estat un error, envii un correu a ".EMAIL_ADMIN.".";

?>
