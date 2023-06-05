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
						@if (!empty($obj))
						@foreach ($obj as $id => $item)
						<div class="shop__item cart__shop__item">
							<div class="item__border cart__item__border">
								<img src="{{ $item['img'] }}" alt="photo">
								<h1 class="item__title">
									{{$item["name"]}}
								</h1>
								<div class="item__price">
									{{$item["price"]}}
								</div>
								<div class="cart__item__button">
									<a class="button__plus" href="{{ url('cart-item-plus/'.$id) }}">
										<img src="/assets/img/plus.svg" alt="+">
									</a>
									<div class="button__quantity">
										{{$item["quantity"]}}
									</div>
									<a class="button__minus" href="{{ url('cart-item-minus/'.$id) }}">
										<img src="/assets/img/minus.svg" alt="-">
									</a> 
								</div>
								<a class="trash_icon" href="{{ url('cart-item-delete/'.$id) }}">
									<img src="/assets/img/waste.svg" alt="trash">
								</a>
							</div>
						</div>
						@endforeach
						@else
							<p class="empty_cart_text">Кошик порожній</p>		
						@endif	
					</div>
					<div class="cart__price">
						<p>До сплати: {{$total_price}} грн</p>
					</div>
				</div>
				<form class="cart_form" method="post" action="{{url('cart')}}">
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