<?php
    $rFiles = $_GET["og"];
    $dir = dirname($rFiles);
    //echo($dir);

    for ($i=0; $i <rand(0,$_GET["number"]) ; $i++) {
        $mew = substr(strrchr($rFiles, "/"), 1);
        //echo $mew;
        $newFile = $dir . "/" . basename($mew,".txt") . " (" . strval($i+1) . ").txt";
        echo $newFile;
        $myfile = fopen($newFile,"w");
        if(!copy($rFiles,$newFile)){
        echo "sad";
        }else{
            //echo "Moved File";
        }
    }
?>
<!-- http://localhost:8000/PHP/FileHandling/randomCopies.php?og=./OrganizedFiles/1992/01/islandcoast.txt&number=10 -->
