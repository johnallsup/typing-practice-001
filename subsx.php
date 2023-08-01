<?php
/*
Exp5, a typing practise program.
This is index.php, the front door PHP script.
This is copyright 2015 John Allsup (john.435@allsup.co).
You may redistribute this under the terms of the GNU GPL verison 3.
*/
$found_files = array_merge(glob("sources/*/*"));
$a = $_SERVER['QUERY_STRING'];
$match = false;
if($a && file_exists("sources/$a")) {
    $source = file_get_contents("sources/$a");
    include("substrs.php");
    $source = substrsx($source);
    include("e.php");
} else {
    echo "<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<title>Simple Typing Practice - Substring practice - incl Punctuation</title>
<link rel='stylesheet' href='exp5idx.css' />
</head>
<body>
<h1>Substring practice - including Punctuation</h1>
<p>What this particular exercise does is to take a source text, compile a list of the 
top 100 substrings for each length 2..5, and then produces a random sequence of them
for you to practice. (This is just an experimental idea I am playing with.)</p>
<h2>notes</h2>
<p>
</p>
<p>Inside the exercise, you can navigate using cursor keys, skip line with
Escape, redo line with Enter, skip spaces with Tab, and return here
with Ctrl+x.</p>
<p>It is a simple practice program, and you have to press the keys
one after another. That is it.</p>
<p>The idea, for either text or programming, is to load sample texts
or source code, and type it out. That trains your fingers not to make
mistakes.</p>
<p>It is also a good idea to learn to type using minimal finger movement.
Most people use their finger and forearm muscles way more than they need to.
This also means that things are tense when keys are struck, which results
in many small shocks going into the delicate tendons in the hand and
forearm, which is a recipe for injury.</p>
<p>Or choose an example file from the following list.</p>
<ul>";
    foreach($found_files as $file) {
        $file = substr($file,strlen("sources/"));
        echo "<li><a href='subs.php?$file'>$file</a></li>\n";
    }
    echo "</ul>
</body>
    </html>";
}
?>

