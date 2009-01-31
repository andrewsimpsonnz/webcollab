<?php

header("HTTP/1.0 403 Forbidden", true, 403 );

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"  \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">\n".
     "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">\n".
     "<head>\n".
     "<title>403 Forbidden</title>\n".
     "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\n".
     "</head>\n".
     "<body>\n".
     "<h1>Forbidden</h1>\n".
     "<p>You don't have permission to access ".$_SERVER['REQUEST_URI']." on this server.<\p>\n".
     "<hr />\n";

echo $_SERVER['SERVER_SIGNATURE']."\n";

echo "</body>\n".
     "</html>\n";
?>
