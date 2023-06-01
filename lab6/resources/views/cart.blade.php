@extends('layout')


@section('content')
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
								<img src="/assets/img/content/dessert/dessert3.png" alt="dessert3">
								<h1 class="item__title">
									Шоколадні Роли
								</h1>
								<div class="item__price">
									110.00
								</div>
								<div class="cart__item__button">
									<button class="button__plus">
										<img src="/assets/img/plus.svg" alt="+">
									</button>
									<div class="button__quantity">
										1
									</div>
									<button class="button__minus">
										<img src="/assets/img/minus.svg" alt="-">
									</button> 
								</div>
								<div class="trash_icon">
									<img src="/assets/img/waste.svg" alt="trash">
								</div>
							</div>
						</div>
						<div class="shop__item cart__shop__item">
							<div class="item__border cart__item__border">
								<img src="/assets/img/content/pizza/pizza9.png" alt="pizza9">
								<h1 class="item__title">
									Піца Прованс
								</h1>
								<div class="item__price">
									297.00
								</div>
								<div class="cart__item__button">
									<button class="button__plus">
										<img src="/assets/img/plus.svg" alt="+">
									</button>
									<div class="button__quantity">
										1
									</div>
									<button class="button__minus">
										<img src="/assets/img/minus.svg" alt="-">
									</button>
								</div>
								<div class="trash_icon">
									<img src="/assets/img/waste.svg" alt="trash">
								</div>
							</div>
						</div>
					</div>
					<div class="cart__price">
						До сплати: 407 грн
					</div>
				</div>
				<form method="post" action="{{url('cart')}}">
					@csrf
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
@endsection