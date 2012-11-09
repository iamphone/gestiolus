<?php
$filename = "VERSION";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
echo "<a href=\"http://code.google.com/p/gestiolus/\">Gestiolus </a>";
echo "v. " . $contents;
?>