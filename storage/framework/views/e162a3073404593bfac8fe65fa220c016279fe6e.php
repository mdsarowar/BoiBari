<a <?php if(env('DEMO_LOCK') == 0): ?> href="<?php echo e(route('adv.quick.update',$id)); ?>" <?php else: ?> disabled title="<?php echo e(__("This operation is disabled is demo !")); ?>" <?php endif; ?> class="btn btn-rounded  <?php echo e($status == 1 ? 'btn-success-rgba' : 'btn-danger-rgba'); ?>">
	<?php echo e($status == 1 ? __("Active") : __("Deactive")); ?>

</a><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/adv/status.blade.php ENDPATH**/ ?>