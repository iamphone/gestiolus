<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title></head>
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
<form action="loading.php" method="post">
	<p class="tabella">
		<h2>Segnalazione guasti</h2>
		<table>
			<tr>
				<td>Selezionare un'aula</td>
				<td>
					<abbr title="Inserisci l'bicazione del computer guasto">
						<select name="ubicazione">
<?php
$query="SELECT * FROM lab";
$result = mysql_query($query);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_array($result, MYSQL_NUM)){
	echo "<option value=\"" . $row[1] . "\">" . $row[1] . "</option>\n";
}
?>
						</select>
					</abbr>
				</td>
			</tr>
			<tr>
				<td>Nome computer</td>
				<td>
					<abbr title="Inserisci il nome del computer. E' scritto su un lato del computer">
						<input type="text" name="nomepc" size="45" />
					</abbr>
				</td>
			</tr>
			<tr>
				<td>
					Descrizione dettagliata<br />del tipo di problema
				</td>
				<td>
					<abbr title="Inserisci la descrizione dettagliata del problema riscontrato">
						<textarea name="guasto" rows="6" cols="48"></textarea>
					<abbr>
				</td>
			</tr>
			<tr>
				<td>Segnalato da:</td>
				<td>
					<abbr title="Inserisci nome dell'insegnante che segnala il guasto">
						<input type="text" name="nome" size="45"/>
					</abbr>
				</td>
			</tr>
			<tr>
				<td>Salva</td>
				<td>
					<abbr title="Clicka per inviare la segnalazione guasto">
						<input type="image" src="img/floppy.png" alt="Segnala Guasto">
					</abbr>
				</td>
			</tr>
	
		</table>
	</form>
		</article>
	</section>
</body>
</html>
