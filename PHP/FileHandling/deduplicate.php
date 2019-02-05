<?php
$rFiles = $_GET["og"];
$dir = dirname($rFiles);
    //echo $dir;
// Grab all files from the desired folder
$files = glob($dir . "/*.*");

$temp = array();

for ($i=0; $i < count($files) ; $i++) {
    if(file_get_contents($rFiles) == file_get_contents($files[$i])){
        array_push($temp, $files[$i]);
    }
}

array_multisort(
array_map('filemtime', $files ),
SORT_NUMERIC,
SORT_DESC,
$temp
);

for ($i=count($temp)-1; $i >=1 ; $i--) {
    unlink($temp[$i]);
}


 ?>

<!-- http://localhost:8000/deduplicate.php?og=./OrganizedFiles/1992/01/islandcoast.txt -->
