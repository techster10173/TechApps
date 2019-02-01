<?php
// Grab all files from the desired folder
$files = glob("./OrganizedFiles/1992/01/*.*");

// Sort files by modified time, latest to earliest
// Use SORT_ASC in place of SORT_DESC for earliest to latest
array_multisort(
array_map( 'filemtime', $files ),
SORT_NUMERIC,
SORT_DESC,
$files
);

echo $files[0];
 ?>
