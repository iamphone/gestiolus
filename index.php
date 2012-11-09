<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
	<p class="titolo">Gestione Interventi</p>
	<p class="menu">
		<p class="icone">
			<acronym title="Lista guasti">
				<a href="guasti.php">
					<img src="img/view.png" alt="Lista guasti" />
				</a><br />
				Lista Guasti
			</acronym>
		</p>
		<p class="icone">
			<acronym title="Segnala guasto">
				<a href="segnala.php">
					<img src="img/new.png" alt="Segnala guasto" />
				</a><br />
				Segnala<br />guasto
			</acronym>
		</p>
		<p class="icone">
			<acronym title="Impostazioni">
				<a href="admin.php" >
					<img src="img/setting.png" alt="Impostazioni" />
				</a><br />
				Impostazioni
			</acronym>
		</p>
		<p class="icone">
			<acronym title="Ricerca guasti">
				<a href="search.php" >
					<img src="img/search.png" alt="Ricerca Guasti" />
				</a><br />
				Ricerca<br />Guasti
			</acronym>
		</p>
		<p class="icone">
			<acronym title="Report Interventi">
				<a href="report.php" >
					<img src="img/stat.png" alt="Report Interventi" />
				</a><br />
				Report<br />Interventi
			</acronym>
		</p>
	</p>
	<p class="version">
	<?php include("version.php"); ?>
	</p>
</body>
</html>
