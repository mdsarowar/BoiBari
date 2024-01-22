
<?php $__env->startSection('title',__('Create Slider |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Create Slider';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'Sliders';
  $data['title2'] = 'Create Slider';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
  <div class="row">
    <?php if($errors->any()): ?>
    <div class="alert alert-danger" role="alert">
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true" style="color:red;">&times;</span></button></p>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <div class="col-lg-12">
      <div class="card m-b-30">
        <div class="card-header">
          
          <div class="row">
            <div class="col-lg-8">
              <h5 class="box-title"><?php echo e(__('Create a new slider')); ?></h5>
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <a href="<?php echo e(url('admin/slider')); ?>" class="btn btn-primary-rgba mr-2"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
        <!-- main content start -->
        <form action="<?php echo e(route('slider.store')); ?>" method="POST" enctype="multipart/form-data">
          <?php echo csrf_field(); ?>
           <div class="row">
             <div class="col-md-6">
               <div class="form-group">
                  <label class="text-dark"><?php echo e(__('Choose Slider Image :')); ?></label><br>
                  <!-- ================ -->
                  <div class="input-group mb-3">
                    
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
                    </div>
                  </div>
                  <!-- ================ -->
                  <!-- <input required="" type="file" class="form-control" name="image" id="image"/> -->
               </div>
                <div class="form-group">
                  <label class="text-dark" for="link_by"><?php echo e(__('Link BY :')); ?></label>
                  <select required="" class="form-control select2" name="link_by" id="link_by">
                    <option value="none"><?php echo e(__('None')); ?></option>
                    <option value="url"><?php echo e(__('URL')); ?></option>
                    <option value="cat"><?php echo e(__('Category')); ?></option>
                    <option value="sub"><?php echo e(__('Subcategory')); ?></option>
                    <option value="child"> <?php echo e(__('Childcategory')); ?></option>
                    <option value="pro"><?php echo e(__('Product')); ?></option>
                  </select>
                </div>
                <div class="hide form-group" id="category_id">
                  <label class="text-dark"><?php echo e(__('Choose Category :')); ?></label>
                  <select class="form-control select2 " id="cat" name="category_id">
                      <option value=""><?php echo e(__('Please Choose')); ?></option>
                      <?php $__currentLoopData = App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($category->status == '1'): ?>
                              <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                 <div class="hide form-group" id="subcat_id">
                  <label class="text-dark"><?php echo e(__('Choose Subcategory :')); ?></label>
                  <select class="form-control select2" id="subcat" name="subcat" >
                      <option value=""><?php echo e(__('Please Choose')); ?></option>
                      <?php $__currentLoopData = App\Subcategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($sub->status == '1'): ?>
                              <option value="<?php echo e($sub->id); ?>"><?php echo e($sub->title); ?></option>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="hide form-group" id="child">
                  <label class="text-dark"><?php echo e(__('Choose Chilldcategory :')); ?></label>
                  <select class="form-control select2" id="sub" name="child" >
                      <option value=""><?php echo e(__('Please Choose')); ?></option>
                      <?php $__currentLoopData = App\Grandcategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($child->status == '1'): ?>
                              <option value="<?php echo e($child->id); ?>"><?php echo e($child->title); ?></option>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="hide form-group" id="pro">
                  <label class="text-dark"><?php echo e(__('Choose Product :')); ?></label>
                  <select class="form-control select2" id="pro" name="pro" >
                      <option value=""><?php echo e(__('Please Choose')); ?></option>
                      <?php $__currentLoopData = App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($pro->status == '1' && count($pro->subvariants)>0): ?>
                              <option value="<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?></option>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="hide form-group" id="url_box">
                  <label class="text-dark"><?php echo e(__('Enter URL :')); ?></label>
                  <input type="url" id="url" name="url" class="form-control" placeholder="http://www.">
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-8">
                      <label class="text-dark"><?php echo e(__('Slider Top Heading :')); ?></label>
                      <input name="heading" type="text" value="" placeholder="Enter top heading" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                       <label class="text-dark" for=""><?php echo e(__('Text Color :')); ?></label>
                       <div class="input-group initial-color">
                        <input type="text" class="form-control input-lg" value="#000000" name="headingtextcolor"  placeholder="#000000"/>
                        <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </span>
                      </div>
                    
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-8">
                      <label class="text-dark"><?php echo e(__('Slider Sub Heading :')); ?></label>
                      <input name="subheading" type="text" value="" placeholder="Enter Sub heading" class="form-control"/>
                    </div>

                    <div class="col-md-4">
                      <label class="text-dark" for=""><?php echo e(__('Text Color :')); ?></label>
                      <div class="input-group initial-color">
                        <input type="text" class="form-control input-lg" value="#000000" name="subheadingcolor"  placeholder="#000000"/>
                        <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </span>
                      </div>
                   
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-8">
                      <label class="text-dark"><?php echo e(__('Short Description :')); ?></label>
                      <input name="short_description" type="text" placeholder="Enter short description" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                       <label class="text-dark" for=""><?php echo e(__('Short Des. Color :')); ?></label>
                       <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" name="short_description_color"  placeholder="#000000"/>
                        <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </span>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="text-dark" for=""><?php echo e(__('Call Support :')); ?></label><br>
                  <label class="switch">
                      <input class="slider" type="checkbox" name="call_support_status" required="" id="call_support_status" />
                      <span class="knob"></span>
                    </label>                 
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                       <label class="text-dark" for=""><?php echo e(__('Support Icon Color :')); ?></label>
                       <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" name="call_icon_color" placeholder="#000000"/>
                        <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </span>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-8">
                      <label class="text-dark"><?php echo e(__('Support Title :')); ?></label>
                      <input name="call_title" type="text" placeholder="Enter support title" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                       <label class="text-dark" for=""><?php echo e(__('Support Title Color :')); ?></label>
                       <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" name="call_title_color"  placeholder="#000000"/>
                        <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </span>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-8">
                      <label class="text-dark"><?php echo e(__('Support Number :')); ?></label>
                      <input name="call_no" type="text" placeholder="Enter support number" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                       <label class="text-dark" for=""><?php echo e(__('Support No. Color :')); ?></label>
                       <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" name="call_no_color"  placeholder="#000000"/>
                        <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </span>
                      </div>

                    </div>
                  </div>
                </div>

                  <div class="form-group d-none">
                  
                    <div class="row">
                      
                      <div class="col-md-8">
                        <label class="text-dark"><?php echo e(__('Button Text :')); ?></label>
                        <input name="buttonname" type="text" value="" placeholder="Enter Button Text" class="form-control"/>
                      </div>

                      <div class="col-md-4">
                        <label class="text-dark" for=""><?php echo e(__('Button Text Color :')); ?></label>
                        <div class="input-group initial-color" title="Using input value">
                          <input type="text" class="form-control input-lg" value="#000000" name="btntextcolor" placeholder="#000000"/>
                          <span class="input-group-append">
                          <span class="input-group-text colorpicker-input-addon"><i></i></span>
                          </span>
                        </div>
                      
                      </div>

                      <div class="col-md-12 mt-md-2">
                        <label class="text-dark" for=""><?php echo e(__('Button Background Color :')); ?></label>
                        <div class="input-group initial-color" title="Using input value">
                          <input type="text" class="form-control input-lg" value="#000000" name="btnbgcolor" placeholder="#000000"/>
                          <span class="input-group-append">
                          <span class="input-group-text colorpicker-input-addon"><i></i></span>
                          </span>
                        </div>

                      
                      </div>

                    </div>
                      
                    
   
                </div>

                <div class="form-group">
                  <label class="text-dark" for=""><?php echo e(__('Status :')); ?></label><br>
                    <label class="switch">
                      <input class="slider" type="checkbox" name="status" checked />
                      <span class="knob"></span>
                    </label>
                </div>

                <div class="form-group">
                <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i>
                                                            <?php echo e(__("Save")); ?></button>
                  <!-- <button class="btn btn-primary-rgba btn-md"><i class="feather icon-plus mr-2"></i><?php echo e(__('ADD Slide')); ?></button> -->
                </div>

             </div>
             <div class="col-md-6">
               <label class="text-dark" for="link_by"><?php echo e(__("Image Preview :")); ?></label>
               <br><br>
               <img src="<?php echo e(url('images/sliderpreview.png')); ?>" class="img-fluid" alt="Responsive image" id="slider_preview" title="Image Preview" align="center">
               
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
<?php $__env->startSection('custom-script'); ?>
  <script src="<?php echo e(url('js/slider.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/slider/create.blade.php ENDPATH**/ ?>