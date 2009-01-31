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
<p><b>Endereço do sítio:</b></p>
<p>Endereço-base para a instalação do WebCollab. Exemplo:</p>
<pre  style=\"background-color : #F2F2F2; padding-top : 0px; padding-bottom :
5px\">http://meudomínio.com.br/webcollab/</pre>
<p>Não se esqueça da barra inclinada no final. É obrigatória.</p>
<p><b>Nome do sítio:</b></p>
<p>Nome do sítio que aparecerá em todas as páginas.</p>
<p>O nome padrão é 'WebCollab'</p>
<p><b>Nome abreviado do sítio:</b></p>
<p>Nome do sítio que será enviado no assunto dos e-mails.<br />
Deve ser relativamente curto para ser facilmente lido nas caixas de entrada dos usuários.</p>
<p><b>Nome do banco de dados:</b></p> 
<p>Nome do banco de dados previamente configurado para o WebCollab.</p>
<p><b>Usuário do banco de dados:</b></p>
<p>Usuário do banco de dados utilizado pelo WebCollab para ganhar acesso aos dados e tabelas.</p>
<p>Este usuário necessita de acesso para ler e escrever as tabelas utilizadas pelo WebCollab. Isso significa privilégios no banco de dados como SELECT, INSERT, UPDATE e DELETE.  Os outros privilégios podem ser bloqueados para melhor segurança.</p>
<p><b>Senha do banco de dados:</b></p>
<p>Senha relativa ao usuário do banco de dados.</p>
<p><b>Tipo do banco de dados:</b></p>
<p>O menu suspenso mostra os tipos de banco de dados disponíveis para o WebCollab.</p>
<p>O tipo escolhido precisa ser idêntico ao criado por você. Para uma nova instalação o menu suspenso exibirá por padrão o tipo correto.</p>
<p><b>Caminho dos arquivos:</b></p>
<p>Diretório no qual os arquivos enviados serão armazenados. Precisa ser necessariamente um caminho absoluto de diretório. Não é o endereço do sítio. Exemplos para caminhos absolutos são:</p>
Unix:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">/var/www/webcollab/files/filebase</pre>
Windows:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">c:\www\webcollab\files\filebase</pre>
Nota:<br />
<ul>
<li>O caminho do diretório para arquivos não deverá terminar com uma barra.</li>
<li>O WebCollab irá automaticamente converter barras invertidas '\' do Windows em barras inclinadas '/'. Isso evita o problema da barra invertida servir como sinal para ignorar comandos no PHP, apesar de ainda ser lido por servidores Windows.</li>
<li>Por medidas de segurança, o diretório para armazenagem de arquivos deverá se encontrar fora do diretório raiz do servidor Web. (O caminho padrão dado <span style=\"text-decoration: underline\">não é</span>
fora da raiz do servidor Web, mas deixa a primeira instalação mais fácil).</li>
<li>O diretório para envio de arquivos deve ser passível de leitura e escrita pelo Servidor Web Apache.</li> 
</ul>
<p><b>Tamanho do arquivo:</b></p>
<p>Tamanho máximo (em bytes) do arquivo que poderá ser enviado.</p>
<p>Nota: Configurações do PHP e Apache sobrepujarão o tamanho máximo configurado aqui. Veja o FAQ para maiores detalhes.</p>
<p><b>Língua:</b></p>
<p>Língua a ser utilizada após o término das configurações.</p>
<p>Línguas multi-byte (Chinês, Japonês e Coreano) só estarão disponíveis na versão Unicode do WebCollab. Para melhor referência, tais línguas encontram-se sinalizadas com um asterisco '*' no menu suspenso.</p>
<p><b>Fuso-horário:</b></p>
<p>Fuso-horário de preferência a ser utilizado.</p>
<p><b>Usar e-mail:</b></p>
<p>O uso de e-mail é altamente recomendado para a completa funcionalidade do WebCollab</p>
<p><b>Servidor SMTP:</b></p>
<p>O WebCollab precisa de um servidor SMTP para dar saída aos e-mails. Pode ser um servidor local ou máquina externa. Se estiver na mesma máquina que o servidor Web, o valor 'localhost' (significando a própria máquina) pode ser utilizado.</p>
<p>O servidor SMTP pode ser:</p>
Um endereço qualificado:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">mail.meudomínio.com.br</pre>
Um endereço IP:<br />
<pre  style=\"background-color:#F2F2F2; padding-top:0px; padding-bottom:5px\">192.168.1.1</pre>
<p>WebCollab também está apto a trabalhar com servidores de e-mail que requeiram SMTP AUTH. Para tanto, você precisa editar manualmente o arquivo <i>[webcollab]/config/config.php</i> após a configuração</p> ";

new_box("Help for Setup 3", $content );
create_bottom();
?>
