
<?php $__env->startSection('title',__("Create a Block Detail Page Advertisements | ")); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Add a Block Detail Page Advertisements';
  $data['title0'] = 'Marketing';
  $data['title1'] = 'Block Detail Page Advertising';
  $data['title2'] = 'Add a Block Detail Page Advertisements';
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
              <h5 class="box-title"><?php echo e(__('Add')); ?> <?php echo e(__('Block Detail Page Advertisements')); ?></h5>
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <a href="<?php echo e(route('detailadvertise.index')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
              </div>
            </div>
          </div>
          
        </div>
        <div class="card-body">
          <form action="<?php echo e(route('detailadvertise.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
  
            <div class="row">

              <div class="form-group col-lg-6">
                <label><?php echo e(__('Select Position:')); ?> <span class="required">*</span></label>
                <select required="" name="position" id="position" class="form-control select2">
                    <option value="category">On Category Page</option>
                    <option value="prodetail">On Product Detail Page</option>
                </select>
              </div>

              <div id="linkedPro" class="display-none form-group col-lg-6">
                <label><?php echo e(__('Display Product Page:')); ?> <span class="required">*</span></label>
                <select name="linkedPro" id="" class="form-control select2">
                    <?php $__currentLoopData = App\Product::where('status','=','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small class="text-info"><i class="fa fa-question-circle"></i> <?php echo e(__('Select a product page where you want to display this ad.')); ?></small>
              </div>

              <div id="linkedCat" class="form-group col-lg-6">
                <label><?php echo e(__('Display Category Page:')); ?> <span class="required">*</span></label>
                <select name="linkedCat" id="" class="form-control select2">
                    <?php $__currentLoopData = App\Category::where('status','=','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small class="text-info"><i class="fa fa-question-circle"></i> <?php echo e(__('Select a category page where you want to display this ad.')); ?></small>
              </div>

              <div class="form-group col-lg-6">
                <label><?php echo e(__('Belongs To:')); ?> <span class="required">*</span></label>
                <select required="" name="linkby" id="linkby" class="form-control select2">
                    <option value="category"><?php echo e(__('By Category Page')); ?></option>
                    <option value="detail"><?php echo e(__('By Product Page')); ?></option>
                    <option value="url"><?php echo e(__("By Custom URL")); ?></option> 
                    <option value="adsense"><?php echo e(__("By Google Adsense")); ?></option>
                </select>
              </div>

              <div class="form-group col-lg-6">
                <label><?php echo e(__('Choose Image:')); ?> <span class="required">*</span></label>
                <div class="input-group mb-3">

                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                  </div>
  
  
                  <div class="custom-file">
  
                    <input type="file" name="adimage" class="inputfile inputfile-1" id="inputGroupFile01"
                      aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
                  </div>
                </div>
              </div>

              <div id="catbox" class="form-group col-lg-6">
                <label><?php echo e(__('Select Category')); ?>: <span class="required">*</span></label>
                <select name="cat_id" id="" class="select2 form-control">
                    <?php $__currentLoopData = App\Category::where('status','=','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->title); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>

              <div id="probox" class="display-none form-group col-lg-6">
                <label><?php echo e(__('Select Product:')); ?> <span class="required">*</span></label>
                <select name="pro_id" id="" class="select2 form-control">
                    <?php $__currentLoopData = App\Product::where('status','=','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <small class="text-info"><i class="fa fa-question-circle"></i> <?php echo e(__('Select a product page so when user click on ad he/she will redirect to this product page')); ?> </small>
              </div>

              <div class="form-group col-lg-6">
                <label><?php echo e(__('Heading Text:')); ?> </label>
                <input value="<?php echo e(old('top_heading')); ?>" name="top_heading" placeholder="<?php echo e(__('Enter heading text')); ?>" type="text" class="form-control" id="top_heading">
              </div>
  
              <div class="form-group col-lg-6">
                 <label><?php echo e(__('Heading Text Color:')); ?> </label>
                 <div class="input-group initial-color" title="Using input value">
                  <input type="text" class="form-control input-lg" value="#000000" name="hcolor" placeholder="#000000"/>
                  <span class="input-group-append">
                    <span class="input-group-text colorpicker-input-addon"><i></i></span>
                  </span>
                </div>                
              </div>
  
              <div class="form-group col-lg-6">
                <label><?php echo e(__("Subheading Text:")); ?> </label>
                <input value="<?php echo e(old('sheading')); ?>" name="sheading" placeholder="<?php echo e(__('Enter subheading text')); ?>" type="text" class="form-control" id="top_heading">
              </div>

              <div class="form-group col-lg-6">
                <label><?php echo e(__("Subheading Text Color:")); ?> </label>
                <div class="input-group initial-color">
                  <input type="text" class="form-control input-lg" value="#000000" name="scolor" placeholder="#000000"/>
                  <span class="input-group-append">
                    <span class="input-group-text colorpicker-input-addon"><i></i></span>
                  </span>
                </div>                
              </div>
  
              <div id="urlbox" class="display-none form-group col-lg-6">
                <label><?php echo e(__('Custom URL:')); ?> </label>
                <input value="<?php echo e(old('url')); ?>" placeholder="http://" type="text" class="form-control" id="url" name="url">
              </div>

              <div id="adsenseBox" class="display-none form-group col-lg-6">
                <label><?php echo e(__('Google Adsense Code:')); ?> </label>
                <textarea name="adsensecode" cols="30" rows="5" placeholder="<?php echo e(__('Paste your Adsense code script here')); ?>" class="form-control"><?php echo e(old('adsensecode')); ?></textarea> 
              </div>
  
              <div class="form-group col-lg-3">
                <label><?php echo e(__('Show Button:')); ?></label>
                <br>
                <label class="switch">
                  <input type="checkbox" class="show_btn toggle-input toggle-buttons" name="show_btn" >
                  <span class="knob"></span>
                </label>
              </div>

              <div class="form-group col-lg-3">
                <label><?php echo e(__('Status:')); ?></label>
                <br>
                <label class="switch">
                  <input type="checkbox" class="quizfp toggle-input toggle-buttons" name="status" checked>
                  <span class="knob"></span>
                </label>
              </div>

              <div class="form-group col-lg-6 buttongroup">
                <label><?php echo e(__('Button Text:')); ?> </label>
                <input value="<?php echo e(old('btn_txt')); ?>" placeholder="Enter button text" type="text" class="form-control" id="btn_txt" name="btn_txt">
              </div>
  
              <div class="form-group col-lg-6 buttongroup b-none">
                  <label><?php echo e(__('Button Text Color:')); ?> </label>
              
                  <div class="input-group initial-color">
                  <input type="text" class="form-control input-lg" value="#000000" name="btn_txt_color" placeholder="#000000"/>
                  <span class="input-group-append">
                    <span class="input-group-text colorpicker-input-addon"><i></i></span>
                  </span>
                </div>
              </div>
               
  
              <div class="form-group col-lg-6 buttongroup b-none">
                  <label><?php echo e(__('Button Background Color:')); ?> </label>
                
                  <div class="input-group initial-color" title="Using input value">
                  <input type="text" class="form-control input-lg" value="#000000" name="btn_bg" placeholder="#000000"/>
                  <span class="input-group-append">
                    <span class="input-group-text colorpicker-input-addon"><i></i></span>
                  </span>
                </div>
              </div> 

            </div>

  
         
      
  
      <div class="form-group">
        <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i>
          <?php echo e(__("Reset")); ?></button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
          <?php echo e(__("Create")); ?></button>
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
  <script src="<?php echo e(url('js/detailads.js')); ?>"></script>
  <script>
    $('.buttongroup').hide('slow');
    $('.show_btn').on('change', function() {
 
      if($(this).is(':checked')) {
        $('.buttongroup').show('slow');
      } else {
        $('.buttongroup').hide('slow');
      }
    });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/detailAds/add.blade.php ENDPATH**/ ?>