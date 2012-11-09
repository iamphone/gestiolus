<?php
$filename = "VERSION";
$handle = fopen($filename, "r");
$contents = fread($handle, filesize($filename));
fclose($handle);
echo "v. " . $contents;
?>