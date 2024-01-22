<div class="dropdown">
    <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
    <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
       
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order.view')): ?>
        <a title="Print Order" href="<?php echo e(route('order.print',$id)); ?>" target="_blank" class="dropdown-item"><i class="fa fa-print mr-2"></i>Print</a>
        <?php endif; ?>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order.delete')): ?>
          <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($id); ?>" ><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
          <div id="delete<?php echo e($id); ?>" class="delete-modal modal fade" role="dialog">
              <div class="modal-dialog modal-sm">

                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="delete-icon"></div>
                  </div>
                  <div class="modal-body text-center">
                    <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
                    <p><?php echo e(__("Do you really want to delete this order")); ?> <b><?php echo e($order_id); ?></b><?php echo e(__("? This process cannot be undone.")); ?></p>
                  </div>
                  <div class="modal-footer">
                  <form method="POST" action="<?php echo e(route('order.delete',$id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field("DELETE")); ?>


                      <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__("NO")); ?></button>
                      <button type="submit" class="btn btn-danger"><?php echo e(__("YES")); ?></button>
                    </form>
                  </div>
                </div>
              </div>
          </div>
        <?php endif; ?>


    </div>
</div><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/dbTableColumn/action.blade.php ENDPATH**/ ?>