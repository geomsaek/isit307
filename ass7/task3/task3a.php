<?php


// Define an array to hold the files
$files = array();
$d = dir('./sort');
// Loop through all of the files:
while (false !== ($file = $d->read())) {

    if(preg_match("/^.*\.(html)$/i", $file)){
        $fpath = 'sort/'.$file;
        if (file_exists($fpath)) {
            $files[$file] = stat($fpath);
        }
    }
}
$d->close();

echo "<h1>Current files in directory 'Sort'</h1>"; ?>

<table width="100%" cellpadding="1" cellspacing="1" border="1">
    <tr>
        <th>File Name</th>
        <th>File size</th>
    </tr>
    <?php
        $temp = $files;
        $greatest = -1;
        $counter= 0;
        $name = "";
        while($counter < sizeof($files)) {

            foreach ($files as $a => $key) {
                if($key[7] > $greatest){
                    if($a != $name){
                        $name = $a;
                        $greatest = $key[7];
                    }
                }
            }

            echo "<tr>";
                echo "<td>" . $name . "</td>";
                echo "<td>" . $temp[$name][7] . " bytes</td>";
            echo "</tr>";

            $files[$name][7] = -1;
            $greatest =  -1;
            $counter++;
        }
    ?>

</table>
