<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Exp4, a typing practise program.
This is index.php, the front door PHP script.
This is copyright 2015 John Allsup (john.435@allsup.co).
You may redistribute this under the terms of the GNU GPL verison 3.
*/
$accs = ['â', 'ù', 'Ü', 'ñ', 'ê', 'ö', 'ô', 'ì', 'ü', 'ß', 'è', 'í', 'ë', 'Ä', 'é', 'ç', 'Ö', 'ï', 'ó', 'î', 'û', 'á', 'ò', 'ú', 'ä', 'à'];
function make_word($accs,$len = 6) {
  $t = "";
  for($i = 0; $i < $len; $i++) {
    $idx = rand(0,count($accs)-1);
    $char = $accs[$idx];
    $t .= $char;
  }
  return $t;
}
$nlines = 100;
$wpl = 5;
$source = "";
for($i = 0; $i < $nlines; $i++) {
  $line = "";
  for($w = 0; $w < $wpl; $w++) {
    $word = make_word($accs);
    $line .= $word." ";
  }
  $line = trim($line);
  $source .= "$line\n";
}
$base_font_size = 1.5;
include("e.php");

