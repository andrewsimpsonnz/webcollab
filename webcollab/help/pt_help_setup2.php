<?php
/*
  $Id: en_help_setup2.php 1437 2006-01-19 06:38:12Z andrewsimpson $

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
define('XML_LANG', "pt" );

include_once(BASE."includes/screen.php" );

create_top("Ajuda para Configuração 2", 1 );

$content = "
<p><b>Nome da base de dados:</b></p> 
<p>Nome da nova base de dados a ser utilizado pelo WebCollab. Um nome válido pode ser 'webcollab' ou 'meu_projecto'.</p>
<p>Este nome deve ser uma palavra única (não usar espaços) formado com o uso de caracteres permitidos: letras do alfabeto (a-z) em maiúsculas ou minúsculas, dígitos (0-9),'$' e '_' (carácter de sublinhado).</p>
<p><b>Utilizador da base de dados:</b></p>
<p>Nome de utilizador que o WebCollab irá usar para ter acesso à base de dados e às suas tabelas.</p>
<p>Este utilizador precisa de ter permissões para criar novas bases de dados ou tabelas. Poderá alterá-lo para um utilizador com menos privilégios (para uso em produção) no próximo ecrã.</p>
<p><b>Palavra-passe da base de dados:</b></p>
<p>Palavra-passe do utilizador da base de dados.</p>
<p><b>Tipo de base de dados:</b></p>
<p>O menu pendente mostra os tipos de bases de dados compatíveis com o WebCollab.</p>
<p>A opção 'mysql with innodb' é recomendada em lugar de 'mysql' devido ao melhor suporte à segurança de dados do Innodb. Certifique-se de que a configuração do MySQL utilizado suporta Innodb antes de activar esta opção.</p>
<p><b>Servidor de bases de dados:</b></p> 
<p>Este é o servidor no qual a sua base de dados está instalada. Se é na mesma máquina do servidor Web, escolha 'localhost'. Para bases de dados remotas, introduza o endereço completo ou IP.</p>
<p>Nota:<br />
<ul>
<li>Para bases de dados remotas do tipo MySQL, certifique-se de que estão configuradas para aceitar conexões remotas.</li> 
<li>Para bases de dados PostgreSQL o valor 'localhost' não deve ser alterado a menos que o postmaster esteja configurado para utilizar TCP/IP. O PostgreSQL normalmente utiliza sockets locais Unix.<br />
Para usar conexões remotas do tipo TCP/IP com PostgreSQL:
<ul>
<li>Edite pg_hba.conf (arquivo de configuração do PostgreSQL) para permitir conexões TCP/IP</li>
<li>Inicie o postmaster PostgreSQL com a opção -i</li>
</ul>
</li>
</ul>
</p>
";
new_box("Help for Setup 2", $content );
create_bottom();
?>
