<div class="dropdown">
	<button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
	<div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
	
		<a  title="Edit" class="dropdown-item" href="<?php echo e(route("flash-sales.edit",$id)); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
	
		
		<a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#deal_<?php echo e($id); ?>">
			<i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
		</a>
	</div>
</div>

<div id="deal_<?php echo e($id); ?>" class="delete-modal modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="delete-icon"></div>
        </div>
        <div class="modal-body text-center">
          <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
          <p>
            <?php echo e(__('Do you really want to delete this deal? This process cannot be undone.')); ?>

          </p>
        </div>
        <div class="modal-footer">
  
          <form method="post" action="<?php echo e(route("flash-sales.destroy",$id)); ?>" class="pull-right">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field("DELETE")); ?>

  
            <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__("NO")); ?></button>
            <button type="submit" class="btn btn-danger"><?php echo e(__("YES")); ?></button>
          </form>
        </div>
      </div>
    </div>
  </div><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/flashsale/action.blade.php ENDPATH**/ ?>