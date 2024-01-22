
<?php $__env->startSection('title',__("Edit user :username |",['username' => $user->name])); ?>
<?php $__env->startSection('body'); ?>

<?php
  $role = Auth::user()->getRoleNames()?Auth::user()->getRoleNames()[0]:'No Role';
  $current_role = $user->getRoleNames()?$user->getRoleNames()[0]:'No Role';
  $data['heading'] = 'Edit '.$current_role;
  $data['title0'] = $current_role;
  $data['title1'] = 'Edit '.$current_role;
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 

  <div class="row">

    <div class="col-lg-9">
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
            <div class="col-lg-10">
                <h5 class="card-title"> <?php echo e(__("Edit")); ?> <?php echo e($current_role); ?></h5>
            </div>
            <div class="col-md-2">
              <div class="widgetbar">
                <a href="<?php echo e(route('users.index',['filter' => app('request')->input('type') ])); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data" action="<?php echo e(route("users.update",$user->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
                <div class="card card-bg">
                    <div class="card-header">
                        <h5 class="card-title"> <?php echo e(__("Basic Info")); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Full Name:")); ?> <span class="required text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="<?php echo e(__("Please enter full name")); ?>" name="name" value="<?php echo e($user->name); ?>">
                                </div>
                            </div>
                    
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="text-dark"><?php echo e(__("Email:")); ?> <span class="required text-danger">*</span></label>
                                <input placeholder="<?php echo e(__("Please enter email")); ?>" type="email" name="email" value="<?php echo e($user->email); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="text-dark"> <?php echo e(__("Mobile:")); ?> <span class="required text-danger">*</span></label>
                                <div class="row no-gutter">
                                    <div class="col-md-12">
                                    <div class="input-group">
                                        <input required pattern="[0-9]+" title="Invalid mobile no." placeholder="1" type="text" name="phonecode" value="<?php echo e($user->phonecode); ?>" class="col-md-2 form-control">
                                        <input required pattern="[0-9]+" title="Invalid mobile no." placeholder="<?php echo e(__("Please enter mobile no.")); ?>" type="text" name="mobile" value="<?php echo e($user->mobile); ?>" class="col-md-10 form-control">
                                    </div>
                                    </div>
                                </div>
                                </div>                          
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="text-dark">
                                    <?php echo e(__("Phone:")); ?>

                                </label>
                                <input pattern="[0-9]+" title="Invalid Phone no." placeholder="<?php echo e(__("Please enter phone no.")); ?>" type="text"
                                    name="phone" value="<?php echo e($user->phonne); ?>" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="text-dark" for="first-name"> <?php echo e(__("Choose Profile:")); ?></label>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <!-- <input type="file" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label> -->
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" id="img_upload_input" name="image" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"  onchange="readURL(this);" />
                                            <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose Profile")); ?> </label>
                                            </div>
                                        </div> 
                                    </div>
                                </div> <br>
                                <div class="thumbnail-img-block mb-3">
                                    <img id="image-pre" class="img-fluid" alt="">
                                </div>                       
                            </div>
                            <?php if($role=='Super Admin' || $role=='Admin'): ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="text-dark">
                                    <?php echo e(__("User Role:")); ?> <span class="required">*</span>
                                </label>
                                <select name="role" data-placeholder="<?php echo e(__("Please choose user role")); ?>" class="form-control select2">
                                    
                                    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($user->getRoleNames()->contains($role->name) ? 'selected' : ""); ?> value="<?php echo e($role->name); ?>"><?php echo e($role->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if(in_array('Seller', auth()->user()->getRoleNames()->toArray()) && Module::has('SellerSubscription') && Module::find('sellersubscription')->isEnabled()): ?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__('Select seller plan:')); ?></label>
                                        <select name="seller_plan" class="form-control select2" data-placeholder="<?php echo e(__('Please select seller plan')); ?>" >
                                        <option value=""><?php echo e(__('Please select seller plan')); ?></option>
                                        <?php if(isset($plans)): ?>
                                            <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php echo e(isset($user->activeSubscription) && $user->activeSubscription->plan->id == $plan->id ? "selected" : ""); ?> value="<?php echo e($plan->id); ?>"> <?php echo e($plan->name); ?> (<?php echo e($defCurrency->currency->symbol.$plan->price); ?>)</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endif; ?>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                <label class="text-dark"><?php echo e(__('Status:')); ?></label><br>
                                <label class="switch">
                                    <input class="slider" type="checkbox" checked id="toggle-event3" name="status" >
                                    <span class="knob"></span>
                                </label>
                                <br>                            
                                <input type="hidden" name="status" value="1" id="status3">
                                </div>
                            </div>

                            <?php if($wallet_system == 1 ): ?>
                                <?php if(isset($user->wallet)): ?>
                                <div class="col-md-3">
                                    <div class="form-group">

                                    <label class="text-dark"><?php echo e(__("Wallet:")); ?></label>
                                    <label class="text-dark"><?php echo e(__('Status:')); ?></label><br>
                                    <label class="switch">
                                        <input class="slider" name="wallet_status" type="checkbox"<?php echo ($user->wallet->status=='1')?'checked':'' ?> id="wallet">
                                        <span class="knob"></span>
                                    </label><br>
                                    
                                    <small class="text-muted"><i class="fa fa-question-circle"></i><?php echo e(__('Please select wallet status')); ?></small>
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

                <div class="card mt-4 card-bg">
                    <div class="card-header">
                      <h5 class="card-title"> <?php echo e(__("Address")); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">  

                            <div class="col-md-4">
                                <div class="form-group">

                                <label class="text-dark">
                                    <?php echo e(__("Country:")); ?>

                                </label>

                                <select data-placeholder="<?php echo e(__("Please select country")); ?>" name="country_id"
                                    class="form-control select2" id="country_id">

                                    <option value=""><?php echo e(__("Please Choose")); ?></option>
                                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option <?php echo e($coun->id == $user['country_id'] ? "selected" : ""); ?> value="<?php echo e($coun->id); ?>">
                                    <?php echo e($coun->nicename); ?>

                                    </option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                <label class="text-dark">
                                    <?php echo e(__("State:")); ?>

                                </label>

                                <select data-placeholder="Please select state" required name="state_id" class="form-control select2"
                                    id="upload_id">
                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($s->id == $user->state_id ? "selected" : ''); ?> value="<?php echo e($s->id); ?>" >
                                    <?php echo e($s->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark" for="first-name">
                                        <?php echo e(__("City:")); ?>

                                    </label>
                                    <select data-placeholder="<?php echo e(__("Please select city")); ?>" name="city_id" id="city_id"
                                        class="form-control select2">

                                        <?php $__currentLoopData = $citys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($c->id); ?>" <?php echo e($c->id == $user->city_id ? 'selected' : ''); ?>>
                                        <?php echo e($c->name); ?>

                                        </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card mt-4 card-bg">
                    <div class="card-header">
                      <h5 class="card-title"> <?php echo e(__("Social Media")); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">  

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Website:")); ?></label>
                                    <input placeholder="http://" type="text" id="first-name" name="website" value="<?php echo e($user['website']); ?>" class="form-control">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card mt-4 card-bg">
                    <div class="card-header">
                      <h5 class="card-title"> <?php echo e(__("Authentication")); ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">  

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="eyeCy">
                                    <label for="password" class="text-dark"><?php echo e(__("Enter Password:")); ?></label>
                                        <div class="input-group mb-3">
                                            <input minlength="8" id="password" type="password" class="passwordbox form-control" placeholder="<?php echo e(__("Enter password min. length 8")); ?>" name="password">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" id="main_password" type="button"><span class="fa fa-fw fa-eye field-icon toggle-password"></span></button>
                                            </div>
                                        </div>                                  
                                    </div>
                                </div>              
                            </div>            
                
                            <div class="col-md-6">              
                                <div class="form-group">
                                    <div class="eyeCy">
                                        <label for="confirm" class="text-dark"><?php echo e(__("Confirm Password:")); ?></label>
                                        <div class="input-group mb-3">
                                            <input id="confirm_password" type="password" class="passwordbox form-control" placeholder="<?php echo e(__("Re-enter password for confirmation")); ?>" name="password_confirmation">
                                            <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" id="confirmPassword" type="button"><span class="fa fa-fw fa-eye field-icon toggle-password"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="required"><?php echo e($errors->first('password_confirmation')); ?></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            <button type="reset" class="btn btn-danger-rgba mr-1 mt-4"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
            <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> title="<?php echo e(__("This action is disabled in demo !")); ?>"
              disabled="disabled" <?php endif; ?> class="btn btn-primary-rgba mt-4"><i class="fa fa-save"></i>
              <?php echo e(__("Update")); ?></button>

          </form>
        </div>
      </div>
    </div>

    <div class="col-lg-3">
      <div class="card m-b-30">
        <div class="user-slider">
          <div class="user-slider-item">
              <div class="card-body text-center">
                <span>
                  <?php if($user->image !="" && @file_exists(public_path().'/images/user/'.$user->image)): ?>
                  <img title="<?php echo e($user->name); ?>" id="preview1" src="<?php echo e(url('images/user/'.$user->image)); ?>" class="img-circle edit-image rounded mx-auto d-block">
                  <?php else: ?>
                  <img id="preview1" class="img-circle edit-image rounded mx-auto d-block" title="<?php echo e($user->name); ?>" src="<?php echo e(Avatar::create($user->name)->toBase64()); ?>" />
                  <?php endif; ?>
                </span>
                  <h5 class="mt-2"><?php echo e($user->name); ?></h5>
                  <p><?php echo e($user->store['name'] ?? ''); ?></p>
                  <p> <i class="feather icon-map-pin"></i> <?php if(!isset($user->country)): ?>
                    <?php echo e(__("Location not updated")); ?>

                  <?php else: ?>
                   <?php echo e(isset($user->city) ? $user->city->name : ""); ?>

                   <?php echo e(isset($user->state) ? $user->state->name : ""); ?>

                   <?php echo e(isset($user->country) ? $user->country->nicename : ""); ?>

                  <?php endif; ?>
                 </p>

                  
              </div>
              <div class="card-footer text-center">
                  <div class="row">
                      <div class="col-6 border-right">
                          <h5><?php echo e(count($user->products)); ?></h5>
                          <p class="my-2"><?php echo e(__('TOTAL PRODUCTS')); ?></p>
                      </div>
                      <div class="col-6">
                          <h5><?php echo e($user->purchaseorder->count()); ?></h5>
                          <p class="my-2">
                            <?php echo e(__("TOTAL PURCHASE")); ?>

                          </p>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  var baseUrl = "<?= url('/') ?>";
</script>
<script src="<?php echo e(url("js/ajaxlocationlist.js")); ?>"></script>
<script>
  $(document).on('click', '#main_password', function() {

    var input = $("#password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

  });

  $(document).on('click', '#confirmPassword', function() {

    var input = $("#confirm_password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')

  }); 
</script>
<script>
  $('.thumbnail-img-block').hide();
  function readURL(input) {

    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
        $('.thumbnail-img-block').show();
        $('#image-pre').attr('src', e.target.result);
      }
      
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/user/edit.blade.php ENDPATH**/ ?>