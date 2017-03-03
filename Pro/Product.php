<?php

class Product {
	
	private $price;
	private $name;
	private $currency;
	
	function __construct($price,$currency, $name){
		$this->price = $price;
		$this->currency = $currency;
		$this->name = $name;
	}
	
	function getPrice(){
		return $this->price;
	}
	
	function getName(){
		return $this->name;
	}
	
	function getCurrency(){
		return $this->currency;
	}
	
	
	
}


$product = new Product(4.99,"PLN", "Book");
echo "Price of the "."{$product->getName()} is "."{$product->getPrice()} "."{$product->getCurrency()}"


?>