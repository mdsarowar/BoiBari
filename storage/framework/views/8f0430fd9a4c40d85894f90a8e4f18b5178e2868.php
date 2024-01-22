<div class="card">

	<div class="card-header with-border">
		<span class="pull-right">
			<button onclick="collapseorder('<?php echo e($order['id']); ?>')" type="button" class="close" id="closebtn<?php echo e($order['id']); ?>" aria-label="Close">
                  <span aria-hidden="true">×</span>
            </button>
		</span>
		# <b><?php echo e($inv_cus['order_prefix'].$order['order_id']); ?></b>
		<br>
		<span>
			<?php echo e(date('d-M-Y | h:i A',strtotime($order['created_at']))); ?>

		</span> 


	</div>

	<div class="card-body with-border">
		<p><b><?php echo e(__("Order from")); ?></b></p>
		<p><?php echo e($order->user->name); ?></p>
		<p><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo e($order->user->email); ?></p>
		<?php if($order->user->mobile): ?>
			<p><i class="fa fa-phone" aria-hidden="true"></i> <?php echo e($order->user->mobile); ?> </p>
		<?php endif; ?>
		<?php if(isset($order->user->country->nicename)): ?>
		<p>
			<i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo e($order->user['city']['name']); ?>, <?php echo e($order->user['state']['name']); ?>, <?php echo e($order->user['country']['nicename']); ?>

		</p>
		<?php endif; ?>
	

	
		<?php $__currentLoopData = $order->invoices->where('status','pending'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $suborder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="row">
				<div class="col-md-2">
					<?php if($suborder->variant): ?>
						<?php if($suborder->variant->variantimages): ?>
							<img width="50px" src="<?php echo e(url('/variantimages/'.$suborder->variant->variantimages['main_image'])); ?>" alt="" class="m-t-2 img-responsive" title="<?php echo e($suborder->variant->products['name']); ?>" alt="Product Image" />
						<?php else: ?>
							<img width="50px" src="<?php echo e(Avatar::create($suborder->variant->products['name'])->toBase64()); ?>" alt="" class="m-t-2 img-responsive" title="<?php echo e($suborder->variant->products['name']); ?>" alt="Product Image" />
						<?php endif; ?>
					<?php endif; ?>

					<?php if($suborder->simple_product): ?>

						<img width="50px" src="<?php echo e(url('images/simple_products/'.$suborder->simple_product->thumbnail)); ?>" alt="" class="m-t-2 img-responsive" title="<?php echo e($suborder->simple_product['product_name']); ?>" alt="Product Image" />

					<?php endif; ?>
				</div>
				<div class="col-md-5">
					
					<?php if(isset($suborder->variant)): ?>
						<?php echo e($suborder->variant->products['name']); ?> <b>(x <?php echo e($suborder['qty']); ?>)</b>
					<?php endif; ?>

					<?php if(isset($suborder->simple_product)): ?>
						<?php echo e($suborder->simple_product['product_name']); ?> <b>(x <?php echo e($suborder['qty']); ?>)</b>
					<?php endif; ?>
				</div>
				<div class="col-md-5">
					<i class="<?php echo e($order['paid_in']); ?>"></i> <?php echo e($suborder->price + $suborder->tax_amount + $suborder->shipping); ?>

					<br>
					<small>(<?php echo e(__("Incl. of Tax & Shipping")); ?>).</small>
				</div>
			</div>
			
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	


		
		<div class="row">

			<div class="col-md-4">
				<span><b><?php echo e(__("Subtotal")); ?>: </b></span>
			<br>
		
				<?php if($order->discount != 0): ?>
					<i class="<?php echo e($order['paid_in']); ?>"></i> <?php echo e(sprintf("%.2f",$order['order_total'] + $order['discount'])); ?>

				<?php else: ?>
					<i class="<?php echo e($order['paid_in']); ?>"></i> <?php echo e(sprintf("%.2f",$order['order_total'])); ?>

				<?php endif; ?>
			</div>

			<?php if($order->discount != 0): ?>
				<div class="col-md-4">
					<b><?php echo e(__('Coupon discount:')); ?> </b><br>
				
					<i class="<?php echo e($order['paid_in']); ?>"></i> <?php echo e(sprintf("%.2f",$order['discount'])); ?>

				</div>
				<?php endif; ?>

				<?php if($order->gift_charge != 0): ?>
					<div class=" col-md-4">
						<b><?php echo e(__("Gift Pkg. charges")); ?>: </b>
					<br>
						+ <i class="<?php echo e($order['paid_in']); ?>"></i> <?php echo e(sprintf("%.2f",$order->gift_charge)); ?>

					</div>
				<?php endif; ?>
				
				<?php if($order->handlingcharge != 0): ?>
					<div class="col-md-4">
						<b><?php echo e(__("Handling charges")); ?>: </b>
				<br>
						+ <i class="<?php echo e($order['paid_in']); ?>"></i> <?php echo e(sprintf("%.2f",$order->handlingcharge)); ?>

					</div>
				<?php endif; ?>

			<div class=" col-md-4">
				<b>Total: </b>
			<br>
				<?php if($order->discount != 0): ?>
					<i class="<?php echo e($order['paid_in']); ?>"></i> <?php echo e(sprintf("%.2f",$order->order_total + $order->handlingcharge)); ?>

				<?php else: ?>
					<i class="<?php echo e($order['paid_in']); ?>"></i> <?php echo e(sprintf("%.2f",$order->order_total + $order->handlingcharge)); ?>

				<?php endif; ?>
			
			</div>
		</div>

				

		<div class="row mt-md-2">
			<div class="col-md-4">
				<p><b><?php echo e(__("Paid by")); ?>:</b></p>
				<p><?php echo e($order->payment_method); ?></p>
			
			
			</div>

			<div class="col-md-4">
				<p><b><?php echo e(__("Payment received")); ?></b></p>
				<p>
					<?php echo e(__("Yes")); ?>

				</p>
			
			</div>

		</div>
	</div>
	

</div><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/quickorder.blade.php ENDPATH**/ ?>