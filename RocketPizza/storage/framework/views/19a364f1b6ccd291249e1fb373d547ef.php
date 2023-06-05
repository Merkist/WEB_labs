


<?php $__env->startSection('content'); ?>
<div class="shop__container">
	<h1 class="shop__title">
		<?php echo e($obj->section_title); ?>

	</h1>
	<div class="shop__block">
		<?php if(!empty($obj->section_content)): ?>
			<?php $__currentLoopData = $obj->section_content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="shop__item">
					<div class="item__border">
						<img src="<?php echo e($item->get_img()); ?>" alt="photo">
						<h1 class="item__title">
							<?php echo e($item->get_name()); ?>

						</h1>
						<?php if($obj->section_name == 'pizza'): ?>
							<p class="item__description">
								<?php echo e($item->get_ingredients_string()); ?>

							</p>
						<?php endif; ?>
						<p class="item__weight">
							<?php if($obj->section_name == 'drink'): ?>
								<?php echo e($item->get_volume_string()); ?>

							<?php else: ?>
								<?php echo e($item->get_weight_string()); ?>

							<?php endif; ?>
						</p>
						<div class="item__bottom">
							<div class="item__price">
								<?php echo e(number_format($item->get_price(), 2, ".")); ?>

							</div>
							<div class="button item-button">
								В кошик
							</div>
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\example-app\resources\views/shop.blade.php ENDPATH**/ ?>