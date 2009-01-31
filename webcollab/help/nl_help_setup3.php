<?php
/*
  $Id: en_help_setup3.php 1437 2006-01-19 06:38:12Z andrewsimpson $

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

  Maintainer: Patrick Flinkerbusch <patrick at flinkerbusch.info>

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "nl" );

include_once(BASE."includes/screen.php" );

create_top("Help for Setup 3", 1 );

$content = "
<p><b>Site address:</b></p>
<p>Dit is de base URL voor uw WebCollab site. Bijvoorbeeld:</p>
<pre  style=\"background-color : #F2F2F2; padding-top : 0px; padding-bottom :
5px\">http://mijndomain.com/webcollab/</pre>
<p>Denk aan de / aan het einde. Dit is verplicht.</p>
<p><b>Site name:</b></p>
<p>Dit is de naam van uw site en verschijnt op de webpagina's.</p>
<p>De standaard naam is 'WebCollab'</p>
<p><b>Abbreviated site name:</b></p>
<p>Dit is de verkorte naam van uw site die gebruikt wordt in het onderwerp veld van e-mail berichten.<br />
De naam moet relatief kort zijn om duidelijk te zijn in het e-mail programma van uw gebruikers.</p>
<p><b>Database name:</b></p> 
<p>Dit is de naam van de database hiervoor ingesteld voor WebCollab.</p>
<p><b>Database user:</b></p>
<p>Dit is de database gebruiker welke WebCollab gebruikt om toegang te krijgen tot de database en tabellen..</p>
<p>Deze gebruiker heeft slechts lees en schrijf rechten nodig op de WebCollab database en tabellen. Dit komt overeen met de rechten op een database zoals SELECT, INSERT, UPDATE, en DELETE.  De andere rechten kunnen geblokkeerd worden voor betere beveiliging.</p>
<p><b>Database password:</b></p>
<p>Het wachtwoord voor de database gebruiker.</p>
<p><b>Database type:</b></p>
<p>Het selectievak geeft de databasetypen weer die ondersteund worden door WebCollab.</p>
<p>De geselecteerde database type moet hetzelfde zijn als het database type die u heeft aangemaakt.  Bij nieuwe installaties zal het selectievak standaard het juiste type aangeven.</p>
<p><b>File location:</b></p>
<p>Dit is de map waarin de ingestuurde bestanden opgeslagen zullen worden. Dit moet een volledig (absoluut) pad zijn. Dit is niet het web adres. Voorbeelden van een absoluut pad zijn:</p>
Unix:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">/var/www/webcollab/files/filebase</pre>
Windows:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">c:\www\webcollab\files\filebase</pre>
Note:<br />
<ul>
<li>De mapnaam eindigt niet met een /.</li>
<li>WebCollab zal automatisch '\' in Windows omzetten naar '/'.  Dit is nog steeds leesbaar voor Windows servers, maar voorkomt dat een '\' als escape gelezen wordt in PHP.</li>
<li>De filebase map dient buiten uw  webserver root directory te zijn om bestands beveiliging te handhaven. (De standaard aangegeven map is <span style=\"text-decoration: underline\">niet</span>
buiten de web server root, maar het maakt de eerste installatie gemakkelijker).</li>
<li>De gekozen map moet lees- en schrijfbaar zijn voor de Apache web server.</li> 
</ul>
<p><b>File size:</b></p>
<p>Dit is de maximaal toegestane grootte van ingestuurde bestanden (in bytes).</p>
<p>Note: PHP en Apache instellingen negeren de hier ingestelde waarde.  Zie de FAQ voor meer informatie.</p>
<p><b>Language:</b></p>
<p>De taal die gebruikt wordt bij het voltooien van de installatie.</p>
<p>Multi-byte talen (Chinees, Japans en Koreaans) zijn alleen beschikbaar in de Unicode versie van
WebCollab.  Ter herkenning zijn deze talen gemarkeerd met een sterretje '*' in het selectievak.</p>
<p><b>Timezone:</b></p>
<p>De te gebruiken tijdzone.</p>
<p><b>Use email:</b></p>
<p>Email wordt sterk aangeraden voor volledige functionaliteit in WebCollab</p>
<p><b>SMTP Host:</b></p>
<p>WebCollab heeft een SMTP hostnodig om e-mail te kunnen sturen.  De mail server kan de locale machine of een externe machine zijn. Indien de mail server op dezelfde machine werkt als de web server, kan  'localhost' (deze machine) gebruikt worden.</p>
<p>De SMTP host kan zijn:</p>
Volledig geldig adres:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">mail.mijndomain.com</pre>
IP Adres:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">192.168.1.1</pre>
<p>WebCollab werkt ook met mail servers die SMTP AUTH vereisen.  U moet hiervoor handmatig 
<i>[webcollab]/config/config.php</i> bewerken na het configureren.</p> ";

new_box("Help for Setup 3", $content );
create_bottom();
?>

