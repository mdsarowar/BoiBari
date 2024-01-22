
<?php $__env->startSection('title',__('Slider |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Sliders';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'Sliders';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
  <div class="row">
   
    <div class="col-lg-12">
      <?php if($errors->any()): ?>
      <div class="alert alert-danger" role="alert">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
      <?php endif; ?>
      <div class="card m-b-30">
        <div class="card-header">
          
          <div class="row">
            <div class="col-lg-8">
              <h5 class="box-title"><?php echo e(__('Sliders')); ?></h5>
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <a href="<?php echo e(url('admin/slider/create')); ?>" class="btn btn-primary-rgba mr-2">
                    <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add Slider")); ?>

                </a>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
         <!-- main content start -->
        <div class="table-responsive">
          <table id="datatable-buttons" class="table table-striped table-bordered">
             <thead>
               <th><?php echo e(__('ID')); ?></th>
               <th><?php echo e(__('Slider Content')); ?></th>
               <th></th>
               <th><?php echo e(__('Status')); ?></th>
               <th><?php echo e(__('Action')); ?></th>
             </thead>
             <tbody>
               <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
               <tr>
                <td><?php echo e($key + 1); ?></td>
                <td>
                <?php if($image = @file_get_contents(public_path().'/images/slider/'.$slider->image)): ?>
                <img src="<?php echo e(asset('images/slider/'.$slider->image)); ?>" width="150px" class="rounded object-fit" >
                <?php endif; ?>
                </td>
                <td>
                    <p><b>Linked To:</b> 
                    <?php if($slider->link_by =='cat'): ?>
                      (Category : <b><?php echo e($slider->category['title'] ?? 'None'); ?></b>)
                    <?php endif; ?>
                    <?php if($slider->link_by == 'sub'): ?> 
                      (Subcategory: <b><?php echo e($slider->subcategory['title'] ?? 'None'); ?></b>)
                    <?php endif; ?>
                    <?php if($slider->link_by == 'child'): ?>
                    ( Child Category: <b><?php echo e($slider->childcategory->title ?? 'None'); ?></b>)
                    <?php endif; ?>
                    <?php if($slider->link_by == 'pro'): ?>
                      (Product: <b><?php echo e($slider->products['name'] ?? 'None'); ?></b>)
                    <?php endif; ?>
                    <?php if($slider->link_by == 'url'): ?>
                      (URL: <b><?php echo e($slider->url); ?></b>)
                    <?php endif; ?>
                    <?php if($slider->link_by == 'None'): ?>
                      <b>None</b>
                    <?php endif; ?>
                  </p>
                    <?php if(isset($slider->topheading)): ?>
                      <p><b>Heading Text:</b> <?php echo e($slider->topheading); ?></p>
                    <?php endif; ?>
                    <?php if(isset($slider->heading)): ?>
                      <p><b>Subheading Text:</b> <?php echo e($slider->heading); ?></p>
                    <?php endif; ?>
                    <?php if(isset($slider->buttonname)): ?>
                      <p><b><?php echo e(__('Button Text:')); ?></b> <?php echo e($slider->buttonname); ?></p>
                    <?php endif; ?>
                </td>
                <td>
                  <form action="<?php echo e(route('slider.quick.update',$slider->id)); ?>" method="POST">
                      <?php echo e(csrf_field()); ?>

                      <button <?php if(env('DEMO_LOCK') == 0): ?> type="submit" <?php else: ?> title="<?php echo e(__("This cannot be done in demo !")); ?>" disabled="" <?php endif; ?> class="btn btn-rounded <?php echo e($slider->status == 1 ? 'btn-success-rgba' : 'btn-danger-rgba'); ?>">
                        <?php echo e($slider->status ==1 ? 'Active' : 'Deactive'); ?>

                      </button>
                  </form>
                </td>
                <td>
                   <div class="dropdown">
                       <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                       <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                          
                           <a class="dropdown-item" href="<?php echo e(url('admin/slider/'.$slider->id.'/edit')); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                        
                           <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($slider->id); ?>" >
                               <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                           </a>
                           
                       </div>
                   </div>

                   <!-- delete Modal start -->
                   <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($slider->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                       <p><?php echo e(__('Do you really want to delete')); ?> <b><?php echo e($slider->heading); ?></b> ? <?php echo e(__('This process cannot be undone.')); ?></p>
                               </div>
                               <div class="modal-footer">
                                   <form method="post" action="<?php echo e(url('admin/slider/'.$slider->id)); ?>" class="pull-right">
                                       <?php echo e(csrf_field()); ?>

                                       <?php echo e(method_field("DELETE")); ?>

              
                                       <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                       <button type="submit" class="btn btn-primary"><?php echo e(__("YES")); ?></button>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </div>
                   <!-- delete Model ended -->
                </td>
              </tr> 
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </tbody>
          </table>                  
        </div>
      </div>
    </div>
  </div>
</div>
​


<?php $__env->stopSection(); ?>

<!-- css for image end -->
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/slider/index.blade.php ENDPATH**/ ?>