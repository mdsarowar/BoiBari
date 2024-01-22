<form action="<?php echo e(route('login.as',Crypt::encrypt($id))); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <button type="submit" class="btn btn-success-rgba btn-rounded">
        <i class="fa fa-key"></i>
    </button>
</form><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/user/loginas.blade.php ENDPATH**/ ?>