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
<p><b>Nome do banco de dados:</b></p> 
<p>Nome do novo banco de dados a ser utilizado pelo WebCollab. Um nome válido pode ser 'webcollab' ou 'meu projeto'.</p>
<p>Este nome deve ser uma palavra única (não usar espaços) formado com o uso de caracteres permitidos: letras do alfabeto (a-z) em caixa alta ou baixa, dígitos (0-9),'$' e '_' (sobrescrito).</p>
<p><b>Usuário do banco de dados:</b></p>
<p>Nome de usuário que o WebCollab irá utilizar para ganhar acesso ao banco de dados e suas tabelas.</p>
<p>Este usuário não precisa ter permissões para criar novos bancos de dados ou tabelas. Você poderá alterá-lo para um usuário com menos privilégios na próxima tela.</p>
<p><b>Senha do banco de dados:</b></p>
<p>Senha do usuário do banco de dados.</p>
<p><b>Tipo do banco de dados:</b></p>
<p>O menu suspenso mostra os tipos de bancos de dados compatíveis com o WebCollab.</p>
<p>A opção 'mysql with innodb' é recomendada no lugar de 'mysql' devido ao melhor suporte à segurança de dados do Innodb. Esteja certo de que o MySQL utilizado suporte Innodb antes de habilitar essa opção.</p>
<p><b>Servidor do banco de dados:</b></p> 
<p>Este é o servidor no qual seu banco de dados está instalado. Se é a mesma máquina que o servidor Web, escolha 'localhost'. Para bancos de dados remotos, entre o endereço completo ou IP.</p>
<p>Nota:<br />
<ul>
<li>Para bancos de dados remotos do tipo MySQL, tenha certeza de que aceitem conexões remotas.</li> 
<li>Para bancos de dados PostgreSQL o valor 'localhost' não deve ser alterado a menos que o postmaster esteja configurado para utilizar TCP/IP. PostgreSQL normalmente utiliza soquetes locais Unix.<br />
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
