<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Soyuz is a bootstrap minimal & clean admin template">
    <meta name="keywords" content="admin, admin panel, admin template, admin dashboard, responsive, bootstrap 4, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<title>Print Order: <?php echo e($inv_cus->order_prefix.$order->order_id); ?></title>
	<link href="<?php echo e(url('admin_new/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo e(url('css/font-awesome.min.css')); ?>">

	<link href="<?php echo e(url('admin_new/assets/plugins/datatables/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo e(url('admin_new/assets/css/style.css')); ?>" rel="stylesheet" type="text/css">
   
</head>
<body class="vertical-layout">
   <div class="row">
	   <div class="col-md-2 offset-md-10">
		<a href="<?php echo e(route('show.order',$order->order_id)); ?>" class="d-print-none btn btn-primary-rgba mt-2 ml-5"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>   
	   </div>
	
   </div>
	
     
            <div class="contentbar">   
				   
				<?php
				$user = $order->user;

				$address = $order->shippingaddress;

//				if($user->country_id !=''){
//				$c = App\Allcountry::where('id',$user->country_id)->first()->nicename;
//				$s = App\Allstate::where('id',$user->state_id)->first()->name;
//				$ci = App\Allcity::where('id',$user->city_id)->first() ? App\Allcity::where('id',$user->city_id)->first()->name : '';
//				}

				?>     
                
                <div class="row justify-content-center">
                  
                    <div class="col-md-11">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="invoice">
                                    <div class="invoice-head">
                                        <div class="row">
                                            <div class="col-12 col-md-7 col-lg-7">
                                                
                                                <h4>
													<?php echo e(__("Customer Information")); ?>

												</h4>
                                                <p><i class="feather icon-user mr-1"></i> <?php echo e($user->name); ?></p>
                                                <p ><i class="feather icon-mail"></i> <?php echo e($user->email); ?></p>
                                                <p ><i class="feather icon-phone mr-1"></i> <?php echo e($user->mobile); ?></p>



                                            </div>
                                            <div class="col-12 col-md-5 col-lg-5">
                                                <div class="invoice-name">
                                                    <h5 class="text-uppercase mb-3">Order Slip</h5>
                                                    
                                                    <p class="mb-1"><?php echo e(__("Total Qty:")); ?> <?php echo e($order->qty_total); ?></p>
                                                    <p class="mb-0"> <?php echo e(date('d/m/Y @ h:i a', strtotime($order->created_at))); ?></p>
													<p class="mb-1"><?php echo e(__("Order Id:")); ?> <?php echo e($inv_cus->order_prefix); ?><?php echo e($order->order_id); ?></p>
                                                    <p class="mb-0"><?php echo e(__("TXN ID:")); ?> <?php echo e($order->transaction_id); ?></p>

                                                    <h4 class="text-success mb-0 mt-3"> <i class="<?php echo e($order->paid_in); ?>"></i><?php echo e(round($order->order_total,2)); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="invoice-billing">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-4 col-lg-4">
                                                <div class="invoice-address">
                                                    <h6 class="mb-3">
														<?php echo e(__("Shipping Address")); ?>

													</h6>
                                                    <h6 class="text-muted"><?php echo e($address->name); ?></h6>
                                                    <ul class="list-unstyled">
                                                        <li><?php echo e(strip_tags($address->address)); ?>,
															<?php
															$user = App\User::findorfail($order->user_id);

//															$c = App\Allcountry::where('id',$address->country_id)->first()->nicename;
//															$s = App\Allstate::where('id',$address->state_id)->first()->name;
//															$ci = App\Allcity::where('id',$address->city_id)->first() ? App\Allcity::where('id',$address->city_id)->first()->name : '';

															?>


															</li>
															<li><?php echo e($address->pin_code); ?></li>    
                                                        <li> <?php echo e($address->phone); ?></li>  
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4 col-lg-4">
                                                <div class="invoice-address">
                                                    <h6 class="mb-3">
														<?php echo e(__("Billing Address")); ?>

													</h6>
                                                    <h6 class="text-muted"><?php echo e($order->billing_address['firstname']); ?></h6>
                                                    <ul class="list-unstyled">
                                                        <li><?php echo e(strip_tags($order->billing_address['address'])); ?>

															<?php
									
									
//															$c = App\Allcountry::where('id',$order->billing_address['country_id'])->first()->nicename;
//															$s = App\Allstate::where('id',$order->billing_address['state'])->first()->name;
//															$ci = App\Allcity::where('id',$order->billing_address['city'])->first() ? App\Allcity::where('id',$order->billing_address['city'])->first()->name : '';
									
															?>

                                                        <li><?php echo e($order->billing_address['pincode'] ?? ''); ?></li>  
                                                        <li> <?php echo e($order->billing_address['mobile']); ?></li>  
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <div class="invoice-address">
                                                    <div class="card">
                                                        <div class="card-body bg-info-rgba text-center">
                                                            <h6>
																<?php echo e(__("Payment Method")); ?>

															</h6>
                                                            <p></p>
                                                            <p><?php echo e(ucfirst($order->payment_method)); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="invoice-summary">
                                        <div class="table-responsive ">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
														<th>
															<?php echo e(__('Invoice No')); ?>

														</th>
														<th>
															<?php echo e(__("Item Info")); ?>

														</th>
														<th>
															<?php echo e(__('Qty')); ?>

														</th>
														<th>
															<?php echo e(__("Status")); ?>

														</th>
														<th>
															<?php echo e(__("Pricing & Tax")); ?>

														</th>
														<th>
															<?php echo e(__("Total")); ?>

														</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
													<?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td>
															<i><?php echo e($inv_cus->prefix); ?><?php echo e($invoice->inv_no); ?><?php echo e($inv_cus->postfix); ?></i>
														</td>
									
														<td width="40%">
															
									
																<div class="row">
																	<div class="col-md-3">
																		<?php if(isset($invoice->variant)): ?>
																			<?php if($invoice->variant->variantimages): ?>
																				<img width="50px" src="<?php echo e(url('variantimages/'.$invoice->variant->variantimages['main_image'])); ?>" alt="">
																			<?php else: ?>
																				<img width="50px" src="<?php echo e(Avatar::create($invoice->variant->products->name)->toBase64()); ?>" alt="">
																			<?php endif; ?>
																		<?php endif; ?>

																		<?php if(isset($invoice->simple_product)): ?>
																			<img width="50px" src="<?php echo e(url('images/simple_products/'.$invoice->simple_product['thumbnail'])); ?>" alt="">
																		<?php endif; ?>
																	</div>
									
																	<div class="col-md-9">
																		<?php if(isset($invoice->variant)): ?>
																		<?php
																			$orivar = $invoice->variant;
																		?>
																		<a class="text-justify" target="_blank" 
																		href="<?php echo e(App\Helpers\ProductUrl::getUrl($orivar->id)); ?>"><b><?php echo e(substr($orivar->products->name, 0, 25)); ?><?php echo e(strlen($orivar->products->name)>25 ? '...' : ""); ?></b>
								
																		<small><?php echo e(variantname($orivar)); ?></small>
																	</a>
																	<?php endif; ?>
								
																	<?php if($invoice->simple_product): ?>
																	<a class="text-justify" href="<?php echo e(route('show.product',['id' => $invoice->simple_product->id, 'slug' => $invoice->simple_product->slug])); ?>" target="_blank">
																		<b><?php echo e($invoice->simple_product->product_name); ?></b>
																	</a>
																	<?php endif; ?>
								
																		<br>








																		<small class="mleft22"><b>Price: </b> <i class="<?php echo e($invoice->order->paid_in); ?>"></i>
									
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
															<span ><?php echo e(ucfirst($invoice->status)); ?></span>
															<?php elseif($invoice->status == 'processed'): ?>
															<span ><?php echo e(ucfirst($invoice->status)); ?></span>
															<?php elseif($invoice->status == 'shipped'): ?>
															<span ><?php echo e(ucfirst($invoice->status)); ?></span>
															<?php elseif($invoice->status == 'return_request'): ?>
															<span ><?php echo e(__("Return Request")); ?></span>
															<?php elseif($invoice->status == 'returned'): ?>
															<span ><?php echo e(__('Returned')); ?></span>
															<?php elseif($invoice->status == 'cancel_request'): ?>
															<span><?php echo e(__("Cancelation Request")); ?></span>
															<?php elseif($invoice->status == 'canceled'): ?>
															<span >
																<?php echo e(__("Canceled")); ?>

															</span>
															<?php elseif($invoice->status == 'refunded'): ?>
															<span >
																<?php echo e(__("Refunded")); ?>

															</span>
															<?php elseif($invoice->status == 'ret_ref'): ?>
															<span >
																<?php echo e(__("Returned & Refunded")); ?>

															</span>
															<?php else: ?>
															<span ><?php echo e(ucfirst($invoice->status)); ?></span>
															<?php endif; ?>
														</td>
									
														<td width="40%">
															<p><?php echo e(__("Total Price:")); ?> <i class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round(($invoice->price*$invoice->qty),2)); ?></p>
									
															
															<p><?php echo e(__("Total Tax:")); ?> <i
																class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round(($invoice->tax_amount*$invoice->qty),2)); ?>

														    </p>
															<p><?php echo e(__("Shipping Charges: ")); ?><i
																class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($invoice->shipping,2)); ?>

															</p>
									
									
															<small class="help-block">(<?php echo e(__("Price & TAX Multiplied with Quantity")); ?>)</small>
															<p></p>
									
									
														</td>
									
									
														<td width="20%">
															<i class="<?php echo e($invoice->order->paid_in); ?>"></i>
									
															<?php echo e(round($invoice->qty*($invoice->price+$invoice->tax_amount)+$invoice->shipping,2)); ?>

									
															<br>
									
															<small>(<?php echo e(__("Incl. of TAX & Shipping")); ?>)</small>
														</td>
													</tr>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="invoice-summary-total">
                                        <div class="row">
                                            <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                                <div class="order-note">
													
                                                    <h6><?php echo e(__("Payment Recieved:")); ?>

                                                    <?php echo e(ucfirst($order->payment_receive)); ?></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                                <div class="order-total table-responsive ">
                                                    <table class="table table-borderless text-right">
                                                        <tbody>
                                                            <tr>
                                                                <td><?php echo e(__("Subtotal:")); ?> </td>
                                                                <td><i class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($order->order_total+$order->discount - $order->gift_charge,2)); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td><?php echo e(__('Coupon Discount:')); ?></td>
                                                                <td><i class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($order->discount,2)); ?></b>
																	(<?php echo e($order->coupon); ?>)</td>
                                                            </tr>
                                                            <tr>
                                                                <td>
																	<?php echo e(__("Gift Packaging Charge:")); ?>

																</td>
                                                                <td>+ <i class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($order->gift_charge,2)); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>
																	<?php echo e(__('Handling Charge:')); ?>

																</td>
                                                                <td>+ <i class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($order->handlingcharge,2)); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="f-w-7 font-18"><h5>Grand Total:</h5></td>
                                                                <td class="f-w-7 font-18"><h5><i class="<?php echo e($invoice->order->paid_in); ?>"></i><?php echo e(round($order->order_total+$order->handlingcharge,2)); ?></h5></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <div class="invoice-footer">
                                        <div class="row align-items-center">
                                            <div class="col-md-6">
                                                <p class="mb-0">
													<?php echo e(__("Thank you for your Business.")); ?>

												</p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="invoice-footer-btn">
                                                    <a href="javascript:window.print()" class="btn btn-primary-rgba py-1 font-16"><i class="feather icon-printer mr-2"></i>Print</a>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
       
    
</body>
</html>
   
	
	



	
	



	<?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/printorder.blade.php ENDPATH**/ ?>