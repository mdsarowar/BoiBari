
<?php
$sellerac = App\Store::where('user_id','=', $user->id)->first();
?>
<?php $__env->startSection('title',"Emart | View Order #$inv_cus->order_prefix$order->order_id"); ?>
<?php $__env->startSection("content"); ?>   

<!-- Home Start -->
<section id="home" class="home-main-block product-home">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb" class="breadcrumb-main-block">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Account')); ?></li>
            <li class="breadcrumb-item"><?php echo e(__('Order')); ?></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Order Details')); ?></li>
          </ol>
        </nav>
        <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('<?= URL::to('/'); ?>/frontend/assets/images/wishlist/breadcrum.png');">
          <div class="breadcrumb-nav">
              <h3 class="breadcrumb-title"><?php echo e(__('Order Details')); ?></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Home End -->

<!-- My Account Start -->
<section id="my-account" class="my-account-main-block popular-item-main-block">
    <div class="container">
        <div class="row">
            <?php $active['active'] = 'Myorder'; ?>
            <?php echo $__env->make('frontend.profile.sidebar',$active, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="col-lg-9 col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="py-30">
                        <div class="order-review-block">
                            
                            <?php
                                $checkOrderCancel = $order->cancellog;
                                $orderlog = $order->fullordercancellog;
                                $deliverycheck = array();
                                $tstatus = 0;
                                $cancel_valid = array();
                            ?>

                            <?php if(count($order->invoices)>1): ?>

                            <?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($inv->variant): ?>

                                    <?php if($inv->variant->products->cancel_avl != 0): ?>
                                        <?php
                                        array_push($cancel_valid,1);
                                        ?>
                                    <?php else: ?>
                                        <?php
                                        array_push($cancel_valid,0);
                                        ?>
                                    <?php endif; ?>
                                
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php else: ?>
                                <?php
                                    array_push($cancel_valid,0);
                                ?>
                            <?php endif; ?>

                            <?php if(isset($order)): ?>
                                <?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sorder): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($sorder->status == 'delivered' || $sorder->status == 'cancel_request' || $sorder->status
                                    =='return_request' || $sorder->status == 'returned' || $sorder->status == 'refunded' || $sorder->status ==
                                    'ret_ref'): ?>
                                        <?php
                                            array_push($deliverycheck, 0);
                                        ?>
                                    <?php else: ?>
                                        <?php
                                            array_push($deliverycheck, 1);
                                        ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>



                            <?php if(in_array(0, $deliverycheck)): ?>
                                <?php
                                    $tstatus = 1;
                                ?>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col"><?php echo e(__('Shipping Address')); ?></th>
                                            <th scope="col"><?php echo e(__('Billing Address')); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b> <?php echo e($address->name); ?>, <?php echo e($address->phone); ?></b></td>
                                            <td><b><?php echo e($order->billing_address['firstname']); ?>, <?php echo e($order->billing_address['mobile']); ?></b></td>
                                        </tr>
                                        <tr>
                                            <td><?php echo e(strip_tags($address->address)); ?></td>
                                            <td><?php echo e(strip_tags($order->billing_address['address'])); ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                                $division = App\Division::where('id',$address->division_id)->first()->bn_name;
                                                $district = App\Districts::where('id',$address->district_id)->first()->bn_name;
                                                $upazila = App\Upazilas::where('id',$address->upazila_id)->first()->bn_name;
                                                $union = App\Unions::where('id',$address->union_id)->first()->bn_name;
//                                                $s = App\Allstate::where('id',$address->state_id)->first()->name;
//                                                $ci = App\Allcity::where('id',$address->city_id)->first() ? App\Allcity::where('id',$address->city_id)->first()->name : '';
                                            ?>
                                            <td><?php echo e($division); ?>, <?php echo e($district); ?>, <?php echo e($upazila); ?>, <?php echo e($union); ?></td>


                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered order-view-dtl-table">
                                    <thead>
                                    <tr>
                                        <td>
                                        <b>Transcation ID:</b> <?php echo e($order->transaction_id); ?>

                                        </td>
                                        <td>
                                        <b>Payment Method:</b> <?php echo e($order->payment_method); ?>

                                        </td>
                                        <td>
                                        <b>Order Date: </b> <?php echo e(date('d-m-Y',strtotime($order->created_at))); ?>

                                        </td>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            <?php $__currentLoopData = $order->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
                                <?php
                                    $orivar = $o->variant;
                                ?>

                                <div class="order-view-dtl-page mt-4">
                                    <div class="order-view-header">
                                        <div class="order-view-title"> 
                                            <?php if($o->status == 'delivered' || $o->status == 'return_request'): ?>
                                                <a title="Click to View or print" href="<?php echo e(route('user.get.invoice',$o->id)); ?>"
                                                    class="float-right btn btn-sm btn-danger"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                                    <?php echo e(__('Invoice')); ?>

                                                </a>
                                            <?php endif; ?>

                                            <?php if($o->status == 'delivered'): ?>
                                                <?php if(isset($o->simple_product) && $o->simple_product->type == 'd_product'): ?>
                                                    <a title="Download your item" href="<?php echo e(URL::temporarySignedRoute('user.download.order', now()->addMinutes(2), ['orderid' => $o->id])); ?>"
                                                    class="mr-2 float-right btn btn-sm bg-success text-light"><i class="fa fa-download" aria-hidden="true"></i>
                                                    <?php echo e(__('Download')); ?>

                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <?php if(isset($orivar->products)): ?>
                                                <?php if($orivar->products->return_avbl == '1' && $o->status == 'delivered'): ?>
                                                    <?php
                                                        $days = $orivar->products->returnPolicy->days;
                                                        $endOn = date("d-M-Y", strtotime("$o->updated_at +$days days"));
                                                        $today = date('d-M-Y');
                                                    ?>

                                                    <?php if($today == $endOn): ?>
                                                        <a aria-disabled="true" href="javascript:" class="mr-2 btn btn-sm btn-danger disabled"><?php echo e(__('Return period is ended !')); ?></a>
                                                    <?php else: ?>
                                                    <!--END-->
                                                        <a class="mr-2 btn btn-sm btn-danger" href="<?php echo e(route('return.window',Crypt::encrypt($o->id))); ?>"><?php echo e(__('Return')); ?></a>
                                                    <?php endif; ?>
                                                <?php else: ?> 
                                                    <a aria-disabled="true" class="mr-2 btn btn-sm btn-danger disabled"><?php echo e(__('Return not available !')); ?> </a>
                                                <?php endif; ?>

                                            <?php elseif(isset($o->simple_product) && $o->status == 'delivered'): ?>
                                            
                                                <?php if($o->simple_product->return_avbl == '1'): ?>

                                                    <?php

                                                        $days = $o->simple_product->returnPolicy->days;
                                                        $endOn = date("d-M-Y", strtotime("$o->updated_at +$days days"));
                                                        $today = date('d-M-Y');

                                                    ?>

                                                    <?php if($today == $endOn): ?>
                                                        <a aria-disabled="true" href="javascript:" class="mr-2 btn btn-sm btn-danger disabled"><?php echo e(__('Return period is ended !')); ?></a>
                                                    <?php else: ?>
                                                    <!--END-->
                                                        <a class="mr-2 btn btn-sm btn-danger" href="<?php echo e(route('return.window',Crypt::encrypt($o->id))); ?>"><?php echo e(__('Return')); ?></a>
                                                    <?php endif; ?>
                                                <?php else: ?> 
                                                    <a aria-disabled="true" class="mr-2 btn btn-sm btn-danger disabled"><?php echo e(__('Return not available !')); ?> </a>
                                                <?php endif; ?>
                                            
                                            <?php endif; ?>

                                            <?php if(isset($orivar->products)): ?>
                                                <?php if($orivar->products->cancel_avl == '1'): ?>
                                                    <?php if($o->status == 'pending' || $o->status == 'processed'): ?>
                                                        <?php
                                                            $secureid = Crypt::encrypt($o->id);
                                                        ?>
                                                        <a <?php if(env('DEMO_LOCK')==0): ?> title="Cancel This Order?" data-toggle="modal" data-target="#proceedCanItem<?php echo e($o->id); ?>" <?php else: ?> disabled="disabled" title="This action is disabled in demo !" <?php endif; ?> class="btn btn-sm btn-danger"><?php echo e(__('Cancel')); ?></a>
                                                    <?php else: ?> 
                                                        <a aria-disabled="true" title="Cancel This Order" class="btn btn-sm btn-danger disabled" href="javascript:">Cancel</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if(!in_array($o->status,['shipped','delivered','refunded','return_request','ret_ref','Refund Pending','canceled'])): ?>
                                                    
                                                    <?php if($o->simple_product && $o->simple_product->cancel_avbl == '1'): ?>
                                                        <a <?php if(env('DEMO_LOCK')==0): ?> title="Cancel This Order?" data-toggle="modal" data-target="#proceedCanItem<?php echo e($o->id); ?>" <?php else: ?> disabled="disabled" title="This action is disabled in demo !" <?php endif; ?> class="btn btn-sm btn-danger"><?php echo e(__('Cancel')); ?></a>
                                                    <?php else: ?>
                                                        <a aria-disabled="true" title="Cancel This Order" class="btn btn-sm btn-danger disabled" href="javascript:">Cancel</a>
                                                    <?php endif; ?>

                                                <?php endif; ?>
                                            <?php endif; ?>

                                            

                                            <?php if( isset($o->variant) || isset($o->simple_product) ): ?>
                                                <div class="modal fade" id="proceedCanItem<?php echo e($o->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Cancel Item:
                                                                    <?php if($o->variant): ?>
                                                                        <?php echo e($orivar->products->name); ?>

                                                                        (<?php echo e(variantname($o->variant)); ?>)
                                                                    <?php endif; ?>

                                                                    <?php if($o->simple_product): ?>
                                                                        <?php echo e($o->simple_product->product_name); ?>

                                                                    <?php endif; ?>
                                                                </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php if(!in_array($o->status,['shipped','canceled','delivered','Refund Pending','ret_ref','refunded','return_request','shipped'])): ?>
                                                                    <form action="<?php echo e(route('cancel.item',Crypt::encrypt($o->id))); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <div class="form-group">
                                                                            <label class="font-weight-normal" for=""><?php echo e(__('Choose Reason')); ?> <span class="required">*</span></label>
                                                                            <select class="form-control" required="" name="comment" id="">
                                                                                <option value=""><?php echo e(__('Please Choos eReason')); ?></option>
                                                                                    <?php $__empty_1 = true; $__currentLoopData = App\RMA::where('status','=','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                                        <option value="<?php echo e($rma->reason); ?>"><?php echo e($rma->reason); ?></option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                                        <option value="Other"><?php echo e(__('My Reason is not listed here')); ?></option>
                                                                                    <?php endif; ?>
                                                                            </select>
                                                                        </div>
                                                                        <?php if($order->payment_method !='COD' && $order->payment_method !='BankTransfer'): ?>
                                                                            <div class="form-group">
                                                                                <label class="font-weight-normal" for=""><?php echo e(__('Choose Refund Method')); ?>: </label>
                                                                                <label class="font-weight-normal"><input onclick="hideBank('<?php echo e($o->id); ?>')" id="source_check_o<?php echo e($o->id); ?>" required type="radio" value="orignal" name="source" /><?php echo e(__('Orignal Source')); ?> [<?php echo e($o->order->payment_method); ?>] </label>&nbsp;&nbsp;
                                                                                <?php if(Auth::user()->banks()->count()): ?>
                                                                                <label class="font-weight-normal"><input onclick="showBank('<?php echo e($o->id); ?>')" id="source_check_b<?php echo e($o->id); ?>" required type="radio" value="bank" name="source" /> <?php echo e(__('In Bank')); ?></label>
                                                                                    <select name="bank_id" id="bank_id_single<?php echo e($o->id); ?>" class="display-none form-control">
                                                                                        <?php $__currentLoopData = Auth::user()->banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <option value="<?php echo e($bank->id); ?>"><?php echo e($bank->bankname); ?> (<?php echo e($bank->acno); ?>)</option>
                                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                    </select>
                                                                                <?php else: ?>
                                                                                    <label class="font-weight-normal"><input disabled="disabled" type="radio" /> <?php echo e(__('In Bank')); ?> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Add a bank account in My Bank Account" aria-hidden="true"></i></label>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        <?php else: ?>
                                                                        
                                                                            <?php if(Auth::user()->banks()->count()): ?>
                                                                                <label class="font-weight-normal"><input onclick="showBank('<?php echo e($o->id); ?>')" id="source_check_b<?php echo e($o->id); ?>" required type="radio" value="bank" name="source" /><?php echo e(__('In Bank')); ?></label>
                                                                                <select name="bank_id" id="bank_id_single<?php echo e($o->id); ?>" class="form-control display-none">
                                                                                    <?php $__currentLoopData = Auth::user()->banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($bank->id); ?>"><?php echo e($bank->bankname); ?> (<?php echo e($bank->acno); ?>)</option>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </select>
                                                                            <?php else: ?>
                                                                                <label class="font-weight-normal"><input disabled="disabled" type="radio" /> <?php echo e(__('In Bank')); ?> <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="Add a bank account in My Bank Account" aria-hidden="true"></i></label>
                                                                            <?php endif; ?>

                                                                        
                                                                        <?php endif; ?>
                                                                        <div class="alert alert-info">
                                                                            <h5><i class="fa fa-info-circle"></i> <?php echo e(__('Important')); ?> !</h5>

                                                                            <ol class="font-weight600 sq">
                                                                            <li><?php echo e(__('IF Original source is choosen than amount will be reflected to your orignal source in 1-2 days(approx)')); ?>.</li>

                                                                            <li>
                                                                                <?php echo e(__('IF Bank Method is choosen than make your you added a bank account else refund will not procced. IF already added than it will take 14 days to reflect amount in your bank account (Working Days*)')); ?>*).
                                                                            </li>

                                                                            <li><?php echo e(__('Amount will be paid in original currency which used at time of placed order')); ?>.</li>

                                                                            </ol>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-md btn-info">
                                                                            <?php echo e(__('Procced')); ?>...
                                                                        </button>
                                                                        <p class="help-block"><?php echo e(__('This action cannot be undone')); ?> !</p>
                                                                        <p class="help-block"><?php echo e(__('It will take time please do not close or refresh window')); ?> !</p>
                                                                    </form>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="order-view-body">
                                        <div id="OrderRow62" class="full-order-main-block">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                                                    <?php if(isset($orivar)): ?>
                                                        <?php if(isset($orivar->variantimages) && file_exists(public_path().'/variantimages/thumbnails/'.$orivar->variantimages->main_image)): ?>
                                                            <img class="img-fluid pro-img2" src="<?php echo e(url('variantimages/thumbnails/'.$orivar->variantimages->main_image)); ?>" alt="Product Image" />
                                                        <?php else: ?>
                                                            <img class="img-fluid pro-img2" src="<?php echo e(Avatar::create($orivar->products->name)->toBase64()); ?>" alt="Product Image" />
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if($o->simple_product): ?>
                                                
                                                        <?php if($o->simple_product->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$o->simple_product->thumbnail)): ?>
                                                            <img class="img-fluid pro-img2" src="<?php echo e(url('images/simple_products/'.$o->simple_product->thumbnail)); ?>"/>
                                                        <?php else: ?>
                                                            <img class="img-fluid pro-img2" src="<?php echo e(Avatar::create($o->simple_product->product_name)->toBase64()); ?>"/>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-lg-5 col-md-3 col-sm-3 col-7 full-order-main-block">
                                                    <?php if(isset($orivar->products)): ?>
                                                        <a target="_blank" href="<?php echo e($orivar->products->getURL($orivar)); ?>"><b><?php echo e(substr($orivar->products->name, 0, 30)); ?><?php echo e(strlen($orivar->products->name)>30 ? '...' : ""); ?></b>
                                                            <small>
                                                            (<?php echo e(variantname($o->variant)); ?>)
                                                            </small>
                                                        </a>
                                                        <br>

                                                    <?php endif; ?>
                                                    <?php if(isset($o->simple_product)): ?>
                                                        <a target="_blank" href="<?php echo e(route('show.product',['id' => $o->simple_product->id, 'slug' =>   $o->simple_product->slug])); ?>">
                                                            <b><?php echo e($o->simple_product->product_name); ?></b>
                                                        </a>
                                                        <br>

                                                    <?php endif; ?>
                                                    <br>
                                                    <small><b>Qty:</b> <?php echo e($o->qty); ?></small>
                                                    
                                                    <?php if($o->status == 'delivered'): ?>
                                                        <p><?php echo e(__('Your Product is deliverd on')); ?> <br> <b><?php echo e(date('d-m-Y @ h:i:a',strtotime($o->updated_at))); ?></b></p>
                                                    <?php endif; ?>

                                                    <?php if($o->status == 'return_request'): ?>
                                                        <span class="font-weight-normal badge badge-warning"><?php echo e(__('Return Requested')); ?></span> <br>
                                                    <?php endif; ?>

                                                    <?php if($o->status == 'ret_ref'): ?>
                                                        <span class="font-weight-normal badge badge-success"> <?php echo e(__('Returned & Refunded')); ?></span> <br>
                                                    <?php endif; ?>

                                                    <?php if($o->status == 'cancel_request'): ?>
                                                        <span class="font-weight-normal badge badge-danger"> <?php echo e(__('Cancellation requested')); ?> </span><br>
                                                    <?php endif; ?>

                                                    <?php if($o->status == 'canceled'): ?>
                                                        <span class="font-weight-normal badge badge-danger"><?php echo e(__('Cancelled')); ?> </span><br>
                                                    <?php endif; ?>

                                                    <?php if($o->status == 'refunded' || $o->status == 'return_request' || $o->status == 'returned' || $o->status == 'ret_ref'): ?>

                                                        <?php
                                                            $refundlog = $o->refundlog;
                                                        ?>


                                                        <?php if(isset($refundlog)): ?>            

                                                            <?php if($refundlog->status == 'initiated'): ?>
                                                        
                                                            
                                                                <small class="font-weight600"><?php echo e(__('Return Request Intiated with Ref. No:')); ?>

                                                                [<?php echo e($refundlog->txn_id); ?>]
                                                                <?php if($refundlog->method_choosen == 'bank'): ?>
                                                                    <br>
                                                                    <?php echo e(__('Choosen bank:')); ?>

                                            
                                                                    <?php if(!$refundlog->bank): ?>
                                                                    <?php echo e(__('Choosen bank has been deleted !')); ?>

                                                                    <?php else: ?> 
                                                                    <u><?php echo e($refundlog->bank->bankname); ?> (XXXX<?php echo e(substr($refundlog->bank->acno, -4)); ?>)</u>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                </small>
                                                            

                                                            <?php else: ?>

                                                            <?php if($refundlog->method_choosen == 'orignal'): ?>

                                                                <small class="font-weight600"><?php echo e(__('Refund Amount')); ?> <i
                                                                    class="fa <?php echo e($o->order->paid_in); ?>"></i><?php echo e($refundlog->amount); ?> <?php echo e(__('is')); ?>

                                                                <?php echo e($refundlog->status); ?> <?php echo e(__('to your Requested payment source')); ?> <?php echo e($refundlog->pay_mode); ?>

                                                                <?php echo e(__('and will be reflected to your a/c in 1-2 working days.')); ?> <br> (<?php echo e(__('TXN ID:')); ?>

                                                                <?php echo e($refundlog->txn_id); ?>)
                                                                </small>

                                                            <?php else: ?>

                                                                <small class="font-weight600">
                                                                <?php echo e(__('Refund Amount')); ?> <i class="fa <?php echo e($o->order->paid_in); ?>"></i>
                                                                <?php echo e($refundlog->amount); ?> is
                                                                <?php echo e($refundlog->status); ?> <?php echo e(__('to your Requested bank a/c')); ?> <u><?php echo e($refundlog->bank->bankname ?? 'Bank account deleted'); ?>

                                                                    (XXXX<?php echo e(substr($refundlog->bank->acno, -4)); ?>)</u> <?php if($refundlog->status !='refunded'): ?>
                                                                <?php echo e(__('and will be reflected to your a/c in 1-2 working days.')); ?><?php endif; ?> <br> (TXN ID:
                                                                <?php echo e($refundlog->txn_id); ?>)
                                                                .
                                                                <br>
                                                                <?php if($refundlog->txn_fee != ''): ?>
                                                                <?php echo e(__('Transcation FEE Charge:')); ?> <i
                                                                    class="fa <?php echo e($o->order->paid_in); ?>"></i><?php echo e($refundlog->txn_fee); ?>

                                                                <?php endif; ?>
                                                                </small>

                                                            <?php endif; ?>

                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                        <?php endif; ?>

                                                            <?php

                                                            $log = App\CanceledOrders::where('inv_id', '=', $o->id)
                                                                                        ->where('user_id',Auth::user()->id)
                                                                                        ->with('bank')
                                                                                        ->first();
                                                            
                                                            $orderlog = App\FullOrderCancelLog::where('order_id','=',$order->id)
                                                                                            ->with('bank')
                                                                                            ->first();
                                                            ?>

                                                            <?php if(isset($log)): ?>

                                                    

                                                            <?php if($log->method_choosen == 'orignal'): ?>

                                                                <small class="text-justify"><b>Refund Amount <u><i
                                                                    class="fa <?php echo e($o->order->paid_in); ?>"></i><?php echo e($log->amount); ?></u>
                                                                <?php echo e(__('is refunded to original source')); ?> (<?php echo e($o->order->payment_method); ?>).
                                                                <?php echo e(__("IF it don't than it will take 1-2 days to reflect in your account.")); ?>

                                                                <br>(<?php echo e(__("TXN ID:")); ?> <?php echo e($log->transaction_id); ?>)</b></small>
                                                            <?php elseif($log->method_choosen == 'bank' && $log->is_refunded == 'pending' ): ?>
                                                                <small><b><?php echo e(__('Refund Amount')); ?> <u><i
                                                                    class="fa <?php echo e($o->order->paid_in); ?>"></i><?php echo e($log->amount); ?></u>
                                                                <?php echo e(__('is proceeded to your bank ac, amount will be reflected to your bank ac in 14 working days.')); ?>

                                                                <br>
                                                                (<?php echo e(__('Refrence No.')); ?> <?php echo e($log->transaction_id); ?>)</b></small>
                                                        
                                                                <?php if(isset($log->bank)): ?>
                                                                <br>
                                                                <small><b>Choosen Bank: <?php echo e($log->bank->bankname); ?> (<?php echo e($log->bank->acno); ?>)</b></small>
                                                                <?php else: ?>
                                                                    <?php echo e(__('Choosen Bank ac deleted !')); ?>

                                                                <?php endif; ?>
                                                            <?php elseif($log->method_choosen == 'bank' && $log->is_refunded == 'completed' ): ?>
                                                                <small><b><?php echo e(__('Amount')); ?> <u><i class="fa <?php echo e($o->order->paid_in); ?>"></i><?php echo e($log->amount); ?></u>
                                                                <?php echo e(__('is refunded to your bank ac.')); ?> <br>
                                                                <?php if($log->txn_fee !=''): ?>
                                                                    <?php echo e(__('Transcation FEE:')); ?> <i class="fa <?php echo e($o->order->paid_in); ?>"></i><?php echo e($log->txn_fee); ?>

                                                                    
                                                                    <?php if(isset($log->bank)): ?>
                                                                    <br>
                                                                    <small><b><?php echo e(__('Choosen Bank:')); ?> <?php echo e($log->bank->bankname); ?> (<?php echo e($log->bank->acno); ?>)</b></small>
                                                                    <?php else: ?>
                                                                    <?php echo e(__('Choosen Bank ac deleted !')); ?>

                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                <br>(<?php echo e(__('TXN ID:')); ?> <?php echo e($log->transaction_id); ?>)
                                                                </b></small>
                                                            <?php endif; ?>

                                                            <?php elseif(isset($orderlog)): ?>

                                                    

                                                                <?php if(in_array($o->id, $orderlog->inv_id)): ?>


                                                                    <?php if($orderlog->method_choosen == 'orignal'): ?>

                                                                    <small><b><?php echo e(__('Refund Amount')); ?> <u><i class="fa <?php echo e($o->order->paid_in); ?>"></i>

                                                                    <?php if($o->order->discount !=0): ?>

                                                                    <?php if($o->order->distype == 'product'): ?>


                                                                    <?php if($o->discount != 0): ?>

                                                                    <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>


                                                                    <?php else: ?>

                                                                    <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>


                                                                    <?php endif; ?>



                                                                    <?php elseif($o->order->distype == 'category'): ?>

                                                                    <?php if($o->discount != 0): ?>

                                                                    <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>


                                                                    <?php else: ?>
                                                                    <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>

                                                                    <?php endif; ?>

                                                                    <?php elseif($o->order->distype == 'cart'): ?>

                                                                    <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>


                                                                    <?php endif; ?>

                                                                    <?php else: ?>
                                                                    <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>

                                                                    <?php endif; ?>

                                                                    </u> <?php echo e(__('is refunded to original source')); ?> (<?php echo e($o->order->payment_method); ?>).
                                                                    <?php echo e(__("IF it don't than it will take 1-2 days to reflect in your account.")); ?>

                                                                    <br>(<?php echo e(__("TXN ID:")); ?> <?php echo e($orderlog->txn_id); ?>)</b></small>
                                                                <?php elseif($orderlog->method_choosen == 'bank' && $orderlog->is_refunded == 'pending' ): ?>
                                                                <small><b><?php echo e(__("Refund Amount")); ?> <u><i class="fa <?php echo e($o->order->paid_in); ?>"></i>

                                                                    <?php if($o->order->discount !=0): ?>

                                                                    <?php if($o->order->distype == 'product'): ?>


                                                                    <?php if($o->discount != 0): ?>

                                                                    <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>


                                                                    <?php else: ?>

                                                                    <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>


                                                                    <?php endif; ?>



                                                                    <?php elseif($o->order->distype == 'category'): ?>

                                                                    <?php if($o->discount !=0 || $o->discount !=''): ?>

                                                                    <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>


                                                                    <?php else: ?>
                                                                    <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>

                                                                    <?php endif; ?>

                                                                    <?php elseif($o->order->distype == 'cart'): ?>

                                                                    <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>


                                                                    <?php endif; ?>

                                                                    <?php else: ?>
                                                                    <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>

                                                                    <?php endif; ?>

                                                                    </u>
                                                                    <?php echo e(__("is proceeded to your bank ac, amount will be reflected to your bank ac in 14 working days.")); ?>

                                                                    <br>
                                                                    (<?php echo e(__('Refrence No.')); ?> <?php echo e($orderlog->txn_id); ?>)</b></small>

                                                                
                                                                    <?php if(isset($orderlog->bank)): ?>
                                                                    <br>
                                                                    <small><b><?php echo e(__("Choosen Bank:")); ?> <?php echo e($orderlog->bank->bankname); ?> (<?php echo e($orderlog->bank->acno); ?>)</b></small>
                                                                    <?php else: ?>
                                                                    <?php echo e(__("Choosen Bank ac modified or deleted !")); ?>

                                                                    <?php endif; ?>

                                                                <?php endif; ?>

                                                                <?php if($orderlog->method_choosen == 'bank' && $orderlog->is_refunded == 'completed' ): ?>

                                                                    <?php if(in_array($o->id, $orderlog->inv_id)): ?>
                                                                    <small><b><?php echo e(__('Amount')); ?> <u><i class="fa <?php echo e($o->order->paid_in); ?>"></i> <?php if($o->order->discount
                                                                            !=0): ?>

                                                                            <?php if($o->order->distype == 'product'): ?>

                                                                            <?php if($o->discount != 0): ?>

                                                                                <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>


                                                                            <?php else: ?>

                                                                                <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>


                                                                            <?php endif; ?>


                                                                            <?php elseif($o->order->distype == 'category'): ?>

                                                                            <?php if($o->discount != 0): ?>

                                                                            <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>


                                                                            <?php else: ?>
                                                                            <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>

                                                                            <?php endif; ?>

                                                                            <?php else: ?>

                                                                            <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>


                                                                            <?php endif; ?>

                                                                            <?php else: ?>
                                                                            <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>

                                                                            <?php endif; ?> </u> <?php echo e(__("is refunded to your bank ac.")); ?> <br>

                                                                        <?php if($orderlog->txn_fee !=''): ?>
                                                                        <?php echo e(__("Transcation FEE:")); ?> <i class="fa <?php echo e($order->paid_in); ?>"></i><?php echo e($orderlog->txn_fee); ?>

                                                                        <?php endif; ?>
                                                                        <br>(<?php echo e(__("TXN ID:")); ?> <?php echo e($orderlog->txn_id); ?>)
                                                                        </b></small>
                                                                        <?php
                                                                        $bank = $orderlog->bank;
                                                                        ?>
                                                                        <?php if(isset($bank)): ?>
                                                                        <br>
                                                                        <small><b><?php echo e(__("Choosen Bank:")); ?> <?php echo e($bank->bankname); ?> (<?php echo e($bank->acno); ?>)</b></small>
                                                                        <?php else: ?>
                                                                        <?php echo e(__("Choosen Bank ac deleted !")); ?>

                                                                        <?php endif; ?>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                        <?php endif; ?>

                                                        <?php if($o->local_pick ==''): ?>
                                                            <?php if($o->status == 'pending' || $o->status == 'processed' || $o->status == 'shipped'): ?>
                                                                <div class="mt-2">    
                                                                    <a role="button" href="<?php echo e(route('track.order',['trackingid' => $o['tracking_id']])); ?>" class="btn btn-info" title="Track">
                                                                    <?php echo e(__('Track')); ?>

                                                                    </a>
                                                                </div>

                                                                <?php if($o->courier_channel != '' && $o->tracking_link != '' && $o->exp_delivery_date != ''): ?>

                                                                <p class="mt-2 font-weight-bold">
                                                                    <?php echo e(__("Your order has been shipped via")); ?> <?php echo e($o->courier_channel); ?> <?php echo e(__("you can track your package here with ")); ?> <?php echo e($o->tracking_link); ?> <?php echo e(__('and expected delivery date is :date',['date' => date("d-M-Y",strtotime($o->exp_delivery_date))] )); ?>.
                                                                </p>

                                                                <?php endif; ?>

                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php if($o->status != 'delivered' && $o->status !='refunded' && $o->status !='ret_ref' && $o->status
                                                            !='returned' && $o->status != 'canceled' && $o->status != 'return_request'): ?>
                                                            <hr>
                                                                <div class="col-md-12 card bg-light">
                                                                
                                                                <div class="card-body">
                                                                    <p><i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                                                                    <?php echo e(__('Last Pickup Date')); ?>

                                                                    </p>
                                                                    <p class="font-weight600">
                                                                    <?php echo e($o->loc_deliv_date == '' ? "Yet to update" : date('d/m/Y',strtotime($o->loc_deliv_date))); ?> •
                                                                    <a title="Click to see store address" class="know_more" data-toggle="modal"
                                                                        data-target="#localpickModal<?php echo e($o->id); ?>">
                                                                        <?php echo e(__('Expand more')); ?>

                                                                    </a> </p>
                                                                </div>

                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>

                                                        <?php if($o->status != 'delivered' && $o->local_pick != ''): ?>

                                                            <div class="modal fade" id="localpickModal<?php echo e($o->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="p-2 modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                            <h5 class="modal-title" id="myModalLabel">
                                                                                <?php echo e(__('Local Pickup Store Address')); ?>

                                                                            </h5>
                                                                        </div>

                                                                        <div class="modal-body">

                                                                            <p>
                                                                                <?php echo e(__('Pick your Ordered Item')); ?> 
                                                                                
                                                                                <?php if($o->variant): ?>
                                                                                    <b>
                                                                                        <?php echo e($o->variant->products->name); ?>

                                                                                        <small>(<?php echo e(variantname($o->variant)); ?>)</small>
                                                                                    </b>
                                                                                <?php else: ?>
                                                                                    <b><?php echo e($o->simple_product->product_name); ?></b>
                                                                                <?php endif; ?>
                                                                                <?php echo e(__('From:')); ?>

                                                                            </p>



                                                                            <div class="store_header">















                                                                            </div>
                                                                            <p></p>
                                                                            <p><?php echo e(__('on')); ?> <b><?php echo e($o->loc_deliv_date !='' ? date('d/m/Y',strtotime($o->loc_deliv_date))  : "Yet to update"); ?></b> </p>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php endif; ?>
                                                    </div>
                                                    <div class="col-lg-5">
                                                    <b>
                                                        <i class="<?php echo e($o->order->paid_in); ?>"></i>

                                                        <?php if($o->order->discount !=0): ?>

                                                        <?php if($o->order->distype == 'product'): ?>

                                                        <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>

                                                        <small class="couponbox"><b><?php echo e($order->coupon); ?></b> applied</small>
                                                        
                                                        <?php elseif($o->order->distype == 'simple_product'): ?>

                                                        <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>

                                                        <small class="couponbox"><b><?php echo e($order->coupon); ?></b> applied</small>
                                                    

                                                        <?php elseif($o->order->distype == 'category'): ?>


                                                        <?php if($o->discount != 0): ?>
                                                        <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>

                                                            <small class="couponbox"><b><?php echo e($order->coupon); ?></b> applied</small>
                                                        <?php else: ?>
                                                            <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>

                                                        <?php endif; ?>



                                                        <?php elseif($o->order->distype == 'cart'): ?>

                                                        <!-- <?php echo e(price_format(($o->qty*$o->price+$o->tax_amount+$o->shipping)-$o->discount,2)); ?>

                                                        <small class="couponbox"><b><?php echo e($order->coupon); ?></b> applied</small> -->
                                                        <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>


                                                        <?php endif; ?>

                                                        <?php else: ?>
                                                        <?php echo e(price_format($o->qty*$o->price+$o->tax_amount+$o->shipping,2)); ?>

                                                        <?php endif; ?>



                                                    </b><br>
                                                    <small>(Incl. of tax &amp; shipping)</small>          
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            
                        </div>
                        <div class="card">
                            <table class="table">
                                <tbody class="f-right">
                                    <tr>
                                        <td colspan="3"><b><?php echo e(__('Total')); ?>:</b></td>
                                        <td><i class="<?php echo e($order->paid_in); ?>"></i> <?php echo e(price_format($order->order_total+$order->discount )); ?></td>
                                    </tr>
                                    <?php if($o->order->distype == 'cart'): ?>
                                    <tr>
                                        <td colspan="3"><b><?php echo e(__('Discount')); ?>:</td>
                                        <td><i class="<?php echo e($order->paid_in); ?>"></i> <?php echo e(price_format($order->discount )); ?></td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <td colspan="3"><b><?php echo e(__('Total Gift Charge')); ?>:</b></td>
                                        <td><i class="<?php echo e($order->paid_in); ?>"></i> <?php echo e(price_format($order->gift_charge)); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b><?php echo e(__('Handling Charge')); ?>:</b></td>
                                        <td><i class="<?php echo e($order->paid_in); ?>"></i> <?php echo e(price_format($order->handlingcharge)); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><b><?php echo e(__('Order Total')); ?>:</b></td>
                                        <td><i class="<?php echo e($order->paid_in); ?>"></i> <?php echo e(price_format(($order->order_total+$order->handlingcharge),2)); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- My Account End -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="<?php echo e(url('js/userorder.js')); ?>"></script>
<script>
      $('.source_check').on('click', function() {
        var source = $(this).val();
        if(source == 'bank') {
          $('#bank_id').show();
          $('#bank_id').attr('required', 'required');
        } else {
          $('#bank_id').hide();
          $('#bank_id').removeAttr('required');
        }
      });

      function hideBank(id) {
        $('#bank_id_single' + id).hide();
        $('#bank_id_single' + id).removeAttr('required');
      }

      function showBank(id) {
        $('#bank_id_single' + id).show();
        $('#bank_id_single' + id).attr('required', 'required');
      }
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/profile/order_detail.blade.php ENDPATH**/ ?>