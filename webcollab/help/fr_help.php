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

  Help page

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "en" );

include_once(BASE."includes/screen.php" );

create_top("Aide", 1 );

$content = "
<a name=\"usergroup\"></a>
<p><b>Groupe d'utilisateurs:</b></p>
<p>La plupart des projets ou tâches sont gérés par un groupe d'utilisateurs travaillant ensemble dans un domaine spécifique.  Un groupe d'utilisateurs est
un groupe d'utilisateurs partageant un même espace de travail. Des courriels de notification peuvent être envoyés à un groupe d'utilisateurs de son choix,
plutôt qu'à un utilisateur individuel.</p>
<p>Les groupes d'utilisateurs peuvent également être utilisés pour contrôler l'accessibilité de communications de moindre importance, à travers un forum privé. L'accès peut être limité au seul groupe d'utilisateurs; Dans ce cas, les autres utilisateurs ne verront pas le projet / la tâche ou ne pourront pas y accéder.
La restriction d'accès peut être appliquée au niveau du projet ou de la tâche à l'aide de la commande \"Tous les utilisateurs peuvent afficher cette
tâche\"</p>
<p>Le cas échéant, les groupes d'utilisateurs disposent également de leurs propres forums privés avec chaque tâche et projet.</p>
<br /> 
<a name=\"taskgroup\"></a>
<p><b>Groupe de tâches :</b></p>
<p>Les différences entre les groupes de tâches et les groupes d'utilisateurs n'apparaissent pas facilement pour les nouveaux utilisateurs.
Cependant la différence est claire; Les groupes d'utilisateurs contrôlent l'accès et le flux d'informations; Les groupes de travail sont
simplement pour rendre la répartition des tâches plus lisible.</p>
<p>Lorsqu'un projet comporte un certain nombre de tâches enfants, la liste peut paraître longue et
illisible.  En disposant les tâches dans un groupe de tâches, la liste sera automatiquement regroupée en
sous-sections très lisibles(par groupe de travail).  Les tâches auxquelles aucun groupe de tâches n'aura été attribué seront
groupées comme 'hors-catégorie'.</p>
<p>Pour résumer: Si aucune tâche dans un projet n'est classée dans un groupe de tâches, la liste des tâches sera une longue liste illisible.
Si une tâche au moins est classée dans un groupe de tâches, toutes les tâches seront répertoriées par groupe de tâches.</p>
<br />
<a name=\"globalaccess\"></a>
<p><b>Tous les utilisateurs peuvent-ils voir la tâche ?</b></p>
<p>Cette case à cocher permet de limiter la visualisation d’une tâche / projet aux membres du groupe sélectionné.
Lorsque la case est cochée, tous les utilisateurs peuvent voir la tâche / le projet. Inversement, lorsque la case est
décochée, seuls les membres du groupe d'utilisateurs peuvent voir la tâche.</p>
<p>Pour les tâches: les utilisateurs n'appartenant pas au groupe d'utilisateurs sélectionné pourront voir les tâches dans la liste de projets,
mais seront incapables d'y accéder.</p>
<p>Pour les projets: les utilisateurs n'appartenant pas au groupe d'utilisateurs sélectionné ne pourront pas voir le projet ou le
tâches associées.</p>
<p>Si aucun groupe d'utilisateurs n'est sélectionné, cette case à cocher n'a aucun effet.</p>
<a name=\"groupaccess\"><br /></a>
<p><b>Toute personne du groupe d'utilisateurs peut-elle éditer ?</b></p>
<p>Cette case à cocher permet à tous les membres d'un groupe d'utilisateurs de modifier la tâche / le projet.  Quand la case est
cochée, tous les membres du groupe d'utilisateurs peuvent modifier cet élément. Quand la case est décochée, seul le propriétaire
peut éditer la tâche.</p>
<p>Si aucun groupe d'utilisateurs n'est sélectionné, cette case à cocher n'a aucun effet.</p>
<br />
<a name=\"summarypage\"></a>
<p><b>Sommaire :</b></p>
<p>La page de résumé contient six colonnes qui indiquent de manière concise ce qui se passe avec chaque tâche.</p>
<ul>
<li><b>Drapeau</b>:
indique s'il y a quelque chose de nouveau pour cette tâche.
Les possibilités sont:
<ul>
<li><b>C</b>:<br />
indique que la tâche a été créée<br /></li>
<li><b>M</b>:<br />
indique que la tâche a été modifiée<br /></li>
<li><b>P</b>:<br />
indique qu'une publication a été faite sur le forum de la tâche<br /></li>
<li><b>F</b>:<br />
indique qu'un fichier a été téléchargé pour documenter la tâche<br /></li>
</ul>
Si un drapeau est présent, vous pouvez cliquer dessus pour afficher la tâche associée.<br /></li>
<li><b>Echéance</b>:<br />
indique quand la tâche est dûe.<br />
Si la date apparaît en <span class=\"red\">rouge</span>, alors la tâche est en retard; sinon,
si la date apparaît en <span class=\"green\">vert</span>,
alors, la tâche est dûe aujourd'hui.<br /></li>
<li><b>Statut</b>:<br />
indique le statut de travail de l'élément:
<ul>
<li><b>Planifié</b>:<br />
indique que la tâche a été créée récemment,
mais (à dessein) n'a pas encore été programmée</li>
<li><b>Nouveau</b>:<br />
indique que la tâche a été créée récemment,
et attend des ressources pour être démarrée</li>
<li><span class=\"blue\">En attente</span>:<br />
indique que le travail sur la tâche est arrêté,
en attente d'un événement externe</li>
<li><span class=\"orange\">Actif</span>:<br />
indique que la tâche est en progression</li>
<li><span class=\"green\">Terminé</span>:<br />
indique que la tâche est réalisée<br /></li>
</ul>
</li>
<li><b>Propriétaire</b>:<br />
indique à qui la tâche est assignée.
Vous pouvez cliquer sur le nom pour voir plus d'informations au sujet
de la personne.<br /></li>
<li><b>Groupe</b>:<br />
indique le groupe d'utilisateurs ou le groupe de tâches associé à la tâche.
Si vous cliquez sur cet en-tête de colonne,
l'affichage bascule entre les deux types de groupes.<br /></li>
<li><b>Tâches</b>:<br />
indique le nom de la tâche.
Cliquez sur le nom de la tâche pour accéder à plus d'informations.</li>
</ul>
";
  new_box("Aide", $content );
  create_bottom();
?>
