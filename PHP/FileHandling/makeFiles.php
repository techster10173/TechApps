<?php

    function randWord(){
        $arrWords = file("words.txt");
        return $arrWords[rand(0,sizeof($arrWords)-1)];
    }
    function randYear(){
        return strval(rand(1990,2018));
    }
    function randMonth(){
        return strval(rand(1,12));
    }
    function startFile(){
        $fileName = randYear() . "-" . randMonth() . randWord() . randWord();
        $myfile = fopen($fileName,"w");

        for ($i=0; $i < rand(5,100); $i++) {
            fwrite($myfile,randWord());
        }
        fclose($myFile);
    }

    startFile();
?>
