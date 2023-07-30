<?php
/*
Exp4, a typing practise program.
This is index.php, the front door PHP script.
This is copyright 2015 John Allsup (john.435@allsup.co).
You may redistribute this under the terms of the GNU GPL verison 3.
*/
$found_files = array_merge(glob("sources/*/*"));
$c = count($found_files);
if( $c < 1 ) { die("No files"); }
$idx = rand(0,count($found_files)-1);
$chosen_file = $found_files[$idx];
$source = file_get_contents($chosen_file);
include("substrs.php");
$source = substrsx($source,"make_choices_Caps2");
include("e.php");

