
<?php $__env->startSection('title',__("View Order : :order | ",['order' => $inv_cus->order_prefix.$order->order_id])); ?>
<?php $__env->startSection('body'); ?>


<?php $__env->startComponent('admin.component.breadcumb',['thirdactive' => 'active']); ?>
​
<?php $__env->slot('heading'); ?>
<?php echo e(__('View Order')); ?>

<?php $__env->endSlot(); ?>
​
<?php $__env->slot('menu1'); ?>
<?php echo e(__("Order")); ?>

<?php $__env->endSlot(); ?>
​
<?php $__env->slot('menu2'); ?>
<?php echo e(__("View Order")); ?>

<?php $__env->endSlot(); ?>
​
<?php $__env->slot('button'); ?>
<div class="col-md-6">
	<div class="widgetbar">
		<a href="<?php echo e(url('admin/order')); ?>" class="btn btn-primary-rgba"><i
				class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
		<a href="<?php echo e(route('order.print',$order->id)); ?>" class="btn btn-primary-rgba"><i
				class="feather icon-printer mr-2"></i><?php echo e(__("Print")); ?></a>
		<a href="<?php echo e(route('admin.order.edit',$order->order_id)); ?>" class="btn btn-success-rgba"><i
				class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
	</div>
</div>
<?php $__env->endSlot(); ?>
​
<?php echo $__env->renderComponent(); ?>

<div class="contentbar">

	<div class="row">
		
		​
		​
		<div class="col-lg-12">
			<?php if($errors->any()): ?>
				<div class="alert alert-danger" role="alert">
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			<?php endif; ?>

			<div class="card m-b-30">

				<div class="card-header">
					<h5><?php echo e(__("View Order")); ?> #<?php echo e($inv_cus->order_prefix.$order->order_id); ?></h5>
				</div>
				<div class="card-body">
					<div class="card m-b-30">
						​<?php
						$orderlog = App\FullOrderCancelLog::where('order_id',$order->id)->first();
						$i=0;
						?>

						<?php if($order->manual_payment == '1'): ?>
						<div class="alert alert-info p-1">
							<i class="fa fa-info-circle"></i> <?php echo e(__("This order is placed using")); ?>

							<?php echo e(ucfirst($order->payment_method)); ?> <?php echo e(__("method and purchase proof you can view")); ?> <a
								href="<?php echo e(url('images/purchase_proof/'.$order->purchase_proof)); ?>"
								data-lightbox="image-1" data-title="<?php echo e(__("Purchase proof for")); ?> <?php echo e($order->order_id); ?>">here</a> <?php echo e(__("and after verify you can change the order status.")); ?>

						</div>
						<?php endif; ?>

						<?php if(isset($orderlog[0])): ?>

						<?php if(count($orderlog[0]->inv_id) != count($order->invoices)): ?>

							<div class="alert alert-danger">

								<p class="font-familycalibri font-weight500">
									<i class="fa fa-info-circle"></i>
									<b><?php echo e(date('d-m-Y | h:i A',strtotime($orderlog->updated_at))); ?> • For Order
										#<?php echo e($inv_cus->order_prefix.$order->order_id); ?> Few Items has been cancelled
										<?php echo e($order->payment_method == 'COD' ? "." : ""); ?></b>

									<?php if($orderlog->method_choosen == 'orignal'): ?>

									<b> and Amount <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($orderlog->amount); ?> <?php echo e(__("is refunded to its orignal source with TXN ID")); ?> [<?php echo e($orderlog->txn_id); ?>].</b>


									<?php elseif($orderlog->method_choosen == 'bank'): ?>
									<?php if($orderlog->is_refunded == 'completed'): ?>
									<b><?php echo e(__("and Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($orderlog->amount); ?> <?php echo e(__('is refunded to')); ?> <b><?php echo e($orderlog->user->name); ?><?php echo e(__("'s")); ?></b> <?php echo e(__("bank ac")); ?>

										<?php if(isset($orderlog->bank->acno)): ?>
										XXXX<?php echo e(substr($orderlog->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__("with TXN/REF No")); ?>

										<?php echo e($orderlog->txn_id); ?>

										<?php if($orderlog->txn_fee !=''): ?><br>(<?php echo e(__("TXN FEE APPLIED")); ?>) <i
											class="<?php echo e($order->paid_in); ?>"></i>
										<?php echo e($orderlog->txn_fee); ?> <?php endif; ?>.</b>
									<?php else: ?>
									<b><?php echo e(__("Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($orderlog->amount); ?>

										<?php echo e(__("is pending to")); ?> <b><?php echo e($orderlog->user->name); ?><?php echo e(__("'s")); ?></b> <?php echo e(__("bank ac")); ?>

										<?php if(isset($orderlog->bank->acno)): ?>
										XXXX<?php echo e(substr($orderlog->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__("with TXN/REF. No:")); ?>

										<?php echo e($orderlog->txn_id); ?>.</b>
									<?php endif; ?>
									<?php endif; ?>
								</p>
							</div>

						<?php else: ?>

							<div class="alert alert-danger">

								<p class="font-familycalibri font-weight500">
									<i class="fa fa-info-circle"></i>
									<b><?php echo e(date('d-m-Y | h:i A',strtotime($orderlog->updated_at))); ?> • <?php echo e(__("For Order")); ?>

										#<?php echo e($inv_cus->order_prefix.$order->order_id); ?> <?php echo e(__("has been cancelled")); ?>

										<?php echo e($order->payment_method == 'COD' ? "." : ""); ?></b>

									<?php if($orderlog->method_choosen == 'orignal'): ?>

									<b> <?php echo e(__("and Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($orderlog->amount); ?>

										<?php echo e(__("is refunded to its orignal source with TXN ID")); ?> [<?php echo e($orderlog->txn_id); ?>].</b>


									<?php elseif($orderlog->method_choosen == 'bank'): ?>
									<?php if($orderlog->is_refunded == 'completed'): ?>
									<b><?php echo e(__("and Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($orderlog->amount); ?>

										<?php echo e(__("is refunded to")); ?> <b><?php echo e($orderlog->user->name); ?><?php echo e(__('\'s')); ?></b> bank ac
										<?php if(isset($orderlog->bank->acno)): ?>
										XXXX<?php echo e(substr($orderlog->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__("with TXN/REF No")); ?>

										<?php echo e($orderlog->txn_id); ?>

										<?php if($orderlog->txn_fee !=''): ?><br>(<?php echo e(__("TXN FEE APPLIED")); ?>) <i
											class="<?php echo e($order->paid_in); ?>"></i>
										<?php echo e($orderlog->txn_fee); ?> <?php endif; ?>.</b>
									<?php else: ?>
									<b><?php echo e(__('Amount')); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($orderlog->amount); ?>

										<?php echo e(__("is pending to")); ?> <b><?php echo e($orderlog->user->name); ?>'s</b> <?php echo e(__("bank ac")); ?>

										<?php if(isset($orderlog->bank->acno)): ?>
										XXXX<?php echo e(substr($orderlog->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__("with TXN/REF. No:")); ?>

										<?php echo e($orderlog->txn_id); ?>.</b>
									<?php endif; ?>
									<?php endif; ?>
								</p>
							</div>

						<?php endif; ?>
						<?php endif; ?>

						<?php if($order->refundlogs->count()>0): ?>

							<?php $__currentLoopData = $order->refundlogs->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rlogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<div class="alert alert-danger">

								

									<p><i class="fa fa-info-circle"></i> <?php echo e(date('d-m-Y | h:i A',strtotime($rlogs->updated_at))); ?> • Item
										<?php if(isset($rlogs->getorder->variant)): ?>
										<b><?php echo e($rlogs->getorder->variant->products->name); ?>(<?php echo e(variantname($rlogs->getorder->variant)); ?>) <?php else: ?> <?php echo e($rlogs->getorder->simple_product->product_name); ?> </b> <?php endif; ?> has been <?php if($rlogs->getorder->status
										== 'return_request'): ?>
											<?php echo e(__('requested for return')); ?>

										<?php else: ?>
										<?php if($rlogs->getorder->status == 'ret_ref'): ?>
											<?php echo e(__("Returned and refunded")); ?>

										<?php else: ?>
										<?php echo e(ucfirst($rlogs->getorder->status)); ?>

										<?php endif; ?>
										<?php endif; ?>

										<?php if($rlogs->method_choosen == 'orignal'): ?>

										<?php echo e(__("and Amount")); ?> <i class="<?php echo e($rlogs->getorder->order->paid_in); ?>"></i><?php echo e($rlogs->amount); ?>

										<?php echo e(__("is")); ?> <?php echo e($rlogs->status); ?> <?php echo e(__("to its orignal source with TXN ID:")); ?> <b><?php echo e($rlogs->txn_id); ?></b>.


										<?php elseif($rlogs->method_choosen == 'bank'): ?>
										<?php if($rlogs->status == 'refunded'): ?>
										<?php echo e(__("and Amount")); ?> <i class="<?php echo e($rlogs->getorder->order->paid_in); ?>"></i><?php echo e($rlogs->amount); ?>

										<?php echo e(__("is")); ?> <?php echo e($rlogs->status); ?> <?php echo e(__("to")); ?> <b><?php echo e($rlogs->user->name); ?>'s</b> <?php echo e(__("bank ac")); ?> <?php if(isset($rlogs->bank->acno)): ?>
										XXXX<?php echo e(substr($rlogs->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__("with TXN ID:")); ?> <b><?php echo e($rlogs->txn_id); ?> <?php if($rlogs->txn_fee
											!=''): ?> <br> (<?php echo e(__("TXN FEE APPLIED")); ?>) <b><i
													class="<?php echo e($rlogs->getorder->order->paid_in); ?>"></i><?php echo e($rlogs->txn_fee); ?></b> <?php endif; ?></b>.
										<?php else: ?>
										<?php echo e(__("and Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($rlogs->amount); ?>

										<?php echo e(__("is pending to")); ?> <b><?php echo e($rlogs->user->name); ?>'s</b> <?php echo e(__("bank ac")); ?> <?php if(isset($rlogs->bank->acno)): ?>
										XXXX<?php echo e(substr($rlogs->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__('with TXN ID/REF NO:')); ?> <b><?php echo e($rlogs->txn_id); ?></b>
										<?php if($rlogs->txn_fee !=''): ?> <br> (<?php echo e(__("TXN FEE APPLIED")); ?>) <b><i
												class="<?php echo e($rlogs->getorder->order->paid_in); ?>"></i><?php echo e($rlogs->txn_fee); ?></b> <?php endif; ?>.
										<?php endif; ?>
										<?php endif; ?></p>
								</div>

							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<?php endif; ?>


						<?php if($order->cancellog->count()>0): ?>
							<div class="alert alert-danger">
								<?php $__currentLoopData = $order->cancellog->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancellog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
								
								<p><i class="fa fa-info-circle"></i> <?php echo e(date('d-m-Y | h:i A',strtotime($cancellog->updated_at))); ?> • Item
									<?php if(isset($cancellog->singleOrder->variant)): ?>
									<b><?php echo e($cancellog->singleOrder->variant->products->name); ?>(<?php echo e(variantname($cancellog->singleOrder->variant->variant)); ?>) <?php else: ?> <?php echo e($cancellog->singleOrder->simple_product->product_name); ?> </b> <?php endif; ?> <?php echo e(__("has been canceled")); ?>


									<?php if($cancellog->method_choosen == 'orignal'): ?>

									<?php echo e(__("and Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($cancellog->amount); ?>

									<?php echo e(__("is refunded to its orignal source with TXN ID:")); ?> <b><?php echo e($cancellog->transaction_id); ?></b>.


									<?php elseif($cancellog->method_choosen == 'bank'): ?>
									<?php if($cancellog->is_refunded == 'completed'): ?>
									<?php echo e(__("and Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($cancellog->amount); ?>

									<?php echo e(__("is refunded to")); ?> <b><?php echo e($cancellog->user->name); ?><?php echo e(__('\'s')); ?></b> <?php echo e(__("bank ac")); ?> <?php if(isset($cancellog->bank->acno)): ?>
									XXXX<?php echo e(substr($cancellog->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__("with TXN ID")); ?> <b><?php echo e($cancellog->transaction_id); ?>

										<?php if($cancellog->txn_fee !=''): ?> <br> (<?php echo e(__("TXN FEE APPLIED")); ?>) <b><i
												class="<?php echo e($order->paid_in); ?>"></i><?php echo e($cancellog->txn_fee); ?></b> <?php endif; ?></b>.
									<?php else: ?>
									<?php echo e(__("and Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($cancellog->amount); ?>

									<?php echo e(__("is pending to")); ?> <b><?php echo e($cancellog->user->name); ?>'s</b> <?php echo e(__('bank ac')); ?> XXXX<?php echo e(substr($cancellog->bank->acno, -4)); ?>

									<?php echo e(__("with TXN ID/REF NO")); ?> <b><?php echo e($cancellog->transaction_id); ?></b> <?php if($cancellog->txn_fee !=''): ?> <br> (TXN FEE
									APPLIED) <b><i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($cancellog->txn_fee); ?></b> <?php endif; ?>.
									<?php endif; ?>
									<?php endif; ?>
								</p>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						<?php endif; ?>

						<table class="table table-striped">
							<thead>
								<tr>
									<th>
										<?php echo e(__("Customer Information")); ?>

									</th>
									<th>
										<?php echo e(__("Shipping Address")); ?>

									</th>
									<th>
										<?php echo e(__("Billing Address")); ?>

									</th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td>
										<?php

											$user = $order->user;

											$address = $order->shippingaddress;

										?>

										<p><b><?php echo e($user->name); ?></b></p>
										<p><i class="fa fa-envelope-o" aria-hidden="true"></i> <?php echo e($user->email); ?></p>
										<?php if(isset($user->mobile)): ?>
										<p><i class="fa fa-phone"></i> <?php echo e($user->mobile); ?></p>
										<?php endif; ?>

										<p><i class="fa fa-map-marker" aria-hidden="true"></i>
											<?php echo e($user->city ? $user->city->name.',' : ""); ?>

											<?php echo e($user->state ? $user->state->name.',' : ""); ?>

											<?php echo e($user->country ? $user->country->nicename : ""); ?>

										</p>


									</td>
									<td>
										<p><b><?php echo e($address->name); ?>, <?php echo e($address->phone); ?></b></p>
										<p class="font-weight600"><?php echo e(strip_tags($address->address)); ?>,</p>
										<?php

										$user = $order->user;

//										$c = App\Allcountry::where('id',$address->country_id)->first()->nicename;
//										$s = App\Allstate::where('id',$address->state_id)->first()->name;
//										$ci = App\Allcity::where('id',$address->city_id)->first() ?
//										App\Allcity::where('id',$address->city_id)->first()->name : '';

										?>

										<p class="font-weight600"><?php echo e($address->pin_code); ?></p>
									</td>
									<td>
										<p><b><?php echo e($order->billing_address['firstname']); ?>,
												<?php echo e($order->billing_address['mobile']); ?></b>
										</p>
										<p class="font-weight600"><?php echo e(strip_tags($order->billing_address['address'])); ?>,
										</p>
										<?php


//										$c =
//										App\Allcountry::where('id',$order->billing_address['country_id'])->first()->nicename;
//										$s = App\Allstate::where('id',$order->billing_address['state'])->first()->name;
//										$ci = App\Allcity::where('id',$order->billing_address['city'])->first() ?
//										App\Allcity::where('id',$order->billing_address['city'])->first()->name : '';

										?>

										<p class="font-weight600">
											<?php if(isset($order->billing_address['pincode'])): ?>
											<?php echo e($order->billing_address['pincode']); ?>

											<?php endif; ?>
										</p>
									</td>
								</tr>
							</tbody>
						</table>


						<table class="table table-striped">
							<thead>
								<th>
									<?php echo e(__("Order Summary")); ?>

								</th>
								<th></th>

								<th></th>
							</thead>

							<tbody>
								<tr>
									<td>
										<p><b><?php echo e(__('Total Qty:')); ?></b> <?php echo e($order->qty_total); ?></p>
										</p>
										<p><b><?php echo e(__('Order Total:')); ?> <i
													class="<?php echo e($order->paid_in); ?>"></i><?php echo e(round($order->order_total,2)); ?></b>
										</p>
										<p><b><?php echo e(__("Payment Recieved:")); ?></b> <?php echo e(ucfirst($order->payment_receive)); ?></p>
									</td>

									<td>
										<p><b><?php echo e(__("Payment Method:")); ?> </b> <?php echo e(ucfirst($order->payment_method)); ?>

											<p><b><?php echo e(__("Transcation ID:")); ?></b> <b><i><?php echo e($order->transaction_id); ?></i></b></p>


									</td>

									<td>
										<p><b>
											<?php echo e(__("Order Date:")); ?></b> <?php echo e(date('d/m/Y @ h:i a', strtotime($order->created_at))); ?>

										</p>
									</td>
								</tr>
							</tbody>
						</table>

						<?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($invoice->local_pick != '' && $invoice->status !='refunded'): ?>
						<div class="alert alert-success">
							<?php if(isset($invoice->variant)): ?>
							<?php
							$varcount = count($invoice->variant->main_attr_value);
							?>
							<i class="fa fa-info-circle"></i> <?php echo e(__("For Item")); ?> <b><?php echo e($invoice->variant->products->name); ?>

								<small>
									(<?php echo e(variantname($invoice->variant)); ?>)

								</small></b> <?php endif; ?> <?php if($invoice->simple_products): ?>
							<?php echo e($invoice->simple_products->product_name); ?> <?php endif; ?> <?php echo e(__("Customer has choosen Local Pickup.")); ?>

							<?php if($invoice->status != 'delivered'): ?>
							<?php echo e(__("Estd Delivery date:")); ?> <span id="estddate<?php echo e($invoice->id); ?>">
								<?php echo e($invoice->loc_deliv_date == '' ? "Yet to update" : date('d-m-Y',strtotime($invoice->loc_deliv_date))); ?>


								<?php else: ?>
								<?php echo e(__("Item Delivered On:")); ?> <span id="estddate<?php echo e($invoice->id); ?>">
									<?php echo e($invoice->loc_deliv_date == '' ? "Yet to update" : date('d-m-Y',strtotime($invoice->loc_deliv_date))); ?>

									<?php endif; ?>
								</span>
						</div>
						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						<hr>
						<table class="table table-striped">
							<thead>
								<th><?php echo e(__('Order Details')); ?></th>
							</thead>
						</table>

						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th><?php echo e(__('Invoice No')); ?></th>
									<th><?php echo e(__('Item Name')); ?></th>
									<th><?php echo e(__('Qty')); ?></th>
									<th><?php echo e(__('Status')); ?></th>
									<th><?php echo e(__('Pricing & Tax')); ?></th>
									<th><?php echo e(__('Total')); ?></th>
									<th>#</th>
								</tr>
							</thead>
							<tbody>
								<?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td>
										<i><?php echo e($inv_cus->prefix); ?><?php echo e($invoice->inv_no); ?><?php echo e($inv_cus->postfix); ?></i>
									</td>

									<td>
										<div class="row">
											<div class="col-md-4">
												<?php if(isset($invoice->variant)): ?>
												<?php
												$orivar = $invoice->variant;
												?>
												<?php if($invoice->variant->variantimages): ?>
												<img width="60px" class="object-fit" src="<?php echo e(url('variantimages/'.$orivar->variantimages['main_image'])); ?>"
													alt="">
												<?php else: ?>
												<img  width="60px" class="object-fit" src="<?php echo e(Avatar::create($orivar->products->name)->toBase64()); ?>"
													alt="">
												<?php endif; ?>
												<?php endif; ?>

												<?php if(isset($invoice->simple_product)): ?>
												<img width="60px" class="object-fit" src="<?php echo e(url('images/simple_products/'.$invoice->simple_product['thumbnail'])); ?>"
													alt="">
												<?php endif; ?>
											</div>

											<div class="col-md-8">
												<?php if(isset($invoice->variant)): ?>
												<a class="text-justify mleft22" target="_blank"
													href="<?php echo e(App\Helpers\ProductUrl::getUrl($orivar->id)); ?>"><b><?php echo e(substr($orivar->products->name, 0, 25)); ?><?php echo e(strlen($orivar->products->name)>25 ? '...' : ""); ?></b>

													<small>
														(<?php echo e(variantname($orivar)); ?>)

													</small>
												</a>
												<?php endif; ?>

												<?php if($invoice->simple_product): ?>
												<a class="text-justify mleft22"
													href="<?php echo e(route('show.product',['id' => $invoice->simple_product->id, 'slug' => $invoice->simple_product->slug])); ?>"
													target="_blank">
													<b><?php echo e($invoice->simple_product->product_name); ?></b>
												</a>
												<?php endif; ?>

												<br>









												<br>
												<small class="mleft22"><b>Price: </b> <i
														class="<?php echo e($invoice->order->paid_in); ?>"></i>

													<?php echo e(round(($invoice->price),2)); ?>


												</small>

												<br>

												<small class="mleft22"><b>Tax:</b> <i
														class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round(($invoice->tax_amount),2)); ?>


													<?php if($invoice->variant): ?>
													<?php if($invoice->variant->products->tax_r !=''): ?>
													(<?php echo e($invoice->variant->products->tax_r.'% '.$invoice->variant->products->tax_name); ?>

													)

													<?php endif; ?>
													<?php endif; ?>
												</small>

											</div>

										</div>
									</td>

									<td>
										<?php echo e($invoice->qty); ?>

									</td>

									<td>
										<?php if($invoice->status == 'delivered'): ?>
										<span
											class="badge badge-pill badge-success"><?php echo e(ucfirst($invoice->status)); ?></span>
										<?php elseif($invoice->status == 'processed'): ?>
										<span class="badge badge-pill badge-info"><?php echo e(ucfirst($invoice->status)); ?></span>
										<?php elseif($invoice->status == 'shipped'): ?>
										<span
											class="badge badge-pill badge-primary"><?php echo e(ucfirst($invoice->status)); ?></span>
										<?php elseif($invoice->status == 'return_request'): ?>
										<span class="badge badge-pill badge-warning"><?php echo e(__("Return Request")); ?></span>
										<?php elseif($invoice->status == 'returned'): ?>
										<span class="badge badge-pill badge-success">
											<?php echo e(__("Returned")); ?>

										</span>
										<?php elseif($invoice->status == 'cancel_request'): ?>
										<span class="badge badge-pill badge-warning">
											<?php echo e(__("Cancelation Request")); ?>

										</span>
										<?php elseif($invoice->status == 'canceled'): ?>
										<span class="badge badge-pill badge-danger">
											<?php echo e(__("Canceled")); ?>

										</span>
										<?php elseif($invoice->status == 'refunded'): ?>
										<span class="badge badge-pill badge-primary">
											<?php echo e(__("Refunded")); ?>

										</span>
										<?php elseif($invoice->status == 'ret_ref'): ?>
										<span class="badge badge-pill badge-success">
											<?php echo e(__("Returned & Refunded")); ?>

										</span>
										<?php else: ?>
										<span
											class="badge badge-pill badge-default"><?php echo e(ucfirst($invoice->status)); ?></span>
										<?php endif; ?>
									</td>

									<td>
										<b><?php echo e(__("Total Price:")); ?></b> <i class="<?php echo e($invoice->order->paid_in); ?>"></i>

										<?php echo e(round(($invoice->price*$invoice->qty),2)); ?>


										<p></p>
										<b><?php echo e(__("Total Tax:")); ?></b> <i
											class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round(($invoice->tax_amount * $invoice->qty),2)); ?>

										<p></p>
										<b><?php echo e(__("Shipping Charges:")); ?></b> <i
											class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($invoice->shipping,2)); ?>

										<p></p>


										<small class="help-block">(<?php echo e(__("Price & TAX Multiplied with Quantity")); ?>)</small>
										<p></p>


									</td>


									<td>
										<i class="<?php echo e($invoice->order->paid_in); ?>"></i>

										<?php echo e(sprintf("%.2f",$invoice->qty*($invoice->price+$invoice->tax_amount)+$invoice->shipping,2)); ?>


										<br>

										<small>(<?php echo e(__('Incl. of TAX & Shipping')); ?>)</small>
									</td>

									<th>
										<div class="dropdown">
											<button class="btn btn-round btn-outline-primary" type="button"
												id="CustomdropdownMenuButton1" data-toggle="dropdown"
												aria-haspopup="true" aria-expanded="false"><i
													class="feather icon-more-vertical-"></i></button>
											<div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
												<a href="<?php echo e(route('print.invoice',['orderid' => $order->order_id, 'id' => $invoice->id])); ?>"
													class="dropdown-item" target="__blank">
													<i class="feather icon-printer mr-2"></i> <?php echo e(__("Print")); ?>

												</a>
											</div>
										</div>

									</th>
								</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b><?php echo e(__("Subtotal")); ?></b></td>
									<td>
										<b>
											<i class="<?php echo e($invoice->order->paid_in); ?>"></i>
											<?php echo e(round(($order->order_total+$order->discount) - $order->gift_charge,2)); ?>

										</b>
									</td>
									<td></td>
								</tr>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b><?php echo e(__("Coupon Discount")); ?></b></td>
									<td><b>- <i
												class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($order->discount,2)); ?></b>
										(<?php echo e($order->coupon); ?>)</td>
									<td></td>
								</tr>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b><?php echo e(__("Gift Packaging Charge")); ?></b></td>
									<td><b>+ <i
												class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($order->gift_charge,2)); ?></b>
									</td>
									<td></td>
								</tr>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b><?php echo e(__("Handling Charge")); ?></b></td>
									<td><b>+ <i
												class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($order->handlingcharge,2)); ?></b>
									</td>
									<td></td>
								</tr>

								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td><b><?php echo e(__("Grand Total")); ?></b></td>
									<td><b><i class="<?php echo e($invoice->order->paid_in); ?>"></i>

											<?php echo e(round($order->order_total+$order->handlingcharge,2)); ?>


										</b></td>
									<td></td>
								</tr>
							</tbody>
						</table>

						<hr>

						<hr>

						<h4><?php echo e(__("Order Activity Logs")); ?></h4>

						<?php if(count($order->orderlogs) < 1): ?> <?php echo e(__("No activity logs for this order")); ?> <?php else: ?> <small>
							<b>#<?php echo e($inv_cus->order_prefix); ?><?php echo e($order->order_id); ?></b></small>
							<br>
							<span id="logs">


								<?php $__currentLoopData = $order->orderlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

								<?php if(isset($logs->variant)): ?>

								<?php

									$findinvoice = App\InvoiceDownload::find($logs->inv_id)->first();
									$orivar = App\AddSubVariant::withTrashed()->withTrashed()->find($logs->variant_id);

									if($order->payment_method !='COD'){

										if(isset($cancellog)){
											$findinvoice2 = App\InvoiceDownload::where('id','=',$cancellog->inv_id)->first();
											$orivar2 = App\AddSubVariant::withTrashed()->withTrashed()->findorfail($findinvoice2->variant_id);
										}

									}
								?>



								<small><?php echo e(date('d-m-Y | h:i:a',strtotime($logs->updated_at))); ?> • For Order
									<b><?php echo e($orivar->products->name); ?>(<?php echo e(variantname($orivar)); ?>)</b>
									: <?php if($logs->user->role_id == 'a'): ?>
									<span class="text-danger"><b><?php echo e($logs->user->name); ?></b> (<?php echo e(__("Admin")); ?>)</span> 
									<?php echo e(__("changed status to")); ?>

									<b><?php echo e($logs->log); ?></b>
									<?php elseif($logs->user->role_id == 'v'): ?>
									<span class="text-primary"><b><?php echo e($logs->user->name); ?></b> (<?php echo e(__("Vendor")); ?>)</span> <?php echo e(__("changed status to")); ?>

									<b><?php echo e($logs->log); ?></b>
									<?php else: ?>
									<span class="text-success"><b><?php echo e($logs->user->name); ?></b> (<?php echo e(__('Customer')); ?>)</span> <?php echo e(__("changed status to")); ?>

									<b><?php echo e($logs->log); ?></b>
									<?php endif; ?>

								</small>
								<?php endif; ?>

								<?php if(isset($logs->simple_product)): ?>
								<small><?php echo e(date('d-m-Y | h:i:a',strtotime($logs->updated_at))); ?> • For Order Item
									<b><?php echo e($logs->simple_product->product_name); ?></b> <?php if($logs->user->role_id == 'a'): ?>
									<span class="text-danger"><b><?php echo e($logs->user->name); ?></b> (<?php echo e(__("Admin")); ?>)</span> <?php echo e(__("changed status to")); ?>

									<b><?php echo e($logs->log); ?></b>
									<?php elseif($logs->user->role_id == 'v'): ?>
									<span class="text-primary"><b><?php echo e($logs->user->name); ?></b> (<?php echo e(__("Vendor")); ?>)</span> <?php echo e(__("changed status to")); ?>

									<b><?php echo e($logs->log); ?></b>
									<?php else: ?>
									<span class="text-success"><b><?php echo e($logs->user->name); ?></b> (<?php echo e(__('Customer')); ?>)</span> <?php echo e(__("changed status to")); ?>

									<b><?php echo e($logs->log); ?></b>
									<?php endif; ?> </small>
								<?php endif; ?>

								<p></p>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</span>
							<?php endif; ?>
							<!-- ============================== -->

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/show.blade.php ENDPATH**/ ?>