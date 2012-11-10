<?php include "config.php"; ?>
<?php
if ( ! get_magic_quotes_gpc() ) {
  $_POST['add'] = addslashes(strip_tags($_POST['add']));
  $_POST['nomelab'] = addslashes(strip_tags($_POST['nomelab']));
  $_POST['nometecnico'] = addslashes(strip_tags($_POST['nometecnico']));
  $_GET['dellab'] = addslashes(strip_tags($_GET['dellab']));
  $_GET['deltecnico'] = addslashes(strip_tags($_GET['deltecnico']));
  $_GET['enable'] = addslashes(strip_tags($_GET['enable']));
  $_GET['disable'] = addslashes(strip_tags($_GET['disable']));
}
if ($_POST[add] == "addlab"){
	if($_POST[nomelab] == ""){
		$error = "<p class=\"error\">Non puoi lasciare vuoto il campo del nome...</p>";
	}else{
		$query="INSERT INTO lab VALUES('', '" . $_POST[nomelab] . "')";
		$result = mysql_query($query);
	}
}elseif($_POST[add] == "addtecnico"){
	if($_POST[nometecnico] == ""){
		$error = "<p class=\"error\">Non puoi lasciare vuoto il campo del nome...</p>";
	}else{
		$query="INSERT INTO tecnici VALUES('', '" . $_POST[nometecnico] . "', '0')";
		$result = mysql_query($query);
	}
}
if($_GET[dellab]){
	$query="DELETE FROM lab WHERE id =" . $_GET[dellab];
	$result = mysql_query($query);
}/*elseif($_GET[deltecnico]){
	$query="DELETE FROM tecnici WHERE id =" . $_GET[deltecnico];
	$result = mysql_query($query);
}*/

if($_GET[enable]){
	$query="UPDATE tecnici SET punteggio = 1 WHERE id =" . $_GET[enable];
	$result = mysql_query($query);
}elseif($_GET[disable]){
	$query="UPDATE tecnici SET punteggio = 0 WHERE id =" . $_GET[disable];
	$result = mysql_query($query);
}
?>
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
			</p>
		</article>
		<article>
			<p>
				<h2>Pannello di Ammistrazione</h2>
			</p>
		</article>
<?php
if($error != ""){
echo "<article>";
echo $error;
echo "</article>";
}
?>
		<article>
			<p>
						<table>

								<th>Gestione Laboratori</th>

<?php
$query="SELECT * FROM lab";
$result = mysql_query($query);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}
while ($row = mysql_fetch_array($result, MYSQL_NUM)){
	echo "<tr><td>" . $row[1] . "</td><td><acronym title=\"Elimina\"><a href=\"admin.php?dellab=" . $row[0] . "\"><img src=\"img/del.png\" alt=\"cancella\" /></a></acronym></td></tr>\n";
}
?>
							<tr>
								<td>
									<form action="admin.php" method="post">
										<input type="text" name="nomelab" />
								</td>
								<td>
										<acronym title="Aggiungi"><input type="image" name="add" value="addlab" src="img/add.png" alt="add" /></acronym>
									</form>
								</td>
							</tr>
						</table>
			</p>
			<p>
						<table>
								<th>Gestione Tecnici</th>
<?php
$querytecnici="SELECT * FROM tecnici";
$resulttecnici = mysql_query($querytecnici);
while($rowtecnici = mysql_fetch_array($resulttecnici)){
	echo "<tr><td>" . $rowtecnici[1] . "</td>";
	if($rowtecnici[2] == 1){
		echo "<td><acronym title=\"Utente abilitato. Clicka per disabilitarlo\"><a href=\"admin.php?disable=" . $rowtecnici[0] . "\"><img src=\"img/enable.png\" alt=\"Disabilita\" /></acronym></td></tr>";
	}elseif($rowtecnici[2] == 0){
		echo "<td><acronym title=\"Utente disabilitato. Clicka per abilitarlo\"><a href=\"admin.php?enable=" . $rowtecnici[0] . "\"><img src=\"img/disable.png\" alt=\"Abilita\" /></acronym></td></tr>";
	}
	//echo "<td><a href=\"admin.php?deltecnico=" . $rowtecnici[0] . "\"><img src=\"img/del.png\" alt=\"cancella\" /></a></td></tr>";
}
?>
							<tr>
								<td>
									<form action="admin.php" method="post">
										<input type="text" name="nometecnico" />
								</td>
								<td>
										<acronym title="Aggiungi"><input type="image" name="add" value="addtecnico" src="img/add.png" alt="add" /></acronym>
									</form>
								</td>
							</tr>
						</table>
			</p>
		</article>
		<article>
			<p>
				Legenda:<br />
				<img src="img/enable.png" alt="Enable" /> Utente abilitato. Clicka per disabilitarlo.<br />
				<img src="img/disable.png" alt="Disable" /> Utente disabilitato. Clicka per abilitarlo.<br />
				<img src="img/del.png" alt="Cancella" /> Elimina definitivamente.
			</p>
		</article>
	</section>
</body>
</html>