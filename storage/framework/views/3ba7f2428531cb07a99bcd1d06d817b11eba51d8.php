<!-- Footer Start -->
<footer class="footer-main-block">
  <div class="footer-block-one">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-6">
              <div class="footer-block">
                <h5 class="footer-title"><?php echo e($footer3_widget->footer2); ?></h5>
                <ul>

                  <?php if(Auth::check()): ?>
                    <li><a href="<?php echo e(url('profile')); ?>" title="My Account"><?php echo e(__('My Account')); ?></a></li>
                    <li><a href="<?php echo e(url('order')); ?>" title="Order History"><?php echo e(__('Order History')); ?></a></li>
                  <?php endif; ?>
                    <li><a href="<?php echo e(url('faq')); ?>" title="Faq"><?php echo e(__("FAQ's")); ?></a></li>
                    <li><a href="<?php echo e(route('contact.us')); ?>" title="<?php echo e(__("ContactUs")); ?>"><?php echo e(__('Contact Us')); ?></a></li>
                  <?php if(isset($genrals_settings) && $genrals_settings['vendor_enable'] == 1): ?>
                    <?php if(Auth::check()): ?>
                      <?php if(Auth::user()->role_id != 'a' && !Auth::user()->store): ?>
                      <li class="last"><a href="<?php echo e(route('applyforseller')); ?>" title="<?php echo e(__('Apply for Seller Account')); ?>"><?php echo e(__('Apply for Seller Account')); ?></a></li>
                      <?php endif; ?>
                    <?php else: ?>
                      <li class="last"><a href="<?php echo e(route('applyforseller')); ?>" title="<?php echo e(__('Apply for Seller Account')); ?>"><?php echo e(__('Apply for Seller Account')); ?></a></li>
                    <?php endif; ?>
                  <?php endif; ?>
                  <li class="last"><a href="<?php echo e(route('hdesk')); ?>" title="<?php echo e(__('Help Center')); ?>"><?php echo e(__('Help Center')); ?></a></li>
                  <li class="last"><a href="<?php echo e(route('track.order')); ?>" title="<?php echo e(__("Track Order")); ?>"><?php echo e(__('Track Order')); ?></a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
              <div class="footer-block">
                <h5 class="footer-title"><?php echo e($footer3_widget->footer3); ?></h5>
                <ul>

                  <?php $__currentLoopData = $widget3items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             
                  <li>
                    <?php if($foo->link_by == 'page' && isset($foo->gotopage['slug'])): ?>
                    <a title="<?php echo e($foo->title); ?>" href="<?php echo e(route('page.slug',$foo->gotopage['slug'])); ?>">
                      <?php echo e($foo->title); ?>

                    </a>
                    <?php else: ?>
                    <a title="<?php echo e($foo->title); ?>" href="<?php echo e($foo->url); ?>">
                      <?php echo e($foo->title); ?>

                    </a>
                    <?php endif; ?>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
              <div class="footer-block">
                <h5 class="footer-title"><?php echo e($footer3_widget->footer4); ?></h5>
                <ul>
                   
                  <?php $__currentLoopData = $widget4items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $foo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
                  <li>
                    <?php if($foo->link_by == 'page' && isset($foo->gotopage['slug'])): ?>
                    <a title="<?php echo e($foo->title); ?>" href="<?php echo e(route('page.slug',$foo->gotopage['slug'])); ?>">
                      <?php echo e($foo->title); ?>

                    </a>
                    <?php else: ?>
                    <a target="__blank" title="<?php echo e($foo->title); ?>" href="<?php echo e($foo->url); ?>">
                      <?php echo e($foo->title); ?>

                    </a>
                    <?php endif; ?>
                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
              <div class="footer-block">
                <h5 class="footer-title">Connect</h5>
                <ul>

                  <?php if(!empty($genrals_settings->address)): ?>
                  <li><a href="#" title="Address"><i data-feather="map-pin"></i><?php echo e($genrals_settings->address); ?></a></li>
                  <?php endif; ?>

                  <?php if(!empty($genrals_settings->mobile)): ?>
                  <li><a href="tel:<?php echo e($genrals_settings->mobile); ?>" title="Mobile No."><i data-feather="phone-call"></i><?php echo e($genrals_settings->mobile); ?></a></li>
                  <?php endif; ?>

                  <?php if(!empty($genrals_settings->email)): ?>
                  <li><a href="mailto:<?php echo e($genrals_settings->email); ?>" title="Email"><i data-feather="globe"></i><?php echo e($genrals_settings->email); ?></a></li>
                  <?php endif; ?>

                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="social-link-block">
            <h5 class="footer-title"><?php echo e(__('Social Links')); ?></h5>
            <ul>

              <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if($social->url=='https://facebook.com' || $social->url=='http://facebook.com'): ?>
                <li><a target="_blank" href="<?php echo e($social->url); ?>" title="facebook"><i data-feather="facebook"></i></a></li>
                <?php endif; ?>

                <?php if($social->url=='https://twitter.com' || $social->url=='http://twitter.com'): ?>
                <li><a target="_blank" href="<?php echo e($social->url); ?>" title="twitter"><i data-feather="twitter"></i></a></li>
                <?php endif; ?>

                <?php if($social->url=='https://instagram.com' || $social->url=='http://instagram.com'): ?>
                <li><a target="_blank" href="<?php echo e($social->url); ?>" title="instagram"><i data-feather="instagram"></i></a></li>
                <?php endif; ?>

                <?php if($social->url=='https://youtube.com' || $social->url=='http://youtube.com'): ?>
                <li><a target="_blank" href="<?php echo e($social->url); ?>" title="youtube"><i data-feather="youtube"></i></a></li>
                <?php endif; ?>

                <?php if($social->url=='https://linkedin.com' || $social->url=='http://linkedin.com'): ?>
                <li><a target="_blank" href="<?php echo e($social->url); ?>" title="linkedin"><i data-feather="linkedin"></i></a></li>
                <?php endif; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
          </div>
          <div class="app-link-block">
            <h5 class="footer-title">App Links</h5>
            <ul>
              <li><a href="#" title=""><img src="<?php echo e(url('frontend/assets/images/app/google_play.png')); ?>" class="img-fluid" alt=""></a></li>
              <li><a href="#" title=""><img src="<?php echo e(url('frontend/assets/images/app/app_store.png')); ?>" class="img-fluid" alt=""></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-block-two">
    <div class="container">
      <div class="footer-logo-des">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="footer-logo">
              <?php if($front_logo): ?>
              <a href="<?php echo e(url('/')); ?>" title="<?php echo e($title); ?>"><img src="<?php echo e(url('images/genral/footer/'.$front_logo)); ?>" class="img-fluid" alt="<?php echo e($title); ?>"></a>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-lg-9 col-md-9 col-sm-9">
            <div class="footer-des">
              <p><?php echo e(App\Footer::first()?App\Footer::first()->content:''); ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="tiny-footer">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
            <p> <?php if(isset($Copyright)): ?> <?php echo e($Copyright); ?><?php endif; ?></p>
          </div>
          <div class="col-lg-6 col-md-6 col-12">
            <div id="footer-payment-slider" class="footer-payment-slider-block owl-carousel owl-theme">
              <div class="item">
                <?php if($Api_settings->paypal_enable=='1'): ?>
                <a target="__blank" href="https://paypal.com" title="Paypal"><img src="<?php echo e(url('images/payment/paypal.png')); ?>" class="img-fluid" alt="Paypal"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->stripe_enable=='1'): ?>
                <a title="Stripe" target="__blank" href="https://stripe.com/"><img src="<?php echo e(url('images/payment/stripe.png')); ?>" class="img-fluid" alt="Stripe"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->braintree_enable=='1'): ?>
                <a title="Braintree" target="__blank" href="https://braintreepayments.com/"><img src="<?php echo e(url('images/payment/braintree.png')); ?>" class="img-fluid" alt="Braintree"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->paystack_enable=='1'): ?>
                <a title="Braintree" target="__blank" href="https://paystack.com/"><img src="<?php echo e(url('images/payment/paystack.png')); ?>" class="img-fluid" alt="Paystack"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->paytm_enable=='1'): ?>
                <a title="Paytm" target="__blank" href="https://paytm.com/"><img src="<?php echo e(url('images/payment/paytm.png')); ?>" class="img-fluid" alt="Paytm"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->razorpay=='1'): ?>
                <a title="Razorpay" target="__blank" href="https://razorpay.com/"><img src="<?php echo e(url('images/payment/razorpay.png')); ?>" class="img-fluid" alt="Razorpay"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->instamojo_enable=='1'): ?>
                <a title="Instamojo" target="__blank" href="https://instamojo.com/"><img src="<?php echo e(url('images/payment/instamojo.png')); ?>" class="img-fluid" alt="Instamojo"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->payu_enable=='1'): ?>
                <a title="Payumoney" target="__blank" href="https://payu.com/"><img src="<?php echo e(url('images/payment/payumoney.png')); ?>" class="img-fluid" alt="Payumoney"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->payhere_enable=='1'): ?>
                <a title="Payhere" target="__blank" href="https://payhere.com/"><img src="<?php echo e(url('images/payment/payhere.png')); ?>" class="img-fluid" alt="Payhere"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->omise_enable=='1'): ?>
                <a title="Omise" target="__blank" href="https://omise.com/"><img src="<?php echo e(url('images/payment/omise.png')); ?>" class="img-fluid" alt="Omise"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->cashfree_enable=='1'): ?>
                <a title="Cashfree" target="__blank" href="https://cashfree.com/"><img src="<?php echo e(url('images/payment/cashfree.png')); ?>" class="img-fluid" alt="Cashfree"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->moli_enable=='1'): ?>
                <a title="Mollie" target="__blank" href="https://mollie.com/"><img src="<?php echo e(url('images/payment/mollie.png')); ?>" class="img-fluid" alt="Mollie"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->rave_enable=='1'): ?>
                <a title="Rave" target="__blank" href="https://dashboard.flutterwave.com/"><img src="<?php echo e(url('images/payment/rave.png')); ?>" class="img-fluid" alt="Rave"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->skrill_enable=='1'): ?>
                <a title="Skrill" target="__blank" href="https://skrill.com/"><img src="<?php echo e(url('images/payment/skrill.png')); ?>" class="img-fluid" alt="Skrill"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->sslcommerze_enable=='1'): ?>
                <a title="sslcommerz" target="__blank" href="https://sslcommerz.com/"><img src="<?php echo e(url('images/payment/sslcommerz.png')); ?>" class="img-fluid" alt="sslcommerz"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->enable_amarpay=='1'): ?>
                <a title="aamarpay" target="__blank" href="https://aamarpay.com/"><img src="<?php echo e(url('images/payment/aamarpay.png')); ?>" class="img-fluid" alt="aamarpay"></a>
                <?php endif; ?>
              </div>
              <div class="item">
                <?php if($Api_settings->iyzico_enable=='1'): ?>
                <a title="Iyzico" target="__blank" href="https://iyzico.com/"><img src="<?php echo e(url('images/payment/iyzico.png')); ?>" class="img-fluid" alt="Iyzico"></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- Footer End --><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/layout/footer.blade.php ENDPATH**/ ?>