<?php
//http://php.net/manual/en/language.types.array.php

//a simple array example
$array = array(
		
		"foo" => "bar",
		"bar" => "foo",
);

var_dump($array);
print '<br>';

//as of PHP 5.4

$array = [
		
	"foo" => "bar",
	"bar" => "foo",
];

var_dump($array);
print '<br>';

$array = [
		
		'bro' => 'tip',
		'golden' => 1,
		"funny" => true,
		false => 0,
		
];

echo "<pre>" , var_dump($array) , "</pre>";

$array[] = 9;
$array[12] = 'protein';
$array[] = false;

echo "<pre>" , var_dump($array) , "</pre>";



print '<br><br>';

//type casting and overwriting example
$ar = array(
		
		1 => "a",
		"1" => 'b',
		1.5 => "c",
		true => "d",
);

var_dump($ar);
print '<br><br>';

$ar[] = 'zorro';
var_dump($ar);
print '<br><br>';

//arrays without keys

$aar = array('keys','mobile','wallet');
print_r($aar);
print '<br>';
var_dump($aar);
print '<br><br>';


//keys not on all elements

$array = array(
	
		"a",
		"n",
		6 => "c",
		"d",
);

var_dump($array);
print '<br><br>';


//accessing array elements - [] {} interchangeably

$array = array(
		
		"foo" => "bar",
		24 => 42,
		"moolti" =>array(
				"dymensional" => array(
						"array"=>"pooh"
				)
		)
);

var_dump($array['foo']);
print '<br><br>';
var_dump($array['moolti']);
print '<br><br>';
var_dump($array{'moolti'});
print '<br><br>';
var_dump($array['moolti']['dymensional']);
print '<br><br>';
var_dump($array{'moolti'}['dymensional']{'array'});
print '<br><br>';

//array dereferencing

function getArray(){
	return array(1,2,3);
}

$secondElement = getArray()[1];
var_dump($secondElement);
print '<br><br>';

//creating/modifying with square brackets sytax

//key may be integer or string
//value may be any value of any type
$createdArray['key'] = 'value'; //this is legal but discouraged    
$createdArray[] = 3;
$createdArray[3] = 'water';
$createdArray[] = 222;

var_dump($createdArray);
print '<br><br>';

//ARRAY OPERATIONS

$araj = array(5 =>1, 12 =>2);
var_dump($araj);
print '<br><br>';

//adding a new element with default key
$araj[] = 56;
var_dump($araj);
print '<br><br>';

//adding a new element with key 'x'
$araj['x'] = 42;
var_dump($araj);
print '<br><br>';

//removing the element from the array
unset($araj[5]);
var_dump($araj);
print '<br><br>';

//deleting the whole array
unset($araj);
//var_dump($araj); -> results in Notice; undefined variable
print '<br><br>';


//INDEXING AND REINDEXING

echo "Indexing and reindexing";
print '<br><br>';

//create a simple array
$arra = array(1,2,3,4,5);
print_r($arra);
print '<br><br>';

//now delete every item but leave the array itself intact
foreach($arra as $i => $value){
	unset($arra[$i]);
}

print_r($arra);
print '<br><br>';

//append an item (note that the new key is 5, instead of 0)
$arra[] = 6;
print_r($arra);
print '<br><br>';

//reindex
$arra = array_values($arra);
$arra[] = 7;
print_r($arra);
print '<br><br>';


//a simple array, var_dump vs print_r

$arr = array(1,2,3,4,5);
print '<br><br>';
echo '<br><b>$arr = array(1,2,3,4,5);</b><br>';
echo '<br>var_dump($arr):<br>';
echo "<pre>" , var_dump($arr) , "</pre>";

echo '<b>print_r($arr):</b><br>';
echo "<pre>" , print_r($arr) , "</pre>";


//ARRAY FUNCTIONS

$a = array(1 => 'one', 2 => 'two',3=>'three');
unset($a[2]);
print_r($a);
print '<br><br>';

$b = array_values($a);
print_r($b);
print '<br><br>';
var_dump($b);
print '<br><br>';

//ARRAYS DO'S AND DON'TS
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('html_errors',false);
//simple array
$array = array(1,2);
$count = count($array);
for ($i = 0; $i <$count; $i++){
	echo "<br>Checking $i: <br>";
	echo "Good: " . $array[$i] . "<br>";
	echo "Good: {$array[$i]}<br>";
}
print '<br><br>';
//the another example of quoted/unquoted keys

error_reporting(E_ALL);
$arr = array('fruit'=>'apple','veggie'=> 'carrot' );

//correct:
print $arr['fruit'];
print '<br>';
print $arr['veggie'];
print '<br>';

//incorrect:
print $arr[fruit];
print '<br>';

//this define constant to demonstrate what's going on,
//the value vegie is assigned to a constant named fruit
define('fruit','veggie');

//the difference:
print $arr['fruit'];
print '<br>';
print $arr[fruit];
print '<br>';

//the follwing is okay as it's inside a string;
//constants are not looked for within strings so no
//E_NOTICE occurs here
print "Hello $arr[fruit]";
print '<br>';

//with one exception: braces surrounding arrays within 
//strings allows constants to be interpreted
print "Hello {$arr[fruit]}";
print '<br>';
print "Hello {$arr['fruit']}";
print '<br>';

//concatenation is another option
print "Hello " . $arr['fruit'];
print '<br>';

//CONVERTING TO ARRAY

$i = 7;
$ia = (array) $i;
var_dump($ia);
print '<br><br>';
$ia = array($i);
var_dump($ia);
print '<br><br>';

$f = 7.77;
$fa = (array) $f;
var_dump($fa);
print '<br><br>';
$fa = array($f);
var_dump($fa);
print '<br><br>';

$s = 'Kleo-Donaran';
$sa = (array) $s;
var_dump($sa);
print '<br><br>';
$sa = array($s);
var_dump($sa);
print '<br><br>';

$b = TRUE;
$ba = (array) $b;
var_dump($ba);
print '<br><br>';
$ba = array($b);
var_dump($ba);
print '<br><br>';



print '<br><br>';
class A {
	private $A =1; 
}
class B extends A {
	private $A =2;
	public $AA=3;
}

var_dump((array) new A());
print '<br><br>';
var_dump((array) new B());
print '<br><br>';


//array as very versatile type

$features = array (
		
	'color' => 'red',
	'taste' => 'delish',
	'shape' => 'round',
	'name' => 'apple',
		4
);

var_dump($features);
print '<br><br>';

//more examples

//array as (property-)map
$map = array(
	'version' => 4,
	'OS' => 'Linux',
	'lang' => 'english',
	'short_tags' => true
);

var_dump($map);
print '<br><br>';


//strictly, numerical keys
$numbers = array(7,8,0,234,-20);
var_dump($numbers);
print '<br><br>';

$result = [45,55,-1,-2,3];
var_dump($result);
print '<br><br>';

$switching = array(
		10,
		5 => 6,
		3 => 7,
		'a' => 4,
		11,
		'8' => 2,
		'02' => 77,
		0 => 12,//the value of 10 will be overwritten
);
echo "<pre>",var_dump($switching),"</pre>";
print '<br><br>';

//empty array
$empty = array();
var_dump($empty);
print '<br><br>';

//COLLECTION

$colors = array('red','blue','green','yellow');
foreach($colors as $color){
	echo "Do you like $color?<br>";
}
print '<br><br>';

//changing element in the loop
//changing the values of the array directly
//is possible by passing them by reference: &

foreach($colors as &$color){
	$color = strtoupper($color);
}

unset($color);
print_r($colors);
print '<br><br>';
var_dump($colors);
print '<br><br>';

//one-based index
$firstquarter = array(1=>'January', 'February','March');
print_r($firstquarter);
print '<br><br>';



$notes = [6,3,4,63,2,44,56,34,56,34,1,5,73];
print_r(array_count_values($notes));
print '<br><br>';
sort($notes);
print_r($notes);
print '<br><br>';


//recursive and multi-dimensional arrays
$fruits = array ( "fruits" => array ( "a" => "orange",
										"b" => "banana",
										"c" => "apple"),
					"numbers" => array (1,2,3,4,5,6),
					"holes" => array ("first", 5 => "second","third")
		
);

//how to adress the array below:
echo $fruits["holes"][5];
print '<br><br>';
echo $fruits['fruits']["a"];
print '<br><br>';
unset($fruits["holes"][0]);

var_dump($fruits);
print '<br><br>';

//create a new multi-dimensional array
$juices['apple']['green'] ='good';
var_dump($juices);
print '<br><br>';

//array assignment always involves value copying, use reference operator
//to copy an array by reference

$arr1 = array(2,3);
$arr2 = $arr1;
$arr2[] =4; //$arr2 is changed but $arr1 is still (2,3)
var_dump($arr1);
print '<br><br>';
var_dump($arr2);
print '<br><br>';

$arr3 = &$arr1;
$arr3[] = 8;//now $arr1 and $arr3 are the same
var_dump($arr1);
print '<br><br>';
var_dump($arr3);
print '<br><br>';
?>















































