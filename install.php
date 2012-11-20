<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title>Gestiolus Installer</title>
		<style>
		<?php include 'style.css'; ?>
		</style>
		
	</head>
<body>
	<article>
		<p class="titolo">Installazione Gestiolus</p>
	</article>
<?php
if(isset($_POST[createtable])){
	$query1="CREATE TABLE IF NOT EXISTS `guasti` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nomepc` varchar(100) NOT NULL,
  `ubicazione` varchar(50) NOT NULL,
  `descrizione` text NOT NULL,
  `nome` varchar(100) NOT NULL,
  `data_apertura` date NOT NULL,
  `soluzione` text NOT NULL,
  `risolutore` varchar(50) NOT NULL,
  `data_chiusura` date NOT NULL,
  `stato` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;";
	$query2="CREATE TABLE IF NOT EXISTS `lab` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;";
	$query3="CREATE TABLE IF NOT EXISTS `tecnici` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `punteggio` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0;";
	$query4="CREATE TABLE IF NOT EXISTS `notepad` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `note` text NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;";

	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		echo "<article>\n<p class=\"install\">\n";
		echo "<ul>\n";
		$result = mysql_query($query1);
		if (!$result) {
    			die('<p class=\"error\">Invalid query: ' . mysql_error()) . '</p>';
		}else{
			echo "<li>Query 1: ok</li>";
		}
		$result = mysql_query($query2);
		if (!$result) {
    			die('<p class=\"error\">Invalid query:  ' . mysql_error()) . '</p>';
		}else{
			echo "<li>Query 2: ok</li>";
		}
		$result = mysql_query($query3);
		if (!$result) {
    			die('<p class=\"error\">Invalid query:  ' . mysql_error()) . '</p>';
		}else{
			echo "<li>Query 3: ok</li>";
		}
		$result = mysql_query($query4);
		if (!$result) {
    			die('<p class=\"error\">Invalid query:  ' . mysql_error()) . '</p>';
		}else{
			echo "<li>Query 4: ok</li>";
		}
		echo "<li>Installazione completata.</li>";
		echo "<li>Cancella il file <b>install.php</b> nella directory di Gestiolus del server web</li>";
		echo "<li>Comincia a <a href=\"admin.php\">configurare Gestiolus</a></li>";
		echo "</ul>\n";
		echo "</p></article>";
	}
	mysql_close($link);
}elseif(!isset($_POST[createtable])){
?>
	<article class="install">
		<p>
			<b>Modifica il file <i>config.php</i> con i tuoi parametri e poi procedi all'installazione</b><br />
			<form method="post" action="install.php">
				<input type="submit" value="Crea le tabelle nel database" name="createtable" />
			</form>
		</p>
	</article>
<?php
}
?>
</body>
</html>