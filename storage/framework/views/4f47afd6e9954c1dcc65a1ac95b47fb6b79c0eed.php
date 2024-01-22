
<?php $__env->startSection('title',__('Edit Slider |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Edit Slider';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'Sliders';
  $data['title2'] = 'Edit Slider';
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
              <h5 class="box-title"><?php echo e(__('Edit slider')); ?></h5>
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
        <form action="<?php echo e(route('slider.update',$slider->id)); ?>" method="POST" enctype="multipart/form-data">
          <?php echo e(method_field('PUT')); ?>

          <?php echo csrf_field(); ?>
           <div class="row">
             <div class="col-md-7">
               <div class="form-group">
                  <label class="text-dark"><?php echo e(__('Choose Slider Image :')); ?></label><br>
                   <!-- ================ -->
                   <div class="input-group mb-3">
                   
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
                    </div>
                  </div>
                  <!-- ================ -->
                  <!-- <input  type="file" class="form-control" name="image" id="image"/> -->
               </div>
                <div class="form-group">
                  <label class="text-dark" for="link_by"><?php echo e(__('Link BY :')); ?></label>
                  <select required="" class="form-control select2" name="link_by" id="link_by">
                    <option <?php echo e($slider->link_by == 'none' ? "selected" : ""); ?> value="none"><?php echo e(__('None')); ?></option>
                    <option <?php echo e($slider->link_by == 'url' ? "selected" : ""); ?> value="url"><?php echo e(__('URL')); ?></option>
                    <option <?php echo e($slider->link_by == 'cat' ? "selected" : ""); ?> value="cat"><?php echo e(__('Category')); ?></option>
                    <option <?php echo e($slider->link_by == 'sub' ? "selected" : ""); ?> value="sub"><?php echo e(__('Subcategory')); ?></option>
                    <option <?php echo e($slider->link_by == 'child' ? "selected" : ""); ?> value="child"><?php echo e(__('Childcategory')); ?></option>
                    <option <?php echo e($slider->link_by == 'pro' ? "selected" : ""); ?> value="pro"><?php echo e(__('Product')); ?></option>
                  </select>
                </div>
                <div class="form-group <?php echo e($slider->category_id !='' ? "" : 'hide'); ?>" id="category_id">
                  <label class="text-dark"><?php echo e(__('Choose Category :')); ?></label>
                  <select class="js-example-basic-single form-control" id="cat" name="category_id">
                      <option value=""><?php echo e(__('Please Choose')); ?></option>
                      <?php $__currentLoopData = App\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($category->status == '1'): ?>
                              <option <?php echo e($slider['category_id'] == $category->id ? "selected" : ""); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                 <div class="form-group <?php echo e($slider->child !='' ? "" : 'hide'); ?>" id="subcat_id">
                  <label class="text-dark"><?php echo e(__('Choose Subcategory :')); ?></label>
                  <select class="js-example-basic-single form-control" id="subcate" name="subcat" >
                      <option value=""><?php echo e(__('Please Choose')); ?></option>
                      <?php $__currentLoopData = App\Subcategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($sub->status == '1'): ?>
                              <option <?php echo e($slider['child'] == $sub->id ? "selected" : ""); ?> value="<?php echo e($sub->id); ?>"><?php echo e($sub->title); ?></option>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="form-group <?php echo e($slider->grand_id !='' ? "" : 'hide'); ?>" id="child">
                  <label class="text-dark"><?php echo e(__('Choose Chilldcategory :')); ?></label>
                  <select class="js-example-basic-single form-control" id="subcat" name="child" >
                      <option value=""><?php echo e(__('Please Choose')); ?></option>
                      <?php $__currentLoopData = App\Grandcategory::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($child->status == '1'): ?>
                              <option <?php echo e($slider['grand_id'] == $child->id ? "selected" : ""); ?> value="<?php echo e($child->id); ?>"><?php echo e($child->title); ?></option>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="form-group <?php echo e($slider->product_id !='' ? "" : 'hide'); ?>" id="pro">
                  <label class="text-dark"><?php echo e(__('Choose Product :')); ?></label>
                  <select class="js-example-basic-single form-control" id="pro" name="pro" >
                      <option value=""><?php echo e(__('Please Choose')); ?></option>
                      <?php $__currentLoopData = App\Product::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($pro->status == '1' && count($pro->subvariants)>0): ?>
                              <option <?php echo e($slider['product_id'] == $pro->id ? "selected" : ""); ?> value="<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?></option>
                          <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div>

                <div class="form-group <?php echo e($slider->url !='' ? "" : 'hide'); ?>" id="url_box">
                  <label class="text-dark"><?php echo e(__('Enter URL :')); ?></label>
                  <input type="url" id="url" name="url" value="<?php echo e($slider->url); ?>" class="form-control" placeholder="http://www.">
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-8">
                      <label class="text-dark"><?php echo e(__('Slider Top Heading :')); ?></label>
                      <input name="heading" type="text" value="<?php echo e($slider->topheading); ?>" placeholder="Enter top heading" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                       <label class="text-dark" for=""><?php echo e(__('Top Heading Text Color :')); ?></label>
                       <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" value="<?php echo e($slider->headingtextcolor); ?>" name="headingtextcolor"  placeholder="#000000"/>
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
                      <input name="subheading" type="text" value="<?php echo e($slider->heading); ?>" placeholder="Enter Sub heading" class="form-control"/>
                    </div>

                    <div class="col-md-4">
                      <label class="text-dark" for=""><?php echo e(__('Subheading Text Color :')); ?></label>
                      <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" value="<?php echo e($slider->subheadingcolor); ?>" name="subheadingcolor"  placeholder="#000000"/>
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
                      <label class="text-dark"><?php echo e(__('Description Text :')); ?></label>
                      <input name="moredesc" type="text" value="<?php echo e($slider->moredesc); ?>" placeholder="Enter top heading" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                       <label class="text-dark" for=""><?php echo e(__('Description Text Color :')); ?></label>
                       <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" value="<?php echo e($slider->moredesccolor); ?>" name="moredesccolor"  placeholder="#000000"/>
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
                      <input name="short_description" type="text" value="<?php echo e($slider->short_description); ?>" placeholder="Enter short description" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                       <label class="text-dark" for=""><?php echo e(__('Short Des. Color :')); ?></label>
                       <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" value="<?php echo e($slider->short_description_color); ?>" name="short_description_color"  placeholder="#000000"/>
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
                      <input class="slider" type="checkbox" name="call_support_status" required="" id="call_support_status" <?php echo e($slider->call_support_status == 1 ? "checked" : ""); ?> />
                      <span class="knob"></span>
                    </label>                 
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-12">
                       <label class="text-dark" for=""><?php echo e(__('Support Icon Color :')); ?></label>
                       <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" value="<?php echo e($slider->call_icon_color); ?>" name="call_icon_color"  placeholder="#000000"/>
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
                      <input name="call_title" type="text" value="<?php echo e($slider->call_title); ?>" placeholder="Enter support title" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                       <label class="text-dark" for=""><?php echo e(__('Support Title Color :')); ?></label>
                       <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" value="<?php echo e($slider->call_title_color); ?>" name="call_title_color"  placeholder="#000000"/>
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
                      <input name="call_no" type="text" value="<?php echo e($slider->call_no); ?>" placeholder="Enter support number" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                       <label class="text-dark" for=""><?php echo e(__('Support No. Color :')); ?></label>
                       <div class="input-group initial-color" title="Using input value">
                        <input type="text" class="form-control input-lg" value="<?php echo e($slider->call_no_color); ?>" name="call_no_color"  placeholder="#000000"/>
                        <span class="input-group-append">
                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                        </span>
                      </div>

                    </div>
                  </div>
                </div>

                <div class="form-group d-none">
                  
                    <div class="row">
                      
                      <div class="col-md-6">
                        <label class="text-dark"><?php echo e(__('Button Text :')); ?></label>
                        <input name="buttonname" type="text" value="<?php echo e($slider->buttonname); ?>" placeholder="Enter Button Text" class="form-control"/>
                       
                      </div>

                      <div class="col-md-6">
                        <label class="text-dark" for=""><?php echo e(__('Button Text Color :')); ?></label>
                        <div class="input-group initial-color" title="Using input value">
                          <input type="text" class="form-control input-lg" value="<?php echo e($slider->btntextcolor); ?>" name="btntextcolor"  placeholder="#000000"/>
                          <span class="input-group-append">
                          <span class="input-group-text colorpicker-input-addon"><i></i></span>
                          </span>
                        </div>
                     
                      </div>

                      <div class="col-md-12">
                        <label class="text-dark" for=""><?php echo e(__('Button Background Color :')); ?></label>
                        <div class="input-group initial-color" title="Using input value">
                          <input type="text" class="form-control input-lg" value="<?php echo e($slider->btnbgcolor); ?>" name="btnbgcolor"  placeholder="#000000"/>
                          <span class="input-group-append">
                          <span class="input-group-text colorpicker-input-addon"><i></i></span>
                          </span>
                        </div>
                      
                      </div>

                    </div>
                      
                    
   
                </div>

                <div class="form-group">
                  <label class="text-dark" for=""><?php echo e(__('Status :')); ?></label><br>
                  <!-- =========== -->
                  <label class="switch">
                      <input class="slider" type="checkbox" name="status" required="" id="status" <?php echo e($slider->status == 1 ? "checked" : ""); ?> />
                      <span class="knob"></span>
                    </label>
                 
                </div>

                <div class="form-group">
                <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                                            <?php echo e(__("Update")); ?></button>
                </div>

             </div>
             <div class="col-md-5">
               <label class="text-dark" for="link_by"><?php echo e(__('Image Preview :')); ?></label>
               <br>
               <img id="slider_preview" class="img-fluid" alt="Responsive image" title="Slider Image Preview" align="center" src="<?php echo e(url('images/slider/'.$slider->image)); ?>">
               
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
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/slider/edit.blade.php ENDPATH**/ ?>