<?php
/*
Consider a guessing game in which a player tries to guess a hidden word. The
hidden word contains only capital letters and has a length known to the player.
A guess contains only capital letters and has the same length as the hidden
word.

After a guess is made, the player is given a hint that is based on a comparison
between the hidden word and the guess. Each position in the hint contains a
character that corresponds to the letter in the same position in the guess.
The following rules determine the characters that appear in the hint.

1. If the letter in the guess is also in the same position in the hidden word,
the corresponding character in the hint is the matching letter.

2. If the letter in the guess is also in the hidden word, but in a different
position, the corresponding character in the hint is "+".

3. If the letter in the guess is not in the hidden word, the corresponding
character in the hint is "*".

The HiddenWord class will be used to represent the hidden word in the game. The
hidden word is passed to the constructor. The class contains a method, getHint,
that takes a guess and produces a hint.

For example, suppose the variable $puzzle is declared as follows.

  $puzzle = new HiddenWord("HARPS");

The following table shows several guesses and the hints that would be produced.

  Call to getHint               String returned
  -------------------------     ---------------
  $puzzle->getHint("AAAAA")     "+A+++"
  $puzzle->getHint("HELLO")     "H****"
  $puzzle->getHint("HEART")     "H*++*"
  $puzzle->getHint("HARMS")     "HAR*S"
  $puzzle->getHint("HARPS")     "HARPS"

Write the complete HiddenWord class, including any necessary instance variables,
its constructor, and the method, getHint, described above. You may ssume that
the length of the guess is the same as the length of the hidden word.
*/

class HiddenWord{
    private $word;
    public function __construct($n){
        $this->word = $n;
    }
    public function getHint($hint){
        $hintArr = str_split($hint);
        $wordArr = str_split($this->word);

        $returnArr = array();

        for($i = 0; $i < count($hintArr); $i++){
            if(in_array($hintArr[$i],$wordArr)){
                if($hintArr[$i] == $wordArr[$i]){
                    $returnArr[$i] = $hintArr[$i];
                }else{
                    $returnArr[$i] = "+";
                }
            }else{
                $returnArr[$i] = "*";
            }

        }
        echo implode("",$returnArr);
}
}

// Write code to test your HiddenWord class below here

$puzzle = new HiddenWord("HARPS");

//$puzzle->getHint("AAAAA");
//$puzzle->getHint("HELLO");
$puzzle->getHint("HEART");
//$puzzle->getHint("HARMS");
//$puzzle->getHint("HARPS");


?>
