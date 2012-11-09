<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<meta HTTP-EQUIV="Refresh" content="5; url=guasti.php">
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
	<section>
		<article>
			<p class="dx">
				<?php include("menu.php"); ?>
			</p>
		</article>
		<article>
			<p>
				<img src="img/ok.png" alt="Guasto segnalato" />
				Guasto segnalato correttamente. Uno dei tecnici interverrà al più presto.
			</p>
		</article>
	</section>
</body>
</html>
