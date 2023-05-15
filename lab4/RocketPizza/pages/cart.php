

<div class="cart__container">
				<h1 class="cart__title">
					Кошик
				</h1>
				<div class="cart__content__block">
					<h1 class="cart__content__title">
						Замовлені товари
					</h1>
					<div class="shop__block cart__padding">
						<div class="shop__item cart__shop__item">
							<div class="item__border cart__item__border">
								<img src="img/content/dessert/dessert3.png" alt="dessert3">
								<h1 class="item__title">
									Шоколадні Роли
								</h1>
								<div class="item__price">
									110.00
								</div>
								<div class="cart__item__button">
									<button class="button__plus">
										<img src="img/plus.svg" alt="+">
									</button>
									<div class="button__quantity">
										1
									</div>
									<button class="button__minus">
										<img src="img/minus.svg" alt="-">
									</button> 
								</div>
								<div class="trash_icon">
									<img src="img/waste.svg" alt="trash">
								</div>
							</div>
						</div>
						<div class="shop__item cart__shop__item">
							<div class="item__border cart__item__border">
								<img src="img/content/pizza/pizza9.png" alt="pizza9">
								<h1 class="item__title">
									Піца Прованс
								</h1>
								<div class="item__price">
									297.00
								</div>
								<div class="cart__item__button">
									<button class="button__plus">
										<img src="img/plus.svg" alt="+">
									</button>
									<div class="button__quantity">
										1
									</div>
									<button class="button__minus">
										<img src="img/minus.svg" alt="-">
									</button>
								</div>
								<div class="trash_icon">
									<img src="img/waste.svg" alt="trash">
								</div>
							</div>
						</div>
					</div>
					<div class="cart__price">
						До сплати: 407 грн
					</div>
				</div>
				<form method="post" action="index.php?page=cart">
				<div class="cart__address__block">
					<h1 class="address__title">
						Адреса доставки
					</h1>
					<div class="input__block">
						<label class="input__name">
						Місто:
						</label>
						<input type="text" name="city" class="input__line">
					</div>
					<div class="input__block">
						<label class="input__name">
							Вулиця:
						</label>
						<input type="text" name="street" class="input__line">
					</div>
					<div class="input__block">
						<label class="input__name">
							Номер будинку:
						</label>
						<input type="text" name="house_n" class="input__line">
					</div>
					<div class="input__block">
						<label class="input__name">
							Номер  під’їзду:
						</label>
						<input type="text" name="entrance_n" class="input__line">
					</div>
					<div class="input__block">
						<label class="input__name">
							Номер квартири:
						</label>
						<input type="text" name="apartment_n" class="input__line">
					</div>
				</div>
				<button type="submit" class="submit__button">
					ЗАМОВИТИ
				</button>
				</form>
			</div>
<?php


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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $city = htmlspecialchars($_POST['city']);
  $street = htmlspecialchars($_POST['street']);
  $house_n = htmlspecialchars($_POST['house_n']);
  $entrance_n = htmlspecialchars($_POST['entrance_n']);
  $apartment_n = htmlspecialchars($_POST['apartment_n']);

  if (empty($city) || empty($street) || empty($house_n)) {
    echo "Order can not be formed without city, street and houese number properties.";
  } else {
	if (!isset($_SESSION['storage'])) {
		$_SESSION['storage'] = [new Order($city, $street, $house_n, $entrance_n, $apartment_n)];
	}
	else {
		array_push($_SESSION['storage'], new Order($city, $street, $house_n, $entrance_n, $apartment_n));
	}
    echo '<pre>';
	print_r($_SESSION['storage']);
	echo '</pre>';
  }
}

?>