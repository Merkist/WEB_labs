


<?php $__env->startSection('content'); ?>
	<div class="cart__container">
				<h1 class="cart__title">
					Кошик
				</h1>
				<div class="cart__content__block">
					<h1 class="cart__content__title">
						Замовлені товари
					</h1>
					<div class="shop__block cart__padding">
						<?php if(!empty($obj)): ?>
						<?php $__currentLoopData = $obj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="shop__item cart__shop__item">
							<div class="item__border cart__item__border">
								<img src="<?php echo e($item['img']); ?>" alt="photo">
								<h1 class="item__title">
									<?php echo e($item["name"]); ?>

								</h1>
								<div class="item__price">
									<?php echo e($item["price"]); ?>

								</div>
								<div class="cart__item__button">
									<a class="button__plus" href="<?php echo e(url('cart-item-plus/'.$id)); ?>">
										<img src="/assets/img/plus.svg" alt="+">
									</a>
									<div class="button__quantity">
										<?php echo e($item["quantity"]); ?>

									</div>
									<a class="button__minus" href="<?php echo e(url('cart-item-minus/'.$id)); ?>">
										<img src="/assets/img/minus.svg" alt="-">
									</a> 
								</div>
								<a class="trash_icon" href="<?php echo e(url('cart-item-delete/'.$id)); ?>">
									<img src="/assets/img/waste.svg" alt="trash">
								</a>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<p class="empty_cart_text">Кошик порожній</p>		
						<?php endif; ?>	
					</div>
					<div class="cart__price">
						<p>До сплати: <?php echo e($total_price); ?> грн</p>
					</div>
				</div>
				<form class="cart_form" method="post" action="<?php echo e(url('cart')); ?>">
					<?php echo csrf_field(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/cart.blade.php ENDPATH**/ ?>