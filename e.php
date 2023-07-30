<?php
/*
Exp4, a typing practise program.
This is e.php, the HTML template.
This is copyright 2015 John Allsup (john.x43@allsup.co).
You may redistribute this under the terms of the GNU GPL verison 3.
*/
if( ! isset($source) ) {
include("e.html");
exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simple typing practice</title>
  <script src="exp5.js"></script>
  <link rel="stylesheet" href="exp5.css"/>
<?php 
$a = $source;
$a = str_replace("\r","",$a);
$lines = explode("\n",$a);
if( preg_match("/from:(.*)$/",$lines[0],$m) ) {
  array_shift($lines);
  $a = implode("\n",$lines);
  echo "<script>
const attrib='$m[1]'
</script>\n";
} else {
  echo "<script>
const attrib=null
</script>\n";
}
?>
<?php
if( isset($base_font_size) ) {
  ?><script>
    window.baseFontSize = 1.5
    </script><?php
}
?>
</head>
<body>
<?php
$a = preg_replace("/&/","&amp;",$a);
$a = preg_replace("/</","&lt;",$a);
$a = preg_replace("/>/","&gt;",$a);
echo $a; 
?>
</body>
</html>


