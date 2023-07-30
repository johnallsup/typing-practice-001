<?php
/*
Exp5, a typing practice program.
This is copyright 2021 John Allsup (john.435@allsup.co).
You may redistribute this under the terms of the GNU GPL verison 3.
*/
error_reporting(E_ALL);
ini_set('display_errors', '1');

$line_length = 48;
if( isset($_GET['w']) ) { $line_length = intval($_GET['w']); }
$line_length = min(max(24,$line_length),120);

$chosen_file = null;
$qs = $_SERVER['QUERY_STRING'];
if( preg_match('/\.\./',$qs) ) {
  http_response_code(400);
  echo "Path cannot have .. in it";
  exit();
}
if( $qs !== "" && file_exists("sources/$qs")) {
  $chosen_file = "sources/$qs";
}
function choice($xs) {
  $idx = rand(0,count($xs)-1);
  return $xs[$idx];
}
if( is_null($chosen_file) ) {
  $found_files = array_merge(glob("sources/*/*"));
  $c = count($found_files);
  if( $c < 1 ) { die("No files"); }
  $chosen_file = choice($found_files);
}
$input = file_get_contents($chosen_file);
$words = preg_split("/\\s+/",$input);
$word_array = [];
for($i = 0; $i < 1024; $i++) {
  $word = choice($words);
  array_push($word_array,$word);
}
$lines = [];
$line = "";
foreach($word_array as $word) {
  $line .= $word;
  if( strlen($line) > $line_length ) {
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

