<?php
/*
Exp5, a typing practise program.
This is e.html, which presents a form to paste source text into.

This is copyright 2015-2023 John Allsup (john.x43@allsup.co).
You may redistribute this under the terms of the GNU GPL verison 3.
*/
class Dict {
  function __construct() {
    $this->data = array();
  }
  function inc($frag) {
    if( !array_key_exists($frag,$this->data) ) {
      $this->data[$frag] = 0;
    }
    $this->data[$frag]++;
  }
  function get($frag) {
    if( !array_key_exists($frag,$this->data) ) {
      return 0;
    }
    return $this->data[$frag];
  }
  function frags() {
    arsort($this->data);
    return array_keys($this->data);
  }
}

function frags($word,$n) {
  $l = mb_strlen($word,"UTF-8");
  if( $n > $l )  return [];
  $arr = [];
  for($i = 0; $i < $l-$n+1; $i++) {
    array_push($arr,mb_substr($word,$i,$n,"UTF-8"));
  }
  return $arr;
}

class Substrs {
  function __construct($n,$words) {
    $this->d = new Dict();
    foreach($words as $word) {
      $frags = frags($word,$n);
      foreach($frags as $frag) {
        $this->d->inc($frag);
      }
    }
  }
  function top($n) {
    $frags = $this->d->frags();
    $topn = array_slice($frags,0,$n);   
    return $topn;
  }
}


function make_choices($arr,$n) {
  $o = [];
  for($i=0; $i<$n; $i++) {
    $r = rand(0,count($arr)-1);
    array_push($o,$arr[$r]);
  }
  return $o;
}

function make_choices_Caps1($arr,$n) {
  $o = [];
  for($i=0; $i<$n; $i++) {
    $r = rand(0,count($arr)-1);
    $s = rand(0,10);
    $w = $arr[$r];
    if( $s < 5 ) {
      $w = ucfirst($w);
    }
    array_push($o,$w);
  }
  return $o;
}

function make_choices_Caps2($arr,$n) {
  $o = [];
  for($i=0; $i<$n; $i++) {
    $r = rand(0,count($arr)-1);
    $s = rand(0,10);
    $w = $arr[$r];
    if( $s < 2 ) {
      $w = mb_strtoupper($w,"UTF-8");
    } else if( $s < 5 ) {
      $w = ucfirst($w);
    }
    array_push($o,$w);
  }
  return $o;
}

function only_alphanumeric($source) {
  //$a = preg_replace("/[^a-zA-Z0-9]/"," ",$source);
  $a = preg_replace("/[^\\p{L}]/u"," ",$source);
  $a = preg_replace("/\s+/"," ",$a);
  $a = mb_strtolower($a,"UTF-8");
  return $a;
}

function only_verbatim($source) {
  $a = preg_replace("/\s+/u"," ",$source);
  $a = mb_strtolower($a,"UTF-8");
  return $a;
}

class SubStrEx {
  function __construct() {
    $this->choicefn = "make_choices";
    $this->processfn = "only_alphanumeric";
    $this->lengths = [2,3,4,5,6,7];
    $this->outputSize = 1024;
    $this->topSize = 100;
  }
  function process($source) {
    if( preg_match("/from:(.*)$/m",$source,$m) ) {
      $source = substr($source,strlen($m[0])+1);
    }
    $a = ($this->processfn)($source);
    $b = explode(" ",$a);
    $ss = [];
    foreach($this->lengths as $length) {
      array_push($ss,new Substrs($length,$b));
    }
    $tops = [];
    foreach($ss as $subs) {
      $tops = array_merge($tops,$subs->top($this->topSize));
    }
    $choices = ($this->choicefn)($tops,$this->outputSize);
    $joined = implode(" ",$choices);
    $wrapped = wordwrap($joined);
    return $wrapped;
  }
}

function substrs($source,$choicefn="make_choices") {
  $s = new SubStrEx();
  $s->choicefn = $choicefn;
  $t = $s->process($source);
  return $t;
}
function substrsx($source,$choicefn="make_choices") {
  $s = new SubStrEx();
  $s->choicefn = $choicefn;
  $s->processfn = "only_verbatim";
  $t = $s->process($source);
  return $t;
}
/*
function substrs($source,$choicefn="make_choices") {
  $a = preg_replace("/[^a-zA-Z0-9]/"," ",$source);
  $a = preg_replace("/\s+/"," ",$a);
  $a = strtolower($a);
  $b = explode(" ",$a);
  $s2 = new Substrs(2,$b);
  $s3 = new Substrs(3,$b);
  $s4 = new Substrs(4,$b);
  $s5 = new Substrs(5,$b);
  $t2 = $s2->top(100);
  $t3 = $s3->top(100);
  $t4 = $s4->top(100);
  $t5 = $s5->top(100);
  $all = array_merge($t2,$t3,$t4,$t5);
  $choices = $choicefn($all,1024);
  $joined = implode(" ",$choices);
  $wrapped = wordwrap($joined);
  return $wrapped;
}
*/
