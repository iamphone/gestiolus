<?php include "config.php"; ?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<meta HTTP-EQUIV="Refresh" content="8; url=segnala.php">
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
	<section>
		<article>
			<p class="dx">
				<acronym title="Torna indietro">
					<a href="index.php">
						<img src="img/undo.png" alt="Torna indietro" />
					</a>
				</acronym>
				<br />
				<acronym title="Chiudi finestra">
					<a href="javascript:window.close();" >
						<img src="img/close.png" alt="Chiudi finestra" />
					</a>
				</acronym>
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
