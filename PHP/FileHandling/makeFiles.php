<?php

    function randWord(){
        $arrWords = file("words.txt");
        return $arrWords[rand(0,sizeof($arrWords)-1)];

    }
    function randYear(){
        return strval(rand(1990,2018));
    }
    function randMonth(){
        $temp = rand(1,12);
        if($temp < 10){
            return "0" . strval($temp);
        }else{
            return strval($temp);
        }
    }
    function startFile(){
        $fileName = randYear() . "-" . randMonth() . trim(randWord()) . trim(randWord()) . ".txt";
        var_dump($fileName);

        $myfile = fopen($fileName,"w");

        for ($i=0; $i < rand(5,100); $i++) {
            fwrite($myfile,randWord());
        }
    }

    startFile();
?>
