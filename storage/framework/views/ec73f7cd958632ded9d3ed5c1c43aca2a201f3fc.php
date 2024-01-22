<div class="dropdown">
    <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
    <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('digital-products.edit')): ?>
        <a class="dropdown-item" href="<?php echo e(route('simple-products.edit',$row->id)); ?>"><i class="feather icon-settings mr-2"></i><?php echo e(__("Manage Product")); ?></a>
        <?php endif; ?>
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('digital-products.edit')): ?>
        <a class="dropdown-item" href="<?php echo e(route('simple-products.edit',$row->id)); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
        <?php endif; ?>
        <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete1<?php echo e($row->id); ?>" ><i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>                               
      </div>
</div>
<!-- delete Modal start -->

<div class="modal fade bd-example-modal-sm" id="delete1<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-header bg-danger border-danger">
              <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__("DELETE")); ?></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
          <p><?php echo e(__("Do you really want to delete this product")); ?> <b><?php echo e($row->product_name); ?></b><?php echo e(__("? This process cannot be undone.")); ?></p>
          </div>
          <div class="modal-footer">
              <form method="post" action="<?php echo e(route('simple-products.destroy',$row->id)); ?>" class="pull-right">
              <?php echo e(csrf_field()); ?>

              <?php echo e(method_field("DELETE")); ?>

                  <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                  <button type="submit" class="btn btn-danger"><?php echo e(__("YES")); ?></button>
              </form>
          </div>
      </div>
  </div>
</div>

<!-- delete Model ended --><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/simpleproducts/action.blade.php ENDPATH**/ ?>