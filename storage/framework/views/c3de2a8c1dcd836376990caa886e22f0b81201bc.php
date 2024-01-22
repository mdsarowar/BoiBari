<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h4 class="page-title"><?php echo e($heading ?? ''); ?></h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/myadmin')); ?>"><?php echo e(__('Dashboard')); ?></a></li>
                    <?php if(isset($menu1)): ?>
                        <li class="breadcrumb-item <?php echo e($secondaryactive ?? ''); ?>"><?php echo e($menu1 ?? ''); ?></li>
                    <?php endif; ?>

                    <?php if(isset($menu2)): ?>
                        <li class="breadcrumb-item <?php echo e($thirdactive ?? ''); ?>"><?php echo e($menu2 ?? ''); ?></li>
                    <?php endif; ?>

                    <?php if(isset($menu3)): ?>
                        <li class="breadcrumb-item <?php echo e($fourthactive ?? ''); ?>"><?php echo e($menu3 ?? ''); ?></li>
                    <?php endif; ?>
                </ol>
            </div>
        </div>
        <?php echo e($button ?? ''); ?>

    </div>          
</div>




<?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/component/breadcumb.blade.php ENDPATH**/ ?>