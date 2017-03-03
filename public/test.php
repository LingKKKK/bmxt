<?php

$dir = './';

ini_set('display_errors', 1);
echo json_encode(get_fileinfo('./'));
exit();

function get_fileinfo($file){
 
    if (! is_dir($file)) {
        return $file;
    }

    $filedir = [];
    $dp = dir($file);
    while (false !== ($f = $dp->read())) {
        if (is_file($f)) {
            $bname = basename($f);
            $rname = realpath($f);

            $filedir[$bname]['rname'] = $rname;
            $filedir[$bname]['md5'] = hash_file('md5', $rname);
            $filedir[$bname]['sha256'] = hash_file('sha256', $rname);
        }
    }

    return $filedir;

}