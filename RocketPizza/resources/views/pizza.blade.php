@extends('layout')


@section('content')
<div class="shop__container">
	<h1 class="shop__title">
		Піца
	</h1>
	<div class="shop__block">
		@if (!empty($obj))
			@foreach ($obj as $item)
				<div class="shop__item">
					<div class="item__border">
						<img src="{{ $item['pizza']->img }}" alt="photo">
						<h1 class="item__title">
							{{$item['pizza']->name}}
						</h1>
						<p class="item__description">
							@foreach ($item['ing'] as $ing)
							<a href="/pizza/{{$ing->id}}">{{$ing->name}}</a>{{$loop->last ? '' : ', '}}
							@endforeach
						</p>
						<p class="item__weight">
							{{$item['pizza']->weight}} г
						</p>
						<div class="item__bottom">
							<div class="item__price">
								{{number_format($item['pizza']->price, 2, ".")}}
							</div>
							<a class="button item-button" href="{{ url('add-to-cart/'.$item['pizza']->id) }}">
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