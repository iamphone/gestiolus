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
			</p>
		</article>
		<article>
			<p>
			<h2>Ricerca Guasti</h2>
			Inserisci le chiavi di ricerca<br />
			<form method="post" action="search.php">
				<input type="text" name="chiave" value="<?php echo $_POST[chiave];  ?>" />
				<input type="submit" value="cerca" />
			</form>
<?php
$chiave=$_POST[chiave];
    if (isset($chiave) == false || $chiave == "")
    {
?>
<p>Specificare un criterio di ricerca.</p>
<?
    }
    else
    {
        $arr_txt = explode(" ", $chiave);
        $sql = "SELECT * FROM guasti WHERE ";
        for ($i=0; $i<count($arr_txt); $i++)
        {
            if ($i > 0)
            {
                $sql .= " AND ";
            }
            $sql .= "(descrizione LIKE '%" . $arr_txt[$i] . "%' OR nomepc LIKE '%" . $arr_txt[$i] . "%')";
        }
        //$sql .= " AND cat_id = art_categoria ORDER BY art_timestamp DESC";
	$sql .= " AND (stato ='1') ORDER BY data_chiusura DESC";
        $query = mysql_query($sql, $link);
	//echo $sql;
        $quanti = mysql_num_rows($query);
	//echo $quanti;
        if ($quanti == 0)
        {
?>
<p>Nessun risultato!</p>
<?
        }
        else
        {
?>
				<table class="tabella">
					<tr>
						<th>Computer</th>
						<th>Ubicazione</th>
						<th>Problema Riscontrato</th>
						<th>Data Chiusura</th>
						<th>Soluzione</th>
						<th>Tecnico chiusura</th>
					</tr>
<?php
            for($x=0; $x<$quanti; $x++)
            {
                $rs = mysql_fetch_row($query);
		echo "<tr><td>$rs[1]</td><td>$rs[2]</td><td>$rs[3]</td><td>$rs[8]</td><td>$rs[6]</td><td>$rs[4]</td></tr>";
            }
        }
    }
?>
				</table>
			</p>
		</article>
	</section>
</body>
</html>
