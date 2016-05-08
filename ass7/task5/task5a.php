<?php

$root = '/Sites/isit/ass7/task4';

echo "<h1>Directory listing for " . $root . "</h1>";

$iter = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
    RecursiveIteratorIterator::SELF_FIRST,
    RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied"
);

$paths = array($root);
foreach ($iter as $path => $dir) {
    if ($dir->isDir()) {
        echo "<p><strong>Directory: </strong>" . $path . "</p>";
        $paths[] = $path;
    }else {
        echo "<p style='padding-left:30px;'>" . $path . "</p>";
    }
}

?>