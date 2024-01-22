
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
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div class="social-login-block">
                                            <?php if(auth()->guard()->check()): ?>
                                            <p>
                                                <b>
                                                    <div class="verified-icon">
                                                    <i data-feather="check-circle"></i>
                                                    </div>
                                                    <?php echo e(Auth::user()->name); ?>

                                                </b> 
                                            </p>
                                            <p>
                                                <div class="verified-icon">
                                                    <i data-feather="check-circle"></i>
                                                </div>
                                                <?php echo e(Auth::user()->mobile); ?>

                                            </p>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-block accordion-item">
                            <div class="checkout-address accordion-header">
                                <h3 class="section-title accordion-button" type="button" aria-expanded="true" aria-controls="collapseThree">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="<?php echo e(url('checkout')); ?>">
                                            B. Shipping Address
                                            </a>
                                        </div>
                                    </div>
                                </h3>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <div class="checkout-block accordion-item">
                            <div class="checkout-shipping-method accordion-header">
                                <h3 class="section-title accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour"><?php echo e(__('C.')); ?> <?php echo e(__('Billing Information')); ?></h3>
                                <div id="collapseFour" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <!-- <label class="address-checkbox mb-30" onchange="sameship()" id="sameasship"><?php echo e(__('Billing address is same as Shipping address ?')); ?>

                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                        </label> -->
                                        <form class="py-30" id="billingForm" action="<?php echo e(route('checkout')); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                            <input type="hidden" id="shipval" name="sameship" value="1">
                                                
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="mb-30">
                                                        <label for="firstname" class="form-label"><?php echo e(__('Name')); ?> <span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="billing_name" name="billing_name" value="<?php echo e(Auth::user()?Auth::user()->name:''); ?>" placeholder="<?php echo e(__('Please Enter Name')); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="mb-30">
                                                        <label for="lastname" class="form-label"><?php echo e(__('Email')); ?> <span class="required">*</span></label>
                                                        <input type="text" class="form-control" id="billing_email" name="billing_email" value="<?php echo e(Auth::user()?Auth::user()->email:''); ?>" placeholder="<?php echo e(__('Please Enter Email')); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <div class="mb-30">
                                                        <label for="phonenumber" class="form-label"><?php echo e(__('Contact No.')); ?><span class="required">*</span></label>
                                                        <input type="tel" class="form-control" id="billing_mobile" name="billing_mobile" value="<?php echo e(Auth::user()?Auth::user()->mobile:''); ?>" placeholder="<?php echo e(__('Please Enter Mobile Number')); ?>">
                                                    </div>
                                                </div>








                                                <div class="col-lg-6 col-md-6">
                                                    <div class="mb-30">
                                                        <label for="message" class="form-label"><?php echo e(__('Address')); ?> <span class="required">*</span></label>
                                                        <textarea class="form-control" id="billing_address" name="billing_address" placeholder="<?php echo e(__('542 W. 15th Street')); ?>" rows="1" required></textarea>
                                                    </div>
                                                </div>
































                                                
                                                    
                                                <input type="submit" class="btn btn-primary" value="Continue">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="checkout-block accordion-item">
                            <div class="checkout-shipping-method accordion-header">
                                <h3 class="section-title accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive"><?php echo e(__('D. Order Review')); ?></h3>
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
                                    <td><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(price_format($total*1,2)); ?></td>
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
                                    <td class="wishlist-out-stock"><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(price_format(App\Cart::getDiscount()*1,2)); ?></td>
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
                                                <?php echo e(price_format($grandtotal*1,2) - Session::get('gift')['discount']); ?>

                                            <?php else: ?>
                                                <?php echo e(price_format($grandtotal*1,2)); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <?php if(Session::get('gift')): ?>
                                                <?php echo e(price_format(($grandtotal-App\Cart::getDiscount())*1,2) - Session::get('gift')['discount']); ?>

                                            <?php else: ?>
                                                <?php echo e(price_format(($grandtotal-App\Cart::getDiscount())*1,2)); ?>

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
        </div>
    </section>
    <!-- Checkout End -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
  <script>var baseUrl = "<?= url('/') ?>";</script>
  <script src="<?php echo e(url('js/orderpincode.js')); ?>"></script>
  <script>var baseUrl = "<?= url('/') ?>";</script>
 <script src="<?php echo e(url('js/ajaxlocationlist.js')); ?>"></script>

 <script>
$('#country_id').on('change', function () {
  var up = $('#upload_id').empty();
  var up1 = $('#city_id').empty();
  var cat_id = $(this).val();

  if (cat_id) {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "GET",
      url: baseUrl + '/choose_state',
      data: {
        catId: cat_id
      },
      success: function (data) {
        $('#country_id').append('<option value="">Please Choose</option>');
        up.append('<option value="">Please Choose</option>');
        up1.append('<option value="">Please Choose</option>');
        $.each(data, function (id, title) {
          up.append($('<option>', {
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
});



$('#upload_id').on('change', function () {


  var up = $('#city_id').empty();
  var cat_id = $(this).val();
  if (cat_id) {

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "GET",
      url: baseUrl + '/choose_city',
      data: {
        catId: cat_id
      },
      success: function (data) {

        up.append('<option value="0">Please Choose</option>');
        $.each(data, function (id, title) {
          up.append($('<option>', {
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
});
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/checkout_step2.blade.php ENDPATH**/ ?>