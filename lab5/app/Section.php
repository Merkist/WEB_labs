<?php

namespace App;

class Good
{	
	protected $id;
	protected $name;
	protected $price;
	protected $img;

	function __construct($id, $name, $price, $img)
	{	
		if (!is_string($id)) {
			throw new Exception("Property 'id' must be string type.");
		}
		if (!is_string($img)) {
			throw new Exception("Property 'img' must be string type.");
		}
		if (!is_string($name)) {
			throw new Exception("Property 'name' must be string type.");
		}
		if (!is_int($price) && !is_float($price)) {
			throw new Exception("Property 'price' must be integer or float type.");
		}
		if (is_int($price)) {
			$price = (float) $price;
		}
		if (is_float($price)) {
			$price = round($price, 2);
		}

		$this->id = $id;
		$this->img = $img;
		$this->name = $name;
		$this->price = $price;
	}

	public function get_id()
	{
		return $this->id;
	}
	public function get_img()
	{
		return $this->img;
	}

	public function get_name()
	{
		return $this->name;
	}

	public function get_price()
	{
		return $this->price;
	}

}


class Pizza extends Good
{	

	private $weight;
	private $ingredients;

	function __construct($id, $name, $price, $weight, $ingredients, $img)
	{
		parent::__construct($id, $name, $price, $img);

		if (!is_int($weight)) {
			throw new Exception("Property 'weight' must be integer type.");
		}
		if (!is_array($ingredients)) {
			throw new Exception("Property 'ingredients' must be array type.");
		}
		foreach ($ingredients as $item) {
			if (!is_string($item)) {
				throw new Exception("All elements in 'ingredients' must be string type.");
			}
		}

		$this->weight = $weight;
		$this->ingredients = $ingredients;
	}


	public function get_weight()
	{
		return $this->weight;
	}

	public function get_weight_string()
	{
		return (string)$this->weight." г";
	}

	public function get_ingredients()
	{
		return $this->ingredients;
	}

	public function get_ingredients_string() {
		return implode(", ", $this->ingredients);
	}

}


class Drink extends Good
{	
	private $volume;

	function __construct($id, $name, $price, $volume, $img)
	{
		parent::__construct($id, $name, $price, $img);

		if (!is_int($volume) && !is_float($volume)) {
			throw new Exception("Property 'volume' must be integer or float type.");
		}

		$this->volume = $volume;
	}


	public function get_volume()
	{
		return $this->volume;
	}

	public function get_volume_string()
	{
		return (string)$this->volume." л";
	}

}


class Snack extends Good
{	
	private $weight;

	function __construct($id, $name, $price, $weight, $img)
	{
		parent::__construct($id, $name, $price, $img);

		if (!is_int($weight)) {
			throw new Exception("Property 'weight' must be integer or float type.");
		}

		$this->weight = $weight;
	}


	public function get_weight()
	{
		return $this->weight;
	}

	public function get_weight_string()
	{
		return (string)$this->weight." г";
	}

}


class Dessert extends Good
{	
	private $weight;

	function __construct($id, $name, $price, $weight, $img)
	{
		parent::__construct($id, $name, $price, $img);

		if (!is_int($weight)) {
			throw new Exception("Property 'weight' must be integer or float type.");
		}

		$this->weight = $weight;
	}


	public function get_weight()
	{
		return $this->weight;
	}

	public function get_weight_string()
	{
		return (string)$this->weight." г";
	}

}


class Section
{
	public $section_name;
	public $section_title;
	public $section_content = [];

	function __construct($name)
	{
		$path = 'assets\data.json';
		$jsonString = file_get_contents($path);
		$jsonData = json_decode($jsonString, true);

		$this->section_name = $name;

		if (array_key_exists($name, $jsonData["titles"])){

			$this->section_title = $jsonData["titles"][$name];

			$class_name = 'App\\'.ucfirst($name);
			foreach ($jsonData[$name] as $item) {
				array_push($this->section_content, new $class_name(...$item));
			}
		}
		else {
			$this->section_title = "Section does not exists";
			$this->section_content = [];
		}
	}
}

?>