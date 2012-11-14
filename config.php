<?php
// persolizza i tuoi parametri
$title = "_TITLE_";		// il titolo che comparirà sulla barra del browser
$hostname = "_HOST_";		// l'host del tuo database
$username = "_USER_";		// il nome utente per accedere al database
$password = "_PASSWORD_";	// la password per accedere al database
$database = "_DATABASE_";	// il nome del tuo database
$checkupdate = "y"; 		// controllo aggiornamenti: y = abilitato, n = disabilitato

// non toccare niente qua sotto

$link = mysql_connect($hostname, $username, $password);
mysql_select_db($database);
?>
