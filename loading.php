<?php
include "config.php";
if(isset($_POST['nomepc']) && isset($_POST['ubicazione']) && isset($_POST['guasto']) && isset($_POST['nome'])){
	$guasto=addslashes(strip_tags($_POST['guasto']));
	$nomepc=addslashes(strip_tags($_POST['nomepc']));
	$nome=addslashes(strip_tags($_POST['nome']));
	$ubicazione=addslashes(strip_tags($_POST['ubicazione']));	
	$query="INSERT INTO guasti VALUES('', '$nomepc', '$ubicazione', '$guasto', '$nome', '" . date('Y-m-d') . "', '', '', '', '0')";
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
		<title><?php echo $title; ?></title>
		<style>
		<?php include 'style.css'; ?>
		</style>
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


