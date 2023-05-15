<?php


class GoodsStorage
{	
	private static $instance;
	private $storage;

	protected function __construct() {}

	public static function get_instance(): GoodsStorage
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }
	
	public function add_item($item) {
		if (!isset($this->storage)){
			$this->storage = [get_class($item) => [$item->get_name() => $item]];
		}
		elseif (!array_key_exists(get_class($item), $this->storage)) {
			$this->storage[get_class($item)] = array($item->get_name() => $item);
		}
		else {
			$this->storage[get_class($item)][$item->get_name()] = $item;
		}
	}

	public function print_st() {
		echo '<pre>';
		print_r($this->storage);
		echo '</pre>';
	}

	public function get_storage() {
		return $this->storage;
	}

	
}


class Good
{
	private $name;
	private $price;

	function __construct($name, $price)
	{	
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

		$this->name = $name;
		$this->price = $price;
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

	function __construct($name, $price, $weight, $ingredients)
	{
		parent::__construct($name, $price);

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

	function __construct($name, $price, $volume)
	{
		parent::__construct($name, $price);

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

	function __construct($name, $price, $weight)
	{
		parent::__construct($name, $price);

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

	function __construct($name, $price, $weight)
	{
		parent::__construct($name, $price);

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


$pizza1 = new Pizza("Pizza1", 288.00, 566, ["ing1", "ing2", "ing3", "ing4"]);
$pizza2 = new Pizza("Pizza2", 300, 530, ["ing1", "ing2"]);
$pizza3 = new Pizza("Pizza3", 152.345, 420, ["ing1", "ing2", "ing4"]);

$drink1 = new Drink("Drink1", 100, 1);
$drink2 = new Drink("Drink2", 80, 0.5);
$drink3 = new Drink("Drink3", 70, 0.5);

$snack1 = new Snack("Snack1", 90, 190);
$snack2 = new Snack("Snack2", 80, 188);
$snack3 = new Snack("Snack3", 70, 149);

$dessert1 = new Dessert("Dessert1", 110, 130);
$dessert2 = new Dessert("Dessert2", 120, 114);
$dessert3 = new Dessert("Dessert3", 79, 122);

$s1 = GoodsStorage::get_instance();

$s1->add_item($pizza1);
$s1->add_item($pizza2);
$s1->add_item($pizza3);

$s1->add_item($drink1);
$s1->add_item($drink2);
$s1->add_item($drink3);

$s1->add_item($snack1);
$s1->add_item($snack2);
$s1->add_item($snack3);

$s1->add_item($dessert1);
$s1->add_item($dessert2);
$s1->add_item($dessert3);

$s1->print_st();

echo "Name: ".$pizza1->get_name()."<br>";
echo "Price: ".$pizza1->get_price()."<br>";
echo "Weight: ".$pizza1->get_weight_string()."<br>";
echo "Ingredients: ".$pizza1->get_ingredients_string();

