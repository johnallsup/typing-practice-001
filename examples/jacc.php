<?php
/*
Exp5, a typing practise program.
This is e.html, which presents a form to paste source text into.

This is copyright 2015-2023 John Allsup (john.x43@allsup.co).
You may redistribute this under the terms of the GNU GPL verison 3.
*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* This is intended for practising accents (with WinCompose in my case) */
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

