
<?php $__env->startSection('title',__('Edit Order :orderid | ',['orderid' => $inv_cus->order_prefix.$order->order_id])); ?>
<?php $__env->startSection('body'); ?>

<?php $__env->startComponent('admin.component.breadcumb',['secondaryactive' => 'active']); ?>
<?php $__env->slot('heading'); ?>
<?php echo e(__('Order')); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('menu1'); ?>
<?php echo e(__("Edit Order")); ?>

<?php $__env->endSlot(); ?>
<?php $__env->slot('button'); ?>
<div class="col-md-6">
  <div class="widgetbar">
  <a href="<?php echo e(url('admin/order')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
  </div>
</div>
<?php $__env->endSlot(); ?>

<?php echo $__env->renderComponent(); ?>

<div class="contentbar">
  <div class="row">
    
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
          <h5 class="box-title"><?php echo e(__('Edit Order')); ?> <?php echo e($order->order_id); ?></h5>
        </div>
        <div class="card-body ml-2">
         <!-- main content start -->

         <!-- form start -->
    <!-- Checking Mnaual payment -->

		<?php if($order->manual_payment == '1'): ?>
			<div class="alert alert-info p-1">
				<i class="fa fa-info-circle"></i> <?php echo e(__("This order is placed using")); ?> <?php echo e(ucfirst($order->payment_method)); ?> <?php echo e(__("method and purchase proof you can view")); ?> <a href="<?php echo e(url('images/purchase_proof/'.$order->purchase_proof)); ?>"
					data-lightbox="image-1" data-title="<?php echo e(__("Purchase proof for")); ?> <?php echo e($order->order_id); ?>"><?php echo e(__("here")); ?></a> <?php echo e(__("and")); ?> <?php echo e(__("after verify you can change the order status")); ?>.
			</div>
		<?php endif; ?>

		<!-- Printing order cancel logs-->

		<?php if(count($order->cancellog)): ?>

			<div class="alert alert-danger">

				<?php $__currentLoopData = $order->cancellog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<p class="font-weight500 font-familycalibri">
						<i class="fa fa-info-circle"></i>
						<b><?php echo e(date('d-m-Y | h:i A',strtotime($orderlog->updated_at))); ?> • <?php echo e(__("For Order")); ?>

							#<?php echo e($inv_cus->order_prefix.$order->order_id); ?> • <?php echo e(__("Item")); ?> <?php echo e($orderlog->singleOrder->variant->products->name ?? $orderlog->singleOrder->simple_product->product_name); ?> <?php if($orderlog->singleOrder->variant): ?> (<?php echo e(variantname($orderlog->singleOrder->variant)); ?>) <?php endif; ?> <?php echo e(__("has been cancelled")); ?>

							<?php echo e($order->payment_method == 'COD' ? "." : ""); ?></b>

						<?php if($orderlog->method_choosen == 'orignal'): ?>

						<b> <?php echo e(__("and Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($orderlog->amount); ?>

							<?php echo e(__("is refunded to its orignal source with TXN ID")); ?> [<?php echo e($orderlog->transaction_id); ?>].</b>


						<?php elseif($orderlog->method_choosen == 'bank'): ?>

							<?php if($orderlog->is_refunded == 'completed'): ?>
							<b> <?php echo e(__("and Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($orderlog->amount); ?>

								<?php echo e(__("is refunded to")); ?> <b><?php echo e($orderlog->user->name); ?>'s</b> <?php echo e(__("bank ac")); ?> <?php if(isset($orderlog->bank->acno)): ?>
								XXXX<?php echo e(substr($orderlog->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__("with TXN/REF No")); ?> <?php echo e($orderlog->transaction_id); ?>

								<?php if($orderlog->txn_fee !=''): ?><br> <?php echo e(__("(TXN FEE APPLIED)")); ?> <i class="<?php echo e($order->paid_in); ?>"></i>
								<?php echo e($orderlog->txn_fee); ?> <?php endif; ?>.</b>
							<?php else: ?>
							<b><?php echo e(__("Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($orderlog->amount); ?>

								<?php echo e(__("is pending to")); ?> <b><?php echo e($orderlog->user->name); ?>'s</b> <?php echo e(__("bank ac")); ?> <?php if(isset($orderlog->bank->acno)): ?>
								<?php echo e(__("XXXX")); ?><?php echo e(substr($orderlog->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__("with TXN/REF. No:")); ?> <?php echo e($orderlog->transaction_id); ?>.</b>
							<?php endif; ?>

						<?php endif; ?>
					</p>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			</div>

		<?php endif; ?>

		<!-- Printing refund logs if any -->

		<?php if($order->refundlogs()->count() > 0): ?>

			<?php $__currentLoopData = $order->refundlogs->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rlogs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<?php
					
					$orivar2 = App\AddSubVariant::withTrashed()->find($rlogs->getorder->variant_id);
			
				?>

				<?php if($orivar2): ?>

					<div class="alert alert-danger">
						<p><i class="fa fa-info-circle"></i> <?php echo e(date('d-m-Y | h:i A',strtotime($rlogs->updated_at))); ?> • Item
							<b><?php echo e($orivar2->products->name); ?> (<?php echo e(variantname($orivar2)); ?>) </b> has been <?php if($rlogs->getorder->status == 'return_request'): ?>
								<?php echo e(__("requested for return")); ?>

							<?php else: ?>
							<?php if($rlogs->getorder->status == 'ret_ref'): ?>
								<?php echo e(__("Returned and refunded")); ?>

							<?php else: ?>
								<?php echo e(ucfirst($rlogs->getorder->status)); ?>

							<?php endif; ?>
							<?php endif; ?>

							<?php if($rlogs->method_choosen == 'orignal'): ?>

							<?php echo e(__("and Amount")); ?> <i class="<?php echo e($rlogs->getorder->order->paid_in); ?>"></i><?php echo e($rlogs->amount); ?> <?php echo e(__("is")); ?> <?php echo e($rlogs->status); ?> <?php echo e(__("to its orignal source with TXN ID:")); ?> <b><?php echo e($rlogs->txn_id); ?></b>.


							<?php elseif($rlogs->method_choosen == 'bank'): ?>
							<?php if($rlogs->status == 'refunded'): ?>
								<?php echo e(__("and Amount")); ?> <i class="<?php echo e($rlogs->getorder->order->paid_in); ?>"></i><?php echo e($rlogs->amount); ?>

								<?php echo e(__("is")); ?> <?php echo e($rlogs->status); ?> <?php echo e(__("to")); ?> <b><?php echo e($rlogs->user->name); ?></b> <?php echo e(__("'s bank ac")); ?> <?php if(isset($rlogs->bank->acno)): ?>
								XXXX<?php echo e(substr($rlogs->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__("with TXN ID:")); ?> <b><?php echo e($rlogs->txn_id); ?> <?php if($rlogs->txn_fee
									!=''): ?> <br> (<?php echo e(__("TXN FEE APPLIED")); ?>) <b><i
											class="<?php echo e($rlogs->getorder->order->paid_in); ?>"></i><?php echo e($rlogs->txn_fee); ?></b> <?php endif; ?></b>.
							<?php else: ?>
								<?php echo e(__("and Amount")); ?> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($rlogs->amount); ?>

								<?php echo e(__("is pending to")); ?> <b><?php echo e($rlogs->user->name); ?></b> <?php echo e(__("'s bank ac")); ?> <?php if(isset($rlogs->bank->acno)): ?>
								XXXX<?php echo e(substr($rlogs->bank->acno, -4)); ?> <?php endif; ?> <?php echo e(__('with TXN ID/REF NO:')); ?> <b><?php echo e($rlogs->txn_id); ?></b>
							<?php if($rlogs->txn_fee !=''): ?> <br> (<?php echo e(__("TXN FEE APPLIED")); ?>) <b><i
									class="<?php echo e($rlogs->getorder->order->paid_in); ?>"></i><?php echo e($rlogs->txn_fee); ?></b> <?php endif; ?>.
							<?php endif; ?>
							<?php endif; ?>
						</p>
					</div>

				<?php endif; ?>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<?php endif; ?>
		
	
				<div class="row">
						<!-- ----------------------- -->
						<div class="col-md-6">
							<div class="card m-b-30 bg-primary-rgba text-muted rounded p-2 mt-2">
								<div class="card-body">
									<p class="card-text"><b><?php echo e(__("Order Placed On :")); ?></b> <?php echo e(date('d/m/Y - h:i a', strtotime($order->created_at))); ?></p>
									<p class="card-text"><b><?php echo e(__("Order ID :")); ?></b> <?php echo e($inv_cus->order_prefix.$order->order_id); ?></p>
									<p class="card-text"><b><?php echo e(__("Total qty. :")); ?></b> <?php echo e($order->qty_total); ?></p>
									<p class="card-text"><b><?php echo e(__("Order Total :")); ?></b> <?php echo e(round($order->order_total,2)); ?></p>
								
								</div>
							</div>  
                        </div>
						
						<div class="col-md-6 ">
							<div class="card m-b-30 bg-primary-rgba text-muted rounded p-2 mt-2">
								<div class="card-body">
									<p class="card-text"><b><?php echo e(__("Payment method :")); ?></b> <?php echo e(ucfirst($order->payment_method)); ?></p>
									<p class="card-text"><b><?php echo e(__("Transcation ID :")); ?></b> <?php echo e($order->transaction_id); ?></p>
									<p class="card-text"><b><?php echo e(__("Payment Received")); ?></b>
									</p>

									<?php if($order->payment_method != 'COD' && $order->payment_method != 'BankTransfer'): ?>
									<p><?php echo e(ucfirst($order->payment_receive)); ?></p>
									<?php else: ?>
									<select class="form-control selected2" name="pay_confirm" id="pay_confirm">
										<option <?php echo e($order->payment_receive == 'yes' ? "selected" : ""); ?> value="yes">Yes</option>
										<option <?php echo e($order->payment_receive == 'no' ? "selected" : ""); ?> value="no">No</option>
									</select>
									<?php endif; ?>
								
								</div>
							</div>  
                    	</div>
						<!-- ----------------------- -->

						<!-- ------ Delivery Address start ----------------- -->
						<div class="col-md-6">
							<div class="card m-b-30 bg-primary-rgba text-muted rounded p-2 mt-2">
							<div class="card-header">
                                <h5 class="card-title"><?php echo e(__("Delivery Address")); ?></h5>
                            </div>
								<div class="card-body">
								<?php if($order->shippingaddress): ?>
									<p><b><?php echo e($order->shippingaddress->name); ?></b></p>
									<p><i class="fa fa-envelope-o" aria-hidden="true"></i>
										<a href="mailto:<?php echo e($order->shippingaddress->email); ?>">
											<?php echo e($order->shippingaddress->email); ?>

										</a>
									</p>
								<?php if($order->shippingaddress->phone != ''): ?>
									<p><i class="fa fa-phone"></i>
										<a href="tel:<?php echo e($order->shippingaddress->phone); ?>"><?php echo e($order->shippingaddress->phone); ?></a>
									</p>
								<?php endif; ?>








							<?php endif; ?>
								
								</div>
							</div>  
                    	</div>
						<!-- -------- Delivery Address end --------------- -->

						<!-- ------ Billing Address start ----------------- -->
						<div class="col-md-6">
							<div class="card m-b-30 bg-primary-rgba text-muted rounded p-2 mt-2">
							<div class="card-header">
                                <h5 class="card-title"><?php echo e(__("Billing Address")); ?></h5>
                            </div>
								<div class="card-body">
								<p><b><?php echo e($order->billing_address['firstname']); ?></b></p>
								<p><i class="fa fa-envelope-o" aria-hidden="true"></i> 



								</p>
								<?php if($order->billing_address['mobile'] != ''): ?>
									<p><i class="fa fa-phone"></i>
										<a href="tel:<?php echo e($order->billing_address['mobile']); ?>">
											<?php echo e($order->billing_address['mobile']); ?>

										</a>
									</p>
								<?php endif; ?>

								<?php

//
//									$c = App\Allcountry::where('id',$order->billing_address['country_id'])->first();
//									$s = App\Allstate::where('id',$order->billing_address['state'])->first()->name;
//									$ci = App\Allcity::where('id',$order->billing_address['city'])->first() ? App\Allcity::where('id',$order->billing_address['city'])->first()->name : '';

								?>











								
								</div>
							</div>  
                    	</div>
						<!-- -------- Billing Address end --------------- -->

						
					<div class="col-md-12">
						<?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($invoice->local_pick != '' && !in_array($invoice->status,['return_request','refunded','ret_ref','Refund Pending'])): ?>
								<div class="alert alert-success">
									<?php if(isset($invoice->variant)): ?>
										<?php
											$orivar = $invoice->variant;
										?>
									<i class="fa fa-info-circle"></i> <?php echo e(__("For Item")); ?> <b><?php echo e($invoice->variant->products->name); ?> <small>
											(<?php echo e(variantname($orivar)); ?>)
						
										</small></b> <?php endif; ?> <?php if($invoice->simple_products): ?> <?php echo e($invoice->simple_products->product_name); ?> <?php endif; ?> <?php echo e(__("Customer has choosen Local Pickup.")); ?> <?php if($invoice->status != 'delivered'): ?>
										<?php echo e(__("Estd Delivery date:")); ?> <span id="estddate<?php echo e($invoice->id); ?>">
										<?php echo e($invoice->loc_deliv_date == '' ? __("Yet to update") : date('d-m-Y',strtotime($invoice->loc_deliv_date))); ?>

						
										<?php else: ?>
										<?php echo e(__('Item Delivered On:')); ?> <span id="estddate<?php echo e($invoice->id); ?>">
											<?php echo e($invoice->loc_deliv_date == '' ? __("Yet to update") : date('d-m-Y',strtotime($invoice->loc_deliv_date))); ?>

											<?php endif; ?>
										</span>
								</div>
							<?php endif; ?>

							<?php if($invoice->local_pick !='' && !in_array($invoice->status,['delivered','return_request','refunded','ret_ref','Refund Pending'])): ?>
								
									<div class="row">
										
										<div class="col-md-6">
										<p class="font-weight-bold"><?php echo e(__('Update Local Pickup Delivery dates:')); ?> </p>
										
											<?php if($invoice->variant): ?>
											<?php
												$orivar = $invoice->variant;
											?>
											<h4 class="text-dark font-weight-bold"><?php echo e($invoice->variant->products->name); ?> <small>(<?php echo e(variantname($orivar)); ?>)</small>
											</h4>
											<?php endif; ?>

											<?php if($invoice->simple_product): ?>
												<?php echo e($invoice->simple_product->product_name); ?>

											<?php endif; ?>
										</div>
										<div class="col-md-6">
										<form method="POST" action="<?php echo e(route('update.local.delivery',$invoice->id)); ?>">
											<?php echo csrf_field(); ?>
											<div class="row">
											<div class="col-md-8">
												<div class='input-group date lcpdate'>
													<!-- ---------- -->
													<input type="text" id="default-date" value="<?php echo e(date('Y-m-d',strtotime($invoice->loc_deliv_date))); ?>" class="form-control" required="" name="del_date" />
													<div class="input-group-append">
														<span class="input-group-text" id="basic-addon2"><i class="feather icon-calendar"></i></span>
													</div>
													
													
												</div>
											</div>
												<div class="col-md-4">
													<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i><?php echo e(__("Save")); ?></button>
												</div>
											</div>

										
										</form>
										</div>
									</div>
								
								<br>
							<?php endif; ?>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>

					<!-- Order Summary -->
                   <div class="col-md-12">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th><?php echo e(__("Invoice No")); ?></th>
								<th><?php echo e(__("Item Name")); ?></th>
								<th><?php echo e(__("Qty")); ?></th>
								<th><?php echo e(__("Status")); ?></th>
								<th><?php echo e(__("Pricing & Tax")); ?></th>
								<th><?php echo e(__("Total")); ?></th>
								<th><?php echo e(__("Action")); ?></th>
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
												<?php if($invoice->variant->variantimages): ?>
													<img width="70px" class="object-fit"
													src="<?php echo e(url('variantimages/'.$invoice->variant->variantimages['main_image'])); ?>" alt="">
												<?php else: ?>
													<img width="70px" class="object-fit"
													src="<?php echo e(Avatar::create($invoice->variant->products->name)->toBase64()); ?>" alt="">
												<?php endif; ?>
											<?php endif; ?>
		
											<?php if(isset($invoice->simple_product)): ?>
												<img width="60px" class="object-fit" src="<?php echo e(url('images/simple_products/'.$invoice->simple_product['thumbnail'])); ?>" alt="">
											<?php endif; ?>
										</div>
		
										<div class="col-md-8">
											<?php if(isset($invoice->variant)): ?>
											
											<a class="text-justify" target="_blank" 
												href="<?php echo e(App\Helpers\ProductUrl::getUrl($invoice->variant->id)); ?>"><b><?php echo e(substr($invoice->variant->products->name, 0, 25)); ?><?php echo e(strlen($invoice->variant->products->name)>25 ? '...' : ""); ?></b>
		
												<small>
												
													(<?php echo e(variantname($invoice->variant)); ?>)
		
												</small>
											</a>
											<?php endif; ?>
		
											<?php if($invoice->simple_product): ?>
											<a class="text-justify" href="<?php echo e(route('show.product',['id' => $invoice->simple_product->id, 'slug' => $invoice->simple_product->slug])); ?>" target="_blank">
												<b><?php echo e($invoice->simple_product->product_name); ?></b>
											</a>
											<?php endif; ?>
											<br>







											<br>
											<small><b><?php echo e(__('Price:')); ?></b>
												<i class="<?php echo e($invoice->order->paid_in); ?>"></i>
		
												<?php echo e(round(($invoice->price),2)); ?>

		
											</small>
											<br>
											<small><b><?php echo e(__("Tax:")); ?></b> <i class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($invoice->tax_amount,2)); ?></small>
		
										</div>
									</div>
								</td>

								<td>
									<?php echo e($invoice->qty); ?>

								</td>

								<td>	
									<div id="singleorderstatus<?php echo e($invoice->id); ?>">
										<?php if($invoice->status == 'delivered'): ?>
										<span class="badge badge-pill badge-success"><?php echo e(ucfirst($invoice->status)); ?></span>
										<?php elseif($invoice->status == 'processed'): ?>
										<span class="badge badge-pill badge-info"><?php echo e(ucfirst($invoice->status)); ?></span>
										<?php elseif($invoice->status == 'shipped'): ?>
										<span class="badge badge-pill badge-primary"><?php echo e(ucfirst($invoice->status)); ?></span>
										<?php elseif($invoice->status == 'return_request'): ?>
										<span class="badge badge-pill badge-warning">
											<?php echo e(__("Return Requested")); ?>

										</span>
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
											<?php echo e(__('Canceled')); ?>

										</span>
										<?php elseif($invoice->status == 'refunded'): ?>
										<span class="badge badge-pill badge-danger">
											<?php echo e(__("Refunded")); ?>

										</span>
										<?php elseif($invoice->status == 'ret_ref'): ?>
										<span class="badge badge-pill badge-success">
											<?php echo e(__("Return & Refunded")); ?>

										</span>
										<?php else: ?>
										<span class="badge badge-pill badge-default"><?php echo e(ucfirst($invoice->status)); ?></span>
										<?php endif; ?>

									</div>

									<br>

										<?php if($invoice->status == 'Refund Pending' || $invoice->status == 'canceled' || $invoice->status == 'refunded' || $invoice->status == 'returned' || $invoice->status == 'refunded' || $invoice->status == 'ret_ref' || $invoice->status == 'return_request'): ?>
										<select disabled="" class="form-control select2">
											<option <?php echo e($invoice->status =="pending" ? "selected" : ""); ?> value="pending"> <?php echo e(__('Pending')); ?>

											</option>
											<option <?php echo e($invoice->status =="processed" ? "selected" : ""); ?> value="processed"> <?php echo e(__('Processed')); ?>

											</option>
											<option <?php echo e($invoice->status =="delivered" ? "selected" : ""); ?> value="delivered"> <?php echo e(__("Delivered")); ?>

											</option>

											<option <?php echo e($invoice->status =="return_request" ? "selected" : ""); ?> value="return_request">
												<?php echo e(__('Return Requested')); ?>

											</option>
											<option <?php echo e($invoice->status =="returned" ? "selected" : ""); ?> value="returned"> <?php echo e(__("Returned")); ?>

											</option>
											<option <?php echo e($invoice->status =="cancel_request" ? "selected" : ""); ?> value="cancel_request">
												<?php echo e(__("Canceled Request")); ?>

												</option>

											<option <?php echo e($invoice->status =="canceled" ? "selected" : ""); ?> value="canceled"> <?php echo e(__('Canceled')); ?>

											</option>

											<option <?php echo e($invoice->status =="refunded" ? "selected" : ""); ?> value="refunded"> <?php echo e(__('Refunded')); ?>

											</option>

											<option <?php echo e($invoice->status =="Refund Pending" ? "selected" : ""); ?> value="refunded"> <?php echo e(__("Refund pending")); ?>

											</option>

											<option <?php echo e($invoice->status =="ret_ref" ? "selected" : ""); ?> value="refunded">
												<?php echo e(__("Return & Refunded")); ?>

											</option>

										</select>
										<?php else: ?>
										<select data-placeholder="<?php echo e(__("Change order status")); ?>" name="status" id="status<?php echo e($invoice->id); ?>" onchange="changeStatus('<?php echo e($invoice->id); ?>')" class="select2 form-control">
											<option value=""><?php echo e(__("Change order status")); ?></option>
											<option <?php echo e($invoice->status =="pending" ? "selected" : ""); ?> value="pending"> <?php echo e(__("Pending")); ?>

											</option>
											<option <?php echo e($invoice->status =="processed" ? "selected" : ""); ?> value="processed"> <?php echo e(__("Processed")); ?>

											</option>
											<option <?php echo e($invoice->status =="delivered" ? "selected" : ""); ?> value="delivered"> <?php echo e(__("Delivered")); ?>

											</option>

										</select>
										<?php endif; ?>
								</td>

								<td>
									<b><?php echo e(__("Total Price:")); ?></b> <i class="<?php echo e($invoice->order->paid_in); ?>"></i>

									<?php echo e(round(($invoice->price*$invoice->qty),2)); ?>


									<p></p>
									<b><?php echo e(__("Total Tax:")); ?></b> <i
										class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round(($invoice->tax_amount),2)); ?>

									<p></p>
									<b><?php echo e(__("Shipping Charges:")); ?></b> <i
										class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($invoice->shipping,2)); ?>

									<p></p>


									<small class="help-block">(<?php echo e(__("Price & TAX Multiplied with Quantity")); ?>)</small>
									<p></p>
								</td>

								<td>
									<i class="<?php echo e($invoice->order->paid_in); ?>"></i>
			
									<?php echo e(round($invoice->qty*($invoice->price+$invoice->tax_amount)+$invoice->shipping,2)); ?>

			
									<br>
									<small>
										<?php echo e(__("(Incl. of TAX & Shipping)")); ?>

									</small>
								</td>

								<td>
								<!-- ------------------------------ -->
								<div class="dropdown">
									<button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
									<div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
										
										<?php if(!in_array($invoice->status,['canceled','delivered','Refund Pending','ret_ref','refunded','return_request'])): ?>
											<li role="presentation">
												<a class="dropdown-item" href="<?php echo e(route("update.invoice",$invoice->id)); ?>">
													<i class="fa fa-truck"></i> <?php echo e($invoice->status != 'shipped' ? __("Ship") : __("Edit Shipping")); ?>

												</a>
											</li>
										<?php endif; ?>

										<?php if(isset($invoice->variant) && $invoice->variant->products->cancel_avl != 0 && !in_array($invoice->status,['shipped','canceled','delivered','Refund Pending','ret_ref','refunded','return_request','shipped'])): ?>

										
											<li class="divider"></li>
											<li role="presentation">

												<a role="button" class="dropdown-item" id="canbtn<?php echo e($invoice->id); ?>" data-toggle="modal"
													data-target="#singleordercancel<?php echo e($invoice->id); ?>"  title="Cancel this order?">
													<i class="fa fa-ban"></i> <?php echo e(__("Cancel")); ?>

												</a>

											</li>


										<?php endif; ?>

									
										<?php if(isset($invoice->simple_product) && $invoice->simple_product->cancel_avbl != 0 && !in_array($invoice->status,['shipped','canceled','delivered','Refund Pending','ret_ref','refunded','return_request','shipped'])): ?>

													<div class="divider"></div>
													<li role="presentation">

														<a role="button" class="dropdown-item" id="canbtn<?php echo e($invoice->id); ?>" data-toggle="modal"
															data-target="#singleordercancel<?php echo e($invoice->id); ?>"  title="<?php echo e(__("Cancel this order?")); ?>">
															<i class="fa fa-ban"></i> <?php echo e(__("Cancel")); ?>

														</a>

													</li>


										<?php endif; ?>

									</div>
								</div>
								<!-- ------------------------------ -->
		
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>

				</div>
			</div>
		</div>

		<div class="col-md-12 ml-2">
			<h4>
				<?php echo e(__("Order Activity Logs")); ?>

			</h4>

		    <?php if(count($order->orderlogs) < 1): ?> <span id="ifnologs"> <?php echo e(__("No activity logs for this order")); ?> <br></span>

			<?php endif; ?>

			<small><b>#<?php echo e($inv_cus->order_prefix); ?><?php echo e($order->order_id); ?></b><br></small>

			<span id="logs">
				<?php $__currentLoopData = $order->orderlogs->sortByDesc('id'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
						<b><?php echo e($orivar->products->name); ?> (<?php echo e(variantname($orivar)); ?>) </b>
						: <?php if($logs->user->role_id == 'a'): ?>
						<span class="text-danger"><b><?php echo e($logs->user->name); ?></b> (<?php echo e(__('Admin')); ?>)</span> <?php echo e(__("changed")); ?> <?php echo e(__("status to")); ?>

						<b><?php echo e($logs->log); ?></b>
						<?php elseif($logs->user->role_id == 'v'): ?>
						<span class="text-primary"><b><?php echo e($logs->user->name); ?></b> (<?php echo e(__("Vendor")); ?>)</span> <?php echo e(__("changed")); ?> <?php echo e(__("status to")); ?>

						<b><?php echo e($logs->log); ?></b>
						<?php else: ?>
						<span class="text-success"><b><?php echo e($logs->user->name); ?></b> (<?php echo e(__("Customer")); ?>)</span> <?php echo e(__("changed")); ?> <?php echo e(__("status to")); ?>

						<b><?php echo e($logs->log); ?></b>
						<?php endif; ?>

					</small>
					<?php endif; ?>

					<?php if(isset($logs->simple_product)): ?>
						<small><?php echo e(date('d-m-Y | h:i:a',strtotime($logs->updated_at))); ?> • For Order Item <b><?php echo e($logs->simple_product->product_name); ?></b> <?php if($logs->user->role_id == 'a'): ?>
							<span class="text-danger"><b><?php echo e($logs->user->name); ?></b> (Admin)</span> <?php echo e(__("changed status to")); ?>

							<b><?php echo e($logs->log); ?></b>
							<?php elseif($logs->user->role_id == 'v'): ?>
							<span class="text-primary"><b><?php echo e($logs->user->name); ?></b> (Vendor)</span> <?php echo e(__("changed status to")); ?>

							<b><?php echo e($logs->log); ?></b>
							<?php else: ?>
							<span class="text-success"><b><?php echo e($logs->user->name); ?></b> (Customer)</span> <?php echo e(__("changed status to")); ?>

							<b><?php echo e($logs->log); ?></b>
							<?php endif; ?> </small>
					<?php endif; ?>

				<p></p>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</span>
		</div>
        
         <!-- main content end -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

	<?php if(!in_array($o->status,['shipped','canceled','delivered','Refund Pending','ret_ref','refunded','return_request'])): ?>
		
		<div data-backdrop="static" data-keyboard="false" class="modal fade" id="singleordercancel<?php echo e($o->id); ?>" tabindex="-1"
			role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">
							<?php echo e(__("Cancel Item: ")); ?>


							<?php if(isset($o->simple_product)): ?>
								<?php echo e($o->simple_product->product_name); ?>

							<?php endif; ?>

							<?php if(isset($o->variant)): ?>
								<?php echo e($o->variant->products->name); ?>

								(<?php echo e(variantname($o->variant)); ?>)
							<?php endif; ?>
						</h4>
						<button type="button" class="float-right close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span></button>
						
					</div>

					<div class="modal-body">
					
						
						<form action="<?php echo e(route('cancel.item', Crypt::encrypt($o->id))); ?>" method="POST">
							<?php echo csrf_field(); ?>
							<div class="form-group">
								<label for=""><?php echo e(__('Choose Reason')); ?> <span class="required">*</span></label>
								<select class="form-control" required="" name="comment" id="">
									 <option value=""><?php echo e(__('Please Choose Reason')); ?></option>
			  
									  <?php $__empty_1 = true; $__currentLoopData = App\RMA::where('status','=','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<option value="<?php echo e($rma->reason); ?>"><?php echo e($rma->reason); ?></option>
									  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<option value="Other"><?php echo e(__('My Reason is not listed here')); ?></option>
									  <?php endif; ?>
									  
								</select>
							</div>
							<?php if($order->payment_method !='COD' && $order->payment_method !=' BankTransfer'): ?>
							<div class="form-group">

								<label for=""><?php echo e(__("Choose Refund Method:")); ?></label>
								<label><input onclick="hideBank('<?php echo e($o->id); ?>')" id="source_check_o<?php echo e($o->id); ?>" required
										type="radio" value="orignal" name="source" />Orignal Source
									[<?php echo e($o->order->payment_method); ?>] </label>&nbsp;&nbsp;
								<?php if($order->user->banks->count()>0): ?>
								<label><input onclick="showBank('<?php echo e($o->id); ?>')" id="source_check_b<?php echo e($o->id); ?>" required
										type="radio" value="bank" name="source" /><?php echo e(__("In Bank")); ?> </label>
								<?php else: ?>
								<label><input disabled="disabled" type="radio" /> <?php echo e(__("In Bank")); ?> <i class="fa fa-question-circle"
										data-toggle="tooltip" data-placement="right"
										title="<?php echo e(__("Add a bank account in My Bank Account")); ?>" aria-hidden="true"></i></label>
								<?php endif; ?>

								<select name="bank_id" id="bank_id_single<?php echo e($o->id); ?>" class="form-control display-none">
									<?php $__currentLoopData = $order->user->banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option value="<?php echo e($bank->id); ?>"><?php echo e($bank->bankname); ?> (<?php echo e($bank->acno); ?>)</option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>

							</div>


							<?php else: ?>

							<?php if($order->user->banks->count()>0): ?>
							<label><input onclick="showBank('<?php echo e($o->id); ?>')" id="source_check_b<?php echo e($o->id); ?>" required
									type="radio" value="bank" name="source" /><?php echo e(_("In Bank")); ?> </label>
							<?php else: ?>
							<label><input disabled="disabled" type="radio" /> <?php echo e(__("In Bank")); ?> <i class="fa fa-question-circle"
									data-toggle="tooltip" data-placement="right" title="Add a bank account in My Bank Account"
									aria-hidden="true"></i></label>
							<?php endif; ?>

							<select name="bank_id" id="bank_id_single<?php echo e($o->id); ?>" class="display-none form-control">
								<?php $__currentLoopData = $order->user->banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<option value="<?php echo e($bank->id); ?>"><?php echo e($bank->bankname); ?> (<?php echo e($bank->acno); ?>)</option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select>


							<?php endif; ?>

							<div class="alert alert-info">
								<h5><i class="fa fa-info-circle"></i> <?php echo e(__("Important !")); ?></h5>

								<ol class="ol">
									<li>
										<?php echo e(__('IF Original source is choosen than amount will be reflected to User\'s orignal source in 1-2 days(approx).')); ?>

									</li>

									<li>
										<?php echo e(__("IF Bank Method is choosen than make sure User added a bank account else refund will not procced. IF already added than it will take 14 days to reflect amount in users bank account (Working Days*).")); ?>

									</li>

									<li>
										<?php echo e(__("Amount will be paid in original currency which used at time of placed order.")); ?>

									</li>

								</ol>
							</div>
							<button type="submit" class="btn btn-md btn-primary">
								<?php echo e(__("Procced")); ?>...
							</button>
							<p></p>
							<p class="bg-danger-rgba p-3 help-block">
								<?php echo e(__("This action cannot be undone !")); ?>

							</p>
							<p class="bg-danger-rgba p-3 help-block">
								<?php echo e(__("It will take time please do not close or refresh window !")); ?>

							</p>
						</form>

						

					</div>


				</div>
			</div>
		</div>
			
	<?php endif; ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
	var url 	 = <?php echo json_encode(url('/update/orderstatus'), 15, 512) ?>;
	var userrole = <?php echo json_encode(auth()->user()->role_id, 15, 512) ?>;
	var username = <?php echo json_encode(auth()->user()->name, 15, 512) ?>;
	var orderid  = <?php echo json_encode($order->id, 15, 512) ?>;
</script>
<script src="<?php echo e(url('js/editorder.js')); ?>"></script>
<script src="<?php echo e(url('js/order.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/edit.blade.php ENDPATH**/ ?>