<?php

$rar_arch = RarArchive::open($_POST['filename']);
if ($rar_arch === FALSE)
    die("RAR開かないだす");

$rar_entries = $rar_arch->getEntries();
if ($rar_entries === FALSE)
    die("RARのエントリリストが取得できないだす");

$pages = $_POST['pages'] - 1 ;

$filename = $rar_entries[$pages]->getName();
if ($filename === false)
    die("RARのエントリが無いだす");

$entry = rar_entry_get($rar_arch, $filename);
if ($entry === false)
    die("RARのエントリが無いだす");
$stream = $entry->getStream();
if ($stream === false)
    die("ストリーム取れなかっただす");

    while (!feof($stream)) {
        $buff = fread($stream, $entry->getUnpackedSize());

        
        // $ext = substr($filename, strrpos($filename, '.') + 1);
        // switch($ext){
        //     case 'jpg':
        //     case 'jpeg':
        //         header('Content-type: image/jpg');
        //         break;
        //     case 'png':
        //         header('Content-type: image/png');
        //         break;
        //     case 'bmp':
        //         header('Content-type: image/bmp');
        //         break;
        //     default:
        //         die("$filename は画像じゃない気がするだす");
        // }


        if ($buff !== false)
        
            echo $buff;
        else
            die("freadに失敗しただす"); // fread のエラー
    }
$rar_arch->close();
?>