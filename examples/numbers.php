<?php
/*
Exp5, a typing practice program.
This is copyright 2021 John Allsup (john.435@allsup.co).
You may redistribute this under the terms of the GNU GPL verison 3.
*/
function choice($xs) {
  $idx = rand(0,count($xs)-1);
  return $xs[$idx];
}
$words = explode(" ","a b c d e f g h i j k l m n o p q r s t u v w x y z");
$word_array = [];
for($i = 0; $i < 1024; $i++) {
  $word = choice($words);
  $num = rand(0,99999);
  $word .= $num;
  array_push($word_array,$word);
}
$lines = [];
$line = "";
foreach($word_array as $word) {
  $line .= $word;
  if( strlen($line) > 72 ) {
    array_push($lines,$line);
    $line = "";
  } else {
    $line .= " ";
  }
}
if( preg_match("/\\S/",$line) ) { 
  array_push($lines,$line);
}
$source = implode("\n",$lines);
include("e.php");

