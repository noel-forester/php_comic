<?php

final class FileReader {
    function search(string $path, string $rule): array {
 
        $pattern = $path . '/' . $rule;
        return glob($pattern);
    }
 
    function create(string $path, string $rule): array {
 
        $dirs = [];
 
        foreach ($this->search($path, $rule) as $dir) {
            $basename = basename($dir);
 
            if (is_dir($dir)) {
                $dirs[$basename] =  $this->create($dir, $rule);
            } else {
                $dirs[$basename] = $dir;
            }
        }
        return $dirs;
    }
 }

function recursion(array $dirs): string {

    $li = null;
   
    foreach ($dirs as $parent => $child) {
        if (is_array($child)) {
            $li .= '<li>' . $parent . recursion($child) . '</li>';
        } else {
            $li .= '<li><a class="filename" href="#" onclick="selectfile(\'' . $child .  '\');return false;">' . $parent . '</a></li>';
        }
    }
    return '<ul>' . $li . '</ul>';
}

    $spath = '/mnt/lvm/documents/books';

    $fileReader = new FileReader();
    $dirs = $fileReader->create($spath, '*');
    /*var_dump($dirs);*/

    $result = recursion($dirs);

    $filename = 'filelist';
    file_put_contents($filename,$result);

?>