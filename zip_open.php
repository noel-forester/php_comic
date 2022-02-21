<?php

$zip = new ZipArchive;

$res = $zip->open($_POST['filename']);
for($i = 0; $i < $zip->numFiles; $i++){
    $filelist[$i] = ($zip->getNameIndex($i));
}

sort($filelist);

if ($res === TRUE) {
    $zipfname = $filelist[$_POST['pages']];
    $zipinfo = $zip -> statName($zipfname);
	$contents = $zip -> getFromName($zipfname);
    echo $contents;
    $zip->close();
} else {
    
    echo '失敗、コード:' . $res;
}

?>