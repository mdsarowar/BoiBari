
<?php $__env->startSection('title',__('Pending Orders | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Pending Orders';
  $data['title0'] = 'Order & Invoices';
  $data['title1'] = 'Pending Orders';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">
	<?php if(count($orders)>0): ?>
		
	<div class="row no-gutter">

			<div class="col-md-12">
				<?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		 
					<div onclick="orderget('<?php echo e($order['id']); ?>')" id="orderbox<?php echo e($order['id']); ?>" class="orderbox">
						<div class="card mb-3">
							
							<div class="card-body admin-order">
								<div class="row">
									<div class="col-md-8">
										<h4>#<?php echo e($inv_cus['order_prefix'].$order['orderid']); ?></h4>
									
									</div>
									<div class="col-md-4">
										<span class="pull-right h4" href=""><sup><i class="<?php echo e($order['paid_in']); ?>"></i> </sup><?php echo e($order['total'] + $order['handlingcharge']); ?></span>

									</div>
								</div>
								<div class="row">
									<div class="col-md-8">
										<p><?php echo e(__("Order By:")); ?> <span><?php echo e($order['customername']); ?></span></p>
										<p><?php echo e(__("Paid Via:")); ?> <span><?php echo e($order['payment_method']); ?></span></p>
									</div>
									<div class="col-md-4">
										<a <?php if(env('DEMO_LOCK') == 0): ?> data-toggle="modal" data-target="#cancelFULLOrder<?php echo e($order['id']); ?>" <?php else: ?> disabled title="This action is disabled in demo !" <?php endif; ?> class="pull-right  btn btn-md btn-danger-rgba ml-2 mb-2">
											<i class="feather icon-x-circle"></i> <?php echo e(__('Cancel')); ?>

										</a>
									
											<button type="button" <?php if(env('DEMO_LOCK') == 0): ?> data-toggle="modal" data-target="#confirm<?php echo e($order['id']); ?>" <?php else: ?> disabled="" title="<?php echo e(__('This action cannot be done in demo !')); ?>" <?php endif; ?> class="pull-right ml-2 btn btn-md btn-primary-rgba mb-2">
												<i class="feather icon-check-circle"></i> <?php echo e(__('Confirm')); ?>

											</button>
									</div>
								</div>
								
							</div>
						</div>
					</div>
		

					<!-- Confirm Order before procced modal -->
						<div id="confirm<?php echo e($order['id']); ?>" class="delete-modal modal fade" role="dialog">
							<div class="modal-dialog modal-sm">
							  <!-- Modal content-->
							  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <div class="delete-icon"></div>
								</div>
								<div class="modal-body text-center">
								  <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
								  <p>
									  <?php echo e(__("Do you really want to confirm this order ? it will confirm the whole order.")); ?>

								  </p>
								</div>
								<div class="modal-footer">
									<form action="<?php echo e(route('quick.pay.full.order',$order['id'])); ?>" method="POST">
										<?php echo csrf_field(); ?>
										<input type="hidden" name="status" value="processed">
												  
										 <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__("NO")); ?></button>
										<button type="submit" class="btn btn-danger"><?php echo e(__("YES")); ?></button>
									  </form>
								</div>
							  </div>
							</div>
						</div>
					<!-- End -->

					<!-- Full order cancel modal-->
					<?php if(!isset($checkOrderCancel) || !isset($orderlog)): ?>
					  <!-- Modal -->
					<div data-backdrop="static" data-keyboard="false" class="modal fade" id="cancelFULLOrder<?php echo e($order['id']); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
						<div class="modal-content">
						  <div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Cancel Order: #<?php echo e($inv_cus->order_prefix.$order['orderid']); ?></h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							
						  </div>
						  <div class="modal-body">
							<?php
							  $secureorderID = Crypt::encrypt($order['id']);
							?>
						<form method="POST" action="<?php echo e(route('full.order.cancel',$secureorderID)); ?>">
						  <?php echo csrf_field(); ?>

							<div class="form-group">
							 <label for=""><?php echo e(__("Choose Reason")); ?> <span class="required">*</span></label>
							  <select class="form-control select2" required="" name="comment" id="">
								  <option value=""><?php echo e(__("Please Choose Reason")); ?></option>
								  <option value="Requested by User"><?php echo e(__('Requested by User')); ?></option>
								  <option value="Order Placed Mistakely"><?php echo e(__("Order Placed Mistakely")); ?></option>
								  <option value="Shipping cost is too much"><?php echo e(__("Shipping cost is too much")); ?></option>
								  <option value="Wrong Product Ordered"><?php echo e(__("Wrong Product Ordered")); ?></option>
								  <option value="Product is not match to my expectations">
									  <?php echo e(__("Product is not match to my expectations")); ?>

								  </option>
								  <option value="Other">
									  <?php echo e(__("My Reason is not listed here")); ?>

								  </option>
							  </select>
							</div>

							<?php
								$user = App\User::find($order['userid']);
							?>

							<?php if($order->payment_method !='COD' && $order->payment_method !='BankTransfer'): ?>
							   <div class="form-group">

								  <label for="">
									  <?php echo e(__("Choose Refund Method:")); ?>

								  </label>
								  <label><input required class="source_check" type="radio" value="orignal" name="source" /><?php echo e(__("Orignal Source")); ?> [<?php echo e($order->payment_method); ?>] </label>&nbsp;&nbsp;
								  <?php if($user->banks->count()>0): ?>
								  <label><input required class="source_check" type="radio" value="bank" name="source" /> <?php echo e(__("In Bank")); ?></label>

								  <select name="bank_id" id="bank_id" class="display-none form-control">
									<?php $__currentLoopData = $user->banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									  <option value="<?php echo e($bank->id); ?>"><?php echo e($bank->bankname); ?> (<?php echo e($bank->acno); ?>)</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								  </select>

								  <?php else: ?>
								  <label><input type="radio" disabled="" /> <?php echo e(__('In Bank')); ?>  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="<?php echo e(__("Add a bank account in My Bank Account")); ?>" aria-hidden="true"></i></label>

								  <?php endif; ?>
								</div>
								


							<?php else: ?>

							 <?php if($user->banks->count()>0): ?>
								  <label><input required class="source_check" type="radio" value="bank" name="source" /> <?php echo e(__("In Bank")); ?></label>

								  <select name="bank_id" id="bank_id" class="display-none form-control">
									<?php $__currentLoopData = $user->banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									  <option value="<?php echo e($bank->id); ?>"><?php echo e($bank->bankname); ?> (<?php echo e($bank->acno); ?>)</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								  </select>

							<?php else: ?>
								  <label><input type="radio" disabled="" /> <?php echo e(__("In Bank")); ?>  <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="<?php echo e(__("Add a bank account in My Bank Account")); ?>" aria-hidden="true"></i></label>

							<?php endif; ?>

							<?php endif; ?>

							<div class="alert alert-info">
									<h5><i class="fa fa-info-circle"></i><?php echo e(__("Important !")); ?></h5>

									<ol class="ol">
									  <li>
										  <?php echo e(__("IF Original source is choosen than amount will be reflected to your orignal source in 1-2 days(approx).")); ?>

									  </li>

									  <li>
										<?php echo e(__("IF Bank Method is choosen than make sure you added a bank account else refund will not procced. IF already added than it will take 14 days to reflect amount in your bank account (Working Days*).")); ?>

									  </li>

									  <li>
										  <?php echo e(__("Amount will be paid in original currency which used at time of placed order.")); ?>

									  </li>

									</ol>
								</div>

							<button type="submit" class="btn btn-md btn-primary">
							  <?php echo e(__("Procced...")); ?>

							</button>
							</form>
							<p class="help-block">
								<?php echo e(__("This action cannot be undone !")); ?>

							</p>
							<p class="help-block">
								<?php echo e(__("It will take time please do not close or refresh window !")); ?>

							</p>
						  </div>

						</div>
					  </div>
					</div>
					<?php endif; ?>
					<!--END-->

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		
		

	<div class="quickorderview col-md-4">

	</div>
		
				

	</div>

	<?php else: ?>
		<h3 class="text-center"><?php echo e(__("No Pending Orders !")); ?></h3>
	<?php endif; ?>


</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
	var url = <?php echo json_encode(route('quickorderdtls'), 15, 512) ?>;
</script>
<script src="<?php echo e(asset('js/pendingorder.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/pendingorder.blade.php ENDPATH**/ ?>