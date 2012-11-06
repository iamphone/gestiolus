<?php include "config.php"; ?>
<?php
if ($_POST[add] == "addlab"){
	$query="INSERT INTO lab VALUES('', '" . $_POST[nomelab] . "')";
	$result = mysql_query($query);
}elseif($_POST[add] == "addtecnico"){
	$query="INSERT INTO tecnici VALUES('', '" . $_POST[nometecnico] . "', '0')";
	$result = mysql_query($query);
}
if($_GET[dellab]){
	$query="DELETE FROM lab WHERE id =" . $_GET[dellab];
	$result = mysql_query($query);
}elseif($_GET[deltecnico]){
	$query="DELETE FROM tecnici WHERE id =" . $_GET[deltecnico];
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
	echo "<tr><td>" . $row[1] . "</td><td><a href=\"admin.php?dellab=" . $row[0] . "\"><img src=\"img/del.png\" alt=\"cancella\" /></a></td></tr>\n";
}
?>
							<tr>
								<td>
									<form action="admin.php" method="post">
										<input type="text" name="nomelab" />
								</td>
								<td>
										<input type="image" name="add" value="addlab" src="img/add.png" alt="add" />
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
	echo "<tr><td>" . $rowtecnici[1] . "</td><td><a href=\"admin.php?deltecnico=" . $rowtecnici[0] . "\"><img src=\"img/del.png\" alt=\"cancella\" /></a></td></tr>";
}
?>
							<tr>
								<td>
									<form action="admin.php" method="post">
										<input type="text" name="nometecnico" />
								</td>
								<td>
										<input type="image" name="add" value="addtecnico" src="img/add.png" alt="add" />
									</form>
								</td>
							</tr>
						</table>
			</p>
		</article>
	</section>
</body>
</html>