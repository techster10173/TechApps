<?php
//$dirArray = scandir('./RandomFiles/');
$dirArray = scandir(getcwd());
print_r($dirArray);
$monthArray = array("January", "Febuary", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

for ($i=2; $i < count($dirArray); $i++) {
    if(intval(substr($dirArray[$i], 0,4)) > 1990){
        $to = substr($dirArray[$i],0,4) . "-" . strval($monthArray[intval(substr($dirArray[$i], 5,2))]) . " - " . substr($dirArray[$i],7);
        if(!rename($dirArray[$i], $to))
        {
            echo $dirArray[$i];
            echo $to;
        }
    }
}
 ?>
