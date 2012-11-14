<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title>
		<style>
		<?php include 'style.css'; ?>
		</style>
	</head>
<body>
	<section>
		<article>
			<p class="dx">
				<?php include "menu.php"; ?>
			</p>
		</article>
		<article>
			<p>
			<h2>Lista guasti aperti</h2>
				<table class="tabella">
					<tr>
						<th>Computer</th>
						<th>Ubicazione</th>
						<th>Problema Riscontrato</th>
						<th>Data</th>
						<th>Soluzione</th>
						<th>Tecnico chiusura</th>
					</tr>
<?php
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		$query="SELECT * FROM guasti WHERE stato = '0' ORDER BY data_apertura";
		$result = mysql_query($query);
		if (!$result) {
    			die('Invalid query: ' . mysql_error());
		}
		while ($row = mysql_fetch_array($result, MYSQL_NUM)){
    			echo "<tr>\n";
			echo "<td>$row[1]</td><td>$row[2]</td><td>" . stripslashes($row[3]) . "<br/>";
			if($row[4] != ""){
				echo "<p class=\"segnalatoda\">segnalato da: <b>" . $row[4] . "</b></p>";
			}
			echo "</td><td><p class=\"data\">" .  str_replace("-", "/", $row[5]) . "</p></td>\n";
			?>
				<form action="chiudi.php" method="POST">
					<td><textarea name="soluzione" rows="3" cols="20"></textarea></td>
					<td>
						<input type="hidden" name="id" value="<?php echo $row[0]; ?>" />
						<select name="tecnico">
						<?php
						$querytecnici="SELECT * FROM tecnici WHERE punteggio = 1";
						$resulttecnici = mysql_query($querytecnici);
						while($rowtecnici = mysql_fetch_array($resulttecnici)){
								echo "<option value=\"" . $rowtecnici[0] . "\">" . $rowtecnici[1] . "</option>";
						}
						?>
						</select>
						<abbr title="Elimina: <?php echo $row[3]; ?>">
							<a href="del.php?id=<?php echo $row[0]; ?>"><img src="img/del.png" alt="cancella" /></a>&nbsp;&nbsp; 
						</abbr>						
						<abbr title="Elimina: <?php echo $row[3]; ?>">							
							<input type="submit" value="chiudi" />
						</abbr>
					
					</td>
				</form>
			<?php
			echo "</tr>\n";
		}
	}
	mysql_close($link);

?>				</table>
			</p>
		</article>
	</section>
</body>
</html>
