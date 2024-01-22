
<?php $__env->startSection('title',__('Front Category Slider | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Front Category Slider';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'Front Category Slider';
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
              <h5 class="box-title"><?php echo e(__('Front Category Slider')); ?></h5>  
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <div class="wrapper-tooltip">
                  <button type="button" class="btn btn-primary-rgba"><i class="fa fa-info-circle float-right"></i></button>
                  <div class="tooltip"> <?php echo e(__("Only those category will list here who have atleast one complete product. (Complete product means product with atleast one variant)")); ?></div>
                </div>
              </div>
            </div>
          </div>

          
        </div>      
        <div class="card-body">
          
          <form action="<?php echo e(route('front.slider.post')); ?>" method="POST">
           <?php echo csrf_field(); ?>
            <input  type="hidden" class="form-control" name="user_id" value="<?php echo e(Auth::User()->id); ?>" >
        
              <div class="row mt-md-2">
                
                 <!-- Select Category -->
                 <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__('Select Category : ')); ?><span class="text-danger">*</span></label>
                        <select class="select2 form-control" name="category_ids[]" multiple="multiple">
                            <?php $__currentLoopData = App\Category::where('status','=','1')->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->products->count()>0): ?>
                                    <?php if(isset($slider) && $slider->category_ids != ''): ?>
                                        <option <?php $__currentLoopData = $slider['category_ids']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo e($c == $item['id'] ? 'selected' : ''); ?>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        value="<?php echo e($item['id']); ?>"><?php echo e($item['title']); ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo e($item['id']); ?>"><?php echo e($item['title']); ?></option>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                       
                    </div>
                </div>

              

                  <!-- Product Show In Slider -->
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-dark"><?php echo e(__('Product Show In Slider : ')); ?> <span class="text-danger">*</span></label>
                        <input type="number" value="<?php echo e($slider->pro_limit ?? ''); ?>" min="1" max="50" name="pro_limit" class="form-control">
                    </div>
                </div>


                <!-- status -->
                <div class="col-md-6">
                    <div class="form-group">
                    <label class="text-dark"><?php echo e(__('Status : ')); ?></label><br>
                        <label class="switch">
                            <input class="slider" type="checkbox" name="status" <?php echo e(isset($slider->status) && $slider->status == 1 ? "checked" : ""); ?> />
                            <span class="knob"></span>
                        </label>
                    </div>
                </div>

                 

                <!-- create and close button -->
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                        <button <?php if(env('DEMO_LOCK') == 0): ?> type="submit" <?php else: ?> title="<?php echo e(__('This action cannot be done in demo !')); ?>" disabled="disabled" <?php endif; ?> class="btn btn-primary-rgba">
                        <i class="fa fa-save"></i> <?php echo e(__("Save")); ?></button>
                    </div>
                </div>

              </div><!-- row end -->
          </form>
      </div>
    </div>
  </div>
</div>
       

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
  <script src="<?php echo e(url('js/slider.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/slider/categoryslider.blade.php ENDPATH**/ ?>