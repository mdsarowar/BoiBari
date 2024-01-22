
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
                            <div class="checkout-shipping-method accordion-header">
                                <h3 class="section-title accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix"><?php echo e(__('E. Payment Info')); ?></h3>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="cart-block">
                        <h4 class="section-title"><?php echo e(__('Payment Details')); ?></h4>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td style="width: 70%;"><?php echo e(__('Subtotal')); ?></td>
                                <td><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(price_format($total*$conversion_rate,2)); ?></td>
                            </tr>
                            <?php if(Session::get('gift')): ?>
                                <tr>
                                    <td style="width: 70%;"><?php echo e(__('Gift Discount')); ?></td>
                                    <td class="wishlist-out-stock"><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(Session::get('gift')['discount']); ?></td>
                                </tr>
                            <?php endif; ?>
                            <?php if(Auth::check() && App\Cart::isCoupanApplied() == 1): ?>
                                <tr>
                                    <td style="width: 70%;"><?php echo e(__('Discount')); ?></td>
                                    <td class="wishlist-out-stock"><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(price_format(App\Cart::getDiscount()*$conversion_rate,2)); ?></td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <table class="table total-amount-table">
                            <tbody>
                            <tr>
                                <td style="width: 70%;"><?php echo e(__('Total')); ?></td>
                                <td>
                                    <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                                    <?php if(!App\Cart::isCoupanApplied() == 1): ?>
                                        <?php if(Session::get('gift')): ?>
                                            <?php echo e(price_format($grandtotal*$conversion_rate,2) - Session::get('gift')['discount']); ?>

                                        <?php else: ?>
                                            <?php echo e(price_format($grandtotal*$conversion_rate,2)); ?>

                                        <?php endif; ?>
                                    <?php else: ?>
                                        <?php if(Session::get('gift')): ?>
                                            <?php echo e(price_format(($grandtotal-App\Cart::getDiscount())*$conversion_rate,2) - Session::get('gift')['discount']); ?>

                                        <?php else: ?>
                                            <?php echo e(price_format(($grandtotal-App\Cart::getDiscount())*$conversion_rate,2)); ?>

                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout End -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $("#select_location").select2({
            placeholder: "Select a programming language",
            allowClear: true
        });
        $("#select_location").select2({
            minimumInputLength: 2
        });
    </script>
    <script>
        function selectCity(city_id) {
            var up = $('#select_state').empty();
            var up1 = $('#select_country').empty();
            var cat_id = city_id;

            if (cat_id) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: baseUrl + '/admin/select_state_country',
                    data: {
                        catId: cat_id
                    },
                    success: function (data) {
                        console.log(data);
                        // $('#country_id').append('<option value="">Please Choose</option>');
                        // up.append('<option value="">Please Choose</option>');
                        $.each(data.states, function (id, title) {
                            up.append($('<option>', {
                                value: id,
                                text: title
                            }));
                        });

                        $.each(data.country, function (id, title) {
                            up1.append($('<option>', {
                                value: id,
                                text: title
                            }));
                        });
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest);
                    }
                });
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/checkout.blade.php ENDPATH**/ ?>