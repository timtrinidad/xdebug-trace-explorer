<?php

ini_set('memory_limit', '2048M');

include 'XtExplorer.php';

// scan xdebug trace output dir for files
$traceFolder = ini_get('xdebug.trace_output_dir');
$files  = scandir($traceFolder);
$traceFiles = [];
foreach ($files as $f) {
    if ($f != '.' && $f != '..') $traceFiles[] = $f;
}

// also accept custom path
$traceFile = isset($_GET['filePath'])?$_GET['filePath']:'trace.sample.xt';
$maxLine = isset($_GET['maxLine'])?$_GET['maxLine']:10000;
$maxLevel = isset($_GET['maxLevel'])?$_GET['maxLevel']:10;


if ($traceFile != '') {
    $traceExplorer = new XtExplorer($traceFile, $maxLine, $maxLevel);
}

include 'view.php';