
<?php $__env->startSection('title',__('Edit Banner Setting')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Banner Setting';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'Banner Setting';
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
          <h5 class="box-title"><?php echo e(__('Banner')); ?> <?php echo e(__('Settings')); ?></h5>
        </div>
        <div class="card-body">
          <form id="demo-form2" method="post" enctype="multipart/form-data" action="<?php echo e(url('admin/banner-setting/update')); ?>" data-parsley-validate class="form-horizontal form-label-left">
        <?php echo e(csrf_field()); ?>


        <div class="form-group d-none">
          <label class="control-label" for="first-name">
            <?php echo e(__('Banner Name')); ?>: <span class="required">*</span>
          </label>

            <input placeholder="<?php echo e(__('Please enter banner name')); ?>" type="text" id="first-name" name="name"
              class="form-control col-md-12" value="<?php echo e(optional($bannersetting)['name']); ?>">
        </div>
        
        <div class="form-group d-none">
          <label class="control-label" for="first-name">
            <?php echo e(__('Banner Image')); ?>: <span class="required">*</span>
          </label>

          <div class="mb-3 d-none">
              <?php if(isset($bannersetting)): ?>
                <?php if($image = @file_get_contents('images/banner/'.$bannersetting->image)): ?>
                  <img src=" <?php echo e(url('images/banner/'.$bannersetting->image)); ?> " width="100px" class="rounded p-3 bg-primary-rgba img-fluid">
                <?php else: ?>
                  <img width="100px" src="<?php echo e(Avatar::create($bannersetting->name)->toBase64()); ?>" class="rounded p-3 bg-primary-rgba img-fluid">
                <?php endif; ?>
              <?php endif; ?>
              </div>

          <div class="input-group d-none">

            <input required readonly id="image" name="image" type="text" value="<?php echo e(optional($bannersetting)['image']); ?>" class="form-control">
            <div class="input-group-append">
                <span data-input="image" class="bg-primary text-light midia-toggle input-group-text"><?php echo e(__('Browse')); ?></span>
            </div>
          </div>
          
          <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>(<?php echo e(__('Please Choose Your Banner Image')); ?>)</small>

        </div>

        <div class="form-group d-none">
          <?php if(isset($bannersetting)): ?>
          <label class="control-label" for="first-name">
            <?php echo e(__('Banner URL')); ?>: <span class="required">*</span>
          </label>

            <input placeholder="<?php echo e(__('Please enter banner name')); ?>" type="text" id="first-name" name="url"
              class="form-control col-md-12" value="<?php echo e(optional($bannersetting)['url']); ?>">
          <?php endif; ?>
        </div>

        <div class="form-group">
            <label class="control-label"> <?php echo e(__('Content')); ?>: <span class="required">*</span></label>
            <input placeholder="<?php echo e(__('Please Content')); ?>" type="text" name="content" class="form-control" value="<?php echo e(optional($bannersetting)['content']); ?>">
        </div>

        <div class="form-group">
          <label>
            <?php echo e(__('Status')); ?>:
          </label><br>
          <label class="switch">
            <input name="banner_status" class="slider tgl tgl-skewed" type="checkbox" id="toggle-event33"  <?php if(isset($bannersetting) && $bannersetting->status == 1){ echo "checked";} ?>>
            <span class="knob"></span>

          </label>
          <br>
           <input type="hidden" name="status" value="1" id="status3">
           <small class="text-info"> <i class="text-dark feather icon-help-circle"></i>(<?php echo e(__("Choose status for your banner")); ?>)</small>
          </div>
          <div class="form-group">
          <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
            <?php echo e(__("Reset")); ?></button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
            <?php echo e(__("Update")); ?></button>
        </div>

        <div class="clear-both"></div>

          </form>
        </div>
      </div>
    

    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
  <script>
      $(".midia-toggle").midia({
          base_url: '<?php echo e(url('')); ?>',
          directory_name: 'banner',
          dropzone : {
            acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
          }
      });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/banner/index.blade.php ENDPATH**/ ?>