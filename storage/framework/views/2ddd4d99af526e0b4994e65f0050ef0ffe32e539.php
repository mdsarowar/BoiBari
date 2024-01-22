
<?php $__env->startSection('title',__('All Hotdeals | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'All Hotdeals';
  $data['title0'] = 'Marketing';
  $data['title1'] = 'All Hotdeals';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    
                    <div class="row">
                      <div class="col-lg-8">
                        <h5 class="box-title"> <?php echo e(__('All Hotdeals')); ?></h5>
                      </div>
                      <div class="col-md-4">
                        <div class="widgetbar">
                          <a href=" <?php echo e(url('admin/hotdeal/create')); ?> " class="btn btn-primary-rgba mr-2">
                              <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add Hotdeals")); ?>

                          </a>
                        </div>
                      </div>
                    </div>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="full_detail_table" class="width100 table table-bordered table-striped">
                      <thead>
                        <tr class="table-heading-row">
              
                          <th><?php echo e(__('ID')); ?></th>
                          <th><?php echo e(__('Product Name')); ?></th>
                          <th><?php echo e(__('Status')); ?></th>
                          <th><?php echo e(__("Action")); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                       
              
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr>
                          <td><?php echo e($key+1); ?></td>
                          <td><?php echo e(isset($product->pro) ? $product->pro->name : $product->simple_product->product_name); ?></td>
                        
                          <td>
              
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hotdeals.edit')): ?>
                            <form action="<?php echo e(route('hot.quick.update',$product->id)); ?>" method="POST">
                              <?php echo csrf_field(); ?>
                              <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> disabled
                                title="<?php echo e(__("This operation is disabled in Demo !")); ?>" <?php endif; ?>
                                class="btn btn-rounded <?php echo e($product->status==1 ? "btn-success-rgba" : "btn-danger-rgba"); ?>">
                                <?php echo e($product->status ==1 ? __('Active') : __('Deactive')); ?>

                              </button>
                            </form>
                          <?php endif; ?>
              
              
                          </td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                              <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hotdeals.edit')): ?>
                                  <a class="dropdown-item" href="<?php echo e(url('admin/hotdeal/'.$product->id.'/edit')); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                  <?php endif; ?>
                                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hotdeals.delete')): ?>
                                  <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($product->id); ?>" >
                                    <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                </a>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($product->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__("DELETE")); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                            <p><?php echo e(__('Do you really want to delete')); ?>? <?php echo e(__('This process cannot be undone.')); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="post" action="<?php echo e(url('admin/hotdeal/'.$product->id)); ?>" class="pull-right">
                                            <?php echo csrf_field(); ?>
                                            <?php echo e(method_field("DELETE")); ?>

                                            <button type="reset" class="btn btn-secondary-rgba" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                            <button type="submit" class="btn btn-primary-rgba"><?php echo e(__("YES")); ?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                          
                          </td>
              
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
                    </table>
                    </tbody>
                  </div>
                  <!-- /.box-body -->
                </div>
              </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
             

<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/hotdeal/index.blade.php ENDPATH**/ ?>