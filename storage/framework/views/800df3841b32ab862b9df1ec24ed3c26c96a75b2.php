<div class="form-group">
  
  <div class="col-md-9 col-sm-9 col-xs-12">

    <label class="text-dark" for="first-name">
      <?php echo e(__("Enable On Cart Page")); ?>

    </label><br>
    <label class="switch">
      <input type="checkbox" name="cart_page" onchange="checkoutSetting()" id="cart_page"
        <?php echo e($auto_geo->enable_cart_page=="1"?'checked':''); ?>>
      <span class="knob"></span>
    </label>

  </div>

  
  <div class="col-md-9 col-sm-9 col-xs-12">

    <label class="text-dark" for="first-name">
      <?php echo e(__("Check Out Currency")); ?>

    </label><br>
    <label class="switch">
      <input type="checkbox" name="checkout_currency" onchange="checkoutSettingCheckout()" id="checkout_currency"
        <?php echo e($auto_geo->checkout_currency=="1"?'checked':''); ?>>
      <span class="knob"></span>
    </label>

  </div>

</div>

<caption><?php echo e(__("Currency Option:")); ?></caption>
<table class="table">

  <thead>
    <tr>
      <th scope="col"><?php echo e(__('Currency')); ?></th>

      <th scope="col"><?php echo e(__("Checkout Currency")); ?></th>
      <th scope="col"><?php echo e(__("Payment Method")); ?></th>



    </tr>
  </thead>

  <form>

    <tbody>

      <?php if($check_cur): ?>
      <?php $__currentLoopData = $check_cur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $cury): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td>
          <?php echo e($cury->currency->code); ?>

          <input type="hidden" id="currency_checkout<?php echo e($key); ?>" name="currency_checkout<?php echo e($cury->id); ?>"
            value="<?php echo e($cury->currency->code); ?>">

          <input type="hidden" id="currencyId<?php echo e($key); ?>" value="<?php echo e($cury->id); ?>">
        </td>

        <td>

          <select class="form-control select2" id="checkout_currency_status<?php echo e($key); ?>">

            <option value="1" <?php if(!empty($checkout)): ?> <?php echo e($checkout->checkout_currency=='1'?'selected':''); ?> <?php endif; ?>>Yes
            </option>
            <option value="0" <?php if(!empty($checkout)): ?> <?php echo e($checkout->checkout_currency=='0'?'selected':''); ?> <?php endif; ?>>No
            </option>

          </select>
        </td>
        <td>

         
          <select class="js-example-basic-multiple form-control pay_m" id="payment_checkout<?php echo e($key); ?>" name="payment[]"
            multiple="multiple">

          

            <option value="instamojo" <?php if(isset($cury->checkoutCurrencySettings) && in_array('instamojo',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Instamojo</option>

            <option <?php if(isset($cury->checkoutCurrencySettings) && in_array('wallet',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?> value="wallet">Wallet</option>

            <option value="paypal" <?php if(isset($cury->checkoutCurrencySettings) && in_array('paypal',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?> >Paypal</option>

            <option value="payu" <?php if(isset($cury->checkoutCurrencySettings) && in_array('payu',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>PayUBiz/ PayUMoney</option>

            <option value="stripe" <?php if(isset($cury->checkoutCurrencySettings) && in_array('stripe',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?> >Stripe</option>

            <option value="paystack" <?php if(isset($cury->checkoutCurrencySettings) && in_array('paystack',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Paystack</option>

            <option <?php if(isset($cury->checkoutCurrencySettings) && in_array('braintree',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?> value="braintree">Braintree</option>

            <option value="Razorpay" <?php if(isset($cury->checkoutCurrencySettings) && in_array('Razorpay',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>RazorPay</option>

            <option value="Paytm" <?php if(isset($cury->checkoutCurrencySettings) && in_array('Paytm',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>PayTM</option>

            <option value="payhere" <?php if(isset($cury->checkoutCurrencySettings) && in_array('payhere',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Payhere</option>

            <option value="bankTransfer" <?php if(isset($cury->checkoutCurrencySettings) && in_array('bankTransfer',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bank Transfer</option>

            <option value="skrill" <?php if(isset($cury->checkoutCurrencySettings) && in_array('skrill',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Skrill</option>

            <option value="mollie" <?php if(isset($cury->checkoutCurrencySettings) && in_array('mollie',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Mollie</option>

            <option <?php if(isset($cury->checkoutCurrencySettings) && in_array('sslcommerze',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?> value="sslcommerze">SslCommerze</option>

            <option value="amarpay" <?php if(isset($cury->checkoutCurrencySettings) && in_array('amarpay',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Amar Pay</option>

            <option <?php if(isset($cury->checkoutCurrencySettings) && in_array('iyzico',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?> value="iyzico">iyzico</option>

            <option value="omise" <?php if(isset($cury->checkoutCurrencySettings) && in_array('omise',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Omise</option>

            <option value="rave" <?php if(isset($cury->checkoutCurrencySettings) && in_array('rave',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Rave</option>

            <option value="cashfree" <?php if(isset($cury->checkoutCurrencySettings) && in_array('cashfree',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Cashfree</option>

            <option value="bkash" <?php if(isset($cury->checkoutCurrencySettings) && in_array('bkash',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Bkash Payment (Addon)</option>
            
            <option value="dpopayment" <?php if(isset($cury->checkoutCurrencySettings) && in_array('dpopayment',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>DPO Payment (Addon)</option>

            <option value="cashOnDelivery" <?php if(isset($cury->checkoutCurrencySettings) && in_array('cashOnDelivery',explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?>>Cash On Delivery</option>
            <?php $__currentLoopData = $manualpaymentmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option <?php if(isset($cury->checkoutCurrencySettings) && in_array($item->payment_name,explode(',',$cury->checkoutCurrencySettings->payment_method)) ): ?> <?php echo e('selected'); ?> <?php endif; ?> value="<?php echo e($item->payment_name); ?>"><?php echo e($item->payment_name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </select>
        </td>

      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      <?php endif; ?>
      <tr>
        <td colspan="3">
          <div class="pull-left">
          <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban mr-2"></i><?php echo e(__("Reset")); ?></button>
            <a class="btn btn-primary-rgba" onclick="CheckoutCurrencySubmitForm()">
              <i class="fa fa-check-circle mr-2"></i>Save
            </a>
          </div>
        </td>
      </tr>

    </tbody>

  </form>

</table>

<script>
  var baseUrl = "<?= url('/') ?>";
</script>
<script src="<?php echo e(url('js/currency.js')); ?>"></script><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/multiCurrency/checkout.blade.php ENDPATH**/ ?>