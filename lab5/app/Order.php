<?php

namespace App;

class Order
{
	public $city;
  	public $street;
  	public $house_n;
  	public $entrance_n;
  	public $apartment_n;


	function __construct($city, $street, $house_n, $entrance_n = null, $apartment_n = null)
	{
		$this->city = $city;
		$this->street = $street;
		$this->house_n = $house_n;
		$this->entrance_n = $entrance_n;
		$this->apartment_n = $apartment_n;
	}

}