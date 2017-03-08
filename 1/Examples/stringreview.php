<?php

$str = 'siemanson';

//----------single quoted

echo 'this is a simple string'.'<br>';

echo 'you can also have embedded newlines in
		strings this way as it is
		okay to do
		so <br>';

echo 'Arnold once said "I\'ll be back" <br>';

echo 'You deleted C:\\*.*? <br>';

echo 'You deleted C:\*.*? <br>';

echo '$str <br>';

echo 'This will not expand: \n a newline'.'<br>';

echo 'Variables do not $expand $either'.'<br><br>';



//---------double quoted

echo "this is simple string <br>";

echo "you can
as well
have multiline string, how
		cool
		is that?<br>";

echo "Arnold once said \"I'll be back\" <br>";

echo "You deleted C:\\*.*? <br>";

echo "You deleted C:\*.*? <br>";

echo "Variables expand as here: '$str' instead of \$str 
as above in single quoted <br>";


//-----------Here doc

echo <<<EOT
<br>
this is example

of

here doc <br>

EOT;

class foo {
	public $bar = <<<EOT
			
bar
			
EOT;
	
	public static $snake =<<<EOT
	that' a fucking long snake 
EOT;
}
	
echo (new foo())->bar;
echo '<br>';

echo foo::$snake;

$newsnake = foo::$snake;

echo <<<EOT
<br>
just another 
heredoc exmple, you can expand variables: $newsnake
EOT;


echo "<br>";

$str = <<<EOD
Example of a string
spanning multiple lines
using heredoc syntax.
EOD;

echo $str;

echo "<br>";

class boo {
	public $bar;
	public $boo;
	
	function boo(){
		$this->boo = 'Boo';
		$this->bar = array('Bar1', 'Bar2','Bar3');
	}
}

$boo = new boo();
$name = 'MyName';

echo <<<EOT

My name is "$name". I am printing some $boo->boo.
Now, I am printing some {$boo->bar[1]}.
This should print a capital 'A': \x41
EOT;

echo "<br>";

//heredoc in arguments

var_dump(array(<<<EOD
foobar!
EOD
));

echo "<br>";

//heredoc to initialize static values

function tfuu(){
	
	static $bar = <<<LABEL
bar: static variable initialized in heredoc
LABEL;
	
	return $bar;
}
	
class fuu {
	
	const BAR = <<<FOOBAR
BAR: constant variable initialized in heredoc
FOOBAR;
	
	public $baz = <<<FOOBAR
baz: class property initialized in heredoc
FOOBAR;
}
	

echo tfuu();

echo "<br>";

echo fuu::BAR;
echo "<br>";

echo (new fuu())->baz;
echo "<br>";


//heredoc opening indetifier may optionally be enclosed
//in double quotes

echo <<<'FOOBAR'
Hello from heredoc with id in " "!
FOOBAR;

echo "<br>";

//-----------Now docs

//id always enclosed in single quotes

$str = <<<'EOD'
Example of string
spanning multiple lines 
using NOWDOC syntax;
EOD;

echo $str;
echo "<br>";

/*More complex exmaple with variables.*/

class too{
	public $too;
	public $bar;
	
	function __construct(){
		$this->too = 'Too';
		$this->bar = array('Bar1','Bar2','Bar3');
	}
}

$too = new too();

echo <<<'EOT'
My na me is "$name". I am printing some $too->too.
Now, I am printing some {$too->bar[1]}.
This should NOT print a capital 'A': \x42
EOT;

echo "<br>";

//nowdoc in static data example

class buu{
	public static $bar = <<<'EOT'
			bar 
EOT;
	public static $far = <<<'EOT'
bar
EOT;
	
}

$buu = new buu();
echo "<br>";

echo buu::$bar;
echo "<br>";

echo buu::$far;
echo "<br>";

$str1 = buu::$bar;
$str2 = buu::$far;

//white spaces are included in a string!
echo strlen($str1);
echo "<br>";

//to avoid white spaces start a string in a first column of the new line
echo strlen($str2);
echo "<br>";


//--------Variable parsing - simple syntax

$fruit = "apple";

echo "He drank some $fruit juice";
echo "<br>";

//Notice: Undefined variable: fruits in /opt/lampp/htdocs if you do:
//echo "He drank some juice made of $fruits";

echo "He drank some juice made of ${fruit}s";
echo "<br>";


//array example for simple syntax

$juices = array("apple", "orange", "koolaid1" => "purple");

echo "He drank some $juices[0] juice.";
echo "<br>";

echo "He drank some $juices[1] juice.";
echo "<br>";

echo "He drank some $juices[koolaid1] juice.";
echo "<br>";

class people{
	public $john = "John Smith";
	public $jane = "Jane Smith";
	public $robert = "Robert Paulsen";
	public $smith = "Smith";
}

$people = new people();

echo "$people->john drank some $juices[0] juice.";
echo "<br>";

echo "$people->john than said hello to $people->jane.";
echo "<br>";

echo "$people->robert greeted the two {$people->smith}s.";
echo "<br>";


//as od PHP 7.1.0 also negative indices are supported
$array = [-3 => 'foo'];
echo "The element at index -3 is $array[-3].";
echo "<br>";



//-------Complex (curly) syntax


error_reporting(E_ALL);

$mood = 'fantastic';

echo "This is { $mood}";
echo "<br>";

echo "This is {$mood}";
echo "<br>";

class Square {
	public $width = 100;
}

$square = new Square();
echo "This square is {(new Square())->width}cm broad";
echo "<br>";

echo "This square is {$square->width}cm broad";
echo "<br>";

$arr = ['key' => 'value'];
//quoted keys only work using the curly brace syntax
echo "This works: {$arr['key']}";
echo "<br>";

$arr = [1,1,1,1, array(2,2,2,2)];
echo "This works as well: {$arr[4][3]}";
echo "<br>";

$arr = [1,11,111,1111, 'foo' => array(2,22,222,2222)];
echo "Keys always should be quoted: {$arr['foo'][0]}";
echo "<br>";

echo "Also that works: ".$arr['foo'][2];
echo "<br>";

$name = 'name';
echo "The value of the var named $name is {${$name}}";
echo "<br>";




















































?>