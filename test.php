<?php
file_put_contents("comics.ini", $filename . PHP_EOL);
file_put_contents("comics.ini", $pages . PHP_EOL , FILE_APPEND);
file_put_contents("comics.ini", $start . PHP_EOL , FILE_APPEND);
file_put_contents("comics.ini", $lines . PHP_EOL , FILE_APPEND);

?>