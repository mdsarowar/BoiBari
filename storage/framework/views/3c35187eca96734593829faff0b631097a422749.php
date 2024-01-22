
<?php $__env->startSection('title',__('Advertisements |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Advertisements';
  $data['title0'] = 'Marketing';
  $data['title1'] = 'Advertisements';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">
    <div class="row">
      <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    
                    <div class="row">
                      <div class="col-lg-8">
                        <h5 class="box-title"><?php echo e(__('All Advertisements')); ?></h5>
                      </div>
                      <div class="col-md-4">
                        <div class="widgetbar">
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('advertisements.create')): ?>
                          <div class="widgetbar">
                            <a href="<?php echo e(route('adv.create')); ?>"  class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i><?php echo e(__("Create New AD")); ?></a>
                              </div> 
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="adTable" class="width100 table table-bordered table-striped">
                      <thead>
          
                        <th>
                          #
                        </th>
                        <th>
                          <?php echo e(__('Layout')); ?>

                        </th> 
                        <th>
                            <?php echo e(__("Position")); ?>

                        </th>
                        <th>
                          <?php echo e(__("Status")); ?>

                        </th>
                        <th>
                          <?php echo e(__("Action")); ?>

                        </th>
                      </thead>
          
                      <tbody>
                        
                      </tbody>
                   </table>
                  </div>
                </div>
            </div>
      </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
 <script>var advindexurl = "<?=route('adv.index')?>"</script>
 <script src="<?php echo e(url('js/layoutadvertise.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/adv/index.blade.php ENDPATH**/ ?>