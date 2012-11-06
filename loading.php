<?php
include "config.php";
if(isset($_POST['nomepc']) && isset($_POST['ubicazione']) && isset($_POST['guasto']) && isset($_POST['nome'])){
	$guasto=addslashes($_POST['guasto']);
	$nomepc=addslashes($_POST['nomepc']);
	$nome=addslashes($_POST['nome']);	
	$query="INSERT INTO guasti VALUES('', '$nomepc', '$_POST[ubicazione]', '$guasto', '$nome', '" . date('Y-m-d') . "', '', '', '', '0')";
	if (!$link) {
   		die('Could not connect: ' . mysql_error());
	}else{
		$result = mysql_query($query);
		if (!$result) {
    			die('Invalid query: ' . mysql_error());
		}
	}
	mysql_close($link);
}	
?>
<!DOCTYPE html> 
<html lang="it"> 
	<head> 
		<meta charset=utf-8> 
		<meta HTTP-EQUIV="Refresh" content="<?php echo rand(1,3); ?>; url=add.php">
		<title><?php echo $title; ?></title></head>
		<link rel="stylesheet" type="text/css" media="screen" href="style.css" />
	</head>
<body>
	<section>
		<article>
			<p>
				<img src="img/loading.gif" alt="Attendere prego" />
				Attendere prego...
			</p>
		</article>
	</section>
</body>
</html>


