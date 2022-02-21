<?php
file_put_contents("comics.ini", $_POST['filename'] . PHP_EOL);
file_put_contents("comics.ini", $_POST['pages'] . PHP_EOL , FILE_APPEND);
file_put_contents("comics.ini", $_POST['start'] . PHP_EOL , FILE_APPEND);
file_put_contents("comics.ini", $_POST['lines'] , FILE_APPEND);
?>