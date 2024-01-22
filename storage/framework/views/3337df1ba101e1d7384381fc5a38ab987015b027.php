
<?php $__env->startSection('title',__('Emart | Order Placed Successfully |')); ?>
<?php $__env->startSection("content"); ?>  
    <!-- Order Confirm Start -->
    <section id="order-confirm" class="order-confirm-main-block">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="thankyou-content text-center my-5">
              <img width="350px" src="<?php echo e(url('images/thankyou.svg')); ?>" class="img-fluid mb-5" alt="thankyou">
              <h2 class="text-success"><?php echo e(__('Thank You')); ?> !!!</h2>
              <p class="my-4"><?php echo e(__('Your Order has been successfully placed. Your Order ID is')); ?> #<?php echo e(app('request')->input('orderid') ?? ''); ?></p>
              <div class="button-list">
              <a href="<?php echo e(app('request')->input('orderid') ? route('user.view.order',app('request')->input('orderid')) : 'javascript:'); ?>" role="button" class="btn btn-primary font-16"><i class="feather icon-map-pin "></i><?php echo e(__('View Order')); ?></a>
              <a href="<?php echo e(url('/')); ?>" role="button" class="btn btn-success font-16"><i class="feather icon-file-text"></i><?php echo e(__('Continue Shopping')); ?></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Order Confirm End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/home/thankyou.blade.php ENDPATH**/ ?>