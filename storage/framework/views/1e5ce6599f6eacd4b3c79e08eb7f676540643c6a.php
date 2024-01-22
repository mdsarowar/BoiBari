<div class="dropdown">
  <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
  <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
    
    <?php if(!in_array($id,['1','2','3','4','5'])): ?>
      <a class="dropdown-item"   href="<?php echo e(route('roles.edit',$id)); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
    <?php else: ?> 
    <p class="dropdown-item" >
      <b class="text-danger"><?php echo e(__("System reserved role")); ?></b>
    </p>
  <?php endif; ?>

    <?php if(!in_array($id,['1','2','3','4','5'])): ?>
      <a class="dropdown-item" <?php if(env('DEMO_LOCK')==0): ?> data-toggle="modal" data-target="#delete<?php echo e($id); ?>" <?php else: ?>
      disabled="disabled" title="This operation is disabled in Demo !" <?php endif; ?>><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
    <?php endif; ?>
	   
    </div>
</div>


<div id="delete<?php echo e($id); ?>" class="delete-modal modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <div class="delete-icon"></div>
      </div>
      <div class="modal-body text-center">
        <h4 class="modal-heading">
          <?php echo e(__('Are You Sure ?')); ?>

        </h4>
        <p><?php echo e(__('Do you really want to delete this role')); ?> <b><?php echo e($name); ?></b> ? <b> <?php echo e(__("By Clicking YES IF any user attach to this role will be unroled !</b> This process cannot be undone")); ?>.</p>
      </div>
      <div class="modal-footer">
        <form method="post" action="<?php echo e(route('roles.destroy',$id)); ?>" class="pull-right">
          <?php echo e(csrf_field()); ?>

          <?php echo e(method_field("DELETE")); ?>


          <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal">
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
<?php /**PATH D:\xampp\htdocs\boibari\resources\views/roles/action.blade.php ENDPATH**/ ?>