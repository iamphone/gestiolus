<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
	<section>
		<article>
			<p class="dx">
				<?php include "menu.php"; ?>
				</acronym>
			</p>
		</article>
<?php
if ( ! get_magic_quotes_gpc() ) {
  $_GET['nome'] = addslashes($_GET['nome']);
  $_GET['id'] = addslashes($_GET['id']);
  $_GET['filtro'] = addslashes($_GET['filtro']);
}
?>
		<article>
		<h2>Seleziona il filtro per il report.</h2>

	<?php
	if (!$link) {
	  		die('Could not connect: ' . mysql_error());
	}else{
		$query="SELECT * FROM tecnici ORDER BY id DESC";
		$result = mysql_query($query);
		if (!$result) {
	  		die('Invalid query: ' . mysql_error());
		}
		while ($row = mysql_fetch_array($result, MYSQL_NUM)){
			echo "<a class=\"nomi\" href=\"report.php?id=" . $row[0] . "&nome=" . $row[1] . "\">" . $row[1] . "</a>\n";
		}
	}
	?>
	<a class="nomi" href="report.php?filtro=tutti">Tutti</a>
<?php
if(!isset($_GET[id]) && isset($_GET[filtro])){
?>
	</article>
                <article>
                        <p>
                                <table class="tabella">
                                        <tr>
                                                <th>Computer</th>
                                                <th>Ubicazione</th>
                                                <th>Problema Riscontrato</th>
                                                <th>Soluzione</th>
                                                <th>Data Apertura</th>
                                                <th>Data Chiusura</th>
                                                <th>Tecnico</th>
                                        </tr>
        <?php
                if (!$link) {
                        die('Could not connect: ' . mysql_error());
                }else{
                        $query="SELECT * FROM guasti WHERE stato='1' ORDER BY data_chiusura DESC";
                        $result = mysql_query($query);
                        echo "<br /><hr />Numero totale di interventi <b>" . $_GET[nome] . ": " . mysql_affected_rows() . "</b><br /><br />\n";
			if (!$result) {
                                die('Invalid query: ' . mysql_error());
                        }
                        while ($row = mysql_fetch_array($result, MYSQL_NUM)){
                        	$querytecnico="SELECT nome FROM tecnici WHERE id=" . $row[7];
                        	$resulttecnico=mysql_query($querytecnico);
                        	$risolutore=mysql_fetch_array($resulttecnico);
                                echo "<tr>\n";
                                echo "<td>$row[1]</td><td>$row[2]</td><td>" . stripslashes($row[3]) . "</td><td>" . stripslashes($row[6]) . "</td><td>" . str_replace("-", "/", $row[8]) . "</td><td>" . str_replace("-", "/", $row[5]) . "</td><td>" . $risolutore[0] . "</td>\n";
                                ?>
                                <?php
                                echo "</tr>\n";
                        }
		}
}elseif(isset($_GET[id])){
?>
		</article>
		<article>
			<p>
				<table class="tabella">
					<tr>
						<th>Computer</th>
						<th>Ubicazione</th>
						<th>Problema Riscontrato</th>
						<th>Soluzione</th>
						<th>Data Apertura</th>
						<th>Data Chiusura</th>
					</tr>
	<?php
		if (!$link) {
	   		die('Could not connect: ' . mysql_error());
		}else{
			$query="SELECT * FROM guasti WHERE stato = '1' AND risolutore = '" . $_GET[id] . "' ORDER BY data_apertura";
			$result = mysql_query($query);
			echo "<br /><hr />Numero totale di interventi effettuati da <b>" . $_GET[nome] . ": " . mysql_affected_rows() . "</b><br /><br />\n";
			if (!$result) {
	    			die('Invalid query: ' . mysql_error());
			}
			while ($row = mysql_fetch_array($result, MYSQL_NUM)){
	    			echo "<tr>\n";
				echo "<td>$row[1]</td><td>$row[2]</td><td>" . stripslashes($row[3]) . "</td><td>" . stripslashes($row[6]) . "</td><td>" . str_replace("-", "/", $row[5]) . "</td><td>" . str_replace("-", "/", $row[8]) . "</td>\n";
				?>
				<?php
				echo "</tr>\n";
			}
		}
		mysql_close($link);
}
	?>		
	
				</table>
			</p>
		</article>
	</section>
</body>
</html>
