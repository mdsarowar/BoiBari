
<?php $__env->startSection('stylesheet'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(url('/css/app.css')); ?>"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title','Emart | Track Order'); ?>
<?php $__env->startSection("content"); ?> 


    <!-- Home Start -->
    <section id="home" class="home-main-block product-home">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb" class="breadcrumb-main-block">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="<?php echo e(__('Home')); ?>"><?php echo e(__('Home')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Track Order')); ?></li>
              </ol>
            </nav>
            <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('<?= URL::to('/'); ?>/frontend/assets/images/wishlist/breadcrum.png');">
              <div class="breadcrumb-nav">
                <h3 class="breadcrumb-title"><?php echo e(__('Track Order')); ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Home End -->

        <!-- Track Start -->
    <section id="track" class="track-main-block">
      <div class="container">
         <!-- Track Start -->
        <div class="mb-1" id="trackorder">
            <track-order :trackid="'<?php echo e(app('request')->input('trackingid')); ?>'"></track-order>
        </div>
      </div>
    </section>
    <!-- Track End -->




<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
   <script>var baseURL = <?php echo json_encode(url('/'), 15, 512) ?>;</script>
   <script src="<?php echo e(url('js/trackorder.js')); ?>"></script> 
<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/trackorder.blade.php ENDPATH**/ ?>