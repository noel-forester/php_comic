<?php
$start = $_POST['start'] - 1;
$lines = $_POST['lines'];
$fname = $_POST['filename'];
$read = file($fname);


// var_dump ($read);
for($i = 0 ; $i < $lines ; $i++){
	$data = mb_convert_encoding($read[$start],"utf-8","sjis-win");
	echo ("$data <BR>");
	
	$start = $start + 1 ;
}
?>