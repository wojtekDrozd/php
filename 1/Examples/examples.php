<?php

//NULL
//there is only one value of type null and that is
//the case-insensitive constant NULL;

$null = NULL;
$var = null;
$var = 8;
unset($var);

var_dump($null);
print '<br>';
var_dump($var);
print '<br>';

$var = 'bulldog';
var_dump($var);
print '<br>';

var_dump(is_null($var));

echo is_bool($var);	
?>
















