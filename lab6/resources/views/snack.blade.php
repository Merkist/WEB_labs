@extends('layout')


@section('content')
<div class="shop__container">
	<h1 class="shop__title">
		Напої
	</h1>
	<div class="shop__block">
		@if (!empty($obj))
			@foreach ($obj as $item)
				<div class="shop__item">
					<div class="item__border">
						<img src="{{ $item->img }}" alt="photo">
						<h1 class="item__title">
							{{$item->name}}
						</h1>
						<p class="item__weight">
							{{$item->weight}} г
						</p>
						<div class="item__bottom">
							<div class="item__price">
								{{number_format($item->price, 2, ".")}}
							</div>
							<a class="button item-button" href="cart">
								В кошик
							</a>
						</div>
					</div>
				</div>
			@endforeach
		@else
			<p>Section is empty</p>		
		@endif	
	</div>
</div>
@endsection