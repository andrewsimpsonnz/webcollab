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

*/

//get our location
require_once("path.php" );
require_once(BASE.'path_config.php' );
require_once(BASE_CONFIG.'config.php' );

define('CHARACTER_SET', 'UTF-8' );
define('XML_LANG', "pt" );

include_once(BASE."includes/screen.php" );

create_top("Ajuda para configuração 3", 1 );

$content = "
<p><b>Endereço do portal:</b></p>
<p>Endereço-base para a instalação do WebCollab. Exemplo:</p>
<pre  style=\"background-color : #F2F2F2; padding-top : 0px; padding-bottom :
5px\">http://meudomínio.pt/webcollab/</pre>
<p>Não se esqueça da barra inclinada no final. É obrigatória.</p>
<p><b>Nome do portal:</b></p>
<p>Nome do portal que aparecerá em todas as páginas.</p>
<p>O nome predefinido é 'WebCollab'</p>
<p><b>Nome abreviado do portal:</b></p>
<p>Nome do portal que será enviado no assunto dos e-mails.<br />
Deve ser relativamente curto para ser facilmente lido nas caixas de entrada de correio dos utilizadores.</p>
<p><b>Nome da base de dados:</b></p> 
<p>Nome da base de dados previamente configurada para o WebCollab.</p>
<p><b>Utilizador da base de dados:</b></p>
<p>Utilizador da base de dados usado pelo WebCollab para ter acesso aos dados e tabelas.</p>
<p>Este utilizador necessita de ter acesso para ler e escrever nas tabelas utilizadas pelo WebCollab. Isto significa privilégios na base de dados como SELECT, INSERT, UPDATE e DELETE.  Os outros privilégios podem ser bloqueados para maior segurança.</p>
<p><b>Palavra-passe da base de dados:</b></p>
<p>Palavra-passe relativa ao utilizador da base de dados.</p>
<p><b>Tipo de base de dados:</b></p>
<p>O menu pendente mostra os tipos de bases de dados disponíveis para o WebCollab.</p>
<p>O tipo escolhido necessita de ser idêntico ao criado por si. Para uma nova instalação o menu pendente exibirá por predefinição o tipo correcto.</p>
<p><b>Localização dos ficheiros:</b></p>
<p>Directório no qual os ficheiros enviados serão armazenados. Tem que ser necessariamente um caminho absoluto de directório. Não é o endereço do portal. Exemplos de caminhos absolutos são:</p>
Unix:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">/var/www/webcollab/files/filebase</pre>
Windows:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">c:\www\webcollab\files\filebase</pre>
Nota:<br />
<ul>
<li>O caminho do directório não deverá terminar com uma barra.</li>
<li>O WebCollab irá automaticamente converter barras invertidas '\' do Windows em barras inclinadas '/'. Isso evita o problema da barra invertida servir como sinal para ignorar comandos no PHP, apesar de continuar a ser lido por servidores Windows.</li>
<li>Por medida de segurança, o directório para armazenagem de ficheiros deverá localizar-se fora do directório raiz do servidor Web. (O caminho predefinido <span style=\"text-decoration: underline\">não é</span>
fora da raiz do servidor Web, mas torna a primeira instalação mais fácil).</li>
<li>O directório para envio de ficheiros deve ser passível de leitura e escrita pelo Servidor Web Apache.</li> 
</ul>
<p><b>Tamanho do ficheiro:</b></p>
<p>Tamanho máximo (em bytes) do ficheiro que poderá ser enviado.</p>
<p>Nota: As configurações do PHP e do Apache sobrepor-se-ão ao tamanho máximo configurado aqui. Veja as FAQ para mais detalhes.</p>
<p><b>Língua:</b></p>
<p>Língua a ser utilizada após o término das configurações.</p>
<p>Línguas multi-byte (Chinês, Japonês e Coreano) só estarão disponíveis na versão Unicode do WebCollab. Para melhor referência, tais línguas encontram-se sinalizadas com um asterisco '*' no menu pendente.</p>
<p><b>Fuso-horário:</b></p>
<p>Fuso-horário de preferência a ser utilizado.</p>
<p><b>Usar e-mail:</b></p>
<p>A utilização de e-mail é altamente recomendada para a completa funcionalidade do WebCollab</p>
<p><b>Servidor SMTP:</b></p>
<p>O WebCollab necessita de um servidor SMTP para fazer sair os e-mails. Pode ser um servidor local ou uma máquina externa. Se estiver na mesma máquina que o servidor Web, o valor 'localhost' (significando a própria máquina) pode ser utilizado.</p>
<p>O servidor SMTP pode ser:</p>
Um endereço qualificado:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">mail.meudomínio.pt</pre>
Um endereço IP:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">192.168.1.1</pre>
<p>O WebCollab também está apto a trabalhar com servidores de e-mail que requeiram SMTP AUTH. Para tanto, deverá editar manualmente o ficheiro <i>[webcollab]/config/config.php</i> após a configuração</p> ";

new_box("Help for Setup 3", $content );
create_bottom();
?>
