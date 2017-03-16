<?php

/*
 * for the most part all PHP variables only have
 * a single scope, this single scope spans included and
 * requred files as well
 */

//global scope
$a = 1;

function test(){
	echo $a; //reference to local scope variable
	//hence $a is undefinded variable
	//notice occurs
}

test();

//using global
$a = 1;
$b = 2;

function sum(){
	
	global $a,$b;
	$b = $a + $b;
}

sum();
echo $b;
echo "<br>";

//using $GLOBALS instead of global
$a = 1;
$b = 2;

function sum2(){
	$GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
}

sum2();
echo $GLOBALS['b'];
echo "<br>";

function test_global(){
	/*
	 * most predefined variable aren't "super" and require
	 * 'global' to be available to the functions local scope
	 */
	global $HTTP_POST_VARS;
	echo $HTTP_POST_VARS['name'];
	
	/*
	 * superglobals are available in any scope and do
	 * not require 'global', superglobals are available
	 * as of PHP 4.1.0 and HTTP_POST_VARS is now
	 * deemed deprecated
	 */
	 
	echo $_POST['name'];
}

test_global();

//static variables

function fuu(){
	static $a =0;
	echo $a;
	$a++;
}

fuu();
echo "<br>";
fuu();
echo "<br>";
fuu();
echo "<br>";

function boo(){
	static $count = 0;
	$count++;
	echo $count;
	if($count < 10){
		boo();
	}
}

boo();
echo "<br>";

//declaring static variables

function too(){
	//correct
	static $int =0;
	static $int =1;
	
	//wrong,as it is a function
	//Fatal error: 
	//Constant expression contains invalid operations
	//static $int =sqrt(121);
	
	$int++;
	echo $int;
	echo "<br>";
}

too();
too();
too();
too();
too();
too();

//REFERENCES WITH GLOBAL AND STATIC VARIABLES

class Dog{
	private $name = 'name';
}
function testglobalref(){
	$obj0 = new Dog();
	global $obj1;
	$obj1 = new Dog();
	$obj2 = &$obj1;
	var_dump($obj0);
	echo "<br>";
	var_dump($obj1);
	echo "<br>";
	var_dump($obj2);
	echo "<br>";
}

testglobalref();


?>






























