<?php

$zip = new ZipArchive;
//$res = $zip->open('/mnt/lvm/documents/books/comic/乱丸 「ゼルダの伝説」.zip');

$res = $zip->open($_POST['filename']);
for($i = 0; $i < $zip->numFiles; $i++){
    $filelist[$i] = ($zip->getNameIndex($i));
}
sort($filelist);

// var_dump ($filelist);

if ($res === TRUE) {
    $zipfname = $filelist[$_POST['pages']];
    $zipinfo = $zip -> statName($zipfname);
//    $zipfsize = $zipinfo[size];
	$contents = $zip -> getFromName($zipfname);
    echo $contents;
    $zip->close();
} else {

    echo '失敗、コード:' . $res;
}

?>