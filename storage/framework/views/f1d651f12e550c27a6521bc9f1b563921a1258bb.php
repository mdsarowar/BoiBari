<!DOCTYPE html>
<?php
    $selected_language = App\Language::firstWhere('lang_code','=',session()->get('changed_language'));
?>
<html lang="<?php echo e(str_replace('_', '-', session()->get('changed_language'))); ?>" <?php if(isset($selected_language) && $selected_language->rtl_available == 1): ?> dir="rtl" <?php endif; ?>>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="author" content="<?php echo e(config('app.name')); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo $__env->yieldContent('title'); ?> <?php echo e(__('Admin Dashboard')); ?></title>
    <?php echo $__env->make('admin.layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="vertical-layout"> 
<div id="containerbar">

<?php echo $__env->make('admin.layouts.mainsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   

<div class="rightbar">
   
     <!-- Start Contentbar -->    
                  
        <?php echo $__env->yieldContent('body'); ?>
    

         <!-- Start Footerbar -->
    <div class="footerbar">
        <footer class="footer">
            <p class="mb-0">
                <?php echo e(config('app.name')); ?> <?php echo e($Copyright); ?></strong>
                <span class="pull-right"><b><?php echo e(__("v")); ?> <?php echo e(config('app.version')); ?> <?php echo e(get_release()); ?></b>
            </p>
        </footer>
    </div>
       
  
  
    
    <!-- End Footerbar -->
</div>

</div>
<?php echo $__env->make('admin.layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- End js -->
<?php echo $__env->yieldContent('custom-script'); ?>
<?php echo $__env->yieldPushContent('script'); ?>
</body>
</html><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/layouts/master-soyuz.blade.php ENDPATH**/ ?>