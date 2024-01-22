
<?php $__env->startSection('title',__('Offer popup settings |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Offer popup settings';
  $data['title0'] = 'Marketing';
  $data['title1'] = 'Offer popup settings';
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
                <h5 class="box-title"><?php echo e(__("Offer Popup Settings")); ?></h5>
            </div>
            <div class="col-md-4">
                <div class="widgetbar">
                    <div class="wrapper-tooltip">
                        <button type="button" class="btn btn-primary-rgba"><i class="fa fa-info-circle float-right"></i></button>
                        <div class="tooltip"><?php echo e(__("For translate text in different languages you can switch language from top bar than change the language and update the translations.")); ?></div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="card-body">
            
            <form action="<?php echo e(route('offer.update.settings')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <div class="row">

                    <div class="col-md-12">
                        <label class="text-dark"> <?php echo e(__("Enable Offer popup ?")); ?> </label>
                        <br>
                        <label class="switch">
                            <input <?php echo e(isset($settings) && $settings->enable_popup || old('enable_popup') ? "checked" : ""); ?> id="enable_popup" type="checkbox" name="enable_popup">
                            <span class="knob"></span>
                        </label>
                    </div>

                    <hr>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Offer popup image :")); ?> <span class="text-danger">*</span></label>
                            <!--  -->
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Heading Text")); ?> (<?php echo e(__("in")); ?> <?php echo e(app()->getLocale()); ?>) : <span class="text-danger">*</span></label>
                            <input value="<?php echo e($settings->heading ?? old('heading')); ?>" required type="text" class="form-control" name="heading" placeholder="<?php echo e(__('Enter heading text')); ?> in <?php echo e(app()->getLocale()); ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Heading Text Color :")); ?> <span class="text-danger">*</span></label>
                            <div class="input-group initial-color">
                                <input type="text" class="form-control input-lg" value="<?php echo e($settings->heading_color ?? old('heading_color')); ?>" name="heading_color" placeholder="#000000"/>
                                <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                </span>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Subheading Text")); ?> (<?php echo e(__("in")); ?> <?php echo e(app()->getLocale()); ?>) : <span class="text-danger">*</span> </label>
                            <input value="<?php echo e($settings->subheading ?? old('subheading')); ?>" required type="text" class="form-control" name="subheading" placeholder="Enter subheading text in <?php echo e(app()->getLocale()); ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Subheading Text Color:')); ?> <span class="text-danger">*</span></label>
                            <div class="input-group initial-color">
                                <input type="text" class="form-control input-lg" value="<?php echo e($settings->subheading_color ?? old('subheading_color')); ?>" name="subheading_color" placeholder="#000000"/>
                                <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                </span>
                            </div>
                            
                         
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Description Text")); ?> (<?php echo e(__("in")); ?> <?php echo e(app()->getLocale()); ?>) :</label>
                            <input value="<?php echo e($settings->description ?? old('description')); ?>" type="text" class="form-control" name="description" placeholder="<?php echo e(__("Enter description text in")); ?> <?php echo e(app()->getLocale()); ?>">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Description Text Color:")); ?></label>
                            <div class="input-group initial-color">
                                <input type="text" class="form-control input-lg" value="<?php echo e($settings->description_text_color ?? old('description_text_color')); ?>" name="description_text_color" placeholder="#000000"/>
                                <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                </span>
                            </div>
                           
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="text-dark">
                            <?php echo e(__("Enable Button in popup ?")); ?>

                        </label>
                        <br>
                        <label class="switch">
                            <input <?php echo e(isset($settings) && $settings->enable_button || old('enable_button') ? "checked" : ""); ?> id="enable_button" type="checkbox" name="enable_button">
                            <span class="knob"></span>
                        </label>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Button Text")); ?> (<?php echo e(__("in")); ?> <?php echo e(app()->getLocale()); ?>) : </label>
                            <input value="<?php echo e($settings->button_text ?? old('button_text')); ?>" type="text" class="form-control" name="button_text" placeholder="<?php echo e(__("Enter button text in")); ?> <?php echo e(app()->getLocale()); ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Button Link")); ?> (<?php echo e(__("in")); ?> <?php echo e(app()->getLocale()); ?>) : </label>
                            <input value="<?php echo e($settings->button_link ?? old('button_link')); ?>" type="text" class="form-control" name="button_link" placeholder="<?php echo e(__("Enter button link")); ?> eg:https://">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Button Text Color:')); ?></label>
                            <div class="input-group initial-color" >
                                <input type="text" class="form-control input-lg" value="<?php echo e($settings->button_text_color ?? old('button_text_color')); ?>" name="button_text_color" placeholder="#000000"/>
                                <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                </span>
                            </div>
                          
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__('Button Background Color:')); ?></label>
                            <div class="input-group initial-color" >
                                <input type="text" class="form-control input-lg" value="<?php echo e($settings->button_color ?? old('button_color')); ?>" name="button_color"  placeholder="#000000"/>
                                <span class="input-group-append">
                                <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                </span>
                            </div>
                          
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-save mr-2"></i><?php echo e(__("Save")); ?></button>
                        </div>
                    </div>

                </div>   

            </form>
         <!-- main content end -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/popupsetting/settings.blade.php ENDPATH**/ ?>