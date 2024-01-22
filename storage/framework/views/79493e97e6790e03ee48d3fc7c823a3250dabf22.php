
<?php $__env->startSection('title','Emart | Checkout'); ?>
<?php $__env->startSection("content"); ?>   
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<!-- Home Start -->
<section id="home" class="home-main-block">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb" class="breadcrumb-main-block">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" title="Home"><?php echo e(__('Home')); ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Checkout')); ?></li>
                    </ol>
                </nav>
                <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('frontend/assets/images/checkout/breadcrumb.png');">
                    <div class="breadcrumb-nav">
                        <h3 class="breadcrumb-title"><?php echo e(__('Checkout')); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home End -->
<?php

    \Session::forget('from-order-review-page');
    \Session::forget('from-pay-page');
    \Session::forget('re-verify');
    \Session::forget('indiantax');

    $per_shipping = 0;
    $tax_amount = 0;
    $total_tax_amount = 0;
    $total_shipping = 0;
    $total = 0;
    $pro = Session('pro_qty');

    $stock= session('stock');
    $after_tax_amount = 0;
    $count = $cart_table->count();

?>
    <!-- Checkout Start -->
    <section id="checkout" class="checkout-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="accordion" id="accordionExample">

                        <div class="checkout-login checkout-block accordion-item">
                            <div class="accordion-header">
                                <h3 class="section-title accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">A. <?php if(auth()->guard()->guest()): ?> <span>1</span> <?php echo e(__('Login')); ?> <?php else: ?> <?php echo e(__('Logged In')); ?> <?php endif; ?></h3>
                                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="social-login-block">
                                            <?php if(auth()->guard()->check()): ?>
                                                <p>
                                                <div class="verified-icon">
                                                    <i data-feather="check-circle"></i>
                                                    <b><?php echo e(Auth::user()->name); ?></b>
                                                </div>

                                                </p>
                                                <p>
                                                <div class="verified-icon">
                                                    <i data-feather="check-circle"></i>
                                                    <?php echo e(Auth::user()->mobile); ?>

                                                </div>

                                                </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-block accordion-item">
                            <div class="checkout-address accordion-header">
                                <h3 class="section-title accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            B. <?php echo e(__('Shipping Address')); ?>

                                        </div>
                                    </div>
                                </h3>
                                <div id="collapseThree" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="py-30">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="view-all-btn">
                                                        <a class="btn btn-primary btn-sm" data-bs-toggle="modal" href="#exampleModalToggle" role="button"><i data-feather="plus"></i><?php echo e(__('Add New Address')); ?></a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-body">
                                                <div class="row mt-4">
                                                    <?php if(isset($addresses)): ?>
                                                        <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            

                                                            <table class="table manage-address-block ">
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                
                                                                <tbody>
                                                                
                                                                
                                                                <tr>
                                                                    <td style="width: 25%">
                                                                        <div class="<?php echo e($address->defaddress == 1 ? "active" : "user-header"); ?>">
                                                                            <h6><?php echo e($address->name); ?>, <?php echo e($address->phone); ?></h6>
                                                                            
                                                                            
                                                                            
                                                                        </div>
                                                                    </td>
                                                                    <td style="width: 60%">
                                                                        <p><?php echo e(strip_tags($address->address)); ?></p>
                                                                        <p><?php echo e($address->getDivisions->bn_name); ?> => <?php echo e($address->getdistrict->bn_name); ?> => <?php echo e($address->getupazila->bn_name); ?> => <?php echo e($address->getunion->bn_name); ?></p>
                                                                        
                                                                    </td>
                                                                    <td style="width: 15%">
                                                                        <div class="manage-add-btn">
                                                                            <button title="<?php echo e(__('Edit Address')); ?>" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($address->id); ?>" class="editlabel btn btn-sm btn-info">
                                                                                <i data-feather="edit"></i>
                                                                            </button>
                                                                            <button title="<?php echo e(__('Delete Address')); ?>" type="button" <?php if(env('DEMO_LOCK')==0): ?> data-bs-toggle="modal" data-bs-target="#deletemodal<?php echo e($address->id); ?>" <?php else: ?> disabled="" title="This action is disabled in demo !" <?php endif; ?> class="delbtn btn btn-danger btn-sm"><i data-feather="trash"></i></button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                
                                                                </tbody>
                                                            </table>


                                                            <!-- Edit Modal -->
                                                            <div class="modal fade" id="editModal<?php echo e($address->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="p-2 modal-title" id="myModalLabel"><?php echo e(__('Edit Address')); ?></h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="<?php echo e(route('address.update',$address->id)); ?>" role="form" method="POST">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-md-6 col-12">
                                                                                        <div class="mb-3">
                                                                                            <label class="font-weight-bold" class="font-weight-normal" for="name"><?php echo e(__('Name')); ?>:<span class="required">*</span></label>
                                                                                            <input required="" name="name" type="text" value="<?php echo e($address->name); ?>" placeholder="<?php echo e(__('Name')); ?>" class="form-control">
                                                                                        </div>
                                                                                    </div>
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    <div class="col-lg-4 col-md-6 col-12">
                                                                                        <div class="mb-3">
                                                                                            <label class="font-weight-bold" class="font-weight-normal" for="email"><?php echo e(__('PhoneNo')); ?>: <span class="required">*</span></label>
                                                                                            <input  type="text" placeholder="Edit Phone no" class="form-control" name="<?php echo e(__('phone')); ?>" value="<?php echo e($address->phone); ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                    <?php echo $__env->make('frontend.edit_bdlocation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    
                                                                                    <div class="col-lg-12 col-md-12 col-12">
                                                                                        <div class="mb-3">
                                                                                            <label class="font-weight-bold" class="font-weight-normal"><?php echo e(__('Address')); ?>: <span class="required">*</span></label>
                                                                                            <textarea required="" name="address" id="address" cols="20" rows="5" class="form-control"><?php echo e(strip_tags($address->address)); ?></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 col-md-6 col-12">
                                                                                    <div class="mb-3">
                                                                                        <div class="form-group checkout-personal-dtl">
                                                                                            <label class="address-checkbox"><?php echo e(__('Set Default Address')); ?>

                                                                                                <input <?php echo e($address->defaddress == 1 ? "checked" : ""); ?> type="checkbox" name="setdef">
                                                                                                <span class="checkmark"></span>
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-12 col-md-6 col-12">
                                                                                    <button class="btn btn-primary"><i data-feather="save"></i><?php echo e(__('Update')); ?></button>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Delete Modal -->
                                                            <div class="modal fade delete-modal" id="deletemodal<?php echo e($address->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            <div class="delete-icon"></div>
                                                                        </div>
                                                                        <div class="modal-body text-center">
                                                                            <h5 class="modal-heading"><?php echo e(__('Are You Sure ?')); ?></h5>
                                                                            <p><?php echo e(__('Do you really want to delete this address? This process cannot be undone')); ?>.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form method="post" action="<?php echo e(route('address.del',$address->id)); ?>" class="pull-right">
                                                                                <?php echo e(csrf_field()); ?>

                                                                                <?php echo e(method_field("DELETE")); ?>

                                                                                <button type="reset" class="btn btn-primary translate-y-3" data-bs-dismiss="modal">
                                                                                    <?php echo e(__('No')); ?>

                                                                                </button>
                                                                                <button type="submit" class="btn btn-danger">
                                                                                    <?php echo e(__('Yes')); ?>

                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                    <?php else: ?>
                                                        <h2><a class="cursor" data-target="#mngaddress" data-toggle="modal"><?php echo e(__('No Address')); ?></a></h2>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <form action="<?php echo e(route('choose.address')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="total" value="<?php echo e($total); ?>">

                                                <?php if(count($addresses)): ?>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input form-control-sm" type="radio" name="seladd" checked="checked" value="<?php echo e($addresses[0]->id); ?>" id="flexRadioDefault1">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            <?php echo e($addresses[0]->getDivisions->bn_name); ?> => <?php echo e($addresses[0]->getdistrict->bn_name); ?> => <?php echo e($addresses[0]->getupazila->bn_name); ?> => <?php echo e($addresses[0]->getunion->bn_name); ?>

                                                            
                                                        </label>
                                                    </div>
                                                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($key > 0): ?>
                                                            <div class="form-check">
                                                                <input class="form-check-input form-control-sm " type="radio" name="seladd"  value="<?php echo e($address->id); ?>" id="flexRadioDefault1">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    <?php echo e($address->getDivisions->bn_name); ?> => <?php echo e($address->getdistrict->bn_name); ?> => <?php echo e($address->getupazila->bn_name); ?> => <?php echo e($address->getunion->bn_name); ?>

                                                                </label>
                                                            </div>
                                                        <?php endif; ?>

                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <h3><?php echo e(__('No Address')); ?></h3>
                                                <?php endif; ?>
                                                <input type="hidden" name="shipping" value="<?php echo e($shippingcharge); ?>">

                                                
                                                <?php if($addresses->count() == 0 ): ?>
                                                    <button type="submit" disabled class="btn btn-primary mt-3"><?php echo e(__('Deliver Here')); ?></button>
                                                <?php else: ?>
                                                    <button type="submit" class="btn btn-primary  mt-3"><?php echo e(__('Deliver Here')); ?></button>
                                                <?php endif; ?>
                                            </form>

                                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="p-2 modal-title" id="myModalLabel"><?php echo e(__('Add Address')); ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo e(route('address.store')); ?>" role="form" method="POST">
                                                                <?php echo csrf_field(); ?>

                                                                <?php
                                                                    $ifadd = count(Auth::user()->addresses);
                                                                ?>

                                                                <div class="row">
                                                                    <div class="col-lg-4 col-md-6 col-12">
                                                                        <div class="mb-3">
                                                                            <label class="font-weight-bold" class="font-weight-normal"><?php echo e(__('Name')); ?>:</label>
                                                                            <input required type="text" <?php if($ifadd<1): ?> value="<?php echo e(Auth::user()->name); ?>" <?php else: ?> value="" <?php endif; ?> placeholder="<?php echo e(__('Enter name')); ?>" name="name" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-4 col-md-6 col-12">
                                                                        <div class="mb-3">
                                                                            <label class="font-weight-bold" class="font-weight-normal"><?php echo e(__('Phone No')); ?>:</label>
                                                                            <input  required type="text" <?php if($ifadd<1): ?> value="<?php echo e(Auth::user()->mobile); ?>" <?php else: ?> value="" <?php endif; ?> name="phone" placeholder="<?php echo e(__('Enter phone no')); ?>" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <?php echo $__env->make('frontend.bdlocation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    

                                                                    
                                                                    

                                                                    
                                                                    
                                                                    

                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    

                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    

                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    

                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    <div class="col-lg-12 col-md-12 col-12">
                                                                        <div class="mb-3">
                                                                            <label class="font-weight-bold" class="font-weight-normal"><?php echo e(__('Address')); ?>: </label>
                                                                            <textarea required name="address" id="address" cols="20" rows="5" class="form-control"><?php echo e(old('address')); ?></textarea>
                                                                        </div>
                                                                    </div>

                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    
                                                                    

                                                                    <div class="col-lg-12 col-md-12 col-12">
                                                                        <div class="mb-3">
                                                                            <div class="form-group checkout-personal-dtl">
                                                                                <label class="address-checkbox"><?php echo e(__('Set Default Address')); ?>

                                                                                    <input type="checkbox" name="setdef">
                                                                                    <span class="checkmark"></span>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-12 col-md-12 col-12">
                                                                        <button class="btn btn-primary"><i data-feather="save"></i><?php echo e(__('Submit')); ?></button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="checkout-block accordion-item">
                            <div class="checkout-payment-info accordion-header">


                                <h3 class="section-title accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">E. Payment Info</h3>
                                <div id="collapseFour" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <?php

                                        $config = $configs;

                                        $checkoutsetting_check = App\AutoDetectGeo::first();

                                        $listcheckOutCurrency =
                                        App\CurrencyCheckout::where('currency','=',Session::get('currency')['id'])->first();


                                        $secure_amount = 0;
                                        $handlingcharge = 0;
                                        $giftDiscount = Session::get('gift') ?  Session::get('gift')['discount'] :0;


                                        // Calulate handling charge
                                        if($genrals_settings->chargeterm == 'fo'){
                                        // on full order handling charge
                                        $handlingcharge = $genrals_settings->handlingcharge;
                                        }elseif($genrals_settings->chargeterm == 'pi'){
                                        // Per item handling charge
                                        $totalcartitem = count($cart_table);
                                        $handlingcharge = $genrals_settings->handlingcharge*$totalcartitem;
                                        }



                                        //end

                                        foreach ($cart_table as $key => $val) {
                                        if($val->active_cart == 1){
                                        if($val->product && $val->variant){
                                        if ($val->product->tax_r != null && $val->product->tax == 0) {

                                            if ($val->ori_offer_price != 0) {
                                                //get per product tax amount
                                                $p = 100;
                                                $taxrate_db = $val->product->tax_r;
                                                $vp = $p + $taxrate_db;
                                                $taxAmnt = intval($val->product->offer_price) / intval($vp) * intval($taxrate_db);
                                                $taxAmnt = sprintf("%.2f", $taxAmnt);
                                                $price = ($val->ori_offer_price - $taxAmnt) * $val->qty;

                                            } else {

                                                $p = 100;
                                                $taxrate_db = $val->product->tax_r;
                                                $vp = $p + $taxrate_db;
                                                $taxAmnt = $val->product->price / $vp * $taxrate_db;

                                                $taxAmnt = sprintf("%.2f", $taxAmnt);

                                                $price = ($val->ori_price - $taxAmnt) * $val->qty;
                                                
                                            }

                                            } else {

                                                if ($val->semi_total != 0) {

                                                    $price = $val->semi_total;
                                                
                                                } else {

                                                    $price = $val->price_total;
                                                    
                                                }
                                            }
                                        }else{

                                            if ($val->semi_total != 0) {

                                            $price = $val->semi_total - $val->tax_amount;

                                            } else {

                                            $price = $val->price_total - $val->tax_amount;



                                            }

                                        }


                                        $secure_amount = $secure_amount + $price ;

                                        }

                                        }

                                        if(Session::get('gift')){
                                        $secure_amount = ($secure_amount*$conversion_rate - Session::get('gift')['discount']);
                                        }else{
                                        $secure_amount = $secure_amount*$conversion_rate;
                                        }

                                        $secure_amount = sprintf("%.2f",$secure_amount);

                                        $un_sec = $secure_amount;

                                        $handlingcharge = $handlingcharge*$conversion_rate;

                                        $total_gift_pkg_charge = sprintf("%.2f",auth()->user()->cart()->sum('gift_pkg_charge') * $conversion_rate);

                                        $secure_amount += ($total_shipping*$conversion_rate)+$total_gift_pkg_charge+$total_tax_amount+$handlingcharge;



                                        if(App\Cart::isCoupanApplied() == '1'){
                                        $secure_amount = $secure_amount-(App\Cart::getDiscount()*$conversion_rate);
                                        }


                                        $secure_amount = Crypt::encrypt($secure_amount + $shippingChage ?? $shippingChage);
                                        $handlingchargeS = Crypt::encrypt($handlingcharge);
                                        Session::put('handlingcharge',$handlingchargeS);


                                        ?>
                                    <div class="accordion-body popular-item-main-block">
                                        <div class="py-30">
                                            <div class="row mb-30">
                                                <div class="col-lg-4">
                                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                        <?php if($config->paypal_enable == '1'): ?>
                                                        <a class="nav-link active" id="v-pills-paypalpaytab-tab" data-bs-toggle="pill" href="#v-pills-paypalpaytab" type="button" role="tab" aria-controls="v-pills-paypalpaytab" aria-selected="true" onclick=handlingcharge(this.id)><?php echo e(__('Pay Via Paypal')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($wallet_system == 1): ?>
                                                        <a class="nav-link" id="v-pills-wallet-tab" data-bs-toggle="pill" href="#v-pills-wallet" type="button" role="tab" aria-controls="v-pills-wallet" aria-selected="false"><?php echo e(__('Pay Via Wallet')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->braintree_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-braintree-tab" data-bs-toggle="pill" href="#v-pills-braintree" type="button" role="tab" aria-controls="v-pills-braintree" aria-selected="false"><?php echo e(__('Pay Via Braintree')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->paystack_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-paystack-tab" data-bs-toggle="pill" href="#v-pills-paystack" type="button" role="tab" aria-controls="v-pills-paystack" aria-selected="false"><?php echo e(__('Pay Via Paystack')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->instamojo_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-instamojo-tab" data-bs-toggle="pill" href="#v-pills-instamojo" type="button" role="tab" aria-controls="v-pills-instamojo" aria-selected="false"><?php echo e(__('Pay Via Instamojo')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->stripe_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-stripe-tab" data-bs-toggle="pill" href="#v-pills-stripe" type="button" role="tab" aria-controls="v-pills-stripe" aria-selected="false"><?php echo e(__('Pay Via Stripe')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->payu_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-payu-tab" data-bs-toggle="pill" href="#v-pills-payu" type="button" role="tab" aria-controls="v-pills-payu" aria-selected="false"><?php echo e(__('Pay Via PayUBiz / Money')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->paytm_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-paytam-tab" data-bs-toggle="pill" href="#v-pills-paytam" type="button" role="tab" aria-controls="v-pills-paytam" aria-selected="false"><?php echo e(__('Pay Via Paytam')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->razorpay == '1'): ?>
                                                        <a class="nav-link" id="v-pills-razorpay-tab" data-bs-toggle="pill" href="#v-pills-razorpay" type="button" role="tab" aria-controls="v-pills-razorpay" aria-selected="false"><?php echo e(__('Pay Via Razorpay')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->payhere_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-payhere-tab" data-bs-toggle="pill" href="#v-pills-payhere" type="button" role="tab" aria-controls="v-pills-payhere" aria-selected="false"><?php echo e(__('Pay Via Payhere')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->cashfree_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-cashfree-tab" data-bs-toggle="pill" href="#v-pills-cashfree" type="button" role="tab" aria-controls="v-pills-cashfree" aria-selected="false"><?php echo e(__('Pay Via Cashfree')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->omise_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-omise-tab" data-bs-toggle="pill" href="#v-pills-omise" type="button" role="tab" aria-controls="v-pills-omise" aria-selected="false"><?php echo e(__('Pay Via Omise')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->rave_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-rave-tab" data-bs-toggle="pill" href="#v-pills-rave" type="button" role="tab" aria-controls="v-pills-rave" aria-selected="false"><?php echo e(__('Pay Via Rave')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->moli_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-moli-tab" data-bs-toggle="pill" href="#v-pills-moli" type="button" role="tab" aria-controls="v-pills-moli" aria-selected="false"><?php echo e(__('Pay Via Mollie')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->skrill_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-skrill-tab" data-bs-toggle="pill" href="#v-pills-skrill" type="button" role="tab" aria-controls="v-pills-skrill" aria-selected="false"><?php echo e(__('Pay Via Skrill')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->sslcommerze_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-sslcommerze-tab" data-bs-toggle="pill" href="#v-pills-sslcommerze" type="button" role="tab" aria-controls="v-pills-sslcommerze" aria-selected="false"><?php echo e(__('Pay Via SSlCommerz')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->enable_amarpay == '1'): ?>
                                                        <a class="nav-link" id="v-pills-amarpay-tab" data-bs-toggle="pill" href="#v-pills-amarpay" type="button" role="tab" aria-controls="v-pills-amarpay" aria-selected="false"><?php echo e(__('Pay Via AAMARPAY')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if($config->iyzico_enable == '1'): ?>
                                                        <a class="nav-link" id="v-pills-iyzico-tab" data-bs-toggle="pill" href="#v-pills-iyzico" type="button" role="tab" aria-controls="v-pills-iyzico" aria-selected="false"><?php echo e(__('Pay Via Iyzcio')); ?></a>
                                                        <?php endif; ?>
                                                        <?php if(config('dpopayment.enable') == 1 && Module::has('DPOPayment') && Module::find('DPOPayment')->isEnabled()): ?>

                                                            <?php echo $__env->make("dpopayment::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('bkash.ENABLE') == 1 && Module::has('Bkash') && Module::find('Bkash')->isEnabled()): ?>

                                                            <?php echo $__env->make("bkash::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('mpesa.ENABLE') == 1 && Module::has('MPesa') && Module::find('MPesa')->isEnabled()): ?>

                                                            <?php echo $__env->make("mpesa::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('authorizenet.ENABLE') == 1 && Module::has('AuthorizeNet') && Module::find('AuthorizeNet')->isEnabled()): ?>

                                                            <?php echo $__env->make("authorizenet::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('worldpay.ENABLE') == 1 && Module::has('Worldpay') && Module::find('Worldpay')->isEnabled()): ?>

                                                            <?php echo $__env->make("worldpay::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('midtrains.ENABLE') == 1 && Module::has('Midtrains') && Module::find('Midtrains')->isEnabled()): ?>

                                                            <?php echo $__env->make("midtrains::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('paytab.ENABLE') == 1 && Module::has('Paytab') && Module::find('Paytab')->isEnabled()): ?>

                                                            <?php echo $__env->make("paytab::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('squarepay.ENABLE') == 1 && Module::has('SquarePay') && Module::find('SquarePay')->isEnabled()): ?>
                                                        
                                                            <?php echo $__env->make("squarepay::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('esewa.ENABLE') == 1 && Module::has('Esewa') && Module::find('Esewa')->isEnabled()): ?>
                                                        
                                                            <?php echo $__env->make("esewa::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('smanager.ENABLE') == 1 && Module::has('Smanager') && Module::find('Smanager')->isEnabled()): ?>
                                                        
                                                            <?php echo $__env->make("smanager::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('senangpay.ENABLE') == 1 && Module::has('Senangpay') && Module::find('Senangpay')->isEnabled()): ?>
                                                        
                                                            <?php echo $__env->make("senangpay::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('onepay.ENABLE') == 1 && Module::has('Onepay') && Module::find('Onepay')->isEnabled()): ?>
                                                        
                                                            <?php echo $__env->make("onepay::front.list", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>                                                       

                                                        <?php $__currentLoopData = App\ManualPaymentMethod::where('status','1')->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <a class="nav-link" href="#manualpaytab<?php echo e($item->id); ?>" data-toggle="tab"><?php echo e(ucfirst($item->payment_name)); ?></a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if(env('BANK_TRANSFER') == 1): ?>
                                                            <a class="nav-link" href="#btpaytab" data-toggle="tab"><?php echo e(__('Bank Tranfer')); ?></a>
                                                        <?php endif; ?>

                                                        <?php if(env('COD_ENABLE') == 1): ?>
                                                            <a class="nav-link" href="#codpaytab" data-toggle="tab"><?php echo e(__('Pay On Delivery')); ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8">
                                                    
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <?php if($config->paypal_enable == '1'): ?>

                                                            <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                <div class="tab-pane fade show active" id="v-pills-paypalpaytab" role="tabpanel" aria-labelledby="v-pills-paypalpaytab-tab" tabindex="0">
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                    <span class="payment_amount_label"><?php echo e(price_format(Crypt::decrypt($secure_amount))); ?></span></h3>
                                                                    <hr>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'paypal')): ?>

                                                                        <form action="<?php echo e(route('processTopayment')); ?>" method="POST">

                                                                        <?php echo e(csrf_field()); ?>

                                                                        <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <input type="hidden" name="payment_method" value="<?php echo e(__("Paypal")); ?>">
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <button type="submit" class="paypal-buy-now-button">
                                                                            <span><?php echo e(__('Express Checkout with')); ?></span>
                                                                            <svg aria-label="PayPal" xmlns="http://www.w3.org/2000/svg" width="90" height="33" viewBox="34.417 0 90 33">
                                                                            <path fill="#253B80" d="M46.211 6.749h-6.839a.95.95 0 0 0-.939.802l-2.766 17.537a.57.57 0 0 0 .564.658h3.265a.95.95 0 0 0 .939-.803l.746-4.73a.95.95 0 0 1 .938-.803h2.165c4.505 0 7.105-2.18 7.784-6.5.306-1.89.013-3.375-.872-4.415-.972-1.142-2.696-1.746-4.985-1.746zM47 13.154c-.374 2.454-2.249 2.454-4.062 2.454h-1.032l.724-4.583a.57.57 0 0 1 .563-.481h.473c1.235 0 2.4 0 3.002.704.359.42.469 1.044.332 1.906zM66.654 13.075h-3.275a.57.57 0 0 0-.563.481l-.146.916-.229-.332c-.709-1.029-2.29-1.373-3.868-1.373-3.619 0-6.71 2.741-7.312 6.586-.313 1.918.132 3.752 1.22 5.03.998 1.177 2.426 1.666 4.125 1.666 2.916 0 4.533-1.875 4.533-1.875l-.146.91a.57.57 0 0 0 .562.66h2.95a.95.95 0 0 0 .939-.804l1.77-11.208a.566.566 0 0 0-.56-.657zm-4.565 6.374c-.316 1.871-1.801 3.127-3.695 3.127-.951 0-1.711-.305-2.199-.883-.484-.574-.668-1.392-.514-2.301.295-1.855 1.805-3.152 3.67-3.152.93 0 1.686.309 2.184.892.499.589.697 1.411.554 2.317zM84.096 13.075h-3.291a.955.955 0 0 0-.787.417l-4.539 6.686-1.924-6.425a.953.953 0 0 0-.912-.678H69.41a.57.57 0 0 0-.541.754l3.625 10.638-3.408 4.811a.57.57 0 0 0 .465.9h3.287a.949.949 0 0 0 .781-.408l10.946-15.8a.57.57 0 0 0-.469-.895z">
                                                                            </path>
                                                                            <path fill="#179BD7" d="M94.992 6.749h-6.84a.95.95 0 0 0-.938.802l-2.767 17.537a.57.57 0 0 0 .563.658h3.51a.665.665 0 0 0 .656-.563l.785-4.971a.95.95 0 0 1 .938-.803h2.164c4.506 0 7.105-2.18 7.785-6.5.307-1.89.012-3.375-.873-4.415-.971-1.141-2.694-1.745-4.983-1.745zm.789 6.405c-.373 2.454-2.248 2.454-4.063 2.454h-1.031l.726-4.583a.567.567 0 0 1 .562-.481h.474c1.233 0 2.399 0 3.002.704.358.42.467 1.044.33 1.906zM115.434 13.075h-3.272a.566.566 0 0 0-.562.481l-.146.916-.229-.332c-.709-1.029-2.289-1.373-3.867-1.373-3.619 0-6.709 2.741-7.312 6.586-.312 1.918.131 3.752 1.22 5.03 1 1.177 2.426 1.666 4.125 1.666 2.916 0 4.532-1.875 4.532-1.875l-.146.91a.57.57 0 0 0 .563.66h2.949a.95.95 0 0 0 .938-.804l1.771-11.208a.57.57 0 0 0-.564-.657zm-4.565 6.374c-.314 1.871-1.801 3.127-3.695 3.127-.949 0-1.711-.305-2.199-.883-.483-.574-.666-1.392-.514-2.301.297-1.855 1.805-3.152 3.67-3.152.93 0 1.686.309 2.184.892.501.589.699 1.411.554 2.317zM119.295 7.23l-2.807 17.858a.569.569 0 0 0 .562.658h2.822c.469 0 .866-.34.938-.803l2.769-17.536a.57.57 0 0 0-.562-.659h-3.16a.571.571 0 0 0-.562.482z">
                                                                            </path>
                                                                            </svg>
                                                                        </button>

                                                                        </form>
                                                                        <hr>
                                                                        <p class="text-muted"><i class="fa fa-lock"></i>
                                                                        <?php echo e(__('Your transcation is secured with Paypal 128 bit encryption')); ?>.</p>

                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Paypal')); ?> <?php echo e(__('Check Not Available')); ?>

                                                                        <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="tab-pane fade show active" id="v-pills-paypalpaytab" role="tabpanel" aria-labelledby="v-pills-paypalpaytab-tab" tabindex="0">
                                                                    <h3>Pay <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                    <span class="payment_amount_label"><?php echo e(price_format(Crypt::decrypt($secure_amount))); ?></span></h3>
                                                                    <hr>
                                                                    <form action="<?php echo e(route('processTopayment')); ?>" method="POST">
                                                
                                                                        <?php echo e(csrf_field()); ?>

                                                                        <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <input type="hidden" name="payment_method" value="<?php echo e(__("Paypal")); ?>">
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <button type="submit" class="paypal-buy-now-button">
                                                                        <span><?php echo e(__('Express Checkout with')); ?></span>
                                                                        <svg aria-label="PayPal" xmlns="http://www.w3.org/2000/svg" width="90" height="33" viewBox="34.417 0 90 33">
                                                                            <path fill="#253B80" d="M46.211 6.749h-6.839a.95.95 0 0 0-.939.802l-2.766 17.537a.57.57 0 0 0 .564.658h3.265a.95.95 0 0 0 .939-.803l.746-4.73a.95.95 0 0 1 .938-.803h2.165c4.505 0 7.105-2.18 7.784-6.5.306-1.89.013-3.375-.872-4.415-.972-1.142-2.696-1.746-4.985-1.746zM47 13.154c-.374 2.454-2.249 2.454-4.062 2.454h-1.032l.724-4.583a.57.57 0 0 1 .563-.481h.473c1.235 0 2.4 0 3.002.704.359.42.469 1.044.332 1.906zM66.654 13.075h-3.275a.57.57 0 0 0-.563.481l-.146.916-.229-.332c-.709-1.029-2.29-1.373-3.868-1.373-3.619 0-6.71 2.741-7.312 6.586-.313 1.918.132 3.752 1.22 5.03.998 1.177 2.426 1.666 4.125 1.666 2.916 0 4.533-1.875 4.533-1.875l-.146.91a.57.57 0 0 0 .562.66h2.95a.95.95 0 0 0 .939-.804l1.77-11.208a.566.566 0 0 0-.56-.657zm-4.565 6.374c-.316 1.871-1.801 3.127-3.695 3.127-.951 0-1.711-.305-2.199-.883-.484-.574-.668-1.392-.514-2.301.295-1.855 1.805-3.152 3.67-3.152.93 0 1.686.309 2.184.892.499.589.697 1.411.554 2.317zM84.096 13.075h-3.291a.955.955 0 0 0-.787.417l-4.539 6.686-1.924-6.425a.953.953 0 0 0-.912-.678H69.41a.57.57 0 0 0-.541.754l3.625 10.638-3.408 4.811a.57.57 0 0 0 .465.9h3.287a.949.949 0 0 0 .781-.408l10.946-15.8a.57.57 0 0 0-.469-.895z">
                                                                            </path>
                                                                            <path fill="#179BD7" d="M94.992 6.749h-6.84a.95.95 0 0 0-.938.802l-2.767 17.537a.57.57 0 0 0 .563.658h3.51a.665.665 0 0 0 .656-.563l.785-4.971a.95.95 0 0 1 .938-.803h2.164c4.506 0 7.105-2.18 7.785-6.5.307-1.89.012-3.375-.873-4.415-.971-1.141-2.694-1.745-4.983-1.745zm.789 6.405c-.373 2.454-2.248 2.454-4.063 2.454h-1.031l.726-4.583a.567.567 0 0 1 .562-.481h.474c1.233 0 2.399 0 3.002.704.358.42.467 1.044.33 1.906zM115.434 13.075h-3.272a.566.566 0 0 0-.562.481l-.146.916-.229-.332c-.709-1.029-2.289-1.373-3.867-1.373-3.619 0-6.709 2.741-7.312 6.586-.312 1.918.131 3.752 1.22 5.03 1 1.177 2.426 1.666 4.125 1.666 2.916 0 4.532-1.875 4.532-1.875l-.146.91a.57.57 0 0 0 .563.66h2.949a.95.95 0 0 0 .938-.804l1.771-11.208a.57.57 0 0 0-.564-.657zm-4.565 6.374c-.314 1.871-1.801 3.127-3.695 3.127-.949 0-1.711-.305-2.199-.883-.483-.574-.666-1.392-.514-2.301.297-1.855 1.805-3.152 3.67-3.152.93 0 1.686.309 2.184.892.501.589.699 1.411.554 2.317zM119.295 7.23l-2.807 17.858a.569.569 0 0 0 .562.658h2.822c.469 0 .866-.34.938-.803l2.769-17.536a.57.57 0 0 0-.562-.659h-3.16a.571.571 0 0 0-.562.482z">
                                                                            </path>
                                                                        </svg>
                                                                        </button>
                                                
                                                                    </form>
                                                                    <hr>
                                                                    <p class="text-muted"><i class="fa fa-lock"></i><?php echo e(__('Your transcation is secured with Paypal 128 bit encryption')); ?>.</p></p>
                                                                </div>
                                                            <?php endif; ?>

                                                        <?php endif; ?>

                                                        <?php if($wallet_system == 1): ?>
                                                            <div class="tab-pane fade" id="v-pills-wallet" role="tabpanel" aria-labelledby="v-pills-wallet-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <?php if(isset(Auth::user()->wallet)): ?>
                                                                        <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'wallet')): ?>
                                                                            <?php if(Auth::user()->wallet->status == 1): ?>

                                                                                <?php if(pre_order_disable() == false): ?>

                                                                                    <!-- If it return false menas cart has some pre order product and payment gateway do not support it -->

                                                                                    <?php if(round(Auth::user()->wallet->balance*$conversion_rate) >= sprintf("%.2f",Crypt::decrypt($secure_amount))): ?>
                                                                                        <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                        <span class="payment_amount_label">
                                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                                        </span></h3>
                                                                                        <hr>

                                                                                        <form action="<?php echo e(route('checkout.with.wallet')); ?>" method="POST">
                                                                                            <?php echo csrf_field(); ?>
                                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                            <input class="w3-input w3-border total_secure_amount" id="amount" type="hidden" name="amount" value="<?php echo e($secure_amount); ?>">
                                                                                            <button title="<?php echo e(__('Pay')); ?> <?php echo e(__('via')); ?> <?php echo e(__('Wallet')); ?>" type="submit" class="btn btn-primary">
                                                                                                <i class="fa fa-folder-o" aria-hidden="true"></i> <?php echo e(__('Pay')); ?>

                                                                                                <?php echo e(__('via')); ?> <?php echo e(__('Wallet')); ?>

                                                                                            </button>
                                                                                        </form>

                                                                                    <?php else: ?>
                                                                                        <h4><?php echo e(__('notenoughpoint')); ?>

                                                                                        <hr> <a title="Your Wallet" href="<?php echo e(route('user.wallet.show')); ?>">My Wallet</a></h4>
                                                                                    <?php endif; ?>

                                                                                <?php else: ?>
                                                                                    <h4 class="text-red"><?php echo e(__('Wallet Not Active')); ?></h4>
                                                                                <?php endif; ?>

                                                                            <?php else: ?> 
                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                            <?php endif; ?>

                                                                        <?php else: ?>
                                                                            <h5><?php echo e(__('Wallet')); ?> <?php echo e(__('Check Not Available')); ?>

                                                                            <b><?php echo e(session()->get('currency')['id']); ?></b>.</h5>
                                                                        <?php endif; ?>

                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Some Thing Want Wrong')); ?></h4>
                                                                    <?php endif; ?>

                                                                <?php else: ?>

                                                                    <?php if(isset(Auth::user()->wallet)): ?>
                                                                        <?php if(Auth::user()->wallet->status == 1): ?>
                                                                            <?php if(pre_order_disable() == false): ?>
                                                                                <?php if(round(Auth::user()->wallet->balance*$conversion_rate) >= sprintf("%.2f",Crypt::decrypt($secure_amount))): ?>
                                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                    <span class="payment_amount_label">
                                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                                    </span></h3>
                                                                                    <hr>
                                                                                    <form action="<?php echo e(route('checkout.with.wallet')); ?>" method="POST">
                                                                                        <?php echo csrf_field(); ?>
                                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                        <input class="w3-input w3-border total_secure_amount" id="amount" type="hidden" name="amount"
                                                                                            value="<?php echo e($secure_amount); ?>">
                                                                                        <button title="<?php echo e(__('Pay')); ?> <?php echo e(__('via')); ?> <?php echo e(__('Wallet')); ?>" type="submit" class="btn btn-primary">
                                                                                            <i class="fa fa-folder-o" aria-hidden="true"></i> <?php echo e(__('Pay')); ?>

                                                                                            <?php echo e(__('via')); ?> <?php echo e(__('Wallet')); ?>

                                                                                        </button>
                                                                                    </form>
                                                                                <?php else: ?>
                                                                                    <h4><?php echo e(__('Some Thing Want Wrong')); ?>

                                                                                    <hr> <a title="Your Wallet" href="<?php echo e(route('user.wallet.show')); ?>">My Wallet</a></h4>
                                                                                <?php endif; ?>

                                                                            <?php else: ?> 
                                                                                <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                            <?php endif; ?>

                                                                        <?php else: ?>
                                                                            <h4 class="text-red"><?php echo e(__('wallet Not Active')); ?></h4>
                                                                        <?php endif; ?>

                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Some Thing Want Wrong')); ?></h4>
                                                                    <?php endif; ?>

                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->braintree_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-braintree" role="tabpanel" aria-labelledby="v-pills-braintree-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'braintree')): ?>

                                                                        <?php if(pre_order_disable() == false): ?>

                                                                        <a href="javascript:void(0);" class="payment-btn bt-btn btn btn-md btn-primary"><i class="fa fa-credit-card"></i> <?php echo e(__('Pay via Card / Paypal')); ?></a>
                                                                        <form method="POST" id="bt-form" action="<?php echo e(route('pay.bt')); ?>">
                                                                            <?php echo e(csrf_field()); ?>

                                                                            <div class="form-group">
                                                                                <input type="hidden" class="form-control total_secure_amount" name="amount" value="<?php echo e($secure_amount); ?>">
                                                                            </div>
                                                                            <div class="bt-drop-in-wrapper">
                                                                                <div id="bt-dropin"></div>
                                                                            </div>
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                                                                            <button class="payment-final-bt d-none btn btn-md btn-primary" type="submit">
                                                                                <?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                <span class="payment_amount_label">
                                                                                    <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                                </span> <?php echo e(__('Now')); ?>

                                                                            </button>
                                                                            <div id="pay-errors" role="alert"></div>
                                                                        </form>
                                                                        <hr>
                                                                        <p class="text-muted"><i class="fa fa-lock"></i>
                                                                            <?php echo e(__('Your transcation is secured with Braintree Payments')); ?>.</p>

                                                                        <?php else: ?> 
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                        <?php endif; ?>

                                                                    <?php else: ?>

                                                                    <h4><?php echo e(__('Braintree')); ?> <?php echo e(__('Check Not Available')); ?>

                                                                    <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>

                                                                    <?php endif; ?>

                                                                <?php else: ?>

                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                    <span class="payment_amount_label">
                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                    </span></h3>
                                                                    <hr>
                                                                    <?php if(pre_order_disable() == false): ?>

                                                                        <a href="javascript:void(0);" class="payment-btn bt-btn btn btn-md btn-primary"><i class="fa fa-credit-card"></i> Pay via Card / Paypal</a>
                                                                        <form method="POST" id="bt-form" action="<?php echo e(route('pay.bt')); ?>">
                                                                            <?php echo e(csrf_field()); ?>

                                                                            <div class="form-group">
                                                                                <input type="hidden" class="form-control total_secure_amount" name="amount" value="<?php echo e($secure_amount); ?>">
                                                                            </div>
                                                                            <div class="bt-drop-in-wrapper">
                                                                                <div id="bt-dropin"></div>
                                                                            </div>
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input id="nonce" name="payment_method_nonce" type="hidden" />
                                                                            <button class="payment-final-bt d-none btn btn-md btn-primary" type="submit">
                                                                                Pay <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                <?php echo e(sprintf("%.2f",Crypt::decrypt($secure_amount),2)); ?> Now
                                                                            </button>
                                                                            <div id="pay-errors" role="alert"></div>
                                                                        </form>
                                                                        <hr>
                                                                        <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Your transcation is secured with Braintree Payments.')); ?>.</p>

                                                                    <?php else: ?> 

                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                    <?php endif; ?>
                                                                    
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->paystack_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-paystack" role="tabpanel" aria-labelledby="v-pills-paystack-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                    <span class="payment_amount_label">
                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                    </span></h3>
                                                                    <hr>

                                                                    <?php if(pre_order_disable() == false): ?>
                                                                        <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'paystack')): ?>
                                                
                                                                            <form method="POST" action="<?php echo e(route('pay.via.paystack')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                <input type="hidden" name="email" value="<?php echo e(Auth::user()->email); ?>"> 
                                                                                <input type="hidden" name="orderID" value="<?php echo e(uniqid()); ?>">
                                                                                <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                                
                                                                                <input type="hidden" name="quantity" value="1">
                                                                                <input type="hidden" name="currency" value="<?php echo e(session()->get('currency')['id']); ?>">
                                                                                <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['key_name' => 'value',])); ?>">
                                                                                
                                                                                <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 
                                                                                <?php echo e(csrf_field()); ?> 
                                                                                
                                                    
                                                                                <button class="btn btn-success btn-md" type="submit" value="Pay Now!"> <?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                    <span class="payment_amount_label"> <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?></span> <?php echo e(__('Now')); ?>

                                                                                </button>
                                                    
                                                                            </form>
                                                    
                                                                            <hr>
                                                                            <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Your transcation is secured with Paystack Payments')); ?>.</p>
                                                
                                                                        <?php else: ?>
                                                
                                                                            <h4><?php echo e(__('Paystack')); ?> <?php echo e(__('Not Available')); ?>

                                                                            <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>

                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label"><?php echo e(price_format(Crypt::decrypt($secure_amount))); ?></span> 
                                                                    </h3>
                                                                    <hr>

                                                                        <?php if(pre_order_disable() == false): ?>

                                                                            <form method="POST" action="<?php echo e(route('pay.via.paystack')); ?>" accept-charset="UTF-8" class="form-horizontal" role="form">
                                                                                <?php echo e(csrf_field()); ?>

                                                                                <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                <input type="hidden" name="email" value="<?php echo e(Auth::user()->email); ?>">
                                                                                <input type="hidden" name="orderID" value="<?php echo e(uniqid()); ?>">
                                                                                <input type="hidden" class="total_paystack_amount" name="amount" value="<?php echo e(sprintf("%.2f",(Crypt::decrypt($secure_amount))*100)); ?>"> 
                                                                                <input type="hidden" name="quantity" value="1">
                                                                                <input type="hidden" name="currency" value="<?php echo e(session()->get('currency')['id']); ?>">
                                                                                <input type="hidden" name="metadata" value="<?php echo e(json_encode($array = ['key_name' => 'value',])); ?>">
                                                                                
                                                                                <input type="hidden" name="reference" value="<?php echo e(Paystack::genTranxRef()); ?>"> 
                                                                                

                                                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                                                

                                                                                <button class="btn btn-success btn-md" type="submit" value="Pay Now!">
                                                                                    <?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                    <span class="payment_amount_label">
                                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                                    </span> <?php echo e(__('Now')); ?>

                                                                                </button>

                                                                            </form>
                                                                            <hr>
                                                                            <p class="text-muted"><i class="fa fa-lock"></i><?php echo e(__('Your transcation is secured with Paystack Payments.')); ?>.</p>

                                                                        <?php else: ?>

                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                        <?php endif; ?>

                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->instamojo_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-instamojo" role="tabpanel" aria-labelledby="v-pills-instamojo-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'instamojo')): ?>

                                                                        <h3><?php echo e(__('Pay')); ?><i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span></h3>
                                                                        <hr>
                                                                        <form action="<?php echo e(route('processTopayment')); ?>" method="POST">
                                                                            <?php echo csrf_field(); ?>
                                                                            <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input type="hidden" name="payment_method" value="<?php echo e(__("Instamojo")); ?>">

                                                                            <button type="submit" class="insta-buy-now-button">
                                                                                <span><?php echo e(__('Express Checkout with')); ?> <img src="<?php echo e(url('images/download.png')); ?>"
                                                                                    alt="instamojo" title="<?php echo e(__('Pay with Instamojo')); ?>"></span>
                                                                            </button>
                                                                        </form>
                                                                    <?php else: ?>

                                                                        <h4><?php echo e(__('Instamojo')); ?> <?php echo e(__('Not Available')); ?>

                                                                        <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>

                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    <form action="<?php echo e(route('processTopayment')); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <input type="hidden" name="payment_method" value="<?php echo e(__("Instamojo")); ?>">
                                                                        
                                                                        <button type="submit" class="insta-buy-now-button">
                                                                            <span><?php echo e(__('Express Checkout with')); ?> <img src="<?php echo e(url('images/download.png')); ?>"
                                                                                alt="instamojo" title="<?php echo e(__('Pay with Instamojo')); ?>"></span>
                                                                        </button>
                                                                    </form>
                                                                    <hr>
                                                                    <p class="text-muted"><i class="fa fa-lock"></i><?php echo e(__('Your transcation is secured with Instamojo Payment protection')); ?>.</p>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->stripe_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-stripe" role="tabpanel" aria-labelledby="v-pills-stripe-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'stripe')): ?>
                                                                        <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                            <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                            </span>
                                                                        </h3>
                                                                        
                                                                        <?php if(pre_order_disable() == false): ?>

                                                                            <div class="row">
                                                                                <div class="col-lg-7 col-md-7">
                                                                                    <div class="card-wrapper"></div>
                                                                                    <br>
                                                                                    <p class="text-muted"><i class="fa fa-lock"></i><?php echo e(__('Secured Transcation Powered By Stripe Payments')); ?></p>
                                                                                </div>

                                                                                <div class="col-lg-5 col-md-5">
                                                                                    <div class="form-container active">
                                                                                        <form method="POST" action="<?php echo e(route('paytostripe')); ?>" id="credit-card">
                                                                                            <?php echo csrf_field(); ?>
                                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                            <div class="form-group">
                                                                                                <input max="16" class="form-control" placeholder="Card number" type="tel" name="number">
                                                                                                <?php if($errors->has('number')): ?>
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('number')); ?></strong>
                                                                                                </span>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <input class="form-control" placeholder="Full name" type="text" name="name">
                                                                                                <?php if($errors->has('name')): ?>
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                                                                                </span>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <input class="form-control" placeholder="MM/YY" type="tel" name="expiry">
                                                                                                <?php if($errors->has('expiry')): ?>
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('expiry')); ?></strong>
                                                                                                </span>
                                                                                                <?php endif; ?>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <input class="form-control" placeholder="CVC" type="password" name="cvc">
                                                                                                <?php if($errors->has('cvc')): ?>
                                                                                                <span class="invalid-feedback" role="alert">
                                                                                                <strong><?php echo e($errors->first('cvc')); ?></strong>
                                                                                                </span>
                                                                                                <?php endif; ?>
                                                                                            </div>

                                                                                            <input id="amount" type="hidden" class="total_secure_amount form-control" name="amount"
                                                                                                value="<?php echo e($secure_amount); ?>">

                                                                                            <div class="form-group">
                                                                                                <button title="<?php echo e(__('Click to complete your payment !')); ?>" type="submit"
                                                                                                class="btn btn-primary btn-lg btn-block" id="confirm-purchase"><?php echo e(__('Pay')); ?> <i
                                                                                                    class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                                <?php if(Session::has('coupanapplied')): ?>
                                                                                                <span class="payment_amount_label">
                                                                                                    <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                                                </span>

                                                                                                <?php else: ?>
                                                                                                <span class="payment_amount_label">
                                                                                                    <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                                                </span>
                                                                                                <?php endif; ?> <?php echo e(__('Now')); ?></button>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                        <?php endif; ?>

                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Stripe Card')); ?> <?php echo e(__('Not Available')); ?> <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <?php if(pre_order_disable() == false): ?>

                                                                        <div class="row">
                                                                            <div class="col-lg-7 col-md-7">
                                                                                <div class="card-wrapper"></div>
                                                                                <br>
                                                                                <p class="text-muted"><i class="fa fa-lock"></i>
                                                                                <?php echo e(__('Secured Card Transcations Powered By Stripe Payments')); ?></p>
                                                                            </div>

                                                                            <div class="col-lg-5 col-md-5">
                                                                                <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                <?php echo e(price_format(Crypt::decrypt($secure_amount),2)); ?></h3>
                                                                                <div class="form-container active">
                                                                                <form method="POST" action="<?php echo e(route('paytostripe')); ?>" id="credit-card">
                                                                                    <?php echo csrf_field(); ?>

                                                                                    <div class="form-group">
                                                                                    <input max="16" class="form-control" placeholder="Card number" type="tel" name="number">
                                                                                    <?php if($errors->has('number')): ?>
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong><?php echo e($errors->first('number')); ?></strong>
                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                    <input class="form-control" placeholder="Full name" type="text" name="name">
                                                                                    <?php if($errors->has('name')): ?>
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                    <input class="form-control" placeholder="MM/YY" type="tel" name="expiry">
                                                                                    <?php if($errors->has('expiry')): ?>
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong><?php echo e($errors->first('expiry')); ?></strong>
                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                    <input class="form-control" placeholder="CVC" type="password" name="cvc">
                                                                                    <?php if($errors->has('cvc')): ?>
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong><?php echo e($errors->first('cvc')); ?></strong>
                                                                                    </span>
                                                                                    <?php endif; ?>
                                                                                    </div>

                                                                                    <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                    <input id="amount" type="hidden" class="form-control total_secure_amount" name="amount"
                                                                                    value="<?php echo e($secure_amount); ?>">

                                                                                    <div class="form-group">
                                                                                    <button title="Click to complete your payment !" type="submit"
                                                                                        class="btn btn-primary btn-lg btn-block" id="confirm-purchase"><?php echo e(__('Pay')); ?> <i
                                                                                        class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                        <?php if(Session::has('coupanapplied')): ?>
                                                                                        <span class="payment_amount_label">
                                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                                        </span>

                                                                                        <?php else: ?>
                                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                                        <?php endif; ?> <?php echo e(__('Now')); ?></button>
                                                                                    </div>

                                                                                </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    <?php else: ?> 
                                                                    <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->payu_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-payu" role="tabpanel" aria-labelledby="v-pills-payu-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'payu')): ?>

                                                                        <h3><?php echo e(__('Pay')); ?><i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label"><?php echo e(price_format(Crypt::decrypt($secure_amount))); ?> </span></h3>
                                                                        <hr>

                                                                        <?php if(pre_order_disable() == false): ?>

                                                                            <form action="<?php echo e(route('processTopayment')); ?>" method="POST">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                                <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                <input type="hidden" name="payment_method" value="<?php echo e(__("Payu")); ?>">
                                                                                <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                <button type="submit" class="payu-buy-now-button">
                                                                                <span><?php echo e(__('Express checkout with')); ?> <img src="<?php echo e(url('images/payu.png')); ?>" alt="payulogo"
                                                                                    title="<?php echo e(__('Pay with PayU')); ?>"></span>
                                                                                </button>
                                                                            </form>
                                                                            <hr>
                                                                            <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Secured Transcation Powered By PayU Payments')); ?></p>

                                                                        <?php else: ?>

                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                        <?php endif; ?>

                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Payu Money')); ?> <?php echo e(__('Not Available')); ?> <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3>
                                                                        <?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    
                                                                    <?php if(pre_order_disable() == false): ?>
                                                                        <form action="<?php echo e(route('processTopayment')); ?>" method="POST">
                                                                            <?php echo csrf_field(); ?>
                                                                            <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input type="hidden" name="payment_method" value="<?php echo e(__("Payu")); ?>">
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <button type="submit" class="payu-buy-now-button">
                                                                            <span><?php echo e(__('Express checkout with')); ?> <img src="<?php echo e(url('images/payu.png')); ?>" alt="payulogo"
                                                                                title="<?php echo e(__('Pay with PayU')); ?>"></span>
                                                                            </button>
                                                                        </form>
                                                                        <hr>
                                                                        <p class="text-muted"><i class="fa fa-lock"></i><?php echo e(__('Secured Transcation Powered By PayU Payments')); ?></p>
                                                                    <?php else: ?>
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->paytm_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-paytam" role="tabpanel" aria-labelledby="v-pills-paytam-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'Paytm')): ?>

                                                                        <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                            <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                            </span>
                                                                        </h3>
                                                                        <hr>
                                                                        <form action="<?php echo e(route('processTopayment')); ?>" method="POST">
                                                                            <?php echo csrf_field(); ?>
                                                                            <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input type="hidden" name="payment_method" value="<?php echo e(__("Paytm")); ?>">
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <button type="submit" class="paytm-buy-now-button">
                                                                                <span>Express checkout with <img src="<?php echo e(url('images/paywithpaytm.jpg')); ?>" title="Pay with Paytm"></span>
                                                                            </button>
                                                                        </form>
                                                                        <hr>
                                                                        <p class="text-muted"><i class="fa fa-lock"></i>
                                                                        <?php echo e(__('Secured Transcation Powered By Paytm Payments')); ?></p>

                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Paytm')); ?> <?php echo e(__('Not Available')); ?><b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    <form action="<?php echo e(route('processTopayment')); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <input type="hidden" name="payment_method" value="<?php echo e(__("Paytm")); ?>">
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <button type="submit" class="paytm-buy-now-button">
                                                                            <span><?php echo e(__('Express checkout with')); ?> <img src="<?php echo e(url('images/paywithpaytm.jpg')); ?>" title="<?php echo e(__('Pay with Paytm')); ?>"></span>
                                                                        </button>
                                                                    </form>
                                                                    <hr>
                                                                    <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Secured Transcation Powered By Paytm Payments')); ?></p>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->razorpay == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-razorpay" role="tabpanel" aria-labelledby="v-pills-razorpay-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'Razorpay')): ?>
                                                                        <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                            <span class="payment_amount_label">
                                                                                <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                            </span></h3>
                                                                        <hr>
                                                                            
                                                                        <?php if(pre_order_disable() == false): ?>

                                                                            <form id="rpayform" action="<?php echo e(route('rpay')); ?>" method="POST">
                                                                                <?php
                                                                                $order = uniqid();
                                                                                Session::put('order_id',$order);
                                                                                ?>
                                                                                <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo e(env('RAZOR_PAY_KEY')); ?>"
                                                                                data-amount="<?php echo e((round(Crypt::decrypt($secure_amount),2))*100); ?>"
                                                                                data-buttontext="Pay <?php echo e($secure_amount); ?> INR" data-name="<?php echo e($title); ?>"
                                                                                data-description="Payment For Order <?php echo e(Session::get('order_id')); ?>"
                                                                                data-image="<?php echo e(url('images/genral/'.$front_logo)); ?>" data-prefill.name="<?php echo e($address->name); ?>"
                                                                                data-prefill.email="<?php echo e($address->email); ?>" data-theme.color="#157ED2">
                                                                                </script>
                                                                                <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                                            </form>

                                                                        <?php else: ?> 
                                                                        
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                        <?php endif; ?>

                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('RazorPay')); ?> <?php echo e(__('Not Available')); ?> <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    
                                                                    <?php if(pre_order_disable() == false): ?>
                                                                        <form id="rpayform" action="<?php echo e(route('rpay')); ?>" method="POST">
                                                                            <?php
                                                                            $order = uniqid();
                                                                            Session::put('order_id',$order);
                                                                            ?>
                                                                            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="<?php echo e(env('RAZOR_PAY_KEY')); ?>"
                                                                                data-amount="<?php echo e((round(Crypt::decrypt($secure_amount),2))*100); ?>"
                                                                                data-buttontext="Pay <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?> INR" data-name="<?php echo e($title); ?>"
                                                                                data-description="Payment For Order <?php echo e(Session::get('order_id')); ?>"
                                                                                data-image="<?php echo e(url('images/genral/'.$front_logo)); ?>" data-prefill.name="<?php echo e($address->name); ?>"
                                                                                data-prefill.email="<?php echo e($address->email); ?>" data-theme.color="#157ED2">
                                                                            </script>
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                                                        </form>
                                                                    <?php else: ?>
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->payhere_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-payhere" role="tabpanel" aria-labelledby="v-pills-payhere-tab" tabindex="0">
                                                                <?php
                                                                    $address = App\Address::find(session()->get('address'));
                                                                    $payhere_order_id = uniqid();
                                                                ?>

                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'payhere')): ?>

                                                                        <?php if(pre_order_disable() == false): ?>

                                                                            <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="merchant_id" value="<?php echo e(env('PAYHERE_MERCHANT_ID')); ?>">
                                                                                <!-- Replace your Merchant ID -->
                                                                                <input type="hidden" name="return_url" value="<?php echo e(url('/payhere/callback')); ?>">
                                                                                <input type="hidden" name="cancel_url" value="<?php echo e(url('/checkout')); ?>">
                                                                                <input type="hidden" name="notify_url" value="<?php echo e(url('/notify/payhere')); ?>">
                                                                                <input type="hidden" name="order_id" value="<?php echo e($payhere_order_id); ?>">
                                                                                <input type="hidden" name="items" value="Payment For Order <?php echo e($payhere_order_id); ?>">
                                                                                <input type="hidden" name="currency" value="<?php echo e(session()->get('currency')['id']); ?>">
                                                                                <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                                <input type="hidden" name="first_name" value="<?php echo e(Auth::user()->name); ?>">
                                                                                <input type="hidden" name="last_name" value="<?php echo e(Auth::user()->name); ?>">
                                                                                <input type="hidden" name="email" value="<?php echo e(Auth::user()->email); ?>">
                                                                                <input type="hidden" name="phone" value="<?php echo e(Auth::user()->mobile); ?>">
                                                                                <input type="hidden" name="address" value="<?php echo e(isset($address) ? $address['address'] : "No Address"); ?>">
                                                                                <input type="hidden" name="city" value="<?php echo e($address->getcity['name'] ?? ''); ?>">
                                                                                <input type="hidden" name="country" value="<?php echo e($address->getCountry['nicename']); ?>">
                                                                                <button type="submit" class="payhere-buy-now-button">
                                                                                    <span> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                        <?php echo e(sprintf("%.2f",Crypt::decrypt($secure_amount),2)); ?> <img src="<?php echo e(url('images/payhere.png')); ?>" alt="payherelogo" title="Pay with Payhere">
                                                                                    </span>
                                                                                </button>
                                                                            </form>
                                                        
                                                                            <hr>
                                                                            <p class="text-muted"><i class="fa fa-lock"></i><?php echo e(__('Your transcation is secured with Paypal 128 bit encryption')); ?>.</p>
                                                                        <?php else: ?>
                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                        <?php endif; ?>

                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Payhere')); ?> <?php echo e(__('Not Available')); ?><b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>

                                                                    <?php if(pre_order_disable() == false): ?>

                                                                        <form method="post" action="https://sandbox.payhere.lk/pay/checkout">
                                                                            <?php echo csrf_field(); ?>
                                                                            <input type="hidden" name="merchant_id" value="<?php echo e(env('PAYHERE_MERCHANT_ID')); ?>">
                                                                            <!-- Replace your Merchant ID -->
                                                                            <input type="hidden" name="return_url" value="<?php echo e(url('/payhere/callback')); ?>">
                                                                            <input type="hidden" name="cancel_url" value="<?php echo e(url('/checkout')); ?>">
                                                                            <input type="hidden" name="notify_url" value="<?php echo e(url('/notify/payhere')); ?>">
                                                                            <input type="hidden" name="order_id" value="<?php echo e($payhere_order_id); ?>">
                                                                            <input type="hidden" name="items" value="Payment For Order <?php echo e($payhere_order_id); ?>">
                                                                            <input type="hidden" name="currency" value="<?php echo e(session()->get('currency')['id']); ?>">
                                                                            <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e(Crypt::decrypt($secure_amount)); ?>">
                                                                            <input type="hidden" name="first_name" value="<?php echo e(Auth::user()->name); ?>">
                                                                            <input type="hidden" name="last_name" value="<?php echo e(Auth::user()->name); ?>">
                                                                            <input type="hidden" name="email" value="<?php echo e(Auth::user()->email); ?>">
                                                                            <input type="hidden" name="phone" value="<?php echo e(Auth::user()->mobile); ?>">
                                                                            <input type="hidden" name="address"
                                                                                value="<?php echo e(isset($address) ? $address['address'] : "No Address"); ?>">
                                                                            <input type="hidden" name="city" value="<?php echo e($address->getcity['name'] ?? ''); ?>">
                                                                            <input type="hidden" name="country" value="<?php echo e($address->getCountry['nicename']); ?>">
                                                                            <button type="submit" class="payhere-buy-now-button">
                                                                                <span> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                <?php echo e(sprintf("%.2f",Crypt::decrypt($secure_amount),2)); ?> <img
                                                                                    src="<?php echo e(url('images/payhere.png')); ?>" alt="payherelogo" title="Pay with Payhere"></span>
                                                                            </button>
                                                                        </form>

                                                                            <hr>
                                                                            <p class="text-muted"><i class="fa fa-lock"></i>
                                                                            <?php echo e(__('Your transcation is secured with Payhere transcations.')); ?>.</p>

                                                                    <?php else: ?>
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                    <?php endif; ?>
                                                                        
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                                            
                                                        <?php if($config->cashfree_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-cashfree" role="tabpanel" aria-labelledby="v-pills-cashfree-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'cashfree')): ?>
                                                                        <form action="<?php echo e(route('processTopayment')); ?>" method="POST">

                                                                            <?php echo csrf_field(); ?>
                                                                            <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input type="hidden" name="payment_method" value="<?php echo e(__("Cashfree")); ?>">
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">

                                                                            <button type="submit" class="cashfree-buy-now-button">
                                                                                <span>Express checkout with <img src="<?php echo e(url('images/cashfree.svg')); ?>" alt="cashfree" title="Pay with Cashfree"></span>
                                                                            </button>
                                                                        </form>
                                                                        <hr>
                                                                        <p class="text-muted"><i class="fa fa-lock"></i><?php echo e(__('Your transcation is secured with Cashfree secured payments.')); ?>.</p>
                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Cashfree')); ?> <?php echo e(__('Not Available')); ?> <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>

                                                                    <form action="<?php echo e(route('processTopayment')); ?>" method="POST">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <input type="hidden" name="payment_method" value="<?php echo e(__("Cashfree")); ?>">
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">

                                                                        <button type="submit" class="cashfree-buy-now-button">
                                                                            <span>Express checkout with <img src="<?php echo e(url('images/cashfree.svg')); ?>" alt="cashfree" title="Pay with Cashfree"></span>
                                                                        </button>
                                                                    </form>
                                                                    <hr>
                                                                    <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Your transcation is secured with Cashfree transcations.')); ?>.</p>
                                                                <?php endif; ?>           
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->omise_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-omise" role="tabpanel" aria-labelledby="v-pills-omise-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'omise')): ?>
                                                                        <?php if(pre_order_disable() == false): ?>
                                                                            <form id="checkoutForm" method="POST" action="<?php echo e(route('pay.via.omise')); ?>">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>" />
                                                                                <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                                                                                data-key="<?php echo e(env('OMISE_PUBLIC_KEY')); ?>"
                                                                                data-amount="<?php echo e(sprintf("%.2f",Crypt::decrypt($secure_amount))*100); ?>"
                                                                                data-frame-label="<?php echo e(config('app.name')); ?>"
                                                                                data-image="<?php echo e(url('images/genral/'.$front_logo)); ?>"
                                                                                data-currency="<?php echo e(session()->get('currency')['id']); ?>"
                                                                                data-default-payment-method="credit_card">
                                                                                </script>
                                                                            </form>
                                                                            <hr>
                                                                            <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Your transcation is secured with Omise secured payments.')); ?>.</p>
                                                                        <?php else: ?>
                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Omise')); ?> <?php echo e(__('Not Available')); ?> <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label"> <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?></span>
                                                                    </h3>
                                                                    <hr>

                                                                    <?php if(pre_order_disable() == false): ?>

                                                                        <form id="checkoutForm" method="POST" action="<?php echo e(route('pay.via.omise')); ?>">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>" />
                                                                        <script type="text/javascript" src="https://cdn.omise.co/omise.js"
                                                                            data-key="<?php echo e(env('OMISE_PUBLIC_KEY')); ?>"
                                                                            data-amount="<?php echo e(sprintf("%.2f",Crypt::decrypt($secure_amount))*100); ?>"
                                                                            data-frame-label="<?php echo e(config('app.name')); ?>"
                                                                            data-image="<?php echo e(url('images/genral/'.$front_logo)); ?>"
                                                                            data-currency="<?php echo e(session()->get('currency')['id']); ?>"
                                                                            data-default-payment-method="credit_card">
                                                                        </script>
                                                                        </form>

                                                                        <hr>
                                                                        <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Your transcation is secured with Omise transcations.')); ?>.</p>
                                                                    <?php else: ?>
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>        
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->rave_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-rave" role="tabpanel" aria-labelledby="v-pills-rave-tab" tabindex="0">
                                                                <?php
                                                                    $array = array(array('metaname' => 'color', 'metavalue' => 'blue'),
                                                                    array('metaname' => 'size', 'metavalue' => 'big'));
                                                                    $rave_order_id = session()->put('order_id',uniqid());
                                                                ?>

                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'rave')): ?>

                                                                        <?php if(pre_order_disable() == false): ?>

                                                                            <form method="POST" action="<?php echo e(route('rave.pay')); ?>" id="paymentForm">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                <input type="hidden" name="amount"
                                                                                value="<?php echo e(sprintf("%.2f",Crypt::decrypt($secure_amount))); ?>" />
                                                                                <input type="hidden" name="payment_method" value="both" />
                                                                                <input type="hidden" name="description" value="Payment for order <?php echo e($rave_order_id); ?>" />
                                                                                <input type="hidden" name="country" value="NG" />
                                                                                <input type="hidden" name="currency" value="<?php echo e(session()->get('currency')['id']); ?>" />
                                                                                <input type="hidden" name="email" value="<?php echo e($address->email); ?>" />
                                                                                <input type="hidden" name="firstname" value="<?php echo e($address->name); ?>" />
                                                                                <input type="hidden" name="lastname" value="<?php echo e($address->name); ?>" />
                                                                                <input type="hidden" name="metadata" value="<?php echo e(json_encode($array)); ?>">
                                                                                <input type="hidden" name="phonenumber" value="<?php echo e($address->phone); ?>" />
                                                                                <input type="hidden" name="logo" value="<?php echo e(env('RAVE_LOGO')); ?>" />
                                                                                <input type="submit" class="total_amount_pay" value="Pay <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>" />
                                                                            </form>
                                                        
                                                                            <hr>
                                                                            <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Your transcation is secured with Rave secured payments.')); ?>.</p>

                                                                        <?php else: ?>

                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                        <?php endif; ?>

                                                                    <?php else: ?>

                                                                        <h4><?php echo e(__('Rave')); ?> <?php echo e(__('Not Available')); ?> <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>

                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                            
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                        <hr>

                                                                    <?php if(pre_order_disable() == false): ?>

                                                                        <form method="POST" action="<?php echo e(route('rave.pay')); ?>" id="paymentForm">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <input type="hidden" name="amount"
                                                                            value="<?php echo e(sprintf("%.2f",Crypt::decrypt($secure_amount))); ?>" />
                                                                        <input type="hidden" name="payment_method" value="both" />
                                                                        <input type="hidden" name="description" value="Payment for order <?php echo e($rave_order_id); ?>" />
                                                                        <input type="hidden" name="country" value="NG" />
                                                                        <input type="hidden" name="currency" value="<?php echo e(session()->get('currency')['id']); ?>" />
                                                                        <input type="hidden" name="email" value="<?php echo e($address->email); ?>" />
                                                                        <input type="hidden" name="firstname" value="<?php echo e($address->name); ?>" />
                                                                        <input type="hidden" name="lastname" value="<?php echo e($address->name); ?>" />
                                                                        <input type="hidden" name="metadata" value="<?php echo e(json_encode($array)); ?>">
                                                                        <input type="hidden" name="phonenumber" value="<?php echo e($address->phone); ?>" />
                                                                        <input type="hidden" name="logo" value="<?php echo e(env('RAVE_LOGO')); ?>" />
                                                                        <input type="submit" class="total_amount_pay" value="Pay <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>" />
                                                                        </form>

                                                                        <hr>
                                                                        <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Your transcation is secured with Rave transcations.')); ?>.</p>

                                                                    <?php else: ?> 

                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                    <?php endif; ?>

                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->moli_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-moli" role="tabpanel" aria-labelledby="v-pills-moli-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                    <span class="payment_amount_label">
                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                    </span></h3>
                                                                    <hr>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'mollie')): ?>

                                                                        <?php if(pre_order_disable() == false): ?>

                                                                            <form action="<?php echo e(route('mollie.pay')); ?>" method="POST" autocomplete="off">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>" />
                                                                                <button type="submit" class="mollie-buy-now-button">
                                                                                    <span><?php echo e(__('Express checkout with')); ?> <img src="<?php echo e(url('images/moli.png')); ?>" alt="mollielogo" title="<?php echo e(__('Pay with Mollie')); ?>"></span>
                                                                                </button>
                                                                            </form>
                                                        
                                                                            <hr>
                                                                            <p class="text-muted"><i class="fa fa-lock"></i><?php echo e(__('Your transcation is secured with Mollie secured payments.')); ?>.</p>
                                                                        <?php else: ?>
                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Mollie')); ?> <?php echo e(__('Not Available')); ?> <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>

                                                                    <?php if(pre_order_disable() == false): ?>
                                                                        <form action="<?php echo e(route('mollie.pay')); ?>" method="POST" autocomplete="off">
                                                                            <?php echo csrf_field(); ?>
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>" />
                                                                            <button type="submit" class="mollie-buy-now-button">
                                                                                <span><?php echo e(__('Express checkout with')); ?> <img src="<?php echo e(url('images/moli.png')); ?>" alt="mollielogo" title="<?php echo e(__('Pay with Mollie')); ?>"></span>
                                                                            </button>
                                                                        </form>
                                                    
                                                                        <hr>
                                                                        <p class="text-muted"><i class="fa fa-lock"></i><?php echo e(__('Your transcation is secured with Mollie secured payments.')); ?>.</p>
                                                                    <?php else: ?>
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->skrill_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-skrill" role="tabpanel" aria-labelledby="v-pills-skrill-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'skrill')): ?>

                                                                        <?php if(pre_order_disable() == false): ?>

                                                                            <form action="<?php echo e(route('skrill.pay')); ?>" method="POST" autocomplete="off">
                                                                            <?php echo csrf_field(); ?>
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>" />
                                                                            <button type="submit" class="skrill-buy-now-button">
                                                                                <span><?php echo e(__('Express checkout with')); ?> <img src="<?php echo e(url('images/skrill.png')); ?>" alt="skrill_logo" title="<?php echo e(__('Pay with Skrill')); ?>"></span>
                                                                            </button>
                                                                            </form>
                                                                            <hr>
                                                                            <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Your transcation is secured with Skrill secured payments.')); ?>.</p>
                                                                        <?php else: ?> 
                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Skrill')); ?> <?php echo e(__('Not Available')); ?> <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                        <hr>

                                                                    <?php if(pre_order_disable() == false): ?>
                                                                        <form action="<?php echo e(route('skrill.pay')); ?>" method="POST" autocomplete="off">
                                                                            <?php echo csrf_field(); ?>
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>" />
                                                                            <button type="submit" class="skrill-buy-now-button">
                                                                                <span><?php echo e(__('Express checkout with')); ?> <img src="<?php echo e(url('images/skrill.png')); ?>" alt="skrill_logo" title="<?php echo e(__('Pay with Skrill')); ?>"></span>
                                                                            </button>
                                                                        </form>
                                                                        <hr>
                                                                        <p class="text-muted"><i class="fa fa-lock"></i> <?php echo e(__('Your transcation is secured with Skrill secured payments.')); ?>.</p>
                                                                    <?php else: ?> 
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>
                                                         
                                                        <?php if($config->sslcommerze_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-sslcommerze" role="tabpanel" aria-labelledby="v-pills-sslcommerze-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'sslcommerze')): ?>
                                                                        <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                            <span class="payment_amount_label">
                                                                                <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                            </span>
                                                                        </h3>
                                                                        <hr>
                                                                        <?php if(pre_order_disable() == false): ?>
                                                                            <form action="<?php echo e(route('payvia.sslcommerze')); ?>" method="POST">
                                                                                <?php echo csrf_field(); ?>
                                                                                <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                                <button class="btn btn-primary btn-md" id="sslczPayBtn">
                                                                                    <?php echo e(__("Pay Now")); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                    <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                                </button>
                                                                            </form>
                                                                        <?php else: ?>
                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this cash on delivery.')); ?></h4>
                                                                        <?php endif; ?>
                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('SSLCommerz')); ?> <?php echo e(__('Not Available')); ?><b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(Crypt::decrypt($secure_amount)); ?></h3>
                                                                    <hr>
                                                                    <?php if(pre_order_disable() == false): ?>
                                                                        <form action="<?php echo e(route('payvia.sslcommerze')); ?>" method="POST">
                                                                            <?php echo csrf_field(); ?>
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                            <button class="btn btn-primary btn-md" id="sslczPayBtn">
                                                                                <?php echo e(__("Pay Now")); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                                <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                            </button>
                                                                        </form>
                                                                    <?php else: ?> 
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->enable_amarpay == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-amarpay" role="tabpanel" aria-labelledby="v-pills-amarpay-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'amarpay')): ?>
                                                                        <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                            <span class="payment_amount_label">
                                                                                <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                            </span>
                                                                        </h3>
                                                                        <hr>
                                                                        
                                                                        <?php if(pre_order_disable() == false): ?>

                                                                            <div class="aamar-pay-btn">
                                                                            <?php echo aamarpay_post_button([
                                                                                    'cus_name'  => auth()->user()->name, // Customer name
                                                                                    'cus_email' => auth()->user()->email, // Customer email
                                                                                    'cus_phone' => auth()->user()->mobile // Customer Phone
                                                                                ], price_format(Crypt::decrypt($secure_amount)), '<i class="fa fa-money"></i> Pay via AAMARPAY', 'btn btn-md btn-primary'); ?>

                                                                            </div>

                                                                        <?php else: ?>

                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                        <?php endif; ?>

                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('AAMARPAY')); ?> <?php echo e(__('Not Available')); ?> <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>
                                                                    
                                                                    <?php if(pre_order_disable() == false): ?>

                                                                        <div class="aamar-pay-btn">
                                                                        <?php echo aamarpay_post_button([
                                                                                'cus_name'  => auth()->user()->name, // Customer name
                                                                                'cus_email' => auth()->user()->email, // Customer email
                                                                                'cus_phone' => auth()->user()->mobile // Customer Phone
                                                                            ], price_format(Crypt::decrypt($secure_amount)), '<i class="fa fa-money"></i> Pay via AAMARPAY', 'btn btn-md btn-primary'); ?>

                                                                        </div>

                                                                    <?php else: ?>

                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if($config->iyzico_enable == '1'): ?>
                                                            <div class="tab-pane fade" id="v-pills-iyzico" role="tabpanel" aria-labelledby="v-pills-iyzico-tab" tabindex="0">
                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                    <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,'iyzico')): ?>
                                                                        <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                            <span class="payment_amount_label">
                                                                                <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                            </span>
                                                                        </h3>
                                                                        <hr>
                                                                        <?php if(pre_order_disable() == false): ?>

                                                                            <form action="<?php echo e(route('iyzcio.pay')); ?>" method="POST" autocomplete="off">
                                                                                <?php echo csrf_field(); ?>
                                                                                <div class="row">
                                                                                    
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group mb-20">
                                                                                            <h6>Identity number:</h6>
                                                                                            <input type="text" name="identity_number" class="form- mt-3 mb-3" placeholder="74300864791" required autocomplete="off">
                                                                                            <small class="text-muted"><i class="fa fa-question-circle"></i> TCKN for Turkish merchants, passport number for foreign merchants</small>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                                <input type="hidden" value="<?php echo e(Auth::user()->email); ?>" name="email">
                                                                                <input type="hidden" name="mobile" value="<?php echo e($address->phone); ?>">
                                                                                <input type="hidden" name="conversation_id" value="<?php echo e(uniqid()); ?>" />
                                                                                <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>" />
                                                                                <input type="hidden" name="currency" value="<?php echo e(session()->get('currency')['id']); ?>"/>
                                                                                <input type="hidden" name="mobile" value="<?php echo e($address->phone); ?>" />
                                                                                <input type="hidden" name="address" value="<?php echo e($address->address); ?>" />
                                                                                <input type="hidden" name="city" value="<?php echo e($address->getcity['name'] ?? ''); ?>" />
                                                                                <input type="hidden" name="state" value="<?php echo e($address->getstate['name']); ?>" />
                                                                                <input type="hidden" name="country" value="<?php echo e($address->getCountry['name']); ?>" />
                                                                                <input type="hidden" name="pincode" value="<?php echo e($address->pin_code); ?>" />
                                                                                <input type="hidden" name="language" value="<?php echo e(app()->getLocale()); ?>" />
                                                                                <button class="btn btn-primary btn-md" title="checkout"
                                                                                type="submit"><?php echo e(__('Pay')); ?></button>
                                                                            </form>

                                                                        <?php else: ?>

                                                                            <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                        <?php endif; ?>
                                                                        
                                                                    <?php else: ?>
                                                                        <h4><?php echo e(__('Iyzico')); ?> <?php echo e(__('Not Available')); ?> <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                    <?php endif; ?>
                                                                <?php else: ?>
                                                                    <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                        <span class="payment_amount_label">
                                                                            <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                        </span>
                                                                    </h3>
                                                                    <hr>

                                                                    <?php if(pre_order_disable() == false): ?>

                                                                        <form action="<?php echo e(route('iyzcio.pay')); ?>" method="POST" autocomplete="off">
                                                                            <?php echo csrf_field(); ?>
                                                                            <div class="row">
                                                                                
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group mb-20">
                                                                                        <h6>Identity number:</h6>
                                                                                        <input type="text" name="identity_number" class="form-control mt-3 mb-3" placeholder="74300864791" required autocomplete="off">
                                                                                        <small class="text-muted"><i class="fa fa-question-circle"></i> TCKN for Turkish merchants, passport number for foreign merchants</small>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                            <input type="hidden" value="<?php echo e(Auth::user()->email); ?>" name="email">
                                                                            <input type="hidden" name="mobile" value="<?php echo e($address->phone); ?>">
                                                                            <input type="hidden" name="conversation_id" value="<?php echo e(uniqid()); ?>" />
                                                                            <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>" />
                                                                            <input type="hidden" name="currency" value="<?php echo e(session()->get('currency')['id']); ?>"/>
                                                                            <input type="hidden" name="mobile" value="<?php echo e($address->phone); ?>" />
                                                                            <input type="hidden" name="address" value="<?php echo e($address->address); ?>" />
                                                                            <input type="hidden" name="city" value="<?php echo e($address->getcity['name'] ?? ''); ?>" />
                                                                            <input type="hidden" name="state" value="<?php echo e($address->getstate['name']); ?>" />
                                                                            <input type="hidden" name="country" value="<?php echo e($address->getCountry['name']); ?>" />
                                                                            <input type="hidden" name="pincode" value="<?php echo e($address->pin_code); ?>" />
                                                                            <input type="hidden" name="language" value="<?php echo e(app()->getLocale()); ?>" />
                                                                            <button class="btn btn-primary btn-md" title="checkout" type="submit"><?php echo e(__('Pay')); ?></button>
                                                                        </form>

                                                                    <?php else: ?>
                                                                        <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <?php if(config('dpopayment.enable') == 1 && Module::has('DPOPayment') && Module::find('DPOPayment')->isEnabled()): ?>

                                                            <?php echo $__env->make("dpopayment::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?> 
                                                        
                                                        <?php if(config('bkash.ENABLE') == 1 && Module::has('Bkash') && Module::find('Bkash')->isEnabled()): ?>

                                                            <?php echo $__env->make("bkash::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?> 

                                                        <?php if(config('mpesa.ENABLE') == 1 && Module::has('MPesa') && Module::find('MPesa')->isEnabled()): ?>

                                                            <?php echo $__env->make("mpesa::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?> 

                                                        <?php if(config('authorizenet.ENABLE') == 1 && Module::has('AuthorizeNet') && Module::find('AuthorizeNet')->isEnabled()): ?>
                                                            <?php echo $__env->make("authorizenet::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                        <?php endif; ?>

                                                        <?php if(config('worldpay.ENABLE') == 1 && Module::has('Worldpay') && Module::find('Worldpay')->isEnabled()): ?>

                                                            <?php echo $__env->make("worldpay::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('midtrains.ENABLE') == 1 && Module::has('Midtrains') && Module::find('Midtrains')->isEnabled()): ?>

                                                            <?php echo $__env->make("midtrains::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('paytab.ENABLE') == 1 && Module::has('Paytab') && Module::find('Paytab')->isEnabled()): ?>

                                                            <?php echo $__env->make("paytab::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('squarepay.ENABLE') == 1 && Module::has('SquarePay') && Module::find('SquarePay')->isEnabled()): ?>
                                                        
                                                            <?php echo $__env->make("squarepay::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('esewa.ENABLE') == 1 && Module::has('Esewa') && Module::find('Esewa')->isEnabled()): ?>
                                                        
                                                            <?php echo $__env->make("esewa::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('smanager.ENABLE') == 1 && Module::has('Smanager') && Module::find('Smanager')->isEnabled()): ?>
                                                        
                                                            <?php echo $__env->make("smanager::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('senangpay.ENABLE') == 1 && Module::has('Senangpay') && Module::find('Senangpay')->isEnabled()): ?>
                                                        
                                                            <?php echo $__env->make("senangpay::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php if(config('onepay.ENABLE') == 1 && Module::has('Onepay') && Module::find('Onepay')->isEnabled()): ?>
                                                        
                                                            <?php echo $__env->make("onepay::front.tab", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                                        <?php endif; ?>

                                                        <?php $__currentLoopData = App\ManualPaymentMethod::where('status','1')->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $token = str_random(25);
                                                            ?>
                                                            <div class="tab-pane manualpaytab" id="manualpaytab<?php echo e($item->id); ?>">

                                                                <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                <span class="payment_amount_label">
                                                                    <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                </span></h3>
                                                                <hr>

                                                                <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                <?php if(isset($listcheckOutCurrency->payment_method) && strstr($listcheckOutCurrency->payment_method,$item->payment_name)): ?>

                                                                    <?php if(pre_order_disable() == false): ?>

                                                                        <form action="<?php echo e(route('manualpay.checkout',['token' => $token, 'payvia' => $item->payment_name])); ?>" method="POST" enctype="multipart/form-data">
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">

                                                                        <div class="form-group">
                                                                            <label for="">Attach Purchase Proof <span class="text-red">*</span> </label>
                                                                            <input required title="Please attach a purchase proof !" type="file" class="<?php $__errorArgs = ['purchase_proof'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mt-3 mb-3" name="purchase_proof"/>
                                                                            
                                                                            <?php $__errorArgs = ['purchase_proof'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                                <span class="invalid-feedback text-danger" role="alert">
                                                                                    <strong><?php echo e($message); ?></strong>
                                                                                </span>
                                                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                                        </div>

                                                                        <button type="submit" class="cod-buy-now-button">
                                                                            <span><?php echo e($item->payment_name); ?></span> <i class="fa fa-money"></i>
                                                                        </button>
                                                                        </form>
                                                                    
                                                                        <hr>

                                                                        <div class="row">
                                                                        
                                                                        <div class="col-md-12">
                                                                            <?php echo $item->description; ?>

                                                                        </div>

                                                                        </div>
                                                                    
                                                                        <?php if($item->thumbnail != '' && file_exists(public_path().'/images/manual_payment/'.$item->thumbnail) ): ?>

                                                                        <div class="card card-1 mt-3">
                                                                            <div class="text-center card-body">
                                                                            
                                                                            <img width="300px" height="300px" class="img-fluid" src="<?php echo e(url('images/manual_payment/'.$item->thumbnail)); ?>" alt="<?php echo e($item->thumbnail); ?>">
                                                                            </div>
                                                                        </div>

                                                                        <?php endif; ?>

                                                                    <?php else: ?>

                                                                    <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                    <?php endif; ?>

                                                                <?php else: ?>

                                                                <h4><?php echo e($item->payment_name); ?> <?php echo e(__('Not Available')); ?>

                                                                    <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>

                                                                <?php endif; ?>
                                                                <?php else: ?> 

                                                                <?php if(pre_order_disable() == false): ?>

                                                                    <form action="<?php echo e(route('manualpay.checkout',['token' => $token, 'payvia' => $item->payment_name])); ?>" method="POST" enctype="multipart/form-data">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                    <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">

                                                                    <div class="form-group">
                                                                        <label for="">Attach Purchase Proof <span class="text-red">*</span> </label>
                                                                        <input required title="Please attach a purchase proof !" type="file" class="<?php $__errorArgs = ['purchase_proof'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mt-3 mb-3" name="purchase_proof"/>
                                                                        
                                                                        <?php $__errorArgs = ['purchase_proof'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                                <strong><?php echo e($message); ?></strong>
                                                                            </span>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                                    </div>

                                                                    <button type="submit" class="cod-buy-now-button">
                                                                        <span><?php echo e($item->payment_name); ?></span> <i class="fa fa-money"></i>
                                                                    </button>
                                                                    </form>
                                                                
                                                                    <hr>

                                                                    <div class="row">
                                                                    
                                                                    <div class="col-md-12">
                                                                        <?php echo $item->description; ?>

                                                                    </div>

                                                                    </div>
                                                                
                                                                    <?php if($item->thumbnail != '' && file_exists(public_path().'/images/manual_payment/'.$item->thumbnail) ): ?>

                                                                    <div class="card card-1 mt-3">
                                                                        <div class="text-center card-body">
                                                                        
                                                                        <img width="300px" height="300px" class="img-fluid" src="<?php echo e(url('images/manual_payment/'.$item->thumbnail)); ?>" alt="<?php echo e($item->thumbnail); ?>">
                                                                        </div>
                                                                    </div>

                                                                    <?php endif; ?>

                                                                <?php else: ?>

                                                                    <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                <?php endif; ?>
                                                                
                                                                <?php endif; ?>
                                                            </div>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        <?php if(env('BANK_TRANSFER') == 1): ?>

                                                            <?php
                                                                $bankT = App\BankDetail::first();
                                                            ?>

                                                            <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                <div class="tab-pane" id="btpaytab">
                                                                <?php if(isset($listcheckOutCurrency->payment_method) &&
                                                                strstr($listcheckOutCurrency->payment_method,'bankTransfer')): ?>

                                                                <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                    <span class="payment_amount_label">
                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                    </span></h3>
                                                                <hr>
                                                                <?php if(!isset($bankT)): ?>
                                                                    <h4><?php echo e(__("Bank Transfer Not Available")); ?></h4>
                                                                <?php else: ?>
                                                                    <?php if(pre_order_disable() == false): ?>

                                                                    <form action="<?php echo e(route('bank.transfer.process',str_random(25))); ?>" method="POST" enctype="multipart/form-data" >
                                                                        <?php echo csrf_field(); ?>
                                                                        <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                        <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">

                                                                        <div class="form-group">
                                                                        <label for="">Attach Purchase Proof <span class="text-red">*</span> </label>
                                                                        <input required title="Please attach a purchase proof !" type="file" class="<?php $__errorArgs = ['purchase_proof'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mt-3 mb-3" name="purchase_proof"/>
                                                                        
                                                                        <?php $__errorArgs = ['purchase_proof'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                                <strong><?php echo e($message); ?></strong>
                                                                            </span>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                                        </div>

                                                                        <button title="<?php echo e(__('Bank Tranfer')); ?>" type="submit" class="cod-buy-now-button">
                                                                        <span><?php echo e(__('Bank Tranfer')); ?></span> <i class="fa fa-money"></i>
                                                                        </button>
                                                                    </form>

                                                                    <hr>
                                                                    <p class="text-muted"><i class="fa fa-money"></i> <?php echo e(__('Bank Transfer')); ?></p>

                                                                    <div class="card card-1 mt-3">
                                                                        <div class="card-body">
                                                                        <h4><?php echo e(__('Following Bank')); ?></h4>

                                                                        <?php if(isset($bankT)): ?>
                                                                            <p><?php echo e(__('Account Name')); ?>: <?php echo e($bankT->account); ?></p>
                                                                            <p><?php echo e(__('A/c No')); ?>: <?php echo e($bankT->account); ?></p>
                                                                            <p><?php echo e(__('BankName')); ?>: <?php echo e($bankT->bankname); ?></p>
                                                                        <?php if($bankT->ifsc != ''): ?>
                                                                            <p><?php echo e(__('IFSC Code')); ?>: <?php echo e($bankT->ifsc); ?></p>
                                                                        <?php endif; ?>
                                                                        <?php if($bankT->swift_code != ''): ?>
                                                                            <p><?php echo e(__('SWIFT Code')); ?>: <?php echo e($bankT->swift_code); ?></p>
                                                                        <?php endif; ?>
                                                                        <?php else: ?>
                                                                            <p><?php echo e(__('bankdetailerror')); ?></p>
                                                                        <?php endif; ?>

                                                                        </div>
                                                                    </div>

                                                                    <?php else: ?> 

                                                                    <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                    <?php endif; ?>
                                                                <?php endif; ?>

                                                                <?php else: ?>
                                                                <h4><?php echo e(__('BankTranfer')); ?> <?php echo e(__('Not Available')); ?>

                                                                    <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                <?php endif; ?>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="tab-pane" id="btpaytab">

                                                                <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                    <span class="payment_amount_label">
                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                    </span></h3>
                                                                <hr>
                                                                <?php if(!isset($bankT)): ?>
                                                                    <h4><?php echo e(__("bankTransferNotAvailable")); ?></h4>
                                                                <?php else: ?>
                                                                    
                                                                    <?php if(pre_order_disable() == false): ?>

                                                                    <form action="<?php echo e(route('bank.transfer.process',str_random(25))); ?>" method="POST" enctype="multipart/form-data">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                    <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">

                                                                    <div class="form-group">
                                                                        <label for="">Attach Purchase Proof <span class="text-red">*</span> </label>
                                                                        <input required title="Please attach a purchase proof !" type="file" class="<?php $__errorArgs = ['purchase_proof'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control mt-3 mb-3" name="purchase_proof"/>
                                                                        
                                                                        <?php $__errorArgs = ['purchase_proof'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                                <strong><?php echo e($message); ?></strong>
                                                                            </span>
                                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                                                    </div>

                                                                    <button title="<?php echo e(__('Bank Tranfer')); ?>" type="submit" class="cod-buy-now-button">
                                                                        <span><?php echo e(__('Bank Tranfer')); ?></span> <i class="fa fa-money"></i>
                                                                    </button>
                                                                    </form>

                                                                    <hr>
                                                                    <p class="text-muted"><i class="fa fa-money"></i> <?php echo e(__('Bank Transfer')); ?></p>
                                            
                                                                    <div class="card card-1 mt-3">
                                                                    <div class="card-body">
                                                                        <h4><?php echo e(__('Following BankT')); ?></h4>
                                                                        
                                                                        <?php if(isset($bankT)): ?>
                                                                        <p><?php echo e(__('Account Name')); ?>: <?php echo e($bankT->account); ?></p>
                                                                        <p><?php echo e(__('A/c No')); ?>: <?php echo e($bankT->account); ?></p>
                                                                        <p><?php echo e(__('Bank Name')); ?>: <?php echo e($bankT->bankname); ?></p>
                                                                        <p><?php echo e(__('IFSC Code')); ?>: <?php echo e($bankT->ifsc); ?></p>
                                                                        <?php if($bankT->swift_code != ''): ?>
                                                                        <p><?php echo e(__('SWIFT Code')); ?>: <?php echo e($bankT->swift_code); ?></p>
                                                                        <?php endif; ?>
                                                                        <?php else: ?>
                                                                        <p><?php echo e(__('Try Again')); ?></p>
                                                                        <?php endif; ?>
                                            
                                                                    </div>
                                                                    </div>

                                                                    <?php else: ?>
                                                                    
                                                                    <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                    <?php endif; ?>

                                                                <?php endif; ?>

                                                                </div>
                                                            <?php endif; ?>

                                                        <?php endif; ?>

                                                        <?php if(env('COD_ENABLE') == 1): ?>

                                                            <?php
                                                                
                                                                $codcheck = array();
                                                                $order = uniqid();
                                                                Session::put('order_id',$order);
                                                                
                                                            ?>

                                                            <?php $__currentLoopData = $cart_table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cod_chk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                                <?php

                                                                if(isset($cod_chk->product)){
                                                                    array_push($codcheck,$cod_chk->product->codcheck);
                                                                }

                                                                if(isset($cod_chk->simple_product)){
                                                                    array_push($codcheck,$cod_chk->simple_product->cod_avbl);
                                                                }
                                                                
                                                                ?>

                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            <?php if($checkoutsetting_check->checkout_currency == 1): ?>
                                                                <div class="tab-pane" id="codpaytab">
                                                                <?php if(isset($listcheckOutCurrency->payment_method) &&
                                                                strstr($listcheckOutCurrency->payment_method,'cashOnDelivery')): ?>

                                                                <?php if(in_array(0, $codcheck)): ?>
                                                                <span class="required"><?php echo e(__('Some Product Not Support')); ?></span>
                                                                <?php else: ?>
                                                                <?php
                                                                    $token = str_random(25);
                                                                ?>
                                                                <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                    <span class="payment_amount_label">
                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                    </span></h3>
                                                                <hr>
                                                                    <?php if(pre_order_disable() == false): ?>

                                                                    <form action="<?php echo e(route('cod.process',$token)); ?>" method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                    <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                        
                                                                    <button title="<?php echo e(__('Poddoor')); ?>" type="submit" class="cod-buy-now-button">
                                                                        <span><?php echo e(__('Pod')); ?></span> <i class="fa fa-money"></i>
                                                                    </button>
                                                                    </form>
                                                                    <hr>
                                                                    <p class="text-muted"><i class="fa fa-money"></i> <?php echo e(__('Poddoor')); ?></p>

                                                                    <?php else: ?>

                                                                    <h4 class="text-red"><?php echo e(__('Preorder not available with this payment gateway')); ?></h4>

                                                                    <?php endif; ?>

                                                                <?php endif; ?>
                                                                <?php else: ?>
                                                                <h4>
                                                                    <h4><?php echo e(__('COD')); ?> <?php echo e(__('Not Available')); ?>

                                                                    <b><?php echo e(session()->get('currency')['id']); ?></b>.</h4>
                                                                </h4>
                                                                <?php endif; ?>
                                                                </div>
                                                            <?php else: ?>
                                                            
                                                                <div class="tab-pane" id="codpaytab">
                                                                
                                                                <?php if(in_array(0, $codcheck)): ?>
                                                                    <span span class="required"><?php echo e(__('Some Product Not Support')); ?></span>
                                                                <?php else: ?>
                                                                <?php
                                                                    $token = str_random(25);
                                                                ?>
                                                                <h3><?php echo e(__('Pay')); ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                                                    <span class="payment_amount_label">
                                                                        <?php echo e(price_format(Crypt::decrypt($secure_amount))); ?>

                                                                    </span></h3>
                                                                <hr>
                                                                    <?php if(pre_order_disable() == false): ?>

                                                                    <form action="<?php echo e(route('cod.process',$token)); ?>" method="POST">
                                                                    <?php echo csrf_field(); ?>
                                                                    <input type="hidden" name="actualtotal" value="<?php echo e($un_sec); ?>">
                                                                    <input type="hidden" name="amount" class="total_secure_amount" value="<?php echo e($secure_amount); ?>">
                                                                    <button title="Pay With Cash @ Delivery Time" type="submit" class="cod-buy-now-button">
                                                                        <span><?php echo e(__('Pod')); ?></span> <i class="fa fa-money"></i>
                                                                    </button>
                                                                    </form>
                                                                    <hr>
                                                                    <p class="text-muted"><i class="fa fa-money"></i> <?php echo e(__('Poddoor')); ?></p>

                                                                    <?php else: ?>

                                                                    <h4 class="text-red"><?php echo e(__('Preorder not available with this cash on delivery.')); ?></h4>

                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                                </div>
                                                            <?php endif; ?>

                                                        <?php else: ?> 
                                                            <div class="tab-pane" id="codpaytab">
                                                                <h4 class="text-danger">
                                                                <?php echo e(__("Cash on delivery is not available yet !")); ?>

                                                                </h4>
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                        <!-- <div class="tab-pane fade" id="v-pills-instamojo" role="tabpanel" aria-labelledby="v-pills-instamojo-tab" tabindex="0">
                                                        </div> -->
                                                    </div>                                                   

                                                </div>
                                            </div>
                                            <!-- <div class="deals-btn">
                                                <ul class="d-flex">
                                                    <li><a href="#" title="Pay Now" type="button" class="btn btn-primary">Pay Now</a></li>
                                                    <li><a href="#" title="Back to Cart" type="button" class="btn btn-warning">Back to Cart</a></li>
                                                </ul>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="cart-block">
                        <h4 class="section-title"><?php echo e(__('Payment Details')); ?></h4>
                        <?php if($shipping_coupan_status == 1 && $shipping_coupan_per_price != ''): ?>
                        <table class="table d-none">
                            <thead>
                                <tr>
                                <th>
                                    <div class="cart-sub-total totals-value" id="cart-total">
                            
                                        <div class="row">
                                        <div class="col-md-7 col-7" style="margin-left: -16px;"><?php echo e(__('Free Shipping Coupan')); ?></div>
                                            <div class="col-md-7 col-7">
                                            
                                            <span class="" id="show-total">
                                                <input type="text" class="form-control" name="freeshipping" id="freeshipping" placeholder="Free Shipping Code">
                                            
                                            
                                            </span>
                                            </div>
                                            <div class="col-md-5 col-5">
                                        <button type="submit" class="btn btn-primary" onclick="freeshippingcode()" >Apply Now</button>
                                        </div>
                                    </div>
                                    <strong style="color: red;float: left;" id="shiping_error_msg"></strong>
                                    </div>
                                </th>
                                </tr>
                            </thead>
                        </table>
                        <?php endif; ?>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td style="width: 70%;"><?php echo e(__('Subtotal')); ?></td>
                                    <?php
                                        $total = '0';
                                        foreach ($cart_table as $key => $val) {

                                            if($val->active_cart == 1){

                                            if($val->product && $val->variant){
                                                if ($val->product->tax_r != null && $val->product->tax == 0) {

                                                    if ($val->ori_offer_price != 0) {
                                                        //get per product tax amount
                                                        $p = 100;
                                                        $taxrate_db = $val->product->tax_r;
                                                        $vp = $p + $taxrate_db;
                                                        $taxAmnt = intval($val->product->offer_price) / intval($vp) * intval($taxrate_db);
                                                        $taxAmnt = sprintf("%.2f", $taxAmnt);
                                                        $price = ($val->ori_offer_price - $taxAmnt) * $val->qty;

                                                    } else {

                                                        $p = 100;
                                                        $taxrate_db = $val->product->tax_r;
                                                        $vp = $p + $taxrate_db;
                                                        $taxAmnt = $val->product->price / $vp * $taxrate_db;

                                                        $taxAmnt = sprintf("%.2f", $taxAmnt);

                                                        $price = ($val->ori_price - $taxAmnt) * $val->qty;
                                                    }

                                                } else {

                                                    if ($val->semi_total != 0) {

                                                        $price = $val->semi_total;

                                                    } else {

                                                        $price = $val->price_total;

                                                    }
                                                }
                                            }

                                            if($val->simple_product){
                                                if ($val->semi_total != 0) {

                                                    $price = $val->semi_total - $val->tax_amount;

                                                } else {

                                                    $price = $val->price_total - $val->tax_amount;

                                                }
                                            }

                                            $total = $total + $price;

                                            }  

                                        }
                                            
                                    ?>
                                    <td><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(price_format($total*$conversion_rate,2)); ?></td>
                                </tr>
                                <?php if(Session::get('gift')): ?>
                                <tr>
                                    <td style="width: 70%;"><?php echo e(__('Gift Discount')); ?></td>
                                    <td><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(Session::get('gift')['discount']); ?></td>
                                </tr>
                                <?php endif; ?>












                                <tr>
                                    <td style="width: 70%;"><?php echo e(__('Shipping')); ?></td>
                                    <td>
                                    <?php if($shippingChage): ?>
                                        <i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e($shippingChage); ?>

                                    <?php else: ?>
                                        Free
                                    <?php endif; ?>
                                    </td>
                                </tr>

                                <?php if(Auth::check() && App\Cart::isCoupanApplied() == 1): ?>
                                <tr>
                                    <td style="width: 70%;"><?php echo e(__('Discount')); ?></td>
                                    <td><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(price_format(App\Cart::getDiscount()*$conversion_rate,2)); ?></td>
                                </tr>
                                <?php endif; ?>

                                <?php if($total_gift_pkg_charge != 0): ?>
                                <tr>
                                    <td style="width: 70%;"><?php echo e(__('Gift Charge')); ?></td>
                                    <td>
                                        <i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(price_format($total_gift_pkg_charge)); ?>

                                    </td>
                                </tr>
                                <?php endif; ?>

                                <tr>
                                    <td style="width: 70%;"><?php echo e(__('Handling Charge')); ?></td>
                                    <td>
                                        <i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(price_format($handlingcharge)); ?>

                                    </td>
                                </tr>

                            </tbody>
                        </table>
                        <table class="table total-amount-table">
                            <tbody>
                                <tr>
                                    <td style="width: 70%;"><?php echo e(__('Total')); ?></td>
                                    <td>
                                    <?php
                                        $secure_pay =0;
                                        $total = sprintf("%.2f",$total*$conversion_rate);
                                        $totals = sprintf("%.2f",$total_shipping*$conversion_rate);
                                        $secure_pay = sprintf("%.2f",$totals + $total + $total_tax_amount + $shippingChage ?? $shippingChage);

                                        if(App\Cart::isCoupanApplied() == '1'){
                                        $secure_pay = sprintf("%.2f",$secure_pay - App\Cart::getDiscount()*$conversion_rate);
                                        }

                                        $secure_pay = sprintf("%.2f",$secure_pay + $handlingcharge + $total_gift_pkg_charge );

                                    ?>
                                        <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                        <span id="grandtotal">
                                        
                                            <?php if( Session::get('gift')): ?>
                                                <span class="payment_amount_label">
                                                <?php echo e(price_format($secure_pay) - Session::get('gift')['discount']); ?>

                                                </span>
                                            
                                                <input type="hidden" id="getgrandtotal" value=" <?php echo e(price_format($secure_pay) - Session::get('gift')['discount']); ?>">
                                            <?php else: ?>
                                                <span class="payment_amount_label">
                                                <?php echo e(price_format($secure_pay)); ?>

                                                </span>
                                                
                                                <input type="hidden" id="getgrandtotal" value=" <?php echo e(price_format($secure_pay)); ?>">
                                            <?php endif; ?>

                                        </span>
                                    <?php
                                        session()->put('payamount',sprintf("%.2f",$secure_pay));
                                    ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Checkout End -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="<?php echo e(url('front/vendor/js/card.js')); ?>"></script>
<script>
  var baseUrl = <?php echo json_encode(url('/'), 15, 512) ?>;
  var carttotal = <?php echo json_encode($total, 15, 512) ?>;
</script>
<script src="<?php echo e(url('js/orderpincode.js')); ?>"></script>
<script src="<?php echo e(url('js/ajaxlocationlist.js')); ?>"></script>
<script src="https://js.braintreegateway.com/web/dropin/1.20.0/js/dropin.min.js"></script>

<script>
  var client_token = null;

  $(function () {
    var total_price = $('#getgrandtotal').val();
    var min_purchase_price = <?php echo $genrals_settings->min_pur_amount; ?>;
    if(total_price >=  min_purchase_price){
      $('#on_button').css({display: 'block'});
      $('#off_button').css({display: 'none'});
    }else{
      $('#on_button').css({display: 'none'});
      $('#off_button').css({display: 'block'});
    }

    $('.bt-btn').on('click', function () {
      $('.bt-btn').addClass('load');
      $.ajax({
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        type: "GET",
        url: "<?php echo e(route('bttoken')); ?>",
        success: function (t) {
          if (t.client != null) {
            client_token = t.client;
            btform(client_token);
          }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest);
          $('.bt-btn').removeClass('load');
          alert('Payment error. Please try again later.');
        }
      });
    });
  });

  function freeshippingcode(){
    var getfreeshippingcode = '<?php echo $shipping_coupan; ?>';
    var freeshipping = $('#freeshipping').val();
    var get_shipping_value='<?php echo $shippingChage ?>';
    var grand_total = $('#getgrandtotal').val();
    // var grand_total = $('#getgrandtotal').val().toFixed(2);
    var new_shipping_value = $('#new_shpping').val();

    if(freeshipping){
      $('#new_shpping').text(0);
      var total_amount = parseFloat(grand_total) - parseFloat(get_shipping_value);
      $('.payment_amount_label').text(total_amount);
    //   $('.payment_amount_label').text((total_amount).toFixed(2));
      $('#shiping_error_msg').text('');
    }else{
      $('#new_shpping').text(get_shipping_value);
      var total_amount = parseFloat(grand_total);
      $('.payment_amount_label').text(total_amount);
    //   $('.payment_amount_label').text(total_amount).toFixed(2);
      $('#shiping_error_msg').text('Invalid shipping code!');
    }
 
  }

  function handlingcharge(id){
    var jQueryArray = '<?php echo json_encode($handing_charge_array); ?>';
    var obj = JSON.parse(jQueryArray)
    var gethandlingcharge = 0;
    var totalhandlingcharge = 0;
    if (obj[id] != '' && typeof obj[id] !== "undefined"){
      var gethandlingcharge = obj[id];
    }
    var grand_total = $('#getgrandtotal').val();
    var oldhiddenhandingcharge = $('#hiddenhandingcharge').val();
    var total_amount = parseFloat(grand_total) - parseFloat(oldhiddenhandingcharge) + parseFloat(gethandlingcharge);
    console.log(total_amount);
    $('.payment_amount_label').text((total_amount).toFixed(2));
    var total_amount_pay = "Pay " + total_amount;
    $('.total_amount_pay').val(total_amount_pay).toFixed(2);
    $('.total_secure_amount').val(total_amount);
    $('.total_paystack_amount').val(parseFloat(total_amount*100));
    $('.payment_handling_label').text(gethandlingcharge);
    console.log(total_amount);

  }

  function btform(token) {
    var payform = document.querySelector('#bt-form');
    braintree.dropin.create({
      authorization: token,
      selector: '#bt-dropin',
      paypal: {
        flow: 'vault'
      },
    }, function (createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr);
        swal({
          title: "Oops ! ",
          text: 'Payment Error please try again later !',
          icon: 'warning'
        });
        $('.preL').fadeOut('fast');
        $('.preloader3').fadeOut('fast');
        return false;
      } else {
        $('.bt-btn').hide();
        $('.payment-final-bt').removeClass('d-none');
      }
      payform.addEventListener('submit', function (event) {
        event.preventDefault();
        instance.requestPaymentMethod(function (err, payload) {
          if (err) {
            console.log('Request Payment Method Error', err);
            swal({
              title: "Oops ! ",
              text: 'Payment Error please try again later !',
              icon: 'warning'
            });
            $('.preL').fadeOut('fast');
            $('.preloader3').fadeOut('fast');
            return false;
          }
          // Add the nonce to the form and submit
          document.querySelector('#nonce').value = payload.nonce;
          payform.submit();
        });
      });
    });
  }

  $('.gift_pkg_charge').on('change',function(){

    var variant = $(this).data('variant');

     if($(this).is(":checked")){
        
        var charge  = $(this).data('gift_charge');

        axios.post('<?php echo e(route("apply.giftcharge")); ?>',{
          variant : variant,
          charge  : charge
        }).then(res => {
          console.log(res.data);
          if(res.data == 'applied'){

            location.reload();

          }
        }).catch(err => {
            console.log(err);
        });

     }else{
        axios.post('<?php echo e(route("reset.giftcharge")); ?>',{
          variant : variant,
        }).then(res => {

          if(res.data == 'removed'){

            location.reload();

          }

        }).catch(err => {
            console.log(err);
        });
     }



  });
  $('.nav-link').on('click',function(e){
    console.log($(this).attr('href'));
  })

</script>
<?php if(config('bkash.ENABLE') == 1 && Module::has('Bkash') && Module::find('Bkash')->isEnabled()): ?>
  
    <?php echo $__env->make("bkash::front.bkashscript", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
<?php endif; ?>

<?php echo $__env->yieldPushContent('payment-script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/checkout_step.blade.php ENDPATH**/ ?>