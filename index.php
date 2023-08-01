<?php
/*
Exp5, a typing practise program.
This is e.html, which presents a form to paste source text into.

This is copyright 2015-2023 John Allsup (john.x43@allsup.co).
You may redistribute this under the terms of the GNU GPL verison 3.
*/
/*
Put source files in e.g. sources/mystuff/astory.txt.
Alternatively modify the $found_files = ... line to your taste.
*/
$found_files = array_merge(glob("sources/*/*"));
$a = $_SERVER['QUERY_STRING'];
$match = false;
if($a && file_exists("sources/$a")) {
    $source = file_get_contents("sources/$a");
    include("e.php");
} else {
    echo "<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'/>
<title>Simple Typing Practice - Index</title>
<link rel='stylesheet' href='exp5idx.css' />
</head>
<body>
<h1>See also</h1>
<p><a href='subs.php'>common substring practice</a></p>
<p><a href='subsc.php'>common substring practice With Some Caps</a></p>
<p><a href='subsca.php'>common substring practice With Some Caps and ALL CAPS</a></p>
<p><a href='subsx.php'>common substring practice and punctuation</a></p>
<p><a href='subscx.php'>common substring practice With Some Caps and punctuation</a></p>
<p><a href='subscax.php'>common substring practice With Some Caps and ALL CAPS and punctuation</a></p>
<h1>About</h1>
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
<p>Source code is here: <a href='exp5.tar.gz'>exp5.tar.gz</a></p>
<p>Insert your own source text here: <a href='e.html'>e.html</a></p>
<p>Or choose an example file from the following list.</p>
<ul>";
    foreach($found_files as $file) {
        $file = substr($file,strlen("sources/"));
        echo "<li><a href='index.php?$file'>$file</a></li>\n";
    }
    echo "</ul>
</body>
    </html>";
}
?>

