<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title><?php echo e(__('Print Invoice:')); ?> <?php echo e($inv_cus->prefix.$getInvoice->inv_no.$inv_cus->postfix); ?></title>
	<link rel="stylesheet" href="<?php echo e(url('css/bootstrap.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(url('css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(url('admin/css/style.css')); ?>">
	<style>
		body {
			background-color: #000
		}

		.padding {
			padding: 2rem !important
		}

		.card {
			margin-bottom: 30px;
			border: none;
			-webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
			-moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
			box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
		}

		.card-header {
			background-color: #fff;
			border-bottom: 1px solid #e6e6f2
		}

		h3 {
			font-size: 20px
		}

		h5 {
			font-size: 15px;
			line-height: 26px;
			color: #3d405c;
			margin: 0px 0px 15px 0px;
			font-family: 'Circular Std Medium';
		}

		.text-dark {
			color: #3d405c !important;
		}


		.page_border{
			border: <?php echo $design->border_radius ?? 0 ?>px;
			border-color : <?php echo $design->border_color ?? '#000000' ?>;
			border-style: <?php echo $design->border_style ?? 0 ?>;
		}
		
	</style>
</head>

<?php

if(isset($getInvoice->variant)){
	$orivar = App\AddSubVariant::withTrashed()->find($getInvoice->variant_id);
//	$store = App\Store::where('id',$orivar->products->store_id)->first();
}

//if(isset($getInvoice->simple_product)){
//	$store = $getInvoice->simple_product->store;
//}

?>
<div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
	
	
	<div class="card page_border">
		
		<div class="card-header p-4">
			
			<div class="d-print-none row">
				<div class="col-md-6">
					
				</div>
				<div class="col-md-6">
					
					<button title="<?php echo e(__("Print Invoice")); ?>" onclick="printit()" class="float-right btn btn-md btn-secondary">
						<i class="fa fa-print"></i>
					</button>

					<a title="<?php echo e(__("Go back")); ?>" href="<?php echo e(url()->previous()); ?>" class="mr-2 float-right btn btn-md btn-secondary">
						<i class="fa fa-arrow-left"></i>
					</a>
				</div>
				
			</div>
			<hr class="d-print-none">

			<div class="mt-4 float-right">
				
				<h3 class="mb-0"><?php echo e(__("Tax Invoice")); ?> #<?php echo e($inv_cus->prefix.$getInvoice->inv_no.$inv_cus->postfix); ?></h3>
				<hr>
				<?php echo e(__("Date:")); ?> <b><?php echo e(date($design->date_format,strtotime($getInvoice->created_at))); ?></b>
				<br>
				<?php echo e(__("Transcation ID:")); ?> <b><?php echo e($getInvoice->order->transaction_id); ?> </b>
				
				
			</div>

			<a class="pt-2 d-inline-block" href="<?php echo e(url('/')); ?>" data-abc="true">
			<?php if(isset($design) && $design->show_logo == 1): ?>
				<img width="50px" src="<?php echo e(url('images/genral/'.$fevicon)); ?>">
			<?php endif; ?>
				<?php echo e($title); ?>

			</a>
			<br> <br>
			<?php echo e(__("Order ID:")); ?> <b>#<?php echo e($inv_cus->order_prefix.$getInvoice->order->order_id); ?></b>
			<br>
			<?php echo e(__("Payment method:")); ?> <b><?php echo e($getInvoice->order->payment_method); ?></b>

			
		</div>
		<div class="card-body">
			<div class="row mb-4">
				<div class="col-sm-4">



					<?php

//						$c = App\Allcountry::where('id',$store->country_id)->first()->nicename;
//						$s = App\Allstate::where('id',$store->state_id)->first()->name;
//						$ci = App\Allcity::where('id',$store->city_id)->first() ? App\Allcity::where('id',$store->city_id)->first()->name : '';

					?>






				</div>
				<div class="col-sm-4 ">
					<h5 class="mb-3"><?php echo e(__("Shipping Address:")); ?></h5>
					<h3 class="text-dark mb-1"><?php echo e($address->name); ?></h3>
					<div><?php echo e(strip_tags($address->address)); ?></div>






					<div><?php echo e(__("Email")); ?>: <?php echo e($address->email); ?></div>
					<div><?php echo e(__("Phone")); ?>: <?php echo e($address->phone); ?></div>
				</div>
				<div class="col-sm-4 ">
					<h5 class="mb-3"><?php echo e(__("Billing Address:")); ?></h5>
					<h3 class="text-dark mb-1"><?php echo e($getInvoice->order->billing_address['firstname']); ?></h3>
					<div><?php echo e(strip_tags($getInvoice->order->billing_address['address'])); ?></div>

					<?php


//					$bcountry = App\Allcountry::where('id',$getInvoice->order->billing_address['country_id'])->first()->nicename;
//					$bstate = App\Allstate::where('id',$getInvoice->order->billing_address['state'])->first() ?
//					App\Allstate::where('id',$getInvoice->order->billing_address['state'])->first()->name :
//					'';
//					$bcity = App\Allcity::where('id',$getInvoice->order->billing_address['city'])->first() ?
//					App\Allcity::where('id',$getInvoice->order->billing_address['city'])->first()->name :
//					'';

					?>



					<div><?php echo e(__('Phone')); ?>: <?php echo e($getInvoice->order->billing_address['mobile']); ?></div>
				</div>
			</div>
			<div class="table-responsive-sm">
				<table class="table table-striped">
					<thead>
						<tr>
							<th class="center">#</th>
							<th><?php echo e(__('Item')); ?></th>
							<th><?php echo e(__('Qty')); ?></th>
							<th><?php echo e(__('Pricing & Shipping')); ?></th>
							<th><?php echo e(__('TAX')); ?></th>
							<th><?php echo e(__('Total')); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1.</td>
							<td>
									<?php if($getInvoice->variant): ?>
										<b><?php echo e($orivar->products->name); ?> <small>(<?php echo e(variantname($orivar)); ?>)</small>
										<br>
										<small><b><?php echo e(__("HSN/SAC : ")); ?></b> <?php echo e($getInvoice->variant->products->hsn); ?></small>
										
										<br>

									<?php endif; ?>

									<?php if($getInvoice->simple_product): ?>
										<b><?php echo e($getInvoice->simple_product->product_name); ?> 
										
										<br>
										<small><b><?php echo e(__("HSN/SAC : ")); ?></b> <?php echo e($getInvoice->simple_product->hsin); ?></small>
										<br>

									<?php endif; ?>

									<br>
									<small class="tax"><b><?php echo e(__('Price:')); ?></b> <i
											class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(number_format((float)$getInvoice->price , 2, '.', '')); ?>

									</small>
									
									<br>
									<small class="tax"><b><?php echo e(__('Tax:')); ?></b> <i
											class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(number_format((float)$getInvoice->tax_amount, 2, '.', '')); ?>

									</small>
							</td>
							<td valign="middle">
								<?php echo e($getInvoice->qty); ?>

							</td>
							<td>
								<p><b><?php echo e(__('Price:')); ?></b> <i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(round($getInvoice->qty*$getInvoice->price,2)); ?></p>

								<p class="ship"><b><?php echo e(__('Shipping:')); ?></b> <i
										class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(round( $getInvoice->shipping,2)); ?>

								</p></b>
								<small class="help-block">(<?php echo e(__('Price Multiplied with Qty.')); ?>)</small>
							</td>
							<td>

								<?php if($getInvoice->igst != NULL): ?>
								<p><i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(sprintf("%.2f",$getInvoice->igst)); ?> <?php echo e(__("(IGST)")); ?> </p>
								<?php endif; ?>
								<?php if($getInvoice->sgst != NULL): ?>
								<p><i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(sprintf("%.2f",$getInvoice->sgst)); ?> (<?php echo e(__("SGST")); ?>)</p>
								<?php endif; ?>
								<?php if($getInvoice->cgst != NULL): ?>
								<p><i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(sprintf("%.2f",$getInvoice->cgst)); ?> (<?php echo e(__("CGST")); ?>)</p>
								<?php endif; ?>
								<p><b>Total:</b> <i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(sprintf("%.2f",$getInvoice->tax_amount * $getInvoice->qty,2)); ?>

								</p>
								<?php if(isset($getInvoice->variant) && $getInvoice->variant->products->tax_r !='' && $getInvoice->igst != NULL && $getInvoice->cgst !=
								NULL && $getInvoice->sgst != NULL): ?>

								<p>(<?php echo e($orivar->products->tax_name); ?>)</p>

								<?php endif; ?>

								<?php if(isset($getInvoice->simple_product) && $getInvoice->simple_product->tax !='' && $getInvoice->igst != NULL && $getInvoice->cgst !=
								NULL && $getInvoice->sgst != NULL): ?>

								<p>(<?php echo e($getInvoice->simple_product->tax_name); ?>)</p>

								<?php endif; ?>


								<small class="help-block">(Tax Multiplied with Qty.)</small>
							</td>
							<td>
								<i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(round($getInvoice->qty*($getInvoice->price+$getInvoice->tax_amount)+$getInvoice->shipping,2)); ?>

								<br>
								<small class="help-block">(<?php echo e(__('Incl. of Tax & Shipping')); ?>)</small>
							</td>
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-lg-4 col-sm-5">
					<?php echo e(__('Terms:')); ?> </b><?php echo $inv_cus->terms; ?>


					

				<table class="table">
					<tr>
						<?php if(!empty($invSetting->seal)): ?>
						<td>
							<?php echo e(__('Seal:')); ?>

							<br>
							<img width="50px" src="<?php echo e(url('images/seal/'.$invSetting->seal)); ?>" alt="">
						</td>
						<?php endif; ?>
						<?php if(!empty($invSetting->sign)): ?>
						<td>
							<?php echo e(__('Sign:')); ?> <br>
							<img width="50px" src="<?php echo e(url('images/sign/'.$invSetting->sign)); ?>" alt="">
						</td>
						<?php endif; ?>
						<?php if(isset($design) && $design->show_qr == 1): ?>
						<td>
							<?php

								$data = array(
//									'Sold By'      => $store->name,
									'Invoice No.'  => $inv_cus->order_prefix.$getInvoice->order->order_id,
									'Invoice Date' => date('d M,Y',strtotime($getInvoice->created_at)),
									'Amount' 	   => $getInvoice->order->discount == 0 ? $getInvoice->order->paid_in_currency.' '.round( $getInvoice->qty*($getInvoice->price+$getInvoice->tax_amount)+$getInvoice->handlingcharge+$getInvoice->shipping+$getInvoice->gift_charge,2) : $getInvoice->order->paid_in_currency.' '.round( $getInvoice->qty*($getInvoice->price+$getInvoice->tax_amount)-$getInvoice->discount+$getInvoice->handlingcharge+$getInvoice->shipping+$getInvoice->gift_charge,2),
									'Invoice link' => url()->current(),
								);

								$data = json_encode($data,true);
							?>	

							<span title="<?php echo e(__("Invoice QR")); ?>">
								<?php echo QrCode::color(21, 126, 210)->errorCorrection('H')->generate($data); ?>

							</span>
						</td>
						<?php endif; ?>
					</tr>
				</table>

				</div>
				<div class="col-lg-4 col-sm-5 ml-auto">
					<table class="table table-clear">
						<tbody>
							<?php if( $getInvoice->order->discount !=0): ?>
							<tr>
								<td class="left">
									<strong class="text-dark">
										<?php echo e(__('Coupon Discount')); ?>

									</strong>
								</td>
								<td class="right">
									<?php if($getInvoice->order->discount !=0): ?>

									- <i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(round($getInvoice->discount,2)); ?>


									<?php endif; ?>
								</td>
							</tr>	
							<?php endif; ?>
							<tr>
								<td class="left">
									<strong class="text-dark">
										<?php echo e(__('Gift Pkg. Charges')); ?>

									</strong>
								</td>
								<td class="right">
									+ <i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e($getInvoice->gift_charge); ?>

								</td>
							</tr>

							<tr>
								<td class="left">
									<strong class="text-dark">
										<?php echo e(__('Handling Charges')); ?>

									</strong>
								</td>
								<td class="right">
									+ <i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo sprintf('%.2f',$getInvoice->handlingcharge); ?>
								</td>
							</tr>
							<tr>
								<td class="left">
									<strong class="text-dark">
										<?php echo e(__('Total')); ?>

									</strong>
								</td>
								<td class="right">
									<?php if( $getInvoice->order->discount == 0): ?>
										<i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(round( $getInvoice->qty*($getInvoice->price+$getInvoice->tax_amount)+$getInvoice->handlingcharge+$getInvoice->shipping+$getInvoice->gift_charge,2)); ?>

									<?php else: ?>
										<i class="<?php echo e($getInvoice->order->paid_in); ?>"></i><?php echo e(round( $getInvoice->qty*($getInvoice->price+$getInvoice->tax_amount)-$getInvoice->discount+$getInvoice->handlingcharge+$getInvoice->shipping+$getInvoice->gift_charge,2)); ?>

									<?php endif; ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="card-footer bg-white">
			<p class="mb-0">
				<?php echo e($genrals_settings->project_name); ?>, <?php echo e($genrals_settings->address); ?>

			</p>
		</div>
	</div>
</div>

<script src="<?php echo e(url('js/script.js')); ?>"></script>
<script>
	function printit(){
		<?php if($design->print_mode == 'landscape'): ?>
		var css = '@page  { size: landscape; }',
			head = document.head || document.getElementsByTagName('head')[0],
			style = document.createElement('style');

		style.type = 'text/css';
		style.media = 'print';

		if (style.styleSheet){
		style.styleSheet.cssText = css;
		} else {
		style.appendChild(document.createTextNode(css));
		}

		head.appendChild(style);

		<?php endif; ?>
		
		window.print();

	}
</script>
</html><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/printinvoices_ltr.blade.php ENDPATH**/ ?>