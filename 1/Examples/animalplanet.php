<?php

abstract class Animal {
	
	use BasicNeedsUtilites;
	
	private $name;
	private $age;
	private $id;
	private $food;
	public static $nextID = 1;
	public static $animalCount = 0;
	public static $animals = array();
	
	public function __construct($name,$age,$food){
		$this->name=$name;
		$this->age = $age;
		$this->food = $food;
		$this->id = self::$nextID;
		self::$nextID++;
		self::$animalCount++;
		array_push(self::$animals, $this);
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function getAge(){
		return $this->age;
	}
	
	public function getID(){
		return $this->id;
	}
	
	public function getFood(){
		return $this->food;
	}
	
	public function __toString(){
		return "<br><br>ID: ".$this->getID()."<br>Name: ".$this->getName()."<br>Age: ".$this->getAge();
	}
	
	abstract function move();
	
}

class Bird extends Animal {
	
	private $flyable;
	
	public function __construct($name,$age,$food,$flyable){
		parent::__construct($name,$age,$food);
		$this->flyable = $flyable;
	}
	
	public function isFlyable(){
		if($this->flyable)
			return "true";
		else 
			return "false";
	}
	
	public function move(){
		if($this->flyable)
			print $this->getName()." flys";
		else
			print $this->getName(). " can't fly";
	}
	
	public function eat(){
		print parent::eat()." like a crazy ".get_class($this);
	}
	
	public function __toString(){
		return parent::__toString()."<br>Flyable: ".$this->isFlyable();
	}
}

class Eagle extends Bird implements Hunter {
	
	use HuntUtilities;
	
}

class Dog extends Animal {
	
	use LoveUtilities;
	
	
	public function bark(){
		echo $this->getName(). " is barking like a lunatic ";
	}
	
	public function move(){
		echo $this->getName()." is running around like a wheels on the bus";
	}
}

class Cat extends Animal implements Hunter,Lovable{
	use HuntUtilities,LoveUtilities;
	
	public function move(){
		echo get_class($this)." ".$this->getName(). " is walking with grace ";
	}
	
	public function kiss(){
		echo get_class($this)." ".$this->getName(). " is kissing itself ";
	}
}

interface Hunter{
	public function hunt($tool);
}

interface Lovable {
	public function hug();
	public function kiss();
}

trait HuntUtilities{

	public function hunt($tool){
		print $this->getName(). " hunts furiously with a $tool";
	}
	
	public function prepareAttack(){
		echo $this->getName(). " is getting ready to attack ";
	}
	abstract function getName();
}

trait BasicNeedsUtilites{
	
	public function sleep(){
		echo $this->getName()." is sleeping";
	}
	
	public function eat(){
		echo $this->getName()." eats ".$this->getFood();
	}
	
	public function pee(){
		echo $this->getName()." is peeing in the woods shamelessly";
	}
	
	abstract function getName();
	abstract function getFood();
	
}


trait LoveUtilities{
	
	public function hug(){
		echo $this->getName(). " is hugging with love ";
	}
	
	abstract function getName();
}

//**********Testing area******************************************************************************************//

$b1 = new Bird("Stefan", 21,"broccoli", true);
print $b1;
print "<br><br>";

print $b1->move();
print "<br><br>";

print $b1->eat();
print "<br><br>";

$b2 = new Bird("Antek", 12, "fries", false);
print $b2;
print "<br><br>";

print $b2->eat();
print "<br><br>";

$e1 =  new Eagle("Piti", 32, "onion", true);
echo $e1->hunt("blender");
print "<br><br>";

echo $e1->prepareAttack();
print "<br><br>";


echo $e1->eat();
print "<br><br>";

echo "Piti is a(n) ".get_class($e1);
print "<br><br>";

echo $e1->pee();
print "<br><br>";

$d1 = new Dog("Kali",3,"pizza");
echo $d1->bark();
print "<br><br>";

echo $d1->hug();
print "<br><br>";

$c1 = new Cat("Lord", 7, "green peas");
echo $c1->kiss();
print "<br><br>";

echo $c1->move();
print "<br><br>";


echo Animal::$animalCount;
print "<br><br>";
echo Bird::$animalCount;
print "<br><br>";
echo Eagle::$animalCount;
print "<br><br>";
echo Dog::$animalCount;
print "<br><br>";

/* $animals = array();

for($i = 0; $i < 10; $i++){
	$dog = new Dog("Doggy".$i, 5, "food".$i);
	array_push($animals,$dog);
}

var_dump($animals); */

print_r(Animal::$animals);
print "<br><br>";

print_r            ( Animal::$animals); //też działa, spacje bez znaczenia 
print "<br><br>";

$number = 7;
var_dump($number);


?>



























