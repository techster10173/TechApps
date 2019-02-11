<?php

//echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//echo '<img src= .$target_file. />';
//echo "this the gallery";

function deleteImage(){
    echo "working";
}

function renameImage(){
  header('Location: renameImage.php');
}


$files = glob("uploadedImages/*.*");

for ($i=0; $i<count($files); $i++) {
    $image = $files[$i];
    //echo "it's working b";
    //print $image ."<br />";
    echo '<img src="'.$image .'"  />'."<br />";
    echo '<button type="button" onclick = "deleteImage()" id= $image>Delete</button>';
    echo '<button type="button" id= $image>Rename</button>'."<br /><br />";
}



 ?>
<html>
<body>




</body>
</html>
