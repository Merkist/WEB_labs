@extends('layout')


@section('content')
<div class="shop__container">
	<h1 class="shop__title">
		{{ $obj->section_title }}
	</h1>
	<div class="shop__block">
		@if (!empty($obj->section_content))
			@foreach ($obj->section_content as $item)
				<div class="shop__item">
					<div class="item__border">
						<img src="{{ $item->get_img() }}" alt="photo">
						<h1 class="item__title">
							{{$item->get_name()}}
						</h1>
						@if ($obj->section_name == 'pizza')
							<p class="item__description">
								{{$item->get_ingredients_string()}}
							</p>
						@endif
						<p class="item__weight">
							@if ($obj->section_name == 'drink')
								{{$item->get_volume_string()}}
							@else
								{{$item->get_weight_string()}}
							@endif
						</p>
						<div class="item__bottom">
							<div class="item__price">
								{{number_format($item->get_price(), 2, ".")}}
							</div>
							<div class="button item-button">
								В кошик
							</div>
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