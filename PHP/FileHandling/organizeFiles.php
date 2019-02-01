<?php
    $rFiles = $_GET["og"];
    $oFiles = $_GET["new"];
    echo $rFiles;
    echo $oFiles;

    //$dirArray = scandir("./RandomFiles/");
    $dirArray = scandir($rFiles);
    for ($i=2; $i < count($dirArray); $i++) {
        //$structure = './OrganizedFiles/' . substr($dirArray[$i], 0,4);
        $structure = $oFiles . substr($dirArray[$i], 0,4);
        if (!mkdir($structure, 0777, true)) {
            die('Failed to create folders...');
        }else{
            echo "CREATED FOLDER " . "/" . substr($dirArray[$i], 0,4);
        }
        //$structure = './OrganizedFiles/' . substr($dirArray[$i], 0,4) . "/" . substr($dirArray[$i], 5,2);
        $structure = $oFiles . substr($dirArray[$i], 0,4) . "/" . substr($dirArray[$i], 5,2);
        if (!mkdir($structure, 0777, true)) {
            die('Failed to create folders...');
        }else{
            echo "CREATED FOLDER " . "/" . substr($dirArray[$i], 0,4) . "/" . substr($dirArray[$i], 5,2);
        }
        $newDir = $structure . "/" . substr($dirArray[$i], 5,2) . "/" . substr($dirArray[$i],7);
        $myfile = fopen($newDir,"w");
        echo $newDir;
        //if(!copy("./RandomFiles/" . $dirArray[$i],$newDir)){
        if(!copy($rFiles . $dirArray[$i],$newDir)){
            echo "sad";
        }else{
            echo "Moved File";
        }

    }

?>
<!--http://localhost:8000/organizeFiles.php?og=/hi/bye&new=google  -->
