<?php

$str = 'siemanson';

//Single quoted

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



//double quoted

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


//Here doc

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

var_dump(array(<<<EOD
foobar!
EOD
));











































?>