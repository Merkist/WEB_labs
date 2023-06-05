


<?php $__env->startSection('content'); ?>
<div class="shop__container">
	<h1 class="shop__title">
		Піца
	</h1>
	<div class="shop__block">
		<?php if(!empty($obj)): ?>
			<?php $__currentLoopData = $obj; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="shop__item">
					<div class="item__border">
						<img src="<?php echo e($item['pizza']->img); ?>" alt="photo">
						<h1 class="item__title">
							<?php echo e($item['pizza']->name); ?>

						</h1>
						<p class="item__description">
							<?php $__currentLoopData = $item['ing']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ing): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<a href="/pizza/<?php echo e($ing->id); ?>"><?php echo e($ing->name); ?></a><?php echo e($loop->last ? '' : ', '); ?>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</p>
						<p class="item__weight">
							<?php echo e($item['pizza']->weight); ?> г
						</p>
						<div class="item__bottom">
							<div class="item__price">
								<?php echo e(number_format($item['pizza']->price, 2, ".")); ?>

							</div>
							<a class="button item-button" href="<?php echo e(url('add-to-cart/'.$item['pizza']->id)); ?>">
								В кошик
							</a>
						</div>
					</div>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php else: ?>
			<p>Section is empty</p>		
		<?php endif; ?>	
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/pizza.blade.php ENDPATH**/ ?>