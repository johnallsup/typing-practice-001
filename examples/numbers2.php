<?php
/*
Exp5, a typing practise program.
This is e.html, which presents a form to paste source text into.

This is copyright 2015-2023 John Allsup (john.x43@allsup.co).
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
  $num = rand(0,99);
  $word .= sprintf("%02d",$num);
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

